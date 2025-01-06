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
                                <h6 class="text-white text-capitalize ps-3">Tabel lembur</h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="card-body px-0 pt-0 pb-2">
                                <div class="table-responsive p-0">
                                    <a href="javascript:void(0)" class="btn btn-info ml-3" id="create-new-lembur" style="margin-left:15px;">Tambah Data lembur</a>
                                    <br><br>
                                    <table class="table table-bordered table-striped" id="laravel_11_datatable">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>Nama Karyawan</th>
                                                <th>Tanggal lembur</th>
                                                <th>Jumlah Jam Lembur</th>
                                                <th>Upah Lembur Perjam</th>
                                                <th>Total Lembur</th>
                                                <th>Keterangan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($lemburs as $lembur)
                                            <tr id="index_{{ $lembur->id }}">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $lembur->karyawan->nama ?? 'Tidak Ada' }}</td>
                                                <td>{{ $lembur->tanggal_lembur }}</td>
                                                <td>{{ $lembur->jumlah_jam_lembur }}</td>
                                                <td>{{ $lembur->upah_lembur_perjam }}</td>
                                                <td>{{ $lembur->total_lembur }}</td>
                                                <td>{{ $lembur->keterangan }}</td>
                                                <td>
                                                    <a href="javascript:void(0)" id="btn-edit-post" data-id="{{ $lembur->id }}" class="btn btn-primary">
                                                        <i class="fa fa-pencil-alt"></i>
                                                    </a>

                                                    <a href="javascript:void(0)" id="btn-delete-post" data-id="{{ $lembur->id }}" class="btn btn-danger">
                                                        <i class="fa fa-trash-alt"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    <!-- Modal -->
                                    <div class="modal fade" id="ajax-lembur-modal" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="lemburCrudModal"></h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form id="lemburForm" name="lemburForm" class="form-horizontal">
                                                        <input type="hidden" name="lembur_id" id="lembur_id">

                                                        {{-- Karyawan ID --}}

                                                        <div class="form-group">
                                                            <label for="karyawan_id" class="control-label">Nama Karyawan</label>
                                                            <select class="form-control" id="karyawan_id" name="karyawan_id" required>
                                                                <option value="" disabled selected>Pilih Karyawan</option>
                                                                @foreach (App\Models\Karyawan::all() as $dpt)
                                                                <option value="{{ $dpt->id }}">{{ $dpt->nama }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        {{-- tangal lembur --}}

                                                        <div class="form-group">
                                                            <label for="tanggal_lembur" class="col-sm-3 control-label">Tanggal Lembur</label>
                                                            <div class="col-sm-12">
                                                                <input type="date" class="form-control" id="tanggal_lembur" name="tanggal_lembur" placeholder="Masukkan Tanggal Lembur" required>
                                                            </div>
                                                        </div>


                                                        {{-- Jumlah jam lembur --}}

                                                        <div class="form-group">
                                                            <label for="jumlah_jam_lembur" class="col-sm-3 control-label">Jumlah Jam Lembur</label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control" id="jumlah_jam_lembur" name="jumlah_jam_lembur" placeholder="Masukkan Jumlah Jam" required>
                                                            </div>
                                                        </div>

                                                        {{-- Upah Lembur Perjam --}}

                                                        <div class="form-group">
                                                            <label for="upah_lembur_perjam" class="col-sm-3 control-label">Upah Lembur Perjam</label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control" id="upah_lembur_perjam" name="upah_lembur_perjam" placeholder="Masukkan Jumlah Upah" required>
                                                            </div>
                                                        </div>

                                                        {{-- Total Lembur --}}
                                                        <div class="form-group">
                                                            <label for="total_lembur" class="col-sm-3 control-label">Total</label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control" id="total_lembur" name="total_lembur" placeholder="Total" readonly required>
                                                            </div>
                                                        </div>

                                                        {{-- Input Hidden untuk Mengirim Total ke Database --}}
                                                        <input type="hidden" id="total_lembur_hidden" name="total_lembur_hidden">

                                                        <script>
                                                            // Fungsi untuk menghitung total lembur
                                                            document.getElementById('jumlah_jam_lembur').addEventListener('input', hitungTotal);
                                                            document.getElementById('upah_lembur_perjam').addEventListener('input', hitungTotal);

                                                            function hitungTotal() {
                                                                var jumlahJam = parseFloat(document.getElementById('jumlah_jam_lembur').value) || 0;
                                                                var upahPerJam = parseFloat(document.getElementById('upah_lembur_perjam').value) || 0;
                                                                var total = jumlahJam * upahPerJam;

                                                                // Menampilkan total pada field total_lembur
                                                                document.getElementById('total_lembur').value = total.toFixed(2); // Menampilkan total dengan 2 desimal

                                                                // Menyimpan total lembur ke input hidden agar bisa dikirim ke database
                                                                document.getElementById('total_lembur_hidden').value = total.toFixed(2);
                                                            }
                                                        </script>

                                                        {{-- Keterangan --}}

                                                        <div class="form-group">
                                                            <label for="keterangan" class="col-sm-3 control-label">keterangan</label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="keterangan" required>
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

            $('#create-new-lembur').click(function() {
                $('#btn-save').val("create-lembur");
                $('#lembur_id').val('');
                $('#lemburForm').trigger("reset");
                $('#lemburCrudModal').html("Tambah Data lembur");
                $('#ajax-lembur-modal').modal('show');
                $('#modal-preview').attr('src', 'https://via.placeholder.com/150').addClass('hidden');
            });

            $('body').on('click', '#btn-edit-post', function() {
                var id = $(this).data('id');
                $.get(SITEURL + 'lembur/index/lemburEdit/' + id, function(data) {
                    $('#lemburCrudModal').html("Edit Data lembur");
                    $('#btn-save').val("edit-lembur");
                    $('#ajax-lembur-modal').modal('show');
                    $('#lembur_id').val(data.id);
                    $('#karyawan_id').val(data.karyawan_id);
                    $('#tanggal_lembur').val(data.tanggal_lembur);
                    $('#jumlah_jam_lembur').val(data.jumlah_jam_lembur);
                    $('#upah_jam_lembur').val(data.upah_jam_lembur);
                    $('#total_lembur').val(data.total_lembur);
                    $('#keterangan').val(data.keterangan);
                }).fail(function(xhr) {
                    console.error("Error fetching data:", xhr.responseText);
                });
            });


            $('body').on('click', '#btn-delete-post', function() {
                var id = $(this).data("id");

                if (confirm("Are you sure you want to delete this?")) {
                    $.ajax({
                        type: "DELETE",
                        url: SITEURL + "lembur/index/lemburDelete/" + id,
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

            $('body').on('submit', '#lemburForm', function(e) {
                e.preventDefault();

                var id = $('#lembur_id').val();
                var actionType = $('#btn-save').val();
                var formData = $(this).serialize();

                $('#btn-save').html('Menyimpan..');

                $.ajax({
                    type: actionType === "edit-lembur" ? 'PUT' : 'POST',
                    url: actionType === "edit-lembur" ? SITEURL + 'lembur/index/lemburUpdate/' + id : SITEURL + 'lembur/index/lemburStore',
                    data: formData,
                    success: function(response) {
                        $('#lemburForm').trigger("reset");
                        $('#ajax-lembur-modal').modal('hide');
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