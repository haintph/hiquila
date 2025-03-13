@extends('client.layouts.master')

@section('content')
    <div class="dish-details">
        <h2>{{ $dish->name }}</h2>
        <img src="{{ asset($dish->image) }}" alt="{{ $dish->name }}">
        <p>{{ $dish->description }}</p>
        <p>Giá: ${{ $dish->discountedPrice() }}</p>
        @if ($dish->isDiscounted())
            <p>Giá gốc: <del>${{ $dish->price }}</del></p>
        @endif
    </div>
@endsection
