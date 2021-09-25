<?php
session_start();
?>

<!DOCTYPE html>
<?php

if (is_null($_SESSION["user"])) {
    header('Location: login.html');
}

?>

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="author" content="mico">
    <title>Microdnd 端午節獎金</title>
    <style>
        body {
            background-image: url(https://p1.img.cctvpic.com/cportal/img/photoAlbum/page/performance/img/2018/6/17/1529234654739_221_1080x570.jpg);
            /* background-repeat: no-repeat; */
            background-size: contain;
        }

        #bg {
            width: 650px;
            height: 600px;
            margin: 0 auto;
            background: url(turntable-bg.png) no-repeat;
            background-position: center;
            position: relative;
        }

        img[src^="pointer"] {
            position: absolute;
            z-index: 10;
            top: 200px;
            /* left: 199px; */
            left: calc(50% - 72px);
            width: 150px;
        }

        img[src^="turntable"] {
            position: absolute;
            z-index: 5;
            top: 70px;
            left: calc(50% - 225px);
            transition: all 4s;
            width: 450px;
        }

        #round_title {
            height: 60px;
            line-height: 60px;
            font-size: 28px;
            font-weight: bold;
        }

        #round_sub_title {
            height: 40px;
            line-height: 40px;
            font-size: 16px;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 100;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #ffffff;
            margin: 15% auto;
            padding: 20px;
            padding-left: 30px;
            border: 1px solid #949494;
            width: 500px;
            height: 300px;
            text-align: center;
            line-height: 40px;
        }

        #tip {
            color: #bb0000;
            font-size: 14px;
        }

        #message_img {
            width: 100px;
            height: 100px;
        }

        .close {
            color: #fff;
            background: #c70000;
            border-radius: 5px;
            /* border: 1px #5a0000 solid; */
            width: 100px;
            height: 36px;
            display: block;
            /* float: right; */
            font-size: 18px;
            line-height: 36px;
            font-weight: bold;
            margin: 0 auto;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <?php
        if($_SESSION["played"]==1){
            echo "<script>var result = confirm('你已經抽過了喔!');if(result||!result)window.location.href = \"main.php\";</script>";
        }
        $_SESSION["played"] = 1;
    ?>
    <center>
        <div id="round_title">微點滴端午禮金大轉盤</div>
        <div id="round_sub_title">Hi! <?php echo ucfirst(explode("@", $_SESSION['user'])[0]); ?>快來試試你的運氣吧！</div>
        <div id="bg"><img src="pointer.png" alt="pointer"><img src="turntable.png" alt="turntable"></div>
        <input type="hidden" id="prize" value="--" />
        <input type="hidden" id="name" value="<?php echo ucfirst(explode("@", $_SESSION['user'])[0]); ?>" />
    </center>

    <div id="popup" class="modal">
        <div class="modal-content">
            <p id="message"></p>
            <span class="close" id="close">關閉</span>
        </div>
    </div>

    <script>
        var oPointer = document.getElementsByTagName("img")[0];
        var oTurntable = document.getElementsByTagName("img")[1];
        var cat = 51.4;
        var num = 0;
        var offOn = true;
        var times = 0;
        oPointer.onclick = function() {
            if (times > 0) {
                alert("你已經抽過了喔!");
                window.setTimeout(function(){window.location.href = "main.php";}, 2000);
            } else if (offOn) {
                oTurntable.style.transform = "rotate(0deg)";
                offOn = !offOn;
                ratating();
            }
        }

        function ratating() {
            var timer = null;
            var rdm = 0;
            clearInterval(timer);
            timer = setInterval(function() {
                if (Math.floor(rdm / 360) < 3) {
                    rdm = Math.floor(Math.random() * 3600);
                } else {
                    oTurntable.style.transform = "rotate(" + rdm + "deg)";
                    clearInterval(timer);
                    setTimeout(function() {
                        oTurntable.style.transform = "rotate(-25deg)";
                        offOn = !offOn;
                        num = rdm % 360;
                    }, 4000);
                    setTimeout(function() {

                        var xhttp = new XMLHttpRequest();
                        var url = 'mail.php';
                        var params = 'sys=1';

                        xhttp.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                                document.getElementById("message").innerHTML =
                                    "<img id=\"message_img\" src=\"zuozi.jpg\"/><br>" +
                                    "Hi~" + document.getElementById("name").value + " 恭喜獲得端午節禮金！<br>" +
                                    "得獎資訊已發送給May，請等待後續通知。<br>" +
                                    "<span id=\"tip\">(獎金尚屬個人薪資範疇，請勿與同仁透露或分享。)</span>";
                                modal.style.display = "block";
                            }
                        };

                        xhttp.open('POST', url, true);
                        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                        xhttp.send(params);
                        // alert("恭喜" + document.getElementById("name").value + "獲得端午節禮金!得獎資訊已傳送給May，財神將於某個時刻");
                        times = 1;
                    }, 8000);
                }
            }, 30);
        }

        var modal = document.getElementById("popup");

        // Get the <span> element that closes the modal
        var close = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        close.onclick = function() {
            // modal.style.display = "none";
            window.location.replace("main.php");
        }

        // When the user clicks anywhere outside of the modal, close it
        // window.onclick = function(event) {
        //     if (event.target == modal) {
        //         modal.style.display = "none";
        //     }
        // }
    </script>
</body>

</html>