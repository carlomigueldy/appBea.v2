@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <h1>PPMPs</h1>
        </div>
    </div>
    <hr>
    <div class="row">
        <table class="table table-bordered table-sm table-hover">
            <thead align="center">
                <th>#</th>
                <th>Cost Center</th>
                <th>Fund Source</th>
                <th>Account No</th>
                <th>Mode of Procurement</th>
                <th>Type</th>
                <th>Year</th>
                <th>Remark</th>
                <th>Action</th>
            </thead>
            <tbody>
                @if(count($ppmps) > 0)
                    @foreach($ppmps as $row)
                        <form action="/consolidated" method="POST">
                            @csrf
                            <tr align="center">
                                <td>{{$row->id}}</td>
                                <input type="hidden" name="ppmp_id" value="{{$row->id}}">
                                <td>{{$row->costcenter_name}}</td>
                                <input type="hidden" name="costcenter_id" value="{{$row->costcenter_id}}">
                                <td>{{$row->fundsource_name}}</td>
                                <input type="hidden" name="fundsource_id" value="{{$row->fundsource_id}}">
                                <td>{{$row->account_no}}</td>
                                <input type="hidden" name="account_id" value="{{$row->account_id}}">
                                <td>{{$row->mop_name}}</td>
                                <input type="hidden" name="mop_id" value="{{$row->mop_id}}">
                                <td>{{$row->type}}</td>
                                <input type="hidden" name="type" value="{{$row->type}}">
                                <td>{{$row->year}}</td>
                                <input type="hidden" name="year" value="{{$row->year}}">
                                <td>{{$row->remark}}</td>
                                <input type="hidden" name="remark" value="{{$row->remark}}">
                                <td>
                                    <a href="/ppmps/{{$row->id}}" class="btn btn-outline-secondary btn-sm">View</a>
                                    <input type="submit" value="Consolidate" class="btn btn-outline-primary btn-sm">
                                </td>
                            </tr>
                        </form>
                    @endforeach
                @else 
                        <tr align="center">
                            <td colspan="9">No records found.</td>
                        </tr>
                @endif
            </tbody>
        </table>
    </div>
    {{$ppmps->links()}}
@endsection