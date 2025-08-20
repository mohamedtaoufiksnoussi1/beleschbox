<?php

namespace App\Services;

use setasign\Fpdi\Fpdi;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\Storage;

class PdfGeneratorService
{
    private $templatePath;
    
    public function __construct()
    {
        // Utiliser le template HTML avec placeholders
        $this->templatePath = app_path('templates/Bestellformular_template.html');
    }
    
    /**
     * Génère un PDF basé sur le template HTML
     */
    public function generateOrderForm(array $userData, array $cartData = [], $signatureData = null)
    {
        try {
            // Utiliser le template HTML
            if (file_exists($this->templatePath)) {
                return $this->generateFromHtmlTemplate($userData, $cartData, $signatureData);
            }
        } catch (\Exception $e) {
            // Si ça échoue, utiliser la méthode simple
        }
        
        // Fallback vers PDF simple
        return $this->generateSimplePdf($userData, $cartData, $signatureData);
    }

    /**
     * Génère un PDF et retourne le contenu en base64
     */
    public function generateOrderFormBase64(array $userData, array $cartData = [], $signatureData = null)
    {
        try {
            // Utiliser le template HTML
            if (file_exists($this->templatePath)) {
                return $this->generateFromHtmlTemplateBase64($userData, $cartData, $signatureData);
            }
        } catch (\Exception $e) {
            // Si ça échoue, utiliser la méthode simple
        }
        
        // Fallback vers PDF simple
        return $this->generateSimplePdfBase64($userData, $cartData, $signatureData);
    }
    
    /**
     * Génère un PDF basé sur le template HTML
     */
    private function generateFromHtmlTemplate(array $userData, array $cartData = [], $signatureData = null)
    {
        // Lire le template HTML
        $htmlContent = file_get_contents($this->templatePath);
        
        // Remplacer les placeholders dans le HTML
        $htmlContent = $this->replaceHtmlPlaceholders($htmlContent, $userData, $cartData, $signatureData);
        
        // Créer un PDF avec DomPDF
        return $this->convertHtmlToPdf($htmlContent);
    }
    
    /**
     * Remplace les placeholders dans le HTML
     */
    private function replaceHtmlPlaceholders($htmlContent, $userData, $cartData, $signatureData)
    {
        // Debug: afficher les données reçues
        \Log::info('PDF Generation - User Data:', $userData);
        \Log::info('PDF Generation - Cart Data:', $cartData);
        \Log::info('PDF Generation - Signature Data:', $signatureData);
        
        // Remplacer les données personnelles
        $htmlContent = str_replace('{{FIRST_NAME}}', $userData['first_name'] ?? '', $htmlContent);
        $htmlContent = str_replace('{{LAST_NAME}}', $userData['last_name'] ?? '', $htmlContent);
        $htmlContent = str_replace('{{STREET}}', $userData['street'] ?? '', $htmlContent);
        $htmlContent = str_replace('{{ZIP}}', $userData['zip'] ?? '', $htmlContent);
        $htmlContent = str_replace('{{CITY}}', $userData['city'] ?? '', $htmlContent);
        $htmlContent = str_replace('{{PHONE}}', $userData['phone'] ?? '', $htmlContent);
        $htmlContent = str_replace('{{DATE}}', date('d.m.Y'), $htmlContent);
        
        // Remplacer Genre (Frau/Herr)
        $gender = $userData['gender'] ?? '';
        if ($gender === 'Frau') {
            $htmlContent = str_replace('{{GENDER_FRAU_CHECKED}}', 'checked', $htmlContent);
            $htmlContent = str_replace('{{GENDER_HERR_CHECKED}}', '', $htmlContent);
        } elseif ($gender === 'Herr') {
            $htmlContent = str_replace('{{GENDER_FRAU_CHECKED}}', '', $htmlContent);
            $htmlContent = str_replace('{{GENDER_HERR_CHECKED}}', 'checked', $htmlContent);
        } else {
            $htmlContent = str_replace('{{GENDER_FRAU_CHECKED}}', '', $htmlContent);
            $htmlContent = str_replace('{{GENDER_HERR_CHECKED}}', '', $htmlContent);
        }
        
        // Remplacer Pflegegrad
        $pflegegrad = $userData['pflegegrad'] ?? '';
        
        // Gérer les deux formats possibles
        $pflegegradNumber = '';
        if (is_numeric($pflegegrad)) {
            // Format simple: 1, 2, 3, 4, 5
            $pflegegradNumber = $pflegegrad;
        } elseif (strpos($pflegegrad, 'Pflegegrad') === 0) {
            // Format avec préfixe: Pflegegrad1, Pflegegrad2, etc.
            $pflegegradNumber = str_replace('Pflegegrad', '', $pflegegrad);
        }
        
        for ($i = 1; $i <= 5; $i++) {
            if ($pflegegradNumber == $i) {
                $htmlContent = str_replace('{{PFLEGEGRAD_' . $i . '_CHECKED}}', 'checked', $htmlContent);
            } else {
                $htmlContent = str_replace('{{PFLEGEGRAD_' . $i . '_CHECKED}}', '', $htmlContent);
            }
        }
        
        // Remplacer BeleschBox
        $beleschbox = $cartData['beleschbox_number'] ?? 'Individuell';
        for ($i = 1; $i <= 6; $i++) {
            if ($beleschbox == 'BeleschBox ' . $i) {
                $htmlContent = str_replace('{{BELESCHBOX_' . $i . '_CHECKED}}', 'checked', $htmlContent);
                $htmlContent = str_replace('{{BELESCHBOX_' . $i . '_SELECTED}}', 'selected', $htmlContent);
            } else {
                $htmlContent = str_replace('{{BELESCHBOX_' . $i . '_CHECKED}}', '', $htmlContent);
                $htmlContent = str_replace('{{BELESCHBOX_' . $i . '_SELECTED}}', '', $htmlContent);
            }
        }
        
        // BeleschBox Individuell
        if ($beleschbox == 'Individuell') {
            $htmlContent = str_replace('{{BELESCHBOX_INDIVIDUELL_CHECKED}}', 'checked', $htmlContent);
            $htmlContent = str_replace('{{BELESCHBOX_INDIVIDUELL_SELECTED}}', 'selected', $htmlContent);
        } else {
            $htmlContent = str_replace('{{BELESCHBOX_INDIVIDUELL_CHECKED}}', '', $htmlContent);
            $htmlContent = str_replace('{{BELESCHBOX_INDIVIDUELL_SELECTED}}', '', $htmlContent);
        }
        
        // Remplacer Handschuhgröße
        $gloveSize = $cartData['glove_size'] ?? 'M';
        
        // Extraire la taille des gants (gérer les formats comme "M (Standard)")
        $gloveSizeClean = $gloveSize;
        if (strpos($gloveSize, ' (') !== false) {
            $gloveSizeClean = trim(explode(' (', $gloveSize)[0]);
        }
        
        $sizes = ['S', 'M', 'L', 'XL'];
        foreach ($sizes as $size) {
            if ($gloveSizeClean == $size) {
                $htmlContent = str_replace('{{GLOVE_SIZE_' . $size . '_CHECKED}}', 'checked', $htmlContent);
            } else {
                $htmlContent = str_replace('{{GLOVE_SIZE_' . $size . '_CHECKED}}', '', $htmlContent);
            }
        }
        
        // Remplacer la signature
        $signatureHtml = '';
        if ($signatureData && isset($signatureData['image_path']) && $signatureData['image_path']) {
            $signatureHtml = '<img src="' . $signatureData['image_path'] . '" style="max-width: 200px; max-height: 60px; margin-bottom: 10px;">';
        }
        $htmlContent = str_replace('{{SIGNATURE_IMAGE}}', $signatureHtml, $htmlContent);
        
        return $htmlContent;
    }
    
