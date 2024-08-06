@foreach ($histories as $history)
<!-- Modal -->
<div class="modal fade" id="show-{{ $history->id }}ModalLong" tabindex="-1" role="dialog" aria-labelledby="show-{{ $history->id }}ModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="show-{{ $history->id }}ModalLongTitle"> 
                @if ($history->status == 'success')
                    <strong style="color: green;">Success</strong>
                @else
                    <strong style="color: red;">Error</strong>
                @endif - {{ $history->terminalpermission->hook->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <strong>Commands:</strong>
                    <textarea rows="5" class="form-control" disabled>{{ $history->command }}</textarea>
                </div>
                <div class="form-group">
                    <strong>DateTime</strong>
                    <input type="text" value="{{ $history->created_at->format('d M Y - H:i:s') }}" class="form-control" disabled>
                </div>
                <div class="form-group">
                    <strong>Payload:</strong>
                    <pre style="color: rgb(17, 212, 17); background-color: black;">
                        {{ $history->payload }}
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