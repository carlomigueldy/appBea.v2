@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <h1>Annual Procurement Plan Details</h1>
        </div>
        <div class="col">
            <a href="/apps" class="btn float-right">Back</a>
        </div>
    </div>
    <hr>
    <div class="row">
        {{-- <div class="col-5">
            <h3>Information</h3>
            <table class="table table-bordered table-sm">
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
                    <tr align="center">
                        <td colspan="2">
                            <a href="#" onclick="window.print()">Export to PDF</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div> --}}
        <div class="col">
            {{-- <h3>Items</h3> --}}
            <p>Cost Center: {{$apps->costcenter_name}}
                <br>
                Type: {{$apps->type}}
                <br>
                Year: {{$apps->year}}
                <br>
                <a href="#" onclick="window.print()" >Print PDF</a>
            </p>
            <p></p>
            
            
            <table class="table table-bordered table-sm table-hover">
                <thead align="center">
                    <th>Item Name</th>
                    <th>Specification</th>
                    <th>Lot No.</th>
                    <th>Quarter</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Amount</th>
                </thead>
                <tbody>
                    @if(count($app_details) > 0)
                        @foreach($app_details as $row)
                            <tr align="center">
                                <td>{{$row->description}}</td>
                                <td>{{$row->specification}}</td>
                                {{-- <td>{{$row->lot_no}}</td> --}}
                                <td></td>
                                <td>{{$row->quarter}}</td>
                                <td>{{$row->quantity}}</td>
                                <td>Php {{$row->unit_price}}</td>
                                <td>Php {{$row->amount}}</td>
                                <input type="hidden" value="{{$grandTotal = $grandTotal + $row->amount}}">
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="6" align="right" style="font-weight: bold">Grand Total</td>
                            <td align="center" style="font-weight: bold">Php {{$grandTotal}}</td>
                        </tr>
                    @else 
                    
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection