<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <title>Document</title>
</head>

<body>
    <form action="/updatepassword/{{$password->id}}/{{$password}}" method="POST">
        @csrf
        <div class="card">
            <h1>Change Passsword</h1>
            <div class="clearfix">
                <div class="p">
                    <p>Old Password :</p>
                </div>
                <div class="input">
                    <input type="password" name="oldpassword" id="oldpassword" value="{{$password->password}}">
                    @error('oldpassword')
                    <div class="message">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="clearfix">
                <div class="p">
                    <p>New Password :</p>
                </div>
                <div class="input">
                    <input type="password" name="newpassword" id="newpassword">
                    @error('newpassword')
                    <div class="message">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="clearfix">
                <div class="p">
                    <p>Confirm Password :</p>
                </div>
                <div class="input">
                    <input type="password" name="password_confirmation" id="password_confirmation">
                    @error('password_confirmation')
                    <div class="message">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="clearfix" style="margin-top: 20px;">
                <div class="p">
                    <button onclick="document.getElementById('oldpassword').value=null;document.getElementById('newpassword').value=null;document.getElementById('password_confirmation').value=null;" type="reset">Clear</button>
                </div>
                <div class="input">
                    <input type="submit" value="Change Password">
                </div>
            </div>
        </div>
    </form>
</body>

</html>