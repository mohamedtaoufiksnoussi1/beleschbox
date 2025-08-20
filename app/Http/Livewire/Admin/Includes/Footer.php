<?php

namespace App\Http\Livewire\Admin\Includes;

use Livewire\Component;
use Session;


class Footer extends Component
{
    public $modelName;
    public $controllerName;
    public $tableName;
    public $columnName;

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updated($field)
    {
        $this->validateOnly($field, [
            'modelName' => 'required | min:3',
            'controllerName' => 'required | min:3',
            'tableName' => 'required | min:3',
            'columnName' => 'required | min:3',
        ]);
    }

    public function render()
    {
        $data['tables'] = \DB::select('SHOW TABLES');
        return view('livewire.admin.includes.footer', $data);
    }

    public function saveModel()
    {
        $this->validate([
            'modelName' => 'required | min:3',
        ]);
        \Artisan::call('make:model ' . ucfirst($this->modelName));
        session()->flash('success', 'The model has been successfully created.');
        return redirect('/admin/dashboard');

    }

    public function saveController()
    {
        $this->validate([
            'controllerName' => 'required | min:3',
        ]);

        \Artisan::call('make:controller ' . ucfirst($this->controllerName));
        session()->flash('success', 'The controller has been successfully created.');
        return redirect('/admin/dashboard');

    }

    public function createMigration()
    {
        $this->validate([
            'tableName' => 'required | min:3',
        ]);
        \Artisan::call('make:migration create_' . $this->tableName . '_table');
        session()->flash('success', 'The migration has been successfully created.');
        return redirect('/admin/dashboard');

    }

    public function alterTable()
    {
        $this->validate([
            'tableName' => 'required | min:3',
            'columnName' => 'required | min:3',
        ]);

        \Artisan::call('make:migration add_' . $this->columnName . '_to_' . $this->tableName . ' --table=' . $this->tableName);
        session()->flash('success', 'The table has been successfully altered.');
        return redirect('/admin/dashboard');
    }

    public function createAll()
    {
        $this->validate([
            'modelName' => 'required | min:3',
        ]);

        \Artisan::call('make:model --migration --controller ' . ucfirst($this->modelName));
        session()->flash('success', 'The table has been successfully altered.');
        return redirect('/admin/dashboard');
    }
}
