@extends('layouts.app')
@section('content')
    <div class="grid col-span-full">
        <h1 class="mb-5">Изменение товара</h1>
        <form class="w-50" method="POST" action="{{ route('products.update', $product->id) }}">
        @csrf @method('PUT')
        <div class="flex flex-col">
            <div>
                <label for="name">Название</label>
            </div>
            <div class="mt-2">
            <input class="rounded border-gray-300 w-1/3" type="text" name="name" id="name" value="{{ $product->name }}">
            </div>
            @error('name')
                <div class="text-rose-600">{{ $message }}</div>
            @enderror
            <div class="mt-2">
               <label for="description">Описание</label>
            </div>
            <div>
                <textarea class="rounded border-gray-300 w-1/3 h-32" name="description" id="description">{{ $product->description }}</textarea>
            </div>
            @error('description')
                <div class="text-rose-600">{{ $message }}</div>
            @enderror
            <div>
                <select class="rounded border-gray-300 w-1/3" name="category_id" id="category_id">
                        @foreach ($categories->all() as $category)
                            <option value="{{ $category->id }}" {{ $category->id == old('category_id') ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                </select>
            </div>
            @error('category_id')
                <div class="text-rose-600">{{ $message }}</div>
            @enderror
            <div>
                <label for="name">Цена</label>
            </div>
            <div class="mt-2">
            <input class="rounded border-gray-300 w-1/3" placeholder="0.00" type="text" name="price" id="price" value="{{ $product->price }}">
            </div>
            @error('price')
                <div class="text-rose-600">{{ $message }}</div>
            @enderror
        </div>
        <div class="mt-2">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">Обновить</button>
        </div>
    </div>
    </form>
</div>
@endsection
