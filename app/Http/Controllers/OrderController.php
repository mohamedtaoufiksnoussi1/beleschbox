<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\DeliveryAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Product;
use App\Models\Order;
use Validator;


class OrderController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.orders');
    }

    public function customerInfo(Request $request)
    {
        
        try {
            Session::put('is_printable', 1);
            $personalData = json_decode($request->userDetails);
            $deliveryAddress = json_decode($request->deliveryAddress);
            $user = Session::get('Customer');

            $checkEmailCount = Customer::where('email',$personalData[0]->email)->count();
            $checkInsuranceCount = Customer::where('insuranceNumber',$personalData[0]->insurance_no)->count();
            $checkHealthInsuranceCount = Customer::where('healthInsuranceNo',$personalData[0]->KrankenkasseNummer)->count();
            if($checkEmailCount > 0)
            {
             return ['status'=>'0','message'=>'Email Id already exist.'];
            }
            if($checkInsuranceCount > 0)
            {
             return ['status'=>'0','message'=>'Insurance Number already exist.'];
            }
     
            if($checkHealthInsuranceCount > 0)
            {
             return ['status'=>'0','message'=>'Health Insurance Number already exist.'];
            }

            if($personalData[0]->surname != '')
            {
                Session::put('personalData', $personalData);
                Session::put('deliveryAddress', $deliveryAddress);
            }
           
            $get_personalData = Session::get('personalData');
            $get_deliveryAddress = Session::get('deliveryAddress');

            $customer = Customer::firstOrNew(['email' =>  $get_personalData[0]->email]);
            $customer->surname = $get_personalData[0]->surname ?? '';
            $customer->insured_type = $get_personalData[0]->insured_type ?? '';
            $customer->firstName = $get_personalData[0]->first_name ?? '';
            $customer->lastName = $get_personalData[0]->last_name ?? '';
            $customer->email = $get_personalData[0]->email ?? '';
            if(Session::get('Customer'))
            {
            } else
            {
                $customer->password = Hash::make( $get_personalData[0]->password);
                $customer->view_password = $get_personalData[0]->password;
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
            $customer->pflegegrad = $get_personalData[0]->pflegegrad ?? '';
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
                return ['status'=>'1','message'=>'Your profile has been successfully saved.'];
            }
            return ['status'=>'0','message'=>'Oops! some server error.'];
        } catch (\Exception $e) {
            return ['status'=>'0','message'=>$e->getMessage()];
        }
    }

    public function updateOrder(Request $request)
    {
        $request->session()->forget('cart');
        Session::put('is_printable', 0);
       
        $order_id = $request->orderId;
        $orders = Order::where('orderId',$request->orderId)->get();
       
        if(!$orders)
        {
            return redirect()->back();
        }
        
        Session::put('is_updated_order', 1);
        $customerId = $orders[0]->customerId;
        $customer = Customer::where('id',$customerId)->first();

        Session::put('update_order_customer', $customer);
        Session::put('Customer', $customer);
        Session::put('update_order_id', $order_id);
        Session::put('is_printable', 0);
        

        $cart = array();
        foreach($orders as $order)
        {
            $cart[] = [
                'product' => Product::where('id',$order->productId)->first(),
                'quantity' => 1
            ];
        }

        
        // array_push($cart, [
        //     'product' => Product::where('id',$pks->productId)->first(),
        //     'quantity' => 1
        // ]);
        $request->session()->put('cart', $cart);
        
        return redirect('assemble?updt='.$order_id);
        
    }

    public function updateCartOrder(Request $request)
    {
            $carts = $request->session()->get('cart');
            
            
            if (isset($carts)){
                if(Session::get('update_order_id'))
                {
                    $orderId = Session::get('update_order_id');
                    $delete_old = Order::where('orderId',$orderId)->delete();
                } else
                {
                    $orderId = rand(11111111,999999999);
                }

            $order_customer = $request->session()->get('update_order_customer');
            $customer_id = $order_customer->id;
           
            foreach ($carts as $key=>$cart){

                //return $cart['product']['price'];
                $order = new Order();
                $order->orderId = $orderId ?? '';
                $order->customerId = $customer_id;
                $order->productId = $cart['product']['id'] ?? '';
                $order->qty = $cart['quantity'] ?? '';
                $order->price = $cart['product']['price'] ?? '';
                $order->signature = $request->signature ?? '';
                
                // Déterminer le type de commande
                // Si c'est une commande custom (Assemble Curebox), orderType = '0'
                // Si c'est une commande de package, orderType = '1'
                if (isset($cart['custom']) && $cart['custom']) {
                    $order->orderType = '0'; // Commande custom = produit individuel
                } else {
                    $order->orderType = '0'; // Par défaut, traiter comme produit individuel
                }
                
                $order->status = '1';
                $order->save();
            }
            $request->session()->forget('cart');
            $request->session()->forget('is_printable');
            $request->session()->forget('update_order_id');

            session()->flash('success', 'Your Order has been updated successfully.');
            return redirect()->route('customer-profile');
        }

    }
    

    public function productCheckout(Request $request)
    {
        if($request->userDetails != '')
        {
            $personalData = json_decode($request->userDetails);
        } else
        {
            $personalData = Session::get('personalData');
            $get_deliveryAddress = Session::get('deliveryAddress');
        }

    //     return $personalData[0]->email;
      
    //    $checkEmailCount = Customer::where('email',$personalData[0]->email)->count();
    //    $checkInsuranceCount = Customer::where('insuranceNumber',$personalData[0]->insurance_no)->count();
    //    $checkHealthInsuranceCount = Customer::where('healthInsuranceNo',$personalData[0]->KrankenkasseNummer)->count();
    //    if($checkEmailCount > 0)
    //    {
    //     return ['status'=>'0','message'=>'Email Id already exist.'];
    //    }
    //    if($checkInsuranceCount > 0)
    //    {
    //     return ['status'=>'0','message'=>'Insurance Number already exist.'];
    //    }

    //    if($checkHealthInsuranceCount > 0)
    //    {
    //     return ['status'=>'0','message'=>'Health Insurance Number already exist.'];
    //    }

      
       ///dd($personalData);

         $result = saveCustomerWithDeliverAddress($request);
         if($result['status'] == 0){
             return ['status'=>'0','message'=>$result['message']];
         }else{
             return ['status'=>'1','message'=>'Data has been successfully uploaded.'];
         }
    }
}
