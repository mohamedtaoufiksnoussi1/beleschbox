<?php

namespace App\Services;

use Dompdf\Dompdf;
use Dompdf\Options;

class PdfGeneratorService
{
    private $templatePath;

    public function __construct()
    {
        $this->templatePath = base_path('app/templates/Bestellformular_template.html');
    }

    /**
     * Génère un PDF basé sur les données utilisateur et le panier
     */
    public function generateOrderForm(array $userData, array $cartData = [], $signatureData = null)
    {
        \Log::info('PDF Generation - User Data:', $userData);
        \Log::info('PDF Generation - Cart Data:', $cartData);
        \Log::info('PDF Generation - Signature Data:', $signatureData);

        try {
            // Essayer d'utiliser le template HTML d'abord
            if (file_exists($this->templatePath)) {
                \Log::info('Using HTML template for PDF generation');
                return $this->generateFromHtmlTemplate($userData, $cartData, $signatureData);
            } else {
                \Log::error('HTML template not found at: ' . $this->templatePath);
            }
        } catch (\Exception $e) {
            \Log::error('Error using HTML template: ' . $e->getMessage());
        }

        // Fallback vers PDF simple
        \Log::info('Falling back to simple PDF generation');
        return $this->generateSimplePdf($userData, $cartData, $signatureData);
    }

    /**
     * Génère un PDF basé sur le template HTML et retourne en base64
     */
    public function generateOrderFormBase64(array $userData, array $cartData = [], $signatureData = null)
    {
        \Log::info('PDF service instantiated');
        
        try {
            // TOUJOURS utiliser le template exact de l'étape 5
            \Log::info('Using EXACT step 5 template for PDF generation');
            return $this->generateExactStep5Pdf($userData, $cartData, $signatureData);
        } catch (\Exception $e) {
            \Log::error('Error in PDF generation: ' . $e->getMessage());
            \Log::error('Stack trace: ' . $e->getTraceAsString());
            
            // Fallback vers PDF simple
            \Log::info('Falling back to simple PDF generation');
            return $this->generateSimplePdf($userData, $cartData, $signatureData);
        }
    }

    /**
     * Génère un PDF basé sur le HTML exact de l'étape 5 (même principe que printPageArea1)
     */
    private function generateExactStep5Pdf(array $userData, array $cartData = [], $signatureData = null)
    {
        \Log::info('Generating PDF with EXACT step 5 HTML (same principle as printPageArea1)');
        
        // Utiliser le HTML exact de l'étape 5 - même principe que document.getElementById(areaID).innerHTML
        $htmlContent = $this->getExactStep5InnerHTML($userData, $cartData, $signatureData);
        \Log::info('Step 5 innerHTML generated, length: ' . strlen($htmlContent));
        
        // Debug: sauvegarder le HTML généré pour inspection
        $debugHtmlPath = storage_path('app/debug_step5_innerHTML.html');
        file_put_contents($debugHtmlPath, $htmlContent);
        \Log::info('Step 5 innerHTML saved to: ' . $debugHtmlPath);
        
        // Créer le PDF avec DomPDF (même principe que window.print())
        $options = new Options();
        $options->set('defaultFont', 'Arial');
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
        
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($htmlContent);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        
        $output = $dompdf->output();
        $base64 = base64_encode($output);
        
        \Log::info('PDF generated successfully with step 5 innerHTML, base64 length: ' . strlen($base64));
        
        return $base64;
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
        
        // Créer le PDF avec DomPDF
        $options = new Options();
        $options->set('defaultFont', 'Arial');
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
        
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($htmlContent);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        
        return $dompdf->output();
    }

    /**
     * Génère un PDF basé sur le template HTML et retourne en base64
     */
    private function generateFromHtmlTemplateBase64(array $userData, array $cartData = [], $signatureData = null)
    {
        \Log::info('Using EXACT step 5 template for PDF generation');
        
        // Utiliser le HTML exact de l'étape 5
        $htmlContent = $this->generateExactStep5Html($userData, $cartData, $signatureData);
        \Log::info('Step 5 HTML generated, length: ' . strlen($htmlContent));
        
        // Debug: sauvegarder le HTML généré pour inspection
        $debugHtmlPath = storage_path('app/debug_step5_exact.html');
        file_put_contents($debugHtmlPath, $htmlContent);
        \Log::info('Step 5 HTML saved to: ' . $debugHtmlPath);
        
        // Créer le PDF avec DomPDF
        $options = new Options();
        $options->set('defaultFont', 'Arial');
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
        
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($htmlContent);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        
        $output = $dompdf->output();
        $base64 = base64_encode($output);
        
        \Log::info('PDF generated successfully, base64 length: ' . strlen($base64));
        
        return $base64;
    }

