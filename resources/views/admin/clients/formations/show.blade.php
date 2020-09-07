@extends('layouts.master')

@section('title', 'Formations | performer')

@section('panel')
<div class="panel-header panel-header-sm">
</div>
@endsection

@section('content')
<div class="card card-blog">
    <div class="card-header">
        <div class="d-flex" style="justify-content: space-between">
            <h3 class="card-title">
                {{ $formation->f_title }}
            </h3>
            <a href="{{ route('formations') }}" class="btn float-right"><i class="now-ui-icons arrows-1_minimal-left"></i> Retour</a>
        </div>
    </div>
    <div class="card-image">
      <img class="img rounded" src="/storage/cover_images/{{ $formation->f_cover }}">
    </div>
    <div class="card-body">
      <h6 class="category text-warning">
        <i class="now-ui-icons tech_watch-time"></i>
        Date de creation: {{ $formation->created_at }}
      </h6>
      <h5 class="card-title">
        <a href="#nuk">{{ $formation->f_title }}</a>
      </h5>
      <p class="card-description">
      {{ $formation->f_desc }}
      </p>
      <a href="{{ route('edit-formation', $formation->id) }}" class="btn btn-primary">Editer cette formation</a>
    </div>
  </div>
@endsection
