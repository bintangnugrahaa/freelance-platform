<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-2xl text-gray-900 leading-tight tracking-tight">
                {{ __('My Proposals') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-2xl p-8 flex flex-col gap-y-6 transition-all duration-300">
                @forelse(Auth::user()->proposals as $proposal)
                    <div
                        class="item-card flex flex-col md:flex-row gap-y-6 justify-between items-start md:items-center p-6 bg-gray-50 rounded-xl hover:shadow-lg transition-all duration-300 border border-gray-100">
                        <div class="flex flex-row items-center gap-x-4">
                            <img src="{{ Storage::url($proposal->project->thumbnail ?? 'default-thumbnail.png') }}"
                                alt="{{ $proposal->project->name }}"
                                class="rounded-2xl object-cover w-24 h-16 shadow-sm">
                            <div class="flex flex-col">
                                <h3 class="text-gray-900 text-lg font-semibold tracking-tight">
                                    {{ $proposal->project->name }}</h3>
                                <p class="text-gray-500 text-sm font-medium">{{ $proposal->project->category->name }}
                                </p>
                            </div>
                        </div>
                        <div class="flex flex-col mt-4 md:mt-0 md:hidden">
                            <p class="text-gray-500 text-sm font-medium">Budget</p>
                            <h3 class="text-gray-900 text-lg font-semibold tracking-tight">Rp
                                {{ number_format($proposal->project->budget, 0, ',', '.') }}</h3>
                        </div>
                        <div class="flex flex-col mt-4 md:mt-0 md:hidden">
                            <p class="text-gray-500 text-sm font-medium">Applied at</p>
                            <h3 class="text-gray-900 text-lg font-semibold tracking-tight">
                                {{ $proposal->created_at->format('d M Y') }}</h3>
                        </div>
                        <div class="hidden md:flex flex-col">
                            <p class="text-gray-500 text-sm font-medium">Budget</p>
                            <h3 class="text-gray-900 text-lg font-semibold tracking-tight">Rp
                                {{ number_format($proposal->project->budget, 0, ',', '.') }}</h3>
                        </div>
                        <div class="hidden md:flex flex-col">
                            <p class="text-gray-500 text-sm font-medium">Applied at</p>
                            <h3 class="text-gray-900 text-lg font-semibold tracking-tight">
                                {{ $proposal->created_at->format('d M Y') }}</h3>
                        </div>
                        <div class="flex flex-row items-center gap-x-3 mt-4 md:mt-0">
                            <a href="{{ route('dashboard.proposal_details', [$proposal->project, $proposal->id]) }}"
                                class="inline-flex items-center font-semibold py-2 px-4 bg-indigo-600 text-white rounded-full hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-all duration-200 text-sm">
                                Details
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500 text-center text-lg font-medium">No proposals available...</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