    /**
     * Remplace les placeholders dans le HTML
     */
    private function replaceHtmlPlaceholders($htmlContent, array $userData, array $cartData = [], $signatureData = null)
    {
        \Log::info('Starting HTML placeholders replacement...');
        \Log::info('PDF Generation - User Data: ' . json_encode($userData));
        \Log::info('PDF Generation - Cart Data: ' . json_encode($cartData));
        
        // Charger les images en base64
        $logoBase64 = '';
        $cubeBase64 = '';
        
        if (file_exists(public_path('frontend/assets/images/logo/belesch-logo-light.png'))) {
            $logoPath = public_path('frontend/assets/images/logo/belesch-logo-light.png');
            
            // Créer une version redimensionnée et la sauvegarder
            $originalImage = imagecreatefrompng($logoPath);
            $originalWidth = imagesx($originalImage);
            $originalHeight = imagesy($originalImage);
            
            // Redimensionner à 100px de largeur (hauteur proportionnelle)
            $newWidth = 100;
            $newHeight = intval(($originalHeight * $newWidth) / $originalWidth);
            
            $resizedImage = imagecreatetruecolor($newWidth, $newHeight);
            imagealphablending($resizedImage, false);
            imagesavealpha($resizedImage, true);
            
            imagecopyresampled($resizedImage, $originalImage, 0, 0, 0, 0, $newWidth, $newHeight, $originalWidth, $originalHeight);
            
            // Sauvegarder l'image redimensionnée
            $resizedPath = public_path('frontend/assets/images/logo/belesch-logo-small.png');
            imagepng($resizedImage, $resizedPath);
            
            // Convertir en base64
            $imageData = file_get_contents($resizedPath);
            $logoBase64 = 'data:image/png;base64,' . base64_encode($imageData);
            \Log::info('Logo image found and converted to base64 (resized), length: ' . strlen($logoBase64));
            
            // Nettoyer la mémoire
            imagedestroy($originalImage);
            imagedestroy($resizedImage);
        } else {
            \Log::warning('Logo image not found at: ' . public_path('frontend/assets/images/logo/belesch-logo-light.png'));
        }
        
        if (file_exists(public_path('frontend/assets/images/cubes/cube_blue.png'))) {
            $cubePath = public_path('frontend/assets/images/cubes/cube_blue.png');
            $cubeBase64 = 'data:image/png;base64,' . base64_encode(file_get_contents($cubePath));
            \Log::info('Cube image found and converted to base64, length: ' . strlen($cubeBase64));
        } else {
            \Log::warning('Cube image not found at: ' . public_path('frontend/assets/images/cubes/cube_blue.png'));
        }
        
        // Remplacer les placeholders d'assets
        // Copier l'image dans le dossier de stockage temporaire
        $originalLogoPath = public_path('frontend/assets/images/logo/belesch-logo-light.png');
        $tempLogoPath = storage_path('app/temp_logo.png');
        
        if (file_exists($originalLogoPath)) {
            copy($originalLogoPath, $tempLogoPath);
            $htmlContent = str_replace('{{ASSET_LOGO}}', '<img src="file://' . $tempLogoPath . '" alt="BeleschBox Logo" style="height: 80px; width: auto; margin-bottom: 10px;">', $htmlContent);
            \Log::info('Logo copied to temp path: ' . $tempLogoPath);
        } else {
            $htmlContent = str_replace('{{ASSET_LOGO}}', '', $htmlContent);
            \Log::warning('Logo not found at: ' . $originalLogoPath);
        }
        $htmlContent = str_replace('{{ASSET_CUBE}}', '<img src="' . $cubeBase64 . '" alt="BeleschBox" style="width: 85px; height: 85px; margin-right: 8px; object-fit: contain;">', $htmlContent);
        
        // Informations personnelles
        $htmlContent = str_replace('{{FIRST_NAME}}', $userData['first_name'] ?? '');
        $htmlContent = str_replace('{{LAST_NAME}}', $userData['last_name'] ?? '');
        
        // Genre
        $htmlContent = str_replace('{{GENDER_FRAU_CHECKED}}', ($userData['gender'] ?? '') === 'Frau' ? '✓' : '');
        $htmlContent = str_replace('{{GENDER_HERR_CHECKED}}', ($userData['gender'] ?? '') === 'Herr' ? '✓' : '');
        
        // Pflegegrad
        $pflegegrad = $userData['pflegegrad'] ?? '';
        if (is_numeric($pflegegrad)) {
            $htmlContent = str_replace('{{PFLEGEGRAD_' . $pflegegrad . '_CHECKED}}', '✓');
        }
        // Nettoyer les autres pflegegrad
        for ($i = 1; $i <= 5; $i++) {
            if ($i != $pflegegrad) {
                $htmlContent = str_replace('{{PFLEGEGRAD_' . $i . '_CHECKED}}', '');
            }
        }
        
        // BeleschBox selection
        $beleschboxNumber = $cartData['beleschbox_number'] ?? '';
        if (is_numeric($beleschboxNumber)) {
            $htmlContent = str_replace('{{BELESCHBOX_' . $beleschboxNumber . '_CHECKED}}', '✓');
        }
        // Nettoyer les autres beleschbox
        for ($i = 1; $i <= 6; $i++) {
            if ($i != $beleschboxNumber) {
                $htmlContent = str_replace('{{BELESCHBOX_' . $i . '_CHECKED}}', '');
            }
        }
        
        // BeleschBox Individuell
        if ($beleschboxNumber === 'Individuell' || !is_numeric($beleschboxNumber)) {
            $htmlContent = str_replace('{{BELESCHBOX_INDIVIDUELL_CHECKED}}', '✓');
            
            // Afficher les produits personnalisés
            $customProductsHtml = '';
            if (isset($cartData['products']) && is_array($cartData['products'])) {
                foreach ($cartData['products'] as $product) {
                    $customProductsHtml .= '<div style="border-bottom: 1px solid #ddd; height: 16px; margin-bottom: 6px; width: 100%; padding: 2px 0;">';
                    $customProductsHtml .= $product['quantity'] . 'x ' . $product['name'];
                    $customProductsHtml .= '</div>';
                }
            }
            $htmlContent = str_replace('{{CUSTOM_PRODUCTS}}', $customProductsHtml);
        } else {
            $htmlContent = str_replace('{{BELESCHBOX_INDIVIDUELL_CHECKED}}', '');
            $htmlContent = str_replace('{{CUSTOM_PRODUCTS}}', '');
        }
        
        // Handschuhgröße
        $gloveSize = $cartData['glove_size'] ?? '';
        if ($gloveSize) {
            $htmlContent = str_replace('{{GLOVE_SIZE_' . strtoupper($gloveSize) . '_CHECKED}}', '✓');
            $htmlContent = str_replace('{{GLOVE_SECTION_DISPLAY}}', '');
        } else {
            $htmlContent = str_replace('{{GLOVE_SECTION_DISPLAY}}', 'display: none;');
        }
        // Nettoyer les autres tailles de gants
        $sizes = ['S', 'M', 'L', 'XL'];
        foreach ($sizes as $size) {
            if (strtoupper($gloveSize) !== $size) {
                $htmlContent = str_replace('{{GLOVE_SIZE_' . $size . '_CHECKED}}', '');
            }
        }
        
        // Bettschutzeinlagen
        $bettSchutz = $userData['bett_schutz'] ?? '';
        for ($i = 1; $i <= 4; $i++) {
            $checked = ($bettSchutz == $i) ? '✓' : '';
            $htmlContent = str_replace('{{BETTSCHUTZ_' . $i . '_CHECKED}}', $checked);
        }
        
        // Signature
        $signatureHtml = '';
        if ($signatureData && isset($signatureData['image_path']) && $signatureData['image_path']) {
            \Log::info('Processing signature data for PDF: ' . substr($signatureData['image_path'], 0, 50) . '...');
            
            // Vérifier si c'est déjà en base64
            if (strpos($signatureData['image_path'], 'data:image/') === 0) {
                // C'est déjà en base64, utiliser directement
                $signatureHtml = '<img src="' . $signatureData['image_path'] . '" alt="Signature" style="max-width: 200px; max-height: 100px; border: 1px solid #ddd; padding: 4px;">';
                \Log::info('Using base64 signature data directly');
            } else {
                // C'est un chemin de fichier, utiliser url()
                $signatureHtml = '<img src="' . url($signatureData['image_path']) . '" alt="Signature" style="max-width: 200px; max-height: 100px; border: 1px solid #ddd; padding: 4px;">';
                \Log::info('Using file path for signature: ' . $signatureData['image_path']);
            }
        } else {
            \Log::info('No signature data available for PDF');
        }
        $htmlContent = str_replace('{{SIGNATURE_IMAGE}}', $signatureHtml);
        
        // Date
        $htmlContent = str_replace('{{DATE}}', date('d.m.Y'));
        
        \Log::info('HTML placeholders replacement completed');
        
        return $htmlContent;
    }


