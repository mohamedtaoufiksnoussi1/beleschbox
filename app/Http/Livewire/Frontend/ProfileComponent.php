<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Customer;
use App\Models\DeliveryAddress;
use App\Models\Order;
use Hash;
use Livewire\Component;
use Session;

class ProfileComponent extends Component
{
    public $first_name, $last_name, $streetno, $houseno, $zip, $city, $dob, $telno, $email, $d_recipientName, $d_street, $d_houseNo, $d_pincode, $d_city;

    public function render()
    {
        // Vérifier si l'utilisateur est connecté
        $customer = \Session::get('Customer');
        if (!$customer) {
            return redirect()->route('userLogin')->with('error', 'Veuillez vous connecter pour voir votre profil.');
        }
        
        $customerId = $customer->id;
        $data['orders'] = Order::where('customerId',$customerId)->orderBy('id','desc')->get()
            ->groupBy('orderId');
        return view('livewire.frontend.profile-component',$data);
    }

    public function updated($field)
    {
        $this->validateOnly($field, [
            'first_name' => 'required | min:2',
            'last_name' => 'required | min:2',
            'streetno' => 'required',
            'houseno' => 'required',
            'zip' => 'required',
            'city' => 'required',
            'dob' => 'required',
            'telno' => 'required',
            'email' => 'required|email',
            'd_recipientName' => 'required',
            'd_street' => 'required',
            'd_houseNo' => 'required',
            'd_pincode' => 'required',
            'd_city' => 'required',
        ]);
    }

    public function mount()
    {
        $customerId = \Session::get('Customer')->id;
        $customer = Customer::find($customerId);
        if ($customer) {
            $this->first_name = $customer->firstName;
            $this->last_name = $customer->lastName;
            $this->email = $customer->email;
            $this->streetno = $customer->street;
            $this->houseno = $customer->houseNo;
            $this->zip = $customer->zipcode;
            $this->city = $customer->city;
            $this->dob = $customer->dob;
            $this->telno = $customer->telephone;
        }

        $deliverAddress = DeliveryAddress::where('customerId',$customerId)->first();
        if (isset($deliverAddress->id)){
            $this->d_recipientName = $deliverAddress->recipientName;
            $this->d_street = $deliverAddress->street;
            $this->d_houseNo = $deliverAddress->houseNo;
            $this->d_pincode = $deliverAddress->pincode;
            $this->d_city = $deliverAddress->city;
        }
    }

    public function submit()
    {
        try {
            $validatedData = $this->validate([
                'first_name' => 'required | min:2',
                'last_name' => 'required | min:2',
                'streetno' => 'required',
                'houseno' => 'required',
                'zip' => 'required',
                'city' => 'required',
                'dob' => 'required',
                'telno' => 'required',
                'email' => 'required|email',
            ]);
            $array = ['firstName' => $this->first_name,
                'lastName' => $this->last_name,
                'email' => $this->email,
                'street' => $this->streetno,
                'houseNo' => $this->houseno,
                'zipcode' => $this->zip,
                'city' => $this->city,
                'dob' => $this->dob,
                'telephone' => $this->telno,
            ];
            $customerId = \Session::get('Customer')->id;
            Customer::where(['id' => $customerId])->update($array);
            session()->flash('success', 'Data has been successfully updated.');
            return redirect()->route('customer-profile');
        } catch (\Exception $e) {
            session()->flash('message', $e->getMessage());
            return redirect()->route('customer-profile');
        }
    }

    public function deliverySubmit()
    {
        // $validatedData = $this->validate([
        //     'd_recipientName' => 'required',
        //     'd_street' => 'required',
        //     'd_houseNo' => 'required',
        //     'd_pincode' => 'required',
        //     'd_city' => 'required',
        // ]);
        $array = [
            'recipientName'=>$this->d_recipientName,
            'street'=>$this->d_street,
            'houseNo'=>$this->d_houseNo,
            'pincode'=>$this->d_pincode,
            'city'=>$this->d_city,
        ];
        $customerId = Session::get('Customer')->id;
        ///dd($customerId);
        $customer = DeliveryAddress::firstOrNew(['customerId' =>  $customerId]);
        $customer->customerId = $customerId;
        $customer->recipientName = $this->d_recipientName;
        $customer->street = $this->d_street;
        $customer->houseNo = $this->d_houseNo;
        $customer->pincode = $this->d_pincode;
        $customer->city = $this->d_city;
        $customer->save();

        // DeliveryAddress::where(['customerId' => $customerId])->update($array);
        session()->flash('success', 'Data has been successfully updated.');
        return redirect()->route('customer-profile');
    }
}
