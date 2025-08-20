<?php

namespace App\Http\Livewire\Admin;

use App\Models\Team;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Session;

class TeamComponent extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $name, $image, $altTag, $titleTag, $heading, $description, $facebook, $twitter, $mobile, $status, $team_id, $showImage;

    public function render()
    {
        $data['title'] = "Manage Our Team";
        $data['teams'] = Team::orderBy('id', 'DESC')->paginate(5);
        return view('livewire.admin.team-component', $data);
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updated($field)
    {
        $this->validateOnly($field, [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required | min:5',
            'altTag' => 'required | min:5',
            'titleTag' => 'required | min:3',
            'heading' => 'required | min:3',
            'description' => 'required | min:10',
            'facebook' => 'required | min:5',
            'twitter' => 'required | min:5',
            'mobile' => 'required| min:10',
            'status' => 'required | min:1',
        ]);
    }

    public function editTeam(int $team_id)
    {
        $team = Team::find($team_id);
        if ($team) {
            $this->team_id = $team->id;
            $this->showImage = $team->image;
            $this->name = $team->name;
            $this->altTag = $team->altTag;
            $this->titleTag = $team->titleTag;
            $this->heading = $team->heading;
            $this->description = $team->description;
            $this->facebook = $team->facebook;
            $this->twitter = $team->twitter;
            $this->mobile = $team->mobile;
            $this->status = $team->status;
        } else {
            return redirect()->to('admin/team');
        }
    }

    public function uploadTeam()
    {
        $validatedData = $this->validate([
            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required | min:5',
            'altTag' => 'required | min:5',
            'titleTag' => 'required | min:3',
            'heading' => 'required | min:3',
            'description' => 'required | min:1',
            'facebook' => 'required | min:1',
            'twitter' => 'required | min:1',
            'mobile' => 'required | min:1',
            'status' => 'required | min:1',
        ]);
        $validatedData['image'] = $this->image->store('images', 'public');
        Team::create($validatedData);
        $this->image = "";
        session()->flash('success', 'Team has been successfully created.');
        return redirect('/admin/team');
    }

    public function updateTeam()
    {
        $validatedData = $this->validate([
            'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required | min:5',
            'altTag' => 'required | min:5',
            'titleTag' => 'required | min:3',
            'heading' => 'required | min:3',
            'description' => 'required | min:1',
            'facebook' => 'required | min:1',
            'twitter' => 'required | min:1',
            'mobile' => 'required | min:1',
            'status' => 'required | min:1',
        ]);
        $team = Team::find($this->team_id);
        $validatedData['image'] = $team->image;
        if ($this->image != null) {
            $storage = storage_path('app/public/' . $team->showImage);
            removeFile($storage);
            $validatedData['image'] = $this->image->store('images', 'public');
        }
        Team::where(['id' => $this->team_id])->update($validatedData);
        session()->flash('success', 'Team successfully updated.');
        return redirect('/admin/team');
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

    public function destroyTeam()
    {
        $team = Team::find($this->team_id);
        Team::where(['id' => $this->team_id])->delete();
        $storage = storage_path('app/public/' . $team->image);
        removeFile($storage);
        session()->flash('success', 'Team Deleted Successfully');
        return redirect('/admin/team');
    }

    public function mount()
    {
        $dynamic = dynamicContent('teams');
        if ($dynamic) {
            $this->heading = $dynamic->heading;
            $this->contents1 = $dynamic->contents;
        } else {
            return redirect()->to('admin/team');
        }
    }

    public function updateDynamic()
    {
        $validatedData = $this->validate([
            'contents1' => 'required | min:10',
            'heading' => 'required | min:5',
        ]);
        \DB::table('dynamic_contents')->where('section_name','teams')->update(['heading'=>$this->heading,'contents'=>$this->contents1]);
        session()->flash('success', 'Data has been successfully updated.');
        return redirect('/admin/team');
    }

}
