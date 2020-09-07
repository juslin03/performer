@extends('layouts.master')

@section('title', 'Modification de la event')

@section('panel')
<div class="panel-header panel-header-sm">
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card p-5">
            <div class="d-flex" style="justify-content: space-between">
                <h5 class="card-title">
                    Modification de la event: <strong>{{ $event->f_title }}</strong>
                </h5>
                <a href="{{ route('all-events') }}" class="btn float-right"><i class="now-ui-icons arrows-1_minimal-left"></i> Retour</a>
            </div>
            <div class="card-body">
            <form action="{{ route('edit-one-event', $event->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <div class="row ml-1">
                    <div class="col-md-12 pr-1">
                        <div class="form-group">
                        <label>Titre de l'evenement</label>
                        <input type="text" class="form-control" placeholder="Entrer le titre de la event" value="{{ $event->e_title }}" name="e_title">
                        </div>
                    </div>
                    <div class="col-md-12 pr-1">
                        <div class="form-group">
                        <label>Date de l'evenement</label>
                        <input type="text" class="form-control" placeholder="Entrer le titre de la event" value="{{ $event->e_date }}" name="e_date">
                        </div>
                    </div>
                    <div class="col-md-12 pr-1">
                        <div class="form-group">
                        <label>Lieu de l'evenement</label>
                        <input type="text" class="form-control" placeholder="Entrer le titre de la event" value="{{ $event->e_place }}" name="e_place">
                        </div>
                    </div>
                    <div class="col-md-12 pr-1">
                        <div class="form-group">
                            <label>Description de l'evenement</label>
                            <textarea class="form-control" placeholder="Entrer une description du menu" name="e_desc">{{ $event->e_desc }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-12 pr-1">
                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                            <div class="fileinput-new thumbnail img-raised">
                             <img src="/storage/cover_images/{{ $event->e_img }}" alt="{{ $event->e_title }}">
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail img-raised"></div>
                            <div>
                             <span class="btn btn-raised btn-round btn-default btn-file">
                                <span class="fileinput-new">Choisir une autre image</span>
                                <span class="fileinput-exists">| changer</span>
                                <input type="file" name="e_img" />
                             </span>
                                 <a href="" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput">
                                 <i class="fa fa-times"></i> Effacer</a>
                            </div>
                         </div>
                    </div>
                </div>
                <div class="row ml-1">
                    <button type="submit" class="btn btn-success"><i class="now-ui-icons ui-1_check"></i> Valider</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection
