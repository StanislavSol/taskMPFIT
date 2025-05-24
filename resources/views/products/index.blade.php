@extends('layouts.app')
@section('content')
    <div class="grid col-span-full">
        @include('flash::message')
        <h1 class="mb-5">Товары</h1>
        <div class="w-full flex items-center">
            <a href="{{ route('products.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
               Новый товар
            </a>
        </div>


    <table class="mt-4">
        <thead class="border-b-2 border-solid border-black text-left">
            <tr>
                <th>Id</th>
                <th>Название</th>
                <th>Категория</th>
                <th>Цена</th>
                <th>Действия</th>
            </tr>
        </thead>
        @foreach ($products as $product)
        <tr class="border-b border-dashed text-left">
            <td>{{ $product->id }}</td>
            <td><a class="text-blue-600 hover:text-blue-900" href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a></td>
            <td>{{ $categories::find($product->category_id)->name }}</td>
            <td>{{ $product->price }}</td>
            <td>
                <a data-confirm="Вы уверены?"
                   data-method="delete"
                   class="text-red-600 hover:text-red-900"
                   href="{{ route('products.destroy', $product) }}"
                   rel="nofollow">Удалить</a>
            <a class="text-blue-600 hover:text-blue-900" href="{{ route('products.edit', $product) }}">
                Изменить</a>
            </td>
        </tr>
        @endforeach
            </div>
    </table>
    @endsection
@section('pagination')
{{ $products->links() }}
@endsection
