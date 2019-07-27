@extends('layouts.app')

@section('mainTitle', 'Wings')

@section('content')
    <div class="card-header card-header-icon card-header-rose">
        <div class="card-icon">
            <i class="material-icons">edit</i>
        </div>
        <h4 class="card-title">Edit Wing</h4>
    </div>
    
    <input type="hidden" name="wingId" id="wingId" value="{{ $wingDetail->id }}">
    <form method="#" action="#" id="editWingForm" class="editWingForm">
        @method('PUT')
        <div class="card-body">
            <div class="row">
                <label class="col-12 col-sm-2 col-md-2 col-lg-2 col-form-label">Name <span class="text-danger">*</span></label>
                <div class="col-12 col-sm-8 col-md-8 col-lg-8">
                    <div class="form-group">
                        <input type="text" class="form-control" id="name" name="name" value="{{ $wingDetail->name }}">
                    </div>
                </div>
            </div>

            <div class="row">
                <label class="col-12 col-sm-2 col-md-2 col-lg-2 col-form-label">Description</label>
                <div class="col-12 col-sm-8 col-md-8 col-lg-8">
                    <div class="form-group">
                        <textarea class="form-control" id="description" name="description" rows="3">{{ $wingDetail->description }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer justify-content-center">
            <a href="{{ route('wings.index') }}" class="btn">Cancel</a>
            <button type="submit" class="btn btn-primary ladda-button" data-style="zoom-in">
                Submit
                <div class="ripple-container"></div>
            </button>
        </div>
    </form>
@endsection

@section('customJs')
    <script src="{{ asset('js/custom/wings.js') }}"></script>
@endsection