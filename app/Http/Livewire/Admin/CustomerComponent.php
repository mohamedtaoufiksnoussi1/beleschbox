<?php

namespace App\Http\Livewire\Admin;

use App\Models\Customer;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Session;

class CustomerComponent extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $orderColumn = "id";
    public $sortOrder = "desc";
    public $sortLink = '<i class="sorticon fa-solid fa-caret-up"></i>';
    public $searchTerm = "";
    public $surname, $firstName, $lastName, $email, $street, $houseNo, $zipcode, $city, $dob, $telephone, $insuranceNumber, $insuranceName, $healthInsuranceNo, $status, $customerId;
    protected $paginationTheme = 'bootstrap';

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updated($field)
    {
        $this->validateOnly($field, [
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required | email',
            'street' => 'required',
            'houseNo' => 'required',
            'zipcode' => 'required',
            'city' => 'required',
            'dob' => 'required',
            'telephone' => 'required',
            'insuranceNumber' => 'required| min:10',
            'insuranceName' => 'required',
            'healthInsuranceNo' => 'required| min:10',
            'status' => 'required | min:1',
        ]);
        $this->resetPage();
    }

    public function render()
    {
        $title = "Manage Customers";
        $customers = Customer::orderby($this->orderColumn, $this->sortOrder)->select('*');
        if (!empty($this->searchTerm)) {

            $customers->orWhere('firstName', 'like', "%" . $this->searchTerm . "%");
            $customers->orWhere('lastName', 'like', "%" . $this->searchTerm . "%");
            $customers->orWhere('email', 'like', "%" . $this->searchTerm . "%");
            $customers->orWhere('telephone', 'like', "%" . $this->searchTerm . "%");
            $customers->orWhere('insuranceNumber', 'like', "%" . $this->searchTerm . "%");
            $customers->orWhere('insuranceName', 'like', "%" . $this->searchTerm . "%");
        }

        $customers = $customers->paginate(10);
        return view('livewire.admin.customer-component', [
            'customers' => $customers,
            'title' => $title,
        ]);
    }



    public function sortOrder($columnName = "")
    {
        $caretOrder = "up";
        if ($this->sortOrder == 'asc') {
            $this->sortOrder = 'desc';
            $caretOrder = "down";
        } else {
            $this->sortOrder = 'asc';
            $caretOrder = "up";
        }
        $this->sortLink = '<i class="sorticon fa-solid fa-caret-' . $caretOrder . '"></i>';
        $this->orderColumn = $columnName;
    }

    public function editCustomer(int $customerId)
    {
        $customer = Customer::find($customerId);
        if ($customer) {
            $this->customerId = $customer->id;
            $this->surname = $customer->surname;
            $this->firstName = $customer->firstName;
            $this->lastName = $customer->lastName;
            $this->email  = $customer->email ;
            $this->street = $customer->street;
            $this->houseNo = $customer->houseNo;
            $this->zipcode = $customer->zipcode;
            $this->city = $customer->city;
            $this->dob = $customer->dob;
            $this->telephone = $customer->telephone;
            $this->insuranceNumber  = $customer->insuranceNumber ;
            $this->insuranceName = $customer->insuranceName;
            $this->healthInsuranceNo  = $customer->healthInsuranceNo ;
            $this->status = $customer->status;
        } else {
            return redirect()->to('admin/customers');
        }
    }

    public function updateCustomer()
    {
        $validatedData = $this->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required | email',
            'street' => 'required',
            'houseNo' => 'required',
            'zipcode' => 'required',
            'city' => 'required',
            'dob' => 'required',
            'telephone' => 'required',
            'insuranceNumber' => 'required| min:10',
            'insuranceName' => 'required',
            'healthInsuranceNo' => 'required| min:10',
            'status' => 'required | min:1',
        ]);
        $customer = Customer::find($this->customerId);
        Customer::where(['id' => $this->customerId])->update($validatedData);
        session()->flash('success', 'Profile successfully updated.');
        return redirect('/admin/customers');
    }

    public function destroyCustomer()
    {
        Customer::where(['id' => $this->customerId])->delete();
        session()->flash('success', 'Customer Deleted Successfully');
        return redirect('/admin/customers');
    }

}
