<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Signup</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<style>
    body{
        font-family: Helvetica;
        color:white;
    }
    #name{
        float:left;
        font-size:60px;
        margin-right:40px;
        font-weight:bolder;
        color:white;
        text-decoration:none;
    }
    #outercontainer{
        background-color:#68000D;
        margin:auto;
        padding:50px;
        width:800px;
        height:100%;
    }
    .navlink {
        float:left;
        display: block;
        width: 200px;
        height: 40px;
        margin-top: 25px;
        color:white;
        font-size: 30px;
        text-align: center;
        text-decoration: none;
    }
    .navlink:hover {
        color:#F4DBD8;
        text-decoration:underline;
    }
    #body{
        margin:auto;
        padding-top:20px;
        padding-bottom:20px;
        padding-left:150px;
        padding-right:150px;
    }
    #form{
        background-color:white;
        color:black;
        text-align:left;
        margin-bottom:30px;
        margin-left:20%;
        padding-top:20px;
        padding-left:40px;
        font-size:20px;
        width:60%;
        height:400px;
        position:relative;
        line-height:2;
    }
    #labels{
        float:left;
        margin-right:30px;
    }
    #values{
    }
    .button{
        margin-top:10px;
        width:100px;
        font-size:15px;
        color: #68000D;
        background: white;
        font-weight: bold;
        border: 1px solid #68000D;
    }
    .button:hover {
        color: white;
        background: #68000D;
    }

</style>
<body style="background-color:#FFFACC">

@if (session('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
@endif

<div id="outercontainer">



    <span style="position:relative;font-size:40pt;">
     Vinosaurus
    </span>
    <br>

    Sign Up
    <p>
        Already have an account? Please <a href="/">Login</a>.
    </p>
    <form method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" value="{{Request::old('email')}}">
        </div>
        <div class="form-group">
            <label for="pasword">Password</label>
            <input type="password" id="password" name="password" class="form-control">
        </div>
        <div class="form-group">
            <label for="pasword_confirmation">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
        </div>
        <input type="submit" value="Sign Up" class="btn btn-primary">
    </form>
</div>
</body>
</html>
