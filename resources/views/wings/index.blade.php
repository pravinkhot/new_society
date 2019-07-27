@extends('layouts.app')

@section('mainTitle', 'Wings & Blocks')

@section('content')
	<div class="card-header card-header-icon card-header-rose d-flex">
        <div class="card-icon">
            <i class="material-icons">assignment</i>
        </div>
        <h4 class="card-title ">Wings & Blocks List</h4>
        <a  data-target="#createWingModal" data-toggle="modal" data-backdrop="static" data-keyboard="false" href="#createWingModal" class="btn btn-primary btn-just-icon btn-sm ml-auto p-1" rel="tooltip" data-original-title="Create Wings">
            <i class="fa fa-plus" style="padding-right: 3px;"></i>
        </a>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead class=" text-primary">
                    <th>Society</th>
                    <th>Wing</th>
                    <th>Units</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @if($wingList->count() > 0)
                        @foreach($wingList as $wing)
                            <tr id="{{ $wing->id }}">
                                <td>{{ $wing->society->name }}</td>
                                <td>{{ $wing->name }}</td>
                                <td>0</td>
                                <td class="td-actions">
                                    <a href="{{ route('wings.edit', ['wingId' => $wing->id]) }}" rel="tooltip" class="btn btn-info" data-original-title="Edit Wing" title=""><i class="material-icons">edit</i><div class="ripple-container"></div></a>
                                    <button type="button" rel="tooltip" class="btn btn-danger singleDelete ladda-button" data-style="zoom-in" data-original-title="Delete Wing" title="">
                                      <i class="material-icons">close</i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr class="text-center">
                            <td colspan="3">{{ config('custom.noResultFoundString') }}</td>
                        </tr>
                    @endif
                </tbody>
            </table>

            {{ $wingList->links() }}
        </div>
    </div>

@include('wings.create')
@endsection

@section('customJs')
    <script type="text/javascript">
        $(document).ready(function () {
            deleteConfirmMsg = 'Are you sure you want to delete this wing?';
        });
    </script>

    <script src="{{ asset('js/custom/wings.js') }}"></script>
@endsection