    /**
     * Convertit HTML en PDF avec DomPDF
     */
    private function convertHtmlToPdf($htmlContent)
    {
        // Utiliser DomPDF pour convertir en PDF
        $dompdf = new Dompdf();
        $dompdf->loadHtml($htmlContent);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        
        // Sauvegarder le PDF
        $outputPath = storage_path('app/public/generated_pdfs/order_' . time() . '.pdf');
        if (!file_exists(dirname($outputPath))) {
            mkdir(dirname($outputPath), 0755, true);
        }
        
        file_put_contents($outputPath, $dompdf->output());
        
        return $outputPath;
    }

    /**
     * Convertit HTML en PDF avec DomPDF et retourne en base64
     */
    private function convertHtmlToPdfBase64($htmlContent)
    {
        // Utiliser DomPDF pour convertir en PDF
        $dompdf = new Dompdf();
        $dompdf->loadHtml($htmlContent);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        
        // Retourner le contenu en base64
        return base64_encode($dompdf->output());
    }

    /**
     * Génère un PDF basé sur le template HTML et retourne en base64
     */
    private function generateFromHtmlTemplateBase64(array $userData, array $cartData = [], $signatureData = null)
    {
        // Lire le template HTML
        $htmlContent = file_get_contents($this->templatePath);
        
        // Remplacer les placeholders dans le HTML
        $htmlContent = $this->replaceHtmlPlaceholders($htmlContent, $userData, $cartData, $signatureData);
        
        // Créer un PDF avec DomPDF et retourner en base64
        return $this->convertHtmlToPdfBase64($htmlContent);
    }
    
