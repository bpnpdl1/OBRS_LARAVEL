<div class="flex flex-wrap justify-around px-4 pb-6 gap-4">
    @forelse ($bikes as $bike)
        @if ($loop->index >= 4)
        @break
    @endif
    <div
        class="max-w-xs bg-white rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300 transform hover:scale-110">
        <img class="w-full h-48 object-cover"
            src="{{ asset('storage/variant_images/' . $bike->variant->variant_image) }}"
            alt="{{ $bike->variant->variant_name }}">
        <div class="p-4">
            <h2 class="text-xl font-semibold text-gray-800">{{ $bike->variant->variant_name }}</h2>
            <p class="mt-1 text-gray-700 font-semibold">
                Brand: <span class="text-gray-800 ml-2">{{ $bike->variant->brand->brand_name }}.</span>
            </p>
            <p class="mt-1 text-gray-700 font-semibold">
                Rental Price: <span class="text-gray-800 ml-2">{{ $bike->variant->variant_rental_price }}</span>
            </p>
            <p class="mt-1 text-gray-700 font-semibold">
                Bike cc: <span class="text-gray-800 ml-2">{{ $bike->cc }} cc</span>
            </p>
            <form action="{{ route('renter.bikedetails') }}" method="POST">
                @csrf
                <input type="hidden" name="bike_id" value="{{ $bike->id }}">
                <button
                    class="mt-2 w-full bg-gray-600 hover:bg-black text-white font-semibold py-2 px-4 rounded text-center"
                    type="submit">
                    Rent Bike
                </button>
            </form>
        </div>
    </div>
@empty
    <div class="max-w-xs bg-white rounded-lg overflow-hidden">
        <p class="text-xl font-semibold p-4 text-center">No bikes Available</p>
    </div>
@endforelse
</div>
