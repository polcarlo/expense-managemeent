@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
            <table id="detailTable" class="table table-striped table-bordered dataTables  {{ $class ?? '' }}" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        @foreach($dt_header as $header)
                            <th>{{$header}}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
           </div>
        </div>
        <a href="#" class="btn btn-info float-right" id="btnadd" onclick="loadDetail('{{route('expense.create')}}', 'New Record'); return false;">
            <i class="mdi mdi-database-plus"></i> Add Expense
        </a>

    </div>
</div>


@endsection

@section('script')  

@include($view.'._script')


@endsection
