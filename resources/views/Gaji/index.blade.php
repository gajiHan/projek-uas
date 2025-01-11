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
                                <h6 class="text-white text-capitalize ps-3">Tabel Gaji</h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="card-body px-0 pt-0 pb-2">
                                <div class="table-responsive p-0">
                                    <a href="javascript:void(0)" class="btn btn-info ml-3" id="create-new-gaji" style="margin-left:15px;">Tambah Data Gaji</a>
                                    <a href="/exportpdf" class="btn btn-danger ml-3" id="create-new-slip" style="margin-left:15px;">
                                        <i class="fas fa-download"></i> PDF
                                    </a>
                                    <br><br>
                                    <table class="table table-bordered table-striped" id="laravel_11_datatable">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Karyawan</th>
                                                <th>Bulan</th>
                                                <th>Tahun</th>
                                                <th>Gaji Pokok</th>
                                                <th>Potongan</th>
                                                <th>Lembur</th>
                                                <th>Total Gaji</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($gajis as $gaji)
                                            <tr id="index_{{ $gaji->id }}">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $gaji->karyawan->nama ?? 'Tidak Ada' }}</td>
                                                <td>{{ $gaji->bulan }}</td>
                                                <td>{{ $gaji->tahun }}</td>
                                                <td>{{ $gaji->gaji_pokok }}</td>
                                                <td>{{ $gaji->potongan->jumlah_potongan ?? 'Tidak Ada' }}</td>
                                                <td>{{ $gaji->lembur->total_lembur ?? 'Tidak Ada' }}</td>
                                                <td>{{ $gaji->total_gaji }}</td>
                                                <td>
                                                    <a href="javascript:void(0)" id="btn-edit-post" data-id="{{ $gaji->id }}" class="btn btn-primary">
                                                        <i class="fa fa-pencil-alt"></i>
                                                    </a>

                                                    <a href="javascript:void(0)" id="btn-delete-post" data-id="{{ $gaji->id }}" class="btn btn-danger">
                                                        <i class="fa fa-trash-alt"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    <!-- Modal -->
                                    <div class="modal fade" id="ajax-gaji-modal" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="gajiCrudModal"></h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form id="gajiForm" name="gajiForm" class="form-horizontal">
                                                        <input type="hidden" name="gaji_id" id="gaji_id">

                                                        {{-- Karyawan --}}

                                                        <div class="form-group">
                                                            <label for="karyawan_id" class="control-label">Nama Karyawan</label>
                                                            <select class="form-control" id="karyawan_id" name="karyawan_id" required>
                                                                <option value="" disabled selected>Pilih Karyawan</option>
                                                                @foreach (App\Models\Karyawan::all() as $dpt)
                                                                <option value="{{ $dpt->id }}">{{ $dpt->nama }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        {{-- Bulan --}}

                                                        <div class="form-group">
                                                            <label for="bulan" class="col-sm-3 control-label">Pilih Bulan</label>
                                                            <div class="col-sm-12">
                                                                <select class="form-control" id="bulan" name="bulan" required>
                                                                    <option value="" disabled selected>Pilih Bulan</option>
                                                                    <option value="Januari">Januari</option>
                                                                    <option value="Februari">Februari</option>
                                                                    <option value="Maret">Maret</option>
                                                                    <option value="April">April</option>
                                                                    <option value="Mei">Mei</option>
                                                                    <option value="Juni">Juni</option>
                                                                    <option value="Juli">Juli</option>
                                                                    <option value="Agustus">Agustus</option>
                                                                    <option value="September">September</option>
                                                                    <option value="Oktober">Oktober</option>
                                                                    <option value="November">November</option>
                                                                    <option value="Desember">Desember</option>
                                                                </select>
                                                            </div>

                                                            {{-- Tahun --}}

                                                            <div class="form-group">
                                                                <label for="tahun" class="col-sm-3 control-label">Tahun</label>
                                                                <div class="col-sm-12">
                                                                    <input type="text" class="form-control" id="tahun" name="tahun" placeholder="Masukkan Tahun" required>
                                                                </div>
                                                            </div>

                                                            {{-- Gaji Pokok --}}
                                                            <div class="form-group">
                                                                <label for="gaji_pokok" class="col-sm-3 control-label">Gaji Pokok</label>
                                                                <div class="col-sm-12">
                                                                    <input type="text" class="form-control" id="gaji_pokok" name="gaji_pokok" placeholder="Masukkan Gaji Pokok" required>
                                                                </div>
                                                            </div>

                                                            {{-- Potongan --}}
                                                            <div class="form-group">
                                                                <label for="potongan_id" class="control-label">Potongan</label>
                                                                <select class="form-control" id="potongan_id" name="potongan_id" required>
                                                                    <option value="" disabled selected>Pilih Potongan</option>
                                                                    @foreach (App\Models\Potongan::all() as $dpt)
                                                                        <option value="{{ $dpt->id }}" data-jumlah-potongan="{{ $dpt->jumlah_potongan }}">
                                                                            {{ $dpt->jumlah_potongan }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            {{-- Lembur --}}
                                                            <div class="form-group">
                                                                <label for="lembur_id" class="control-label">Lembur</label>
                                                                <select class="form-control" id="lembur_id" name="lembur_id" required>
                                                                    <option value="" disabled selected>Pilih Lembur</option>
                                                                    @foreach (App\Models\Lembur::all() as $dpt)
                                                                        <option value="{{ $dpt->id }}" data-total-lembur="{{ $dpt->total_lembur }}">
                                                                            {{ $dpt->total_lembur }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            {{-- Total Gaji --}}
                                                            <div class="form-group">
                                                                <label for="total_gaji" class="col-sm-3 control-label">Total</label>
                                                                <div class="col-sm-12">
                                                                    <input type="text" class="form-control" id="total_gaji" name="total_gaji" placeholder="Total" readonly required>
                                                                </div>
                                                            </div>

                                                            <script>
                                                                // Ambil elemen
                                                                const gajiPokokInput = document.getElementById('gaji_pokok');
                                                                const potonganSelect = document.getElementById('potongan_id');
                                                                const lemburSelect = document.getElementById('lembur_id');
                                                                const totalGajiInput = document.getElementById('total_gaji');

                                                                // Tambahkan event listener
                                                                gajiPokokInput.addEventListener('input', hitungTotalGaji);
                                                                potonganSelect.addEventListener('change', hitungTotalGaji);
                                                                lemburSelect.addEventListener('change', hitungTotalGaji);

                                                                function hitungTotalGaji() {
                                                                    // Ambil nilai gaji pokok
                                                                    const gajiPokok = parseFloat(gajiPokokInput.value) || 0;

                                                                    // Ambil nilai potongan dari atribut data
                                                                    const potongan = parseFloat(
                                                                        potonganSelect.options[potonganSelect.selectedIndex]?.dataset.jumlahPotongan
                                                                    ) || 0;

                                                                    // Ambil nilai lembur dari atribut data
                                                                    const lembur = parseFloat(
                                                                        lemburSelect.options[lemburSelect.selectedIndex]?.dataset.totalLembur
                                                                    ) || 0;

                                                                    // Hitung total gaji
                                                                    const totalGaji = gajiPokok - potongan + lembur;

                                                                    // Tampilkan total gaji di input
                                                                    totalGajiInput.value = totalGaji.toFixed(2); // Format 2 desimal
                                                                }
                                                            </script>

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

            $('#create-new-gaji').click(function() {
                $('#btn-save').val("create-gaji");
                $('#gaji_id').val('');
                $('#gajiForm').trigger("reset");
                $('#gajiCrudModal').html("Tambah Data gaji");
                $('#ajax-gaji-modal').modal('show');
                $('#modal-preview').attr('src', 'https://via.placeholder.com/150').addClass('hidden');
            });

            $('body').on('click', '#btn-edit-post', function() {
                var id = $(this).data('id');
                $.get(SITEURL + 'gaji/index/gajiEdit/' + id, function(data) {
                    $('#gajiCrudModal').html("Edit Data gaji");
                    $('#btn-save').val("edit-gaji");
                    $('#ajax-gaji-modal').modal('show');
                    $('#gaji_id').val(data.id);
                    $('#karyawan_id').val(data.karyawan_id);
                    $('#bulan').val(data.bulan);
                    $('#tahun').val(data.tahun);
                    $('#gaji_pokok').val(data.gaji_pokok);
                    $('#potongan_id').val(data.potongan_id);
                    $('#lembur_id').val(data.lembur_id);
                    $('#total_gaji').val(data.total_gaji);
                }).fail(function(xhr) {
                    console.error("Error fetching data:", xhr.responseText);
                });
            });


            $('body').on('click', '#btn-delete-post', function() {
                var id = $(this).data("id");

                if (confirm("Are you sure you want to delete this?")) {
                    $.ajax({
                        type: "DELETE",
                        url: SITEURL + "gaji/index/gajiDelete/" + id,
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

            $('body').on('submit', '#gajiForm', function(e) {
                e.preventDefault();

                var id = $('#gaji_id').val();
                var actionType = $('#btn-save').val();
                var formData = $(this).serialize();

                $('#btn-save').html('Menyimpan..');

                $.ajax({
                    type: actionType === "edit-gaji" ? 'PUT' : 'POST',
                    url: actionType === "edit-gaji" ? SITEURL + 'gaji/index/gajiUpdate/' + id : SITEURL + 'gaji/index/gajiStore',
                    data: formData,
                    success: function(response) {
                        $('#gajiForm').trigger("reset");
                        $('#ajax-gaji-modal').modal('hide');
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