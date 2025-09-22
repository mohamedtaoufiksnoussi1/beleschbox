<?php

use App\Models\Customer;
use App\Models\DeliveryAddress;
use App\Models\Order;
use App\Models\About;
use App\Models\Gallery;
use App\Models\Packages;
use App\Models\Partner;
use App\Models\Product;
use App\Models\Profile;
use App\Models\Setting;
use App\Models\Sliders;
use App\Models\SocialMedia;
use App\Models\Team;
use App\Models\Testimonial;
use App\Models\UsefulLinksModel;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


if (!function_exists('checkExtension')) {
    function checkExtension($file)
    {
        $supported_image = array('gif', 'jpg', 'jpeg', 'pdf', 'doc', 'DOCX', 'XLS', 'XLSX', 'csv', 'mp4', 'mov', 'mkv', 'png');

        $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION)); // Using strtolower to overcome case sensitive
        if (in_array($ext, $supported_image)) {
            return 1;
        } else {
            return 0;
        }

    }
}

if (!function_exists('uploadFile')) {
    function uploadFile($file, $request = null)
    {
        $curr_time = strtotime(date('Y-m-d H:i:s')) . rand(111111, 999999);
        $filename = $file->getClientOriginalName();
        $file->storeAs('uploads/' . $curr_time . '/', $filename);
        $destinationPath = 'uploads/' . $curr_time . '/' . $filename; // local storage
        $destiny = $curr_time . '/' . $filename; // local storage
        $file->move(public_path('uploads/') . $curr_time . '/', $filename);
        $extension = explode('.', $filename);
        return $destinationPath;
    }
}

if (!function_exists('removeFile')) {

    function removeFile($url)
    {
        $message = "file does not exist.";
        if (file_exists($url)) {
            $message = "file deleted failed";
            if (checkExtension($url) == 1) {
                if (unlink($url)) {
                    $message = "file deleted successfully";
                }
            } else {
                $message = "file deleted failed";
            }
        }
        return $message;
    }
}

function getAbout()
{
    return About::find(1);
}

function getSlider()
{
    return Sliders::where('status', '1')->get();
}

function getGallery()
{
    return Gallery::where('status', '1')->get();
}

function getAdminProfile()
{
    return Profile::find(1);
}

function getSetting()
{
    return Setting::find(1);
}

function getSocialMedia()
{
    return SocialMedia::where('status', '1')->get();
}

function getTeam()
{
    return Team::where('status', '1')->get();
}

function getTestimonial()
{
    return Testimonial::where('status', '1')->orderBy('id', 'DESC')->get();
}

function getAllProducts()
{
    return Product::where('status', '1')->get();
}

function getAllPartners()
{
    return Partner::where('status', '1')->get();
}

function dynamicContent($section_name)
{
    return \DB::table('dynamic_contents')->where('section_name', $section_name)->first();
}

function getAllPackages()
{
    return Packages::where('status','1')->with('get_packageDetails')->get();
}
function getProductDetailsById($id){
    return Product::find($id);
}

function getorderDetails($orderId, $orderType){
    if ($orderType =='0'){
       return $orders = Order::with('getProduct')->where('orderId',$orderId)->where('orderType','0')->get();
    }else{
      return  $orders = Order::with('getPerPageDetails')->where('orderId',$orderId)->where('orderType','1')->get();
    }
}
function getUsefulLink(){
    return UsefulLinksModel::where('status','1')->get();
}

function customerDetails($id){
    return Customer::find($id);
}


 function getCartPrice($carts)
{
    if($carts && is_array($carts) && count($carts) > 0)
    {
        $net_amount = 0;
        foreach($carts as $cart)
        {
            if(isset($cart['product']['price'])) {
                $net_amount += $cart['product']['price'];
            }
        }
    } else
    {
        $net_amount = 0;
    }
   

    return $net_amount;
}


