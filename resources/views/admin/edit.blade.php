@extends('layouts.master')

@section('title', 'Registered roles')

@section('panel')
<div class="panel-header panel-header-sm">
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-8">
    <div class="card">
        <div class="card-header">
        <h5 class="title">Edit User role {{ $userToEdit->name }}</h5>
        </div>
        <div class="card-body">
        <form action="{{ route('editOne', $userToEdit->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
            <div class="col-md-3 px-1">
                <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="name" name="name" value="{{ $userToEdit->name }}">
                </div>
            </div>
            <div class="col-md-4 pl-1">
                <div class="form-group">
                <label for="exampleInputEmail1">Phone</label>
                <input type="tel" class="form-control" placeholder="Phone" name="phone" value="{{ $userToEdit->phone }}">
                </div>
            </div>
            <div class="col-md-4 pl-1">
                <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" readonly placeholder="Email" name="email" value="{{ $userToEdit->email }}">
                </div>
            </div>
            </div>
            <div class="row">
                <div class="col-md-6 pr-1">
                    <div class="form-group">
                    <label>Give role</label>
                    <select name="usertype" class="form-control">
                        <option value="admin">Admin</option>
                        <option value="standard">Standard</option>
                    </select>
                    </div>
                </div>
            </div>
            <div class="row">
            </div>
            <div class="row">
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </form>
        </div>
    </div>
    </div>
    <div class="col-md-4">
    <div class="card card-user">
        <div class="image">
        <img src="../assets/img/bg5.jpg" alt="...">
        </div>
        <div class="card-body">
        <div class="author">
            <a href="#">
            <img class="avatar border-gray" src="../assets/img/mike.jpg" alt="...">
            <h5 class="title">{{ $userToEdit->name }}</h5>
            </a>
            <p class="description">
                {{ $userToEdit->usertype }}
            </p>
        </div>
        <p class="description text-center">
            "Lamborghini Mercy <br>
            Your chick she so thirsty <br>
            I'm in that two seat Lambo"
        </p>
        </div>
        <hr>
        <div class="button-container">
        <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
            <i class="fab fa-facebook-f"></i>
        </button>
        <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
            <i class="fab fa-twitter"></i>
        </button>
        <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
            <i class="fab fa-google-plus-g"></i>
        </button>
        </div>
    </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection
