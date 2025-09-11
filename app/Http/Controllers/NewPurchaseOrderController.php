<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\NewPurchaseOrder;
use App\Models\Customer;
use Carbon\Carbon;


class NewPurchaseOrderController extends Controller
{
    public function index()
    {
        return view('newPurchaseOrders.index');
    }

    public function create()
    {
        $customers = Customer::all();

        $currentDate = Carbon::now();        
        $currentMonth = $currentDate->format('m'); 
        $financialYearStart = $currentDate->month >= 4 ? $currentDate->year : $currentDate->year - 1;
        $financialYearEnd = $financialYearStart + 1;
        $financialYear = substr($financialYearStart, -2) . '-' . substr($financialYearEnd, -2);

        $latestInvoice = NewPurchaseOrder::latest('id')->first();
        if ($latestInvoice) {            
            preg_match('/HVPO-(\d+)/', $latestInvoice->invoice, $matches);
            $lastInvoiceNumber = isset($matches[1]) ? (int)$matches[1] : 0;

            $newInvoiceNumber = 'HVPO-' . ($lastInvoiceNumber + 1) . '-' . $currentMonth . '/' . $financialYear;
        } else {
            $newInvoiceNumber = 'HVPO-1-' . $currentMonth . '/' . $financialYear;
        }
        return view('newPurchaseOrders.add-edit', compact('customers', 'newInvoiceNumber'));
    }
}
