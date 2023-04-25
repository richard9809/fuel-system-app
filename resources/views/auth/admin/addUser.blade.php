<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add User') }}
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

        <form action="{{ route('storeUser') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-2">
                <x-label for="email" :value="__('Email')" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- User role -->
            <div class="mt-2">
                <x-label for="role" :value="__('Role')" />
                <select name="role" class="block mt-1 w-full" required>
                    <option value="admin">Admin</option>
                    <option value="driver">Driver</option>
                    <option value="secretary">Secretary</option>
                    <option value="system admin">System Admin</option>                  
                </select>
            </div>

            <!-- dob -->
            <div class="mt-2">
                <x-label for="dob" :value="__('Date Of Birth')" />
                <x-input id="dob" class="block mt-1 w-full" type="date" name="dob" :value="old('dob')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-2">
                <x-label for="password" :value="__('Password')" />
            
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="mt-2">
                <x-label for="photo" :value="__('Upload Photo')" />
                <input class="form-control mt-1" type="file" id="formFile" name="photo" >
            </div>

            <div class="mt-4 text-center">
                <button type="submit" class="btn btn-primary" style="align-self: center;">Add User</button>
            </div>
        </form>

    </x-auth-card>

</x-app-layout>
