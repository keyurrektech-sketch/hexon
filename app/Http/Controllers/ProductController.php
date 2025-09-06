<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\SpareParts;
use Illuminate\Validation\Rule;
use App\DataTables\ProductsDataTable;

class ProductController extends Controller
{
    public function index(ProductsDataTable $dataTable)
    {
        return $dataTable->render('products.index');
    }

    public function create()
    {
        $spareParts = SpareParts::all();
        return view('products.add-edit', compact('spareParts'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'   => 'required|string|max:255|unique:products,name',
            'valve_type' => 'nullable|string',
            'product_code' => 'nullable|numeric',
            'actuation' => 'nullable|string',
            'pressure_rating' => 'nullable|string',
            'valve_size' => 'nullable|string',
            'valve_size_rate' => 'nullable|string',
            'media' => 'nullable|string',
            'flow' => 'nullable|string',
            'sku_code' => 'nullable|string',
            'mrp' => 'nullable|string',
            'media_temperature' => 'nullable|string',
            'media_temperature_rate' => 'nullable|string',
            'body_material' => 'nullable|string',
            'hsn_code' => 'nullable|string',
            'primary_material_of_construction' => 'nullable|string',
            'spare_parts'   => 'required|array',
            'spare_parts.*' => 'integer|exists:spare_parts,id',
            'qty'           => 'required|array',
            'qty.*'         => 'numeric|min:1',
        ]);

        // Create product
        $product = Product::create($validated);

        // Attach spare parts
        if ($request->has('spare_parts')) {
            foreach ($request->spare_parts as $index => $sparePartId) {
                if ($sparePartId) {
                    $product->spareParts()->attach($sparePartId, [
                        'qty' => $request->qty[$index] ?? 0,
                    ]);
                }
            }
        }

        return redirect()->route('products.index')->with('success', 'Product Added Successfully');
    }

    public function edit(Product $product)
    {
        $spareParts = SpareParts::all();
        $product->load('spareParts'); // load relation
    
        return view('products.add-edit', compact('product', 'spareParts'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('products', 'name')->ignore($product->id),
            ],
            'valve_type' => 'nullable|string',
            'product_code' => 'nullable|numeric',
            'actuation' => 'nullable|string',
            'pressure_rating' => 'nullable|string',
            'valve_size' => 'nullable|string',
            'valve_size_rate' => 'nullable|string',
            'media' => 'nullable|string',
            'flow' => 'nullable|string',
            'sku_code' => 'nullable|string',
            'mrp' => 'nullable|string',
            'media_temperature' => 'nullable|string',
            'media_temperature_rate' => 'nullable|string',
            'body_material' => 'nullable|string',
            'hsn_code' => 'nullable|string',
            'primary_material_of_construction' => 'nullable|string',
            'spare_parts'   => 'required|array',
            'spare_parts.*' => 'integer|exists:spare_parts,id',
            'qty'           => 'required|array',
            'qty.*'         => 'numeric|min:1',
        ]);

        // Update product
        $product->update($validated);

        // Reset spare parts
        $product->spareParts()->detach();

        // Attach updated spare parts
        if ($request->has('spare_parts')) {
            foreach ($request->spare_parts as $index => $sparePartId) {
                if ($sparePartId) {
                    $product->spareParts()->attach($sparePartId, [
                        'qty' => $request->qty[$index] ?? 0,
                    ]);
                }
            }
        }

        return redirect()->route('products.index')->with('success', 'Product Updated Successfully');
    }

    public function show(Product $product)
    {
        $product->load('spareParts');
        
        if (request()->ajax()) {
            return response()->json($product);
        }

        return view('products.show', compact('product'));
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product Deleted Successfully');
    }
}
