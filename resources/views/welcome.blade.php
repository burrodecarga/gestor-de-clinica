<x-guest-layout>
    <div class="grid grid-cols-1 gap-6">
        <section>
            <div class="relative h-screen bg-red-500 mx-auto w-full scroll-mt-0" id="sec1">
                <img class="absolute inset-0 h-full w-full object-cover opacity-85"
                    src="{{ asset('assets/cita_2.jpg') }}" alt="{{ __('appoinment') }}">
                <div class="absolute inset-0 bg-gradient-to-tl from-blue-400 via-blue-900 to-transparent opacity-90">
                </div>
                <div class="relative max-w-2xl mx-auto text-center py-16 px-4 sm:py-20 sm:px-6 opacity-90">
                    <h2 class="text-3xl font-extrabold text-black sm:text-4xl">
                        <span class="block capitalize">
                            {{ __('focused on your weill-being.') }}
                        </span>
                        <span class="block capitalize">
                            {{ __('you manage your health') }}
                        </span>
                    </h2>
                    <p class="mt-4 text-lg leading-6 text-gray-200">
                        {{ __('We are a quick and easy way to manage your medical appointments and control your consultations and interviews.') }}
                    </p>
                    <div class="mt-4 max-w-sm mx-auto sm:max-w-none sm:justify-center">
                        <div class="space-y-4 sm:space-y-0 sm:mx-auto sm:inline-grid sm:grid-cols-1 sm:gap-5">
                            <a href="#sec2"
                            class="text-white px-4 py-2 bg-red-600 hover:bg-green-600 flex items-center justify-center border text-base font-medium rounded-md shadow-sm sm:px-8 focus:ring focus:ring-offset-1">{{ __('get starter') }}</a>
                            @auth
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <a class="text-white px-4 py-2 bg-red-600 hover:bg-green-600 flex items-center justify-center border text-base font-medium rounded-md shadow-sm sm:px-8 focus:ring focus:ring-offset-1" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </a>
                            </form>

                            @else


                                 <a href="{{ route('login') }}"
                                class="text-white px-4 py-2 bg-blue-900 hover:bg-green-600 flex items-center justify-center border text-base font-medium rounded-md shadow-sm sm:px-8 focus:ring focus:ring-offset-1">{{ __('login') }}</a>

                            <a href="{{ route('register') }}"
                                class="text-white px-4 py-2 bg-blue-900 hover:bg-green-600 flex items-center justify-center border text-base font-medium rounded-md shadow-sm sm:px-8 focus:ring focus:ring-offset-1">{{ __('register') }}</a>
                            @endauth

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="relative h-screen bg-red-500 mx-auto w-full scroll-mt-0" id="sec2">
                <img class="absolute inset-0 h-full w-full object-cover opacity-85"
                    src="{{ asset('assets/cita_1.jpg') }}" alt="{{ __('appoinment') }}">
                <div class="absolute inset-0 bg-gradient-to-tl from-green-400 via-green-900 to-transparent opacity-90">
                </div>
                <div class="relative max-w-2xl mx-auto text-center py-16 px-4 sm:py-20 sm:px-6 opacity-90">
                    <h2 class="text-3xl font-extrabold text-white sm:text-4xl">
                        <span class="block capitalize">step one</span>
                        <span class="block capitalize">select a medical specialty or a doctor.</span>
                    </h2>
                    <p class="mt-4 text-lg leading-6 text-gray-100">You can choose from several doctors if you search
                        for them according to their specialty.
                        If you already have a doctor you trust, then request your appointment</p>
                    <div class="mt-4 max-w-sm mx-auto sm:max-w-none sm:justify-center">
                        <div class="space-y-4 sm:space-y-0 sm:mx-auto sm:inline-grid sm:grid-cols-1 sm:gap-5">

                            <br>
                            <a href="#sec4"
                                class="text-white px-4 py-2 bg-red-700 hover:bg-green-600 flex items-center justify-center border text-base font-medium rounded-md shadow-sm sm:px-8 focus:ring focus:ring-offset-1">{{ __('doctor') }}</a>

                            <a href="#sec3"
                                class="text-white px-4 py-2 bg-red-700 hover:bg-green-600 flex items-center justify-center border text-base font-medium rounded-md shadow-sm sm:px-8 focus:ring focus:ring-offset-1">{{ __('specialties') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="sec4">
            @livewire('patient.patient-doctor')
        </section>
        <section id="sec3">
            @livewire('patient.patient-specialty')
        </section>

        <section id="sec5">
            @livewire('patient.patient-date')
        </section>
        @auth
        <section id="sec5">
            @livewire('patient.patient-info')
        </section>
        @endauth
    </div>



    <footer class="text-gray-100 bg-gray-800 grid grid-cols-5 justify-center items-start p-4">
        <div>
            <img class="h-20 w-20" src="{{ asset('assets/edwin.png') }}" alt="{{ __('logo') }}">
        </div>
        <div>
            <h3 class="font-bold capitalize">{{ __('for patient') }}</h3>
            <ul>
                <li class="text-sm capitalize">{{ __('caeer advise') }}</li>
                <li class="text-sm capitalize">{{ __('profesional interviews') }}</li>
                <li class="text-sm capitalize">{{ __('control interviews') }}</li>
                <li class="text-sm capitalize">{{ __('medical record') }}</li>
                <li class="text-sm capitalize">{{ __('unlimited access') }}</li>
            </ul>
        </div>

        <div>
            <h3 class="font-bold capitalize">{{ __('for doctor') }}</h3>
            <ul>
                <li class="text-sm capitalize">{{ __('get starter') }}</li>
                <li class="text-sm capitalize">{{ __('our services') }}</li>
                <li class="text-sm capitalize">{{ __('about us') }}</li>
                <li class="text-sm capitalize">{{ __('contac us') }}</li>
            </ul>
        </div>
        <div>
            <h3 class="font-bold capitalize">{{ __('contact us') }}</h3>
            <ul>
                <li class="text-sm capitalize"><i class="fas fa-map-marker-alt mr-2"></i>calle san juan n° 182-33, Valle
                    Verde, Naguanagua</li>
                <li class="text-sm capitalize"><i class="far fa-envelope mr-2"></i>edwinhenriquezh@gmail.com</li>
                <li class="text-sm capitalize"><i class="fas fa-phone mr-2"></i>+58 4144753555</li>
            </ul>
        </div>
        <div class="flex flex-col items-center">
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-linkedin"></i></a>
        </div>
    </footer>
    <div class="w-full text-center bg-gray-800 text-white border-y">ROKAVE 2022</div>
    @push('script')
<script>
   window.addEventListener('load', event =>{
      interval = localStorage.getItem('interval')
      doctor_id = localStorage.getItem('doctor_id')
      specialty_id = localStorage.getItem('specialty_id')
      day = localStorage.getItem('day')
      date = localStorage.getItem('date')
      price = localStorage.getItem('price')
      office = localStorage.getItem('office')

      if(interval !==null) {
        Swal.fire({
  title: 'Create Appoinment ?',
  text: "you have an appointment that we have not registered, do we register it?",
  icon: 'info',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, create Appoinment'
}).then((result) => {
  if (result.isConfirmed) {

   livewire.emitTo('patient.patient-date','addAppoinment',interval,
doctor_id,
specialty_id,
day,
date,
price,
office) //creamos la cita
  }else{
    localStorage.removeItem('interval')
        localStorage.removeItem('doctor_id')
        localStorage.removeItem('specialty_id')
        localStorage.removeItem('day')
        localStorage.removeItem('date')
        localStorage.removeItem('price')
        localStorage.removeItem('office')
  }
})

      }

   })

</script>
 @endpush
</x-guest-layout>


