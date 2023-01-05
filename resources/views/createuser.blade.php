<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="{{asset('/public/css/reset.css')}}"> -->
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <title>User Create</title>
</head>

<body>
    <form action="/create" method="POST">
        @csrf
        <div class="card">
            <h1>User Create</h1>
            <div class="clearfix">
                <div class="p">
                    <p>Name :</p>
                </div>
                <div class="input">
                    <input type="text" name="name" id="name">
                    @error('name')
                    <div class="message">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="clearfix">
                <div class="p">
                    <p>Email :</p>
                </div>
                <div class="input">
                    <input type="text" name="email" id="email">
                    @error('email')
                    <div class="message">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="clearfix">
                <div class="p">
                    <p>Password :</p>
                </div>
                <div class="input">
                    <input type="text" name="password" id="password">
                    @error('password')
                    <div class="message">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="clearfix" style="margin-top: 20px;">
                <div class="p">
                    <button onclick="document.getElementById('name').value=null;document.getElementById('email').value=null;document.getElementById('password').value=null;" type="reset">Clear</button>
                </div>
                <div class="input">
                    <input type="submit" value="SAVE">
                </div>
            </div>
        </div>
    </form>
</body>

</html>