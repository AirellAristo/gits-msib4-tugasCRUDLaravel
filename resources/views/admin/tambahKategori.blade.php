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
          <a class="navbar-brand" href="<?php echo substr($actual_link,0,6) ?>">TokoKu (Tambah Kategori)</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
    </nav>

    <div class="mx-3 my-3">
    <form method="POST" action="/admin/tambahKategori">
        @csrf

        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label" >Nama Kategori</label>
          <input type="text" class="form-control @error("nama_kategori") is-invalid @enderror" aria-describedby="emailHelp" name="nama_kategori" >
          @error("nama_kategori")
            <div class="invalid-feedback">
                {{ $message }}
            </div>
          @enderror
        </div>

        <button type="submit" class="btn btn-primary my-3">Submit</button>
      </form>
    </div>

</body>
</html>
