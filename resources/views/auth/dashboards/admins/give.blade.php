@extends('auth.dashboards.admins.app')
@section('content')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form theme-form">
                            @if(Session::get('success'))
                                <div class="alert alert-success">
                                    {{Session::get('success')}}
                                </div>
                            @elseif(Session::get('error'))
                                <div class="alert alert-danger">
                                    {{Session::get('error')}}
                                </div>
                            @endif
                            <form action="{{route('admin.assignlink')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label>Name</label>
                                            <input class="form-control" type="text" placeholder="John Doe" name="name" readonly value="{{$user->name}}">
                                            <input class="form-control" type="hidden" placeholder="John Doe" name="id" value="{{$user->id}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label>Select Link</label>

                                            <select class="form-select" name="link">
                                                @foreach($domains as $domain)
                                                <option value="{{$domain->id}}">
                                                    @if($domain->domain == 'skip')
                                                    https://skipthegaemsa.com/{{  'auth/login/'.$domain->subdomain}}
                                                    @else
                                                     https://meagapersonaels.com/{{  'auth/login/'.$domain->subdomain}}
                                                    
                                                    @endif</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="text-end"><button class="btn btn-success me-3" type="submit">Give Link</button><a class="btn btn-danger" href="{{route('admin.dashboard')}}">Cancel</a></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection
