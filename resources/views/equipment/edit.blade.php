@extends('layouts.app')

@section('title', 'Edit Equipment')

@section('content')
    <div class="max-w-2xl mx-auto">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit: {{ $equipment->name }}</h1>

        <form method="POST" action="{{ route('equipment.update', $equipment) }}" class="bg-white rounded-lg shadow p-6 space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $equipment->name) }}" required
                    class="w-full border border-gray-300 rounded-md px-3 py-2 @error('name') border-red-500 @enderror">
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="serial_number" class="block text-sm font-medium text-gray-700 mb-1">Serial Number</label>
                <input type="text" name="serial_number" id="serial_number" value="{{ old('serial_number', $equipment->serial_number) }}" required
                    class="w-full border border-gray-300 rounded-md px-3 py-2 @error('serial_number') border-red-500 @enderror">
                @error('serial_number')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="category_id" class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                <select name="category_id" id="category_id" required
                    class="w-full border border-gray-300 rounded-md px-3 py-2 @error('category_id') border-red-500 @enderror">
                    <option value="">Select a category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" @selected(old('category_id', $equipment->category_id) == $category->id)>{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                <select name="status" id="status" required
                    class="w-full border border-gray-300 rounded-md px-3 py-2 @error('status') border-red-500 @enderror">
                    <option value="available" @selected(old('status', $equipment->status) === 'available')>Available</option>
                    <option value="in-use" @selected(old('status', $equipment->status) === 'in-use')>In Use</option>
                    <option value="maintenance" @selected(old('status', $equipment->status) === 'maintenance')>Maintenance</option>
                </select>
                @error('status')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="purchase_date" class="block text-sm font-medium text-gray-700 mb-1">Purchase Date</label>
                <input type="date" name="purchase_date" id="purchase_date" value="{{ old('purchase_date', $equipment->purchase_date) }}"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 @error('purchase_date') border-red-500 @enderror">
                @error('purchase_date')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                <textarea name="description" id="description" rows="3"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 @error('description') border-red-500 @enderror">{{ old('description', $equipment->description) }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-4 pt-4">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700">Update Equipment</button>
                <a href="{{ route('equipment.index') }}" class="bg-gray-200 text-gray-700 px-6 py-2 rounded-md hover:bg-gray-300">Cancel</a>
            </div>
        </form>
    </div>
@endsection