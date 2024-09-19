@extends('layouts.renter')

@section('content')
    @include('frontend.partials.cover')

    <!-- Top Bike Rental Brands -->
    <section class="p-10">
        <header class="text-center pb-10">
            <h1 class="text-2xl font-semibold">Top Bike Rental Brands</h1>
            <p class="text-sm">Choose your Brand</p>
        </header>

        <div class="flex flex-wrap justify-around px-4 pb-6 gap-4">
            @foreach ($brands as $brand)
                @if ($loop->iteration > 4)
                @break
            @endif
            <div class="w-1/5 bg-white rounded-lg shadow-lg border border-gray-300">
                <img src="{{ asset('storage/' . $brand->brand_logo) }}" alt="{{ $brand->brand_name }}"
                    class="object-contain h-48 w-full">
                <div class="p-4">
                    <h2 class="text-xl font-semibold text-gray-800">{{ $brand->brand_name }}</h2>
                </div>
            </div>
        @endforeach
    </div>
</section>

<!-- Best Renting Bikes -->
<section class="p-10">
    <header class="text-center pb-10">
        <h1 class="text-2xl font-semibold">Best Renting Bikes</h1>
        <p class="text-sm">Hire Bike on rent</p>
    </header>

    <x-bike-card />
</section>
@endsection
