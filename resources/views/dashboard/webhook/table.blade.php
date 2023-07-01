<div class="table-responsive">
    <table class="table table-bordered" id="myTable">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Path</th>
                <th>Commands</th>
                <th>Webhook</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($webhooks as $webhook)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $webhook->name }}</td>
                    <td>{{ $webhook->path }}</td>
                    <td>{{ $webhook->commands }}</td>
                    <td>
                        <button class="btn btn-warning mb-1" onclick="run_webhook('{{ env('APP_URL') . '/api/v1/webhook/' . $webhook->hash }}')"><i class="fas fa-play"></i></button>
                        <button type="button" onclick="link_webhook('{{ env('APP_URL') . '/api/v1/webhook/' . $webhook->hash }}')" class="btn btn-success mb-1"><i class="fas fa-copy"></i></button>
                    </td>
                    <td>
                        <form action="/dashboard/webhook/delete/{{ $webhook->id }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger mb-1" onclick="return confirm('Are you sure you want to delete')"><i class="fas fa-trash"></i></button>
                            <button type="button" class="btn btn-primary mb-1" data-toggle="modal" data-target="#edit-{{ $webhook->id }}">
                                <i class="fas fa-pen"></i>
                            </button>
                            {{-- <a href="{{ "/tamu/" . $siswa->uniqid }}" class="btn btn-success mb-1"><i class="fas fa-eye"></i></a> --}}
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>