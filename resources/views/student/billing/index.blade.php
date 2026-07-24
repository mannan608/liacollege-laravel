@extends('student.layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-50 dark:bg-[#0c0c0f] text-gray-900 dark:text-white transition-colors duration-300">

        <main class="max-w-5xl mx-auto px-6 py-10">

            <!-- Page Header -->
            <div class="mb-10">
                <h1 class="text-3xl font-semibold tracking-tight text-gray-900 dark:text-white mb-2">
                    My Billing
                </h1>
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    Manage your payments, view invoices, and track your payment history.
                </p>
            </div>

            <!-- Stats Overview -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-10">

                <!-- Unpaid Balance -->
                <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl p-5">
                    <div class="text-xs font-medium text-gray-400 dark:text-gray-500 uppercase tracking-wider mb-1">
                        Unpaid Balance
                    </div>

                    <div class="text-2xl font-semibold text-gray-900 dark:text-white">
                        ${{ number_format($unpaidBalance, 2) }}
                    </div>
                </div>

                <!-- Total Paid -->
                <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl p-5">
                    <div class="text-xs font-medium text-gray-400 dark:text-gray-500 uppercase tracking-wider mb-1">
                        Total Paid
                    </div>

                    <div class="text-2xl font-semibold text-emerald-600 dark:text-emerald-400">
                        ${{ number_format($totalPaid, 2) }}
                    </div>
                </div>

            </div>

            <!-- Unpaid Payment Requests and Invoices -->
            <div class="mb-10">
                <div class="flex items-center gap-3 mb-5">
                    <div class="w-8 h-8 rounded-lg bg-amber-100 dark:bg-amber-900/20 flex items-center justify-center">
                        <svg class="w-4 h-4 text-amber-600 dark:text-amber-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                        </svg>
                    </div>
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Unpaid Payment Requests and Invoices
                    </h2>
                </div>

                <div
                    class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr
                                    class="border-b border-gray-200 dark:border-gray-800 text-left text-xs font-medium text-gray-400 dark:text-gray-500 uppercase tracking-wider">
                                    <th class="px-6 py-4">Due Date</th>
                                    <th class="px-6 py-4">Amount</th>
                                    <th class="px-6 py-4">Balance</th>
                                    <th class="px-6 py-4">Payable</th>
                                    <th class="px-6 py-4">Description</th>
                                    <th class="px-6 py-4 w-20"></th>
                                </tr>
                            </thead>
                          <tbody>

@forelse($pendingPayments as $payment)

<tr class="border-b border-gray-100 dark:border-gray-800/50 hover:bg-gray-50 dark:hover:bg-gray-800/30">

    <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-200">
        {{ $payment->created_at->format('d M, Y') }}
    </td>

    <td class="px-6 py-4 text-sm font-medium text-gray-900 dark:text-gray-200">
        ${{ number_format($payment->amount,2) }}
    </td>

    <td class="px-6 py-4 text-sm text-red-600 dark:text-red-400 font-medium">
        ${{ number_format($payment->amount,2) }}
    </td>

    <td class="px-6 py-4">
        <a href="#"
            class="inline-flex items-center px-3 py-1.5 rounded-lg bg-brand-600 hover:bg-brand-700 text-white text-xs font-medium">
            Pay Now
        </a>
    </td>

    <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">
        {{ $payment->enrollment?->slot?->course?->name }}
    </td>

    <td class="px-6 py-4 text-center">
        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-amber-100 text-amber-700 dark:bg-amber-900/20 dark:text-amber-400">
            {{ ucfirst($payment->status) }}
        </span>
    </td>

</tr>

@empty

<tr>
    <td colspan="6" class="px-6 py-16 text-center">

        <div class="flex flex-col items-center">

            <div class="w-12 h-12 rounded-xl bg-gray-100 dark:bg-gray-800 flex items-center justify-center mb-4">

                <svg class="w-6 h-6 text-gray-400" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1.5"
                        d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z"/>
                </svg>

            </div>

            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">
                All caught up
            </p>

            <p class="text-xs text-gray-400 dark:text-gray-500">
                You have no unpaid invoices or payment requests.
            </p>

        </div>

    </td>
</tr>

@endforelse

</tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Payment History -->
            <div>
                <div class="flex items-center justify-between mb-5">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-lg bg-blue-100 dark:bg-blue-900/20 flex items-center justify-center">
                            <svg class="w-4 h-4 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Payment History</h2>
                    </div>
                </div>


                <!-- History Table -->
                <div
                    class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr
                                    class="border-b border-gray-200 dark:border-gray-800 text-left text-xs font-medium text-gray-400 dark:text-gray-500 uppercase tracking-wider">
                                    <th class="px-6 py-4">Date</th>
                                    <th class="px-6 py-4">Course</th>
                                    <th class="px-6 py-4">Method</th>
                                    <th class="px-6 py-4 text-right">Amount</th>
                                    <th class="px-6 py-4 text-center">Status</th>
                                    <th class="px-6 py-4 w-20"></th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse($payments as $payment)
                                    <tr class="border-b border-gray-100 dark:border-gray-800/50">

                                        <td class="px-6 py-4 text-sm">
                                            {{ $payment->created_at->format('M d, Y') }}
                                        </td>

                                        <td class="px-6 py-4 text-sm">
                                            {{ $payment->enrollment?->slot?->course?->name ?? '-' }}
                                        </td>

                                        <td class="px-6 py-4 text-sm">
                                            {{ $payment->payment_method }}
                                        </td>

                                        <td class="px-6 py-4 text-right font-medium">
                                            ${{ number_format($payment->amount, 2) }}
                                        </td>

                                        <td class="px-6 py-4 text-center">

                                            @if ($payment->status == 'paid')
                                                <span
                                                    class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-emerald-100 text-emerald-700">
                                                    Paid
                                                </span>
                                            @elseif($payment->status == 'pending')
                                                <span
                                                    class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-700">
                                                    Pending
                                                </span>
                                            @elseif($payment->status == 'failed')
                                                <span
                                                    class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-red-100 text-red-700">
                                                    Failed
                                                </span>
                                            @else
                                                <span
                                                    class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-700">
                                                    {{ ucfirst($payment->status) }}
                                                </span>
                                            @endif

                                        </td>

                                        <td class="px-6 py-4 text-center">

                                            <a href="#" class="text-gray-400 hover:text-gray-700">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                                </svg>
                                            </a>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="6" class="px-6 py-10 text-center text-gray-500">

                                            No payment history found.

                                        </td>

                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </main>
    </div>
@endsection
