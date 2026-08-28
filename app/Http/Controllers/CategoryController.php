<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::get(); //untuk data yang masih sedikit
        $title ="Manajemen Kategori";
        return view('category.index', compact('category','title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Tambah Produk";
        return view('category.create', compact('title'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validate = $request->validate([

                'name' => 'required',

        ]);

        Category::create($validate);
        alert()->info('Kategori berhasil di tambah','SUCCESS');

        return redirect()->to('category')->with('success', 'kategori berhasil ditambah');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = "Ubah data Kategori";
        //$edit = User::find($id); //buat blank space putih
        $edit = Category::findOrFail($id); //nampilin halaman 404 klo ga ketemu
        return view('category.edit', compact('title', 'edit'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $validate = $request->validate([
            'name' => 'required',
        ]);

        $category = Category::findOrFail($id);
        $category->update($validate);

        alert()->success('Kategori berhasil diubah', 'SUCCESS');
        return redirect()->to('category')->with('success', 'kategori berhasil diubah');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        alert()->warning('DATA DIHAPUS','BERHASIL');

        return redirect()->route('category.index')->with('success', 'kategori berhasil di hapus');

    }
}
