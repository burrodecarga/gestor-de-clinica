<?php

namespace App\Http\Livewire\Patient;

use App\Models\Medicine;
use Livewire\Component;

class PatientMedicine extends Component
{
    public $medicines = [];
    public $openModalMedicine=false;
    public $user_medicines_id;
    public $search ='';
    public $newName,$slug;
    public $user_medicines;

    // public function mount($user_medicines_id){
    //     $this->user_medicines_id = $user_medicines_id;
    //  }


    public function render()
    {
        $this->user_medicines = Medicine::orderBy('name', 'asc')->whereIn('id', $this->user_medicines_id)->pluck('name', 'id');
        $search = '%' . $this->search . '%';
        $this->medicines = Medicine::orderBy('name', 'asc')->whereNotIn('id', $this->user_medicines_id)->where('name', 'like', $search)
            ->take(10)->get();

        return view('livewire.patient.patient-medicine');
    }
}
