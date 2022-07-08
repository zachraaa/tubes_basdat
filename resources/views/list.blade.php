@extends('welcome')

@section('konten')
<div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h3 class="card-title">Data table of users</h3>
                <a href="{{ route('penggunas.create') }}" class="btn btn-sm btn-success"><i class="fas fa-plus"></i>
                    Create</a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="table-penggunas" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($penggunas as $pengguna)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pengguna->nama }}</td>
                        <td>
                            <form class="float-left m-1" action="{{ route('penggunas.destroy', [$pengguna->id]) }}"
                                method="POST">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete</a>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
@endsection
@push('script')
    <!-- DataTables -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script>
        $(function() {
            $("#table-penggunas").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
        });

    </script>
@endpush