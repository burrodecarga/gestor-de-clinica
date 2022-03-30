@csrf

<div class="mb-4">
    <x-jet-label class="italic my-2 capitalize" value="{{ __('name of specialty') }}" for="name"/>
    <x-jet-input type="text" name="name" class="w-full" placeholder="{{ __('input name of specialty')}}"
    value="{{ old('name',$specialty->name) }}"/>
    <x-jet-input-error for="name" />
</div>

<div class="mb-4">
    <x-jet-label class="italic my-2 capitalize" value="{{ __('description of specialty') }}" for="description"/>
    <textarea name="description" id="" cols="3" rows="5" class="w-full rounded"></textarea>
</div>

<button type="submit"
class="bg-blue-700 text-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
    {{ __($btn) }}

</button>

<a type="button" href="{{ route('specialties.index') }}"
class="bg-yellow-500 text-white hover:bg-yellow-400 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
    {{ __('cancel') }}

</a>
