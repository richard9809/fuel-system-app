<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit User') }}
        </h2>
    </x-slot>

    <x-auth-card>

        <x-slot name="logo">
            <a href="#">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form action="{{ route('updateUser') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <input type="hidden" name="id" value="{{ $user['id'] }}">

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $user['name'] }}" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-2">
                <x-label for="email" :value="__('Email')" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ $user['email'] }}" required autofocus />
            </div>

            <!-- User role -->
            <div class="mt-2">
                <x-label for="role" :value="__('Role')" />
                <select name="role" class="block mt-1 w-full">
                    <option selected value="{{ $user['role'] }}">{{ $user['role'] }}</option>
                    <option value="admin">Admin</option>
                    <option value="driver">Driver</option>
                    <option value="secretary">Secretary</option>  
                    <option value="system admin">System Admin</option>                
                </select>
            </div>

            <!-- dob -->
            <div class="mt-2">
                <x-label for="dob" :value="__('Date Of Birth')" />
                <x-input id="dob" class="block mt-1 w-full" type="date" name="dob" value="{{ $user['dob'] }}" required autofocus />
            </div>

            <div class="mt-2">
                <x-label for="photo" :value="__('Upload Photo')" />
                <input class="form-control mt-1" type="file" id="formFile" name="photo" >
            </div>

            <div class="mt-4 text-center">
                <button type="submit" class="btn btn-primary" style="align-self: center;">Update User</button>
            </div>

        </form>

    </x-auth-card>

</x-app-layout>
