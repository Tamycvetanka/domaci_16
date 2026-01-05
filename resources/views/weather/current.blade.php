<!doctype html>
<html lang="sr">
<head>
    <meta charset="utf-8">
    <title>Trenutno vreme</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5" style="max-width: 720px;">
    <div class="card shadow-sm">
        <div class="card-body">
            <h2 class="mb-4">Trenutno vreme</h2>

            <form method="POST" action="{{ route('weather.search') }}" class="row g-2 mb-3">
                @csrf
                <div class="col-8">
                    <input
                        class="form-control @error('city') is-invalid @enderror"
                        name="city"
                        value="{{ old('city') }}"
                        placeholder="Grad (npr. Skopje)"
                    >
                    @error('city')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-4">
                    <button class="btn btn-primary w-100">Prikaži</button>
                </div>
            </form>

            @if(isset($city))
                <hr>

                <h3 class="h5 mb-1">{{ $city }}</h3>
                <div class="fs-2 fw-bold mb-1">{{ $temp }} °C</div>

                @if(!empty($description))
                    <div class="text-muted mb-3">{{ $description }}</div>
                @endif

                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Osećaj</span>
                        <span>{{ $feels_like }} °C</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Vlažnost</span>
                        <span>{{ $humidity }} %</span>
                    </li>
                </ul>
            @endif
        </div>
    </div>
</div>

</body>
</html>
