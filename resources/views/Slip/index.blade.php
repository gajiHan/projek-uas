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
                                <h6 class="text-white text-capitalize ps-3">Tabel Pendapatan</h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="card-body px-0 pt-0 pb-2">
                                <div class="table-responsive p-0">
                                    <a href="javascript:void(0)" class="btn btn-info ml-3" id="create-new-slip" style="margin-left:15px;">Tambah Data Pendapatan</a>
                                    <br><br>
                                    <table class="table table-bordered table-striped" id="laravel_11_datatable">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Bulan</th>
                                                <th>Nama Karyawan</th>
                                                <th>Nama Departemen</th>
                                                <th>Gaji</th>
                                                <th>Tunjangan</th>
                                                <th>Total Pendapatan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($slips as $slip)
                                            <tr id="index_{{ $slip->id }}">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $slip->bulan }}</td>
                                                <td>{{ $slip->karyawan->nama ?? 'Tidak Ada' }}</td>
                                                <td>{{ $slip->departemen->nama_departemen ?? 'Tidak Ada' }}</td>
                                                <td>{{ $slip->gaji->total_gaji ?? 'Tidak Ada' }}</td>
                                                <td>{{ $slip->tunjangan->jumlah_tunjangan ?? 'Tidak Ada' }}</td>
                                                <td>{{ $slip->total_pendapatan }}</td>
                                                <td>
                                                    <a href="javascript:void(0)" id="btn-edit-post" data-id="{{ $slip->id }}" class="btn btn-primary">
                                                        <i class="fa fa-pencil-alt"></i>
                                                    </a>

                                                    <a href="javascript:void(0)" id="btn-delete-post" data-id="{{ $slip->id }}" class="btn btn-danger">
                                                        <i class="fa fa-trash-alt"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    <!-- Modal -->
                                    <div class="modal fade" id="ajax-slip-modal" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="slipCrudModal"></h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form id="slipForm" name="slipForm" class="form-horizontal">
                                                        <input type="hidden" name="slip_id" id="slip_id">

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
                                                        </div>

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

                                                        {{-- Gaji --}}
                                                            <div class="form-group">
                                                                <label for="gaji_id" class="control-label">Gaji</label>
                                                                <select class="form-control" id="gaji_id" name="gaji_id" required>
                                                                    <option value="" disabled selected>Pilih Gaji</option>
                                                                    @foreach (App\Models\Gaji::all() as $dpt)
                                                                        <option value="{{ $dpt->id }}" data-total-gaji="{{ $dpt->total_gaji }}">
                                                                            {{ $dpt->total_gaji }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            {{-- Tunjangan --}}
                                                            <div class="form-group">
                                                                <label for="tunjangan_id" class="control-label">Tunjangan</label>
                                                                <select class="form-control" id="tunjangan_id" name="tunjangan_id" required>
                                                                    <option value="" disabled selected>Pilih Tunjangan</option>
                                                                    @foreach (App\Models\Tunjangan::all() as $dpt)
                                                                        <option value="{{ $dpt->id }}" data-jumlah-tunjangan="{{ $dpt->jumlah_tunjangan }}">
                                                                            {{ $dpt->jumlah_tunjangan }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            {{-- Total Pendapatan --}}
                                                            <div class="form-group">
                                                                <label for="total_pendapatan" class="col-sm-3 control-label">Total</label>
                                                                <div class="col-sm-12">
                                                                    <input type="text" class="form-control" id="total_pendapatan" name="total_pendapatan" placeholder="Total" readonly required>
                                                                </div>
                                                            </div>

                                                            <script>
                                                                // Pastikan elemen input tersedia
                                                                const gajiSelect = document.getElementById('gaji_id');
                                                                const tunjanganSelect = document.getElementById('tunjangan_id');
                                                                const totalPendapatanInput = document.getElementById('total_pendapatan');

                                                                // Tambahkan event listener
                                                                gajiSelect.addEventListener('change', hitungTotalPendapatan);
                                                                tunjanganSelect.addEventListener('change', hitungTotalPendapatan);

                                                                function hitungTotalPendapatan() {
                                                                    // Ambil nilai total_gaji dari atribut data di elemen <option>
                                                                    const totalGaji = parseFloat(gajiSelect.options[gajiSelect.selectedIndex]?.dataset.totalGaji) || 0;

                                                                    // Ambil nilai jumlah_tunjangan dari atribut data di elemen <option>
                                                                    const jumlahTunjangan = parseFloat(tunjanganSelect.options[tunjanganSelect.selectedIndex]?.dataset.jumlahTunjangan) || 0;

                                                                    // Hitung total pendapatan
                                                                    const totalPendapatan = totalGaji + jumlahTunjangan;

                                                                    // Tampilkan hasil ke input "total_pendapatan"
                                                                    totalPendapatanInput.value = totalPendapatan.toFixed(2); // Format 2 desimal
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

            $('#create-new-slip').click(function() {
                $('#btn-save').val("create-slip");
                $('#slip_id').val('');
                $('#slipForm').trigger("reset");
                $('#slipCrudModal').html("Tambah Data slip");
                $('#ajax-slip-modal').modal('show');
                $('#modal-preview').attr('src', 'https://via.placeholder.com/150').addClass('hidden');
            });

            $('body').on('click', '#btn-edit-post', function() {
                var id = $(this).data('id');
                $.get(SITEURL + 'slip/index/slipEdit/' + id, function(data) {
                    $('#slipCrudModal').html("Edit Data slip");
                    $('#btn-save').val("edit-slip");
                    $('#ajax-slip-modal').modal('show');
                    $('#slip_id').val(data.id);
                    $('#bulan').val(data.bulan);
                    $('#karyawan_id').val(data.karyawan_id);
                    $('#gaji_id').val(data.gaji_id);
                    $('#tunjangan_id').val(data.tunjangan_id);
                    $('#total_pendapatan').val(data.total_pendapatan);
                }).fail(function(xhr) {
                    console.error("Error fetching data:", xhr.responseText);
                });
            });


            $('body').on('click', '#btn-delete-post', function() {
                var id = $(this).data("id");

                if (confirm("Are you sure you want to delete this?")) {
                    $.ajax({
                        type: "DELETE",
                        url: SITEURL + "slip/index/slipDelete/" + id,
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

            $('body').on('submit', '#slipForm', function(e) {
                e.preventDefault();

                var id = $('#slip_id').val();
                var actionType = $('#btn-save').val();
                var formData = $(this).serialize();

                $('#btn-save').html('Menyimpan..');

                $.ajax({
                    type: actionType === "edit-slip" ? 'PUT' : 'POST',
                    url: actionType === "edit-slip" ? SITEURL + 'slip/index/slipUpdate/' + id : SITEURL + 'slip/index/slipStore',
                    data: formData,
                    success: function(response) {
                        $('#slipForm').trigger("reset");
                        $('#ajax-slip-modal').modal('hide');
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