<x-admin-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">
    <x-slot name="header">
        <h2 class="font-semibold text-xl w-full sm:w-full md:w-3/4">{{ __('user Adminitration Panel') }}</h2>
    </x-slot>

    <div class="container mt-10">
        <div class="card mx-auto w-full md:w-100 text-center">
            <div class="card-header bg-primary text-white">
                <div class="card-title flex justify-between items-center">
                    <h4>
                        {{ __('list of users') }}
                    </h4>

                <a href="{{ route('users.create') }}" class="text-white cursor-pointer" title="{{ __('add user') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                      </svg>
                </a>
                </div>
            </div>
            <div class="card-body">
                <table id="user" class="table table-hover text-sm" style="width:100%">
                    <thead>
                        <tr>
                            <th width="10%">Id</th>
                            <th width="25%">Name</th>
                            <th width="25%">Email</th>
                            {{-- <th width="30%">Address</th> --}}
                            <th width="20%">Phone</th>
                            <th width="5%">Role</th>
                            <th width="15%">actions</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>

    </div>





    @push('script')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>


    <script>
        $(document).ready(function() {
    $('#user').DataTable({
      "columnDefs": [{
          "targets":[4,5],
          "orderable":false,
          "sercheable":false


      }],
      "serverSide":true,
      "ajax":"{{ url('api/users') }}",
      "columns":
      [
          {data:'id'},
          {data:'name'},
          {data:'email'},
         // {data:'address'},
          {data:'phone'},
          {data:'roles.[0].name'},
          {data:'btn'},

      ]

    });
setTimeout(function(){
    $('#alert').remove()
},3000)

} );
    </script>

    @endpush
</x-admin-layout>
