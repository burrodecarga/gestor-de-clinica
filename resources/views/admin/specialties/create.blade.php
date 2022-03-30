<x-admin-layout>
    <div class="max-w-md mx-auto bg-white rounded shadow-lg">
        <div class="w-full mx-auto p-6 my-10">
            <h1 class="font-bold text-2xl capitalize"><strong>{{ $title }}</strong></h1>
            <hr>
            <form action="{{ route('specialties.store')}}" method="POST">
               @include('admin.specialties.partials.form')
            </form>
        </div>
    </div>
</x-admin-layout>
