<html>
<head>
    <title>Wine Database</title>
</head>

<style>
    body{
        font-family: Helvetica;
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
        position:absolute;
        padding-top:10px;
        height:1200px;
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

<div id="outercontainer">



    <div style="position:relative;padding-left:30px;padding-right:30px;">
        <a href="/winelist" id="name"> Vinosaurus </a>
        <div style="margin:auto;">
            <a href="/about" class="navlink">About Us</a>
            <a href="/winelist/add" class="navlink">Add a Wine</a>
            <a href="/winelist/favorites" class="navlink">Favorites</a>


            <img src="http://www.wineshoplouisville.com/images/wine.jpg" height="500" style="width:100%;opacity:0.8;">

            <div id="body">
                <div style="float:left;text-align:center;center;font-size:30px; color:white;font-weight:bold;">
                    Welcome to Vinosaurus! The wine thesaurus dedicated to collecting information on wines from all over the world.
                    <hr>

                    <div id="form">
                        <div id="labels">
                            Wine Name:
                            <br/>
                            Grape:
                            <br/>
                            Year Bottled:
                            <br/>
                            Wine Type:
                            <br/>
                            Country:
                            <br/>
                            Price:
                            <br/>
                        </div> <!--close labels-->
                        <div id="values">
                            <form action="/winelist/results" method="get">
                                <input style="width:300px;font-size:15px;font-family:times;" type="text" name="name">
                                <br/>
                                <select style="font-size:15px;font-family:times;width:200px;" name="grape_id">
                                    <option value ="all"> All </option>
                                    @foreach ($grape as $g)
                                        <option value = "{{ $g->grape_id }}">
                                            {{ $g->grape }}
                                        </option>
                                @endforeach
                                <!--                            while ($row = mysqli_fetch_array($results_grapes)){
//                                echo "<option value='" . $row['grape_id'] . "'>";
//                                echo $row['grape'];
//                                echo "</option>";
//                            }
//                            ?>
-->
                                </select>
                                <br/>
                                <input  style="font-size:15px;font-family:times;width:200px;" type ="text" name="year">
                                <br/>
                                <select style="font-size:15px;font-family:times;width:200px;" name="wine_type_id">
                                    <option value ="all"> All </option>
                                    @foreach ($wine_type as $t)
                                        <option value = "{{ $t->wine_type_id }}">
                                            {{ $t->wine_type }}
                                        </option>
                                    @endforeach
                                </select>
                                <br/>
                                <select style="font-size:15px;font-family:times;width:200px;" name="country_id">
                                    <option value ="all"> All </option>
                                    @foreach ($country as $c)
                                        <option value = "{{ $c->country_id }}">
                                            {{ $c->country }}
                                        </option>
                                    @endforeach
                                </select>
                                <br/>
                                <input style="font-size:15px;font-family:times;width:250px;" name="price">
                                <br/>

                                <button class="button" type="submit" value="Submit"/>Submit</button>

                            </form>
                        </div><!--close values-->
                    </div><!--close form-->
                    <hr>
                </div><!--close intro-->
            </div><!--close body-->
        </div> <!--close outercontainer-->


</body>
</html>