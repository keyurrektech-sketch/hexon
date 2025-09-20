<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rejection;
use App\Models\SpareParts;

class RejectionController extends Controller
{
    public function index()
    {
        return view('rejections.internal-rejections');
    }    
    public function create()
    {
        $spareParts = SpareParts::all();
        return view('rejections.add-internal-rejection', compact('spareParts'));
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'parts' => 'required',
            'user_code' => Auth::user()->id,
            'qty' => 'required',
            'reason' => 'required',
        ]); 
        Rejection::create($validated);
    }
}
