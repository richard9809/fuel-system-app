<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Add Local Purchase Order') }}
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

        <form action="{{ route('storePurchase') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Amount -->
            <div class="mt-2">
                <x-label for="amount" :value="__('Amount')" />
                <x-input id="amount" class="block mt-1 w-full" type="text" name="amount" :value="old('amount')" required autofocus />
            </div>

            <!-- Suppliers -->
            <div class="mt-2">
                <x-label for="supplier" :value="__('Supplier')" />
                    <select name="supplier" class="block mt-1 w-full" required>
                        <option selected>Choose...</option>
                        @foreach ($suppliers as $supplier)
                            <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                        @endforeach                 
                    </select>
            </div>

            <!-- Order Number -->
            <div class="mt-2">
                <x-label for="orderNo" :value="__('Order Number')" />
                <x-input id="orderNo" class="block mt-1 w-full" type="number" name="orderNo" :value="old('orderNo')" required autofocus />
            </div>

            <div class="mt-4 text-center">
                <button type="submit" class="btn btn-primary" style="align-self: center;">Add LPO</button>
            </div>

        </form>

    </x-auth-card>

</x-app-layout>
