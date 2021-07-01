<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 container">
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ url('/admin/category') }}">
                        @csrf

                        <!-- Name -->
                        <div>
                            <x-label for="name" :value="__('Name')" />

                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
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
