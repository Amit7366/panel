@extends('auth.dashboards.admins.app')
@section('content')
     <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3>
                     User Create</h3>
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
                      @if(Session::get('success'))
                                <div class="alert alert-success">
                                    {{Session::get('success')}}
                                </div>
                            @elseif(Session::get('error'))
                                <div class="alert alert-danger">
                                    {{Session::get('error')}}
                                </div>
                            @endif
                    <form action="{{route('admin.user.new.save')}}" method="post" class="form theme-form projectcreate">
                        @csrf
                      <div class="row">
                        <div class="col">
                          <div class="mb-3">
                            <label>User Name</label>
                            <input class="form-control" type="text" placeholder="Mr hans" name="name" required>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col">
                          <div class="mb-3">
                            <label>User Email</label>
                            <input class="form-control" type="email" placeholder="email@domain.com" name="email" required>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col">
                          <div class="mb-3">
                            <label>User Password</label>
                            <input class="form-control" type="password" placeholder="8 digit Password" name="password" required>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col">
                          <div class="text-end"><button class="btn btn-secondary me-3">Add</button></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>
@endsection
