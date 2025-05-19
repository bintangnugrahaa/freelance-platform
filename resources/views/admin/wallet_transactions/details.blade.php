<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-2xl text-gray-900 leading-tight tracking-tight">
                {{ __('Transaction Details') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-2xl p-8 flex flex-col gap-y-6 transition-all duration-300">
                <h3 class="text-gray-900 text-xl font-semibold tracking-tight">
                    {{ $walletTransaction->type === 'Topup' ? 'Topup Details' : 'Withdrawal Details' }}
                </h3>
                <div
                    class="flex flex-col sm:flex-row gap-6 items-center justify-between p-6 bg-gray-50 rounded-xl border border-gray-100 hover:shadow-md transition-shadow duration-300">
                    <div class="flex items-center gap-x-4">
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
                                    d="M12.5494 18.5601H9.10938C8.69938 18.5601 8.35938 18.2201 8.35938 17.8101C8.35938 17.4001 8.69938 17.0601 9.10938 17.0601H12.5494C12.9594 17.0601 13.2994 17.4001 13.2994 17.8101C13.2994 18.2201 12.9694 18.5601Z"
                                    fill="#4F46E5" />
                                <path d="M19 11.8599H2V13.3599H19V11.8599Z" fill="#4F46E5" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-gray-500 text-sm font-medium">Total Amount</p>
                            <h3 class="text-gray-900 text-lg font-semibold tracking-tight">Rp
                                {{ number_format($walletTransaction->amount, 0, '.', '.') }}</h3>
                        </div>
                    </div>
                    <div class="flex items-center gap-x-4">
                        @if ($walletTransaction->is_paid)
                            <span
                                class="text-xs font-semibold py-1.5 px-3 rounded-full bg-green-100 text-green-700 tracking-wide">
                                PAID
                            </span>
                        @else
                            <span
                                class="text-xs font-semibold py-1.5 px-3 rounded-full bg-orange-100 text-orange-700 tracking-wide">
                                PENDING
                            </span>
                        @endif
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm font-medium">Date</p>
                        <h3 class="text-gray-900 text-lg font-semibold tracking-tight">
                            {{ $walletTransaction->created_at->format('d M Y') }}</h3>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm font-medium">User</p>
                        <h3 class="text-gray-900 text-lg font-semibold tracking-tight">
                            {{ $walletTransaction->user->name }}</h3>
                    </div>
                </div>

                @if ($walletTransaction->type == 'Withdraw')
                    <hr class="my-6 border-gray-200">

                    <div>
                        <h3 class="text-gray-900 text-xl font-semibold tracking-tight mb-5">Send Payment to:</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                            <div>
                                <p class="text-gray-500 text-sm font-medium">Bank</p>
                                <h3 class="text-gray-900 text-lg font-semibold tracking-tight">
                                    {{ $walletTransaction->bank_name }}</h3>
                            </div>
                            <div>
                                <p class="text-gray-500 text-sm font-medium">Account Number</p>
                                <h3 class="text-gray-900 text-lg font-semibold tracking-tight">
                                    {{ $walletTransaction->bank_account_number }}</h3>
                            </div>
                            <div>
                                <p class="text-gray-500 text-sm font-medium">Account Name</p>
                                <h3 class="text-gray-900 text-lg font-semibold tracking-tight">
                                    {{ $walletTransaction->bank_account_name }}</h3>
                            </div>
                        </div>
                    </div>

                    @if ($walletTransaction->is_paid)
                        <hr class="my-6 border-gray-200">
                        <h3 class="text-gray-900 text-xl font-semibold tracking-tight mb-5">Proof of Payment</h3>
                        <img src="{{ Storage::url($walletTransaction->proof) }}" alt="Proof of Payment"
                            class="rounded-2xl object-cover w-full max-w-md h-auto mb-3 shadow-sm">
                    @endif
                    <hr class="my-6 border-gray-200">

                    @if (!$walletTransaction->is_paid)
                        <h3 class="text-gray-900 text-xl font-semibold tracking-tight mb-5">Confirm Withdrawal</h3>
                        <form method="POST"
                            action="{{ route('admin.wallet_transactions.update', $walletTransaction) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mt-4">
                                <x-input-label for="proof" :value="__('Proof of Payment')" class="text-gray-700 font-medium" />
                                <x-text-input id="proof"
                                    class="block mt-1 w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                                    type="file" name="proof" required autofocus />
                                <x-input-error :messages="$errors->get('proof')" class="mt-2 text-red-600" />
                            </div>
                            <div class="flex items-center justify-end mt-6">
                                <button type="submit"
                                    class="inline-flex items-center font-semibold py-2.5 px-6 bg-indigo-600 text-white rounded-full hover:bg-indigo-700 transition-colors duration-200 text-sm">
                                    Update Withdrawal
                                </button>
                            </div>
                        </form>
                    @endif
                @endif

                @if ($walletTransaction->type == 'Topup')
                    <hr class="my-6 border-gray-200">
                    <h3 class="text-gray-900 text-xl font-semibold tracking-tight mb-5">Proof of Topup Payment</h3>
                    <img src="{{ Storage::url($walletTransaction->proof) }}" alt="Proof of Topup Payment"
                        class="rounded-2xl object-cover w-full max-w-md h-auto mb-3 shadow-sm">
                    <hr class="my-6 border-gray-200">
                    @if (!$walletTransaction->is_paid)
                        <form action="{{ route('admin.wallet_transactions.update', $walletTransaction) }}"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit"
                                class="inline-flex items-center font-semibold py-2.5 px-6 bg-indigo-600 text-white rounded-full hover:bg-indigo-700 transition-colors duration-200 text-sm">
                                Approve Topup
                            </button>
                        </form>
                    @endif
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
