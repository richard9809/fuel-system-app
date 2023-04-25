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

    @if (session('alert'))
        <div class="alert alert-danger">
            {{ session('alert') }}
        </div>
    @endif

    <x-auth-card>

        <x-slot name="logo">
            <a href="#">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form action="{{ route('storeRequest') }}" method="POST">
            @csrf

            {{-- Driver ID --}}
            <input type="hidden" name="driver" id="driver" value="{{ Auth::user()->id }}">

            <!-- Vehicle -->
            <div>
                <x-label for="vehicle" :value="__('Vehicle')" />
                <select name="vehicle" class="block mt-1 w-full" required>
                    @if ($vehicle)
                        <option selected value="{{ $vehicle->id }}">{{ $vehicle->regNo }}</option>
                    @endif                 
                </select>
            </div>

            <!-- Product -->
            <div class="mt-2">
                <x-label for="product" :value="__('Product')" />
                <select name="product" class="block mt-1 w-full" required>
                    <option selected>Choose...</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach                 
                </select>
            </div>

            <!-- Quantity -->
            <div class="mt-2">
                <x-label for="quantity" :value="__('Quantity')" />
                <x-input id="quantity" class="block mt-1 w-full" type="number" name="quantity" :value="old('quantity')" required autofocus />
            </div>

            <!-- Mileage -->
            <div class="mt-2">
                <x-label for="mileage" :value="__('Vehicle Mileage')" />
                <x-input id="mileage" class="block mt-1 w-full" type="number" name="mileage" :value="old('mileage')" required autofocus />
            </div>

            <!-- WKT NO -->
            <div class="mt-2">
                <x-label for="wkt_no" :value="__('WKT NO')" />
                <x-input id="wkt_no" class="block mt-1 w-full" type="number" name="wkt_no" :value="old('wkt_no')" required autofocus />
            </div>
        
            <div class="mt-4 text-center">
                <button type="submit" class="btn btn-primary" style="align-self: center;">Add Request</button>
            </div>
        </form>

    </x-auth-card>

</x-app-layout>
