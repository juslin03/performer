@extends('layouts.master')

@section('title', 'About us')

@section('panel')
<div class="panel-header panel-header-sm">
</div>
@endsection
@section('content')
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add About Us</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="{{ route('save-about-us') }}" method="POST">
            @csrf
            <div class="modal-body">
              <div class="form-group">
                <label for="title" class="col-form-label">Title :</label>
                <input name="title" type="text" class="form-control" id="title">
              </div>
              <div class="form-group">
                <label for="subtitle" class="col-form-label">Subtitle :</label>
                <input name="subtitle" type="text" class="form-control" id="subtitle">
              </div>
              <div class="form-group">
                <label for="description" class="col-form-label">Description :</label>
                <textarea class="form-control" name="description" id="description"></textarea>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>



    {{-- delete modal --}}
  <div class="modal fade" id="deletePopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">do you want to delete this about us? </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="delete_modal_form" method="POST">
            @csrf
            @method('DELETE')

            <div class="modal-body">
                <input type="hidden" name="" id="delete_aboutus_id">
                <span class="text-center">Are you sure you want to delete this data ? This action is irreversible.</span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-danger">YES, DELETE!</button>
            </div>
        </form>
      </div>
    </div>
  </div>
  {{-- end delete modal --}}

    <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> About us
                    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">ADD</button>
                </h4>
              </div>
              <div class="card-body">

                @if ($aboutsCount >= 1)
                <div class="table-responsive">
                  <table class="table" id="aboutUsDataTable">
                    <thead class=" text-primary">
                      <th>
                        id
                      </th>
                      <th>
                        Title
                      </th>
                      <th>
                        Subtitle
                      </th>
                      <th>
                        Description
                      </th>
                      <th>
                        EDIT
                      </th>
                      <th>
                        DELETE
                      </th>
                    </thead>
                    <tbody>
                        @foreach ($abouts as $about)
                        <tr>
                            <td>
                              {{ $about->id }}
                            </td>
                            <td>
                              {{ $about->title }}
                            </td>
                            <td>
                              {{ $about->subtitle }}
                            </td>
                            <td>
                              {{ $about->description }}
                            </td>
                            <td>
                                <a href="{{ route('about-us-value', $about->id) }}" class="btn btn-success">EDIT</a>
                              </td>
                              <td>
                                <a href="javascript:void(0);" class="btn btn-danger deletebtn">DELETE</a>
                              </td>
                          </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
                @else
                <div class="alert alert-primary">
                    No abouts found.
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
        $('#aboutUsDataTable').DataTable();

        $('#aboutUsDataTable').on('click', '.deletebtn', function() {

            $tr = $(this).closest('tr');

            var data = $tr.children('td').map(function() {
                return $(this).text();
            }).get();

            console.log(data);

            $('#delete_aboutus_id').val(data[0]);

            $('#delete_modal_form').attr('action', '/remove-about-us/'+data[0]);

            $('#deletePopup').modal('show');
        });
    });
</script>
@endsection

