@extends('layout.admin.main')

@section('content')

<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">Kelola Barang</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('manage-barang') }}">Kelola Barang</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Form Advanced</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <!-- Row -->
            <form action="{{ route('barang-store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-xl-4 col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">File Upload</h3>
                            </div>
                            <div class=" card-body">
                                <div class="row mb-5">
                                    <div class="col-lg-12 col-sm-12 mb-4 mb-lg-0">
                                        <input type="file" name="image" class="dropify" data-allowed-file-extensions="jpg png gif" data-bs-height="180" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Data Product</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">Name</label>
                                    <input class="form-control" type="text" placeholder="Input Product Name">
                                <div class="form-group">
                                    <label class="form-label">Price</label>
                                    <input class="form-control" id="price" type="text" placeholder="Input Product Price">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Description</label>
                                    <textarea id="summernote" class="form-control" placeholder="Input Product Description"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
        <!-- CONTAINER CLOSED -->
    </div>
</div>

@endsection


@section('js')

<script type="text/javascript">
		
    var rupiah = document.getElementById('price');
    rupiah.addEventListener('keyup', function(e){
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
        rupiah.value = formatRupiah(this.value, 'Rp. ');
    });

    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix){
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split   		= number_string.split(','),
        sisa     		= split[0].length % 3,
        rupiah     		= split[0].substr(0, sisa),
        ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if(ribuan){
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>

<script src="assets/plugins/fileuploads/js/fileupload.js"></script>
<script src="assets/plugins/fileuploads/js/file-upload.js"></script>

<script src="assets/plugins/summernote/summernote1.js"></script>
<script src="assets/js/summernote.js"></script>

@endsection