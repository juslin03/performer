@extends('layouts.master')

@section('title', 'Nouveau menu')

@section('panel')
<div class="panel-header panel-header-sm">
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            <h5 class="title">Creer un nouveau menu
                <a href="{{ route('menus') }}" class="btn btn-primary float-right"><i class="now-ui-icons arrows-1_minimal-left"></i> Retour</a>
            </h5>
            </div>
            <div class="card-body">
            <form action="{{ route('add-menu') }}" method="POST">
                @csrf
                <div class="row ml-1">
                    <div class="col-md-12 pr-1">
                        <div class="form-group">
                        <label>Nom du menu</label>
                        <input type="text" class="form-control" placeholder="Entrer le nom du menu" name="menu" required>
                        </div>
                    </div>
                    <div class="col-md-12 pr-1">
                        <div class="form-group">
                            <label>Description du menu(optionnelle)</label>
                            <textarea class="form-control" placeholder="Entrer une description du menu" name="descmenu"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12 pr-1">
                        <div class="form-group">
                        <label><input type="checkbox" class="form-control-check" name="status">&nbsp;activer ce menu
                        </label>
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
