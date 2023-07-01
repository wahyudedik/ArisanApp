@extends('admin.layout')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- GROUP CHAT LIST -->
            <div class="card card-primary card-outline">
                @if ($member->status === 'true')
                    <div class="card-header">
                        <h3 class="card-title">Groups Arisan</h3>
                        <div class="card-tools ml-auto">
                            <a href="{{ route('admin.groupsAdd') }}" class="btn btn-tool">
                                <i class="fas fa-plus fa-lg"></i>
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <ul class="list-group">
                            @foreach ($groups as $group)
                                <li class="list-group-item" style="border: none;">
                                    <div class="d-flex justify-content-between align-items-center"
                                        style="border-bottom: 1px solid rgb(139, 139, 139);">
                                        <div>
                                            <a href="{{ route('groups.chat') }}">
                                                <h5 class="mb-0">{{ $group->name }}</h5>
                                            </a>
                                            <small>Last Message: Hello everyone!</small>
                                        </div>
                                        <span class="badge bg-primary">3</span>

                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- /.card-body -->
                @else
                    <div class="card-header">
                        <h3 class="card-title">Lengkapi Profile dan Aktifkan Akun</h3>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('admin.profile') }}" class="btn btn-primary">Profile</a>
                    </div>
                @endif
            </div>
            <!--/.card -->
        </div>
        <!-- /.col -->
    </div>
@endsection
