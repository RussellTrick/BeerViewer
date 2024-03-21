<!DOCTYPE html>
<html>
<head>
    <title>Age Verification</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @if (session('message'))
        <div id="alert">
            {{ session('message') }}
        </div>
    @endif

    <main>    
        <form method="POST" action="{{ url('/verify') }}" class="container">
            @csrf
            <div>
                <label for="birthdate">Enter DOB</label>
            </div>
            <input type="date" id="birthdate" name="birthdate" required>
            <input type="submit" value="SUBMIT">
        </form>
    </main
</body>
</html>
