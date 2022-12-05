<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $car->Make }}{{ ' For Sale' }}
        </h2>
    </x-slot>

    <!--Upon clicking on a specific advertisement through the button, title or image
    This view is shown which shows more of the advertisement's fields from the database.-->


    <!--Below includes the edit and delete button, upon clicking either button the user is verified as the owner of the
    advertisement through the edit route's verification-->

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class = "flex">
                <a href = "{{ route('user.cars.edit', $car) }}" class = "btn-link ml-auto maxHeight">Edit Advertisement</a>
                <form action = "{{ route('user.cars.destroy', $car) }} " method = "post">
                    @method('delete')
                    @csrf
                    <button type = "submit" class = "btn btn-danger ml-4" onclick="return confirm('Are you sure?')">Delete advertisement</button>
            </div>
            

            <!--All the car's fields are retrieved and displayed below.-->

           
        <div class ="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
        <h2 class = "font-bold text-2xl">
            {{ $car->Make }} {{ $car->Model }}
        </h2>
        <p class ="mt-2">
            <p><strong>Location:</strong> {{ $car->Location}}</p>
        </p>
        
        <img src="{{asset('storage/images/' . $car->image) }}" width="200" />
        <p class ="mt-2">
            <p><strong>Asking Price: €</strong> {{ $car->Asking_Price}}</p>
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
       
        <!--The mailto function allows the user to contact the advertiser-->
        <p class ="mt-2 emailLink">
            <a href = "mailto: {{ $car->email }}">Contact Owner</a>
        </p>
    </div>
            
        
    </div>
</div>
</x-app-layout>
