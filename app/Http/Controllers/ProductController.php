<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->get(); // tambahin with('category')
        $title ="Manajemen Produk";
        return view('product.index', compact('products','title'));

        //return Product::get();
        //return Product::with('category')->get();
        return Category::with('products')->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Tambah Produk";
        return view('product.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([

                'category_id' => 'required',
                'name' => 'required',
                'price' => 'required',
                'description' => 'required'

        ]);

        Product::create($validate);
        alert()->info('Produk berhasil di tambah','SUCCESS');

        return redirect()->to('product')->with('success', 'Produk berhasil ditambah');
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
        $title = "Ubah Data Produk";
        $edit = Product::findOrFail($id); // nampilin halaman 404 klo ga ketemu
        $categories = Category::all();

        return view('product.edit', [
            'title' => $title,
            'edit' => $edit,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'description' => 'required'
        ]);

        $product = Product::findOrFail($id);
        $product->update($validate);

        alert()->success('Produk berhasil diubah', 'SUCCESS');

        return redirect()->to('product')->with('success', 'Produk berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        alert()->warning('DATA DIHAPUS','BERHASIL');

        return redirect()->route('product.index')->with('success', 'produk berhasil di hapus');
    }
}
