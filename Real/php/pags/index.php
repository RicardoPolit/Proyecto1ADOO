<!Doctype html>
<html>
    <head>
        <title>Muebles Quetzal S.A. de C.V.</title>
        <link rel="stylesheet" type="text/css" href="../../css/index.css"/>
        <link rel="stylesheet" href="../../css/w3.css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            .mySlides {
                display:none              
            }
            .w3-left, .w3-right, .w3-badge {cursor:pointer}
            .w3-badge {height:13px;width:13px;padding:0}
        </style>
    <body class="cuerpo">
        <div class="header">
            <div class="content">
                <?php include("../scritps/header.php")?>
            </div>
        </div>
        <div class="container">
            <div class="slider">
                <div class="w3-content w3-display-container" >
                    <img class="mySlides" src='../../img/Mueble4.png' style="width:100%">
                    <img class="mySlides" src='../../img/bkg2.jpg' style="width:100%">
                    <img class="mySlides" src='../../img/bkg3.jpg' style="width:100%">
                    <div class="w3-center w3-section w3-large w3-text-white w3-display-bottommiddle" style="width:100%">
                        <div class="w3-left w3-padding-left w3-hover-text-khaki" onclick="plusDivs(-1)">&#10094;</div>
                        <div class="w3-right w3-padding-right w3-hover-text-khaki" onclick="plusDivs(1)">&#10095;</div>
                        <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(1)"></span>
                        <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(2)"></span>
                        <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(3)"></span>
                    </div>
                </div>
            </div>
            <div id='carro'><a href='' id='lab'><img src='../../img/carrito.png'/></a></div>
        </div>
        <div class="footer">
            <div class="pieC">
                <?php include("../scritps/footer.php")?>
            </div>
        </div>
        <script>
            var slideIndex = 1;
            showDivs(slideIndex);
            carousel();
            function plusDivs(n) {
                showDivs(slideIndex += n);
            }
            
            function currentDiv(n) {
                showDivs(slideIndex = n);
            }
            
            function carousel() {
                var i;
                var x = document.getElementsByClassName("mySlides");
                var dots = document.getElementsByClassName("demo");
                for (i = 0; i < x.length; i++) {
                    x[i].style.display = "none";  
                }
                for (i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace(" w3-white", "");
                }
                slideIndex++;
                if (slideIndex > x.length) {slideIndex = 1}    
                x[slideIndex-1].style.display = "block";
                dots[slideIndex-1].className += " w3-white";
                setTimeout(carousel, 5000); // Change image every 2 seconds
            }

            function showDivs(n) {
                var i;   
                var x = document.getElementsByClassName("mySlides");
                var dots = document.getElementsByClassName("demo");
                if (n > x.length) {slideIndex = 1}    
                if (n < 1) {slideIndex = x.length}
                for (i = 0; i < x.length; i++) {
                    x[i].style.display = "none";  
                }
                for (i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace(" w3-white", "");
                }
                x[slideIndex-1].style.display = "block";  
                dots[slideIndex-1].className += " w3-white";
            }
        </script>
    </body>
</html>