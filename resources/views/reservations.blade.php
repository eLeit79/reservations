@extends('layout')

@section('content')

    @php($showAll = (\Illuminate\Support\Facades\Request::route()->uri == 'reservations'))

    @if($showAll)
        <h2>All Reservations</h2>
    @else
        <h2>My Reservations</h2>
    @endif
    <br>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Date & Time</th>
            <th scope="col">Number of People</th>
            <th scope="col">Duration</th>
            <th scope="col">Table(s)</th>
            @if($showAll)
                <th scope="col">Owner</th>
                <th scope="col" class="min">Owner Id</th>
                <th scope="col">Owner Email</th>
            @endif
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($reservations as $reservation)
        <tr>
            <th scope="row" class="min">{{ $reservation->id }}</th>
            <td>{{ $reservation->date_time }}</td>
            <td>{{ $reservation->people }}</td>
            <td>{{ $reservation->duration }} hours</td>
            <td>
                @foreach($reservation->tables as $table)
                    {{ $table->table_number }}@if(!$loop->last), @endif
                @endforeach
            </td>
            @if($showAll)
                <td>{{ $reservation->user->name }}</td>
                <td class="min">{{ $reservation->user->id }}</td>
                <td>{{ $reservation->user->email }}</td>
            @endif
            <td class="min"><a class="btn btn-sm btn-danger">Cancel Reservation</a></td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
