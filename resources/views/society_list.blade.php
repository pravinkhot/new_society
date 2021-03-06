@extends('layouts.app')

@section('mainTitle', 'Society')

@section('content')
    <div class="row">
        <div class="col s12">
            <div id="borderless-table" class="card card-tabs">
                <div class="card-content">
                    <div class="card-title">
                        <div class="row">
                            <div class="col s12 m6 l10">
                                <h4 class="card-title">Society List</h4>
                            </div>
                        </div>
                    </div>
                    <div id="view-borderless-table">
                        <div class="row">
                            <div class="col s12">
                                <table>
                                    <?php
                                        $theadList = [
                                            'Name', 'Role', 'No of Units','Active Members','Premium Subscription','Expiry Date'
                                        ];
                                    ?>
                                    <thead>
                                        <tr>
                                            @foreach($theadList as $thead)
                                                <th>{{ $thead }}</th>
                                            @endforeach
                                            <!-- <th>Action</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(!empty($societyList))
                                            @foreach($societyList as $society)
                                                <tr>
                                                    <td><a href="{{ route('setSociety', ['societyId' => $society->society_id, 'roleId' => $society->role_id]) }}">{{ $society->getSocietyDetails->name }}</a></td>
                                                    <td>{{ $society->getRoleDetails->name }}</td>
                                                    <td>10</td>
                                                    <td>10</td>
                                                    <td>OFF</td>
                                                    <td>12/07/2019</td>
                                                    <!-- <td class="td-actions">
                                                        <a href="#" rel="tooltip" class="btn btn-success" data-original-title="Edit Society" title=""><i class="material-icons">edit</i><div class="ripple-container"></div></a>
                                                    </td> -->
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="{{ collect($theadList)->count()+1 }}" class="center-align">{{ config('custom.noResultFoundString') }}</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('customJs')
    <script type="text/javascript">
    </script>
@endsection