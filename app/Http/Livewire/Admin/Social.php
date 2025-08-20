<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Http\Request;
use Livewire\Component;
use Session;
use App\Models\SocialMedia;

class Social extends Component
{
    public $name, $url, $status, $social_id;

    public function updated($field)
    {
        $this->validateOnly($field, [
            'name' => 'required | min:3',
            'url' => ['required', 'regex:/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i'],
            'status' => 'required | min:1',
        ]);
    }

    public function editSocial(int $social_id)
    {
        $social = SocialMedia::find($social_id);
        if ($social) {
            $this->social_id = $social->id;
            $this->name = $social->name;
            $this->url = $social->url;
            $this->status = $social->status;
        } else {
            return redirect()->to('admin/social-media');
        }
    }

    public function render()
    {
        $data['title'] = "Social Media";
        $data['socials'] = SocialMedia::all();
        return view('livewire.admin.social', $data);
    }

    public function updateSocial()
    {
        $validatedData = $this->validate([
            'name' => 'required | min:3',
            'url' => ['required', 'regex:/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i'],
            'status' => 'required | min:1',
        ]);
        SocialMedia::where(['id' => $this->social_id])->update($validatedData);
        $this->image = "";
        session()->flash('success', 'Data successfully Uploaded.');
        return redirect('/admin/social-media');
    }
}
