@extends('layouts.master')

@section('title', 'Registered roles')

@section('panel')
<div class="panel-header panel-header-sm">
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            <h5 class="title">Create new category
                <a href="{{ route('service-category') }}" class="btn btn-primary float-right"><i class="now-ui-icons arrows-1_minimal-left"></i> BACK</a>
            </h5>
            </div>
            <div class="card-body">
            <form action="{{ route('add-category') }}" method="POST">
                @csrf
                <div class="row ml-1">
                    <div class="col-md-12 pr-1">
                        <div class="form-group">
                        <label>Category name</label>
                        <input type="text" class="form-control" placeholder="Enter your service category name" name="service_name">
                        </div>
                    </div>
                    <div class="col-md-12 pr-1">
                        <div class="form-group">
                            <label for="description">Category description</label>
                            <textarea class="form-control" id="description" placeholder="your service category description" name="service_description"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row ml-1">
                    <button type="submit" class="btn btn-success">Add category</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection
