@extends('layouts.app')

@section('title', $equipment->name)

@section('content')
    <div class="max-w-2xl mx-auto">
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex justify-between items-start mb-6">
                <h1 class="text-2xl font-bold text-gray-800">{{ $equipment->name }}</h1>
                @if($equipment->status === 'available')
                    <span class="px-3 py-1 text-sm font-semibold rounded-full bg-green-100 text-green-800">Available</span>
                @elseif($equipment->status === 'in-use')
                    <span class="px-3 py-1 text-sm font-semibold rounded-full bg-yellow-100 text-yellow-800">In Use</span>
                @else
                    <span class="px-3 py-1 text-sm font-semibold rounded-full bg-red-100 text-red-800">Maintenance</span>
                @endif
            </div>

            <dl class="grid grid-cols-1 gap-4">
                <div>
                    <dt class="text-sm font-medium text-gray-500">Serial Number</dt>
                    <dd class="text-gray-900">{{ $equipment->serial_number }}</dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-gray-500">Category</dt>
                    <dd class="text-gray-900">{{ $equipment->category->name }}</dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-gray-500">Purchase Date</dt>
                    <dd class="text-gray-900">{{ $equipment->purchase_date ?? 'Not specified' }}</dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-gray-500">Description</dt>
                    <dd class="text-gray-900">{{ $equipment->description ?? 'No description provided.' }}</dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-gray-500">Added</dt>
                    <dd class="text-gray-900">{{ $equipment->created_at->format('M d, Y') }}</dd>
                </div>
            </dl>

            <div class="flex gap-4 mt-8 pt-4 border-t">
                <a href="{{ route('equipment.edit', $equipment) }}" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">Edit</a>
                <form action="{{ route('equipment.destroy', $equipment) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this equipment?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700">Delete</button>
                </form>
                <a href="{{ route('equipment.index') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300">Back to List</a>
            </div>
        </div>
    </div>
@endsection