    /**
     * Génère un PDF simple sans template (fallback)
     */
    private function generateSimplePdf(array $userData, array $cartData = [], $signatureData = null)
    {
        $pdf = new Fpdi();
        $pdf->AddPage();
        
        // Config police
        $pdf->SetFont('Helvetica', 'B', 16);
        
        // Titre
        $pdf->SetXY(20, 20);
        $pdf->Write(10, 'BeleschBox Bestellformular');
        
        $pdf->SetFont('Helvetica', '', 12);
        
        // Informations personnelles
        $y = 40;
        $pdf->SetXY(20, $y);
        $pdf->Write(10, 'Geschlecht: ' . ($userData['gender'] ?? ''));
        
        $y += 10;
        $pdf->SetXY(20, $y);
        $pdf->Write(10, 'Vorname: ' . ($userData['first_name'] ?? ''));
        
        $y += 10;
        $pdf->SetXY(20, $y);
        $pdf->Write(10, 'Nachname: ' . ($userData['last_name'] ?? ''));
        
        $y += 10;
        $pdf->SetXY(20, $y);
        $pdf->Write(10, 'Straße: ' . ($userData['street'] ?? ''));
        
        $y += 10;
        $pdf->SetXY(20, $y);
        $pdf->Write(10, 'PLZ: ' . ($userData['zip'] ?? ''));
        
        $y += 10;
        $pdf->SetXY(20, $y);
        $pdf->Write(10, 'Stadt: ' . ($userData['city'] ?? ''));
        
        $y += 10;
        $pdf->SetXY(20, $y);
        $pdf->Write(10, 'Telefon: ' . ($userData['phone'] ?? ''));
        
        // BeleschBox
        $y += 20;
        $pdf->SetXY(20, $y);
        $pdf->Write(10, 'BeleschBox: ' . ($cartData['beleschbox_number'] ?? 'Individuell'));
        
        // Produits
        if (!empty($cartData['products'])) {
            $y += 15;
            $pdf->SetXY(20, $y);
            $pdf->Write(10, 'Produkte:');
            
            foreach ($cartData['products'] as $product) {
                $y += 10;
                $line = '- ' . ($product['name'] ?? '') . ' (Menge: ' . ($product['quantity'] ?? 1) . ')';
                $pdf->SetXY(25, $y);
                $pdf->Write(10, $line);
            }
        }
        
        // Date
        $y += 20;
        $pdf->SetXY(20, $y);
        $pdf->Write(10, 'Datum: ' . date('d.m.Y'));
        
        // Sauvegarde du PDF généré
        $outputPath = storage_path('app/public/generated_pdfs/order_' . time() . '.pdf');
        if (!file_exists(dirname($outputPath))) {
            mkdir(dirname($outputPath), 0755, true);
        }

        $pdf->Output('F', $outputPath);

        return $outputPath;
    }

    /**
     * Génère un PDF simple sans template (fallback) et retourne en base64
     */
    private function generateSimplePdfBase64(array $userData, array $cartData = [], $signatureData = null)
    {
        $pdf = new Fpdi();
        $pdf->AddPage();
        
        // Config police
        $pdf->SetFont('Helvetica', 'B', 16);
        
        // Titre
        $pdf->SetXY(20, 20);
        $pdf->Write(10, 'BeleschBox Bestellformular');
        
        $pdf->SetFont('Helvetica', '', 12);
        
        // Informations personnelles
        $y = 40;
        $pdf->SetXY(20, $y);
        $pdf->Write(10, 'Geschlecht: ' . ($userData['gender'] ?? ''));
        
        $y += 10;
        $pdf->SetXY(20, $y);
        $pdf->Write(10, 'Vorname: ' . ($userData['first_name'] ?? ''));
        
        $y += 10;
        $pdf->SetXY(20, $y);
        $pdf->Write(10, 'Nachname: ' . ($userData['last_name'] ?? ''));
        
        $y += 10;
        $pdf->SetXY(20, $y);
        $pdf->Write(10, 'Straße: ' . ($userData['street'] ?? ''));
        
        $y += 10;
        $pdf->SetXY(20, $y);
        $pdf->Write(10, 'PLZ: ' . ($userData['zip'] ?? ''));
        
        $y += 10;
        $pdf->SetXY(20, $y);
        $pdf->Write(10, 'Stadt: ' . ($userData['city'] ?? ''));
        
        $y += 10;
        $pdf->SetXY(20, $y);
        $pdf->Write(10, 'Telefon: ' . ($userData['phone'] ?? ''));
        
        // BeleschBox
        $y += 20;
        $pdf->SetXY(20, $y);
        $pdf->Write(10, 'BeleschBox: ' . ($cartData['beleschbox_number'] ?? 'Individuell'));
        
        // Produits
        if (!empty($cartData['products'])) {
            $y += 15;
            $pdf->SetXY(20, $y);
            $pdf->Write(10, 'Produkte:');
            
            foreach ($cartData['products'] as $product) {
                $y += 10;
                $line = '- ' . ($product['name'] ?? '') . ' (Menge: ' . ($product['quantity'] ?? 1) . ')';
                $pdf->SetXY(25, $y);
                $pdf->Write(10, $line);
            }
        }
        
        // Date
        $y += 20;
        $pdf->SetXY(20, $y);
        $pdf->Write(10, 'Datum: ' . date('d.m.Y'));
        
        // Retourner le contenu en base64
        return base64_encode($pdf->Output('S'));
    }
}
