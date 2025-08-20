<?php

namespace App\Http\Livewire\Admin;

use Livewire\WithPagination;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithFileUploads;
use Session;
use App\Models\Testimonial;

class TestimonialComponent extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $name, $designation, $image, $altTag, $titleTag, $message, $status, $testimonial_id, $showImage;

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updated($field)
    {
        $this->validateOnly($field, [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required | min:3',
            'designation' => 'required | min:2',
            'altTag' => 'required | min:3',
            'titleTag' => 'required | min:3',
            'message' => 'required | min:10',
            'status' => 'required | min:1',
        ]);
    }

    public function render()
    {
        $data['title'] = "Manage Testimonial";
        $data['testimonials'] = Testimonial::orderBy('id', 'DESC')->paginate(4);
        return view('livewire.admin.testimonial-component', $data);
    }

    public function editTestimonial(int $testimonial_id)
    {
        $testimonial = Testimonial::find($testimonial_id);
        if ($testimonial) {
            $this->testimonial_id = $testimonial->id;
            $this->showImage = $testimonial->image;
            $this->name = $testimonial->name;
            $this->designation = $testimonial->designation;
            $this->altTag = $testimonial->altTag;
            $this->titleTag = $testimonial->titleTag;
            $this->message = $testimonial->message;
            $this->status = $testimonial->status;
        } else {
            return redirect()->to('admin/slider');
        }
    }

    public function uploadTestimonial()
    {
        $validatedData = $this->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required | min:3',
            'designation' => 'required | min:2',
            'altTag' => 'required | min:3',
            'titleTag' => 'required | min:3',
            'message' => 'required | min:10',
            'status' => 'required | min:1',
        ]);
        $validatedData['image'] = $this->image->store('images', 'public');
        Testimonial::create($validatedData);
        $this->image = "";
        session()->flash('success', 'Data successfully Uploaded.');
        return redirect('/admin/testimonial');
    }

    public function updateTestimonial()
    {
        $validatedData = $this->validate([
            'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required | min:3',
            'designation' => 'required | min:2',
            'altTag' => 'required | min:3',
            'titleTag' => 'required | min:3',
            'message' => 'required | min:10',
            'status' => 'required | min:1',
        ]);
        $testimonial = Testimonial::find($this->testimonial_id);
        $validatedData['image'] = $testimonial->image;
        if ($this->image != null) {
            $storage = storage_path('app/public/' . $this->showImage);
            removeFile($storage);
            $validatedData['image'] = $this->image->store('images', 'public');
        }
        Testimonial::where(['id' => $this->testimonial_id])->update($validatedData);
        session()->flash('success', 'Data successfully updated.');
        return redirect('/admin/testimonial');
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

    public function destroyTestimonial()
    {
        $testimonial = Testimonial::find($this->testimonial_id);
        Testimonial::where(['id' => $this->testimonial_id])->delete();
        $storage = storage_path('app/public/' . $testimonial->image);
        removeFile($storage);
        session()->flash('success', 'Data Deleted Successfully');
        return redirect('/admin/testimonial');
    }
}
