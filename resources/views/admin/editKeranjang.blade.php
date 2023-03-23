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
          <a class="navbar-brand" href="<?php echo substr($actual_link,0,6) ?>">TokoKu (Edit Keranjang)</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
    </nav>

    <form method="POST" class="w-50 ms-3 mt-3"  action="/admin/keranjang/editKeranjang/{{ $dataProduk[0]->ID_Keranjang }}">
        @method('put')
        @csrf
        <input type="hidden" name="ID_Produk" value={{ $dataProduk[0]->ID_produk }} readonly="readonly">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Nama Produk</label>
          <input type="text" class="form-control" disabled value="{{ $dataProduk[0]->nama_produk}}">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Harga</label>
          <input type="number" class="form-control" disabled value="{{ $dataProduk[0]->harga_produk}}">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label" >Jumlah Yang Dibeli</label>
            <input type="number" class="form-control" id="jumlahBarang" style="width:100px;" onkeydown="return false" onchange=myFunction() min=1 value={{ $dataProduk[0]->jumlah_produk }} name="jumlah_produk">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Total Yang Harus Dibayar</label>
            <input type="number" class="form-control" id="totalHarga" value={{ $dataProduk[0]->harga_produk * $dataProduk[0]->jumlah_produk}} name="total_harga" readonly="readonly">
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>


    <script>
        function myFunction() {
            var x = document.getElementById("jumlahBarang").value;
            document.getElementById("totalHarga").value = x * {{ $dataProduk[0]->harga_produk}};
            // if(x.length != 0){
            //     document.getElementById("totalHarga").value = x;
            //      console.log(x);
            // }else{
            //      console.log("0");
            // }
        }
    </script>
</body>
</html>
