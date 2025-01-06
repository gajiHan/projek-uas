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
                                <h6 class="text-white text-capitalize ps-3">Tabel potongan</h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="card-body px-0 pt-0 pb-2">
                                <div class="table-responsive p-0">
                                    <a href="javascript:void(0)" class="btn btn-info ml-3" id="create-new-potongan" style="margin-left:15px;">Tambah Data potongan</a>
                                    <br><br>
                                    <table class="table table-bordered table-striped" id="laravel_11_datatable">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>Nama Karyawan</th>
                                                <th>Jenis Potongan</th>
                                                <th>Jumlah potongan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($potongans as $potongan)
                                            <tr id="index_{{ $potongan->id }}">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $potongan->karyawan->nama ?? 'Tidak Ada' }}</td>
                                                <td>{{ $potongan->jenis_potongan }}</td>
                                                <td>{{ $potongan->jumlah_potongan }}</td>
                                                <td>
                                                    <a href="javascript:void(0)" id="btn-edit-post" data-id="{{ $potongan->id }}" class="btn btn-primary">
                                                        <i class="fa fa-pencil-alt"></i>
                                                    </a>

                                                    <a href="javascript:void(0)" id="btn-delete-post" data-id="{{ $potongan->id }}" class="btn btn-danger">
                                                        <i class="fa fa-trash-alt"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    <!-- Modal -->
                                    <div class="modal fade" id="ajax-potongan-modal" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="potonganCrudModal"></h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form id="potonganForm" name="potonganForm" class="form-horizontal">
                                                        <input type="hidden" name="potongan_id" id="potongan_id">

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

                                                        {{-- jenis potongan --}}

                                                        <div class="form-group">
                                                            <label for="jenis_potongan" class="col-sm-3 control-label">Jenis potongan</label>
                                                            <div class="col-sm-12">
                                                                <select class="form-control" id="jenis_potongan" name="jenis_potongan" required>
                                                                    <option value="" disabled selected>Pilih Jenis Potongan</option>
                                                                    <option value="Pajak Penghasilan (PPh 21)">Pajak Penghasilan (PPh 21)</option>
                                                                    <option value="Jaminan Sosial">Jaminan Sosial</option>
                                                                    <option value="Pinjaman Perusahaan">Pinjaman Perusahaan</option>
                                                                    <option value="Potongan Absen/Terlambat">Potongan Absen/Terlambat</option>
                                                                    <option value="Iuran Koperasi">Iuran Koperasi</option>
                                                                    <option value="Potongan Lain-lain">Potongan Lain-lain</option>
                                                                </select>
                                                            </div>
                                                        </div>


                                                        {{-- Jumlah potongan --}}

                                                        <div class="form-group">
                                                            <label for="jumlah_potongan" class="col-sm-3 control-label">Jumlah potongan</label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control" id="jumlah_potongan" name="jumlah_potongan" placeholder="Masukkan Jumlah Potongan" required>
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

            $('#create-new-potongan').click(function() {
                $('#btn-save').val("create-potongan");
                $('#potongan_id').val('');
                $('#potonganForm').trigger("reset");
                $('#potonganCrudModal').html("Tambah Data potongan");
                $('#ajax-potongan-modal').modal('show');
                $('#modal-preview').attr('src', 'https://via.placeholder.com/150').addClass('hidden');
            });

            $('body').on('click', '#btn-edit-post', function() {
                var id = $(this).data('id');
                $.get(SITEURL + 'potongan/index/potonganEdit/' + id, function(data) {
                    $('#potonganCrudModal').html("Edit Data potongan");
                    $('#btn-save').val("edit-potongan");
                    $('#ajax-potongan-modal').modal('show');
                    $('#potongan_id').val(data.id);
                    $('#karyawan_id').val(data.karyawan_id);
                    $('#jenis_potongan').val(data.jenis_potongan);
                    $('#jumlah_potongan').val(data.jumlah_potongan);
                }).fail(function(xhr) {
                    console.error("Error fetching data:", xhr.responseText);
                });
            });


            $('body').on('click', '#btn-delete-post', function() {
                var id = $(this).data("id");

                if (confirm("Are you sure you want to delete this?")) {
                    $.ajax({
                        type: "DELETE",
                        url: SITEURL + "potongan/index/potonganDelete/" + id,
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

            $('body').on('submit', '#potonganForm', function(e) {
                e.preventDefault();

                var id = $('#potongan_id').val();
                var actionType = $('#btn-save').val();
                var formData = $(this).serialize();

                $('#btn-save').html('Menyimpan...');

                $.ajax({
                    type: actionType === "edit-potongan" ? 'POST' : 'POST',
                    url: actionType === "edit-potongan" ?
                        SITEURL + 'potongan/index/potonganUpdate/' + id :
                        SITEURL + 'potongan/index/potonganStore',
                    data: actionType === "edit-potongan" ?
                        formData + '&_method=PUT' :
                        formData,
                    success: function(response) {
                        $('#potonganForm').trigger("reset");
                        $('#ajax-potongan-modal').modal('hide');
                        $('#btn-save').html('Simpan');
                        location.reload();
                    },
                    error: function(xhr) {
                        console.error("Error:", xhr.responseText);
                        $('#btn-save').html('Simpan');
                        alert('Gagal menyimpan data. Silakan cek kembali input Anda.');
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