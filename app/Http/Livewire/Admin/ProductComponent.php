<?php

namespace App\Http\Livewire\Admin;

use App\Models\Gallery;
use Livewire\WithPagination;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithFileUploads;
use Session;
use App\Models\Product;

class ProductComponent extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $positionNumber, $heading,$contents1, $image, $rank, $name, $product_title, $size_availability = [], $altTag, $titleTag, $contents, $price, $measurement, $status, $showImage, $product_id, $description = '';

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updated($field)
    {
        $this->validateOnly($field, [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'rank' => 'required|integer',
            'name' => 'required | min:3',
            'product_title' => 'required | min:3',
            'altTag' => 'required | min:3',
            'titleTag' => 'required | min:3',
            'contents' => 'required | min:10',
            'price' => 'regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
            'measurement' => 'required | min:1',
            'status' => 'required | min:1',
        ]);
    }

    public function render()
    {
        $data['title'] = "Products";
        $data['products'] = Product::orderBy('rank', 'ASC')->get();
        return view('livewire.admin.product-component', $data);
    }

    public function uploadProduct()
    {
        $validatedData = $this->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required | min:3',
            'product_title' => 'required | min:3',
            'rank' => 'required|integer',
            'altTag' => 'required | min:3',
            'titleTag' => 'required | min:3',
            'price' => 'regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
            'status' => 'required | min:1',
            'contents' => 'required | min:10',
            'measurement' => 'required | min:1',
        ]);
        $validatedData['image'] = $this->image->store('images', 'public');
        if ($this->size_availability != null && isset($this->size_availability)) {
            $validatedData['size_availability'] = rtrim(implode(',', array_filter($this->size_availability)), ',');
        }
        $validatedData['positionNumber'] = rand(11,99).".".rand(11,99).".".rand(11,99).".".rand(1111,9999);
        Product::create($validatedData);
        $this->image = "";
        session()->flash('success', 'Data successfully Uploaded.');
        return redirect('/admin/products');
    }

    public function editProduct(int $product_id)
    {
        $product = Product::find($product_id);
        if ($product) {
            $this->product_id = $product->id;
            $this->showImage = $product->image;
            $this->name = $product->name;
            $this->altTag = $product->altTag;
            $this->titleTag = $product->titleTag;
            $this->status = $product->status;
            $this->price = $product->price;
            $this->contents = $product->contents;
            $this->description = $product->contents;
            $this->rank = $product->rank;
            $this->measurement = $product->measurement;
            $this->product_title = $product->product_title;
            $this->positionNumber = $product->positionNumber;
            
            // Fix size_availability handling
            if ($product->size_availability) {
                $this->size_availability = explode(',', $product->size_availability);
            } else {
                $this->size_availability = [];
            }
            
            $this->emit('initializeEditor', ['contents' => $this->contents]);
        } else {
            return redirect()->to('admin/products');
        }
    }


    public function updateProduct()
    {
        $validatedData = $this->validate([
            'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required | min:3',
            'product_title' => 'required | min:3',
            'rank' => 'required|integer',
            'altTag' => 'required | min:3',
            'titleTag' => 'required | min:3',
            'price' => 'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
            'status' => 'required | min:1',
            'contents' => 'required | min:10',
            'measurement' => 'required | min:1',
            'positionNumber' => 'required | min:3',
        ]);
        
        $product = Product::find($this->product_id);
        if (!$product) {
            session()->flash('error', 'Product not found.');
            return redirect('/admin/products');
        }
        
        $validatedData['image'] = $product->image;
        if ($this->image != null) {
            $storage = storage_path('app/public/' . $this->showImage);
            if (file_exists($storage)) {
                removeFile($storage);
            }
            $validatedData['image'] = $this->image->store('images', 'public');
        }
        
        // Fix size_availability handling
        if ($this->size_availability != null && is_array($this->size_availability) && count($this->size_availability) > 0) {
            $validatedData['size_availability'] = implode(',', array_filter($this->size_availability));
        } else {
            $validatedData['size_availability'] = null;
        }
        
        Product::where(['id' => $this->product_id])->update($validatedData);
        session()->flash('success', 'Product has been successfully updated.');
        return redirect('/admin/products');
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
//        $this->name = '';
//        $this->email = '';
//        $this->course = '';
    }

    public function destroyProduct()
    {
        $product = Product::find($this->product_id);
        Product::where(['id' => $this->product_id])->delete();
        $storage = storage_path('app/public/' . $product->image);
        removeFile($storage);
        session()->flash('success', 'Product Deleted Successfully');
        return redirect('/admin/products');
    }

    public function mount()
    {
        $dynamic = dynamicContent('products');
        if ($dynamic) {
            $this->heading = $dynamic->heading;
            $this->contents1 = $dynamic->contents;
        } else {
            return redirect()->to('admin/products');
        }
    }

    public function updateDynamic()
    {
        $validatedData = $this->validate([
            'contents1' => 'required | min:10',
            'heading' => 'required | min:5',
        ]);
        \DB::table('dynamic_contents')->where('section_name','products')->update(['heading'=>$this->heading,'contents'=>$this->contents1]);
        session()->flash('success', 'Data has been successfully updated.');
        return redirect('/admin/products');
    }

}
