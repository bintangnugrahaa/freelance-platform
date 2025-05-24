<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-2xl text-gray-900 leading-tight tracking-tight">
                {{ __('Dashboard') }}
            </h2>
            <div class="text-sm font-medium text-gray-500">
                {{ now()->format('l, j F Y') }}
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div
                class="bg-gradient-to-r from-indigo-600 to-purple-600 rounded-2xl shadow-lg overflow-hidden mb-8 transition-all duration-300 hover:shadow-xl">
                <div class="p-6 sm:p-8 flex flex-col sm:flex-row items-center">
                    <div class="flex-shrink-0 mr-0 sm:mr-6 mb-4 sm:mb-0">
                        <div class="p-3 bg-white bg-opacity-20 rounded-full">
                            <svg class="h-10 w-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-white tracking-tight">Welcome back,
                            {{ Auth::user()->name }}!</h3>
                        <p class="mt-2 text-indigo-100 text-sm font-medium leading-relaxed">
                            Here's what's happening with your account today.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
