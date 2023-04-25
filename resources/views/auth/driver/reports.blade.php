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

    <div class="py-12">
        <div class="max-w-9xl mx-auto lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class=" bg-white border-b border-gray-200">
                    @if (isset($message))
                        {{ $message }}
                    @else
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <td scope="col">DATE</td>                                    
                                    <td scope="col">PRODUCT</td>
                                    <td scope="col">QUANTITY</td>
                                    <td scope="col">STATUS</td>
                                </tr>
                            </thead>

                            <tbody style="display-6">
                                @foreach ($transactions as $transaction)
                                    <tr>
                                        <td>{{ $transaction->requestDate }}</td>
                                        <td>{{ $transaction->product }}</td>
                                        <td>{{ $transaction->quantity }}</td>
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
                </div>
            </div>
        </div>
    </div>

</x-app-layout>