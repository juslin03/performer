@extends('layouts.master')

@section('title', 'Edit Service List')

@section('panel')
<div class="panel-header panel-header-sm">
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
    <div class="card">
        <div class="card-header">
        <h5 class="title">Edit | {{ $service_list_to_edit->service_category->service_name }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('update-service-list', $service_list_to_edit->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Service category</label>
                        <select name="service_category_id" class="form-control" id="" required>
                            <option value="{{ $service_list_to_edit->service_category_id }}">{{$service_list_to_edit->service_category->service_name}}</option>
                            @foreach ($service_cats as $service_cat)
                                <option value="{{ $service_cat->id }}">{{ $service_cat->service_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="title">Service list name</label>
                        <input type="text" id="title" name="title" value="{{ $service_list_to_edit->title }}" placeholder="enter title / service name" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="price">Service list price</label>
                        <input type="number" id="price" name="price" value="{{ $service_list_to_edit->price }}" placeholder="enter price" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="duration">Service list duration</label>
                        <input type="text" id="duration" name="duration" value="{{ $service_list_to_edit->duration }}" placeholder="enter duration" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="description">Service list description</label>
                        <textarea type="text" id="description" name="description" placeholder="enter description or service name" class="form-control">
                        {{ $service_list_to_edit->description }}
                        </textarea>
                    </div>
                </div>
                <div class="modal-footer">
                  <a href="{{ route('services-list') }}" class="btn btn-secondary" data-dismiss="modal">Close</a>
                  <button type="submit" class="btn btn-primary">Update now</button>
                </div>
            </form>
        </div>
    </div>
    </div>
</div>
@endsection
