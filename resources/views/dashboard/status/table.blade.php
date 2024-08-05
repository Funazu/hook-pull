<div class="table-responsive">
    <table class="table table-bordered" id="myTableCustom">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Webhook</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($statuses as $status)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $status->title }}</td>
                    <td>{{ $status->hook->name }}</td>
                    <td>
                        <form action="/dashboard/public-status/delete/{{ $status->id_status }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger mb-1" onclick="return confirm('Are you sure you want to delete')"><i class="fas fa-trash"></i></button>
                            <a href="{{ "/status/" . $status->id_status }}" target="_blank" class="btn btn-success mb-1"><i class="fas fa-eye"></i></a>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>