<?php

session_start();

if (is_null($_SESSION["user"])) {
    header('Location: login.html');
}
?>

<!DOCTYPE html>

<head>
    <title>Microdnd大平台</title>
    <meta name="description" content="">
    <meta name="author" content="mico">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            background-color: #333333;
            font-family: "Lato", sans-serif;
        }

        .container {
            padding: 16px;
            background-color: #f7f7f7;
        }

        #logo {
            height: 20px;
        }

        .mySlides {
            max-width: 1200px;
            margin: 0 auto;
        }

        #slide-container {
            max-width: 100%;
            background-color: #000000;
        }

        .fussion-bg {
            width: 100%;
            background-color: rgba(60, 60, 60, 0.6);
            border-radius: 20px;
        }

        #we {
            /* background-color: #FFFFFF; */
        }

        .mlink {
            background: #FF9800;
            display: inline-block;
            padding: 0px 20px;
            border-radius: 5px;
            color: #fff;
            text-decoration: none;
        }

        /* Change styles for span and cancel button on extra small screens */
        @media screen and (max-width: 300px) {}
    </style>
</head>

<body>

    <!-- Navbar -->
     <div class="w3-top">
        <div class="w3-bar w3-black w3-card">
            <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
            <a href="#" class="w3-bar-item w3-button w3-padding-large"><img src="logo.png" id="logo">首頁</a>
            <!-- <a href="#news" class="w3-bar-item w3-button w3-padding-large w3-hide-small">新聞公告</a>
            <a href="#progress" class="w3-bar-item w3-button w3-padding-large w3-hide-small">開發資訊</a>
            <a href="#meeting" class="w3-bar-item w3-button w3-padding-large w3-hide-small">會議記錄</a> -->
        </div>
    </div>

    <!--<div id="navDemo" class="w3-bar-block w3-black w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:46px">
        <a href="#news" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">新聞公告</a>
        <a href="#progress" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">開發資訊</a>
        <a href="#meeting" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">會議記錄</a>
    </div> -->

    <!-- Page content -->
    <div class="w3-content" style="max-width:2000px;margin-top:46px;background:#ffffff;">
        <div class="w3-row-padding w3-padding-32" style="margin:0 auto;width: 200px;">
            <div class="w3-margin-bottom">
                <img src="zuozi.jpg" alt="" style="width:100%" class="w3-hover-opacity">
                <div class="w3-container w3-white">
                    <p><b>端午節獎金活動</b></p>
                    <p class="w3-opacity">2020/06/24</p>
                    <p>第一次的端午節，自己的福利自己來！</p>
                    <button class="w3-button w3-black w3-margin-bottom" onclick="window.location.href = 'round.php'">Join</button>
                </div>
            </div>

        </div>
    </div>


    <!-- Ticket Modal -->
    <!-- <div id="ticketModal" class="w3-modal">
            <div class="w3-modal-content w3-animate-top w3-card-4">
                <header class="w3-container w3-teal w3-center w3-padding-32">
                    <span onclick="document.getElementById('ticketModal').style.display='none'" class="w3-button w3-teal w3-xlarge w3-display-topright">&times;</span>
                    <h2 class="w3-wide"><i class="fa fa-suitcase w3-margin-right"></i>Tickets</h2>
                </header>
                <div class="w3-container">
                    <p><label><i class="fa fa-shopping-cart"></i> Tickets, $15 per person</label></p>
                    <input class="w3-input w3-border" type="text" placeholder="How many?">
                    <p><label><i class="fa fa-user"></i> Send To</label></p>
                    <input class="w3-input w3-border" type="text" placeholder="Enter email">
                    <button class="w3-button w3-block w3-teal w3-padding-16 w3-section w3-right">PAY <i class="fa fa-check"></i></button>
                    <button class="w3-button w3-red w3-section" onclick="document.getElementById('ticketModal').style.display='none'">Close <i class="fa fa-remove"></i></button>
                    <p class="w3-right">Need <a href="#" class="w3-text-blue">help?</a></p>
                </div>
            </div>
        </div> -->



    <!-- End Page Content -->
    </div>

    <!-- Footer -->
    <footer class="w3-container w3-padding-64 w3-center w3-opacity w3-light-grey w3-xlarge">
        <i class="fa fa-facebook-official w3-hover-opacity"></i>
        <i class="fa fa-instagram w3-hover-opacity"></i>
        <!-- <i class="fa fa-snapchat w3-hover-opacity"></i>
        <i class="fa fa-pinterest-p w3-hover-opacity"></i>
        <i class="fa fa-twitter w3-hover-opacity"></i>
        <i class="fa fa-linkedin w3-hover-opacity"></i> -->
        <p class="w3-medium">Powered by microdnd.com</p>
    </footer>

    <script>
        // Automatic Slideshow - change image every 4 seconds
        var myIndex = 0;
        carousel();

        function carousel() {
            var i;
            var x = document.getElementsByClassName("mySlides");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            myIndex++;
            if (myIndex > x.length) {
                myIndex = 1
            }
            x[myIndex - 1].style.display = "block";
            setTimeout(carousel, 4000);
        }

        // Used to toggle the menu on small screens when clicking on the menu button
        function myFunction() {
            var x = document.getElementById("navDemo");
            if (x.className.indexOf("w3-show") == -1) {
                x.className += " w3-show";
            } else {
                x.className = x.className.replace(" w3-show", "");
            }
        }

        // When the user clicks anywhere outside of the modal, close it
        var modal = document.getElementById('ticketModal');
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>

</html>