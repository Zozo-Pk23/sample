<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/fontawesome.min.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <title>Index</title>
</head>

<body>
    <h1>User List</h1>
    <table>
        <tr>
            <td>Name</td>
            <td>Email</td>
            <td></td>
            <td></td>
        </tr>
        @foreach($user as $users)
        <tr>
            <td>{{$users->name}}</td>
            <td>{{$users->email}} </td>
            <td>
                <a href="/password/{{$users->id}}">Change Passsword</a>
            </td>
            <td>
                <a href="/edit/{{$users->id}}"><i class="fa fa-address-book" aria-hidden="true"></i></a>
            </td>

            <td>
                <form id="delete-form" method="POST" action="delete/{{$users->id}}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                    <div class="form-group">
                        <button type="submit" onclick="return confirm('Are You Sure Want To Delete')" class="delete-user"><i class="fa-solid fa-heart" aria-hidden="true"></i></button>
                    </div>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>

</html>
<script src="/public/css/fontawesome.min.js"></script>
<!-- <script>

$(document).on("click", ".delete-user", function(e) {
console.log("hllo")
if(confirm("Are you sure you want to delete this?")){
        $("#delete-button").attr("id");
    }
    else{
        return false;
    }

});

</script> -->