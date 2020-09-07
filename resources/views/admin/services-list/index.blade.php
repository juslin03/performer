@extends('layouts.master')

@section('title', 'Services - List | performer')

@section('panel')
<div class="panel-header panel-header-sm">
</div>
@endsection

@section('content')
  <div class="modal fade" id="serviceListModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('new-service-list') }}" method="POST">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Service category</label>
                    <select name="service_category_id" class="form-control" id="" required>
                        <option value="">-- Select service category --</option>
                        @foreach ($service_cats as $service_cat)
                            <option value="{{ $service_cat->id }}">{{ $service_cat->service_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="title">Service list name</label>
                    <input type="text" id="title" name="title" placeholder="enter title / service name" class="form-control">
                </div>

                <div class="form-group">
                    <label for="price">Service list price</label>
                    <input type="number" id="price" name="price" placeholder="enter price" class="form-control">
                </div>

                <div class="form-group">
                    <label for="duration">Service list duration</label>
                    <input type="text" id="duration" name="duration" placeholder="enter duration" class="form-control">
                </div>

                <div class="form-group">
                    <label for="description">Service list description</label>
                    <textarea type="text" id="description" name="description" placeholder="enter description or service name" class="form-control">

                    </textarea>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Add service list</button>
            </div>
        </form>
      </div>
    </div>
  </div>

    <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Service category - List
                    <a href="" class="btn btn-primary float-right"  data-toggle="modal" data-target="#serviceListModal">ADD</a>
                </h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                 <table class="table" id="serviceCategoriesDataTable">
                   <thead class="text-primary">
                     <th>
                       id
                     </th>
                     <th>
                       Service Category
                     </th>

                     <th>
                         Name
                     </th>
                     <th>
                         Price
                     </th>
                     <th>
                       EDIT
                     </th>
                     <th>
                       DELETE
                     </th>
                   </thead>
                   <tbody>
                    @foreach ($services_list as $service_list)
                        <tr>
                            <td>{{ $service_list->id }}</td>
                            <td>{{ $service_list->service_category->service_name }}</td>
                            <td>{{ $service_list->title }}</td>
                            <td>{{ $service_list->price }}</td>
                            <td>
                            <a href="{{ route('edit-service-list', $service_list->id) }}" class="btn btn-success">EDIT</a>
                            </td>
                            <td>
                            <button type="button" class="btn btn-danger servicedeletebtn">DELETE</button>
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
