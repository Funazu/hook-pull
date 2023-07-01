@foreach ($logs as $log)
<!-- Modal -->
<div class="modal fade" id="show-{{ $log->id }}ModalLong" tabindex="-1" role="dialog" aria-labelledby="show-{{ $log->id }}ModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="show-{{ $log->id }}ModalLongTitle">Payload</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <pre style="color: white">
                    {{ $log->payload }}
                </pre>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach