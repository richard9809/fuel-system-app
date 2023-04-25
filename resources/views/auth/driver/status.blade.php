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

    <div class="py-3">
        <div class="card mx-auto" style="width: 22rem;">

            @if (isset($transaction))
                <h1 class="text-center bold">
                    <div class="align-items-center">
                        Status
                            @if ($transaction->rejected)
                                <span class="badge badge-danger badge-pill" style="font-size: .8125rem;">rejected</span>
                            @elseif (!is_null($transaction->receipt))
                                <span class="badge badge-success badge-pill" style="font-size: .8125rem;">completed</span>
                            @else
                                <span class="badge badge-info badge-pill" style="font-size: .8125rem;">pending</span>
                            @endif

                    </div>
                </h1>

                <div class="steps" style="position: relative;">

                    {{-- Step 1 --}}
                    @if (!$transaction->driver === Auth::user()->id)
                        <div class="step-info">
                            <div style="display: flex; gap: .75rem; align-items: center;">
                                <p class="step-number text-center">1</p>
                                <p style="font-size: 1.25rem;">Request</p>                      
                            </div>
                        </div>
                    @else
                            <div class="step-info">
                                <div style="display: flex; gap: .75rem; align-items: center;">
                                    <p class="step-number text-center" style="background-color: #5CB85C; color: #Fff;">1</p>
                                    <p style="font-size: 1.25rem;">Request</p>                      
                                </div>
                                <div class="check">
                                    <i class="fa-solid fa-check mt-3" ></i>
                                </div>
                            </div>
                    @endif

                    {{-- Step 2 --}}
                    @if ($transaction->approved === 0)
                        <div class="step-info">
                            <div style="display: flex; gap: .75rem; align-items: center;">
                                <p class="step-number text-center">2</p>
                                <p style="font-size: 1.25rem;">Approval</p>                      
                            </div>
                        </div>
                    @else
                        <div class="step-info">
                            <div style="display: flex; gap: .75rem; align-items: center;">
                                <p class="step-number text-center" style="background-color: #5CB85C; color: #Fff;">2</p>
                                <p style="font-size: 1.25rem;">Approval</p>                      
                            </div>
                            <div class="check">
                                <i class="fa-solid fa-check mt-3" ></i>
                            </div>
                        </div>
                    @endif

                    {{-- Step 3 --}}
                    @if (!is_null($transaction->detailOrder))
                        <div class="step-info">
                            <div style="display: flex; gap: .75rem; align-items: center;">
                                <p class="step-number text-center" style="background-color: #5CB85C; color: #Fff;">3</p>
                                <p style="font-size: 1.25rem;">Pick Detail Order</p>                      
                            </div>
                            <div class="check">
                                <i class="fa-solid fa-check mt-3"></i>
                            </div>
                        </div>
                    @else
                        <div class="step-info">
                            <div style="display: flex; gap: .75rem; align-items: center;">
                                <p class="step-number text-center">3</p>
                                <p style="font-size: 1.25rem;">Pick Detail Order</p>                      
                            </div>
                        </div>
                    @endif

                    {{-- Step 4 --}}
                    @if (!is_null($transaction->receipt))
                        <div class="step-info">
                            <div style="display: flex; gap: .75rem; align-items: center;">
                                <p class="step-number text-center" style="background-color: #5CB85C; color: #Fff;">4</p>
                                <p style="font-size: 1.25rem;">Get Receipt</p>                      
                            </div>
                            <div class="check">
                                <i class="fa-solid fa-check mt-3"></i>
                            </div>
                        </div>
                    @else
                        <div class="step-info">
                            <div style="display: flex; gap: .75rem; align-items: center;">
                                <p class="step-number text-center">4</p>
                                <p style="font-size: 1.25rem;">Get Receipt</p>                      
                            </div>
                        </div>
                    @endif

                </div>
            @else
                <span class="badge badge-warning badge-pill" style="font-size: .8125rem;">Transaction not found</span>
            @endif
        </div>
    </div>

</x-app-layout>
