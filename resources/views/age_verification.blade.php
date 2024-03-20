<!DOCTYPE html>
<html>
<head>
    <title>Age Verification</title>
    <style>
        #alert {
            visibility: hidden;
            min-width: 250px;
            margin-left: -125px;
            color: white;
            padding: 20px;
            background-color: #f44336;
            text-align: center;
            border-radius: 2px;
            position: fixed;
            z-index: 1;
            left: 50%;
            bottom: 30px;
            font-size: 17px;
            transition: visibility 0s, opacity 0.5s linear;
            font-family: monospace;
        }

        .show {
            visibility: visible!important;
            opacity: 1!important;
        }
    </style>
</head>
<body>
    @if (session('message'))
        <div id="alert">
            {{ session('message') }}
        </div>
    @endif

    <form method="POST" action="{{ url('/verify') }}">
        @csrf
        <label for="birthdate">Birthdate:</label>
        <input type="date" id="birthdate" name="birthdate">
        <input type="submit" value="Submit">
    </form>

    <script>
        window.onload = function() {
            var alert = document.getElementById('alert');
            alert.className = 'show';
            setTimeout(function(){ alert.className = alert.className.replace('show', ''); }, 3000);
        };
    </script>
</body>
</html>
