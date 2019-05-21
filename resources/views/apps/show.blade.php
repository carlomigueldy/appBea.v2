@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <h1>APP</h1>
        </div>
        <div class="col">
            {{-- <a href="/consolidate" class="btn btn-outline-primary float-right">Consolidate</a> --}}
            <a href="/apps" class="btn float-right">Back</a>
            <a href="#" onclick="window.print()">Print PDF</a>
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
                        <th>APP #</th>
                        <td>{{$apps->id}}</td>
                    </tr>
                    <tr>
                        <th>Cost Center</th>
                        <td>{{$apps->costcenter_name}}</td>
                    </tr>
                    <tr>
                        <th>Fund Source</th>
                        <td>{{$apps->fundsource_name}}</td>
                    </tr>
                    <tr>
                        <th>Mode of Procurement</th>
                        <td>{{$apps->mop_name}}</td>
                    </tr>
                    <tr>
                        <th>Type</th>
                        <td>{{$apps->type}}</td>
                    </tr>
                    <tr>
                        <th>Year</th>
                        <td>{{$apps->year}}</td>
                    </tr>
                    <tr>
                        <th>Remark</th>
                        <td>{{$apps->remark}}</td>
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
                    @if(count($app_details) > 0)
                        @foreach($app_details as $row)
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