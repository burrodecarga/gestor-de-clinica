<x-admin-layout>
    <div class="max-w-md mx-auto bg-white rounded shadow-lg">
        <div class="w-full mx-auto p-6 my-10">
            <h1 class="font-bold text-2xl capitalize"><strong>{{ $title }}</strong></h1>
            <hr>
            <form action="{{ route('roles.create')}}" method="POST">
                <div class="mb-4">
                    <x-jet-label class="italic my-2 capitalize" value="{{ __('name of role') }}" for="name" />
                    <x-jet-input type="text" name="name" class="w-full" placeholder="{{ __('input name of role')}}"
                        value="{{ old('name',$role->name) }}" readonly="true" />
                    <x-jet-input-error for="name" />
                </div>
                @include('admin.roles.partials.permissions')

                <a type="button" href="{{ route('roles.index') }}"
                    class="bg-green-700 text-white hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center my-3">
                    {{ __('back') }}

                </a>
            </form>
        </div>
    </div>
</x-admin-layout>
