<x-app-layout>
    <x-slot name="header">
        <div class="px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-2xl text-gray-900 leading-tight tracking-tight">
                {{ __('Project Details') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-2xl p-8 flex flex-col gap-y-6 transition-all duration-300">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="py-3 px-4 mb-4 rounded-lg bg-red-100 text-red-700 font-medium">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif

                <div
                    class="item-card flex flex-col md:flex-row gap-y-6 justify-between items-start md:items-center p-6 bg-gray-50 rounded-xl hover:shadow-lg hover:-translate-y-1 transition-all duration-300 border border-gray-100">
                    <div class="flex flex-row items-center gap-x-4">
                        <img src="{{ Storage::url($project->thumbnail) }}" alt="{{ $project->name }}"
                            class="rounded-2xl object-cover w-24 h-16 shadow-sm">
                        <div class="flex flex-col">
                            <h3 class="text-gray-900 text-lg font-semibold tracking-tight">{{ $project->name }}</h3>
                            <p class="text-gray-500 text-sm font-medium">{{ $project->category->name }}</p>
                        </div>
                    </div>
                    <div class="flex flex-row items-center gap-x-3 mt-4 md:mt-0">
                        <a href="#"
                            class="inline-flex items-center font-semibold py-2 px-4 bg-orange-600 text-white rounded-full hover:bg-orange-700 focus:ring-2 focus:ring-orange-500 focus:ring-offset-2 transition-all duration-200 text-sm">
                            Preview
                        </a>
                        <a href="{{ route('admin.projects.tools', $project) }}"
                            class="inline-flex items-center font-semibold py-2 px-4 bg-indigo-600 text-white rounded-full hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-all duration-200 text-sm">
                            Add Tools
                        </a>
                    </div>
                </div>

                <hr class="my-6 border-gray-200">

                <h3 class="text-gray-900 text-xl font-semibold tracking-tight">Applicants</h3>

                @forelse($project->applicants as $applicant)
                    <div
                        class="flex flex-col sm:flex-row justify-between items-start sm:items-center p-4 bg-gray-50 rounded-xl hover:shadow-lg hover:-translate-y-1 transition-all duration-300 border border-gray-100">
                        <div class="flex flex-row items-center gap-x-3">
                            <img src="{{ Storage::url($applicant->freelancer->profile_image ?? 'default-profile.png') }}"
                                alt="{{ $applicant->freelancer->name }}"
                                class="rounded-full object-cover w-10 h-10 shadow-sm">
                            <div class="flex flex-col">
                                <h3 class="text-gray-900 text-base font-semibold tracking-tight">
                                    {{ $applicant->freelancer->name }}</h3>
                                <p class="text-gray-500 text-sm font-medium">
                                    {{ $applicant->freelancer->occupation ?? 'N/A' }}</p>
                            </div>
                        </div>
                        <div class="flex flex-row items-center gap-x-3 mt-3 sm:mt-0">
                            @if ($applicant->status == 'Hired')
                                <span
                                    class="text-xs font-semibold py-1 px-2.5 rounded-full bg-green-100 text-green-700 tracking-wide">
                                    HIRED
                                </span>
                            @elseif ($applicant->status == 'Waiting')
                                <span
                                    class="text-xs font-semibold py-1 px-2.5 rounded-full bg-orange-100 text-orange-700 tracking-wide">
                                    WAITING
                                </span>
                            @elseif ($applicant->status == 'Rejected')
                                <span
                                    class="text-xs font-semibold py-1 px-2.5 rounded-full bg-red-100 text-red-700 tracking-wide">
                                    REJECTED
                                </span>
                            @endif
                            <a href="{{ route('admin.project_applicants.show', $applicant) }}"
                                class="inline-flex items-center font-semibold py-1.5 px-3 bg-indigo-600 text-white rounded-full hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-all duration-200 text-xs">
                                Details
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500 text-center text-lg font-medium">No applicants available...</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
