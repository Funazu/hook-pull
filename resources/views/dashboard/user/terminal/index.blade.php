@extends('dashboard.template.main')
@section('content')
<div class="row justify-content-start">
    <div class="col-xl-4 col-md-12 mb-2">
        @include('dashboard.template.alert')
    </div>

    <div class="col-xl-12 col-md-12 mb-2">
        <div class="card shadow card-rounded">
            <div class="card-body">
                @include('dashboard.user.terminal.table')
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

@endsection