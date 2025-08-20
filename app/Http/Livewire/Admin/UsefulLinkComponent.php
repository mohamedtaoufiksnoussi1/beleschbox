<?php

namespace App\Http\Livewire\Admin;

use App\Models\UsefulLinksModel;
use Livewire\Component;

class UsefulLinkComponent extends Component
{
    public $name;
    public $fullUrl;
    public $status;
    public $positionNumber;
    public $url_id;

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updated($field)
    {
        $this->validateOnly($field, [
            'name' => 'required | min:3',
            'fullUrl' => ['required', 'regex:/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i'],
            'status' => 'required | min:1',
        ]);
    }

    public function render()
    {
        $data['title'] = 'Useful Links';
        $data['usefulls'] = UsefulLinksModel::get();
        return view('livewire.admin.useful-link-component', $data);
    }


    public function addUsefulLink()
    {
        $validatedData = $this->validate([
            'name' => 'required | min:3',
            'fullUrl' => ['required', 'regex:/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i'],
            'status' => 'required | min:1',
        ]);
        $usefulLink = new UsefulLinksModel();
        $usefulLink->create($validatedData);
        session()->flash('success', 'Data successfully inserted.');
        return redirect('/admin/useful-link');
    }

    public function editSocial($url_id)
    {
        $usefulLink = UsefulLinksModel::find($url_id);
        $this->url_id = $usefulLink['id'];
        $this->name = $usefulLink['name'];
        $this->fullUrl = $usefulLink['fullUrl'];
        $this->status = $usefulLink['status'];
    }

    public function updateSocial()
    {
        $validatedData = $this->validate([
            'name' => 'required | min:3',
            'fullUrl' => ['required', 'regex:/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i'],
            'status' => 'required | min:1',
        ]);
        UsefulLinksModel::where(['id' => $this->url_id])->update($validatedData);
        session()->flash('success', 'Data successfully updated.');
        return redirect('/admin/useful-link');
    }

    public function destroyLink(){
        UsefulLinksModel::where('id',$this->url_id)->delete();
        session()->flash('success', 'Data successfully deleted.');
        return redirect('/admin/useful-link');
    }
}
