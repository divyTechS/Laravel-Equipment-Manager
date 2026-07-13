<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEquipmentRequest;
use App\Http\Requests\UpdateEquipmentRequest;
use App\Models\Category;
use App\Models\Equipment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EquipmentController extends Controller
{
    public function index(Request $request): View
    {
        // Start query with eager-loaded category relationship
        $query = Equipment::with('category');

        // Apply status filter if present in the request
        if ($request->filled('status')) {
            $query->status($request->status);
        }

        // Apply category filter if present in the request
        if ($request->filled('category_id')) {
            $query->category($request->category_id);
        }

        // Get paginated results ordered by newest first
        $equipment = $query->latest()->paginate(10);
        $categories = Category::all();

        return view('equipment.index', [
            'equipment' => $equipment,
            'categories' => $categories,
            'selectedStatus' => $request->status,
            'selectedCategory' => $request->category_id,
        ]);
    }

    public function create(): View
    {
        // Pass all categories so the form can populate a dropdown
        $categories = Category::all();
        return view('equipment.create', compact('categories'));
    }

    public function store(StoreEquipmentRequest $request): RedirectResponse
    {
        // Create equipment using only validated data
        Equipment::create($request->validated());
        return redirect()->route('equipment.index')->with('success', 'Equipment added successfully.');
    }

    public function show(Equipment $equipment): View
    {
        // Laravel auto-resolves the model via route model binding
        return view('equipment.show', compact('equipment'));
    }

    public function edit(Equipment $equipment): View
    {
        // Pass both the equipment and categories for the edit form
        $categories = Category::all();
        return view('equipment.edit', compact('equipment', 'categories'));
    }

    public function update(UpdateEquipmentRequest $request, Equipment $equipment): RedirectResponse
    {
        // Update with validated data only
        $equipment->update($request->validated());
        return redirect()->route('equipment.index')->with('success', 'Equipment updated successfully.');
    }

    public function destroy(Equipment $equipment): RedirectResponse
    {
        // Delete the record and redirect with a success message
        $equipment->delete();
        return redirect()->route('equipment.index')->with('success', 'Equipment deleted successfully.');
    }
}
