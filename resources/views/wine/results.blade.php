<!DOCTYPE html>

<html>

<head>
    <title>Wine List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<style>
body {
    /*background-color: #68000D;*/
    font-family: Helvetica;
}

.table {
    background-color: #FFFACC;
    border-radius: 20px;
    margin-top: 20px;
}
    #name{
        float:left;
        font-size:50px;
        margin-right:25px;
        font-weight:bolder;
        color:white;
        text-decoration:none;
    }
    #outercontainer{
        background-color:#68000D;
        margin:auto;
        padding-top:10px;
        height:100%;
    }
    .navlink {
        float:left;
        display: block;
        width: 140px;
        height: 40px;
        margin-top: 25px;
        color:white;
        font-size: 25px;
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

<div class="container">
    @if (session('successStatus'))
        <div class="alert alert-success" role="alert">
            {{ session('successStatus') }}
        </div>
    @endif



<div id="outercontainer">

            <div style="position:relative;padding-left:30px;padding-right:30px;">
                <a href="/winelist" id="name"> Vinosaurus </a>
                <div style="margin:auto;">
                    <a href="/about" class="navlink">About Us</a>
                    <a href="/winelist/add" class="navlink">Add a Wine</a>
                    <a href="/winelist/favorites" class="navlink">Favorites</a>
                    <img src="http://www.wineshoplouisville.com/images/wine.jpg" height="500" style="width:100%;opacity:0.8;">
                    <p><a href="/winelist"><< Back to search</a></p>
            <span style="color:white; font-weight:bold; font-size: 18pt;">Count:</span>

            <table class="table">
                <thead>
                <tr>
                    <th>Red</th>
                    <th>White</th>
                    <th>Sparking</th>
                    <th>Rose</th>
                    <th>Port</th>
                    <th>Dessert</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $red }}</td>
                        <td>{{ $white}}</td>
                        <td>{{ $sparkling }}</td>
                        <td>{{ $rose }}</td>
                        <td>{{ $port }}</td>
                        <td>{{ $dessert }}</td>
                    </tr>
                </tbody>
            </table>
    <span style="color:white; font-weight:bold; font-size: 18pt;">Search Results:</span>
    <table class="table">
        <thead>
        <tr>
            <th>Wine Name</th>
            <th>Grape</th>
            <th>Year</th>
            <th>Wine Type</th>
            <th>Country</th>
            <th>Price</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($wine as $w)
            <tr>
                <td><a href="/winelist/{{ $w->wine_id }}">{{ $w->name }}</a></td>
                <td>{{ $w->grape }}</td>
                <td>{{ $w->year }}</td>
                <td>{{ $w->wine_type }}</td>
                <td>{{ $w->country }}</td>
                <td>${{ $w->price }}</td>
                <td><a href="/winelist/{{ $w->wine_id }}/delete" class="btn">Delete</a></td>
                <td><a href="/winelist/{{ $w->wine_id }}/favorite" class="btn">Favorite</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</div>
</div>

</body>

</html>