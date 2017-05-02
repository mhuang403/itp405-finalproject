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
        font-size:50px;
        margin-right:25px;
        font-weight:bolder;
        color:white;
        text-decoration:none;
    }
    #outercontainer{
        background-color:#68000D;
        margin:auto;
        position:absolute;
        padding-top:10px;
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
    }
    #labels{
        float:left;
        margin-right:15px;
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
    #user{
        font-family:Helvetica;
        font-size:25px;
        color:white;
        position:relative;
        float:left;
        padding-top:25px;
        margin-left:40px;
    }
    #links{
        float:left;
        /*padding-right:100px;*/
    }
    #logout{
        float:right;
        width:140px;
        /*margin-right:10px;*/

    }

    /* Slideshow */

    * {box-sizing:border-box}

    /* Slideshow container */
    .slideshow-container {
        max-width: 1000px;
        position: relative;
        padding: 30px;
        margin: auto;
    }

    .mySlides {
        display: none;
    }

    /* Next & previous buttons */
    .prev, .next {
        cursor: pointer;
        position: absolute;
        top: 50%;
        width: auto;
        margin-top: -22px;
        padding: 16px;
        color: white;
        font-weight: bold;
        font-size: 18px;
        transition: 0.6s ease;
        border-radius: 0 3px 3px 0;
    }

    /* Position the "next button" to the right */
    .prev {
        left: 0;
        border-radius: 3px 0 0 3px;
    }

    .next {
        right: 0;
        border-radius: 3px 0 0 3px;
    }

    /* On hover, add a black background color with a little bit see-through */
    .prev:hover, .next:hover {
        background-color: rgba(0,0,0,0.8);
    }

    /* Caption text */
    .text {
        color: #f2f2f2;
        font-size: 15px;
        padding: 8px 12px;
        position: absolute;
        bottom: 8px;
        width: 100%;
        text-align: center;
    }

    /* Number text (1/3 etc) */
    .numbertext {
        color: #f2f2f2;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
    }

    /* The dots/bullets/indicators */
    .dot {
        cursor:pointer;
        height: 13px;
        width: 13px;
        margin: 0 2px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
        transition: background-color 0.6s ease;
    }

    .active, .dot:hover {
        background-color: #717171;
    }

    /* Fading animation */
    .fade {
        -webkit-animation-name: fade;
        -webkit-animation-duration: 1.5s;
        animation-name: fade;
        animation-duration: 1.5s;
    }

    @-webkit-keyframes fade {
        from {opacity: .4}
        to {opacity: 1}
    }

    @keyframes fade {
        from {opacity: .4}
        to {opacity: 1}
    }

</style>
<body style="background-color:#FFFACC">

<div id="outercontainer">
    <div style="position:relative;padding-left:30px;padding-right:30px;">
        <a href="/winelist" id="name"> Vinosaurus </a>
        <div id="links" style="margin:auto;">
            <a href="/about" class="navlink">About Us</a>
            <a href="/winelist/add" class="navlink">Add a Wine</a>
            <a href="/winelist/favorites" class="navlink">Favorites</a>
        </div><!--close intro-->
        <div id="user">Hello, {{ $user->email }}
        </div>
        <div id="logout"><a href="/logout" class="navlink">Logout</a>
        </div>

        <img src="http://www.wineshoplouisville.com/images/wine.jpg" height="500" style="width:100%;opacity:0.8;">

        <div id="body">
            <div style="float:left;text-align:center;center;font-size:30px; color:white;font-weight:bold;">
                Welcome to Vinosaurus! The wine thesaurus dedicated to collecting information on wines from all over the world.
                <hr>
<br>
<div id="main">Vinosaurus was started by Michelle and Sophia, two friends who love wine.
    Check out the photo gallery below for wine and cheese pairing suggestions!</div><br>

                <div class="slideshow-container">
                    <div class="mySlides fade">
                        <div class="numbertext">1 / 5</div>
                        <img src="http://winefolly.com/wp-content/uploads/2014/11/cabernet-cheddar-wine-cheese.jpg" style="width:100%">
                    </div>

                    <div class="mySlides fade">
                        <div class="numbertext">2 / 5</div>
                        <img src="http://winefolly.com/wp-content/uploads/2014/11/pinot-noir-gruyere-comte-wine-cheese.jpg" style="width:100%">
                    </div>

                    <div class="mySlides fade">
                        <div class="numbertext">3 / 5</div>
                        <img src="http://winefolly.com/wp-content/uploads/2014/11/chardonnay-brie-wine-cheese.jpg" style="width:100%">
                    </div>

                    <div class="mySlides fade">
                        <div class="numbertext">4 / 5</div>
                        <img src="http://winefolly.com/wp-content/uploads/2014/11/sauvignon-blanc-wine-goat-cheese.jpg" style="width:100%">
                    </div>

                    <div class="mySlides fade">
                        <div class="numbertext">5 / 5</div>
                        <img src="http://winefolly.com/wp-content/uploads/2014/11/prosecco-asiago-wine-cheese.jpg" style="width:100%">
                    </div>

                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>
                </div>
                <br>

                <div style="text-align:center">
                    <span class="dot" onclick="currentSlide(1)"></span>
                    <span class="dot" onclick="currentSlide(2)"></span>
                    <span class="dot" onclick="currentSlide(3)"></span>
                    <span class="dot" onclick="currentSlide(4)"></span>
                    <span class="dot" onclick="currentSlide(5)"></span>
                </div>

                <script>
                    var slideIndex = 1;
                    showSlides(slideIndex);

                    function plusSlides(n) {
                        showSlides(slideIndex += n);
                    }

                    function currentSlide(n) {
                        showSlides(slideIndex = n);
                    }

                    function showSlides(n) {
                        var i;
                        var slides = document.getElementsByClassName("mySlides");
                        var dots = document.getElementsByClassName("dot");
                        if (n > slides.length) {slideIndex = 1}
                        if (n < 1) {slideIndex = slides.length}
                        for (i = 0; i < slides.length; i++) {
                            slides[i].style.display = "none";
                        }
                        for (i = 0; i < dots.length; i++) {
                            dots[i].className = dots[i].className.replace(" active", "");
                        }
                        slides[slideIndex-1].style.display = "block";
                        dots[slideIndex-1].className += " active";
                    }
                </script>

            </div><!--close body-->
        </div> <!--close outercontainer-->


</body>
</html>