    /**
     * Récupère le HTML exact de l'étape 5 (même principe que document.getElementById('printPageArea1').innerHTML)
     */
    private function getExactStep5InnerHTML(array $userData, array $cartData = [], $signatureData = null)
    {
        \Log::info('Getting EXACT step 5 innerHTML (same as document.getElementById)');
        
        // Charger les images en base64
        $logoBase64 = '';
        $cubeBase64 = '';
        
        if (file_exists(public_path('frontend/assets/images/logo/belesch-logo-light.png'))) {
            $logoPath = public_path('frontend/assets/images/logo/belesch-logo-light.png');
            
            // Utiliser une image plus petite si disponible
            $smallLogoPath = public_path('frontend/assets/images/logo/logo-light.png');
            if (file_exists($smallLogoPath)) {
                $logoPath = $smallLogoPath;
                \Log::info('Using smaller logo: ' . $smallLogoPath);
            }
            
            $logoBase64 = 'data:image/png;base64,' . base64_encode(file_get_contents($logoPath));
            \Log::info('Logo image converted to base64, length: ' . strlen($logoBase64));
        }
        
        if (file_exists(public_path('frontend/assets/images/cubes/cube_blue.png'))) {
            $cubePath = public_path('frontend/assets/images/cubes/cube_blue.png');
            $cubeBase64 = 'data:image/png;base64,' . base64_encode(file_get_contents($cubePath));
        }
        
        // Préparer les données exactement comme dans l'étape 5
        $boxChecked = [];
        for ($i = 1; $i <= 6; $i++) {
            $boxChecked[$i] = ($cartData['beleschbox_number'] ?? '') == $i ? '✓' : '';
        }
        
        $individuellChecked = ($cartData['beleschbox_number'] ?? '') === 'Individuell' ? '✓' : '';
        
        // Produits personnalisés
        $customProductsHtml = '';
        if (isset($cartData['products']) && is_array($cartData['products'])) {
            foreach ($cartData['products'] as $product) {
                $customProductsHtml .= '<div style="border-bottom: 1px solid #ddd; height: 16px; margin-bottom: 6px; width: 100%; padding: 2px 0;">';
                $customProductsHtml .= $product['quantity'] . 'x ' . $product['name'];
                $customProductsHtml .= '</div>';
            }
        }
        
        // Gants
        $gloveChecked = ['S' => '', 'M' => '', 'L' => '', 'XL' => ''];
        $gloveSize = $cartData['glove_size'] ?? '';
        if ($gloveSize) {
            $gloveChecked[strtoupper($gloveSize)] = '✓';
        }
        
        $gloveSectionDisplay = $gloveSize ? '' : 'display: none;';
        
        // Signature - Traitement direct
        $signatureHtml = '';
        if ($signatureData && isset($signatureData['image_path']) && $signatureData['image_path']) {
            \Log::info('Processing signature data for PDF: ' . substr($signatureData['image_path'], 0, 50) . '...');
            
            // Vérifier si c'est déjà en base64
            if (strpos($signatureData['image_path'], 'data:image/') === 0) {
                // C'est déjà en base64, utiliser directement
                $signatureHtml = '<img src="' . $signatureData['image_path'] . '" alt="Signature" style="max-width: 200px; max-height: 100px; border: 1px solid #ddd; padding: 4px;">';
                \Log::info('Using base64 signature data directly');
            } else {
                // C'est un chemin de fichier, utiliser url()
                $signatureHtml = '<img src="' . url($signatureData['image_path']) . '" alt="Signature" style="max-width: 200px; max-height: 100px; border: 1px solid #ddd; padding: 4px;">';
                \Log::info('Using file path for signature: ' . $signatureData['image_path']);
            }
        } else {
            \Log::info('No signature data available for PDF');
        }
        
        // Générer le HTML exact de printPageArea1.innerHTML
        $html = '<div style="font-family: Arial, sans-serif; max-width: 800px; margin: 0 auto; padding: 20px; background: white;">
            <!-- Header -->
            <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 30px;">
                <div>
                    <h1 style="color: #333; font-size: 28px; font-weight: bold; margin: 0 0 10px 0; font-family: serif;">
                        Auswahl der gewünschten BeleschBox
                    </h1>
                    <div style="color: #009ee1; font-size: 16px; font-weight: bold; margin-bottom: 8px;">
                        Lieferinformationen angeben
                    </div>
                    <div style="font-size: 14px; margin-bottom: 20px;">
                        Versicherte/r (gemäß Antrag auf Kostenübernahme):
                    </div>
                </div>
                <div style="text-align: right;">
                    <img src="' . $logoBase64 . '" alt="BeleschBox Logo" style="height: 80px; width: auto; margin-bottom: 10px;">
                </div>
            </div>

            <!-- Personal Information -->
            <div style="margin-bottom: 30px;">
                <div style="display: flex; align-items: center; margin-bottom: 15px;">
                    <div style="display: flex; align-items: center; margin-right: 30px;">
                        <div style="width: 20px; height: 20px; border: 2px solid #333; margin-right: 8px; display: flex; align-items: center; justify-content: center;">' . (($userData['gender'] ?? '') === 'Frau' ? '✓' : '') . '</div>
                        <span>Frau</span>
                    </div>
                    <div style="display: flex; align-items: center; margin-right: 30px;">
                        <div style="width: 20px; height: 20px; border: 2px solid #333; margin-right: 8px; display: flex; align-items: center; justify-content: center;">' . (($userData['gender'] ?? '') === 'Herr' ? '✓' : '') . '</div>
                        <span>Herr</span>
                    </div>
                </div>
                
                <div style="display: flex; margin-bottom: 15px;">
                    <div style="margin-right: 40px;">
                        <span>Vorname:</span>
                        <div style="border-bottom: 1px solid #333; width: 200px; display: inline-block; margin-left: 10px;">
                            <span style="padding: 0 5px;">' . ($userData['first_name'] ?? '') . '</span>
                        </div>
                    </div>
                    <div>
                        <span>Nachname:</span>
                        <div style="border-bottom: 1px solid #333; width: 200px; display: inline-block; margin-left: 10px;">
                            <span style="padding: 0 5px;">' . ($userData['last_name'] ?? '') . '</span>
                        </div>
                    </div>
                </div>

                <div style="margin-bottom: 15px;">
                    <span>Pflegegrad:</span>
                    <div style="display: inline-flex; margin-left: 20px;">
                        <div style="display: flex; align-items: center; margin-right: 20px;">
                            <div style="width: 20px; height: 20px; border: 2px solid #333; margin-right: 8px; display: flex; align-items: center; justify-content: center;">' . (($userData['pflegegrad'] ?? '') === '1' ? '✓' : '') . '</div>
                            <span>1</span>
                        </div>
                        <div style="display: flex; align-items: center; margin-right: 20px;">
                            <div style="width: 20px; height: 20px; border: 2px solid #333; margin-right: 8px; display: flex; align-items: center; justify-content: center;">' . (($userData['pflegegrad'] ?? '') === '2' ? '✓' : '') . '</div>
                            <span>2</span>
                        </div>
                        <div style="display: flex; align-items: center; margin-right: 20px;">
                            <div style="width: 20px; height: 20px; border: 2px solid #333; margin-right: 8px; display: flex; align-items: center; justify-content: center;">' . (($userData['pflegegrad'] ?? '') === '3' ? '✓' : '') . '</div>
                            <span>3</span>
                        </div>
                        <div style="display: flex; align-items: center; margin-right: 20px;">
                            <div style="width: 20px; height: 20px; border: 2px solid #333; margin-right: 8px; display: flex; align-items: center; justify-content: center;">' . (($userData['pflegegrad'] ?? '') === '4' ? '✓' : '') . '</div>
                            <span>4</span>
                        </div>
                        <div style="display: flex; align-items: center;">
                            <div style="width: 20px; height: 20px; border: 2px solid #333; margin-right: 8px; display: flex; align-items: center; justify-content: center;">' . (($userData['pflegegrad'] ?? '') === '5' ? '✓' : '') . '</div>
                            <span>5</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- BeleschBox Selection -->
            <div style="margin-bottom: 30px;">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-bottom: 15px;">
                    <!-- BeleschBox 1 -->
                    <div style="border: 1px solid #ddd; padding: 12px; position: relative;">
                        <div style="display: flex; align-items: center; margin-bottom: 8px;">
                            <div style="width: 14px; height: 14px; border: 1px solid #333; margin-right: 6px; display: flex; align-items: center; justify-content: center;">' . $boxChecked[1] . '</div>
                            <img src="' . $cubeBase64 . '" alt="BeleschBox" style="width: 85px; height: 85px; margin-right: 8px; object-fit: contain;">
                            <strong style="color: #009ee1; font-size: 13px; font-weight: bold;">BeleschBox 1</strong>
                        </div>
                        <div style="font-size: 10px; line-height: 1.2; color: #333; margin-left: 28px;">
                            2x 100 Stück Einmalhandschuhe<br>
                            500 ml Handdesinfektion<br>
                            500 ml Flächendesinfektion<br>
                            12 Stück FFP2 Masken
                        </div>
                    </div>

                    <!-- BeleschBox 2 -->
                    <div style="border: 1px solid #ddd; padding: 12px; position: relative;">
                        <div style="display: flex; align-items: center; margin-bottom: 8px;">
                            <div style="width: 14px; height: 14px; border: 1px solid #333; margin-right: 6px; display: flex; align-items: center; justify-content: center;">' . $boxChecked[2] . '</div>
                            <img src="' . $cubeBase64 . '" alt="BeleschBox" style="width: 85px; height: 85px; margin-right: 8px; object-fit: contain;">
                            <strong style="color: #009ee1; font-size: 13px; font-weight: bold;">BeleschBox 2</strong>
                        </div>
                        <div style="font-size: 10px; line-height: 1.2; color: #333; margin-left: 28px;">
                            100 Stück Einmalhandschuhe<br>
                            2x 500 ml Handdesinfektion<br>
                            25 Stück Bettschutzeinlagen<br>
                            8 Stück FFP2 Masken
                        </div>
                    </div>

                    <!-- BeleschBox 3 -->
                    <div style="border: 1px solid #ddd; padding: 12px; position: relative;">
                        <div style="display: flex; align-items: center; margin-bottom: 8px;">
                            <div style="width: 14px; height: 14px; border: 1px solid #333; margin-right: 6px; display: flex; align-items: center; justify-content: center;">' . $boxChecked[3] . '</div>
                            <img src="' . $cubeBase64 . '" alt="BeleschBox" style="width: 85px; height: 85px; margin-right: 8px; object-fit: contain;">
                            <strong style="color: #009ee1; font-size: 13px; font-weight: bold;">BeleschBox 3</strong>
                        </div>
                        <div style="font-size: 10px; line-height: 1.2; color: #333; margin-left: 28px;">
                            1 Pack Desinfektionstücher<br>
                            1x 500 ml Handdesinfektion<br>
                            1x 500 ml Flächendesinfektion<br>
                            10 Stück FFP2 Masken
                        </div>
                    </div>

                    <!-- BeleschBox 4 -->
                    <div style="border: 1px solid #ddd; padding: 12px; position: relative;">
                        <div style="display: flex; align-items: center; margin-bottom: 8px;">
                            <div style="width: 14px; height: 14px; border: 1px solid #333; margin-right: 6px; display: flex; align-items: center; justify-content: center;">' . $boxChecked[4] . '</div>
                            <img src="' . $cubeBase64 . '" alt="BeleschBox" style="width: 85px; height: 85px; margin-right: 8px; object-fit: contain;">
                            <strong style="color: #009ee1; font-size: 13px; font-weight: bold;">BeleschBox 4</strong>
                        </div>
                        <div style="font-size: 10px; line-height: 1.2; color: #333; margin-left: 28px;">
                            2x 500 ml Flächendesinfektion<br>
                            2x 500 ml Handdesinfektion<br>
                            25 Stück Bettschutzeinlagen<br>
                            25 Stück FFP2 Masken
                        </div>
                    </div>

                    <!-- BeleschBox 5 -->
                    <div style="border: 1px solid #ddd; padding: 12px; position: relative;">
                        <div style="display: flex; align-items: center; margin-bottom: 8px;">
                            <div style="width: 14px; height: 14px; border: 1px solid #333; margin-right: 6px; display: flex; align-items: center; justify-content: center;">' . $boxChecked[5] . '</div>
                            <img src="' . $cubeBase64 . '" alt="BeleschBox" style="width: 85px; height: 85px; margin-right: 8px; object-fit: contain;">
                            <strong style="color: #009ee1; font-size: 13px; font-weight: bold;">BeleschBox 5</strong>
                        </div>
                        <div style="font-size: 10px; line-height: 1.2; color: #333; margin-left: 28px;">
                            2x 100 Stück Einmalhandschuhe<br>
                            500 ml Handdesinfektion<br>
                            1 Pack Desinfektionstücher<br>
                            4 Stück FFP2 Masken
                        </div>
                    </div>

                    <!-- BeleschBox 6 -->
                    <div style="border: 1px solid #ddd; padding: 12px; position: relative;">
                        <div style="display: flex; align-items: center; margin-bottom: 8px;">
                            <div style="width: 14px; height: 14px; border: 1px solid #333; margin-right: 6px; display: flex; align-items: center; justify-content: center;">' . $boxChecked[6] . '</div>
                            <img src="' . $cubeBase64 . '" alt="BeleschBox" style="width: 85px; height: 85px; margin-right: 8px; object-fit: contain;">
                            <strong style="color: #009ee1; font-size: 13px; font-weight: bold;">BeleschBox 6</strong>
                        </div>
                        <div style="font-size: 10px; line-height: 1.2; color: #333; margin-left: 28px;">
                            100 Stück Einmalhandschuhe<br>
                            500 ml Handdesinfektion<br>
                            500 ml Flächendesinfektion<br>
                            25 Stück Bettschutzeinlagen<br>
                            6 Stück FFP2 Masken
                        </div>
                    </div>
                </div>

                <!-- BeleschBox Individuell -->
                <div style="border: 1px solid #ddd; padding: 12px; margin-bottom: 20px;">
                    <div style="display: flex; align-items: center; margin-bottom: 8px;">
                        <div style="width: 14px; height: 14px; border: 1px solid #333; margin-right: 6px; display: flex; align-items: center; justify-content: center;">' . $individuellChecked . '</div>
                        <img src="' . $cubeBase64 . '" alt="BeleschBox" style="width: 85px; height: 85px; margin-right: 8px; object-fit: contain;">
                        <strong style="color: #009ee1; font-size: 13px; font-weight: bold;">BeleschBox Individuell</strong>
                    </div>
                    <div style="margin-left: 28px; margin-top: 8px;">
                        <div style="border-bottom: 1px solid #ddd; height: 16px; margin-bottom: 6px; width: 100%;"></div>
                        <div style="border-bottom: 1px solid #ddd; height: 16px; margin-bottom: 6px; width: 100%;"></div>
                        <div style="border-bottom: 1px solid #ddd; height: 16px; margin-bottom: 6px; width: 100%;"></div>
                    </div>
                    <div style="margin-top: 5px;">
                        ' . $customProductsHtml . '
                    </div>
                </div>
            </div>

            <!-- Bettschutzeinlagen -->
            <div style="margin-bottom: 30px;">
                <div style="margin-bottom: 10px;">
                    <span style="font-weight: bold;">Wiederverwendbare Bettschutzeinlagen:</span>
                    <div style="display: inline-flex; margin-left: 20px;">
                        <div style="display: flex; align-items: center; margin-right: 20px;">
                            <div style="width: 20px; height: 20px; border: 2px solid #333; margin-right: 8px; display: flex; align-items: center; justify-content: center;">' . (($userData['bett_schutz'] ?? '') === '1' ? '✓' : '') . '</div>
                            <span>1</span>
                        </div>
                        <div style="display: flex; align-items: center; margin-right: 20px;">
                            <div style="width: 20px; height: 20px; border: 2px solid #333; margin-right: 8px; display: flex; align-items: center; justify-content: center;">' . (($userData['bett_schutz'] ?? '') === '2' ? '✓' : '') . '</div>
                            <span>2</span>
                        </div>
                        <div style="display: flex; align-items: center; margin-right: 20px;">
                            <div style="width: 20px; height: 20px; border: 2px solid #333; margin-right: 8px; display: flex; align-items: center; justify-content: center;">' . (($userData['bett_schutz'] ?? '') === '3' ? '✓' : '') . '</div>
                            <span>3</span>
                        </div>
                        <div style="display: flex; align-items: center; margin-right: 20px;">
                            <div style="width: 20px; height: 20px; border: 2px solid #333; margin-right: 8px; display: flex; align-items: center; justify-content: center;">' . (($userData['bett_schutz'] ?? '') === '4' ? '✓' : '') . '</div>
                            <span>4</span>
                        </div>
                    </div>
                </div>
                <div style="font-size: 12px; color: #666; margin-top: 5px;">
                    (Bis zu 250 Mal waschbar - Kostenfrei)
                </div>
            </div>

            <!-- Handschuhgröße -->
            <div style="margin-bottom: 30px; ' . $gloveSectionDisplay . '">
                <div style="margin-bottom: 10px;">
                    <span style="font-weight: bold;">Handschuhgröße:</span>
                    <div style="display: inline-flex; margin-left: 20px;">
                        <div style="display: flex; align-items: center; margin-right: 20px;">
                            <div style="width: 20px; height: 20px; border: 2px solid #333; margin-right: 8px; display: flex; align-items: center; justify-content: center;">' . $gloveChecked['S'] . '</div>
                            <span>S</span>
                        </div>
                        <div style="display: flex; align-items: center; margin-right: 20px;">
                            <div style="width: 20px; height: 20px; border: 2px solid #333; margin-right: 8px; display: flex; align-items: center; justify-content: center;">' . $gloveChecked['M'] . '</div>
                            <span>M</span>
                        </div>
                        <div style="display: flex; align-items: center; margin-right: 20px;">
                            <div style="width: 20px; height: 20px; border: 2px solid #333; margin-right: 8px; display: flex; align-items: center; justify-content: center;">' . $gloveChecked['L'] . '</div>
                            <span>L</span>
                        </div>
                        <div style="display: flex; align-items: center;">
                            <div style="width: 20px; height: 20px; border: 2px solid #333; margin-right: 8px; display: flex; align-items: center; justify-content: center;">' . $gloveChecked['XL'] . '</div>
                            <span>XL</span>
                        </div>
                    </div>
                </div>
                <div style="font-size: 12px; color: #666; margin-left: 20px;">
                    (Bei fehlender Angabe wird Größe M geliefert)
                </div>
            </div>

            <!-- Agreement Text -->
            <div style="margin-bottom: 30px; padding: 15px; border: 1px solid #ddd; background-color: #f9f9f9;">
                <p style="margin: 0; font-size: 14px; line-height: 1.5;">
                    Die von mir getroffene Auswahl der BeleschBox kann ich jeden Monat neu festlegen.<br>
                    Änderungen werde ich der MedicCos Inko&Care GmbH rechtzeitig mitteilen.
                </p>
            </div>

            <!-- Signature and Date -->
            <div style="margin-bottom: 20px;">
                <div style="margin-bottom: 8px;">
                    ' . $signatureHtml . '
                </div>
                <div style="display: flex; justify-content: space-between; align-items: flex-end;">
                    <div style="display: flex; flex-direction: column; align-items: center;">
                        <div style="border-bottom: 1px solid #333; width: 200px; height: 20px; margin-bottom: 5px;"></div>
                        <span>Unterschrift</span>
                    </div>
                    <div style="display: flex; flex-direction: column; align-items: center;">
                        <div style="border-bottom: 1px solid #333; width: 150px; height: 20px; margin-bottom: 5px;">
                            <span style="font-size: 12px; color: #333;">' . date('d.m.Y') . '</span>
                        </div>
                        <span>Datum</span>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div style="text-align: center; font-size: 12px; color: #666; border-top: 1px solid #ddd; padding-top: 10px;">
                MedicCos Inko&Care GmbH Lindenbergplatz 1 - 38126 Braunschweig | +49 (0) 531 51605712 | info@belesch-box.de
            </div>
        </div>';

        return $html;
    }

