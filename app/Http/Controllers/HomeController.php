<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\PackageDetails;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Support\Facades\Session;
use App\Services\PdfGeneratorService;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        return view('frontend.home');
    }

    public function about(Request $request)
    {
        $request->session()->forget('cart');
        return view('frontend.about-us');
    }

    public function contact()
    {
        return view('frontend.contact-us');
    }

    public function orderSuccess(Request $request)
    {
        $request->session()->forget('cart');
        $request->session()->forget('update_order_customer');
        $request->session()->forget('update_order_id');
        return view('frontend.order-success');
    }

    public function assemblePkg(Request $request)
    {
        $request->session()->forget('cart');
        $request->session()->forget('update_order_customer');
        $request->session()->forget('update_order_id');
        Session::put('is_printable', 0);

        $package_id = $request->package;
        Session::put('selected_package_id', $package_id);
        
        // Stocker les données du package au lieu des produits individuels
        $package = \App\Models\Packages::find($package_id);
        if ($package) {
            $packageData = [
                'package' => $package,
                'packageId' => $package_id,
                'isPackage' => true
            ];
            $request->session()->put('package_data', $packageData);
        }
        
        // Aussi mettre les produits dans le cart pour l'affichage
        $package_details = PackageDetails::where('packageId', $package_id)->get();
        $cart = [];
        foreach ($package_details as $key => $package_detail) {
            $product = Product::find($package_detail->productId);
            if ($product) {
                $cart[] = [
                    'product' => $product,
                    'quantity' => 1, // Toujours 1 par défaut dans le package
                    'price' => $product->price
                ];
            }
        }
        Session::put('cart', $cart);
        
        return redirect('assemble');
    }

    public function assemble(Request $request)
    {
        Session::put('is_printable', 0);

        // Nettoyer seulement la session Customer, mais garder personalData
        Session::forget('Customer');
        Session::forget('customer_sess');

        // Log pour débogage
        \Log::info('=== DEBUG ASSEMBLE CONTROLLER ===');
        \Log::info('Session has personalData: ' . (Session::has('personalData') ? 'true' : 'false'));
        \Log::info('Session has Customer: ' . (Session::has('Customer') ? 'true' : 'false'));
        if (Session::has('personalData')) {
            \Log::info('PersonalData in controller:', Session::get('personalData'));
        }

        // Ne pas charger les données de session par défaut
        // Le formulaire sera vide jusqu'à ce qu'une recherche réussie soit effectuée
        $data = [];

        $data['steps'] = json_decode(file_get_contents(storage_path('app/steps.json')), true);

        return view('frontend.assemble-curebox')->with($data);
    }

    public function terms()
    {
        return view('frontend.terms');
    }



    // FPDI option B
    public function generatePdf(Request $request)
    {
        try {
            $pdfService = new PdfGeneratorService();

            $userData = [
                'gender'      => Session::get('user_gender'),
                'first_name'  => Session::get('user_first_name'),
                'last_name'   => Session::get('user_last_name'),
                'pflegegrad'  => Session::get('user_pflegegrad'),
                'street'      => Session::get('user_street'),
                'zip'         => Session::get('user_zip'),
                'city'        => Session::get('user_city'),
                'phone'       => Session::get('user_phone'),
            ];

            $cart = Session::get('cart', []);
            $products = [];
            foreach ($cart as $item) {
                $products[] = [
                    'name'     => $item['product']['name'],
                    'quantity' => $item['quantity'],
                ];
            }

            // Déterminer le numéro de BeleschBox
            $beleschboxNumber = 'Individuell';
            $selectedPackageId = Session::get('selected_package_id');
            if ($selectedPackageId) {
                $beleschboxNumber = 'BeleschBox ' . $selectedPackageId;
            }

            $cartData = [
                'beleschbox_number' => $beleschboxNumber,
                'products'          => $products,
                'glove_size'        => Session::get('user_glove_size', 'M'),
            ];

            $signatureData = null;
            if (Session::get('user_signature')) {
                $signatureData = [
                    'image_path' => Session::get('user_signature'),
                ];
            }

            // FPDI: la méthode renvoie déjà le chemin du fichier
            $outputPath = $pdfService->generateOrderForm($userData, $cartData, $signatureData);

            $filename = 'beleschbox_order_' . date('Y-m-d_H-i-s') . '.pdf';

            return response()->download($outputPath, $filename, [
                'Content-Type'        => 'application/pdf',
                'Content-Disposition' => 'attachment; filename="' . $filename . '"'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Erreur lors de la génération du PDF: ' . $e->getMessage()
            ], 500);
        }
    }

    public function storeUserData(Request $request)
    {
        try {
            $userData = $request->input('user_data');

            Session::put('user_gender', $userData['gender']);
            Session::put('user_first_name', $userData['first_name']);
            Session::put('user_last_name', $userData['last_name']);
            Session::put('user_pflegegrad', $userData['pflegegrad']);
            Session::put('user_street', $userData['street']);
            Session::put('user_zip', $userData['zip']);
            Session::put('user_city', $userData['city']);
            Session::put('user_phone', $userData['phone']);
            Session::put('user_glove_size', $userData['glove_size']);
            Session::put('user_signature', $userData['signature']);

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Erreur lors du stockage des données: ' . $e->getMessage()
            ], 500);
        }
    }


    public function generatePdfBase64(Request $request)
    {
        try {
            $pdfService = new PdfGeneratorService();

            $userData = [
                'gender'      => Session::get('user_gender'),
                'first_name'  => Session::get('user_first_name'),
                'last_name'   => Session::get('user_last_name'),
                'pflegegrad'  => Session::get('user_pflegegrad'),
                'street'      => Session::get('user_street'),
                'zip'         => Session::get('user_zip'),
                'city'        => Session::get('user_city'),
                'phone'       => Session::get('user_phone'),
            ];

            $cart = Session::get('cart', []);
            $products = [];
            foreach ($cart as $item) {
                $products[] = [
                    'name'     => $item['product']['name'],
                    'quantity' => $item['quantity'],
                ];
            }

            // Déterminer le numéro de BeleschBox
            $beleschboxNumber = 'Individuell';
            $selectedPackageId = Session::get('selected_package_id');
            if ($selectedPackageId) {
                $beleschboxNumber = 'BeleschBox ' . $selectedPackageId;
            }

            $cartData = [
                'beleschbox_number' => $beleschboxNumber,
                'products'          => $products,
                'glove_size'        => Session::get('user_glove_size', 'M'),
            ];

            $signatureData = null;
            if (Session::get('user_signature')) {
                $signatureData = [
                    'image_path' => Session::get('user_signature'),
                ];
            }

            // Générer le PDF en base64
            $pdfBase64 = $pdfService->generateOrderFormBase64($userData, $cartData, $signatureData);

            return response()->json([
                'success' => true,
                'pdf_base64' => $pdfBase64
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Erreur lors de la génération du PDF: ' . $e->getMessage()
            ], 500);
        }
    }

    public function generateOrderData(Request $request)
    {
        try {
            \Log::info('=== GENERATE ORDER DATA DEBUG ===');
            \Log::info('Request data: ' . json_encode($request->all()));
            
            $orderId = $request->input('orderId');
            
            if (!$orderId) {
                \Log::error('Order ID is missing');
                return response()->json([
                    'error' => 'Order ID is required'
                ], 400);
            }

            \Log::info('Looking for order with ID: ' . $orderId);

            // Récupérer les données de la commande
            $order = \App\Models\Order::where('orderId', $orderId)->first();
            if (!$order) {
                \Log::error('Order not found for ID: ' . $orderId);
                return response()->json([
                    'error' => 'Order not found'
                ], 404);
            }

            \Log::info('Order found: ' . json_encode($order->toArray()));

            // Récupérer les données du client
            $customer = \App\Models\Customer::find($order->customerId);
            if (!$customer) {
                \Log::error('Customer not found for ID: ' . $order->customerId);
                return response()->json([
                    'error' => 'Customer not found'
                ], 404);
            }

            \Log::info('Customer found: ' . json_encode($customer->toArray()));

            // Construire les données utilisateur
            $userData = [
                'gender'           => $customer->surname ?? '', // Utiliser 'surname' au lieu de 'title'
                'first_name'       => $customer->firstName ?? '',
                'last_name'        => $customer->lastName ?? '',
                'pflegegrad'       => $customer->pflegegrad ?? '',
                'street'           => $customer->street ?? '',
                'zip'              => $customer->zipcode ?? '',
                'zipcode'          => $customer->zipcode ?? '', // Alias pour compatibilité
                'city'             => $customer->city ?? '',
                'phone'            => $customer->telephone ?? '',
                'telephone'        => $customer->telephone ?? '', // Alias pour compatibilité
                'email'            => $customer->email ?? '',
                'dob'              => $customer->dob ?? '',
                'date_of_birth'    => $customer->dob ?? '', // Alias pour compatibilité
                'insuranceName'    => $customer->insuranceName ?? '',
                'insurance_name'   => $customer->insuranceName ?? '', // Alias pour compatibilité
                'insuranceNumber'  => $customer->insuranceNumber ?? '',
                'insurance_number' => $customer->insuranceNumber ?? '', // Alias pour compatibilité
                'bett_schutz'      => $customer->bett_schutz ?? '', // Pour les Bettschutzeinlagen
            ];

            \Log::info('User data constructed: ' . json_encode($userData));

            // Récupérer les produits de la commande
            $products = [];
            if ($order->orderType == '1') {
                // Package
                $packageDetails = \App\Models\PackageDetails::where('packageId', $order->packageId)->get();
                \Log::info('Package details found: ' . $packageDetails->count());
                foreach ($packageDetails as $detail) {
                    $product = \App\Models\Product::find($detail->productId);
                    if ($product) {
                        $products[] = [
                            'name'     => $product->name,
                            'quantity' => $detail->qty ?? 1,
                        ];
                    }
                }
                $beleschboxNumber = 'BeleschBox ' . $order->packageId;
            } else {
                // Produits individuels
                $orderProducts = \App\Models\Order::where('orderId', $orderId)->get();
                \Log::info('Individual orders found: ' . $orderProducts->count());
                foreach ($orderProducts as $orderProduct) {
                    $product = \App\Models\Product::find($orderProduct->productId);
                    if ($product) {
                        $products[] = [
                            'name'     => $product->name,
                            'quantity' => $orderProduct->qty ?? 1,
                        ];
                    }
                }
                $beleschboxNumber = 'Individuell';
            }

            \Log::info('Products found: ' . json_encode($products));

            $cartData = [
                'beleschbox_number' => $beleschboxNumber,
                'products'          => $products,
                'glove_size'        => 'M', // Valeur par défaut
            ];

            // Récupérer la signature depuis la commande
            $signatureData = null;
            if ($order->signature) {
                $signatureData = [
                    'image_path' => $order->signature, // La signature est déjà en base64
                ];
                \Log::info('Signature found: ' . substr($order->signature, 0, 50) . '...');
            } else {
                \Log::info('No signature found for this order');
            }

            $orderData = [
                'userData' => $userData,
                'cartData' => $cartData,
                'signatureData' => $signatureData
            ];

            \Log::info('Order data prepared: ' . json_encode($orderData));

            return response()->json([
                'success' => true,
                'orderData' => $orderData
            ]);
        } catch (\Exception $e) {
            \Log::error('Exception in generateOrderData: ' . $e->getMessage());
            \Log::error('Stack trace: ' . $e->getTraceAsString());
            return response()->json([
                'error' => 'Erreur lors de la récupération des données: ' . $e->getMessage()
            ], 500);
        }
    }

    public function debugSignature($orderId)
    {
        try {
            \Log::info('=== DEBUG SIGNATURE FOR ORDER: ' . $orderId . ' ===');
            
            // Récupérer la commande
            $order = \App\Models\Order::where('orderId', $orderId)->first();
            if (!$order) {
                return response()->json(['error' => 'Order not found'], 404);
            }
            
            \Log::info('Order found: ' . json_encode($order->toArray()));
            \Log::info('Order signature field: ' . ($order->signature ? 'EXISTS' : 'NULL'));
            \Log::info('Order signature length: ' . ($order->signature ? strlen($order->signature) : '0'));
            \Log::info('Order signature starts with data: ' . ($order->signature && str_starts_with($order->signature, 'data:') ? 'YES' : 'NO'));
            \Log::info('Order signature first 200 chars: ' . ($order->signature ? substr($order->signature, 0, 200) : 'NULL'));
            
            return response()->json([
                'orderId' => $orderId,
                'hasSignature' => !empty($order->signature),
                'signatureLength' => $order->signature ? strlen($order->signature) : 0,
                'signatureStartsWithData' => $order->signature && str_starts_with($order->signature, 'data:'),
                'signaturePreview' => $order->signature ? substr($order->signature, 0, 200) : null,
                'fullOrder' => $order->toArray()
            ]);
        } catch (\Exception $e) {
            \Log::error('Debug signature error: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function generateOrderPdfBase64(Request $request)
    {
        try {
            \Log::info('=== GENERATE ORDER PDF DEBUG ===');
            \Log::info('Request data: ' . json_encode($request->all()));
            
            $orderId = $request->input('orderId');
            
            if (!$orderId) {
                \Log::error('Order ID is missing');
                return response()->json([
                    'error' => 'Order ID is required'
                ], 400);
            }

            \Log::info('Looking for order with ID: ' . $orderId);

            // Test simple pour vérifier si la classe Order fonctionne
            try {
                $order = \App\Models\Order::where('orderId', $orderId)->first();
                \Log::info('Order query successful');
            } catch (\Exception $e) {
                \Log::error('Order query failed: ' . $e->getMessage());
                return response()->json([
                    'error' => 'Order query failed: ' . $e->getMessage()
                ], 500);
            }

            if (!$order) {
                \Log::error('Order not found for ID: ' . $orderId);
                return response()->json([
                    'error' => 'Order not found'
                ], 404);
            }

            \Log::info('Order found: ' . json_encode($order->toArray()));

            // Récupérer les données du client
            $customer = \App\Models\Customer::find($order->customerId);
            if (!$customer) {
                \Log::error('Customer not found for ID: ' . $order->customerId);
                return response()->json([
                    'error' => 'Customer not found'
                ], 404);
            }

            \Log::info('Customer found: ' . json_encode($customer->toArray()));

            // Construire les données utilisateur
            $userData = [
                'gender'      => $customer->surname ?? '', // Utiliser 'surname' au lieu de 'title'
                'first_name'  => $customer->firstName ?? '',
                'last_name'   => $customer->lastName ?? '',
                'pflegegrad'  => $customer->pflegegrad ?? '',
                'street'      => $customer->street ?? '',
                'zip'         => $customer->zipcode ?? '',
                'city'        => $customer->city ?? '',
                'phone'       => $customer->telephone ?? '',
            ];

            \Log::info('User data constructed: ' . json_encode($userData));

            // Récupérer les produits de la commande
            $products = [];
            if ($order->orderType == '1') {
                // Package
                $packageDetails = \App\Models\PackageDetails::where('packageId', $order->packageId)->get();
                \Log::info('Package details found: ' . $packageDetails->count());
                foreach ($packageDetails as $detail) {
                    $product = \App\Models\Product::find($detail->productId);
                    if ($product) {
                        $products[] = [
                            'name'     => $product->name,
                            'quantity' => $detail->qty ?? 1,
                        ];
                    }
                }
                $beleschboxNumber = 'BeleschBox ' . $order->packageId;
            } else {
                // Produits individuels
                $orderProducts = \App\Models\Order::where('orderId', $orderId)->get();
                \Log::info('Individual orders found: ' . $orderProducts->count());
                foreach ($orderProducts as $orderProduct) {
                    $product = \App\Models\Product::find($orderProduct->productId);
                    if ($product) {
                        $products[] = [
                            'name'     => $product->name,
                            'quantity' => $orderProduct->qty ?? 1,
                        ];
                    }
                }
                $beleschboxNumber = 'Individuell';
            }

            \Log::info('Products found: ' . json_encode($products));

            $cartData = [
                'beleschbox_number' => $beleschboxNumber,
                'products'          => $products,
                'glove_size'        => 'M', // Valeur par défaut
            ];

            // Récupérer la signature depuis la commande
            $signatureData = null;
            if ($order->signature) {
                \Log::info('Raw signature data length: ' . strlen($order->signature));
                \Log::info('Signature starts with: ' . substr($order->signature, 0, 100));
                
                // Vérifier si la signature est déjà en base64
                if (strpos($order->signature, 'data:image/') === 0) {
                    \Log::info('Signature is already in base64 format');
                    $signatureData = [
                        'image_path' => $order->signature,
                    ];
                } else {
                    \Log::info('Signature is not in base64 format, converting...');
                    // Si ce n'est pas en base64, essayer de le convertir
                    $signatureData = [
                        'image_path' => 'data:image/png;base64,' . $order->signature,
                    ];
                }
                \Log::info('Signature data prepared: ' . json_encode($signatureData));
            } else {
                \Log::info('No signature found for this order');
            }

            \Log::info('Cart data constructed: ' . json_encode($cartData));
            \Log::info('Signature data: ' . ($signatureData ? 'present' : 'null'));
            \Log::info('Generating PDF...');
            $pdfService = new PdfGeneratorService();
            \Log::info('PDF service instantiated');
            $pdfBase64 = $pdfService->generateOrderFormBase64($userData, $cartData, $signatureData);
            \Log::info('PDF service method called');

            \Log::info('PDF generated successfully');
            \Log::info('PDF base64 length: ' . strlen($pdfBase64));
            return response()->json([
                'success' => true,
                'pdf_base64' => $pdfBase64
            ]);
        } catch (\Exception $e) {
            \Log::error('Exception in generateOrderPdfBase64: ' . $e->getMessage());
            \Log::error('Stack trace: ' . $e->getTraceAsString());
            return response()->json([
                'error' => 'Erreur lors de la génération du PDF: ' . $e->getMessage()
            ], 500);
        }
    }

    public function privacy()
    {
        return view('frontend.privacy');
    }

    public function cookie()
    {
        return view('frontend.cookie');
    }

    public function getProductCart(Request $request)
    {
        if ($request->type == 'add') {
            if (!$request->session()->has('cart')) {
                $cart = [];
                $cart[] = [
                    'product'  => Product::where('id', $request->productId)->first(),
                    'quantity' => 1,
                    'custom'   => $request->custom ?? false // Marquer comme custom si spécifié
                ];
                $request->session()->put('cart', $cart);
            } else {
                $cart  = $request->session()->get('cart');
                $index = $this->exists($request->productId, $cart);
                if ($index == -1) {
                    $cart[] = [
                        'product'  => Product::where('id', $request->productId)->first(),
                        'quantity' => 1,
                        'custom'   => $request->custom ?? false // Marquer comme custom si spécifié
                    ];
                } else {
                    $cart[$index]['quantity']++;
                    $cart[$index]['custom'] = $request->custom ?? false; // Mettre à jour le flag custom
                }
                $request->session()->put('cart', $cart);
            }
        }

        if ($request->type == 'remove') {
            $cart  = $request->session()->get('cart');
            $index = $this->exists($request->productId, $cart);
            unset($cart[$index]);
            $request->session()->put('cart', array_values($cart));
        }

        return Product::find($request->productId);
    }

    private function exists($id, $cart)
    {
        for ($i = 0; $i < count($cart); $i++) {
            if ($cart[$i]['product']->id == $id) {
                return $i;
            }
        }
        return -1;
    }

    public function customerProfile()
    {
        return view('frontend.profile');
    }

    public function customerOrders()
    {
        return view('frontend.customer-orders');
    }

    public function checkEmailExists(Request $request)
    {
        try {
            $email = $request->input('email');
            $password = $request->input('password');
            
            if (!$email) {
                return response()->json([
                    'exists' => false,
                    'message' => 'Email is required'
                ], 400);
            }

            if (!$password) {
                return response()->json([
                    'exists' => false,
                    'message' => 'Password is required'
                ], 400);
            }

            $customer = Customer::where('email', $email)->first();
            
            // Log pour débogage
            \Log::info('=== CHECK EMAIL EXISTS DEBUG ===');
            \Log::info('Customer found: ' . ($customer ? 'YES' : 'NO'));
            if ($customer) {
                \Log::info('Customer insurance_type: ' . ($customer->insurance_type ?? 'NULL'));
                \Log::info('Customer all attributes: ' . json_encode($customer->getAttributes()));
            }
            
            if ($customer && $customer->password && \Hash::check($password, $customer->password)) {
                return response()->json([
                    'exists' => true,
                    'email_exists' => true,
                    'message' => '✅ E-Mail und Passwort korrekt! Die Kundendaten wurden automatisch geladen.',
                    'customer' => [
                        'firstName' => $customer->firstName,
                        'lastName' => $customer->lastName,
                        'email' => $customer->email,
                        'street' => $customer->street,
                        'houseNo' => $customer->houseNo,
                        'zipcode' => $customer->zipcode,
                        'city' => $customer->city,
                        'dob' => $customer->dob,
                        'telephone' => $customer->telephone,
                        'insuranceName' => $customer->insuranceName,
                        'insuranceNumber' => $customer->insuranceNumber,
                        'healthInsuranceNo' => $customer->healthInsuranceNo,
                        'pflegegrad' => $customer->pflegegrad ?? null,
                        'insurance_type' => $customer->insurance_type ?? null,
                        'title' => $customer->title ?? null,
                        'surname' => $customer->surname ?? null,
                        'insured_type' => $customer->insured_type ?? null,
                        'angehorigerName' => $customer->caregiver_name ?? null,
                        'angehorigerTelefon' => $customer->caregiver_phone ?? null,
                        'angehorigerEmail' => $customer->caregiver_email ?? null,
                    ]
                ]);
            } else {
                return response()->json([
                    'exists' => false,
                    'message' => '❌ E-Mail oder Passwort ist falsch. Bitte überprüfen Sie Ihre Eingaben.'
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'exists' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }

    public function checkInsuranceNumberExists(Request $request)
    {
        try {
            $insuranceNumber = $request->input('insurance_number');
            
            if (!$insuranceNumber) {
                return response()->json([
                    'exists' => false,
                    'message' => 'Versichertennummer ist erforderlich'
                ], 400);
            }

            $customer = Customer::where('insuranceNumber', $insuranceNumber)->first();
            
            if ($customer) {
                return response()->json([
                    'exists' => true,
                    'message' => 'Diese Versichertennummer existiert bereits in unserer Datenbank.'
                ]);
            } else {
                return response()->json([
                    'exists' => false,
                    'message' => 'Versichertennummer nicht gefunden'
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'exists' => false,
                'message' => 'Fehler: ' . $e->getMessage()
            ], 500);
        }
    }

    public function checkKrankenkasseNumberExists(Request $request)
    {
        try {
            $krankenkasseNumber = $request->input('krankenkasse_number');
            
            if (!$krankenkasseNumber) {
                return response()->json([
                    'exists' => false,
                    'message' => 'Krankenkassen-Nummer ist erforderlich'
                ], 400);
            }

            $customer = Customer::where('healthInsuranceNo', $krankenkasseNumber)->first();
            
            if ($customer) {
                return response()->json([
                    'exists' => true,
                    'message' => 'Diese Krankenkassen-Nummer existiert bereits in unserer Datenbank.'
                ]);
            } else {
                return response()->json([
                    'exists' => false,
                    'message' => 'Krankenkassen-Nummer nicht gefunden'
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'exists' => false,
                'message' => 'Fehler: ' . $e->getMessage()
            ], 500);
        }
    }
}
