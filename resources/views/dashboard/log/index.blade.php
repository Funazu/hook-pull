@extends('dashboard.template.main')
@section('content')
<div class="row justify-content-center">
    <div class="col-xl-12 col-md-12 mb-2">
        <div class="card shadow">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <h4>Logs Webhook</h4>
                    </div>
                    <div class="col-6">
                        <div class="form-group float-right">
                            <form action="?webhook=" method="GET">
                                <select name="webhook" class="custom-select" onchange="this.form.submit()">
                                    <option selected>Webhook</option>
                                    <option value="">ALL</option>
                                    @foreach ($webhooks as $webhook)
                                        <option value="{{ $webhook->id }}">{{ $webhook->name }}</option>
                                    @endforeach
                                </select>
                            </form>
                        </div>
                    </div>
                </div>
                @include('dashboard.log.table')
            </div>
        </div>
    </div>
</div>

@include('dashboard.log.modal')
@endsection