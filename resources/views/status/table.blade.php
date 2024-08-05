<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Webhook</th>
                <th>Message</th>
                <th>Status</th>
                <th>Time</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($logs as $log)
                <tr>
                    <td>{{ $log->id }}</td>
                    <td>{{ $log->hook->name }}</td>
                    <td>{{ $log->meta['message'] ?? "" }}</td>
                    @if ($log->status == 'success')
                        <td style="color: green;">Success</td>
                    @else
                        <td style="color: red;">Error</td>
                    @endif
                    <td>{{ $log->created_at->diffForHumans() }}</td>
                    <td>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#show-{{ $log->id }}ModalLong">
                            <i class="fas fa-eye"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $logs->links() }}
    </div>
</div>