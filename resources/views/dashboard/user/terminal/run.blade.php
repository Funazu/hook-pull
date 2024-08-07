@extends('dashboard.template.main')
@section('content')
<div class="row justify-content-start">
    <div class="col-xl-4 col-md-12 mb-2">
        @include('dashboard.template.alert')
    </div>

    <div class="col-xl-12 col-md-12 mb-2">
        <div class="row">
            <div class="col-3">
                <div class="card shadow card-rounded">
                    <div class="card-body">
                        <div class="form-group">
                            <strong>Terminal Name</strong>
                            <input type="text" class="form-control" value="{{ $terminal->title }}" disabled>
                        </div>
                        <div class="form-group">
                            <strong>Webhook</strong>
                            <input type="text" class="form-control" value="{{ $terminal->hook->name }}" disabled>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card shadow card-rounded">
                    <div class="card-body">
                        <form action="/terminal-execute/{{ $terminal->id_terminal_permission }}" method="post">
                            @csrf
                            <div class="form-group">
                                <strong>Command</strong>
                                <select name="command" id="command" class="custom-select">
                                    <option value="php artisan migrate:refresh">Migrate Fresh</option>
                                    <option value="sudo npm run build">Build Vite</option>
                                    <option value="php artisan db:seed">Seeder</option>
                                    <option value="php artisan migrate">Migrate Biasa</option>
                                    <option value="git reset --hard HEAD && git pull">Git Pull</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary">Kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card shadow card-rounded">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <strong>Total Execute</strong>
                                    <input type="text" value="{{ $totalExe }}" style="background-color: rgba(0, 68, 255, 0.288)" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-4">
                                <strong>Total Success</strong>
                                <input type="text" value="{{ $totalSuccessExe }}" style="background-color: green;" class="form-control" disabled>
                            </div>
                            <div class="col-4">
                                <strong>Total Error</strong>
                                <input type="text" value="{{ $totalErrorExe }}" style="background-color: red;" class="form-control" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-12 col-md-12 mb-2">
        <div class="card shadow card-rounded">
            <div class="card-body">
                @include('dashboard.user.terminal.history')
            </div>
        </div>
    </div>
</div>

@include('dashboard.user.terminal.modal')
@endsection