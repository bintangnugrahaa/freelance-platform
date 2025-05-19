<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-2xl text-gray-900 leading-tight tracking-tight">
                {{ __('Manage Categories') }}
            </h2>
            <a href="{{ route('admin.categories.create') }}"
                class="inline-flex items-center font-semibold py-2.5 px-6 bg-indigo-600 text-white rounded-full hover:bg-indigo-700 transition-colors duration-200 text-sm">
                Add New
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-2xl p-8 flex flex-col gap-y-6 transition-all duration-300">
                @forelse($categories as $category)
                    <div
                        class="item-card flex flex-row justify-between items-center p-6 bg-gray-50 rounded-xl hover:shadow-md transition-shadow duration-300 border border-gray-100">
                        <div class="flex flex-row items-center gap-x-4">
                            <img src="{{ Storage::url($category->icon) }}" alt="{{ $category->name }}"
                                class="rounded-2xl object-cover w-16 h-16 shadow-sm">
                            <div class="flex flex-col">
                                <h3 class="text-gray-900 text-lg font-semibold tracking-tight">{{ $category->name }}
                                </h3>
                            </div>
                        </div>
                        <div class="hidden md:flex flex-col">
                            <p class="text-gray-500 text-sm font-medium">Date</p>
                            <h3 class="text-gray-900 text-lg font-semibold tracking-tight">
                                {{ $category->created_at->format('d M Y') }}</h3>
                        </div>
                        <div class="flex flex-row items-center gap-x-3">
                            <a href="{{ route('admin.categories.edit', $category) }}"
                                class="inline-flex items-center font-semibold py-2 px-4 bg-indigo-600 text-white rounded-full hover:bg-indigo-700 transition-colors duration-200 text-sm">
                                Edit
                            </a>
                            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="inline-flex items-center font-semibold py-2 px-4 bg-red-600 text-white rounded-full hover:bg-red-700 transition-colors duration-200 text-sm">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500 text-center text-lg font-medium">No categories available...</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
