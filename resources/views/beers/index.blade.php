<!-- resources/views/beers/index.blade.php -->
<h1>Random Beers</h1>
@foreach ($beers as $beer)
    <div>
        <h2>{{ $beer['name'] }}</h2>
        <p><strong>ABV:</strong> {{ $beer['abv'] }}</p>  
    </div>
@endforeach
