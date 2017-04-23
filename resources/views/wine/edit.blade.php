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

    .form {
        background-color: #FFFACC;
        border-radius: 20px;
        margin: 20px;
        padding: 20px;
    }
</style>

<body>
<div class="container">

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @foreach ($wine as $w)
        <form action="/winelist/{{  $w->wine_id }}" method="post" class="form">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Wine Name: </label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $w->name }}">
            </div>
            <div class="form-group">
                <label for="grape">Grape: </label>
                <input type="text" name="grape" id="grape" class="form-control" value="{{ $w->grape }}">
            </div>
            <div class="form-group">
                <label for="year">Year:</label>
                <input type="text" name="year" id="year" class="form-control" value="{{ $w->year }}">
            </div>
            <div class="form-group">
                <label for="type">Type:</label>

                <select type="text" name="type" id="type" class="form-control">
                    @foreach ($types as $type)
                        @if ($type->wine_type_id === $w->wine_type_id)
                            <option value="{{ $type->wine_type_id }}" selected>
                        @else
                            <option value="{{ $type->wine_type_id }}">
                                @endif
                                {{ $type->wine_type }}
                            </option>
                            @endforeach
                </select>

                {{--<input type="text" name="type" id="type" class="form-control" value="{{ $w->wine_type }}">--}}
            </div>
            <div class="form-group">
                <label for="country">Country:</label>
                <input type="text" name="country" id="country" class="form-control" value="{{ $w->country }}">
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" name="price" id="price" class="form-control" value="{{ $w->price }}">
            </div>

            @endforeach

            <button type="submit" class="btn btn-primary">Update</button>
        </form>



</div>

</body>

</html>