<div class="w-full lg:block">
    <small>
         <div class="p-8 border bg-white rounded-lg">
        <ul class="mx-auto">
            <h1 class="border rounded font-bold text-center py-2 uppercase text-gray-700">{{ __('list of users') }}</h1>
            <input wire:model="search" class="w-full rounded mx-auto my-2 rounded" type="text" placeholder="{{ __('find patient') }}">
            @foreach ($users as $user )
                <li class="flex items-center border rounded my-3 py-2">
                    <img class="w-10 h-10 object-cover rounded-full mx-4"
                    src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}">
                    <p>
                        <a href="{{ route('interviews.index',$user->id) }}" class="mx-1 font-bold text-gray-700 hover:underline">
                              {{ $user->name }}
                        </a>
                    </p>
                    </li>
            @endforeach

            @if ($users->count() > 0)
            <div class="flex justify-between text-xs">
                {{ $users->links('vendor.livewire.simple-tailwind') }}
            </div>
            @endif

        </ul>
    </div>
    </small>

</div>
