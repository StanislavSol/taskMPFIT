@extends('layouts.app')
@section('content')
    <div class="grid col-span-full">
        <h2 class="mb-5">Просмотр заказа: {{ $order->name }}</h2>
        <p><span class="font-black">ФИО покупателя:</span> {{ $order->fio }}</p>
        <p><span class="font-black">Дата создания:</span> {{ $order->created_at->format('Y-m-d') }}</p>
        <p><span class="font-black">Товар: </span> {{ $productName }} x{{ $countProduct }}</p>
        <p><span class="font-black">Комментарий:</span> {{ $order->comment }}</p>
        <p><span class="font-black">Финальная цена:</span> {{ $order->final_price }}</p>
        <p><span class="font-black">Статус:</span> {{ $order->status }}</p>
    </div>
    @if ($order->status === 'Новый')
        <form class="w-50" method="POST" action="{{ route('orders.update', $order->id) }}">
        @csrf @method('PUT')
        <div class="mt-2">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">Выполнить</button>
        </div>
        </form>
    @endif

@endsection
