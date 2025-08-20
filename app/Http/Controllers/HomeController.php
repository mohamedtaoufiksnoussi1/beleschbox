<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\PackageDetails;
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

        $pkgs = PackageDetails::where('packageId', $package_id)->get();
        foreach ($pkgs as $pks) {
            if (!$request->session()->has('cart')) {
                $cart = [];
                $cart[] = [
                    'product' => Product::where('id', $pks->productId)->first(),
                    'quantity' => 1
                ];
                $request->session()->put('cart', $cart);
            } else {
                $cart = $request->session()->get('cart');
                $index = $this->exists($pks->productId, $cart);
                if ($index == -1) {
                    $cart[] = [
                        'product' => Product::where('id', $pks->productId)->first(),
                        'quantity' => 1
                    ];
                } else {
                    $cart[$index]['quantity']++;
                }
                $request->session()->put('cart', $cart);
            }
        }

        return redirect('assemble');
    }

    public function assemble(Request $request)
    {
        Session::put('is_printable', 0);

        if (Session::get('Customer')) {
            $data['customer_sess'] = Session::get('Customer');
        } else {
            $data = [];
        }

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
                    'quantity' => 1
                ];
                $request->session()->put('cart', $cart);
            } else {
                $cart  = $request->session()->get('cart');
                $index = $this->exists($request->productId, $cart);
                if ($index == -1) {
                    $cart[] = [
                        'product'  => Product::where('id', $request->productId)->first(),
                        'quantity' => 1
                    ];
                } else {
                    $cart[$index]['quantity']++;
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
}
