<?php

namespace App\Http\Livewire\Admin;

use Livewire\WithPagination;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithFileUploads;
use Session;
use App\Models\Gallery;

class GalleryComponent extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $name, $image, $altTag, $titleTag, $status, $gallery_id, $showImage;

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updated($field)
    {
        $this->validateOnly($field, [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required | min:5',
            'altTag' => 'required | min:3',
            'titleTag' => 'required | min:3',
            'status' => 'required | min:1',
        ]);
    }

    public function render()
    {
        $data['title'] = "Manage Gallery";
        $data['galleries'] = Gallery::orderBy('id', 'DESC')->paginate(4);
        return view('livewire.admin.gallery-component', $data);
    }

    public function editGallery(int $gallery_id)
    {
        $gallery = Gallery::find($gallery_id);
        if ($gallery) {
            $this->gallery_id = $gallery->id;
            $this->showImage = $gallery->image;
            $this->name = $gallery->name;
            $this->altTag = $gallery->altTag;
            $this->titleTag = $gallery->titleTag;
            $this->status = $gallery->status;
        } else {
            return redirect()->to('admin/gallery');
        }
    }

    public function uploadGallery()
    {
        $validatedData = $this->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required | min:3',
            'altTag' => 'required | min:3',
            'titleTag' => 'required | min:3',
            'status' => 'required | min:1',
        ]);
        $validatedData['image'] = $this->image->store('images', 'public');
        Gallery::create($validatedData);
        $this->image = "";
        session()->flash('success', 'Data successfully Uploaded.');
        return redirect('/admin/gallery');
    }

    public function updateGallery()
    {
        $validatedData = $this->validate([
            'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required | min:3',
            'altTag' => 'required | min:3',
            'titleTag' => 'required | min:3',
            'status' => 'required | min:1',
        ]);
        $gallery = Gallery::find($this->gallery_id);
        $validatedData['image'] = $gallery->image;
        if ($this->image != null) {
            $storage = storage_path('app/public/' . $this->showImage);
            removeFile($storage);
            $validatedData['image'] = $this->image->store('images', 'public');
        }
        Gallery::where(['id' => $this->gallery_id])->update($validatedData);
        session()->flash('success', 'Data successfully updated.');
        return redirect('/admin/gallery');
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

    public function destroyGallery()
    {
        $gallery = Gallery::find($this->gallery_id);
        Gallery::where(['id' => $this->gallery_id])->delete();
        $storage = storage_path('app/public/' . $gallery->image);
        removeFile($storage);
        session()->flash('success', 'Data Deleted Successfully');
        return redirect('/admin/gallery');
    }
}
