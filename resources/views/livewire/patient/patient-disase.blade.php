<div>
    <header class="px-5 py-4 border-b border-gray-100 bg-white">
        <h2 class="font-bold text-center text-gray-800 capitalize text-2xl mb-2 flex justify-between items-center">
       <span class="text-red-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
            </svg>
            </span>
            <span class="font-bold text-sm text-gray-500">
                {{ __('disase hisrory') }}
            </span>
        </h2>
        <ul class="w-full">
            @foreach ($patient_disases as $pd)
                <li class="mb-1"><a class="block cursor-pointer px-3 py-2 bg-blue-400 hover:bg-blue-700 text-white">{{ $pd->name }}</a></li>
            @endforeach
        </ul>
    </header>
    <div class="bg-white p-3">
        <input class="w-full rounded" type="text" placeholder="search disase" wire:model="search" />
        <ul class="w-full">
            @forelse($disases as $disase)
                <li class="cursor-pointer px-3 py-2 bg-gray-400 hover:bg-gray-500 text-black my-2 bolck"><a
                        wire:click="addModalDisase({{ $disase->id }})">{{ $disase->name }}</a></li>
            @empty
                @if (strlen(trim($this->search)) > 8)
                    <h3 class="bg-red-500 text-white p-2 w-full mt-2 text-center font-bold">
                        {{ __('no search result') }}</h3>
                    <div class="bg-blue-500 text-white text-center p-2 my-2">
                        <button wire:click="addNew">{{ __('¿ want add this') }}
                            <br>
                            <strong class="text-xl">{{ __($this->search) }}</strong>
                            <br>
                            <p>{{ __('to list ...?') }}</p>
                        </button>

                    </div>
                @endif
            @endforelse
        </ul>
    </div>

    <x-jet-dialog-modal wire:model="modal">
        <x-slot name="title">
            <div class="text-xl text-gray-500 font-bold text-center mb-2 capitalize">
                {{ __('add disease to patient history') }}
            </div>
            <img class="h-32 w-full object-center object-cover" src="{{ asset('assets/disases.jpg') }}" alt="">
        </x-slot>
        <x-slot name="content">
            <div class="flex gap-2">
                <div class="w-3/4">
                    <input class="w-full rounded cursor-pointer" type="text" placeholder="{{ __('name') }}"
                        wire:model="name" />
                    <x-jet-input-error for="name" />
                </div>
                <div>
                    <input class="w-full rounded cursor-pointer" type="number" placeholder="{{ __('disase year') }}"
                        wire:model="year" />
                    <x-jet-input-error for="year" />
                </div>
            </div>
            <input type="hidden" wire:model="disase_id">
        </x-slot>
        <x-slot name="footer">
            <button class="bg-red-500 text-white hover:bg-red-400 px-4 py-2 rounded mx-3"
                wire:click="$set('modal',false)">
                {{ __('cancel') }}
            </button>
            <button class="bg-green-500 text-white hover:bg-green-400 px-4 py-2 rounded mx-3" wire:click="addDisase">
                {{ __('add disase') }}
            </button>

        </x-slot>
    </x-jet-dialog-modal>
</div>
