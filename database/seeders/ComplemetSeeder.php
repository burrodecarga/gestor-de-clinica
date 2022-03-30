<?php

namespace Database\Seeders;

use App\Models\Disase;
use App\Models\Interview;
use App\Models\Medicine;
use App\Models\Surgery;
use App\Models\Symptom;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComplemetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get('database/data/sintomas.json');
        $data = json_decode($json);
        foreach($data as $obj){
            $symptom = new Symptom();
            $symptom->name = mb_strtolower($obj->name);
            $symptom->slug = Str::slug($obj->name);
            $symptom->save();
        }

        $json = File::get('database/data/operaciones.json');
        $data = json_decode($json);
        foreach($data as $obj){
            $surgery = new Surgery();
            $surgery->name = mb_strtolower($obj->name);
            $surgery->slug = Str::slug($obj->name);
            $surgery->save();
        }


        for($i=1;$i<20;$i++){
            Medicine::create([
                'name'=>'medicine'.$i,
                'slug'=>'medicine'.$i
            ]);
        }


        $patient = User::role('patient')->get();
        $surgeries =Surgery::inRandomOrder()->limit(3)->pluck('id');
        $symptoms =Symptom::inRandomOrder()->limit(5)->pluck('id');
        $disases = Disase::inRandomOrder()->limit(3)->pluck('id');

        foreach($patient as $p){
            $p->surgeries()->attach($surgeries,['year'=>1985]);
            $p->disases()->attach($disases,['year'=>1985]);
            $doctors =User::role('doctor')->inRandomOrder()->limit(3)->pluck('id');
            foreach($doctors as $d){
                $interview = Interview::create([
                    'date' =>now(),
                    'suspicion'=>'Sospechas',
                    'diagnosis'=>'diagnostico',
                    'doctor_id'=>$d,
                    'patient_id'=>$p->id
                ]);
                 $p->symptoms()->attach($symptoms,['interview_id'=>$interview->id]);
                  }


        }


    }
}
