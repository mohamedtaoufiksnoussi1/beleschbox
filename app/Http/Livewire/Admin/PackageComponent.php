<?php

namespace App\Http\Livewire\Admin;

use App\Models\PackageDetails;
use App\Models\Packages;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Session;

class PackageComponent extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $heading, $contents1, $showImage, $name, $image, $package_id, $altTag, $titleTag, $status, $productId = [], $quantity = [], $package = [], $tempData = [];

    public function render()
    {
        $data['title'] = "Packages";
        $data['products'] = Product::orderBy('rank', 'ASC')->get();
        $data['packages'] = Packages::with('get_packageDetails')->get();
        return view('livewire.admin.package-component', $data);
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updated($field)
    {
        $this->validateOnly($field, [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'name' => 'required | min:3',
            'altTag' => 'required | min:3',
            'titleTag' => 'required | min:3',
            'status' => 'required | min:1',
        ]);
    }

    public function mount()
    {
        $dynamic = dynamicContent('packages');
        if ($dynamic) {
            $this->heading = $dynamic->heading;
            $this->contents1 = $dynamic->contents;
        } else {
            return redirect()->to('admin/packages');
        }
    }

    public function uploadPackage()
    {
        $validatedData = $this->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required | min:3',
            'altTag' => 'required | min:3',
            'titleTag' => 'required | min:3',
            'status' => 'required | min:1',
        ]);
        $validatedData['image'] = $this->image->store('images', 'public');

        $package = Packages::create($validatedData);
        $product_ID = array_values($this->productId);
        $product_qty = array_values($this->quantity);
        foreach ($product_ID as $kk => $tk) {

            $packageDetails = new PackageDetails();
            $packageDetails->packageId = $package->id;
            $packageDetails->productId = $tk;
            $packageDetails->qty = $product_qty[$kk];
            $packageDetails->status = '1';
            $packageDetails->save();
        }
        session()->flash('success', 'Data has been successfully inserted.');
        return redirect()->to('admin/packages');
    }

    public function editPackage(int $package_id)
    {
        $bb = [];
        $aa = [];
        $package = Packages::find($package_id);
        $this->showImage = $package->image;
        foreach ($package->get_packageDetails as $pDetails) {
            $aa[$pDetails->productId] = $pDetails->productId;
            $bb[$pDetails->productId] = $pDetails->qty;
        }
          
       ///print_r($bb);
        $this->quantity = $bb;
        $this->productId = $aa;

        if ($package) {
            $this->package_id = $package->id;
            $this->showImage = $package->image;
            $this->name = $package->name;
            $this->altTag = $package->altTag;
            $this->titleTag = $package->titleTag;
            $this->status = $package->status;
        } else {
            return redirect()->to('admin/packages');
        }
    }

    public function updateDynamic()
    {
        $validatedData = $this->validate([
            'heading' => 'required | min:5',
            'contents1' => 'required | min:10',
        ]);
        \DB::table('dynamic_contents')->where('section_name', 'packages')->update(['heading' => $this->heading, 'contents' => $this->contents1]);
        session()->flash('success', 'Data has been successfully updated.');
        return redirect('/admin/packages');
    }

    public function updatePackage()
    {

        $validatedData = $this->validate([
            'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required | min:3',
            'altTag' => 'required | min:3',
            'titleTag' => 'required | min:3',
            'status' => 'required | min:1',
        ]);
        $package = Packages::find($this->package_id);

        $validatedData['image'] = $package->image;
        if ($this->image != null) {
            $storage = storage_path('app/public/' . $this->showImage);
            removeFile($storage);
            $validatedData['image'] = $this->image->store('images', 'public');
        }
        Packages::where(['id' => $this->package_id])->update($validatedData);
        // dd($validatedData['image']);
        $product_ID = array_values($this->productId);
        $product_qty = array_values($this->quantity);
        //dd($product_qty);
        PackageDetails::where('packageId', $this->package_id)->delete();
        foreach ($product_ID as $kk => $tk) {
            if (isset($product_qty[$kk]) && $product_qty[$kk] !='') {
                $packageDetails = new PackageDetails();
                $packageDetails->packageId = $package->id;
                $packageDetails->productId = $tk;
                $packageDetails->qty = $product_qty[$kk];
                $packageDetails->status = '1';
                $packageDetails->save();
            }
        }
        session()->flash('success', 'Data has been successfully updated.');
        return redirect()->to('admin/packages');
    }

    public function destroyPackage()
    {
        $package = Packages::find($this->package_id);
        Packages::where(['id' => $this->package_id])->delete();
        $storage = storage_path('app/public/' . $package->image);
        removeFile($storage);
        session()->flash('success', 'Product Deleted Successfully');
        return redirect('/admin/packages');
    }

}
