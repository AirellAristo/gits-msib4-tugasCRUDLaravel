<?php
$actual_link = "$_SERVER[REQUEST_URI]"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <title>Tambah Produk</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary mx-3">
        <div class="container-fluid">
          <a class="navbar-brand" href="<?php echo substr($actual_link,0,6) ?>">Keranjangku</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
    </nav>

        <table class="table mt-3">
            <thead>
              <tr>
                <th scope="col">Nama Produk</th>
                <th scope="col">Harga Satuan</th>
                <th scope="col">Jumlah Produk</th>
                <th scope="col">Total Harga</th>
                <th scope="col">Tindakan</th>
              </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($produk as $produk )
                    <tr>
                        <td>{{ $produk->nama_produk }}</td>
                        <td>{{ $produk->harga_produk }}</td>
                        <td>{{ $produk->jumlah_produk }}</td>
                        <td>{{ $produk->total_harga }}</td>
                        <td>
                            <form action="/admin/keranjang/editKeranjang/{{ $produk->ID_Keranjang }}" method="POST" class="d-inline">
                                @method('get')
                                @csrf
                                <button class="btn btn-warning">Edit</button>
                            </form>
                            <form action="/admin/keranjang/hapusKeranjang/{{ $produk->ID_Keranjang }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                <tbody class="table-group-divider">
                    <tr>
                        <td colspan="3" style="font-weight:bold">Total Bayar</td>
                        <td colspan="5">Rp {{ $totalBayar }}</td>
                    </tr>
            </tbody>
          </table>
