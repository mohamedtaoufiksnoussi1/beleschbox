<?php

namespace App\Http\Livewire\Admin;

use Livewire\WithPagination;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithFileUploads;
use Session;
use App\Models\Sliders;


class Slider extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $image1;
    public $image;
    public $heading;
    public $titlee;
    public $altTag;
    public $titleTag;
    public $status;
    public $slider_id;
    public $showImage;

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updated($field)
    {
        $this->validateOnly($field, [
            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
            'heading' => 'required | min:5',
            'titlee' => 'required | min:5',
            'altTag' => 'required | min:3',
            'titleTag' => 'required | min:3',
            'status' => 'required | min:1',
        ]);
    }

    public function render()
    {
        $data['title'] = 'Manage Sliders';
        $data['sliders'] = Sliders::orderBy('id', 'DESC')->paginate(4);
        return view('livewire.admin.slider', $data);
    }

    public function editSlider(int $slider_id)
    {
        $slider = Sliders::find($slider_id);
        if ($slider) {
            $this->slider_id = $slider->id;
            $this->showImage = $slider->image;
            $this->heading = $slider->heading;
            $this->titlee = $slider->title;
            $this->altTag = $slider->altTag;
            $this->titleTag = $slider->titleTag;
            $this->status = $slider->status;
        } else {
            return redirect()->to('admin/slider');
        }
    }

    public function uploadSlider()
    {
        $validatedData = $this->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'heading' => 'required | min:5',
            'titlee' => 'required | min:5',
            'altTag' => 'required | min:3',
            'titleTag' => 'required | min:3',
            'status' => 'required | min:1',
        ]);
        $validatedData['image'] = $this->image->store('images', 'public');

        $validatedData['title'] = $this->titlee;
        unset($validatedData['titlee']);
        Sliders::create($validatedData);
        $this->image = "";
        session()->flash('success', 'Image successfully Uploaded.');
        return redirect('/admin/slider');

    }

    public function updateSlider()
    {
        $validatedData = $this->validate([
            'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'heading' => 'required | min:5',
            'titlee' => 'required | min:5',
            'altTag' => 'required | min:3',
            'titleTag' => 'required | min:3',
            'status' => 'required | min:1',
        ]);
        $slider = Sliders::find($this->slider_id);
        $validatedData['image'] = $slider->image;
        if ($this->image != null) {
            $storage = storage_path('app/public/' . $this->showImage);
            removeFile($storage);
            $validatedData['image'] = $this->image->store('images', 'public');
        }
        $validatedData['title'] = $this->titlee;
        unset($validatedData['titlee']);
        Sliders::where(['id' => $this->slider_id])->update($validatedData);
        session()->flash('success', 'Image successfully updated.');
        return redirect('/admin/slider');
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

    public function destroySlider()
    {
        $slider = Sliders::find($this->slider_id);
        Sliders::where(['id' => $this->slider_id])->delete();
        $storage = storage_path('app/public/' . $slider->image);
        removeFile($storage);
        session()->flash('success', 'Slider Deleted Successfully');
        return redirect('/admin/slider');
    }
}
