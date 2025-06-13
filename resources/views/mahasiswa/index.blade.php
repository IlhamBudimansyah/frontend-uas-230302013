@extends('layout.app')

@section('content')

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create">
    + Tambah
</button>

<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form method="post" action="{{route('mahasiswa.store')}}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Mahasiswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                    <div class="mb-1">
                        <label for="recipient-npm" class="col-form-label">NPM</label>
                        <input type="text" name="npm" class="form-control" id="npm">
                    </div>
                    <div class="mb-1">
                        <label for="recipient-nama_mahasiswa" class="col-form-label">Nama Mahasiswa</label>
                        <input type="text" name="nama_mahasiswa" class="form-control" id="nama_mahasiswa">
                    </div>
                    <div class="mb-1">
                        <label for="recipient-email" class="col-form-label">Email</label>
                        <input type="text" name="email" class="form-control" id="email">
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Tambahkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div>
    <table id="DataTable" class="display">
        <thead>
            <tr>
                <td>NPM</td>
                <td>Nama Mahasiswa</td>
                <td>Email</td>
                <td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($mahasiswa as $item)
            <tr>
                <td>{{ $item['npm'] }}</td>
                <td>{{ $item['nama_mahasiswa'] }}</td>
                <td>{{ $item['email'] }}</td>
                <td>
                    
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit{{$item['npm']}}">
                        Edit
                    </button>

                    @foreach ($mahasiswa as $item)
                    <div class="modal fade" id="edit{{$item['npm']}}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <form method="post" action="{{ route('mahasiswa.update', $item['npm']) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Data Mahasiswa</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-1">
                                            <label>NPM</label>
                                            <input type="text" name="npm" class="form-control" value="{{ $item['npm'] }}" readonly>
                                        </div>
                                        <div class="mb-1">
                                            <label>Nama Mahasiswa</label>
                                            <input type="text" name="nama_mahasiswa" class="form-control" value="{{ $item['nama_mahasiswa'] }}">
                                        </div>
                                        <div class="mb-1">
                                            <label>Email</label>
                                            <input type="text" name="email" class="form-control" value="{{ $item['email'] }}">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-warning">Simpan Perubahan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                    <div class="d-flex gap-4">
                        <form method="post" action={{route('mahasiswa.delete', $item['npm'])}} class="mr-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection