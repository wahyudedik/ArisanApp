@extends('member.layout')
@section('content')
    <div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="images/{{ $member->gambar }}"
                            alt="User profile picture">
                    </div>

                    <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>

                    <p class="text-muted text-center">{{ '@' . Auth::user()->name }}</p>

                    <form method="POST" action="{{ route('member.updateProfile', $member->id) }}"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="photo">Edit Foto</label>
                            <input type="file" class="form-control-file" id="photo" name="gambar">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary btn-block">Simpan</button>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Profile</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <strong><i class="fas fa-user mr-1"></i> Nama</strong>

                    <p class="text-muted">
                        {{ $nama }}
                    </p>

                    <hr>

                    <strong><i class="fas fa-envelope mr-1"></i> Email</strong>

                    <p class="text-muted">
                        {{ $email }}
                    </p>

                    <hr>

                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>

                    <p class="text-muted">{{ $member->alamat }}</p>

                    <hr>

                    <strong><i class="fas fa-phone mr-1"></i> No HP</strong>

                    <p class="text-muted">
                        {{ $member->no_hp }}
                    </p>

                    <hr>

                    <strong><i class="far fa-credit-card mr-1"></i> No Rekening</strong>

                    <p class="text-muted">{{ $member->no_rekening }}</p>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Settings</a></li>
                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="settings">
                            <form class="form-horizontal" action="{{ route('member.update', $member->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" value="{{ $nama }}"
                                            class="form-control" id="inputName" placeholder="Nama">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" value="{{ $email }}" name="email"
                                            class="form-control" id="inputEmail" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName2" class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="alamat" id="inputExperience" placeholder="Alamat">{{ $member->alamat }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputExperience" class="col-sm-2 col-form-label">No HP</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="no_hp" value="{{ $member->no_hp }}"
                                            class="form-control" id="inputName2" placeholder="No.HP">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputSkills" class="col-sm-2 col-form-label">No Rekening</label>
                                    <div class="col-sm-10">
                                        <input type="text" value="{{ $member->no_rekening }}" name="no_rekening"
                                            class="form-control" id="No.Rekening" placeholder="No Rekening">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" name="submit" class="btn btn-danger">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->

            @if ($member->status === true)
                <div class="card card-success">
                    <div class="card-body">Akun Sudah Aktif</div>
                </div>
            @else
                <div class="card card-danger">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>Akun Belum Aktif</div>
                        {{-- <div class="ml-auto">
                            <button class="btn btn-primary" type="submit" id="myButton">Aktifkan</button>
                            <script>
                                const button = document.getElementById("myButton");

                                // Check if button state is stored in localStorage
                                const storedState = localStorage.getItem("buttonState");
                                if (storedState) {
                                    button.innerText = storedState;
                                }

                                button.addEventListener("click", function() {
                                    if (button.innerText === "Aktifkan") {
                                        button.innerText = "Processing";
                                        // Send activation request form
                                        var form = document.getElementById("activationForm");
                                        form.submit();

                                        // Store button state in localStorage
                                        localStorage.setItem("buttonState", button.innerText);
                                    }
                                });
                            </script>
                        </div> --}}
                    </div>
                </div>
            @endif

        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Pesan error
        @if ($errors->any())
            $(document).ready(function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '{{ $errors->first() }}'
                });
            });
        @endif

        // Pesan sukses
        @if (session('success'))
            $(document).ready(function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: '{{ session('success') }}'
                });
            });
        @endif

        $('form').submit(function() {
            Swal.fire({
                title: 'Loading...',
                allowOutsideClick: false,
                showConfirmButton: false, // Remove the OK button
                onBeforeOpen: () => {
                    Swal.showLoading();
                    Swal.getContent().querySelector('p').innerHTML =
                        '<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div>';
                }
            });
        });
    </script>
@endsection
