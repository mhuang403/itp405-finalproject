<!DOCTYPE html>

<html>

<head>
    <title>Wine List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<style>
    body {
        background-color: #68000D;
    }

    h1 {
        color: #FFF;
    }

    .table {
        background-color: #FFFACC;
        border-radius: 20px;
        margin-top: 20px;
    }
</style>

<body>
<div class="container">
    @if (session('successStatus'))
        <div class="alert alert-success" role="alert">
            {{ session('successStatus') }}
        </div>
    @endif

<h1>Favorites</h1>
        <p><a href="/winelist"><< Back to search</a></p>
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
                <td><a href="/winelist/{{ $w->wine_id }}/remove" class="btn">Remove from Favorites</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

</body>

</html>