<div class="table-responsive">
    <table class="table table-bordered" id="myTableCustom">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Webhook</th>
                <th>User</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($terminalpermiss as $terminal)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $terminal->title }}</td>
                    <td>{{ $terminal->hook->name }}</td>
                    <td>{{ $terminal->user->username }}</td>
                    <td>
                        <form action="/dashboard/terminal-permission/delete/{{ $terminal->id_terminal_permission }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger mb-1" onclick="return confirm('Are you sure you want to delete')"><i class="fas fa-trash"></i></button>
                            {{-- <a href="{{ "/status/" . $status->id_status }}" target="_blank" class="btn btn-success mb-1"><i class="fas fa-eye"></i></a> --}}
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>