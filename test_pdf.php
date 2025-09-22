<?php

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

try {
    $order = App\Models\Order::first();
    if ($order) {
        echo "Order found: " . $order->id . "\n";
        
        $pdfService = new App\Services\PdfGeneratorService();
        
        // Préparer les données utilisateur
        $userData = [
            'first_name' => $order->first_name ?? 'Test',
            'last_name' => $order->last_name ?? 'User',
            'email' => $order->email ?? 'test@example.com',
            'phone' => $order->phone ?? '',
            'address' => $order->address ?? '',
            'city' => $order->city ?? '',
            'postal_code' => $order->postal_code ?? '',
            'insurance_number' => $order->insurance_number ?? '',
            'health_insurance' => $order->health_insurance ?? '',
            'care_level' => $order->care_level ?? '',
            'gender' => $order->gender ?? 'Herr'
        ];
        
        // Préparer les données du panier
        $cartData = [];
        
        // Signature - Formater correctement pour le PDF
        $signatureData = null;
        if ($order->signature) {
            $signatureData = [
                'image_path' => $order->signature
            ];
            echo "Signature found: " . substr($order->signature, 0, 50) . "...\n";
        } else {
            echo "No signature found\n";
        }
        
        $pdfBase64 = $pdfService->generateOrderFormBase64($userData, $cartData, $signatureData);
        
        echo "PDF generated successfully. Length: " . strlen($pdfBase64) . " characters\n";
        
        // Sauvegarder le PDF pour test
        file_put_contents('test_output.pdf', base64_decode($pdfBase64));
        echo "PDF saved as test_output.pdf\n";
        
    } else {
        echo "No orders found\n";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
    echo "File: " . $e->getFile() . "\n";
    echo "Line: " . $e->getLine() . "\n";
}
