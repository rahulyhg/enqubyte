<?php

namespace App\Http\Controllers;

use App\Models\Incentive;
use Illuminate\Http\Request;

class IncentivesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incentives = auth()->user()->incentives;
        return view('incentives.index', compact('incentives'));
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

        if (!$newData['minimum_invoice_amt']) {
            $newData['minimum_invoice_amt'] = 0;
        }

        $incentive = auth()->user()->incentives()->create($newData);

        if($request->wantsJson())
        {
            return response([$incentive], 200);
        }
        flash('Incentive added successfully!');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Incentive  $incentive
     * @return \Illuminate\Http\Response
     */
    public function show(Incentive $incentive)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Incentive  $incentive
     * @return \Illuminate\Http\Response
     */
    public function edit(Incentive $incentive)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Incentive  $incentive
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Incentive $incentive)
    {
        $incentive->update($request->all());

        if($request->wantsJson())
        {
            return response([$incentive], 200);
        }
        flash('Incentive updated successfully!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Incentive  $incentive
     * @return \Illuminate\Http\Response
     */
    public function destroy(Incentive $incentive)
    {
        $incentive->delete();
        flash('Incentive deleted successfully!');
        return back();
    }
}