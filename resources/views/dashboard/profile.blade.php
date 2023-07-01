@extends('dashboard.template.main')
@section('content')
<div class="row">
    <div class="col-xl-4 col-md-12 mb-2">
        @include('dashboard.template.alert')
    </div>
    <div class="col-12">
        <div class="row">
            <div class="col-xl-4 col-md-6 mb-3">
                <div class="card shadow">
                    <div class="card-body">
                        <h4>Change Password</h4>
                        <hr>
                        <form action="{{ "/auth/account/changepassword/" . auth()->user()->id }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <strong>New Password</strong>
                                <input type="password" class="form-control" name="password" placeholder="New Password">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection