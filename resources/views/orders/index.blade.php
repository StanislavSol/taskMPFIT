@extends('layouts.app')
@section('content')
    <div class="grid col-span-full">
        @include('flash::message')
        <h1 class="mb-5">Заказы</h1>
        <div class="w-full flex items-center">
            <a href="{{ route('orders.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
               Новый заказ
            </a>
        </div>


    <table class="mt-4">
        <thead class="border-b-2 border-solid border-black text-left">
            <tr>
                <th>Id</th>
                <th>ФИО</th>
                <th>Товар</th>
                <th>Статус</th>
                <th>Итоговая цена</th>
                <th>Дата создания</th>
                <th>Действия</th>
            </tr>
        </thead>
        @foreach ($orders as $order)
        <tr class="border-b border-dashed text-left">
            <td>{{ $order->id }}</td>
            <td>{{ $order->fio }}</td>
            <td>{{ $products::find($order->product_id)->name }}</td>
            <td>{{ $order->status }}</td>
            <td>{{ $order->final_price }}</td>
            <td>{{ $order->created_at->format('Y-m-d') }}</td>
            <td>
                <a data-confirm="Вы уверены?"
                   data-method="delete"
                   class="text-red-600 hover:text-red-900"
                   href="{{ route('orders.destroy', $order) }}"
                   rel="nofollow">Удалить</a>
            <a class="text-blue-600 hover:text-blue-900" href="{{ route('orders.edit', $order) }}">
                Просмотр</a>
            </td>
        </tr>
        @endforeach
            </div>
    </table>
    @endsection
@section('pagination')
{{ $orders->links() }}
@endsection
