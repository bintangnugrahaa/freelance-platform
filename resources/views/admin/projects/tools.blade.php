<x-app-layout>
    <x-slot name="header">
        <div class="px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-2xl text-gray-900 leading-tight tracking-tight">
                {{ __('Project Tools') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-2xl p-8 flex flex-col gap-y-6 transition-all duration-300">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="py-3 px-4 mb-4 rounded-lg bg-red-100 text-red-700 font-medium">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif

                <div
                    class="item-card flex flex-col sm:flex-row gap-y-6 justify-between items-start sm:items-center p-6 bg-gray-50 rounded-xl hover:shadow-lg transition-all duration-300 border border-gray-100">
                    <div class="flex flex-row items-center gap-x-4">
                        <img src="{{ Storage::url($project->thumbnail) }}" alt="{{ $project->name }}"
                            class="rounded-2xl object-cover w-24 h-16 shadow-sm">
                        <div class="flex flex-col">
                            <h3 class="text-gray-900 text-lg font-semibold tracking-tight">{{ $project->name }}</h3>
                            <p class="text-gray-500 text-sm font-medium">{{ $project->category->name }}</p>
                        </div>
                    </div>
                </div>

                <hr class="my-6 border-gray-200">

                <h3 class="text-gray-900 text-xl font-semibold tracking-tight">Add Tool</h3>

                <form method="POST" action="{{ route('admin.projects.tools.store', $project->id) }}"
                    enctype="multipart/form-data">
                    @csrf

                    <div>
                        <x-input-label for="tool_id" :value="__('Tool')" class="text-gray-700 font-medium" />
                        <select name="tool_id" id="tool_id"
                            class="block mt-1 w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 text-gray-900 text-sm">
                            <option value="" disabled selected>Choose a tool</option>
                            @foreach ($tools as $tool)
                                <option value="{{ $tool->id }}">{{ $tool->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('tool_id')" class="mt-2 text-red-600" />
                    </div>

                    <div class="flex items-center justify-end mt-6">
                        <button type="submit"
                            class="inline-flex items-center font-semibold py-2.5 px-6 bg-indigo-600 text-white rounded-full hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-all duration-200 text-sm">
                            Add Tool
                        </button>
                    </div>
                </form>

                <hr class="my-6 border-gray-200">

                <h3 class="text-gray-900 text-xl font-semibold tracking-tight">Tools</h3>

                @forelse($project->tools as $tool)
                    <div
                        class="flex flex-col sm:flex-row justify-between items-start sm:items-center p-4 bg-gray-50 rounded-xl hover:shadow-lg transition-all duration-300 border border-gray-100">
                        <div class="flex flex-row items-center gap-x-3">
                            <img src="{{ Storage::url($tool->icon ?? 'default-tool-icon.png') }}"
                                alt="{{ $tool->name }}" class="rounded-xl object-cover w-12 h-12 shadow-sm">
                            <div class="flex flex-col">
                                <h3 class="text-gray-900 text-base font-semibold tracking-tight">{{ $tool->name }}
                                </h3>
                            </div>
                        </div>
                        <div class="flex flex-row items-center gap-x-3 mt-3 sm:mt-0">
                            <form action="{{ route('admin.project_tools.destroy', $tool->pivot->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="inline-flex items-center font-semibold py-1.5 px-3 bg-red-600 text-white rounded-full hover:bg-red-700 focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-all duration-200 text-xs">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500 text-center text-lg font-medium">No tools available...</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
