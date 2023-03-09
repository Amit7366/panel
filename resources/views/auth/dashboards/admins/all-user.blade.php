@extends('auth.dashboards.admins.app')
@section('content')
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3>
                     All Users</h3>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="display" id="basic-2">
                        <thead>
                          <tr>
                              <th>Name</th>
                                    <th>Email</th>
                                    <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
 @foreach($users as $row)
                                    <tr>
                                        <td>{{$row->name}}</td>
                                        <td>{{$row->email}}</td>
                                        <td><a href="{{url('admin/user/delete/'.$row->id)}}" id="delete" class="btn btn-danger btn-xs"  data-original-title="btn btn-danger btn-xs" title="" data-bs-original-title="">Delete</a></td>

                                    </tr>
                                @endforeach
                        
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>
@endsection
