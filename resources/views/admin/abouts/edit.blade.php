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
        <h5 class="title">Edit About {{ $about->title }}</h5>
        </div>
        <div class="card-body">
            @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif
        <form action="{{ route('editAboutUsOne', $about->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row ml-1">
                <div class="col-md-4 pr-1">
                    <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" placeholder="name" name="title" value="{{ $about->title }}">
                    </div>
                </div>
                <div class="col-md-4 pr-1">
                    <div class="form-group">
                    <label for="exampleInputEmail1">Subtitle</label>
                    <input type="tel" class="form-control" placeholder="Phone" name="subtitle" value="{{ $about->subtitle }}">
                    </div>
                </div>
            </div>
            <div class="row ml-1">
                <div class="col-md-8 pr-1">
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" placeholder="your description" name="description">{{ $about->description }}</textarea>
                    </div>
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
