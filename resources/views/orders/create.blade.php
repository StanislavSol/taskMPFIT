@extends('layouts.app')
@section('content')
    <div class="grid col-span-full">
        <h1 class="mb-5">Создание товара</h1>
        <form class="w-50" method="POST" action="{{ route('orders.store') }}">
        @csrf
        <div class="flex flex-col">
            <div>
                <label for="name">ФИО</label>
            </div>
            <div class="mt-2">
            <input class="rounded border-gray-300 w-1/3" type="text" name="fio" id="fio" value="{{ old('fio') }}">
            </div>
            @error('fio')
                <div class="text-rose-600">{{ $message }}</div>
            @enderror
            <div>
                <label for="product_id">Товар</label>
            </div>
            <div>
                <select class="rounded border-gray-300 w-1/3" name="product_id" id="product_id">
                        @foreach ($products->all() as $product)
                            <option value="{{ $product->id }}" {{ $product->id == old('product_id') ? 'selected' : '' }}>{{ $product->name }}</option>
                        @endforeach
                </select>
            </div>
            @error('product_id')
                <div class="text-rose-600">{{ $message }}</div>
            @enderror
            <div>
                <label for="name">Количество</label>
            </div>
            <div class="mt-2">
            <input class="rounded border-gray-300 w-1/3" type="text" name="quality" id="quality" value="{{ old('quality') === null ? 1 : old('quality') }}">
            </div>
            @error('quality')
                <div class="text-rose-600">{{ $message }}</div>
            @enderror
            <div class="mt-2">
               <label for="description">Комментарий</label>
            </div>
            <div>
                <textarea class="rounded border-gray-300 w-1/3 h-32" name="comment" id="comment">{{ old('comment') }}</textarea>
            </div>
            @error('comment')
                <div class="text-rose-600">{{ $message }}</div>
            @enderror
        </div>
        <div class="mt-2">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">Создать</button>
        </div>
    </div>
    </form>
</div>
@endsection
