<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Apps;
use App\PpmpItem;
use App\AppDetail;

class PpmpsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ppmps = DB::table('ppmps')
        ->join('cost_centers', 'cost_centers.id', 'ppmps.costcenter_id')
        ->join('fund_sources', 'fund_sources.id', 'ppmps.fundsource_id')
        ->join('accounts', 'accounts.id', 'ppmps.account_id')
        ->join('mops', 'mops.id', 'ppmps.mop_id')
        ->select('ppmps.*', 'cost_centers.costcenter_name', 
        'fund_sources.fundsource_name', 'accounts.account_no', 'mops.mop_name')
        ->paginate(10);
        
        return view('ppmps.index')->with('ppmps', $ppmps);
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
        // For the back-end validation :)
        $this->validate($request, [
            'ppmp_id' => 'required',
            'costcenter_id' => 'required',
            'fundsource_id' => 'required',
            'account_id' => 'required',
            'mop_id' => 'required',
            'type' => 'required',
            'year' => 'required',
            'remark' => 'required'
        ]);

        // Inserting new record in APP
        $apps = new Apps; 
        $apps->ppmp_id = $request->input('ppmp_id');
        $apps->costcenter_id = $request->input('costcenter_id');
        $apps->fundsource_id = $request->input('fundsource_id');
        $apps->account_id = $request->input('account_id');
        $apps->mop_id = $request->input('mop_id');
        $apps->type = $request->input('type');
        $apps->year = $request->input('year');
        $apps->save();

        // Fetching the last inserted ID
        $insertedId = $apps->id;

        if($insertedId > 0){
            // A placeholder for variable ppmp_id
            $ppmp_id = $request->input('ppmp_id');

            $inserts = [];
            $ppmp_items = PpmpItem::where('ppmp_id', $ppmp_id)->get();

            foreach($ppmp_items as $ppmp){
                $inserts[] = [
                    'item_id' => $ppmp->item_id,
                    'app_id' => $insertedId,
                    'quarter' => $ppmp->quarter,
                    'quantity' => $ppmp->quantity,
                    'unit_price' => $ppmp->unit_price,
                    'amount' => $ppmp->amount
                ];
            }

            DB::table('app_details')->insert($inserts);
        }else{
            return redirect('/ppmps')->with('error', ':(');
        }
        
        // DB::table('app_details')->insertUsing(['item_id, app_id, quarter, quantity, unit_price, amount'], $ppmp_items);

        return redirect('/apps')->with('success', 'A PPMP has been consolidated. You have been redirected into the APPs page.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
