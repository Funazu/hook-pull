<div class="table-responsive">
    <table class="table table-bordered table-hover">
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
            @foreach ($histories as $history)
                <tr>
                    <td>{{ $history->id }}</td>
                    <td>{{ $history->terminalpermission->hook->name }}</td>
                    @if ($history->status == 'success')
                        <td style="color: green;">Success</td>
                    @else
                        <td style="color: red;">Error</td>
                    @endif
                    <td>{{ $history->created_at->diffForHumans() }}</td>
                    <td>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#show-{{ $history->id }}ModalLong">
                            <i class="fas fa-eye"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $histories->links() }}
    </div>
</div>