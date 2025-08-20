<?php

namespace App\Http\Livewire\Admin;

use App\Models\Partner;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Session;

class PartnerComponent extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $image, $name, $status, $showImage, $partner_id, $altTag, $titleTag;

    public function render()
    {
        $data['title'] = "Clients";
        $data['clients'] = Partner::all();
        return view('livewire.admin.partner-component', $data);
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

    public function uploadPartner()
    {
        $validatedData = $this->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required | min:3',
            'altTag' => 'required | min:3',
            'titleTag' => 'required | min:3',
            'status' => 'required | min:1',
        ]);
        $validatedData['image'] = $this->image->store('images', 'public');
        Partner::create($validatedData);
        $this->image = "";
        session()->flash('success', 'Data successfully Uploaded.');
        return redirect('/admin/partners');
    }

    public function editPartner(int $partner_id)
    {
        $partner = Partner::find($partner_id);
        if ($partner) {
            $this->partner_id = $partner->id;
            $this->showImage = $partner->image;
            $this->name = $partner->name;
            $this->altTag = $partner->altTag;
            $this->titleTag = $partner->titleTag;
            $this->status = $partner->status;
        } else {
            return redirect()->to('admin/partners');
        }
    }

    public function updatePartner()
    {
        $validatedData = $this->validate([
            'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'name' => 'required | min:3',
            'altTag' => 'required | min:3',
            'titleTag' => 'required | min:3',
            'status' => 'required | min:1',
        ]);
        $partner = Partner::find($this->partner_id);
        $validatedData['image'] = $partner->image;
        if ($this->image != null) {
            $storage = storage_path('app/public/' . $this->showImage);
            removeFile($storage);
            $validatedData['image'] = $this->image->store('images', 'public');
        }

        Partner::where(['id' => $this->partner_id])->update($validatedData);
        session()->flash('success', 'Data has been successfully updated.');
        return redirect('/admin/partners');
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

    public function destroyPartner()
    {
        $partner = Partner::find($this->partner_id);
        Partner::where(['id' => $this->partner_id])->delete();
        $storage = storage_path('app/public/' . $partner->image);
        removeFile($storage);
        session()->flash('success', 'Product Deleted Successfully');
        return redirect('/admin/partners');
    }

    public function mount()
    {
        $dynamic = dynamicContent('clients');
        if ($dynamic) {
            $this->heading = $dynamic->heading;
            $this->contents1 = $dynamic->contents;
            $this->url = $dynamic->file;
        } else {
            return redirect()->to('admin/partners');
        }
    }

    public function updateDynamic()
    {
        $validatedData = $this->validate([
            'contents1' => 'required | min:10',
            'heading' => 'required | min:5',
            'url' => 'required | url',
        ]);
        \DB::table('dynamic_contents')->where('section_name','clients')->update(['heading'=>$this->heading,'contents'=>$this->contents1,'file'=>$this->url]);
        session()->flash('success', 'Data has been successfully updated.');
        return redirect('/admin/partners');
    }
}
