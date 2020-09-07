@extends('layouts.master')

@section('title', 'Event | performer')

@section('panel')
<div class="panel-header panel-header-sm">
</div>
@endsection

@section('content')
<div class="card card-blog">
    <div class="card-header">
        <div class="d-flex" style="justify-content: space-between">
            <h3 class="card-title">
                {{ $event->e_title }}
            </h3>
            <a href="{{ route('all-events') }}" class="btn float-right"><i class="now-ui-icons arrows-1_minimal-left"></i> Retour</a>
        </div>
    </div>
    <div class="card-image">
      <img class="img rounded" src="/storage/cover_images/{{ $event->e_img }}">
    </div>
    <div class="card-body">
      <h6 class="category text-warning">
        <i class="now-ui-icons tech_watch-time"></i>
        Date de l'evenement: {{ $event->created_at }}
      </h6>
      <h5 class="card-title">
        <a href="#">{{ $event->e_title }}</a>
      </h5>
      <p class="card-description">
      {{ $event->e_desc }}
      </p>
      <a href="{{ route('show-event-to-edit', $event->id) }}" class="btn btn-primary">Editer cet evenement</a>
    </div>
  </div>
@endsection
