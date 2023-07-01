<!-- Modal Create -->
<form action="/dashboard/webhook/create" method="POST">
    @csrf
    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Create Webhook</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <strong>Name</strong>
                        <input type="text" name="name" class="form-control" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <strong>Path</strong>
                        <input type="text" name="path" class="form-control" placeholder="Path">
                    </div>
                    <div class="form-group">
                        <strong>Commands</strong>
                        <textarea name="commands" cols="30" rows="10" class="form-control" placeholder="git reset --hard HEAD && &#10;git pull &&&#10;ls"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Modal Create -->
@foreach ($webhooks as $webhook)  
<form action="/dashboard/webhook/edit/{{ $webhook->id }}" method="POST">
    @method('PUT')
    @csrf
    <div class="modal fade" id="edit-{{ $webhook->id }}" tabindex="-1" role="dialog" aria-labelledby="edit-{{ $webhook->id }}Label"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit-{{ $webhook->id }}Label">Edit Webhook</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <strong>Name</strong>
                        <input type="text" name="name" value="{{ $webhook->name }}" class="form-control" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <strong>Path</strong>
                        <input type="text" name="path" value="{{ $webhook->path }}" class="form-control" placeholder="Path">
                    </div>
                    <div class="form-group">
                        <strong>Commands</strong>
                        <textarea name="commands" cols="30" rows="10" class="form-control" placeholder="Commands">{{ $webhook->commands }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endforeach