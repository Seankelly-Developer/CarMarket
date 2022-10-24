<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cars') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <a href = "{{ route('cars.create') }}" class = "btn-link btn-lg mb-2"> skdjflksd a new Advertisement</a>

            @foreach ($Cars as $car)
        
        <div class ="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
        <h2 class = "font-bold text-2xl">
            <a href="{{ route('cars.show', $car) }}">{{ $car->Make }}</a>
        </h2>
        <p class ="mt-2">
            {{ $car->Model }}
            
        </p>
        <img src="{{asset('storage/images/' . $car->image) }}" width="150" />
    </div>
            @endforeach
        
    </div>
</div>
</x-app-layout>
