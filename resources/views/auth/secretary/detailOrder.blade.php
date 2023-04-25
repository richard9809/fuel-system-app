<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Add Detail Order') }}
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

        <form action="{{ route('storeDetailOrder') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <input type="hidden" name="id" value="{{ $transaction['id'] }}">

            <!-- Detail Order Number -->
            <div>
                <x-label for="detailOrder" :value="__('Detail Order Number')" />
                <x-input id="detailOrder" class="block mt-1 w-full" type="text" name="detailOrder" value="{{ $transaction['detailOrder'] }}" autofocus />
            </div>

            <!-- Receipt Number -->
            <div class="mt-2">
                <x-label for="receipt" :value="__('Receipt Number')" />
                <x-input id="receipt" class="block mt-1 w-full" type="text" name="receipt" value="{{ $transaction['receipt'] }}" autofocus />
            </div>

            <div class="mt-4 text-center">
                <button type="submit" class="btn btn-primary" style="align-self: center;">Add</button>
            </div>

        </form>

    </x-auth-card>

</x-app-layout>
