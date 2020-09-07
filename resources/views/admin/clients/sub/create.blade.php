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
            <h5 class="title">Creer un sous menu pour {{ $menu->menu }}
                <a href="{{ route('menus') }}" class="btn btn-primary float-right"><i class="now-ui-icons arrows-1_minimal-left"></i> Retour</a>
            </h5>
            </div>
            <div class="card-body">
            <form action="{{ route('add-new-submenu', $menu->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Menu</label>
                    <input type="text" readonly class="form-control" value="{{ $menu->id }}" name="menu_id">
                    
                </div>
                <div class="row ml-1">
                    <div class="col-md-12 pr-1">
                        <div class="form-group">
                        <label>Nom du sous-menu</label>
                        <input required type="text" class="form-control" placeholder="Ajouter un sous-menu" name="submenu">
                        </div>
                    </div>
                    <div class="col-md-12 pr-1">
                        <div class="form-group">
                            <label>Description du sous-menu(optionnelle)</label>
                            <textarea class="form-control" placeholder="Entrer une description du sous-menu" name="descsubmenu"></textarea>
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
