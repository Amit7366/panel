@extends('auth.dashboards.users.app')
@section('content')
        <div class="page-body"> 
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3>
                     User Dashboard</h3>
                </div>

              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid crypto-dash">
            <div class="row">
              <div class="col-xl-4 col-md-6 dash-lg-50">
                <div class="card crypto-chart overflow-hidden">
                  <div class="card-header card-no-border"> 
                    <div class="media"> 
                      <div class="media-body">
                        <h5 class="font-primary">Information</h5>
                      </div>
                      <div class="media-end">
                        <h6>{{$emails}}</h6>
                      </div>
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <div class="crypto-dashborad-chart">
                      <div id="bitcoin-chart"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-2 col-md-6 dash-lg-50">
                <div class="card crypto-chart overflow-hidden">
                  <div class="card-header card-no-border"> 
                    <div class="media"> 
                      <div class="media-body">
                        <h5 class="font-primary">Mobile</h5>
                      </div>
                      <div class="media-end">
                        <h6>{{$mobile}}</h6>
                      </div>
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <div class="crypto-dashborad-chart">
                      <div id="bitcoin-chart"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-2 col-md-6 dash-lg-50">
                <div class="card crypto-chart overflow-hidden">
                  <div class="card-header card-no-border"> 
                    <div class="media"> 
                      <div class="media-body">
                        <h5 class="font-primary">Tablet</h5>
                      </div>
                      <div class="media-end">
                        <h6>{{$tablet}}</h6>
                      </div>
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <div class="crypto-dashborad-chart">
                      <div id="bitcoin-chart"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-2 col-md-6 dash-lg-50">
                <div class="card crypto-chart overflow-hidden">
                  <div class="card-header card-no-border"> 
                    <div class="media"> 
                      <div class="media-body">
                        <h5 class="font-primary">Desktop</h5>
                      </div>
                      <div class="media-end">
                        <h6>{{$desktop}}</h6>
                      </div>
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <div class="crypto-dashborad-chart">
                      <div id="bitcoin-chart"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-2 col-md-6 dash-lg-50">
                <div class="card crypto-chart overflow-hidden">
                  <div class="card-header card-no-border"> 
                    <div class="media"> 
                      <div class="media-body">
                        <h5 class="font-primary">All Click</h5>
                      </div>
                      <div class="media-end">
                        <h6>{{$tablet+$desktop+$mobile}}</h6>
                      </div>
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <div class="crypto-dashborad-chart">
                      <div id="bitcoin-chart"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-12 dash-xl-100">
                <div class="card candlestick-chart">     
                 <div class="card-header pb-0">
                    <h5>All Websites </h5>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="display" id="basic-2">
                        <thead>
                          <tr>
                            <th>ID</th>
                                    <th>Website Name</th>
                                    <th>Wesite Url</th>
                                    <th>Mobile</th>
                                    <th>Tablet</th>
                                    <th>Desktop</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($websites as $data)
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$data->domain}}</td>
                                        <td>{{'https://trysl.xyz/'.$data->path.'/'.$data->subdomain}}</td>
                                        <td>{{$data->mobile}}</td>
                                        <td>{{$data->tablet}}</td>
                                        <td>{{$data->desktop}}</td>
                                    </tr>
                                @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Container-fluid Ends-->
          </div>
        </div>
@endsection