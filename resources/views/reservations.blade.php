@extends('layout')

@section('content')
    <h2>My Reservations</h2>
    <br>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            @if(\Illuminate\Support\Facades\Request::route()->uri == 'reservations')
                <th scope="col">Owner</th>
                <th scope="col">Owner Email</th>
            @endif
            <th scope="col">Date & Time</th>
            <th scope="col">Number of People</th>
            <th scope="col">Duration</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($reservations as $reservation)
        <tr>
            <th scope="row" class="min">{{ $reservation->id }}</th>
            @if(\Illuminate\Support\Facades\Request::route()->uri == 'reservations')
                <td>{{ $reservation->user->name }}</td>
                <td>{{ $reservation->user->email }}</td>
            @endif
            <td>{{ $reservation->date_time }}</td>
            <td>{{ $reservation->people }}</td>
            <td>{{ $reservation->duration }} hours</td>
            <td class="min"><a class="btn btn-sm btn-danger">Cancel Reservation</a></td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
