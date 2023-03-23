<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categoriesModel;
use Illuminate\Support\Facades\DB;


class categoriesControllerAdmin extends Controller
{
    //Digunakan untuk show data
    public function create(){
        $categories=categoriesModel::all();
        return view('admin.tambahKategori',compact('categories'));
    }

    public function data(){
        $categories=categoriesModel::all();
        return view('admin.editHapusKategori',compact('categories'));
    }

    public function edit($id){
        $find = categoriesModel::find($id);
        return view('admin.editKategori',compact("find"));
    }
    // END digunakan untuk show data

    // Digunakan untuk menambahkan data kategori
    public function store(Request $request){
        $validatedData = $request->validate([ //digunakan buat validasi
            'nama_kategori' => 'required|string|max:30|unique:categories_models,nama_kategori',
        ]);
        categoriesModel::create($validatedData);
        return redirect("/admin");
    }
    // END Digunakan untuk menambahkan data kategori

    // Digunakan buat update data
    public function update($id , Request $request){
        $dataProduk=DB::table('categories_models')
                    ->select('nama_kategori')
                    ->where('ID_kategori',$id)
                    ->get();
        $rules = [ //aturan validasi
        ];
        if (categoriesModel::where('nama_kategori', '=', $request->nama_kategori)->count() > 0){
            if($dataProduk[0]->nama_kategori == $request->nama_kategori){
                $rules['nama_kategori'] = 'required|string|max:30|';
            }else{
                $rules['nama_kategori'] = 'required|string|max:30|unique:categories_models,nama_kategori';
            }
        }else{
            $rules['nama_kategori'] = 'required|string|max:30|unique:categories_models,nama_kategori';
        }
        $validatedData = $request->validate($rules);
        categoriesModel::where('ID_kategori',$id)
                        ->update($validatedData);
        return redirect("/admin/editHapusKategori");
    }
    // END Digunakan buat update data

    // Digunakan untuk menghapus data
     public function destroy($id){
        $find = categoriesModel::find($id);
        $find->delete();
        return redirect("/admin/editHapusKategori");
    }
    // END Digunakan untuk menghapus data
}
