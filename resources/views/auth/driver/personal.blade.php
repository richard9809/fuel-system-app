<x-app-layout>

    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('dashboard') }}" >
                        <i class="fa-sharp fa-solid fa-arrow-left rounded-circle" style="padding: .8rem; border: 1px solid; font-size: 1.25rem;"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>


    <div class="py-3 ">
        <div class="card mx-auto" style="width: 20rem;">
            <img src="{{ asset(Auth::user()->photo) }}" class="card-img-top" alt="User Profile">
            <div class="card-body">
              <h5 class="card-title text-center">{{ Auth::user()->name }}</h5>
              <div class="info flex" style="padding-block: .5rem;">
                <div class="icon">
                    <i class="fa-solid fa-envelope" style="opacity: 0.7;"></i>
                </div>
                <div class="ml-2">
                    <p class="title" style="margin: 0; ">Email</p>
                    <span style="font-weight: 700;">{{ Auth::user()->email }}</span>
                </div>
              </div>

              <div class="info flex">
                <div class="icon">
                    <i class="fa-solid fa-phone" style="opacity: 0.7;"></i>
                </div>
                <div class="ml-2">
                    <p class="title" style="margin: 0; ">Mobile</p>
                    <span style="font-weight: 700;">0725456987</span>
                </div>
              </div>

              <div class="info flex">
                <div class="icon">
                    <i class="fa-solid fa-location-dot"  style="opacity: 0.7;"></i>
                </div>
                <div class="ml-2">
                    <p class="title" style="margin: 0; ">Address</p>
                    <span style="font-weight: 700;">Kalundu, Kitui</span>
                </div>
              </div>

              <div class="info flex">
                <div class="icon">
                    <i class="fa-solid fa-calendar"  style="opacity: 0.7;"></i>
                </div>
                <div class="ml-2">
                    <p class="title" style="margin: 0; ">Date of Birth</p>
                    <span style="font-weight: 700;">{{ Auth::user()->dob }}</span>
                </div>
              </div>
            </div>
        </div>
    </div>

</x-app-layout>
