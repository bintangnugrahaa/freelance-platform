<x-app-layout>
    <x-slot name="header">
        <div class="px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-2xl text-gray-900 leading-tight tracking-tight">
                {{ __('Edit Tool') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-2xl p-8 transition-all duration-300">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="py-3 px-4 mb-4 rounded-lg bg-red-100 text-red-700 font-medium">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif

                <form method="POST" action="{{ route('admin.tools.update', $tool) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div>
                        <x-input-label for="name" :value="__('Name')" class="text-gray-700 font-medium" />
                        <x-text-input id="name"
                            class="block mt-1 w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                            type="text" name="name" value="{{ $tool->name }}" required autofocus
                            autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-600" />
                    </div>

                    <div class="mt-6">
                        <x-input-label for="icon" :value="__('Icon')" class="text-gray-700 font-medium" />
                        <img src="{{ Storage::url($tool->icon) }}" alt="{{ $tool->name }}"
                            class="rounded-2xl object-cover w-20 h-20 shadow-sm mt-2" />
                        <x-text-input id="icon"
                            class="block mt-2 w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                            type="file" name="icon" autocomplete="icon" />
                        <x-input-error :messages="$errors->get('icon')" class="mt-2 text-red-600" />
                    </div>

                    <div class="flex items-center justify-end mt-6">
                        <button type="submit"
                            class="inline-flex items-center font-semibold py-2.5 px-6 bg-indigo-600 text-white rounded-full hover:bg-indigo-700 transition-colors duration-200 text-sm">
                            Edit Tool
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
