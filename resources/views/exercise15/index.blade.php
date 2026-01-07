<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Exercise 15</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h2 class="mb-4">5-day forecast</h2>

    <table class="table table-bordered text-center align-middle">
        <thead class="table-dark">
        <tr>
            <th>City</th>
            <th>Date</th>
            <th>Weather</th>
            <th>Temperature (°C)</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($forecasts as $forecast)
            <tr>
                <td>{{ $forecast->city->name }}</td>
                <td>{{ $forecast->date->format('Y-m-d') }}</td>
                <td>
                    @switch($forecast->weather_type)
                        @case('sunny')
                            <i class="fa-solid fa-sun"></i> sunny
                            @break
                        @case('cloudy')
                            <i class="fa-solid fa-cloud"></i> cloudy
                            @break
                        @case('rainy')
                            <i class="fa-solid fa-cloud-rain"></i> rainy
                            @break
                        @case('snowy')
                            <i class="fa-solid fa-snowflake"></i> snowy
                            @break
                    @endswitch
                </td>
                <td>{{ $forecast->temperature }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
