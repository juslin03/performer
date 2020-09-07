@extends('layouts.master')

@section('title', 'Services | performer')

@section('panel')
<div class="panel-header panel-header-sm">
</div>
@endsection

@section('content')

    <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Service category
                    <a href="{{ route('new-category') }}" class="btn btn-primary float-right">ADD</a>
                </h4>
              </div>


              <div class="card-body">
               @if ($serviceCount >=1)

               <div class="table-responsive">
                <table class="table" id="serviceCategoriesDataTable">
                  <thead class="text-primary">
                    <th>
                      id
                    </th>
                    <th>
                      Category name
                    </th>

                    <th>
                        Category Description
                    </th>
                    <th>
                        Category status
                    </th>
                    <th>
                      EDIT
                    </th>
                    <th>
                      DELETE
                    </th>
                  </thead>
                  <tbody>
                      @foreach ($services as $service)
                      <tr>
                          <input type="hidden" class="servicedelete_val" value="{{ $service->id }}">
                          <td>
                            {{ $service->id }}
                          </td>

                          <td>
                            {{ $service->service_name }}
                          </td>
                          <td>
                            {{ $service->service_description }}
                          </td>
                          <td>
                            {{ $service->status }}
                          </td>
                          <td>
                              <a href="{{ route('service-to-edit', $service->id) }}" class="btn btn-success">EDIT</a>
                            </td>
                            <td>
                              <button type="button" class="btn btn-danger servicedeletebtn">DELETE</button>
                            </td>
                        </tr>
                      @endforeach
                  </tbody>
                </table>
              </div>
              @else
              <div class="alert alert-primary">
                  No category found.
              </div>
               @endif
              </div>
            </div>
          </div>
    </div>
@endsection

@section('scripts')
<script>
    $(document).ready( function () {
        $('#serviceCategoriesDataTable').DataTable();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })

        $('.servicedeletebtn').click(function (e) {
            e.preventDefault();

            var delete_id = $(this).closest('tr').find('.servicedelete_val').val();
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
                        url: '/remove-service-category/' + delete_id,
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

