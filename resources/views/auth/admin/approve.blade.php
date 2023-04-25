<x-app-layout>

    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Approve Request') }}
            </h2>
    
            <a href="{{ route('fuel') }}" class="btn btn-primary">
                <i class="fa-solid fa-arrow-left text-white"style="padding-inline: 0.5rem;"></i>
                Previous
            </a>
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

        <form action="{{ route('storeApproval') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <input type="hidden" name="id" value="{{ $transaction['id'] }}">

            <!-- KM Travelled -->
            <div>
                <x-label for="kmTravelled" :value="__('KM Travelled')" />
                <x-input id="kmTravelled" class="block mt-1 w-full" type="number" name="kmTravelled" value="{{ $transaction['kmTravelled'] }}" disabled />
            </div>

            <!-- Quantity -->
            <div class="mt-2">
                <x-label for="quantity" :value="__('Quantity')" />
                <x-input id="quantity" class="block mt-1 w-full" type="number" name="quantity" value="{{ $transaction['quantity'] }}" required autofocus />
            </div>

            <!-- Unit Price -->
            <div class="mt-2">
                <x-label for="unitPrice" :value="__('Unit Price')" />
                <x-input id="unitPrice" class="block mt-1 w-full" type="text" name="unitPrice" :value="old('unitPrice')" required autofocus />
            </div>

            <!-- Supplier role -->
            <div class="mt-2">
                <x-label for="supplier" :value="__('Supplier')" />
                <select name="supplier" class="block mt-1 w-full" required>
                    <option>Choose...</option>
                    @foreach ($suppliers as $supplier)
                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-4 text-center">
                <button type="submit" class="btn btn-primary" style="align-self: center;">Approve Request</button>
            </div>

        </form>

    </x-auth-card>

</x-app-layout>