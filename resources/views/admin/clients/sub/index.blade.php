@extends('layouts.master')

@section('title', 'Menus de navigation | performer')

@section('panel')
<div class="panel-header panel-header-sm">
</div>
@endsection

@section('content')

    <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Listes des sous-menus
                    <a href="{{ route('new-menu') }}" class="btn btn-primary float-right">CREER UN MENU</a>
                </h4>
              </div>

              <div class="card-body">
               <div class="table-responsive">
                <table class="table" id="menuCategoriesDataTable">
                  <thead class="text-primary">
                    <th>id</th>
                    <th>Menu</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>MODIFIER</th>
                    <th>SUPPRIMER</th>
                  </thead>
                  <tbody>
                        @foreach ($submenus as $submenu)
                            <tr>
                                {{-- <input type="hidden" class="menudelete_val" value="1"> --}}
                                <td>{{ $submenu->id }}</td>
                                <td>{{ $submenu->submenu }}</td>
                                <td>{{ $submenu->descsubmenu }}</td>
                                <td>{{ $submenu->status }}</td>
                                <td>
                                    <a href="" class="btn btn-success">MODIFIER</a>
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
                        url: '/remove-menu-category/' + delete_id,
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

