@extends('dashboard.template.main')
@section('content')
<div class="row justify-content-center">
    <div class="col-xl-12 col-md-12 mb-2">
        <div class="card shadow">
            <div class="card-body">
                <h4>Logs Webhook</h4>
                <hr>
                @include('dashboard.log.table')
            </div>
        </div>
    </div>
</div>

@include('dashboard.log.modal')
@endsection