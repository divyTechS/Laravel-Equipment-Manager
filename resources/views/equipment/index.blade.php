@extends('layouts.app')

@section('title', 'All Equipment')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Equipment Inventory</h1>

        <form method="GET" action="{{ route('equipment.index') }}" class="flex gap-4 items-end">
            <div>
                <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                <select name="status" id="status" class="border border-gray-300 rounded-md px-3 py-2">
                    <option value="">All Statuses</option>
                    <option value="available" @selected($selectedStatus === 'available')>Available</option>
                    <option value="in-use" @selected($selectedStatus === 'in-use')>In Use</option>
                    <option value="maintenance" @selected($selectedStatus === 'maintenance')>Maintenance</option>
                </select>
            </div>

            <div>
                <label for="category_id" class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                <select name="category_id" id="category_id" class="border border-gray-300 rounded-md px-3 py-2">
                    <option value="">All Categories</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" @selected($selectedCategory == $category->id)>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="bg-gray-800 text-white px-4 py-2 rounded-md hover:bg-gray-900">Filter</button>
            <a href="{{ route('equipment.index') }}" class="text-gray-600 hover:text-gray-800 px-4 py-2">Clear</a>
        </form>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Serial Number</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Category</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Purchase Date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($equipment as $item)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-900">{{ $item->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-600">{{ $item->serial_number }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-600">{{ $item->category->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($item->status === 'available')
                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Available</span>
                            @elseif($item->status === 'in-use')
                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">In Use</span>
                            @else
                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">Maintenance</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-600">{{ $item->purchase_date ?? 'N/A' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            <a href="{{ route('equipment.show', $item) }}" class="text-blue-600 hover:text-blue-800 mr-3">View</a>
                            <a href="{{ route('equipment.edit', $item) }}" class="text-indigo-600 hover:text-indigo-800 mr-3">Edit</a>
                            <form action="{{ route('equipment.destroy', $item) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center text-gray-500">No equipment found. Add your first item!</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $equipment->withQueryString()->links() }}
    </div>
@endsection