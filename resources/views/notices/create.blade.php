@extends('layouts.app')

@section('mainTitle', 'Notices')

@section('customCss')
    <style type="text/css">
        #editor {
            min-height: 21cm;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col s12">
            <div id="borderless-table" class="card card-tabs">
                <div class="card-content">
                    <div class="card-title">
                        <div class="row">
                            <div class="col s12 m6 l10">
                                <h4 class="card-title">Create Notice</h4>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <form id="create_notice_form" class="col s12 create_notice_form" method="POST" action="#">
                            <div class="row">
                                <div class="input-field col l4 m4 s12">
                                    <input type="text" id="title" name="title">
                                    <label for="title">Notice Title *</label>
                                </div>
                            </div>
                            <div class="row">
                                <div id="toolbar-container"></div>
                                <div id="noticeEditor"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('customJs')
    <script src="{{ asset('vendor/editor/editor.js') }}"></script>
    <script src="{{ asset('js/custom/notices.js') }}"></script>
@endsection