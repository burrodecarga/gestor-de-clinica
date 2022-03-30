<x-doctor-layout>
    <x-slot name="header">
        <h1>Layout de Doctor</h1>
        <div class="grid grid-cols-3 gap-4">
            <div>
                   @livewire('patient.patient-list')
            </div>
            <div>
                @livewire('appoinment.appoinment-list')
         </div>
         <div>
            @livewire('schedulle.schedulle')
        </div>
        </div>

    </x-slot>
</x-doctor-layout>
