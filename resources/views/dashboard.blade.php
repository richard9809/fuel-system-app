<x-app-layout>
    @if (Auth::user()->role == 'admin' || Auth::user()->role === 'system admin')
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>
    @endif


    @if (Auth::user()->role === 'admin' || Auth::user()->role === 'system admin')
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="section-1 p-6 bg-white border-b border-gray-200" >
                        {{-- Drivers --}}
                        <div class="dash-item">
                            <div class="fa-icon">
                                <i class="fas fa-users fa-icons" style="color: #0275D8;"></i>
                            </div>
                            <div>
                                <p style="margin: 0;  font-size: 1rem; opacity: 0.7">Drivers</p>
                                <span class="center" style="font-weight: 700; font-size: 1.25rem;">{{ $drivers }}</span>
                            </div>
                        </div>

                        {{-- Requests --}}
                        <div class="dash-item">
                            <div class="fa-icon">
                                <i class="fa-solid fa-phone fa-icons" style="color: #5CB85C;"></i>
                            </div>
                            <div>
                                <p style="margin: 0;  font-size: 1rem; opacity: 0.7">Requests</p>
                                <span class="center" style="font-weight: 700; font-size: 1.25rem;">{{ $requests }}</span>
                            </div>
                        </div>

                        {{-- Vehicles --}}
                        <div class="dash-item">
                            <div class="fa-icon">
                                <i class="fa-solid fa-car fa-icons" style="color: #FFA628;"></i>
                            </div>
                            <div>
                                <p style="margin: 0;  font-size: 1rem; opacity: 0.7">Vehicles</p>
                                <span class="center" style="font-weight: 700; font-size: 1.25rem;">{{ $vehicles }}</span>
                            </div>
                        </div>


                        {{-- Total Amount --}}
                        <div class="dash-item">
                            <div class="fa-icon">
                                <i class="fa-solid fa-sack-dollar fa-icons" style="color: #DC3545;"></i>
                            </div>
                            <div>
                                <p style="margin: 0;  font-size: 1rem; opacity: 0.7">Total Amount</p>
                                <span class="center" style="font-weight: 700; font-size: 1.25rem;">Shs. {{ number_format($totalLPOs) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Progress Cards --}}
        <div class="py-3">
            <div class="progress-cards max-w-7xl mx-auto sm:px-6 lg:px-8">
                @foreach ($currentSuppliers  as $currentSupplier)
                    <div class="card progress-card  px-3" >
                        <div class="card-title py-3" style="display: flex; justify-content: space-between; align-items: center;">
                            <h3 style="font-weight: 100;">{{ $currentSupplier->name }}</h3>
                            <span style="font-weight: 700; font-size: 2.5rem;">{{ round(($currentSupplier->budget - $currentSupplier->quantity) / $currentSupplier->budget * 100, 0) }}%</span>
                        </div>
                        <div class="mb-4 ">
                            <h6 style="opacity: .7; font-size: 0.8125rem;">Quantity Used</h6>
                            <div class="progress" role="progressbar" aria-label="Animated striped example" aria-valuenow="{{ round(($currentSupplier->budget - $currentSupplier->quantity) / $currentSupplier->budget * 100, 0) }}" aria-valuemin="0" aria-valuemax="{{ round($currentSupplier->budget / $currentSupplier->budget * 100, 0) }}">
                                <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: {{ $currentSupplier->budget > 0 ? round(($currentSupplier->budget - $currentSupplier->quantity) / $currentSupplier->budget * 100, 0) : 0 }}%"></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    @if (Auth::user()->role === 'secretary')
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="fuel-cards">
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
                </div>

                <div style="padding-block: 3rem;">
                    <h4 style="font-size: 1.75rem;">Add Detail Order</h4>
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" >
                        <div class="p-6 bg-white border-b border-gray-200">
                            <livewire:detail-order-table/>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    @endif

    @if (Auth::user()->role == 'driver')
        <div class="py-6">
            <div class="dashboard-driver px-8">
                <a href="{{ route('personalInfo') }}" class="card-driver grid text-center hover:text-gray-700">
                    <i class="fa-regular fa-circle-user" style="font-size: 1.75rem;"></i>
                    Personal Info
                </a>
    
                <a href="{{ "vehicle/". Auth::user()->id }}" class="card-driver grid text-center">
                    <i class="fas fa-truck" style="font-size: 1.75rem;"></i>
                    Vehicle Info
                </a>
    
                <a href="{{ "request/". Auth::user()->id }}" class="card-driver grid text-center">
                    <i class="fa-regular fa-circle-question" style="font-size: 1.75rem;"></i>
                    Request
                </a>
    
                <a href="{{ route('status') }}" class="card-driver grid text-center">
                    <i class="fa-solid fa-magnifying-glass" style="font-size: 1.75rem;"></i>
                    Status
                </a>
    
                <a href="{{ route("driverReports") }}" class="card-driver grid text-center">
                    <i class="fa-solid fa-pizza-slice text-lg" style="font-size: 1.75rem;"></i>
                    Reports
                </a>
    
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="route('logout')" class="card-driver grid text-center" onclick="event.preventDefault();this.closest('form').submit();">
                        <i class="fa-solid fa-right-from-bracket" style="font-size: 1.75rem;"></i>
                        Logout
                    </a> 
                </form>
            </div>
        </div>
    @endif
</x-app-layout>
