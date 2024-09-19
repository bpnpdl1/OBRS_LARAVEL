<div>
    {{-- Success is as dangerous as failure. --}}

    <form wire:submit.prevent="submit" method="POST">
        <div class="flex justify-start items-center gap-10 bg-slate-500 p-10 h-96" id="divCover">
            <!-- Date selection form -->
            <div class="bg-slate-100 rounded-md p-5 w-1/3">
                <h2 class="text-3xl font-semibold text-center mb-4">Choose Dates</h2>
                <div class="flex flex-col md:flex-row gap-3">
                    <!-- From Date -->
                    <div>
                        <label for="from_date" class="block">From Date</label>
                        <input type="date" min="{{ $from_min_date }}" wire:model="from_date" name="from_date"
                            class="appearance-none block w-full bg-gray-100 rounded-md p-2 leading-tight">
                    </div>
                    <!-- To Date -->
                    <div>
                        <label for="to_date" class="block">To Date</label>
                        <input type="date" min="{{ $from_date }}" name="to_date" id="to_date"
                            wire:model="to_date"
                            class="appearance-none block w-full bg-gray-100 rounded-md p-2 leading-tight">
                    </div>
                </div>
                <!-- Error Message -->
                <div class="text-red-500 text-sm text-center py-1">{{ $err_msg }}</div>
                <!-- Submit Button -->
                <button class="mt-2 w-full bg-gray-700 hover:bg-black text-white font-semibold p-2 rounded-sm"
                    type="submit">Find a Bike</button>
            </div>

            <!-- Promotional Section -->
            <div class="text-white w-1/3">
                <h3 class="text-3xl font-semibold">Your Best Experiences</h3>
                <p class="text-md font-normal">Rent our best bike for your ride</p>
                <button class="mt-1 bg-slate-600 hover:bg-slate-700 px-3 py-1 rounded" type="button">Discover</button>
            </div>
        </div>
    </form>
</div>
