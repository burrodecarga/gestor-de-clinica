<?php

namespace App\Http\Livewire\Patient;

use App\Models\Disase;
use App\Models\User;
use Illuminate\Support\Str;
use Livewire\Component;

class PatientDisase extends Component
{
    public $search;
    public $perPage = 5;
    public $sortAsc = true;
    public $sortField = 'name';
    public $disaseId;
    public $name, $year, $disase_id, $patient_disases, $patient;

    public $modal = false;

    protected $rules = ['name' => 'required', 'year' => 'required|numeric', 'disase_id' => 'required'];

    public function mount(User $user)
    {
        $this->patient = $user;
        $this->patient_disases = $user->disases;
    }

    public function addModalDisase($disaseId)
    {
            $disase = Disase::find($disaseId);
            $this->name = $disase->name;
            $this->disase_id = $disase->id;
            $this->modal = true;
    }

    public function addDisase()
    {
        $data = $this->validate();
        $this->patient->disases()->attach($data['disase_id'], ['year' => $data['year']]);
        $this->modal = false;
        $this->reset(['name','year','search']);
        $this->patient_disases = $this->patient->disases()->get();
        $this->resetValidation();
        $this->render();

    }

    public function addNew()
    {
        $newDisase = Disase::create([
            'name' => mb_strtolower($this->search),
            'slug' => Str::slug($this->search),
            'symptoms' => '',
        ]);
        $this->disase = $newDisase;
        $this->name = $newDisase->name;
        $this->addModalDisase($newDisase->id);
    }

    public function render()
    {
        if ($this->search) {
            $disases = Disase::search($this->search)->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->paginate($this->perPage);

        } else {
            $disases = [];
        }

        return view('livewire.patient.patient-disase', ['disases' => $disases]);
    }
}
