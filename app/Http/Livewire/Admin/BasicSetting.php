<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Http\Request;
use Livewire\Component;
use Session;
use App\Models\Setting;

class BasicSetting extends Component
{
    public $terms_conditions, $privacy, $cookies;

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updated($field)
    {
        $this->validateOnly($field, [
            'terms_conditions' => 'required | min:50',
            'privacy' => 'required | min:50',
            'cookies' => 'required | min:50',
        ]);
    }

    public function mount()
    {
        $setting = Setting::find(1);
        if ($setting) {
            $this->terms_conditions = $setting->terms_conditions;
            $this->privacy = $setting->privacy;
            $this->cookies = $setting->cookies;
        } else {
            return redirect()->to('admin/setting');
        }
    }

    public function render()
    {
        $data['title'] = "Manage Basic Settings";
        return view('livewire.admin.basic-setting', $data);
    }

    public function updateSetting()
    {
        $validatedData = $this->validate([
            'terms_conditions' => 'required | min:50',
            'privacy' => 'required | min:50',
            'cookies' => 'required | min:50',
        ]);
        Setting::where(['id' => 1])->update($validatedData);
        session()->flash('success', 'Data has been successfully updated.');
        return redirect('/admin/setting');
    }
}
