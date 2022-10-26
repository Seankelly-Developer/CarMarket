<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Advertisement') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        
        <div class ="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
            
        

            <form action="{{ route('cars.update', $car) }}" method = "post" enctype = "multipart/form-data">
                @method('put')
                @csrf
                @error('Make')
                    <div class = "text-red-600 text-sm">{{ $message }}</div>
                @enderror
                <input type = "text" name ="Make" placeholder="Enter Make" class ="w-full test2" value = {{ $car->Make }}>
                
                @error('Model')
                    <div class = "text-red-600 text-sm">{{ $message }}</div>
                @enderror
                <input type = "text" name ="Model" placeholder="Enter Model" class ="w-full test2" value = {{ $car->Model}}>
                
                @error('Colour')
                    <div class = "text-red-600 text-sm">{{ $message }}</div>
                @enderror
                <input type = "text" name ="Colour" placeholder="Enter Colour" class = "test2" value = {{ $car->colour }}>
                
                @error('Registration')
                    <div class = "text-red-600 text-sm">{{ $message }}</div>
                @enderror
                <input type = "text" name ="Registration" placeholder="Enter Car's Registration" class ="w-full test2" value = {{ $car->Registration }}>
               
                @error('AskingPrice')
                    <div class = "text-red-600 text-sm">{{ $message }}</div>
                @enderror
                <input type = "text" name ="AskingPrice" placeholder="Enter asking price" class ="w-full test2" value = {{ $car->Asking_Price }}>
                
                @error('Location')
                    <div class = "text-red-600 text-sm">{{ $message }}</div>
                @enderror
                <input type = "text" name ="Location" placeholder="Enter your location" class ="w-full test2" value = {{ $car->Location }}>
                <h2>NCT expiration date</h2>
               
                @error('dateOfNCT')
                    <div class = "text-red-600 text-sm">{{ $message }}</div>
                @enderror
                <input type = "date"  name ="dateOfNCT" placeholder="Enter NCT expiration date" class ="test2" value = {{ $car->dateOfNCTExpiration }}>
                <h2>Tax expiration date</h2>
                
                @error('taxDate')
                    <div class = "text-red-600 text-sm">{{ $message }}</div>
                @enderror
                <input type = "date" name ="taxDate" placeholder="Enter Tax expiration date" class = "test2" value = {{ $car->dateOfTaxExpiration }}>
                
                @error('email')
                    <div class = "text-red-600 text-sm">{{ $message }}</div>
                @enderror
                <input type = "text" name ="email" placeholder="Enter your contact email address" class ="w-full test2" value = {{ $car->email }}>

                <br>
                <br>
                <h2>Upload a new image below</h2>
                <x-file-input
                        type="file"
                        name="image"
                        placeholder="image"
                        class="w-full mt-6"
                        field="image">
                    </x-file-input>
                <br>
                <button type ="submit">Publish Advertisment</button>
            </form>
        </div>
    </div>
</div>
</x-app-layout>
