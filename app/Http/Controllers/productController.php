<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\productModels;
use App\Models\categoriesModel;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\DB;

class productController extends Controller
{
    // Digunakan untuk menampilkan data
    public function data(){
        $dataProduk=DB::table('product_models')
                    ->join('categories_models', 'categories_models.ID_kategori', '=', 'product_models.ID_kategori')
                    ->select('*')
                    ->get();
        return view("admin.editHapus",compact("dataProduk"));
    }

    public function indexAdmin(){
        $dataProduk=DB::table('product_models')
                    ->join('categories_models', 'categories_models.ID_kategori', '=', 'product_models.ID_kategori')
                    ->select('*')
                    ->get();
        return view("admin.productViewAdmin",compact("dataProduk"));
    }

    public function create(){
        $dataProduk=DB::table('product_models')
                    ->join('categories_models', 'categories_models.ID_kategori', '=', 'product_models.ID_kategori')
                    ->select('*')
                    ->get();
        $categories = categoriesModel::all();
        return view("admin.tambah",compact("dataProduk","categories"));
    }

    public function gudang(){
        $dataProduk=DB::table('product_models')
                    ->join('categories_models', 'categories_models.ID_kategori', '=', 'product_models.ID_kategori')
                    ->select('*')
                    ->get();
        return view("templating.product",compact("dataProduk"));
    }

    public function edit($id){
        $find = productModels::find($id);
        $categories = categoriesModel::all();
        return view('admin.edit',compact("find","categories"));
    }
    // END Digunakan untuk menampilkan data

    // Digunakan buat nambahin data
    public function store(Request $request){
        $validatedData = $request->validate([ //digunakan buat validasi
            'nama_produk' => 'required|string|max:30|unique:product_models,nama_produk',
            'harga_produk' => 'required|integer',
            'ID_kategori' => 'required|integer'
        ]);
        productModels::create($validatedData);
        return redirect("/admin")->with("success");
    }
    // END Digunakan buat nambahin data

    // Digunakan buat update data
    public function update($id , Request $request){
        $dataProduk=DB::table('product_models')
                    ->select('nama_produk')
                    ->where('ID_produk',$id)
                    ->get();
        $name = $request->input('nama_produk');
        $rules = [ //aturan validasi
            'harga_produk' => 'required|integer',
            'ID_kategori' => 'required|integer'
        ];

        //apakah terdapat nama produk yang sama?
        if (productModels::where('nama_produk', '=', $request->nama_produk)->count() > 0) {
            //Jika iya disini dibuat query dengan mengambil nama produk berdasarkan request id
            // DAN cek apakah nama produk sama dengan request
            if($dataProduk[0]->nama_produk == $request->nama_produk){
                $rules['nama_produk'] = 'required|string|max:30|';
            }else{
                $rules['nama_produk'] = 'required|string|max:30|unique:product_models,nama_produk';
            }
        }else{
            $rules['nama_produk'] = 'required|string|max:30|unique:product_models,nama_produk';
        }
        $validatedData = $request->validate($rules);

        productModels::where('ID_produk',$id)
                         ->update($validatedData);
        return redirect("/admin/editHapus");
    }
    // END Digunakan buat update data

    // Digunakan untuk menghapus data
    public function destroy($id){
        $find = productModels::find($id);
        $find->delete();
        return redirect("/admin/editHapus");
    }
    // END Digunakan untuk menghapus data
}
