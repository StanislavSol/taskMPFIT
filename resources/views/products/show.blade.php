@extends('layouts.app')
@section('content')
    <div class="grid col-span-full">
        <h2 class="mb-5">Просмотр товара: {{ $product->name }}        <a href="{{ route('products.edit', $product->id)}}">&#9881;</a>
        </h2>
        <p><span class="font-black">Название:</span> {{ $product->name }}</p>
        <p><span class="font-black">Категория:</span> {{ $category }}</p>
        <p><span class="font-black">Описание:</span> {{ $product->description }}</p>
        <p><span class="font-black">Цена:</span> {{ $product->price }}</p>
    </div>

@endsection
