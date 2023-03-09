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
                        <form action="{{route('admin.save')}}" method="post">
                            @csrf

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label>Website name</label>
                                        <select class="form-select" name="website" required>

                                                <option value="skip">Skip</option>
                                                <option value="mega">Mega</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label>Link name</label>
                                    <input class="form-control" type="text" placeholder="Link name *" name="name" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="text-end"><button class="btn btn-success me-3" type="submit">Add Link</button><a class="btn btn-danger" href="{{route('admin.dashboard')}}">Cancel</a></div>
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
