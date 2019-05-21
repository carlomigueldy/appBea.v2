@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <h1>Annual Procurement Plan</h1>
            @include('inc.search')
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
                @if(count($apps) > 0)
                    @foreach($apps as $row)
                        <tr align="center">
                            <td>{{$row->id}}</td>
                            <td>{{$row->costcenter_name}}</td>
                            <td>{{$row->fundsource_name}}</td>
                            <td>{{$row->account_no}}</td>
                            <td>{{$row->mop_name}}</td>
                            <td>{{$row->type}}</td>
                            <td>{{$row->year}}</td>
                            <td>{{$row->remark}}</td>
                            <td>
                                <a href="/apps/{{$row->id}}" class="btn btn-outline-primary btn-sm">View</a>
                                {{-- <a href="#" onclick="window.print()">Print</a> --}}
                            </td>
                        </tr>
                    @endforeach
                @else 
                    <tr align="center">
                        <td colspan="9">No rows found.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
    {{$apps->links()}}
@endsection