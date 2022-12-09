<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Advertisement') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href = "{{ route('admin.cars.index') }}" class = "btn-link ml-auto">Cancel</a>
        <div class ="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
            
        
            <!--The edit form is  very similar to the create except the current values 
            are shown in each field using the value specification on each field -->
            <!--The form action is specified as the update route which validates and stores the changes.-->
            <form action="{{ route('admin.cars.update', $car) }}" method = "post" enctype = "multipart/form-data">
                @method('put')
                @csrf
                @error('Make')
                    <div class = "text-red-600 text-sm">{{ $message }}</div>
                @enderror
                <div class = "form-group">
                    <label for = "make">Make</label>
                    <select name = "make_id">
                        @foreach ($makes as $make)
                            <option value = "{{ $make->id }}" {{ (old('make_id') == $make->id) ? "selected" : "" }}>
                                {{ $make->name }}
                            </option>
                            @endforeach
                    </select>
                </div>
                
                @error('Model')
                    <div class = "text-red-600 text-sm">{{ $message }}</div>
                @enderror
                <input type = "text" name ="Model" placeholder="Enter Model" class ="w-full test2" value = {{ $car->Model}}>
                
                
                <div class="form-group">
                    <label for="colours"> <strong> Colours</strong> <br> </label>
                    @foreach ($colours as $colour)
                        <input type="checkbox", value="{{$colour->id}}" name="colours[]">
                       {{$colour->name}}
                    @endforeach
                </div>
                
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
                
                @error('Description')
                <div class = "text-red-600 text-sm">{{ $message }}</div>
                @enderror
                
                <x-textarea
                        name="Description"
                        rows="10"
                        field="text"

                        placeholder="Enter a description..."
                        class="w-full mt-6"
                        :value="@old('Description', $car)"></x-textarea>
            
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
