<?php

namespace App\Helpers;

class SignatureHelper
{
    /**
     * Formate les données de signature pour le PDF
     */
    public static function formatSignatureForPdf($signatureData)
    {
        if (!$signatureData) {
            return null;
        }

        // Si c'est déjà un tableau avec image_path
        if (is_array($signatureData) && isset($signatureData['image_path'])) {
            // Ajouter mime_type si manquant
            if (!isset($signatureData['mime_type'])) {
                $signatureData['mime_type'] = self::getMimeType($signatureData['image_path']);
            }
            return $signatureData;
        }

        // Si c'est une chaîne base64 directe
        if (is_string($signatureData) && strpos($signatureData, 'data:image/') === 0) {
            return [
                'image_path' => $signatureData,
                'type' => 'base64',
                'size' => strlen($signatureData),
                'mime_type' => self::getMimeType($signatureData)
            ];
        }

        // Si c'est un chemin de fichier
        if (is_string($signatureData) && !strpos($signatureData, 'data:image/')) {
            return [
                'image_path' => $signatureData,
                'type' => 'file',
                'size' => file_exists($signatureData) ? filesize($signatureData) : 0,
                'mime_type' => self::getMimeType($signatureData)
            ];
        }

        return null;
    }

    /**
     * Détermine le type MIME d'une signature
     */
    private static function getMimeType($signatureData)
    {
        if (is_string($signatureData) && strpos($signatureData, 'data:image/') === 0) {
            // Extraire le type MIME depuis le data URI
            if (preg_match('/data:image\/([^;]+)/', $signatureData, $matches)) {
                return 'image/' . $matches[1];
            }
        } elseif (is_string($signatureData) && file_exists($signatureData)) {
            // Utiliser mime_content_type pour les fichiers
            $mimeType = mime_content_type($signatureData);
            return $mimeType ?: 'image/png'; // fallback
        }
        
        return 'image/png'; // fallback par défaut
    }

    /**
     * Valide les données de signature
     */
    public static function validateSignature($signatureData)
    {
        if (!$signatureData) {
            return false;
        }

        $formatted = self::formatSignatureForPdf($signatureData);
        
        if (!$formatted || !isset($formatted['image_path'])) {
            return false;
        }

        // Vérifier si c'est base64 valide
        if ($formatted['type'] === 'base64') {
            $base64Part = explode(',', $formatted['image_path'])[1] ?? '';
            return !empty($base64Part) && base64_decode($base64Part, true) !== false;
        }

        // Vérifier si le fichier existe
        if ($formatted['type'] === 'file') {
            return file_exists($formatted['image_path']);
        }

        return false;
    }

    /**
     * Optimise les données de signature pour le PDF
     */
    public static function optimizeSignatureForPdf($signatureData)
    {
        $formatted = self::formatSignatureForPdf($signatureData);
        
        if (!$formatted) {
            return null;
        }

        // Si c'est base64 et trop grand, essayer de le redimensionner
        if ($formatted['type'] === 'base64' && $formatted['size'] > 100000) { // 100KB
            \Log::info('Signature is large (' . $formatted['size'] . ' bytes), considering optimization');
            
            // Pour l'instant, on retourne tel quel
            // TODO: Implémenter le redimensionnement si GD est disponible
            return $formatted;
        }

        return $formatted;
    }

    /**
     * Génère le HTML pour l'affichage de la signature
     */
    public static function generateSignatureHtml($signatureData, $options = [])
    {
        $defaultOptions = [
            'show_label' => true,
            'label_text' => 'Unterschrift Versicherte(r) oder Bevollmächtigte(r)',
            'max_width' => '400px',
            'max_height' => '200px',
            'show_placeholder' => true,
            'placeholder_text' => '[Unterschrift erforderlich]'
        ];

        $options = array_merge($defaultOptions, $options);

        $formatted = self::formatSignatureForPdf($signatureData);
        
        if (!$formatted || !self::validateSignature($signatureData)) {
            if (!$options['show_placeholder']) {
                return '';
            }

            return '<div style="text-align: center; margin: 15px 0; padding: 30px; border: 2px dashed #ccc; background-color: #f9f9f9; border-radius: 5px;">
                <div style="font-size: 14px; color: #666; font-weight: bold;">' . $options['label_text'] . '</div>
                <div style="font-size: 12px; color: #999; margin-top: 10px;">' . $options['placeholder_text'] . '</div>
            </div>';
        }

        $labelHtml = $options['show_label'] ? 
            '<div style="font-size: 14px; font-weight: bold; margin-bottom: 10px; color: #333;">' . $options['label_text'] . '</div>' : '';

        return '<div style="text-align: center; margin: 15px 0; padding: 15px; border: 2px solid #333; background-color: #f9f9f9; border-radius: 5px;">
            ' . $labelHtml . '
            <img src="' . $formatted['image_path'] . '" alt="Signature" style="max-width: ' . $options['max_width'] . '; max-height: ' . $options['max_height'] . '; border: 1px solid #ddd; background-color: white; display: block; margin: 0 auto; border-radius: 3px;">
        </div>';
    }
}
