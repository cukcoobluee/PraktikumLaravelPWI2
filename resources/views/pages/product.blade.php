@extends('layouts.master')

@section('content')

<div class="container">

    <h2 class="mb-3">Daftar produk kami</h2>

    <hr>

    {{-- Tombol Tambah Data --}}
    <button class="btn btn-primary btn-sm mb-2">
        Tambah Data
    </button>

    {{-- Tabel Produk --}}
    <div class="card">

        <div class="card-header">   
            Produk Kami
        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-striped">

                    <thead>
                        <tr>
                            <th width="8%">No</th>
                            <th>Nama Produk</th>
                            <th width="11%">Stok</th>
                            <th width="25%">Harga</th>
                            <th width="30%">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        <tr>
                            <td>1</td>
                            <td>Mark</td>
                            <td>10</td>
                            <td>Rp. 12.000</td>
                            <td>
                                <button class="btn btn-danger btn-sm">
                                    Delete
                                </button>

                                <button class="btn btn-warning btn-sm">
                                    Edit
                                </button>
                            </td>
                        </tr>

                        <tr>
                            <td>2</td>
                            <td>Jacob</td>
                            <td>19</td>
                            <td>Rp. 19.000</td>
                            <td>
                                <button class="btn btn-danger btn-sm">
                                    Delete
                                </button>

                                <button class="btn btn-warning btn-sm">
                                    Edit
                                </button>
                            </td>
                        </tr>

                        <tr>
                            <td>3</td>
                            <td>Larry the Bird</td>
                            <td>4</td>
                            <td>Rp. 5.000</td>
                            <td>
                                <button class="btn btn-danger btn-sm">
                                    Delete
                                </button>

                                <button class="btn btn-warning btn-sm">
                                    Edit
                                </button>
                            </td>
                        </tr>

                        <tr>
                            <td>4</td>
                            <td>Nitro</td>
                            <td>8</td>
                            <td>Rp. 9.000.000</td>
                            <td>
                                <button class="btn btn-danger btn-sm">
                                    Delete
                                </button>

                                <button class="btn btn-warning btn-sm">
                                    Edit
                                </button>
                            </td>
                        </tr>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection