@foreach ($logs as $log)
<!-- Modal -->
<div class="modal fade" id="show-{{ $log->id }}ModalLong" tabindex="-1" role="dialog" aria-labelledby="show-{{ $log->id }}ModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="show-{{ $log->id }}ModalLongTitle"> 
                @if ($log->status == 'success')
                    <strong style="color: green;">Success</strong>
                @else
                    <strong style="color: red;">Error</strong>
                @endif - {{ $log->hook->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <strong>Message</strong>
                    <input type="text" value="{{ $log->meta['message'] ?? "" }}" class="form-control" disabled>
                </div>
                <div class="form-group">
                    <strong>Commands:</strong>
                    <textarea rows="5" class="form-control" disabled>{{ $log->meta['commands'] ?? "" }}</textarea>
                </div>
                <div class="form-group">
                    <strong>DateTime</strong>
                    <input type="text" value="{{ $log->created_at->format('d M Y - H:i:s') }}" class="form-control" disabled>
                </div>
                <div class="form-group">
                    <strong>Payload:</strong>
                    <pre style="color: rgb(17, 212, 17); background-color: black;">
                        {{ $log->payload }}
                    </pre>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach