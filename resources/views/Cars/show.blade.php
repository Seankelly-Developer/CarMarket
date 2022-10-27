<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cars') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class = "flex">
                <a href = "{{ route('cars.edit', $car) }}" class = "btn-link ml-auto">Edit Advertisement</a>
                <form action = "{{ route('cars.destroy', $car) }} " method = "post">
                    @method('delete')
                    @csrf
                    <button type = "submit" class = "btn btn-danger ml-4" onclick="return confirm('Are you sure?')">Delete advertisement</button>
            </div>
            

           
        <div class ="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
        <h2 class = "font-bold text-2xl">
            {{ $car->Make }} {{ $car->Model }}
        </h2>
        <p class ="mt-2">
            <p><strong>Location:</strong> {{ $car->Location}}</p>
        </p>
        
        <img src="{{asset('storage/images/' . $car->image) }}" width="200" />
        <p class ="mt-2">
            <p><strong>Price: €</strong> {{ $car->Asking_Price}}</p>
        </p>
        <p class ="mt-2">
            <p><strong>Colour:</strong> {{ $car->colour}}</p>
        </p>
        <p class ="mt-2">
            <p><strong>Registration:</strong> {{ $car->Registration}}</p>
        </p>
       

        <p class ="mt-2">
            <p><strong>Description</strong></p>
        </p>
        <p class ="mt-1">
            <p>{{ $car->Description}}</p>
        </p>

        <p class ="mt-2">
            <p><strong>Date of NCT Expiration</strong> {{ $car->dateOfNCTExpiration}}</p>
        </p>
        <p class ="mt-2">
            <p><strong>Date of Tax Expiration</strong> {{ $car->dateOfTaxExpiration}}</p>
        </p>
       
        <p class ="mt-2 emailLink">
            <a href = "mailto: {{ $car->email }}">Contact Owner</a>
        </p>
    </div>
            
        
    </div>
</div>
</x-app-layout>
