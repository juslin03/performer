@extends('layouts.master')

@section('title', 'Registered roles')

@section('panel')
<div class="panel-header panel-header-sm">
</div>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Utilisateurs
            <a href="{{ route('formations') }}" class="btn btn-primary float-right"><i class="now-ui-icons ui-1_simple-add"></i> Nouvel utilisateur</a>
          </h4>
        </div>
        <div class="card-body">
            @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
            @endif
          <div class="table-responsive">
            <table class="table">
              <thead class=" text-primary">
                <th>
                  Nom
                </th>
                <th>
                  Telephone
                </th>
                <th>
                  Email
                </th>
                <th>
                    Role
                  </th>
                <th colspan="2" class="text-align" style="text-align: center">
                  Actions
                </th>
              </thead>
              <tbody>
                  @foreach ($users_registered as $row)
                    <tr>
                        <td>
                        {{ $row->name }}
                        </td>
                        <td>
                        {{ $row->phone }}
                        </td>
                        <td>
                        {{ $row->email }}
                        </td>
                        <td>
                            {{ $row->usertype }}
                            </td>
                        <td>
                        <a href="{{ route('edit', $row->id) }}" class="btn btn-success">MODIFIER</a>
                        </td>
                        @if ($row->usertype != 'admin')
                            <td>
                                <form action="{{ route('removeOne', $row->id) }}" id="remove-form" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">SUPPRIMER</button>
                                </form>
                            </td>
                        @endif
                    </tr>

                  @endforeach

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')

@endsection
