<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\keranjangModels;
use Illuminate\Support\Facades\DB;

class keranjangController extends Controller
{
    // Digunakan untuk menampilkan data
    public function transaksi($id){
        $dataProduk=DB::table('product_models')
                    ->join('categories_models', 'categories_models.ID_kategori', '=', 'product_models.ID_kategori')
                    ->select('ID_produk','nama_produk','harga_produk')
                    ->where('ID_produk',$id)
                    ->get();
        return view("admin.tambahKeranjang",compact("dataProduk"));
    }

    public function keranjang(){
        $produk= DB::table('keranjang_models')
                    ->join('product_models', 'product_models.ID_produk', '=', 'keranjang_models.ID_produk')
                    ->select('*')
                    ->get();
        $totalBayar= DB::table('keranjang_models')->sum('total_harga');
        return view("admin.keranjang",compact("produk","totalBayar"));
    }

    public function edit($id){
        $dataProduk=DB::table('keranjang_models')
                    ->join('product_models', 'product_models.ID_produk', '=', 'keranjang_models.ID_produk')
                    ->select('*')
                    ->where('ID_Keranjang',$id)
                    ->get();
                    return view("admin.editKeranjang",compact("dataProduk"));
    }
    // END Digunakan untuk menampilkan data

    // Digunakan untuk menambahkan data kategori
    public function store(Request $request){
        $idProduk = $request->input('ID_Produk');
        $jumlahProduk = $request->input('jumlah_produk');
        $totalHarga = $request->input('total_harga');
        $checkData = DB::table('keranjang_models')
                        ->where('ID_produk',$idProduk)
                        ->count();
        $jumlah = DB::table('keranjang_models')
                    ->select('*')
                    ->where('ID_produk',$idProduk)
                    ->get();
        if($checkData == 0){
            DB::insert('insert into keranjang_models (jumlah_produk, total_harga,ID_Produk) values (?, ? , ?)', [$jumlahProduk, $totalHarga, $idProduk]);
        }else{
            DB::update( 'update keranjang_models set jumlah_produk ='. $jumlahProduk + $jumlah[0]->jumlah_produk .',total_harga ='. $totalHarga + $jumlah[0]->total_harga .' where ID_Produk = ?',[$idProduk]);
        }
        return redirect("/admin");
    }
    // END Digunakan untuk menambahkan data kategori

    // Digunakan untuk menghapus data
    public function destroy($id){
        $find = keranjangModels::find($id);
        $find->delete();
        return redirect("/admin/keranjang");
    }
    // END Digunakan untuk menghapus data


    // Digunakan untuk mengupdate data
    public function update($id , Request $request){
        $find = keranjangModels::find($id);
        $find->update($request->except(['_token']));
        return redirect("/admin/keranjang");
    }
    // END Digunakan untuk mengupdate data
}
