<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Users') }}
            </h2>
    
            <a  href="{{ route('addUser') }}" role="button" class="btn btn-primary">
                Add User
            </a>
        </div>
    </x-slot>

    {{-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        @if (session('success'))
            <div class="alert alert-success between">
                <p style="margin: 0;">
                    {{ session('success') }}
                </p>
                <button type="button" class="btn btn-close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div> --}}

    <div class="py-12">    
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <livewire:users/>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
