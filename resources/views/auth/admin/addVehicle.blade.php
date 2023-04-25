<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Vehicle') }}
        </h2>
    </x-slot>

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Add User
                </div>
            </div>
        </div>
    </div> --}}

    <x-auth-card>

        <x-slot name="logo">
            <a href="#">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form action="{{ route('create-vehicle') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Manufacturer -->
            <div>
                <x-label for="manufacturer" :value="__('Manufacturer')" />
                <x-input id="manufacturer" class="block mt-1 w-full" type="text" name="manufacturer" :value="old('manufacturer')" required autofocus />
            </div>

            <!-- Model -->
            <div class="mt-2">
                <x-label for="model" :value="__('Model')" />
                <x-input id="model" class="block mt-1 w-full" type="text" name="model" :value="old('model')" required autofocus />
            </div>

            <!-- Number Plates -->
            <div class="mt-2">
                <x-label for="regNo" :value="__('Number Plates')" />
                <x-input id="regNo" class="block mt-1 w-full" type="text" name="regNo" :value="old('regNo')" required autofocus />
            </div>

            <!-- Mileage -->
            <div class="mt-2">
                <x-label for="mileage" :value="__('Mileage')" />
                <x-input id="mileage" class="block mt-1 w-full" type="text" name="mileage" :value="old('mileage')" required autofocus />
            </div>

            <!-- Drivers -->
            <div class="mt-2">
                <x-label for="driver" :value="__('Driver')" />
                <select name="driver" class="block mt-1 w-full" required>
                    <option selected>Choose...</option>
                    @foreach ($drivers as $driver)
                        <option value="{{ $driver->id }}">{{ $driver->name }}</option>
                    @endforeach                 
                </select>
            </div>

            <div class="mt-2">
                <x-label for="photo" :value="__('Upload Photo')" />
                <input class="form-control mt-1" type="file" id="formFile" name="photo" >
            </div>

            <div class="mt-4 text-center">
                <button type="submit" class="btn btn-primary" style="align-self: center;">Add Vehicle</button>
            </div>
        </form>

    </x-auth-card>

</x-app-layout>
