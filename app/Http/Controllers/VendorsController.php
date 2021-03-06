<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;
use App\Exports\VendorsExport;
use Maatwebsite\Excel\Facades\Excel;

class VendorsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'subscribed']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stores = auth()->user()->stores;
        $vendors = auth()->user()->vendors;

        return view('vendors.index', compact('stores', 'vendors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newData = $request->all();
        $newData['company_id'] = auth()->id();
        $vendor = auth()->user()->vendors()->create($newData);

        if($request->wantsJson())
        {
            return response($vendor, 200);
        }
        flash('Vendor added successfully!')->success();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function show(Vendor $vendor)
    {

        $purchases = $vendor->purchases;
        $purchasesCount = $purchases->count();
        $totalPurchase = $purchases->sum('grand_total');
        $remaining = $purchases->sum('remaining_amount');

        return view('vendors.show', compact('vendor', 'purchases', 'purchasesCount', 'totalPurchase', 'remaining'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function edit(Vendor $vendor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vendor $vendor)
    {
        $vendor->update($request->all());
        flash('Vendor updated successfully!')->success();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vendor $vendor)
    {
        $vendor->delete();
        flash('Vendor deleted successfully!')->error();
        return back();
    }

    public function emailIsAvailable($email)
    {
        $isAvailable = !auth()->user()->vendors()->where('email', $email)->exists();
        if ($isAvailable) {
            return response(['status'=>true], 200);
        }else{
            return response(['status'=>false], 404);
        }
    }

    public function exportToExcel()
    {
        return Excel::download(new VendorsExport, 'vendors.xlsx');
    }

    public function exportToPDF(){
         return Excel::download(new VendorsExport(), 'vendors.pdf',  \Maatwebsite\Excel\Excel::DOMPDF);
    }

    public function exportToCSV(){
         return Excel::download(new VendorsExport(), 'vendors.csv',  \Maatwebsite\Excel\Excel::CSV);
    }
}
