<section class="text-gray-700 rounded">
    <ul class="w-full justify-start">
        @foreach ($skills as $skill)
            <li class="w-full items-center border border-2 border-red-400 rounded pb-1 mb-1">
                <div class="grid grid-rows-2">
                    <p class="bg-white rounded text-justify text-sm capitalize font-light text-gray-500 p-2 w-full">
                        {{ $skill->title }} :<span class="block">

                            {{ Str::limit($skill->description, 50) }}
                            <a href="" class="font-bold mr-8">
                                {{ __('read more...') }}
                            </a>
                        </span>
                    </p>
                    <span class="flex justify-between p-2">
                    <a wire:click="edit({{ $skill->id }})">
                        <i class="fa-solid fa-highlighter fill-current text-green-600 cursor-pointer" title="{{ __('edit record').$skill->id }}"
                        ></i>
                    </a>
                    <a wire:click="$emit('deleteSkill',{{ $skill->id }})">
                        <i class="fa-solid fa-delete-left fill-current text-red-600 cursor-pointer" title="{{ __('delete record') }}"
                        ></i>
                    </a>
                    </span>
                </div>

            </li>
        @endforeach
    </ul>

    <x-jet-dialog-modal wire:model="openModal">
        <x-slot name="title">
            <div class="text-xl text-gray-500 font-bold text-center mb-2 capitalize">
                {{ __('add skill') }}
            </div>
            <img class="h-32 w-full object-center object-cover" src="{{ asset('assets/banner-skill.jpg') }}"
                alt="{{ auth()->user()->name }}">
        </x-slot>
        <x-slot name="content">
            <div class="grid grid-cols-1 gap-6">
                <div class="aseleccionar">
                    <select class="w-full rounded" wire:model="specialty">
                        <option value="">{{__('select specialty') }}</option>
                        @foreach ($specialties as $s)
                            <option value="{{ $s->name }}">{{ $s->name }}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="specialty"/>
                </div>
                <div class="seleccionadas">
                    <div>
                        <input class="w-full rounded" type="text" placeholder="{{ __('title') }}" wire:model="title"/>
                        <x-jet-input-error for="title"/>
                    </div>
                </div>

                <div class="seleccionadas">
                    <div>
                        <textarea class="w-full rounded" type="textarea" placeholder="{{ __('description') }}" wire:model="description" /></textarea>
                        <x-jet-input-error for="description"/>
                    </div>
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <button class="bg-red-500 text-white hover:bg-red-400 px-4 py-2 rounded mx-3"
                wire:click="$set('openModal',false)">
                {{ __('cancel') }}
            </button>
            <button class="bg-green-500 text-white hover:bg-green-400 px-4 py-2 rounded"
           type="submit" wire:click="update">
                {{ __('update') }}
            </button>
        </x-slot>
    </x-jet-dialog-modal>
</section>


@push('script')
<script>
livewire.on('deleteSkill', skillId=>{
    Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
   livewire.emitTo('skill.skill-list','delete',skillId)

  }
})
})

</script>
@endpush


