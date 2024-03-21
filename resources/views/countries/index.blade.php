<!-- resources/views/countries/index.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Countries</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <main >
    <h1>Random Countries</h1>
        <div class="col">
    @if (session('message'))
        <div id="alert">
            {{ session('message') }}
        </div>
    @endif
    @if (isset($countries))
        @foreach ($countries as $country)
        <div class="country-container">
            <img src={{ $country['flags']['png'] }}></img>
            <div>
                <h2>{{ $country['name']['common'] }}</h2>
                <span>{{ $country['name']['official'] }}</span>
                <p><strong>Population:</strong> {{ $country['population'] }} </p>
                <p><strong>Timezone:</strong> {{ $country['timezones'][0] }} </p>
            </div>
        </div>
        @endforeach
    @endif
</div>
    </main>
</body>
</html>