<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create a New Advertisment') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        
        <div class ="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
            
        
            <!--This form is for adding each piece of data in order to utilise the store function through 
            the store route specified in the action of the form-->
            <form action="{{ route('user.cars.store') }}" method = "post" enctype = "multipart/form-data">
                @csrf

                <!--For each element I included a header to label the input field, 
                A placeholder to guide the user and the class in order for css, I utilise tailwind 
                for css but added my own code to make each element further apart-->
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
                <div class="form-group">
                    <label for="colours"> <strong> Colours</strong> <br> </label>
                    @foreach ($colours as $colour)
                        <input type="checkbox", value="{{$colour->id}}" name="colours[]">
                       {{$colour->name}}
                    @endforeach
                </div>
                
                <h2>Model</h2>
                @error('Model')
                    <div class = "text-red-600 text-sm">{{ $message }}</div>
                @enderror
                <input type = "text" name ="Model" placeholder="Enter Model" class ="w-full test2">
                
                
                <h2>Registration</h2>
                @error('Registration')
                    <div class = "text-red-600 text-sm">{{ $message }}</div>
                @enderror
                <input type = "text" name ="Registration" placeholder="Enter Car's Registration" class ="w-full test2">
               
                <h2>Asking Price</h2>
                @error('AskingPrice')
                    <div class = "text-red-600 text-sm">{{ $message }}</div>
                @enderror
                <input type = "text" name ="AskingPrice" placeholder="Enter asking price" class ="w-full test2">
                
                <h2>Location</h2>
                @error('Location')
                    <div class = "text-red-600 text-sm">{{ $message }}</div>
                @enderror
                <input type = "text" name ="Location" placeholder="Enter your location" class ="w-full test2">
                
                <h2>Description</h2>
                @error('Description')
                <div class = "text-red-600 text-sm">{{ $message }}</div>
                @enderror
                <x-textarea
                        name="Description"
                        rows="10"
                        field="text"
                        placeholder="Enter a description..."
                        class="w-full mt-6"
                        :value="@old('Description')"></x-textarea>
                
                <h2>NCT expiration date</h2>
                @error('dateOfNCT')
                    <div class = "text-red-600 text-sm">{{ $message }}</div>
                @enderror
                <input type = "date"  name ="dateOfNCT" placeholder="Enter NCT expiration date" class ="test2">
                <h2>Tax expiration date</h2>
                
                @error('taxDate')
                    <div class = "text-red-600 text-sm">{{ $message }}</div>
                @enderror
                <input type = "date" name ="taxDate" placeholder="Enter Tax expiration date" class = "test2">
                
                <h2>Email Address</h2>
                @error('email')
                    <div class = "text-red-600 text-sm">{{ $message }}</div>
                @enderror
                <input type = "text" name ="email" placeholder="Enter your email address" class ="w-full test2">

                <br>
                <br>
                <!--The following code specifies an image input field-->
                <h2>Upload an image</h2>
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
