<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Fuel') }}
            </h2>

            @if (Auth::user()->role == 'system admin')
                <div class="btn-group" role="group" aria-label="Button Group">
                    <a type="button" href="{{ route('addPurchase') }}" class="btn btn-primary">LPO</a>
                    <a type="button" href="{{ route('addSupplier') }}" class="btn btn-primary">Supplier</a>
                    <a type="button" href="{{ route('addProduct') }}" class="btn btn-primary">Product</a>
                </div>
            @endif

        </div>
    </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="fuel-cards">
                    @if (Auth::user()->role == 'admin')
                        @foreach ($suppliers as $supplier)
                            <div class="card shadow-sm ">
                                <div class="card-header bg-white flex justify-between align-items-center">
                                    <h2 style="font-weight: 700; font-size: 1.75rem;">{{ $supplier->name }}</h2>
                                    <button class="btn bg-light rounded-circle shadow-sm">
                                        <i class="fa-solid fa-plus"></i>
                                    </button>
                                </div>
                                <div class="card-body flex justify-between">
                                    <div class="icon">
                                        <i class="fa-solid fa-gas-pump rounded-full" style="border: 1px solid; padding: 1rem; font-size: 3.5rem; "></i>
                                    </div>
                                    <div>
                                        <p class="card-text text-center" style="font-size: 1.25rem;">Available Amount</p>
                                        <h3 style="font-weight: 600; font-size: 2rem;">
                                            Shs. {{ number_format($supplier->quantity) }}
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>

                @if (Auth::user()->role == 'system admin')
                    <div>
                        <h4 style="font-size: 1.75rem;">Suppliers</h4>
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" >
                            <div class="p-6 bg-white border-b border-gray-200">
                                <livewire:supplier-table/>
                            </div>
                        </div>
                    </div>

                    <div style="padding-block: 2rem;">
                        <h4 style="font-size: 1.75rem;">LSO</h4>
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" >
                            <div class="p-6 bg-white border-b border-gray-200">
                                <livewire:purchase-table/>
                            </div>
                        </div>
                    </div>

                    <div style="padding-block: 2rem;">
                        <h4 style="font-size: 1.75rem;">Products</h4>
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" >
                            <div class="p-6 bg-white border-b border-gray-200">
                                <livewire:product-table/>
                            </div>
                        </div>
                    </div>
                @else
                    <div style="padding-block: 3rem;">
                        <h4 style="font-size: 1.75rem;">Requests</h4>
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" >
                            <div class="p-6 bg-white border-b border-gray-200">
                                <livewire:request-table/>
                            </div>
                        </div>
                    </div>
                @endif

            </div>
        </div>

</x-app-layout>
