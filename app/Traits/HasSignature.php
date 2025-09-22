<?php

namespace App\Traits;

use App\Helpers\SignatureHelper;

trait HasSignature
{
    /**
     * Définir la signature avec métadonnées
     */
    public function setSignature($signatureData)
    {
        $formatted = SignatureHelper::formatSignatureForPdf($signatureData);
        
        if ($formatted) {
            $this->signature = $formatted['image_path'];
            $this->signature_type = $formatted['type'];
            $this->signature_size = $formatted['size'];
            $this->signature_mime_type = $this->extractMimeType($formatted['image_path']);
            $this->signature_created_at = now();
            
            return true;
        }
        
        return false;
    }

    /**
     * Obtenir les données de signature formatées pour le PDF
     */
    public function getSignatureForPdf()
    {
        if (!$this->signature) {
            return null;
        }

        return [
            'image_path' => $this->signature,
            'type' => $this->signature_type ?? 'unknown',
            'size' => $this->signature_size ?? 0,
            'mime_type' => $this->signature_mime_type ?? 'image/png',
            'created_at' => $this->signature_created_at
        ];
    }

    /**
     * Vérifier si la signature est valide
     */
    public function hasValidSignature()
    {
        return SignatureHelper::validateSignature($this->signature);
    }

    /**
     * Obtenir le HTML de la signature
     */
    public function getSignatureHtml($options = [])
    {
        return SignatureHelper::generateSignatureHtml($this->getSignatureForPdf(), $options);
    }

    /**
     * Extraire le type MIME de la signature
     */
    private function extractMimeType($signatureData)
    {
        if (strpos($signatureData, 'data:image/') === 0) {
            $mimeType = explode(';', explode(':', $signatureData)[1])[0];
            return $mimeType;
        }

        if (file_exists($signatureData)) {
            return mime_content_type($signatureData);
        }

        return 'image/png'; // Par défaut
    }

    /**
     * Obtenir les statistiques de la signature
     */
    public function getSignatureStats()
    {
        if (!$this->signature) {
            return null;
        }

        return [
            'type' => $this->signature_type ?? 'unknown',
            'size' => $this->signature_size ?? 0,
            'size_formatted' => $this->formatBytes($this->signature_size ?? 0),
            'mime_type' => $this->signature_mime_type ?? 'unknown',
            'created_at' => $this->signature_created_at,
            'is_valid' => $this->hasValidSignature()
        ];
    }

    /**
     * Formater les bytes en format lisible
     */
    private function formatBytes($bytes, $precision = 2)
    {
        $units = ['B', 'KB', 'MB', 'GB'];
        
        for ($i = 0; $bytes > 1024 && $i < count($units) - 1; $i++) {
            $bytes /= 1024;
        }
        
        return round($bytes, $precision) . ' ' . $units[$i];
    }
}

