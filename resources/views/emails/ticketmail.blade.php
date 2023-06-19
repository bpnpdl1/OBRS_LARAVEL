<div>
    <p>Dear {{ auth()->user()->name }},</p>

    <p>Your Rental Ticket Information is in below</p>

    <div
        style="background-color: rgba(121, 121, 126, 0.315);padding:10%;display: flex;flex-direction: row;justify-content: space-between;width: 100">
        <div>


            Bike Number: {{ $rentalbike->bike->number_plate }} <br>
            Bike Model: {{ $rentalbike->bike->model_year }} <br>
            Rental Status: {{ $rentalbike->rental_status }} <br>
            From Day: {{ $rentalbike->rent_from_date }} <br>
            To Day: {{ $rentalbike->rent_to_date }} <br>
            Rental Price: {{ $rentalbike->bike->variant->variant_rental_price }} <br>
            Rental Days: {{ $rentalbike->total_rental_price / $rentalbike->bike->variant->variant_rental_price }} <br>

            Total Rental Price: {{ $rentalbike->total_rental_price }} <br>

        </div>

        <div style="margin-left: 3px">
            Renter Name: {{ $rentalbike->user->name }} <br>
            Booked on: {{ $rentalbike->created_at->format('Y-m-d') }} <br>
            Payment method: {{ $rentalbike->payment_method }}
            <p> Rental Number: {{ $rentalbike->rental_number }}</p>

        </div>
    </div>
    <br>

    Thank you For Choosing Bike on rent From us. <br>

    Best regards, <br>
    {{ $companyname }} <br>
    {{ $companyaddress }} <br>



</div>
