<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Transactions') }}
            </h2>

        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-9xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (Auth::user()->role === 'system admin')
                        <livewire:transactions-table/>
                    @else
                        @if (isset($message))
                            {{ $message }}
                        @else
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <td scope="col">DRIVER</td>
                                        <td scope="col">VEHICLE</td>
                                        <td scope="col">PRODUCT</td>
                                        <td scope="col">QUANTITY</td>
                                        <td scope="col">POSTED</td>
                                        <td scope="col">STATUS</td>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($transactions as $transaction)
                                        <tr>
                                            <td>{{ $transaction->driver }}</td>
                                            <td>{{ $transaction->vehicle }}</td>
                                            <td>{{ $transaction->product }}</td>
                                            <td>{{ $transaction->quantity }}</td>
                                            <td>{{ $transaction->created_at->diffForHumans() }}</td>
                                            <td>
                                                @if ($transaction->rejected)
                                                    <span class="badge badge-danger badge-pill" style="padding-block: 0.5rem; padding-inline: 1rem; color: white;">rejected</span>
                                                @elseif ($transaction->approved === 0)
                                                    <span class="badge badge-warning badge-pill" style="padding-block: 0.5rem; padding-inline: 1rem; color: white;">not approved</span>
                                                @elseif ($transaction->receipt)
                                                    <span class="badge badge-success badge-pill" style="padding-block: 0.5rem; padding-inline: 1rem; color: white;">completed</span>
                                                @else
                                                    <span class="badge badge-info badge-pill" style="padding-block: 0.5rem; padding-inline: 1rem; color: white;">pending</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>

</x-app-layout>