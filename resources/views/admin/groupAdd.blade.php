@extends('admin.layout')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- GROUP CHAT LIST -->
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Groups Arisan</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form method="POST" action="{{ route('groups.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="name">Nama Group</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Deskripsi Group</label>
                            <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!--/.card -->
        </div>
        <!-- /.col -->
    </div>
@endsection
