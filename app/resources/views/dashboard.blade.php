<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @isset($messages)

    @endisset

    @empty($messages)

    @endempty

    @foreach ($messages as $message)
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <b>Author: </b>{{ $message->author->name }}  <b>Created at:</b> {{ \Carbon\Carbon::createFromTimeStamp(strtotime($message->created_at))->diffForHumans() }}
                    <br>

                    <b>Message:</b> {{ $message->message }}
                </div>
            </div>
        </div>
    </div>
    @endforeach


    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{ $messages->links() }}
        </div>
    </div>

</x-app-layout>
