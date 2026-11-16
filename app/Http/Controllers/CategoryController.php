<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    // Menampilkan data kategori
    public function index()
    {
        $data_category = Category::paginate(5);
        return view('pages.category.show', compact('data_category'));
    }

    // Menyimpan kategori
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|min:3|max:50',
            'description' => 'required'
        ]);

        Category::create($request->all());

        return redirect('/category')->with('message', 'Kategori berhasil ditambahkan!');
    }

    // Mengubah kategori
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'required|min:3|max:50',
            'description' => 'required'
        ]);

        $category = Category::findOrFail($id);

        $category->update($request->all());

        return redirect('/category')->with('message', 'Kategori berhasil diperbarui!');
    }

    // Menghapus kategori
    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        $category->delete();

        return redirect('/category')->with('message', 'Kategori berhasil dihapus!');
    }
}
