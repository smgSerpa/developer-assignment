<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="w-full table-auto border-collapse border border-slate-400">
                        <thead>
                            <tr>
                                <th class="border border-slate-300 p-3 py-2 font-semibold text-left">Provider</th>
                                <th class="border border-slate-300 p-3 py-2 font-semibold text-left">Delivery Period</th>
                                <th class="border border-slate-300 p-3 py-2 font-semibold text-left">Price</th>
                                <th class="border border-slate-300 p-3 py-2 font-semibold text-left">Price Multiplied (x{{ config('nordpool.price_multiplier') }})</th>
                            </tr>
                        </thead>

                        <tbody>
                        @forelse($prices as $price)
                            <tr class="text-xs">
                                <td class="border border-slate-300 p-3 py-1">
                                    {{ $price->provider }}
                                </td>
                                <td class="border border-slate-300 p-3 py-1">
                                    {{ $price->delivery_start }} - {{ $price->delivery_end }}
                                </td>
                                <td class="border border-slate-300 p-3 py-1">
                                    {{ $price->price }}
                                </td>
                                <td class="border border-slate-300 p-3 py-1">
                                    {{ $price->price_multiplied }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="border border-slate-300 p-3 bg-red-50 text-center">
                                    <div>
                                        Prices are not updated yet
                                    </div>

                                    <a href="{{ route('update-prices') }}" class="mt-3 inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                        Run update manually
                                    </a>
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
