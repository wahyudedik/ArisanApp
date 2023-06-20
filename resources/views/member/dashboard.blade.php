@extends('member.layout')
    @section('content')
        <div class="row">
            <div class="col-md-12">
                <!-- GROUP CHAT LIST -->
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Group Chat List</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item" style="border: none;">
                                <div class="d-flex justify-content-between align-items-center"
                                    style="border-bottom: 1px solid rgb(139, 139, 139);">
                                    <div>
                                        <h5 class="mb-0">Group Chat 1</h5>
                                        <small>Last Message: Hello everyone!</small>
                                    </div>
                                    <span class="badge bg-primary">3</span>
                                </div>
                            </li>
                            <li class="list-group-item" style="border: none;">
                                <div class="d-flex justify-content-between align-items-center"
                                    style="border-bottom: 1px solid rgb(139, 139, 139);">
                                    <div>
                                        <h5 class="mb-0">Group Chat 2</h5>
                                        <small>Last Message: Any plans for the weekend?</small>
                                    </div>
                                    <span class="badge bg-primary">1</span>
                                </div>
                            </li>
                            <li class="list-group-item" style="border: none;">
                                <div class="d-flex justify-content-between align-items-center"
                                    style="border-bottom: 1px solid rgb(139, 139, 139);">
                                    <div>
                                        <h5 class="mb-0">Group Chat 3</h5>
                                        <small>Last Message: Let's meet at 2 PM.</small>
                                    </div>
                                    <span class="badge bg-primary">0</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!--/.card -->
            </div>
            <!-- /.col -->
            {{-- Anggota --}}
            {{-- ... --}}
            {{-- Anggota --}}
        </div>
    @endsection