<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AppsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apps = DB::table('apps')
        ->join('cost_centers', 'cost_centers.id', 'apps.costcenter_id')
        ->join('fund_sources', 'fund_sources.id', 'apps.fundsource_id')
        ->join('accounts', 'accounts.id', 'apps.account_id')
        ->join('mops', 'mops.id', 'apps.mop_id')
        ->get();

        return view('apps.index')->with('apps', $apps);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $apps = DB::table('apps')
        ->join('cost_centers', 'cost_centers.id', 'apps.costcenter_id')
        ->join('fund_sources', 'fund_sources.id', 'apps.fundsource_id')
        ->join('accounts', 'accounts.id', 'apps.account_id')
        ->join('mops', 'mops.id', 'apps.mop_id')
        ->select('apps.id', 'apps.type', 'apps.year', 'apps.remark', 'cost_centers.costcenter_name', 
        'fund_sources.fundsource_name', 'accounts.account_no', 'mops.mop_name')
        ->where('apps.id', $id)
        ->first();

        $app_details = DB::table('app_details')
        ->join('items', 'items.id', 'app_details.item_id')
        ->select(
            'items.description',
            'app_details.app_id',
            'app_details.quarter',
            'app_details.quantity',
            'app_details.unit_price',
            'app_details.amount'
            )
        ->where('app_details.app_id', $id)
        ->get();

        return view('apps.show')->with('apps', $apps)->with('app_details', $app_details);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