    /**
     * Génère le HTML exact de l'étape 5
     */
    private function generateExactStep5Html(array $userData, array $cartData = [], $signatureData = null)
    {
        // Charger les images en base64
        $logoBase64 = '';
        $cubeBase64 = '';
        
        if (file_exists(public_path('frontend/assets/images/logo/belesch-logo-light.png'))) {
            $logoPath = public_path('frontend/assets/images/logo/belesch-logo-light.png');
            $logoBase64 = 'data:image/png;base64,' . base64_encode(file_get_contents($logoPath));
        }
        
        if (file_exists(public_path('frontend/assets/images/cubes/cube_blue.png'))) {
            $cubePath = public_path('frontend/assets/images/cubes/cube_blue.png');
            $cubeBase64 = 'data:image/png;base64,' . base64_encode(file_get_contents($cubePath));
        }
        
        // Préparer les données
        $boxChecked = [];
        for ($i = 1; $i <= 6; $i++) {
            $boxChecked[$i] = ($cartData['beleschbox_number'] ?? '') == $i ? '✓' : '';
        }
        
        $individuellChecked = ($cartData['beleschbox_number'] ?? '') === 'Individuell' ? '✓' : '';
        
        // Produits personnalisés
        $customProductsHtml = '';
        if (isset($cartData['products']) && is_array($cartData['products'])) {
            foreach ($cartData['products'] as $product) {
                $customProductsHtml .= '<div style="border-bottom: 1px solid #ddd; height: 16px; margin-bottom: 6px; width: 100%; padding: 2px 0;">';
                $customProductsHtml .= $product['quantity'] . 'x ' . $product['name'];
                $customProductsHtml .= '</div>';
            }
        }
        
        // Gants
        $gloveChecked = ['S' => '', 'M' => '', 'L' => '', 'XL' => ''];
        $gloveSize = $cartData['glove_size'] ?? '';
        if ($gloveSize) {
            $gloveChecked[strtoupper($gloveSize)] = '✓';
        }
        
        $gloveSectionDisplay = $gloveSize ? '' : 'display: none;';
        
        // Signature
        $signatureHtml = '';
        if ($signatureData && isset($signatureData['image_path']) && $signatureData['image_path']) {
            \Log::info('Processing signature data: ' . substr($signatureData['image_path'], 0, 50) . '...');
            
            // Vérifier si c'est déjà en base64
            if (strpos($signatureData['image_path'], 'data:image/') === 0) {
                // C'est déjà en base64, utiliser directement
                $signatureHtml = '<img src="' . $signatureData['image_path'] . '" alt="Signature" style="max-width: 200px; max-height: 100px; border: 1px solid #ddd; padding: 4px;">';
                \Log::info('Using base64 signature data directly');
            } else {
                // C'est un chemin de fichier, utiliser url()
                $signatureHtml = '<img src="' . url($signatureData['image_path']) . '" alt="Signature" style="max-width: 200px; max-height: 100px; border: 1px solid #ddd; padding: 4px;">';
                \Log::info('Using file path for signature: ' . $signatureData['image_path']);
            }
        } else {
            \Log::info('No signature data available');
        }
        
        // Générer le HTML exact de l'étape 5
        $html = '<div style="font-family: Arial, sans-serif; max-width: 800px; margin: 0 auto; padding: 20px; background: white;">
            <!-- Header -->
            <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 30px;">
                <div>
                    <h1 style="color: #333; font-size: 28px; font-weight: bold; margin: 0 0 10px 0; font-family: serif;">
                        Auswahl der gewünschten BeleschBox
                    </h1>
                    <div style="color: #009ee1; font-size: 16px; font-weight: bold; margin-bottom: 8px;">
                        Lieferinformationen angeben
                    </div>
                    <div style="font-size: 14px; margin-bottom: 20px;">
                        Versicherte/r (gemäß Antrag auf Kostenübernahme):
                    </div>
                </div>
                <div style="text-align: right;">
                    <img src="' . $logoBase64 . '" alt="BeleschBox Logo" style="height: 80px; width: auto; margin-bottom: 10px;">
                </div>
            </div>

            <!-- Personal Information -->
            <div style="margin-bottom: 30px;">
                <div style="display: flex; align-items: center; margin-bottom: 15px;">
                    <div style="display: flex; align-items: center; margin-right: 30px;">
                        <div style="width: 20px; height: 20px; border: 2px solid #333; margin-right: 8px; display: flex; align-items: center; justify-content: center;">' . (($userData['gender'] ?? '') === 'Frau' ? '✓' : '') . '</div>
                        <span>Frau</span>
                    </div>
                    <div style="display: flex; align-items: center; margin-right: 30px;">
                        <div style="width: 20px; height: 20px; border: 2px solid #333; margin-right: 8px; display: flex; align-items: center; justify-content: center;">' . (($userData['gender'] ?? '') === 'Herr' ? '✓' : '') . '</div>
                        <span>Herr</span>
                    </div>
                </div>
                
                <div style="display: flex; margin-bottom: 15px;">
                    <div style="margin-right: 40px;">
                        <span>Vorname:</span>
                        <div style="border-bottom: 1px solid #333; width: 200px; display: inline-block; margin-left: 10px;">
                            <span style="padding: 0 5px;">' . ($userData['first_name'] ?? '') . '</span>
                        </div>
                    </div>
                    <div>
                        <span>Nachname:</span>
                        <div style="border-bottom: 1px solid #333; width: 200px; display: inline-block; margin-left: 10px;">
                            <span style="padding: 0 5px;">' . ($userData['last_name'] ?? '') . '</span>
                        </div>
                    </div>
                </div>

                <div style="margin-bottom: 15px;">
                    <span>Pflegegrad:</span>
                    <div style="display: inline-flex; margin-left: 20px;">
                        <div style="display: flex; align-items: center; margin-right: 20px;">
                            <div style="width: 20px; height: 20px; border: 2px solid #333; margin-right: 8px; display: flex; align-items: center; justify-content: center;">' . (($userData['pflegegrad'] ?? '') === '1' ? '✓' : '') . '</div>
                            <span>1</span>
                        </div>
                        <div style="display: flex; align-items: center; margin-right: 20px;">
                            <div style="width: 20px; height: 20px; border: 2px solid #333; margin-right: 8px; display: flex; align-items: center; justify-content: center;">' . (($userData['pflegegrad'] ?? '') === '2' ? '✓' : '') . '</div>
                            <span>2</span>
                        </div>
                        <div style="display: flex; align-items: center; margin-right: 20px;">
                            <div style="width: 20px; height: 20px; border: 2px solid #333; margin-right: 8px; display: flex; align-items: center; justify-content: center;">' . (($userData['pflegegrad'] ?? '') === '3' ? '✓' : '') . '</div>
                            <span>3</span>
                        </div>
                        <div style="display: flex; align-items: center; margin-right: 20px;">
                            <div style="width: 20px; height: 20px; border: 2px solid #333; margin-right: 8px; display: flex; align-items: center; justify-content: center;">' . (($userData['pflegegrad'] ?? '') === '4' ? '✓' : '') . '</div>
                            <span>4</span>
                        </div>
                        <div style="display: flex; align-items: center;">
                            <div style="width: 20px; height: 20px; border: 2px solid #333; margin-right: 8px; display: flex; align-items: center; justify-content: center;">' . (($userData['pflegegrad'] ?? '') === '5' ? '✓' : '') . '</div>
                            <span>5</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- BeleschBox Selection -->
            <div style="margin-bottom: 30px;">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-bottom: 15px;">
                    <!-- BeleschBox 1 -->
                    <div style="border: 1px solid #ddd; padding: 12px; position: relative;">
                        <div style="display: flex; align-items: center; margin-bottom: 8px;">
                            <div style="width: 14px; height: 14px; border: 1px solid #333; margin-right: 6px; display: flex; align-items: center; justify-content: center;">' . $boxChecked[1] . '</div>
                            <img src="' . $cubeBase64 . '" alt="BeleschBox" style="width: 85px; height: 85px; margin-right: 8px; object-fit: contain;">
                            <strong style="color: #009ee1; font-size: 13px; font-weight: bold;">BeleschBox 1</strong>
                        </div>
                        <div style="font-size: 10px; line-height: 1.2; color: #333; margin-left: 28px;">
                            2x 100 Stück Einmalhandschuhe<br>
                            500 ml Handdesinfektion<br>
                            500 ml Flächendesinfektion<br>
                            12 Stück FFP2 Masken
                        </div>
                    </div>

                    <!-- BeleschBox 2 -->
                    <div style="border: 1px solid #ddd; padding: 12px; position: relative;">
                        <div style="display: flex; align-items: center; margin-bottom: 8px;">
                            <div style="width: 14px; height: 14px; border: 1px solid #333; margin-right: 6px; display: flex; align-items: center; justify-content: center;">' . $boxChecked[2] . '</div>
                            <img src="' . $cubeBase64 . '" alt="BeleschBox" style="width: 85px; height: 85px; margin-right: 8px; object-fit: contain;">
                            <strong style="color: #009ee1; font-size: 13px; font-weight: bold;">BeleschBox 2</strong>
                        </div>
                        <div style="font-size: 10px; line-height: 1.2; color: #333; margin-left: 28px;">
                            100 Stück Einmalhandschuhe<br>
                            2x 500 ml Handdesinfektion<br>
                            25 Stück Bettschutzeinlagen<br>
                            8 Stück FFP2 Masken
                        </div>
                    </div>

                    <!-- BeleschBox 3 -->
                    <div style="border: 1px solid #ddd; padding: 12px; position: relative;">
                        <div style="display: flex; align-items: center; margin-bottom: 8px;">
                            <div style="width: 14px; height: 14px; border: 1px solid #333; margin-right: 6px; display: flex; align-items: center; justify-content: center;">' . $boxChecked[3] . '</div>
                            <img src="' . $cubeBase64 . '" alt="BeleschBox" style="width: 85px; height: 85px; margin-right: 8px; object-fit: contain;">
                            <strong style="color: #009ee1; font-size: 13px; font-weight: bold;">BeleschBox 3</strong>
                        </div>
                        <div style="font-size: 10px; line-height: 1.2; color: #333; margin-left: 28px;">
                            1 Pack Desinfektionstücher<br>
                            1x 500 ml Handdesinfektion<br>
                            1x 500 ml Flächendesinfektion<br>
                            10 Stück FFP2 Masken
                        </div>
                    </div>

                    <!-- BeleschBox 4 -->
                    <div style="border: 1px solid #ddd; padding: 12px; position: relative;">
                        <div style="display: flex; align-items: center; margin-bottom: 8px;">
                            <div style="width: 14px; height: 14px; border: 1px solid #333; margin-right: 6px; display: flex; align-items: center; justify-content: center;">' . $boxChecked[4] . '</div>
                            <img src="' . $cubeBase64 . '" alt="BeleschBox" style="width: 85px; height: 85px; margin-right: 8px; object-fit: contain;">
                            <strong style="color: #009ee1; font-size: 13px; font-weight: bold;">BeleschBox 4</strong>
                        </div>
                        <div style="font-size: 10px; line-height: 1.2; color: #333; margin-left: 28px;">
                            2x 500 ml Flächendesinfektion<br>
                            2x 500 ml Handdesinfektion<br>
                            25 Stück Bettschutzeinlagen<br>
                            25 Stück FFP2 Masken
                        </div>
                    </div>

                    <!-- BeleschBox 5 -->
                    <div style="border: 1px solid #ddd; padding: 12px; position: relative;">
                        <div style="display: flex; align-items: center; margin-bottom: 8px;">
                            <div style="width: 14px; height: 14px; border: 1px solid #333; margin-right: 6px; display: flex; align-items: center; justify-content: center;">' . $boxChecked[5] . '</div>
                            <img src="' . $cubeBase64 . '" alt="BeleschBox" style="width: 85px; height: 85px; margin-right: 8px; object-fit: contain;">
                            <strong style="color: #009ee1; font-size: 13px; font-weight: bold;">BeleschBox 5</strong>
                        </div>
                        <div style="font-size: 10px; line-height: 1.2; color: #333; margin-left: 28px;">
                            2x 100 Stück Einmalhandschuhe<br>
                            500 ml Handdesinfektion<br>
                            1 Pack Desinfektionstücher<br>
                            4 Stück FFP2 Masken
                        </div>
                    </div>

                    <!-- BeleschBox 6 -->
                    <div style="border: 1px solid #ddd; padding: 12px; position: relative;">
                        <div style="display: flex; align-items: center; margin-bottom: 8px;">
                            <div style="width: 14px; height: 14px; border: 1px solid #333; margin-right: 6px; display: flex; align-items: center; justify-content: center;">' . $boxChecked[6] . '</div>
                            <img src="' . $cubeBase64 . '" alt="BeleschBox" style="width: 85px; height: 85px; margin-right: 8px; object-fit: contain;">
                            <strong style="color: #009ee1; font-size: 13px; font-weight: bold;">BeleschBox 6</strong>
                        </div>
                        <div style="font-size: 10px; line-height: 1.2; color: #333; margin-left: 28px;">
                            100 Stück Einmalhandschuhe<br>
                            500 ml Handdesinfektion<br>
                            500 ml Flächendesinfektion<br>
                            25 Stück Bettschutzeinlagen<br>
                            6 Stück FFP2 Masken
                        </div>
                    </div>
                </div>

                <!-- BeleschBox Individuell -->
                <div style="border: 1px solid #ddd; padding: 12px; margin-bottom: 20px;">
                    <div style="display: flex; align-items: center; margin-bottom: 8px;">
                        <div style="width: 14px; height: 14px; border: 1px solid #333; margin-right: 6px; display: flex; align-items: center; justify-content: center;">' . $individuellChecked . '</div>
                        <img src="' . $cubeBase64 . '" alt="BeleschBox" style="width: 85px; height: 85px; margin-right: 8px; object-fit: contain;">
                        <strong style="color: #009ee1; font-size: 13px; font-weight: bold;">BeleschBox Individuell</strong>
                    </div>
                    <div style="margin-left: 28px; margin-top: 8px;">
                        <div style="border-bottom: 1px solid #ddd; height: 16px; margin-bottom: 6px; width: 100%;"></div>
                        <div style="border-bottom: 1px solid #ddd; height: 16px; margin-bottom: 6px; width: 100%;"></div>
                        <div style="border-bottom: 1px solid #ddd; height: 16px; margin-bottom: 6px; width: 100%;"></div>
                    </div>
                    <div style="margin-top: 5px;">
                        ' . $customProductsHtml . '
                    </div>
                </div>
            </div>

            <!-- Bettschutzeinlagen -->
            <div style="margin-bottom: 30px;">
                <div style="margin-bottom: 10px;">
                    <span style="font-weight: bold;">Wiederverwendbare Bettschutzeinlagen:</span>
                    <div style="display: inline-flex; margin-left: 20px;">
                        <div style="display: flex; align-items: center; margin-right: 20px;">
                            <div style="width: 20px; height: 20px; border: 2px solid #333; margin-right: 8px; display: flex; align-items: center; justify-content: center;">' . (($userData['bett_schutz'] ?? '') === '1' ? '✓' : '') . '</div>
                            <span>1</span>
                        </div>
                        <div style="display: flex; align-items: center; margin-right: 20px;">
                            <div style="width: 20px; height: 20px; border: 2px solid #333; margin-right: 8px; display: flex; align-items: center; justify-content: center;">' . (($userData['bett_schutz'] ?? '') === '2' ? '✓' : '') . '</div>
                            <span>2</span>
                        </div>
                        <div style="display: flex; align-items: center; margin-right: 20px;">
                            <div style="width: 20px; height: 20px; border: 2px solid #333; margin-right: 8px; display: flex; align-items: center; justify-content: center;">' . (($userData['bett_schutz'] ?? '') === '3' ? '✓' : '') . '</div>
                            <span>3</span>
                        </div>
                        <div style="display: flex; align-items: center; margin-right: 20px;">
                            <div style="width: 20px; height: 20px; border: 2px solid #333; margin-right: 8px; display: flex; align-items: center; justify-content: center;">' . (($userData['bett_schutz'] ?? '') === '4' ? '✓' : '') . '</div>
                            <span>4</span>
                        </div>
                    </div>
                </div>
                <div style="font-size: 12px; color: #666; margin-top: 5px;">
                    (Bis zu 250 Mal waschbar - Kostenfrei)
                </div>
            </div>

            <!-- Handschuhgröße -->
            <div style="margin-bottom: 30px; ' . $gloveSectionDisplay . '">
                <div style="margin-bottom: 10px;">
                    <span style="font-weight: bold;">Handschuhgröße:</span>
                    <div style="display: inline-flex; margin-left: 20px;">
                        <div style="display: flex; align-items: center; margin-right: 20px;">
                            <div style="width: 20px; height: 20px; border: 2px solid #333; margin-right: 8px; display: flex; align-items: center; justify-content: center;">' . $gloveChecked['S'] . '</div>
                            <span>S</span>
                        </div>
                        <div style="display: flex; align-items: center; margin-right: 20px;">
                            <div style="width: 20px; height: 20px; border: 2px solid #333; margin-right: 8px; display: flex; align-items: center; justify-content: center;">' . $gloveChecked['M'] . '</div>
                            <span>M</span>
                        </div>
                        <div style="display: flex; align-items: center; margin-right: 20px;">
                            <div style="width: 20px; height: 20px; border: 2px solid #333; margin-right: 8px; display: flex; align-items: center; justify-content: center;">' . $gloveChecked['L'] . '</div>
                            <span>L</span>
                        </div>
                        <div style="display: flex; align-items: center;">
                            <div style="width: 20px; height: 20px; border: 2px solid #333; margin-right: 8px; display: flex; align-items: center; justify-content: center;">' . $gloveChecked['XL'] . '</div>
                            <span>XL</span>
                        </div>
                    </div>
                </div>
                <div style="font-size: 12px; color: #666; margin-left: 20px;">
                    (Bei fehlender Angabe wird Größe M geliefert)
                </div>
            </div>

            <!-- Agreement Text -->
            <div style="margin-bottom: 30px; padding: 15px; border: 1px solid #ddd; background-color: #f9f9f9;">
                <p style="margin: 0; font-size: 14px; line-height: 1.5;">
                    Die von mir getroffene Auswahl der BeleschBox kann ich jeden Monat neu festlegen.<br>
                    Änderungen werde ich der MedicCos Inko&Care GmbH rechtzeitig mitteilen.
                </p>
            </div>

            <!-- Signature and Date -->
            <div style="margin-bottom: 20px;">
                <div style="margin-bottom: 8px;">
                    ' . $signatureHtml . '
                </div>
                <div style="display: flex; justify-content: space-between; align-items: flex-end;">
                    <div style="display: flex; flex-direction: column; align-items: center;">
                        <div style="border-bottom: 1px solid #333; width: 200px; height: 20px; margin-bottom: 5px;"></div>
                        <span>Unterschrift</span>
                    </div>
                    <div style="display: flex; flex-direction: column; align-items: center;">
                        <div style="border-bottom: 1px solid #333; width: 150px; height: 20px; margin-bottom: 5px;">
                            <span style="font-size: 12px; color: #333;">' . date('d.m.Y') . '</span>
                        </div>
                        <span>Datum</span>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div style="text-align: center; font-size: 12px; color: #666; border-top: 1px solid #ddd; padding-top: 10px;">
                MedicCos Inko&Care GmbH Lindenbergplatz 1 - 38126 Braunschweig | +49 (0) 531 51605712 | info@belesch-box.de
            </div>
        </div>';

        return $html;
    }

