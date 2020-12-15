<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add message') }}
        </h2>
    </x-slot>


    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                <form method="POST" action="/addmessage">
                    @csrf
                    <div>
                        <x-label for="message" :value="__('Message')" />
                        <x-input class="@error('message') is-invalid @enderror" id="message" class="block mt-1 w-full" type="text" name="message" :value="old('message')" required autofocus />
                    </div>

                    @isset($result)
                    <div class="alert alert-info mt-3">{{ $result }}</div>
                    @endisset
                    @error('message')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror

                    <div class="flex items-center justify-end mt-4">
                    <x-button class="ml-3">
                        Submit
                    </x-button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>

