
@extends('layouts.master')

@section('content')

<h1>Daftar Kategori</h1>
<hr>

{{-- PESAN SUKSES --}}
@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

{{-- TABEL CATEGORY --}}
<div class="card">

    <div class="card-header">
        Kategori Produk
    </div>

    <div class="card-body">

        <table class="table table-striped table-bordered">

            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($data_category as $item)
                <tr>
                    <td>
                        {{ ($data_category->perPage() * ($data_category->currentPage()-1)) + $loop->iteration }}
                    </td>

                    <td>{{ $item->category_name }}</td>
                    <td>{{ $item->description }}</td>

                    <td>
                        {{-- TOMBOL EDIT --}}
                        <button type="button" class="btn btn-warning"
                            data-bs-toggle="modal"
                            data-bs-target="#editModal{{ $item->id_category }}">
                            Edit
                        </button>

                        {{-- TOMBOL DELETE --}}
                        <button type="button" class="btn btn-danger"
                            data-bs-toggle="modal"
                            data-bs-target="#deleteModal{{ $item->id_category }}">
                            Delete
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>

        <div>
            Halaman : {{ $data_category->currentPage() }} <br />
            Jumlah Data : {{ $data_category->total() }} <br />
            Data Per Halaman : {{ $data_category->perPage() }} <br />

        </div>
        {{-- PAGINATION --}}
        <div>
            {{ $data_category->links('pagination::bootstrap-5') }}
        </div>

    </div>
</div>

{{-- MODAL EDIT DAN DELETE --}}
@foreach ($data_category as $item)

    {{-- MODAL EDIT --}}
    <div class="modal fade" id="editModal{{ $item->id_category }}" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <form action="{{ url('/category/'.$item->id_category) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="modal-header">
                        <h5 class="modal-title">Edit Kategori</h5>
                        <button type="button" class="btn-close"
                            data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">

                        <div class="mb-3">
                            <label class="form-label">Nama Kategori</label>
                            <input type="text" name="category_name"
                                class="form-control"
                                value="{{ $item->category_name }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea name="description"
                                class="form-control" rows="3"
                                required>{{ $item->description }}</textarea>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">
                            Batal
                        </button>

                        <button type="submit" class="btn btn-warning">
                            Simpan Perubahan
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>

    {{-- MODAL DELETE --}}
    <div class="modal fade" id="deleteModal{{ $item->id_category }}" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close"
                        data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    Apakah kamu yakin ingin menghapus kategori
                    <b>{{ $item->category_name }}</b>?
                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">
                        Batal
                    </button>

                    <form action="{{ url('/category/'.$item->id_category) }}"
                        method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">
                            Ya, Hapus
                        </button>
                    </form>

                </div>

            </div>
        </div>
    </div>

@endforeach

@endsection
