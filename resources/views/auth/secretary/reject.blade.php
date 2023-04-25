<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Reject') }}
            </h2>
        </div>
    </x-slot>

    <x-auth-card>

        <x-slot name="logo">
            <a href="#">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form action="{{ route('rejectTransaction') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <input type="hidden" name="id" value="{{ $transaction['id'] }}">

            <!-- Reject Transaction -->
            <div>
                <x-label for="rejected" :value="__('Status')" />
                <select name="rejected" class="block mt-1 w-full" required>
                    <option value="1">Reject</option>               
                </select>
            </div>

            <div class="mt-4 text-center">
                <button type="submit" class="btn btn-primary" style="align-self: center;">Add</button>
            </div>

        </form>

    </x-auth-card>

</x-app-layout>
