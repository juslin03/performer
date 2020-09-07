@extends('layouts.master')

@section('title', 'Formations | performer')

@section('panel')
<div class="panel-header panel-header-sm">
</div>
@endsection

@section('content')

    <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Listes des formations
                    <a href="{{ route('new-formation') }}" class="btn btn-primary float-right">CREER UNE FORMATION</a>
                </h4>
              </div>

              <div class="card-body">
               <div class="table-responsive">
                <table class="table" id="menuCategoriesDataTable">
                  <thead class="text-primary">
                    <th>id</th>
                    <th>Titre</th>
                    <th>Photo</th>
                    <th>Details</th>
                    <th>MODIFIER</th>
                    <th>SUPPRIMER</th>
                  </thead>
                  <tbody>
                        @foreach ($formations as $formation)
                            <tr>
                                <input type="hidden" class="menudelete_val" value="{{ $formation->id }}">
                                <td>{{ $formation->id }}</td>
                                <td>{{ $formation->f_title }}</td>
                                <td>
                                    <a href="/storage/cover_images/{{ $formation->f_cover }}">
                                        <img width="100px" src="/storage/cover_images/{{ $formation->f_cover }}" alt="{{ $formation->f_cover }}">
                                    </a>
                                    </td>
                                <td>
                                    <a href="{{ route('see-formation', $formation->id) }}" class="btn btn-info">Voir</a>
                                </td>
                                <td>
                                    <a href="{{ route('edit-formation', $formation->id) }}" class="btn btn-success">MODIFIER</a>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger menudeletebtn">SUPPRIMER</button>
                                </td>
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
<script>
    $(document).ready( function () {
        $('#menuCategoriesDataTable').DataTable();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })

        $('.menudeletebtn').click(function (e) {
            e.preventDefault();

            var delete_id = $(this).closest('tr').find('.menudelete_val').val();
            // alert(delete_id);
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this data!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {

                    var data = {
                        "_token": $('input[name=_token]').val(),
                        "id": delete_id
                    }
                    $.ajax({
                        type: "DELETE",
                        url: '/admin/remove-formation/' + delete_id,
                        data: data,
                        success: function (response) {
                            swal(response.status, {
                                icon: "success",
                            }).then(()=> {
                                location.reload(true);
                            });
                        }
                    });
                }
                // else {
                //     swal("Your imaginary file is safe!");
                // }
            });
        });
    });
</script>
@endsection

