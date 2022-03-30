<?php

namespace App\Http\Livewire\Patient;

use App\Models\User;
use Database\Seeders\UserSeeder;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class PatientList extends Component
{

    use WithPagination;
    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $search = '%'.$this->search.'%';
        $users =User::orderBy('name')->whereNotIn('id',[auth()->user()->id])->where('name','like',$search)->paginate(4);
        return view('livewire.patient.patient-list',['users'=>$users]);
    }
}
