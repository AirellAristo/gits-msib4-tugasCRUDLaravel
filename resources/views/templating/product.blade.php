<div class="mt-3">
    <div class="container text-center">
        <div class="row gy-4 gx-1 row-cols-3">
            @foreach ($dataProduk as $produk)
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                        <h3 class="card-title">{{ $produk->nama_kategori }}</h3>
                        <h5 class="card-title" style="font-weight:normal;">{{ $produk->nama_produk }}</h5>
                        <p class="card-text">{{ $produk->harga_produk }}</p>
                        <form action="/admin/beli/{{ $produk->ID_produk }}" method="post">
                            @method('get')
                            @csrf
                            <button type="sumbit" class="btn btn-primary">Beli Produk</a></button>
                        </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
