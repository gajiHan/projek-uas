<!DOCTYPE html>
<html lang="en">

<head>
@include('partials.header')
</head>

<body class="g-sidenav-show  bg-gray-100">
@include('partials.sidebar')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-3 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Tables</li>
                    </ol>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        <div class="input-group input-group-outline">
                            <label class="form-label">Type here...</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <ul class="navbar-nav d-flex align-items-center  justify-content-end">
                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </a>
                        </li>

                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="container-fluid py-2">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Tabel karyawan</h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="card-body px-0 pt-0 pb-2">
                                <div class="table-responsive p-0">
                                    <a href="javascript:void(0)" class="btn btn-info ml-3" id="create-new-karyawan" style="margin-left:15px;">Tambah Data karyawan</a>
                                    <br><br>
                                    <table class="table table-bordered table-striped" id="laravel_11_datatable">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama karyawan</th>
                                                <th>No Telpon</th>
                                                <th>Alamat</th>
                                                <th>Departemen</th>
                                                <th>Jabatan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($karyawans as $karyawan)
                                            <tr id="index_{{ $karyawan->id }}">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $karyawan->nama }}</td>
                                                <td>{{ $karyawan->no_telpon }}</td>
                                                <td>{{ $karyawan->alamat }}</td>
                                                <td>{{ $karyawan->departemen->nama_departemen ?? 'Tidak Ada' }}</td>
                                                <td>{{ $karyawan->jabatan }}</td>
                                                <td>
                                                    <a href="javascript:void(0)" id="btn-edit-post" data-id="{{ $karyawan->id }}" class="btn btn-primary">
                                                        <i class="fa fa-pencil-alt"></i>
                                                    </a>

                                                    <a href="javascript:void(0)" id="btn-delete-post" data-id="{{ $karyawan->id }}" class="btn btn-danger">
                                                        <i class="fa fa-trash-alt"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    <!-- Modal -->
                                    <div class="modal fade" id="ajax-karyawan-modal" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="karyawanCrudModal"></h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form id="karyawanForm" name="karyawanForm" class="form-horizontal">
                                                        <input type="hidden" name="karyawan_id" id="karyawan_id">

                                                        <div class="form-group">
                                                            <label for="nama" class="col-sm-3 control-label">Nama karyawan</label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Karyawan" required>
                                                            </div>
                                                        </div>

                                                        {{-- No telpon --}}

                                                        <div class="form-group">
                                                            <label for="no_telpon" class="col-sm-3 control-label">Nomor Telpon</label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control" id="no_telpon" name="no_telpon" placeholder="Masukkan Nomor Telpon" required>
                                                            </div>
                                                        </div>

                                                        {{-- Alamat --}}

                                                        <div class="form-group">
                                                            <label for="alamat" class="col-sm-3 control-label">Alamat</label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" required>
                                                            </div>
                                                        </div>

                                                        {{-- Departemen ID --}}

                                                        <div class="form-group">
                                                            <label for="departemen_id" class="control-label">Departemen</label>
                                                            <select class="form-control" id="departemen_id" name="departemen_id" required>
                                                                <option value="" disabled selected>Pilih Departemen</option>
                                                                @foreach (App\Models\Departemen::all() as $dpt)
                                                                <option value="{{ $dpt->id }}">{{ $dpt->nama_departemen }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>


                                                        {{-- Jabatan --}}

                                                        <div class="form-group">
                                                            <label for="jabatan" class="col-sm-3 control-label">Jabatan</label>
                                                            <div class="col-sm-12">
                                                                <select class="form-control" id="jabatan" name="jabatan" required>
                                                                    <option value="" disabled selected>Pilih Jabatan</option>
                                                                    <option value="Pimpinan">Pimpinan</option>
                                                                    <option value="Manager">Manager</option>
                                                                    <option value="Staff">Staff</option>
                                                                    <option value="Operasional">Operasional</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-offset-2 col-sm-10">
                                                            <button type="submit" class="btn btn-primary" id="btn-save" value="create">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('partials.footer')

    </main>

    </div>
    </div>
    <script>
        var SITEURL = "{{ url('/') }}/";

        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#laravel_11_datatable').DataTable();

            $('#create-new-karyawan').click(function() {
                $('#btn-save').val("create-karyawan");
                $('#karyawan_id').val('');
                $('#karyawanForm').trigger("reset");
                $('#karyawanCrudModal').html("Tambah Data karyawan");
                $('#ajax-karyawan-modal').modal('show');
                $('#modal-preview').attr('src', 'https://via.placeholder.com/150').addClass('hidden');
            });

            $('body').on('click', '#btn-edit-post', function() {
                var id = $(this).data('id');
                $.get(SITEURL + 'karyawan/index/karyawanEdit/' + id, function(data) {
                    $('#karyawanCrudModal').html("Edit Data karyawan");
                    $('#btn-save').val("edit-karyawan");
                    $('#ajax-karyawan-modal').modal('show');
                    $('#karyawan_id').val(data.id);
                    $('#nama').val(data.nama);
                    $('#no_telpon').val(data.no_telpon);
                    $('#alamat').val(data.alamat);
                    $('#departemen_id').val(data.departemen_id);
                    $('#jabatan').val(data.jabatan);
                }).fail(function(xhr) {
                    console.error("Error fetching data:", xhr.responseText);
                });
            });


            $('body').on('click', '#btn-delete-post', function() {
                var id = $(this).data("id");

                if (confirm("Are you sure you want to delete this?")) {
                    $.ajax({
                        type: "DELETE",
                        url: SITEURL + "karyawan/index/karyawanDelete/" + id,
                        success: function(data) {
                            console.log("Data berhasil dihapus:", data);
                            var oTable = $('#laravel_11_datatable').DataTable();
                            location.reload();
                        },
                        error: function(data) {
                            console.error("Error saat menghapus data:", data);
                        }
                    });
                }
            });

            $('body').on('submit', '#karyawanForm', function(e) {
                e.preventDefault();

                var id = $('#karyawan_id').val();
                var actionType = $('#btn-save').val();
                var formData = $(this).serialize();

                $('#btn-save').html('Menyimpan..');

                $.ajax({
                    type: actionType === "edit-karyawan" ? 'PUT' : 'POST',
                    url: actionType === "edit-karyawan" ? SITEURL + 'karyawan/index/karyawanUpdate/' + id : SITEURL + 'karyawan/index/karyawanStore',
                    data: formData,
                    success: function(response) {
                        $('#karyawanForm').trigger("reset");
                        $('#ajax-karyawan-modal').modal('hide');
                        $('#btn-save').html('Simpan');
                        location.reload();
                    },
                    error: function(xhr) {
                        console.error("Error:", xhr.responseText);
                        $('#btn-save').html('Simpan');
                    }
                });
            });


            // Preview Gambar
            function readURL(input, id) {
                id = id || '#modal-preview';
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $(id).attr('src', e.target.result).removeClass('hidden');
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
        });
    </script>
    </div>
    </div>
    </div>
    </div>

    </div>
    </div>
    <footer class="footer py-4  ">

        <!--   Core JS Files   -->
        <script src="{{asset('adminpage')}}/assets/js/core/popper.min.js"></script>
        <script src="{{asset('adminpage')}}/assets/js/core/bootstrap.min.js"></script>
        <script src="{{asset('adminpage')}}/assets/js/plugins/perfect-scrollbar.min.js"></script>
        <script src="{{asset('adminpage')}}/assets/js/plugins/smooth-scrollbar.min.js"></script>
        <script>
            var win = navigator.platform.indexOf('Win') > -1;
            if (win && document.querySelector('#sidenav-scrollbar')) {
                var options = {
                    damping: '0.5'
                }
                Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
            }
        </script>
        <!-- Github buttons -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="{{asset('adminpage')}}/assets/js/material-dashboard.min.js?v=3.2.0"></script>
</body>

</html>