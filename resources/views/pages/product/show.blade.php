
@extends('layouts.master')

@section('content')
<h1>Daftar produk kami</h1>
<hr>

<a href="/product/addProduct" class="btn btn-primary mb-3">
    Tambah Data
</a>

@if (session('message'))
<div class="alert alert-success">
    {{ session('message') }}
</div>
@endif

<div class="card">
    <div class="card-header">
        Produk Kami
    </div>

    <div class="alert alert-primary">
        <b>Nama Toko : </b> {{ $data_toko['nama_toko'] }}
        <br>
        <b>Alamat Toko : </b> {{ $data_toko['alamat_toko'] }}
        <br>
        <b>Status Toko : </b> {{ $data_toko['status_toko'] }}
    </div>

    <div class="card-body">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Stok</th>
                    <th>Harga</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($data_produk as $item)
                <tr>
                    <th>
                        {{ ($data_produk->perPage() * ($data_produk->currentPage()-1)) + $loop->iteration }}
                    </th>

                    <td>{{ $item->name_product }}</td>
                    <td>{{ $item->stock_product }}</td>
                    <td>Rp. {{ number_format($item->price_product, 0, ',', '.') }}</td>
                    <td>{{ $item->desc_product }}</td>

                    <td>
                        {{-- TOMBOL DETAIL --}}
                        <button type="button"
                            class="btn btn-info text-white"
                            data-bs-toggle="modal"
                            data-bs-target="#detailModal{{ $item->id }}">
                            Detail
                        </button>

                        {{-- TOMBOL DELETE --}}
                        <button type="button"
                            class="btn btn-danger"
                            data-bs-toggle="modal"
                            data-bs-target="#deleteModal{{ $item->id }}">
                            Delete
                        </button>

                        {{-- TOMBOL EDIT --}}
                        <button type="button"
                            class="btn btn-warning"
                            data-bs-toggle="modal"
                            data-bs-target="#editModal{{ $item->id }}">
                            Edit
                        </button>
                    </td>
                </tr>

                {{-- MODAL DETAIL --}}
                <div class="modal fade" id="detailModal{{ $item->id }}" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title">Detail Produk</h5>
                                <button type="button" class="btn-close"
                                    data-bs-dismiss="modal"></button>
                            </div>

                            <div class="modal-body">

                                <div class="card mb-3">
                                    <div class="row g-0">

                                        <div class="col-md-4">
                                            <img src="https://placehold.co/400"
                                                class="img-fluid rounded-start"
                                                alt="Gambar Produk">
                                        </div>

                                        <div class="col-md-8">
                                            <div class="card-body">

                                                <h5 class="card-title">
                                                    {{ $item->name_product }}
                                                </h5>

                                                <ul class="list-group list-group-flush">

                                                    <li class="list-group-item">
                                                        <b>Harga:</b>
                                                        Rp. {{ number_format($item->price_product, 0, ',', '.') }}
                                                    </li>

                                                    <li class="list-group-item">
                                                        <b>Stok:</b>
                                                        {{ $item->stock_product }} pcs
                                                    </li>

                                                    <li class="list-group-item">
                                                        <b>Deskripsi:</b>
                                                        {{ $item->desc_product }}
                                                    </li>

                                                </ul>

                                            </div>
                                        </div>

                                        <p class="card-text p-2 mb-0">
                                            <small class="text-muted">
                                                Terakhir diperbarui:
                                                {{ $item->updated_at }}
                                            </small>
                                        </p>

                                    </div>
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">
                                    Tutup
                                </button>
                            </div>

                        </div>
                    </div>
                </div>

                {{-- MODAL DELETE --}}
                <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title">Konfirmasi Hapus</h5>
                                <button type="button" class="btn-close"
                                    data-bs-dismiss="modal"></button>
                            </div>

                            <div class="modal-body">
                                Apakah kamu yakin ingin menghapus produk
                                <b>{{ $item->name_product }}</b>?
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">
                                    Batal
                                </button>

                                <form action="{{ url('/product/'.$item->id_product) }}"
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

                {{-- MODAL EDIT --}}
                <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">

                            <form action="{{ url('/product/'.$item->id_product) }}"
                                method="POST">

                                @csrf
                                @method('PUT')

                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Produk</h5>
                                    <button type="button" class="btn-close"
                                        data-bs-dismiss="modal"></button>
                                </div>

                                <div class="modal-body">

                                    <div class="mb-3">
                                        <label class="form-label">Nama Produk</label>
                                        <input type="text" name="name_product"
                                            class="form-control"
                                            value="{{ $item->name_product }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Stok Produk</label>
                                        <input type="number" name="stock_product"
                                            class="form-control"
                                            value="{{ $item->stock_product }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Harga Produk</label>
                                        <input type="number" name="price_product"
                                            class="form-control"
                                            value="{{ $item->price_product }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Deskripsi Produk</label>
                                        <textarea name="desc_product"
                                            class="form-control" rows="3"
                                            required>{{ $item->desc_product }}</textarea>
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

                @endforeach
            </tbody>
        </table>
        <div>
            Halaman : {{ $data_produk->currentPage() }} <br />
            Jumlah Data : {{ $data_produk->total() }} <br />
            Data Per Halaman : {{ $data_produk->perPage() }} <br />

        </div>
        {{-- PAGINATION --}}
        <div>
            {{ $data_produk->links('pagination::bootstrap-5') }}
        </div>

    </div>
</div>
@endsection
