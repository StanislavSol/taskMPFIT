<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate();
        $categories = new Category();
        return view('products.index', compact('products', 'categories'));
    }

    public function create()
    {
        $categories = new Category();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => "required|unique:products",
            'category_id' => "required|string",
            'description' => "max:1000",
            'price' => 'required|numeric|decimal:2'
        ]);

        $product = new Product();
        $product->fill($data);
        $product->save();

        flash('Товар успешно создан')->success();

        return redirect()->route('products.index');
    }

    public function show(Product $product)
    {
        $category = Category::findOrFail($product->category_id)->name;

        return view('products.show', compact('product', 'category'));
    }

    public function edit(Product $product)
    {
        $categories = new Category();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => "required|unique:products, name, {$product->id}",
            'category_id' => "required|string",
            'description' => "max:1000",
            'price' => 'required|numeric|decimal:2'
        ]);

        $product->fill($data);
        $product->save();

        flash('Товар успешно изменен')->success();

        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        if ($product->orders()->exists()) {
            flash('Товар не может быть удален')->error();
            return back();
        }
        $product->delete();

        flash('Товар успешной удален')->success();

        return redirect()->route('products.index');
    }
}
