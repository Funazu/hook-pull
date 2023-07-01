<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Webhook</th>
                <th>Status</th>
                <th>Time</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($logs as $log)
                <tr>
                    <th>{{ $log->id }}</th>
                    <th>{{ $log->hook->name }}</th>
                    @if ($log->status == 'success')
                        <th style="color: green;">Success</th>
                    @else
                        <th style="color: red;">Error</th>
                    @endif
                    <th>{{ $log->created_at->format('d M Y - H:i:s') }}</th>
                    <th>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#show-{{ $log->id }}ModalLong">
                            <i class="fas fa-eye"></i>
                        </button>
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $logs->links() }}
    </div>
</div>