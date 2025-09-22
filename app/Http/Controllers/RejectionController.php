<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rejection;
use App\Models\SpareParts;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\DataTables\RejectionsDataTable;
use App\DataTables\RejectionDataTable;

class RejectionController extends Controller
{
    public function index(RejectionsDataTable $dataTable)
    {
        return $dataTable->render('rejections.internal-rejections');
    } 

    public function create()
    {
        $spareParts = SpareParts::all();
        return view('rejections.add-internal-rejection', compact('spareParts'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'spare_part_id.*' => 'required|exists:spare_parts,id',
            'qty.*' => 'required|integer|min:1',
            'reason.*' => 'nullable|string',
        ]);

        DB::transaction(function () use ($request) {
            foreach ($request->spare_part_id as $key => $sparePartId) {
                $qty = (int) $request->qty[$key];
                $reason = $request->reason[$key] ?? null;

                Rejection::create([
                    'user_id' => Auth::id(),
                    'spare_part_id' => $sparePartId,
                    'qty' => $qty,
                    'reason' => $reason,
                ]);

                $sparePart = SpareParts::findOrFail($sparePartId);
                $sparePart->qty = max(0, $sparePart->qty - $qty);
                $sparePart->save();
            }
        });

        return redirect()->route('rejections.index')->with('success', 'Rejections saved successfully.');
    }

    public function destroy($id)
    {
        $rejection = Rejection::findOrFail($id);

        // optional: restore stock here if needed
        $sparePart = $rejection->sparePart;
        if ($sparePart) {
            $sparePart->qty += $rejection->qty;
            $sparePart->save();
        }

        $rejection->delete();
        return redirect()->route('rejections.index')->with('success', 'Deleted successfully.');
    }
}
