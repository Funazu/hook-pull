@extends('dashboard.template.main')
@section('content')
<div class="row justify-content-start">
    <div class="col-xl-4 col-md-12 mb-2">
        @include('dashboard.template.alert')
    </div>

    <div class="col-12 mb-2">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
            Create
        </button>
    </div>

    <div class="col-xl-12 col-md-12 mb-2">
        <div class="card shadow">
            <div class="card-body">
                @include('dashboard.status.table')
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready( function () {
    $('#myTableCustom').DataTable({
      responsive: true,
      columnDefs: [{ width: '5%', targets: 0 }, { width: '10%', targets: -1 }]
    });
});
</script>

@include('dashboard.status.modal')
@endsection