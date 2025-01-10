@extends('layout.admin.main')

@section('content')
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">Table</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Tables</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Table</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <!-- Row -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Table head</h3>
                            <div class="card-options">
                                <a class="btn btn-primary" href="{{ route('barang-create') }}">
                                    <i class="fa fa-plus"> Add barang</i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">

                            @if(Session::has('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                            
                            <p>Similar to tables and dark tables, use the modifier classes <code class="highlighter-rouge">.table-primary</code> or <code class="highlighter-rouge">.table-dark</code> to make <code class="highlighter-rouge">&lt;thead&gt;</code>
                                <div class="table-responsive">
                                    <table id="user-data" class="table border text-nowrap text-md-nowrap mb-2">
                                        <thead class="table-primary">
                                            <tr>
                                                <th>ID</th>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Description</th>
                                                <th>price</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <!-- Row -->
        </div>
        <!-- CONTAINER CLOSED -->

    </div>
</div>
@endsection


@section('js')
<script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatable/js/dataTables.bootstrap5.js"></script>
<script src="assets/plugins/datatable/js/dataTables.buttons.min.js"></script>
<script src="assets/plugins/datatable/js/buttons.bootstrap5.min.js"></script>
<script src="assets/plugins/datatable/js/jszip.min.js"></script>
<script src="assets/plugins/datatable/pdfmake/pdfmake.min.js"></script>
<script src="assets/plugins/datatable/pdfmake/vfs_fonts.js"></script>
<script src="assets/plugins/datatable/js/buttons.html5.min.js"></script>
<script src="assets/plugins/datatable/js/buttons.print.min.js"></script>
<script src="assets/plugins/datatable/js/buttons.colVis.min.js"></script>
<script src="assets/plugins/datatable/dataTables.responsive.min.js"></script>
<script src="assets/plugins/datatable/responsive.bootstrap5.min.js"></script>
<script>
    $('#user-data').DataTable({
        serverSide: true,
        ajax: {
            url: `{{ route('barang-datatable') }}`,
            type: 'POST'
        },
        columnDefs: [
            {
                targets: 0,
                render: function(data, type, full, meta){
                    return (meta.row + 1)
                }
            },
            {
                targets: -1,
                render: function(data, type, full, meta){
                    console.log(data);
                    
                    let button = `
                        <a href="{{ route('user-edit', ':id') }}" class="btn btn-info">
                            <i class="fa fa-edit"> Edit</i>
                        </a>
                        <a href="{{ route('user-delete', ':id') }}" class="btn btn-danger">
                            <i class="fa fa-trash"> Delete</i>
                        </a>
                    `

                    button = button.replaceAll(':id', data)
                    return button
                }
            }
        ],
        columns: [
            { data : 'id' },
            { data : 'image' },
            { data : 'name' },
            { data : 'description' },
            { data : 'price' },
            { data : 'id' },
        ]
    } );
</script>
@endsection