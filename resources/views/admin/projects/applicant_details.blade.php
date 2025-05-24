<x-app-layout>
    <x-slot name="header">
        <div class="px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-2xl text-gray-900 leading-tight tracking-tight">
                {{ __('Applicant Details') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-2xl p-8 flex flex-col gap-y-6 transition-all duration-300">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="py-3 px-4 mb-4 rounded-lg bg-red-100 text-red-700 font-medium">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif

                @if ($projectApplicant->project->has_finished)
                    <span class="text-sm font-medium bg-green-100 text-green-700 rounded-lg p-4 w-full">
                        Project completed, revenue has been paid to the freelancer
                    </span>
                @endif

                <div
                    class="item-card flex flex-col sm:flex-row gap-y-6 justify-between items-start sm:items-center p-6 bg-gray-50 rounded-xl hover:shadow-lg transition-all duration-300 border border-gray-100">
                    <div class="flex flex-row items-center gap-x-4">
                        <img src="{{ Storage::url($projectApplicant->project->thumbnail ?? 'default-thumbnail.png') }}"
                            alt="{{ $projectApplicant->project->name }}"
                            class="rounded-2xl object-cover w-24 h-16 shadow-sm">
                        <div class="flex flex-col">
                            <h3 class="text-gray-900 text-lg font-semibold tracking-tight">
                                {{ $projectApplicant->project->name }}</h3>
                            <p class="text-gray-500 text-sm font-medium">
                                {{ $projectApplicant->project->category->name }}</p>
                        </div>
                    </div>
                </div>

                <hr class="my-6 border-gray-200">

                <h3 class="text-gray-900 text-xl font-semibold tracking-tight">Applicant</h3>

                <div
                    class="flex flex-col sm:flex-row justify-between items-start sm:items-center p-4 bg-gray-50 rounded-xl hover:shadow-lg transition-all duration-300 border border-gray-100">
                    <div class="flex flex-row items-center gap-x-3">
                        <img src="{{ Storage::url($projectApplicant->freelancer->avatar ?? 'default-profile.png') }}"
                            alt="{{ $projectApplicant->freelancer->name }}"
                            class="rounded-full object-cover w-12 h-12 shadow-sm">
                        <div class="flex flex-col">
                            <h3 class="text-gray-900 text-base font-semibold tracking-tight">
                                {{ $projectApplicant->freelancer->name }}</h3>
                            <p class="text-gray-500 text-sm font-medium">
                                {{ $projectApplicant->freelancer->occupation ?? 'N/A' }}</p>
                        </div>
                    </div>
                    <div class="flex flex-row items-center gap-x-3 mt-3 sm:mt-0">
                        @if ($projectApplicant->status == 'Hired')
                            <span
                                class="text-xs font-semibold py-1 px-2.5 rounded-full bg-green-100 text-green-700 tracking-wide">
                                HIRED
                            </span>
                        @elseif ($projectApplicant->status == 'Waiting')
                            <span
                                class="text-xs font-semibold py-1 px-2.5 rounded-full bg-yellow-100 text-yellow-700 tracking-wide">
                                WAITING
                            </span>
                        @elseif ($projectApplicant->status == 'Rejected')
                            <span
                                class="text-xs font-semibold py-1 px-2.5 rounded-full bg-red-100 text-red-700 tracking-wide">
                                REJECTED
                            </span>
                        @endif
                    </div>
                </div>

                <h3 class="text-gray-900 text-xl font-semibold tracking-tight mt-4">Message</h3>
                <p class="text-gray-900 text-sm font-medium leading-relaxed">{{ $projectApplicant->message }}</p>

                @if ($projectApplicant->status == 'Hired')
                    <hr class="my-6 border-gray-200">
                    <h3 class="text-gray-900 text-xl font-semibold tracking-tight">Setup Meeting with Freelancer</h3>
                    <div
                        class="flex flex-row gap-x-3 items-center border border-gray-200 bg-gray-50 px-4 py-3 rounded-xl hover:shadow-md transition-all duration-200">
                        <div class="p-2 bg-indigo-100 rounded-full">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.4"
                                    d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                                    fill="#4F46E5" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M6.25 9.67976V12.4798C6.25 14.0198 7.50001 15.2598 9.04001 15.2498L12.72 15.2198C13.23 15.2198 13.64 14.7998 13.64 14.2998V11.5298C13.64 9.99977 12.4 8.75977 10.87 8.75977H7.17999C6.65999 8.75977 6.25 9.16976 6.25 9.67976Z"
                                    fill="#4F46E5" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M17.75 10.0196V13.9996C17.75 14.4296 17.27 14.6896 16.91 14.4496L14.99 13.1696C14.84 13.0696 14.75 12.8996 14.75 12.7196V11.2996C14.75 11.1196 14.84 10.9496 14.99 10.8496L16.91 9.56964C17.27 9.32964 17.75 9.58963 17.75 10.0196Z"
                                    fill="#4F46E5" />
                            </svg>
                        </div>
                        <p class="text-gray-900 text-sm font-semibold">{{ $projectApplicant->freelancer->email }}</p>
                    </div>
                @elseif ($projectApplicant->status == 'Waiting')
                    <form method="POST" action="{{ route('admin.project_applicants.update', $projectApplicant->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <button type="submit"
                            class="mt-4 w-full inline-flex items-center font-semibold py-2.5 px-6 bg-indigo-600 text-white rounded-full hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-all duration-200 text-sm">
                            Approve & Hire
                        </button>
                    </form>
                    <form method="POST" action="{{ route('admin.project_applicants.reject', $projectApplicant->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <button type="submit"
                            class="mt-2 w-full inline-flex items-center font-semibold py-2.5 px-6 bg-red-600 text-white rounded-full hover:bg-red-700 focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-all duration-200 text-sm">
                            Reject
                        </button>
                    </form>
                @endif

                @if (
                    $projectApplicant->project->has_started &&
                        $projectApplicant->status == 'Hired' &&
                        !$projectApplicant->project->has_finished)
                    <hr class="my-6 border-gray-200">
                    <form method="POST" action="{{ route('admin.complete_project.store', $projectApplicant->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        <button type="submit"
                            class="w-full inline-flex items-center justify-center text-center font-semibold py-2.5 px-6 bg-green-600 text-white rounded-full hover:bg-green-700 focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition-all duration-200 text-sm">
                            Mark as Completed
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
