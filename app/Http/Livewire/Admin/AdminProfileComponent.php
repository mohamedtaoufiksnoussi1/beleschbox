<?php

namespace App\Http\Livewire\Admin;

use Livewire\WithPagination;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithFileUploads;
use Session;
use App\Models\Profile;

class AdminProfileComponent extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $name, $email, $telephone, $address, $openDayFrom, $closeDayTo, $openTimeFrom, $closeTimeTo;

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updated($field)
    {
        $this->validateOnly($field, [
            'name' => 'required | min:3',
            'email' => 'required |email| min:5',
            'telephone' => 'required | min:3',
            'address' => 'required | min:10',
            'openDayFrom' => 'required | min:1',
            'closeDayTo' => 'required | min:1',
            'openTimeFrom' => 'required | min:1',
            'closeTimeTo' => 'required | min:1',
        ]);
    }

    public function render()
    {
        $data['title'] = "Manage Profile";
        return view('livewire.admin.admin-profile-component', $data);
    }

    public function mount()
    {
        $profile = Profile::find(1);
        if ($profile) {
            $this->name = $profile->name;
            $this->email = $profile->email;
            $this->telephone = $profile->telephone;
            $this->address = $profile->address;
            $this->openDayFrom = $profile->openDayFrom;
            $this->closeDayTo = $profile->closeDayTo;
            $this->openTimeFrom = $profile->openTimeFrom;
            $this->closeTimeTo = $profile->closeTimeTo;
        } else {
            return redirect()->to('admin/profile');
        }
    }

    public function updateProfile()
    {
        $validatedData = $this->validate([
            'name' => 'required | min:5',
            'email' => 'required | min:5',
            'telephone' => 'required | min:3',
            'address' => 'required | min:10',
            'openDayFrom' => 'required | min:1',
            'closeDayTo' => 'required | min:1',
            'openTimeFrom' => 'required | min:1',
            'closeTimeTo' => 'required | min:1',
        ]);

        Profile::where(['id' => 1])->update($validatedData);
        session()->flash('success', 'Data successfully updated.');
        return redirect('/admin/profile');
    }
}
