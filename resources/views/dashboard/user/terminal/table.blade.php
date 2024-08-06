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
            @foreach ($terminals as $terminal)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $terminal->title }}</td>
                    <td>{{ $terminal->hook->name }}</td>
                    <td>
                        <a href="{{ "/dashboard/terminal/" . $terminal->id_terminal_permission }}" class="btn btn-success mb-1"><i class="fas fa-eye"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>