@extends('layouts.guest')

@section('content')
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">SMS Summary By Provider</h1>

    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Application
                    </th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Total Messages
                    </th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Unique Recipients
                    </th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Read Rate (%)
                    </th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 text-sm text-gray-700">
                @foreach ($report as $row)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3 font-medium">{{ ucfirst($row->provider->name) }}</td>
                    <td class="px-4 py-3">{{ number_format($row->total) }}</td>
                    <td class="px-4 py-3">{{ number_format($row->unique_recipients) }}</td>
                    <td class="px-4 py-3">
                        <span class="inline-block px-2 py-1 rounded-full bg-blue-100 text-blue-800 text-xs font-semibold">
                            {{ $row->read_rate }}%
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
