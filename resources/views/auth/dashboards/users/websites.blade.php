@extends('auth.dashboards.users.app')
@section('content')
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3>
                     All Websites</h3>
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
                             <th>ID</th>
                                    <th>Website Name</th>
                                    <th>Wesite Url</th>
                                    <th>Wesite Click</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($websites as $data)
                                <tr>
                                    <td>{{$data->id}}</td>
                                    <td>{{$data->domain}}</td>
                                    <td>@if($data->domain == 'skip')@else https://trysl.xyz/@endif{{$data->path.'/'.$data->subdomain}}</td>
                                    <td>{{$data->click}}</td>
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
