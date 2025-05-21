<x-app-layout>
    <x-slot name="header">
        <div class="px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-2xl text-gray-900 leading-tight tracking-tight">
                {{ __('New Project') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-2xl p-8 flex flex-col gap-y-6 transition-all duration-300">
                <span class="text-sm font-medium bg-red-100 text-red-700 rounded-lg p-4 w-fit">
                    Pastikan Wallet Balance cukup sesuai budget project Anda
                </span>
                <div
                    class="flex flex-col sm:flex-row gap-y-6 justify-between items-start sm:items-center p-6 bg-gray-50 rounded-xl hover:shadow-lg transition-all duration-300 border border-gray-100">
                    <div class="flex flex-row items-center gap-x-4">
                        <div class="p-3 bg-indigo-100 rounded-full">
                            <svg width="32" height="32" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.4"
                                    d="M19 10.2798V17.4298C18.97 20.2798 18.19 20.9998 15.22 20.9998H5.78003C2.76003 20.9998 2 20.2498 2 17.2698V10.2798C2 7.5798 2.63 6.7098 5 6.5698C5.24 6.5598 5.50003 6.5498 5.78003 6.5498H15.22C18.24 6.5498 19 7.2998 19 10.2798Z"
                                    fill="#4F46E5" />
                                <path
                                    d="M22 6.73V13.72C22 16.42 21.37 17.29 19 17.43V10.28C19 7.3 18.24 6.55 15.22 6.55H5.78003C5.50003 6.55 5.24 6.56 5 6.57C5.03 3.72 5.81003 3 8.78003 3H18.22C21.24 3 22 3.75 22 6.73Z"
                                    fill="#4F46E5" />
                                <path
                                    d="M6.96027 18.5601H5.24023C4.83023 18.5601 4.49023 18.2201 4.49023 17.8101C4.49023 17.4001 4.83023 17.0601 5.24023 17.0601H6.96027C7.37027 17.0601 7.71027 17.4001 7.71027 17.8101C7.71027 18.2201 7.38027 18.5601 6.96027 18.5601Z"
                                    fill="#4F46E5" />
                                <path
                                    d="M12.5494 18.5601H9.10938C8.69938 18.5601 8.35938 18.2201 8.35938 17.8101C8.35938 17.4001 8.69938 17.0601 9.10938 17.0601H12.5494C12.9594 17.0601 13.2994 17.4001 13.2994 17.8101C13.2994 18.2201 12.9694 18.5601 12.5494 18.5601Z"
                                    fill="#4F46E5" />
                                <path d="M19 11.8599H2V13.3599H19V11.8599Z" fill="#4F46E5" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-gray-500 text-sm font-medium">Wallet Balance</p>
                            <h3 class="text-gray-900 text-lg font-semibold tracking-tight">Rp
                                {{ number_format(Auth::user()->wallet->balance, 0, ',', '.') }}</h3>
                        </div>
                    </div>
                    <a href="{{ route('dashboard.wallet.topup') }}"
                        class="inline-flex items-center font-semibold py-2.5 px-6 bg-indigo-600 text-white rounded-full hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-all duration-200 text-sm">
                        Topup Wallet
                    </a>
                </div>
            </div>
        </div>

        <div class="mt-6 max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-2xl p-8">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="py-3 px-4 mb-4 rounded-lg bg-red-100 text-red-700 font-medium">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif

                <form method="POST" action="{{ route('admin.projects.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div>
                        <x-input-label for="name" :value="__('Project Name')" class="text-gray-700 font-medium" />
                        <x-text-input id="name"
                            class="block mt-1 w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                            type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-600" />
                    </div>

                    <div class="mt-6">
                        <x-input-label for="thumbnail" :value="__('Thumbnail')" class="text-gray-700 font-medium" />
                        <x-text-input id="thumbnail"
                            class="block mt-1 w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                            type="file" name="thumbnail" required autocomplete="thumbnail" />
                        <x-input-error :messages="$errors->get('thumbnail')" class="mt-2 text-red-600" />
                    </div>

                    <div class="mt-6">
                        <x-input-label for="budget" :value="__('Budget')" class="text-gray-700 font-medium" />
                        <x-text-input id="budget"
                            class="block mt-1 w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                            type="number" name="budget" :value="old('budget')" required autocomplete="budget" />
                        <x-input-error :messages="$errors->get('budget')" class="mt-2 text-red-600" />
                    </div>

                    <div class="mt-6">
                        <x-input-label for="category_id" :value="__('Category')" class="text-gray-700 font-medium" />
                        <select name="category_id" id="category_id"
                            class="block mt-1 w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 text-gray-900 text-sm">
                            <option value="" disabled selected>Choose a category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('category_id')" class="mt-2 text-red-600" />
                    </div>

                    <div class="mt-6">
                        <x-input-label for="about" :value="__('About')" class="text-gray-700 font-medium" />
                        <textarea name="about" id="about" cols="30" rows="5"
                            class="block mt-1 w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 text-gray-900 text-sm">{{ old('about') }}</textarea>
                        <x-input-error :messages="$errors->get('about')" class="mt-2 text-red-600" />
                    </div>

                    <div class="mt-6">
                        <x-input-label for="skill_level" :value="__('Skill Level')" class="text-gray-700 font-medium" />
                        <select name="skill_level" id="skill_level"
                            class="block mt-1 w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 text-gray-900 text-sm">
                            <option value="" disabled selected>Choose a skill level</option>
                            <option value="Beginner">Beginner</option>
                            <option value="Intermediate">Intermediate</option>
                            <option value="Expert">Expert</option>
                        </select>
                        <x-input-error :messages="$errors->get('skill_level')" class="mt-2 text-red-600" />
                    </div>

                    <div class="flex items-center justify-end mt-6">
                        <button type="submit"
                            class="inline-flex items-center font-semibold py-2.5 px-6 bg-indigo-600 text-white rounded-full hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-all duration-200 text-sm">
                            Add New Project
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
