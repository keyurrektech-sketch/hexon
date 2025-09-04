<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SpareParts;
use Illuminate\Validation\Rule;

class SparePartsController extends Controller
{
    public function index(Request $request)
    {
        $spare_parts = SpareParts::latest()->paginate(5);
        return view('sparePart.index', compact('spare_parts'))
        ->with('i', ($request->input('page', 1) - 1) * 5);    
    }

    public function create()
    {
        return view('sparePart.add-edit');   
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'=>'required|string|max:255|unique:spare_parts,name',
            'type'=>'required',
            'size'=>'required',
            'weight'=>'required',
            'qty'=>'required|integer',
            'minimum_qty'=>'required|integer',
            'rate'=>'required|numeric|min:0',
            'unit'=>'required',
        ]); 
        SpareParts::create($validated);
        return redirect()->route('spareParts.index')->with('success', 'Part Added Successfully');
    }

    public function destroy(SpareParts $sparePart)
    {
        $sparePart->delete();
        return redirect()->route('spareParts.index')->with('success', 'Part Deleted Successfully');
    }

    public function edit(SpareParts $sparePart)
    {
        return view('sparePart.add-edit', compact('sparePart'));
    }

    
    public function show(SpareParts $sparePart)
    {
        return view('sparePart.show', compact('sparePart'));
    }

    public function update(Request $request, SpareParts $sparePart)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('spare_parts')->ignore($sparePart->id),
            ],
            'type'=>'required',
            'size'=>'required',
            'weight'=>'required',
            'qty'=>'required|integer',
            'minimum_qty'=>'required|integer',
            'rate'=>'required|numeric|min:0',
            'unit'=>'required',
        ]); 
        $sparePart->update($validated);
        return redirect()->route('spareParts.index')->with('success', 'Part Added Successfully');        
    }
}
