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
    {{-- ini untuk navigation bar --}}
    <nav class="navbar navbar-expand-lg bg-body-tertiary mx-3">
        <div class="container-fluid">
          <a class="navbar-brand" href="<?php echo substr($actual_link,0,6) ?>">TokoKu (Edit/Hapus Produk)</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
    </nav>
    {{-- END ini untuk navigation bar --}}

    {{-- Card tampilan produk  --}}
    <div class="mt-3">
        <div class="container text-center">
            <div class="row gy-4 gx-1 row-cols-3">
                @foreach ($dataProduk as $produk)
                    <div class="col">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                            <h3 class="card-title">{{ $produk->nama_kategori }}</h3>
                            <h5 class="card-title" style="font-weight: normal;">{{ $produk->nama_produk }}</h5>
                            <p class="card-text">{{ $produk->harga_produk }}</p>
                            <form action="/admin/editHapus/{{ $produk->ID_produk }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin Hapus Produk ?')">Hapus Produk</button>
                            </form>
                            <form action="/admin/editHapus/edit/{{ $produk->ID_produk }}" method="POST" class="d-inline">
                                @method('get')
                                @csrf
                                <button type="submit" class="btn btn-warning">Edit Produk</button>
                            </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    {{-- END Card tampilan produk  --}}
</body>
</html>
