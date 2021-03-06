<?php

namespace App\Http\Livewire\Doctor;

use Livewire\Component;
use App\Models\Office;

class OfficeController extends Component
{
    public $local,$address,$email,$phone,$mobil,$lat,$lgn,$map,$doctor_id,$office_id;
    public $officeAddModal = false;
    public $officeEditModal = false;
    public $officeDeleteModal=false;


    protected $rules=['local'=>'required', 'address'=>'required','phone'=>'required'];

    public function openAddModal(){
        $this->officeAddModal=true;
    }

    public function openEditModal(Office $office){
        $this->local=$office->local;
        $this->address=$office->address;
        $this->email=$office->email;
        $this->phone=$office->phone;
        $this->mobil=$office->mobil;
        $this->lat=$office->lat;
        $this->lgn=$office->lgn;
        $this->map=$office->map;
        $this->office_id=$office->id;
        $this->officeEditModal=true;
    }

    public function editOffice(Office $office){
        $office->local = $this->local;
        $office->address = $this->address;
        $office->phone = $this->phone;
        $office->mobil = $this->mobil;
        $office->email = $this->email;
        $office->lat = $this->lat;
        $office->lgn = $this->lgn;
        $office->map = $this->map;
        $office->save();
        $this->officeEditModal=false;
    }

    public function openDeleteModal(Office $office){
        $this->local = $office->local;
        $this->address = $office->address;
        $this->office_id=$office->id;
        $this->officeDeleteModal=true;
    }

    public function delOffice(){
        $office = Office::find($this->office_id);
        $office->delete();
        $this->officeDeleteModal=false;
    }






    public function addOffice(){
        $data = $this->validate();
        $this->doctor_id = auth()->user()->id;
        $office = Office::create([
            'local'=>$data['local'],
            'address'=>$data['address'],
            'phone'=>$data['phone'],
            'mobil'=>$this->mobil,
            'email'=>$this->email,
            'lat'=>$this->lat,
            'lgn'=>$this->lgn,
            'map'=>$this->map,
            'doctor_id'=>$this->doctor_id,
        ]);

        $this->officeAddModal=false;
        $this->reset();
        session()->flash('success','registro creado exitosamente');
    }





    public function render()
    {
        $offices = Office::where('doctor_id',auth()->user()->id)->get();
        return view('livewire.doctor.office-controller',[
            'offices'=>$offices
        ])->layout('layouts.doctor');
    }
}
