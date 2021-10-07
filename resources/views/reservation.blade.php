@extends('layout')

@section('content')

    <div class="row justify-content-center">
        <div class="col col-xl-6 col-lg-6 col-md-8 col-sm-10 col-xs-12">
            <div class="card">
                <h4 class="card-header">Make a Reservation</h4>
                <div class="card-body">
                    <form action="" method="post">
                        @method('PUT')
                        @csrf

                        <div class="form-group mb-3">
                            <label for="peopleField">Number of People</label>
                            <select name="people" id="peopleField" class="form-control">
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="dateField">Date</label>
                            <select name="date" id="dateField" class="form-control">
                                @foreach($dates as $date)
                                    <option value="{{ $date->format(DateTimeInterface::ISO8601) }}">{{ $date->format('F j, Y') }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="timeField">Time</label>
                            <select name="time" id="timeField" class="form-control">
                                <option value="1">16:00</option>
                                <option value="2">18:00</option>
                                <option value="3">20:00</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="durationField">Duration</label>
                            <select name="duration" id="durationField" class="form-control">
                                <option value="1">2 hours</option>
                                <option value="2">4 hours</option>
                                <option value="3">6 hours</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="tableField">Table(s)</label>
                            <select name="table" id="tableField" class="form-control" multiple>
                                @foreach($tables as $tableId => $tableNumber)
                                <option value="{{ $tableId }}">Table no. {{ $tableNumber }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="drinksField">Choose a Drink</label>
                            <select name="drinks" id="drinksField" class="form-control">
                                @foreach($drinks as $drink)
                                    <option value="{{ $drink['id'] }}">{{ $drink['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="mealsField">Choose a Meal</label>
                            <select name="meals" id="mealsField" class="form-control">
                                @foreach($meals as $meal)
                                    <option value="{{ $meal['idMeal'] }}">{{ $meal['strMeal'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button class="btn btn-primary btn-block" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
