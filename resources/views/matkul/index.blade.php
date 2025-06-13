@extends('layout.app')

@section('content')

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create">
    + Tambah
</button>

<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form method="post" action="{{route('matkul.store')}}">
                @csrf
                @method('POST')
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Matkul</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                    <div class="mb-1">
                        <label for="recipient-kode" class="col-form-label">Kode Matkul</label>
                        <input type="text" name="kode_matkul" class="form-control" id="kode_matkul">
                    </div>
                    <div class="mb-1">
                        <label for="recipient-name" class="col-form-label">Nama Matkul</label>
                        <input type="text" name="nama_matkul" class="form-control" id="nama_matkul">
                    </div>
                    <div class="mb-1">
                        <label for="recipient-sks" class="col-form-label">SKS</label>
                        <input type="text" name="sks" class="form-control" id="sks">
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
                <td>Kode Matkul</td>
                <td>Nama Matkul</td>
                <td>SKS</td>
                <td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($matkul as $item)
            <tr>
                <td>{{ $item['kode_matkul'] }}</td>
                <td>{{ $item['nama_matkul'] }}</td>
                <td>{{ $item['sks'] }}</td>
                <td>
                    
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit{{$item['kode_matkul']}}">
                        Edit
                    </button>
                    
                    @foreach ($matkul as $item)
                    <div class="modal fade" id="edit{{$item['kode_matkul']}}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <form method="post" action="{{ route('matkul.update', $item['kode_matkul']) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Data Matkul</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-1">
                                            <label>Nama Matkul</label>
                                            <input type="text" name="nama_matkul" class="form-control" value="{{ $item['nama_matkul'] }}">
                                        </div>
                                        <div class="mb-1">
                                            <label>Kode Matkul</label>
                                            <input type="text" name="kode_matkul" class="form-control" value="{{ $item['kode_matkul'] }}">
                                        </div>
                                        <div class="mb-1">
                                            <label>SKS</label>
                                            <input type="text" name="sks" class="form-control" value="{{ $item['sks'] }}">
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
                        <form method="post" action={{route('matkul.delete', $item['kode_matkul'])}} class="mr-2">
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