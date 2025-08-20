<?php

namespace App\Http\Livewire\Admin;

use Livewire\WithPagination;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithFileUploads;
use Session;
use App\Models\About;

class AboutUs extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $header_heading, $header_content, $header_image, $about_heading, $about_title, $about_contents, $video, $video_cover, $video_cover1, $header_image1;

    public function render()
    {
        $data['title'] = "Manage About Us";
        $data['details'] = About::find(1);
        return view('livewire.admin.about-us', $data);
    }

    public function updated($field)
    {
        $this->validateOnly($field, [
            'video_cover' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'header_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'header_heading' => 'required | min:5',
            'header_content' => 'required | min:5',
            'about_heading' => 'required | min:3',
            'about_title' => 'required | min:3',
            'about_contents' => 'required | min:1',
            'video' => 'required | min:1',
        ]);
    }

    public function mount()
    {
        $about = About::find(1);
        if ($about) {
            $this->video_cover1 = $about->video_cover;
            $this->header_image1 = $about->header_image;
            $this->header_heading = $about->header_heading;
            $this->header_content = $about->header_content;
            $this->about_heading = $about->about_heading;
            $this->about_title = $about->about_title;
            $this->about_contents = $about->about_contents;
            $this->video = $about->video;
        } else {
            return redirect()->to('admin/slider');
        }
    }

    public function updateAboutUs()
    {
        $validatedData = $this->validate([
            'header_heading' => 'required | min:5',
            'header_content' => 'required | min:5',
            'about_heading' => 'required | min:3',
            'about_title' => 'required | min:3',
            'about_contents' => 'required | min:1',
            'video' => 'required',
        ]);
        if ($this->video_cover != null) {
            $storage = storage_path('app/public/' . $this->video_cover1);
            removeFile($storage);
            $validatedData['video_cover'] = $this->video_cover->store('images', 'public');
        }

        if ($this->header_image != null) {
            $storage = storage_path('app/public/' . $this->header_image1);
            removeFile($storage);
            $validatedData['header_image'] = $this->header_image->store('images', 'public');
        }
        About::where(['id' => 1])->update($validatedData);
        session()->flash('success', 'Data has been successfully updated.');
        return redirect('/admin/aboutUs');
    }
}
