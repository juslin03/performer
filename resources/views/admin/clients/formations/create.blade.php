@extends('layouts.master')

@section('title', 'Nouvelle formation')

@section('panel')
<div class="panel-header panel-header-sm">
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            <h5 class="title">Nouvelle formation
                <a href="{{ route('formations') }}" class="btn btn-primary float-right"><i class="now-ui-icons arrows-1_minimal-left"></i> Retour</a>
            </h5>
            </div>
            <div class="card-body">
            <form action="{{ route('add-formation') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <div class="row ml-1">
                    <div class="col-md-12 pr-1">
                        <div class="form-group">
                        <label>Titre de la formation</label>
                        <input type="text" class="form-control" placeholder="Entrer le titre de la formation" required name="f_title">
                        </div>
                    </div>
                    <div class="col-md-12 pr-1">
                        <div class="form-group">
                            <label>Description de la formations</label>
                            <textarea required class="form-control" placeholder="Entrer une description du menu" name="f_desc"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12 pr-1">
                        <div class="custom-file">
                            <label class="custom-file-label">Image de couverture</label>
                            <input lang="fr" type="file" class="custom-file-input" name="f_cover" required>
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