function saveCustomerWithDeliverAddress($request){
    try {
        $personalData = json_decode($request->userDetails);
        $deliveryAddress = json_decode($request->deliveryAddress);
        
        if (isset($request->productDetails)){
            $productDetails = json_decode($request->productDetails);
        }
        
        $is_printable = session('is_printable');
        if($is_printable == 0)
        {
            $get_personalData = $personalData;
            $get_deliveryAddress = $deliveryAddress;
            $insurance_no = $get_personalData[0]->insurance_no;
        } else
        {
            $get_personalData = Session::get('personalData');
            $get_deliveryAddress = Session::get('deliveryAddress');
            $insurance_no = $get_personalData[0]->insurance_no;
            //print_r($get_personalData);
        }

       
       


        // Vérifier si l'email existe déjà
        $existingCustomerByEmail = Customer::where('email', $get_personalData[0]->email)->first();
        
        // Vérifier si c'est une commande custom via l'URL ou les paramètres
        $isCustomOrder = false;
        if (isset($request->custom_mode) || 
            (isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], 'mode=custom') !== false) ||
            (isset($request->productDetails) && strpos($request->productDetails, 'custom') !== false)) {
            $isCustomOrder = true;
        }
        
        // Debug pour vérifier le mode custom
        \Log::info('=== CUSTOM ORDER DEBUG ===');
        \Log::info('custom_mode: ' . ($request->custom_mode ?? 'NULL'));
        \Log::info('HTTP_REFERER: ' . ($_SERVER['HTTP_REFERER'] ?? 'NULL'));
        \Log::info('isCustomOrder: ' . ($isCustomOrder ? 'TRUE' : 'FALSE'));
        \Log::info('=== END CUSTOM DEBUG ===');
        
        if ($existingCustomerByEmail && !$isCustomOrder) {
            return ['status' => '0', 'message' => 'Diese E-Mail-Adresse existiert bereits in unserer Datenbank. Bitte verwenden Sie eine andere E-Mail-Adresse oder suchen Sie den bestehenden Kunden.'];
        }

        // ÉTAPE 5 : Confirmation et sauvegarde
        // Toujours créer/mettre à jour l'utilisateur et les commandes
        
        $carts = $request->session()->get('cart');
        
        // Si c'est l'interface assemble (productDetails), on traite directement
        if(isset($request->productDetails) || isset($request->packageDetails)) {
            // Pour les packages, récupérer les données depuis userDetails
            if (isset($request->packageDetails)) {
                $get_personalData = $personalData;
                $get_deliveryAddress = $deliveryAddress;
                $insurance_no = $get_personalData[0]->insurance_no ?? '';
                
                // Debug pour les packages
                \Log::info('=== PACKAGE ORDER DEBUG ===');
                \Log::info('Package ID: ' . $request->packageDetails);
                \Log::info('Personal Data: ' . json_encode($get_personalData));
                \Log::info('Insurance Number: ' . $insurance_no);
                \Log::info('Pflegegrad reçu: ' . ($get_personalData[0]->pflegegrad ?? 'NULL'));
            }
            
            // Créer/mettre à jour l'utilisateur
            // Pour les commandes custom, utiliser l'email existant si disponible
            if ($isCustomOrder && $existingCustomerByEmail) {
                $customer = $existingCustomerByEmail;
            } else {
                $customer = Customer::firstOrNew(['insuranceNumber' =>  $insurance_no]);
            }
            $customer->surname = $get_personalData[0]->title_name ?? '';
            $customer->insured_type = $get_personalData[0]->insured_type ?? '';
            $customer->firstName = $get_personalData[0]->first_name ?? '';
            $customer->lastName = $get_personalData[0]->last_name ?? '';
            $customer->email = $get_personalData[0]->email ?? '';
            
            // Si c'est un nouvel utilisateur, ajouter le mot de passe
            if(!$customer->exists) {
                $password = $get_personalData[0]->password ?? 'default_password_123';
                $customer->password = Hash::make($password);
                $customer->view_password = $password;
            }
           
            $customer->street = $get_personalData[0]->streetno ?? '';
            $customer->houseNo = $get_personalData[0]->houseno ?? '';
            $customer->zipcode = $get_personalData[0]->zip ?? '';
            $customer->city = $get_personalData[0]->city ?? '';
            $customer->dob = $get_personalData[0]->dob ?? '';
            $customer->telephone = $get_personalData[0]->telno ?? '';
            $customer->insuranceNumber = $get_personalData[0]->insurance_no ?? '';
            $customer->insuranceName = $get_personalData[0]->health_insurance ?? '';
            $customer->healthInsuranceNo = $get_personalData[0]->KrankenkasseNummer ?? '';
            $pflegegradRaw = $get_personalData[0]->pflegegrad ?? '';
            \Log::info('Pflegegrad brut reçu: ' . $pflegegradRaw);
            
            // Extraire le numéro du pflegegrad (enlever le préfixe "Pflegegrad")
            $pflegegradValue = null;
            if ($pflegegradRaw) {
                // Si c'est déjà un nombre, l'utiliser directement
                if (is_numeric($pflegegradRaw)) {
                    $pflegegradValue = (int)$pflegegradRaw;
                } else {
                    // Sinon, extraire le numéro du format "PflegegradX"
                    if (preg_match('/Pflegegrad(\d+)/', $pflegegradRaw, $matches)) {
                        $pflegegradValue = (int)$matches[1];
                    }
                }
            }
            
            // Valider que le pflegegrad est entre 1 et 5
            if ($pflegegradValue && $pflegegradValue >= 1 && $pflegegradValue <= 5) {
                $customer->pflegegrad = $pflegegradValue;
            } else {
                $customer->pflegegrad = null;
            }
            \Log::info('Pflegegrad final sauvegardé: ' . ($customer->pflegegrad ?? 'NULL'));
            $customer->insurance_type = $get_personalData[0]->insurance_type ?? '';
            $customer->caregiver_name = $get_personalData[0]->angehoriger_name ?? '';
            $customer->caregiver_phone = $get_personalData[0]->angehoriger_telefon ?? '';
            $customer->caregiver_email = $get_personalData[0]->angehoriger_email ?? '';
            $customer->status = '1';
            
            $customer->save();
            
            // Créer/mettre à jour l'adresse de livraison
            $delivery = DeliveryAddress::firstOrNew(['customerId' =>  $customer->id]);
            $delivery->customerId = $customer->id;
            $delivery->recipientName = $get_deliveryAddress[0]->recipient_name ?? '';
            $delivery->street = $get_deliveryAddress[0]->street ?? '';
            $delivery->houseNo = $get_deliveryAddress[0]->houseno ?? '';
            $delivery->pincode = $get_deliveryAddress[0]->zip ?? '';
            $delivery->city = $get_deliveryAddress[0]->city ?? '';
            $delivery->save();

            // Créer les commandes avec tous les produits du package
            if (isset($request->productDetails)){
                $productDetails = json_decode($request->productDetails);
                
                // DEBUG: Log des données reçues
                \Log::info('=== DEBUG PRODUCTDETAILS ===');
                \Log::info('Raw productDetails: ' . $request->productDetails);
                \Log::info('Decoded productDetails: ' . json_encode($productDetails));
                if(isset($productDetails->product)) {
                    \Log::info('Number of products: ' . count($productDetails->product));
                    foreach($productDetails->product as $i => $prod) {
                        \Log::info("Product $i: ID=" . ($prod->productID ?? 'NULL') . ", Qty=" . ($prod->productQty ?? 'NULL') . ", Price=" . ($prod->productPrice ?? 'NULL'));
                    }
                } else {
                    \Log::info('No productDetails->product found!');
                }
                \Log::info('=== END DEBUG ===');

                if(Session::get('update_order_id'))
                {
                    $orderId = Session::get('update_order_id');
                    $delete_old = Order::where('orderId',$orderId)->delete();
                } else
                {
                    $orderId = rand(11111111,999999999);
                }
                
                if(isset($productDetails->product) && is_array($productDetails->product)) {
                    foreach ($productDetails->product as $key=>$product){
                        $order = new Order();
                        $order->orderId = $orderId;
                        $order->customerId = $customer->id;
                        $order->productId = $product->productID ?? '';
                        $order->qty = $product->productQty ?? '';
                        $order->price = $product->productPrice ?? '';
                        $order->signature = $request->signature ?? '';
                        $order->orderType = $isCustomOrder ? '0' : '0'; // Custom mode = 0 (product)
                        $order->status = '1';
                        $order->deliveryStatus = '0'; // Pending
                        $order->save();
                        
                        \Log::info("Order saved: ProductID={$order->productId}, Qty={$order->qty}, Price={$order->price}, OrderType={$order->orderType}, isCustomOrder=" . ($isCustomOrder ? 'TRUE' : 'FALSE'));
                    }
                } else {
                    \Log::error('productDetails->product is not an array or not set!');
                }

                return ['status'=>1,'message'=>'Commande créée avec succès!','userId'=>$customer->id];
            }

            // Check if this is a package order from session OR packageDetails
            $packageData = Session::get('package_data');
            if ((isset($packageData) && $packageData['isPackage']) || isset($request->packageDetails)) {
                // Handle package order - create only ONE order record
                if(Session::get('update_order_id'))
                {
                    $orderId = Session::get('update_order_id');
                    $delete_old = Order::where('orderId',$orderId)->delete();
                } else
                {
                    $orderId = rand(11111111,999999999);
                }
                
                $order = new Order();
                $order->orderId = $orderId;
                $order->customerId = $customer->id;
                $order->packageId = $packageData['packageId'] ?? $request->packageDetails;
                $order->signature = $request->signature ?? '';
                $order->orderType = '1'; // Package order
                $order->status = '1';
                $order->deliveryStatus = '0'; // Pending
                $order->save();
                
                // Clear package data from session
                Session::forget('package_data');
                
                return ['status'=>1,'message'=>'Package order created successfully!','userId'=>$customer->id];
            }
            
            return ['status'=>1,'message'=>'Profil sauvegardé avec succès!','userId'=>$customer->id];
        }
        
        // Ancienne logique pour les utilisateurs existants avec session cart
        if(isset($carts) && !empty($carts) ){
            
            $customer = [];

            // $customer['surname'] = $get_personalData[0]->surname ?? '';
            // $customer['firstName'] = $get_personalData[0]->first_name ?? '';
            // $customer['lastName'] = $get_personalData[0]->last_name ?? '';
            // $customer['email'] = $get_personalData[0]->email ?? '';
            // $customer['street'] = $get_personalData[0]->streetno ?? '';
            // $customer['houseNo'] = $get_personalData[0]->houseno ?? '';
            // $customer['zipcode'] = $get_personalData[0]->zip ?? '';
            // $customer['city'] = $get_personalData[0]->city ?? '';
            // $customer['dob'] = $get_personalData[0]->dob ?? '';
            // $customer['telephone'] = $get_personalData[0]->telno ?? '';
            // $customer['insuranceName'] = $get_personalData[0]->health_insurance ?? '';
            // $customer['healthInsuranceNo'] = $get_personalData[0]->KrankenkasseNummer ?? '';
            // $customer['status'] = '1';
            // $update = Customer::where('id',$user->id)->update($customer);


            $customer_updt = Customer::firstOrNew(['insuranceNumber' =>  $insurance_no]);
            $customer_updt->surname =  $get_personalData[0]->surname ?? '';
            $customer_updt->insured_type =  $get_personalData[0]->insured_type ?? '';
            $customer_updt->firstName =  $get_personalData[0]->first_name ?? '';
            $customer_updt->lastName =  $get_personalData[0]->last_name ?? '';
            $customer_updt->email =  $get_personalData[0]->email ?? '';
            if(Session::get('Customer'))
            {
            } else
            {
            $password = $get_personalData[0]->password ?? 'default_password_123';
            $customer_updt->password = Hash::make($password);
            $customer_updt->view_password = $password;
            }
           
            $customer_updt->street =  $get_personalData[0]->streetno ?? '';
            $customer_updt->houseNo =  $get_personalData[0]->houseno ?? '';
            $customer_updt->zipcode =  $get_personalData[0]->zip ?? '';
            $customer_updt->city =  $get_personalData[0]->city ?? '';
            $customer_updt->dob =  $get_personalData[0]->dob ?? '';
            $customer_updt->telephone =  $get_personalData[0]->telno ?? '';
            $customer_updt->insuranceName =  $get_personalData[0]->health_insurance ?? '';
            $customer_updt->healthInsuranceNo =  $get_personalData[0]->KrankenkasseNummer ?? '';
            $customer_updt->pflegegrad =  $get_personalData[0]->pflegegrad ?? '';
            $customer_updt->insurance_type =  $get_personalData[0]->insurance_type ?? '';
            $customer_updt->caregiver_name =  $get_personalData[0]->angehoriger_name ?? '';
            $customer_updt->caregiver_phone =  $get_personalData[0]->angehoriger_telefon ?? '';
            $customer_updt->caregiver_email =  $get_personalData[0]->angehoriger_email ?? '';
            $customer_updt->status =  1;
            
            // LOG: Vérifier avant sauvegarde (section update)
            $customer_updt->save();



            if ($customer_updt){
                // $delivery = [];
                // $delivery->customerId = $customer->id;
                // $delivery['recipientName'] = $get_deliveryAddress[0]->recipient_name ?? '';
                // $delivery['street'] = $get_deliveryAddress[0]->street ?? '';
                // $delivery['houseNo'] = $get_deliveryAddress[0]->houseno ?? '';
                // $delivery['pincode'] = $get_deliveryAddress[0]->zip ?? '';
                // $delivery['city'] = $get_deliveryAddress[0]->city ?? '';
                // $updateDelivery = DeliveryAddress::where('customerId',$user->id)->update($delivery);

                $delivery = DeliveryAddress::firstOrNew(['customerId' =>  $customer_updt->id]);
                $delivery->customerId = $customer_updt->id ?? '';
                $delivery->recipientName = $get_deliveryAddress[0]->recipient_name ?? '';
                $delivery->street = $get_deliveryAddress[0]->street ?? '';
                $delivery->houseNo = $get_deliveryAddress[0]->houseno ?? '';
                $delivery->pincode = $get_deliveryAddress[0]->zip ?? '';
                $delivery->city = $get_deliveryAddress[0]->city ?? '';
                $delivery->save();

               
              
                // Check if this is a package order
                $packageData = Session::get('package_data');
                if (isset($packageData) && $packageData['isPackage']) {
                    // Handle package order - create only ONE order record
                    if(Session::get('update_order_id'))
                    {
                        $orderId = Session::get('update_order_id');
                        $delete_old = Order::where('orderId',$orderId)->delete();
                    } else
                    {
                        $orderId = rand(11111111,999999999);
                    }
                    
                    $order = new Order();
                    $order->orderId = $orderId;
                    $order->customerId = $user->id;
                    $order->packageId = $packageData['packageId'];
                    $order->signature = $request->signature ?? '';
                    $order->orderType = '1'; // Package order
                    $order->status = '1';
                    $order->deliveryStatus = '0'; // Pending
                    $order->save();
                    
                    // Clear package data from session
                    Session::forget('package_data');
                    
                    return ['status'=> 1 ,'message'=>'Package order has been successfully created.','userId'=>$user->id];
                }
                else if (isset($carts)){
                    // Handle individual product orders
                    if(Session::get('update_order_id'))
                    {
                        $orderId = Session::get('update_order_id');
                        $delete_old = Order::where('orderId',$orderId)->delete();
                    } else
                    {
                        $orderId = rand(11111111,999999999);
                    }
                   
                    foreach ($carts as $key=>$cart){

                        //return $cart['product']['price'];
                        $order = new Order();
                        $order->orderId = $orderId ?? '';
                        $order->customerId = $user->id ?? '';
                        $order->productId = $cart['product']['id'] ?? '';
                        $order->qty = $cart['quantity'] ?? '';
                        $order->price = $cart['product']['price'] ?? '';
                        $order->signature = $request->signature ?? '';
                        $order->orderType = $isCustomOrder ? '0' : '0'; // Custom mode = 0 (product)
                        $order->status = '1';
                        $order->deliveryStatus = '0'; // Pending
                        $order->save();
                    }
                    // echo '<script>alert("Welcome to Gaurav Sharma")</script>';
                    // return '';
                    return ['status'=> 1 ,'message'=>'Your profile has been successfully update.','userId'=>$user->id];
                }

                // if (isset($request->packageDetails)){
                //     $order = new Order();
                //     $order->orderId = rand(11111111,999999999);
                //     $order->customerId = $user->id ?? '';
                //     $order->packageId = $request->packageDetails ?? '';
                //     $order->signature = $request->signature ?? '';
                //     $order->orderType = '1';
                //     $order->status = '1';
                //     $order->save();
                //     return ['status'=>'1','message'=>'Your profile has been successfully update.','userId'=>$user->id];
                // }
            }
            return ['status'=>'0','message'=>'Oops! Your profile has not updated'];
        } else 
        {

     /**** Insert new customer, delivery address with product/package  ******/

        $customer = Customer::firstOrNew(['insuranceNumber' =>  $insurance_no]);
        $customer->surname = $get_personalData[0]->surname ?? '';
        $customer->insured_type = $get_personalData[0]->insured_type ?? '';
        $customer->firstName = $get_personalData[0]->first_name ?? '';
        $customer->lastName = $get_personalData[0]->last_name ?? '';
        $customer->email = $get_personalData[0]->email ?? '';
        if(Session::get('Customer'))
        {
        } else
        {
        $password = $get_personalData[0]->password ?? 'default_password_123';
        $customer->password = Hash::make($password);
        $customer->view_password = $password;
        }
       
        $customer->street = $get_personalData[0]->streetno ?? '';
        $customer->houseNo = $get_personalData[0]->houseno ?? '';
        $customer->zipcode = $get_personalData[0]->zip ?? '';
        $customer->city = $get_personalData[0]->city ?? '';
        $customer->dob = $get_personalData[0]->dob ?? '';
        $customer->telephone = $get_personalData[0]->telno;
        $customer->insuranceNumber = $get_personalData[0]->insurance_no ?? '';
        $customer->insuranceName = $get_personalData[0]->health_insurance ?? '';
        $customer->healthInsuranceNo = $get_personalData[0]->KrankenkasseNummer ?? '';
        $customer->pflegegrad = $get_personalData[0]->pflegegrad ?? '';
        $customer->insurance_type = $get_personalData[0]->insurance_type ?? '';
        
        $customer->caregiver_name = $get_personalData[0]->angehoriger_name ?? '';
        $customer->caregiver_phone = $get_personalData[0]->angehoriger_telefon ?? '';
        $customer->caregiver_email = $get_personalData[0]->angehoriger_email ?? '';
        $customer->status = '1';
        if ($customer->save()) {
            
            $delivery = DeliveryAddress::firstOrNew(['customerId' =>  $customer->id]);
            $delivery->customerId = $customer->id ?? '';
            $delivery->recipientName = $get_deliveryAddress[0]->recipient_name ?? '';
            $delivery->street = $get_deliveryAddress[0]->street ?? '';
            $delivery->houseNo = $get_deliveryAddress[0]->houseno ?? '';
            $delivery->pincode = $get_deliveryAddress[0]->zip ?? '';
            $delivery->city = $get_deliveryAddress[0]->city ?? '';
            $delivery->save();


            if (isset($request->productDetails)){
                $productDetails = json_decode($request->productDetails);

                if(Session::get('update_order_id'))
                {
                    $orderId = Session::get('update_order_id');
                    $delete_old = Order::where('orderId',$orderId)->delete();
                } else
                {
                    $orderId = rand(11111111,999999999);
                }
                
                foreach ($productDetails->product as $key=>$product){
                    $order = new Order();
                    $order->orderId = $orderId ?? '';
                    $order->customerId = $customer->id; // Pas de ?? '' car $customer existe
                    $order->productId = $product->productID ?? '';
                    $order->qty = $product->productQty ?? '';
                    $order->price = $product->productPrice ?? '';
                    $order->signature = $request->signature ?? '';
                    $order->orderType = $isCustomOrder ? '0' : '0'; // Custom mode = 0 (product)
                    $order->status = '1';
                    $order->deliveryStatus = '0'; // Pending
                    $order->save();
                }

                return ['status'=>1,'message'=>'Your profile has been successfully saved.','userId'=>$customer->id];
            }

            if (isset($request->packageDetails)){
                $order = new Order();
                $order->orderId = rand(11111111,999999999);
                $order->customerId = $customer->id ?? '';
                $order->packageId = $request->packageDetails ?? '';
                $order->signature = $request->signature ?? '';
                $order->orderType = '1';
                $order->status = '1';
                $order->deliveryStatus = '0'; // Pending
                $order->save();
                return ['status'=>1,'message'=>'Your profile has been successfully saved.','userId'=>$customer->id ?? ''];
            }
            return ['status'=>1,'message'=>'Your profile has been successfully saved.','userId'=>$customer->id ?? ''];
        }
    }
        return ['status'=>'0','message'=>'Oops! some server error.'];
    }catch(\Exception $e){
        return ['status'=>'0','message'=>$e->getMessage()];
    }




}
