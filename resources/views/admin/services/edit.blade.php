@extends('layouts.master')

@section('title', 'Edit About')

@section('panel')
<div class="panel-header panel-header-sm">
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
    <div class="card">
        <div class="card-header">
        <h5 class="title">Edit About {{ $service->title }}</h5>
        </div>
        <div class="card-body">
        <form action="{{ route('editServiceCategoryOne', $service->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row ml-1">
                <div class="col-md-4 pr-1">
                    <div class="form-group">
                    <label>Category name</label>
                    <input type="text" class="form-control" placeholder="name" name="service_name" value="{{ $service->service_name }}">
                    </div>
                </div>
            </div>
            <div class="row ml-1">
                <div class="col-md-8 pr-1">
                    <div class="form-group">
                        <label for="description">Category Description</label>
                        <textarea class="form-control" id="description" placeholder="your description" name="service_description">{{ $service->service_description }}</textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-4 pr-1">
                <div class="form-group">
                <label for="exampleInputEmail1">Category status</label>
                <input type="checkbox" class="form-control-check" @if ($service->status == 1)
                    checked
                @endif name="status" value="{{ $service->status }}">
                </div>
            </div>

            <div class="row ml-2">
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </form>
        </div>
    </div>
    </div>
</div>
@endsection
