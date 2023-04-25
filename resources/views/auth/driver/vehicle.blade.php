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
            <img src="{{ asset($vehicle->photo) }}" class="card-img-top" alt="User Profile">
            <div class="card-body">
              <h5 class="card-title text-center display-5">{{ $vehicle->regNo }}</h5>
              <div class="info flex" style="padding-block: .5rem;">
                <div class="icon">
                    <i class="fa-solid fa-building" style="opacity: 0.7;"></i>
                </div>
                <div class="ml-2">
                    <p class="title" style="margin: 0; ">Manufacturer</p>
                    <span style="font-weight: 700;">{{ $vehicle->manufacturer }}</span>
                </div>
              </div>

              <div class="info flex">
                <div class="icon">
                    <i class="fa-solid fa-car" style="opacity: 0.7;"></i>
                </div>
                <div class="ml-2">
                    <p class="title" style="margin: 0; ">Model</p>
                    <span style="font-weight: 700;">{{ $vehicle->model }}</span>
                </div>
              </div>

              <div class="info flex">
                <div class="icon">
                    <i class="fa-solid fa-gauge"  style="opacity: 0.7;"></i>
                </div>
                <div class="ml-2">
                    <p class="title" style="margin: 0; ">Mileage</p>
                    <span style="font-weight: 700;">{{ $vehicle->mileage }} KM</span>
                </div>
              </div>
            </div>
        </div>
    </div>

</x-app-layout>
