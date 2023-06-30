@extends('dashboard.template.main')
@section('content')
<div class="row justify-content-center">
    <div class="col-xl-3 col-md-6 mb-3">
        <div class="small-box bg-gradient-primary">
            <div class="inner">
                <h3>{{ $hook->count() }}</h3>
                <p>Webhook</p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-3">
        <div class="small-box bg-gradient-success">
            <div class="inner">
                <h3>{{ $success->count() }}</h3>
                <p>Success</p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-3">
        <div class="small-box bg-gradient-danger">
            <div class="inner">
                <h3>{{ $success->count() }}</h3>
                <p>Error</p>
            </div>
        </div>
    </div>
</div>
@endsection