    /**
     * Génère un PDF simple sans template (fallback)
     */
    private function generateSimplePdf(array $userData, array $cartData = [], $signatureData = null)
    {
        // Créer un PDF simple avec FPDF
        $pdf = new \setasign\Fpdi\Fpdi();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        
        // Titre
        $pdf->Cell(0, 10, 'BeleschBox Bestellformular', 0, 1, 'C');
        $pdf->Ln(10);
        
        // Informations utilisateur
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(0, 10, 'Personal Information:', 0, 1);
        $pdf->SetFont('Arial', '', 10);
        
        $y = 50;
        $pdf->SetXY(20, $y);
        $pdf->Write(10, 'Name: ' . ($userData['first_name'] ?? '') . ' ' . ($userData['last_name'] ?? ''));
        
        $y += 15;
        $pdf->SetXY(20, $y);
        $pdf->Write(10, 'Pflegegrad: ' . ($userData['pflegegrad'] ?? ''));
        
        $y += 15;
        $pdf->SetXY(20, $y);
        $pdf->Write(10, 'Address: ' . ($userData['street'] ?? '') . ', ' . ($userData['zip'] ?? '') . ' ' . ($userData['city'] ?? ''));
        
        $y += 15;
        $pdf->SetXY(20, $y);
        $pdf->Write(10, 'Phone: ' . ($userData['phone'] ?? ''));
        
        // Informations panier
        $y += 25;
        $pdf->SetXY(20, $y);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Write(10, 'BeleschBox Selection:');
        
        $y += 15;
        $pdf->SetXY(20, $y);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Write(10, 'Selected: ' . ($cartData['beleschbox_number'] ?? 'Individuell'));
        
        if (isset($cartData['products']) && is_array($cartData['products'])) {
            $y += 15;
            $pdf->SetXY(20, $y);
            $pdf->Write(10, 'Products:');
            
            foreach ($cartData['products'] as $product) {
                $y += 10;
                $pdf->SetXY(30, $y);
                $pdf->Write(10, '- ' . $product['quantity'] . 'x ' . $product['name']);
            }
        }
        
        if (isset($cartData['glove_size']) && $cartData['glove_size']) {
            $y += 15;
            $pdf->SetXY(20, $y);
            $pdf->Write(10, 'Glove Size: ' . $cartData['glove_size']);
        }
        
        // Signature
        if ($signatureData && isset($signatureData['image_path']) && $signatureData['image_path']) {
            $y += 25;
            $pdf->SetXY(20, $y);
            $pdf->Write(10, 'Signature: [Image]');
        }
        
        // Date
        $y += 20;
        $pdf->SetXY(20, $y);
        $pdf->Write(10, 'Datum: ' . date('d.m.Y'));
        
        // Retourner le contenu en base64
        return base64_encode($pdf->Output('S'));
    }
}
