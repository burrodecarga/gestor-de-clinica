@csrf

<div class="grid grid-cols-5 gap-4">
    <div class="mb-1 col-span-2">
        <x-jet-label class="italic my-2 capitalize" value="{{ __('name of user') }}" for="name"/>
        <x-jet-input type="text" name="name" class="w-full bg-gray-100" placeholder="{{ __('input name of user')}}"
        value="{{ old('name',$user->name) }}" readonly />
        <x-jet-input-error for="name" />
    </div>
    <div class="mb-1 col-span-2">
        <x-jet-label class="italic my-2 capitalize" value="{{ __('email') }}" for="email"/>
        <x-jet-input type="text" name="email" class="w-full bg-gray-100" placeholder="{{ __('input email of user')}}"
        value="{{ old('email',$user->email) }}" readonly />
        <x-jet-input-error for="email" />
    </div>

    <div class="mb-1 row-span-2 my-4 bg-gray-300">
        <img src="{{ asset($user->profile_photo_url) }}" alt="{{ $user->name }}" class="object-cover object-center  h-48 w-96 rounded">
    </div>

    <div class="mb-1  col-span-1">
        <x-jet-label class="italic my-2 capitalize" value="{{ __('phone') }}" for="phone"/>
        <x-jet-input type="text" name="phone" class="w-full bg-gray-100" placeholder="{{ __('input phone of user')}}"
        value="{{ old('phone',$user->phone) }}" readonly />
        <x-jet-input-error for="phone" />
    </div>

    <div class="mb-1 col-span-1">
        <x-jet-label class="italic my-2 capitalize" value="{{ __('gender') }}" for="gender"/>
        <x-jet-input type="text" name="gender" class="w-full bg-gray-100" placeholder="{{ __('input gender of user')}}"
        value="{{ old('gender',$user->gender) }}" readonly />
        <x-jet-input-error for="gender" />
    </div>


    <div class="mb-1 col-span-1">
        <x-jet-label class="italic my-2 capitalize" value="{{ __('birthdate') }}" for="birthdate"/>
        <x-jet-input type="text" name="birthdate" class="w-full bg-gray-100" placeholder="{{ __('input birthdate of user')}}"
        value="{{ old('birthdate',$user->birthdate) }}" readonly />
        <x-jet-input-error for="birthdate" />
    </div>
    <div class="mb-1 col-span-1">
        <x-jet-label class="italic my-2 capitalize" value="{{ __('role') }}" for="role"/>
        <select name="role" id="role" class="w-full bg-gray-100 rounded">
            <option value="">{{ __('no role') }}</option>
            @foreach ($roles as $role)
            <option value="{{ $role->id }}" @if($role->id ==$userRoleId) selected @endif>
                {{ $role->name }}</option>
            @endforeach
        </select>
        </div>


    <div class="mb-1 col-span-5">
        <x-jet-label class="italic my-2 capitalize" value="{{ __('address') }}" for="address"/>
        <x-jet-input type="text" name="address" class="w-full bg-gray-100" placeholder="{{ __('input address of user')}}"
        value="{{ old('address',$user->address) }}" readonly />
        <x-jet-input-error for="address" />
    </div>



</div>




<button type="submit"
class="bg-blue-500 text-white hover:bg-blue-400 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
    {{ __($btn) }}

</button>

<a type="button" href="{{ route('users.index') }}"
class="bg-yellow-500 text-white hover:bg-yellow-400 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
    {{ __('cancel') }}

</a>
