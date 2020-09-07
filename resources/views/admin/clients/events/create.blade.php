@extends('layouts.master')

@section('title', 'Nouvel evenement')

@section('panel')
<div class="panel-header panel-header-sm">
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            <h5 class="title">Nouvel evenement
                <a href="{{ route('all-events') }}" class="btn btn-primary float-right"><i class="now-ui-icons arrows-1_minimal-left"></i> Retour</a>
            </h5>
            </div>
            <div class="card-body">
            <form action="{{ route('store-event') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <div class="row ml-1">
                    <div class="col-md-12 pr-1">
                        <div class="form-group">
                        <label>Titre de l'evenement</label>
                        <input type="text" class="form-control" placeholder="Entrer le titre de l'evenement" required name="e_title">
                        </div>
                    </div>
                    <div class="col-md-12 pr-1">
                        <div class="form-group">
                            <label>Date de l'evenement</label>
                            <input type="date" class="form-control" required name="e_date">
                        </div>
                    </div>
                    <div class="col-md-12 pr-1">
                        <div class="form-group">
                            <label>Lieu de l'evenement</label>
                            <input type="text" class="form-control" placeholder="Entrer le lieu de l'evenement" required name="e_place">
                        </div>
                    </div>
                    <div class="col-md-12 pr-1">
                        <div class="form-group">
                            <label>Description de l'evenement</label>
                            <textarea required class="form-control" placeholder="Entrer une description de cet evenement" name="e_desc"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12 pr-1">
                        <div class="custom-file">
                            <label class="custom-file-label">Image de couverture</label>
                            <input lang="fr" type="file" class="custom-file-input" name="e_img" required>
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
