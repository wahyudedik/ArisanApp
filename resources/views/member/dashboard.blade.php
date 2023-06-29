@extends('member.layout')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- GROUP CHAT LIST -->
            @if ($member->status === true)
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Group Chat List</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach ($groups as $group)
                                <a href="{{ route('member.groups.details', $group->id) }}"
                                    style="text-decoration: none; color: inherit;">
                                    <li class="list-group-item" style="border: none;">
                                        <div class="d-flex justify-content-between align-items-center"
                                            style="border-bottom: 1px solid rgb(139, 139, 139);">
                                            <div>
                                                <h5 class="mb-0">{{ $group->name }}</h5>
                                                <small>Last Message: Hello everyone!</small>
                                            </div>
                                            <span class="badge bg-primary">3</span>
                                        </div>
                                    </li>
                                </a>
                            @endforeach
                        </ul>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!--/.card -->
                @else
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Lengkapi Profile dan Aktifkan Akun</h3>
                        </div>
                        <div class="card-body">
                            <a href="{{ route('member.profile') }}" class="btn btn-primary">Profile</a>
                        </div>
                    </div>
            @endif
        </div>
        <!-- /.col -->
        {{-- Anggota --}}
        {{-- ... --}}
        {{-- Anggota --}}
    </div>
@endsection
