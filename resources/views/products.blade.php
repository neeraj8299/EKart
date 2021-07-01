<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 container">
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ url('/admin/products') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Title -->
                        <div>
                            <x-label for="title" :value="__('Title')" />

                            <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus />
                        </div>

                        <!-- Description -->
                        <div class="mt-4">
                            <x-label for="description" :value="__('Description')" />

                            <x-textarea id="description" class="block mt-1 w-full" name="description" :value="old('description')" required rows="3"></x-textarea>
                        </div>

                        <!-- Price -->
                        <div class="mt-4">
                            <x-label for="price" :value="__('Price')" />

                            <x-input id="price" class="block mt-1 w-full" :value="old('price')" type="number" name="price" required step="0.01" />
                        </div>

                        <!-- Category -->
                        <div class="mt-4">
                            <x-label for="category" :value="__('Category')" />

                            <select class="mdb-select md-form block mt-1 w-full" id="category" name="category" required searchable="Search here..">
                                <option value="" disabled selected>Choose your Category</option>
                                @foreach($categories as $key=>$value)
                                <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Image -->
                        <div class="mt-4">
                            <x-label for="image" :value="__('Upload Product Image')" />
                            <input type="file" class="block mt-1 w-full" accept=".jpg,.jpeg,.png" name="images" id="image">
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a class="btn btn-secondary" href="{{ route('login') }}">
                                {{ __('Reset') }}
                            </a>

                            <x-button class="ml-4">
                                {{ __('Add') }}
                            </x-button>
                        </div>
                        <input type="hidden" name="is_admin" value="yes">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
