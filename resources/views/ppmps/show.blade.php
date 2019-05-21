@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <h1>PPMP</h1>
        </div>
        <div class="col">
            {{-- <a href="/consolidate" class="btn btn-outline-primary float-right">Consolidate</a> --}}
            <a href="/ppmps" class="btn float-right">Back</a>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-5">
            <table class="table table-bordered table-sm">
                <thead align="center" class="thead thead-dark">
                    <th colspan="2">Information</th>
                </thead>
                <tbody>
                    <tr>
                        <th>PPMP #</th>
                        <td>{{$ppmps->id}}</td>
                    </tr>
                    <tr>
                        <th>Cost Center</th>
                        <td>{{$ppmps->costcenter_name}}</td>
                    </tr>
                    <tr>
                        <th>Fund Source</th>
                        <td>{{$ppmps->fundsource_name}}</td>
                    </tr>
                    <tr>
                        <th>Mode of Procurement</th>
                        <td>{{$ppmps->mop_name}}</td>
                    </tr>
                    <tr>
                        <th>Type</th>
                        <td>{{$ppmps->type}}</td>
                    </tr>
                    <tr>
                        <th>Year</th>
                        <td>{{$ppmps->year}}</td>
                    </tr>
                    <tr>
                        <th>Remark</th>
                        <td>{{$ppmps->remark}}</td>
                    </tr>  
                </tbody>
            </table>
        </div>
        <div class="col">
            <table class="table table-bordered table-sm table-hover">
                <thead align="center" class="thead thead-dark">
                    <th colspan="5">Items</th>
                </thead>
                <thead align="center">
                    <th>Description</th>
                    <th>Quarter</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Amount</th>
                </thead>
                <tbody align="center">
                    @if(count($ppmp_items) > 0)
                        @foreach($ppmp_items as $row)
                            <tr>
                                <td>{{$row->description}}</td>
                                <td>{{$row->quarter}}</td>
                                <td>{{$row->quantity}}</td>
                                <td>Php {{$row->unit_price}}</td>
                                <td>Php {{$row->amount}}</td>
                            </tr>
                        @endforeach
                    @else 
                    
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection