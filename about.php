<?php
    include 'imports.php';
    $listOfImages = getListOfImages();
?>

<!DOCTYPE html>
<html>
    <head lang="en">
        <meta charset="UTF-8">
        <title>"Magenta Print|Про нас"</title>
        <link href="css/style2.css" rel="stylesheet">
        <link href="css/style_gallery.css" rel="stylesheet">
        <link rel="icon" type="image/png" href="/img/logos/favicon.png"/>
        <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.css">
        <link rel="stylesheet" href="css/lightbox.min.css">
        <?php include 'google_tracking.php'; ?>
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <script src="js/lightbox-plus-jquery.min.js"></script>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>

            @media (max-width: 1550px) {
                .navbar-site-nav-items{
                    padding: 0 1.8rem;
                    font-size: 1.1rem;
                }

                .navbar-site-logos-items{
                    padding: 0 2rem;
                    font-size: 1.1rem;
                }

                .info-container {
                    width:95%;
                }
            }

            @media (max-width: 1350px) {
                .container {
                    width: 90vw;
                }

                .navbar-site-nav-items{
                    padding: 0 1rem;
                    font-size: 1.1rem;
                }

                .navbar-site-logos-items{
                    padding: 0 0.8rem;
                    font-size: 1.1rem;
                }

                .info-container {
                    width:95%;
                }
                
                .magenta-under-logo {
                    flex-wrap: wrap;
                }
            }

            @media (max-width: 1000px) {
                .menu-logo {
                    left: 0.5rem;
                }

                .container {
                    width: 100%;
                }

                .navbar-site-nav-items{
                    padding: 0 0.8rem;
                    font-size: 1.1rem;
                }

                .navbar-site-logos-items{
                    padding: 0 1rem;
                    font-size: 1.1rem;
                }

                .page-logo {
                    width: 98%;
                    min-height: 30vh;
                }

                .info-container {
                    width:95%;
                }

            }

            @media (max-width: 840px) {
                .menu-logo {
                    left: 0.1rem;
                }

                .container {
                    width: 100%;
                }

                .navbar-site-nav-items{
                    padding: 0 0.5rem;
                    font-size: 1.1rem;
                    display: inline-block;
                }

                .navbar-site-logos-items{
                    padding: 0 0.5rem;
                    font-size: 1.1rem;
                    display: inline-block;
                }

                .page-logo {
                    width: 98%;
                    min-height: 30vh;
                }

                .page-logo-image {

                    transform: 
                        translate(-50%, -49%)
                        scale(0.6);
                }

                .full-length-back {
                    display: flex;
                    flex-direction: column;
                    width: 100%;
                    justify-content: center;
                    align-items: center;
                    border-radius: 10px;
                }

                .w {
                    background-color: white;
                }

                .g {
                    background-color: rgba(128, 128, 128, 0.096);
                }

                .info-container {
                    padding: 1rem;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 300px;
                    width: 95%;
                }

                .info-container-text {
                    align-items: center;
                }

                .info-container-img {
                    margin: 0rem;
                    height: 100%;
                    width: 50%;
                    border-radius: 10px;
                    overflow: hidden;
                    position: relative;
                }

                .info-container-img img {
                    min-width: 100%;
                    min-height: 100%;
                    overflow: hidden;
                    position: absolute;
                    top:50%;
                    left:50%;
                    transform: 
                        translate(-50%, -50%)
                        scale(0.7)    
                    ;
                }

                .info-container-text {
                    padding: 0 2rem;
                    width: 50%;
                    text-align: justify;

                }

                .man-woman-container {
                    padding-bottom: 1rem;
                    display: flex;
                    justify-content: space-between;
                    align-items: stretch;
                    flex-wrap: wrap;
                    width: 100%;
                    min-height: 53vh;
                    max-height: 85vh;
                    box-sizing: border-box;
                    margin-top: 0rem;
                    
                }
                
                .man {
                    width: 32%;
                    min-width: 20%;
                    height: 23vh;
                    flex-grow: 0;
                }
                .woman {
                    width: 32%;
                    min-width: 20%;
                    height: 23vh;
                    flex-grow: 0;
                }

                .child {
                    width: 32%;
                    min-width: 20%;
                    height: 23vh;
                    flex-grow: 0;
                }

                .hat {
                    min-width: 48.5%;
                    height: 23vh;
                    flex-grow: 0;

                }

                .bag {
                    min-width: 48.5%;
                    height: 23vh;
                    flex-grow: 0;
                }

            }

            @media (max-width: 755px) {

                html {
                    font-size: 15px;
                }

                .container {
                    width: 100%;
                }
                .relative-for-menu {
                    top:1rem;
                    transition: all 0.25s ease-in-out;
                }
                
                .relative-for-menu.relative-for-menu-activated {
                    top:0rem;
                }

                .menu-label {
                    transform: scale(0);
                    
                }
                .menu-label.menu-label-activated {
                    transform: scale(0);
                }

                .menu-logo {
                    left: 1rem;
                    width: 4rem;
                    height: 4rem;
                    background-color:#f3f3f3;
                    position: absolute;
                    cursor: pointer;
                    display: flex;
                    transition: all 0.5s ease-in-out;
                    transform: rotate(45deg);
                    justify-content: center;
                    align-items: center;
                    box-shadow: 0 0 10px 2px rgb(128, 0, 128);
                }

                .menu-logo-img {
                    width: 2.8rem;
                    height: 2.5rem;
                    transition: all 1s ease-in-out;
                    transform: rotate(-45deg);
                }

                .menu-logo.activated-logo {
                    margin-left: -13px;
                    transform: rotate(-180deg);
                    box-shadow: 0 0 10px 2px rgba(0, 0, 0, 0);
                }

                .menu-logo-img.activated-menu-image{
                    width: 3rem;
                    height: 2.7rem;
                    transform: rotate(-180deg);
                }

                .navbar {
                    margin-left: 0px;
                    width: 0%;
                    height: 4rem;
                    background-color:#f3f3f3;
                    display: flex;
                    justify-content: flex-start;
                    align-items: center;
                    transition: all 0.5s ease-in-out;
                    margin-left: 0px;
                }

                .navbar.activated {
                    transition-delay: 0.5s;
                    width: 100%;
                    margin-left: 0px;
                }

                .navbar-left-padding {
                    transition: all 0.5s ease-in-out;
                    width:0%;
                }   

                .navbar-left-padding.navbar-left-padding-activated {
                    width:10%;
                    
                }
                
                .navbar.activated {
                    height: 9rem;
                    margin-left: 0px;
                    width: 100%;
                }

                .menu-center {
                    height: 0%;
                    transition: all 0.5s ease-in-out;
                    border-left: 2px solid rgba(128, 0, 128, 0);
                }

                .navbar-site-nav-parent-div {
                    width: 40%;
                }

                .navbar-site-nav-items{
                    padding: 0.2rem 0.5rem;
                    display: block;
                    font-size: 1.2rem;
                    transform: scale(0);
                }

                .navbar-site-logos-items{
                    display: block;
                    padding: 0.2rem 0.5rem;
                    font-size: 1.2rem;
                    transform: scale(0);
                }
                
                .page-logo {
                    width: 98%;
                    min-height: 32vh;
                }

                .page-logo-image {

                    transform: 
                        translate(-50%, -45%)
                        scale(0.6);

                }

                .content-header {
                    padding: 1.5rem 0 0 0;
                    font-weight: normal;
                    margin-bottom: -25px;
                }

                .content-header-add-margin {
                    margin-bottom: 1.5rem;
                }

                .full-length-back {
                    display: flex;
                    flex-direction: column;
                    width: 100%;
                    height: 100%;
                    justify-content: center;
                    align-items: center;
                    border-radius: 10px;
                }

                .w {
                    background-color: white;
                }

                .g {
                    background-color: rgba(128, 128, 128, 0.096);
                }

                .info-container {
                    padding: 0rem;
                    display: flex;
                    flex-direction: column;
                    width: 93%;
                    height:auto;
                }

                .info-container-img {
                    width: 97vw;
                    height: 12.5rem;
                    border-radius: 10px;
                    overflow: hidden;
                    position: relative;
                }

                .info-container-img img {
                    min-width: 100%;
                    min-height: 100%;
                    overflow: hidden;
                    position: absolute;
                    top:50%;
                    left:50%;
                    transform: 
                        translate(-50%, -50%)
                        scale(0.5)    
                    ;
                }

                .info-container-text {
                    padding: 0 0rem;
                    width: 98%;
                    text-align: justify;
                }

                .info-container-text-header {
                    padding-top: 1rem;
                }

                .info-container-text-desc {
                    padding-top: 1rem;
                    overflow: auto;
                    font-size: 1.15rem;
                    height:  80%;
                }


                .man-woman-container {
                    padding: 0rem;
                    display: flex;
                    justify-content: center;
                    align-items: stretch;
                    flex-wrap: wrap;
                    width: 100%;
                    min-height: 170vh;
                }

                .man {
                    width: 98%;
                    min-width: 310px;
                    height: 30vh;
                    flex-grow: 0;
                }

                .man img {
                    transform: translate(-50%, -48%)
                    scale(0.21);
                }

                .man:hover img {
                    transform: translate(-50%,-48%)
                    scale(0.23);
                }
                .woman {
                    width: 98%;
                    min-width: 310px;
                    height: 30vh;
                    flex-grow: 0;
                }

                .child {
                    width: 98%;
                    min-width: 310px;
                    height: 30vh;
                    flex-grow: 0;
                }

                .hat {
                    width: 98%;
                    min-width: 310px;
                    height: 30vh;
                    flex-grow: 0;

                }

                .bag {
                    width: 98%;
                    min-width: 310px;
                    height: 30vh;
                    flex-grow: 0;
                }

                .footer {
                    font-size: 1.15rem;
                }
            }

            @media (min-height: 1100px) {
                .page-logo {
                    width: 98%;
                    min-height:25vh;
                    
                }
                .page-logo-image {

                transform: 
                    translate(-50%, -40%)
                    scale(1);                   
                }

                .info-container {
                    width: 95%;
                }

                .man-woman-container {
                    padding-bottom: 0;
                    display: flex;
                    justify-content: space-between;
                    align-items: stretch;
                    flex-wrap: wrap;
                    width: 100%;
                    min-height: 50vh;
                    box-sizing: border-box;
                    margin-top: 0.5rem;
                    
                }

                .man {
                    width: 32%;
                    min-width: 20%;
                    height: 22vh;
                    flex-grow: 0;
                }
                .woman {
                    width: 32%;
                    min-width: 20%;
                    height: 22vh;
                    flex-grow: 0;
                }

                .child {
                    width: 32%;
                    min-width: 20%;
                    height: 22vh;
                    flex-grow: 0;
                }

                .hat {
                    min-width: 48.5%;
                    height: 22vh;
                    flex-grow: 0;

                }

                .bag {
                    min-width: 48.5%;
                    height: 22vh;
                    flex-grow: 0;
                }
            }
            /*LOGO*/
        </style>
        
    </head>
    <body>
        <div class="container" >
            <!--MENU-->
            <div class="relative-for-menu">
                <div class="menu-logo">
                    <img class="menu-logo-img" src="/img/BST/magenta-menu-logo.png">
                    <div class="menu-label">
                            МЕНЮ
                        </div>
                        <script>
                            $( ".menu-logo" ).click(function() {
                                $( ".navbar" ).toggleClass( "activated" );
                                $( ".relative-for-menu").toggleClass( "relative-for-menu-activated" );
                                $( ".navbar-left-padding" ).toggleClass( "navbar-left-padding-activated" );
                                $( ".menu-center" ).toggleClass( "menu-center-activated" );
                                $( ".menu-logo" ).toggleClass( "activated-logo" );
                                $( ".menu-logo-img" ).toggleClass( "activated-menu-image" );
                                $( ".menu-label" ).toggleClass( "menu-label-activated" );
                                $( ".navbar-site-nav-items" ).toggleClass( "navbar-site-nav-items-activated" );
                                $( ".navbar-site-logos-items" ).toggleClass( "navbar-site-logos-items-activated" );
                            });
                        </script>
                </div>
                <div class="navbar">
                    <div class="navbar-left-padding">
                        <span></span>
                    </div>
                    <div class="navbar-site-nav-parent-div">
                        <ul class="navbar-site-nav">
                            <li class="navbar-site-nav-items">
                                <a href="index.php">Головна</a>
                                <div class="menu_underlines_navs">
                                </div>
                            </li>
                            <li class="navbar-site-nav-items">
                                <a href="gallery.php">Галерея</a>
                                <div class="menu_underlines_navs">
                                </div>
                            </li>
                            <li class="navbar-site-nav-items">
                                <a href="price.php">Продаж</a>
                                <div class="menu_underlines_navs">
                                </div>
                            </li>
                            <li class="navbar-site-nav-items">
                                <a href="about.php">Про нас</a>
                                <div class="menu_underlines_navs">
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="menu-center">
                        <span></span>
                    </div>
                    <div class="navbar-site-logos-parent-div">
                        <ul class="navbar-site-logos">
                            <li class="navbar-site-logos-items">
                                <a href="mailto:madzentadruk@gmail.com"><i class="fa fa-envelope">&nbsp;</i>Пошта</a>
                                <div class="menu_underlines_logos">
                                </div>
                            </li>
                            <li class="navbar-site-logos-items">
                                <a href="https://www.facebook.com/Magenta-print-105821100833281/"><i class="fa fa-facebook-square">&nbsp;</i>Facebook</a>
                                <div class="menu_underlines_logos">
                                </div>
                            </li>
                            <li class="navbar-site-logos-items">
                                <a href="https://www.instagram.com/printmagenta/"><i class="fa fa-instagram">&nbsp;</i>Instagram</a>
                                <div class="menu_underlines_logos">
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--MENU-->
            <div class="content-header">
                <h2>ПРО НАС</h2>
            </div>
            <div class="space-between-lots">
                <div class="separator">
                </div>
            </div>
            <!--CONTENT-->
                <div class="full-length-back">
                Перша виготовлена ​​футболка була виготовлена на Мексикансько-Американською війною у 1898 р. Та 1913 р., Коли ВМС США почали випускати їх.<br><br>

                У 1959 році був винайдений пластизол, більш міцний і еламтичний чорнило, що дозволило робити принт на футболки.<br><br>

                У 1960-х рр. створили компанію Monster у місті Мілл-Веллі, штат Каліфорнія, що дозволило виготовляти персональні принти на футболки.<br><br>

                З 1970-х років друк на одязі став популярним способом реклами товарів. Такий метод використовували і для просування товарів Coca-Cola і Mickey Mouse.<br><br>

                А з 2000-х років набув ще більшої популярності серед різних верст населення на дні народження, новий рік, день закоханих. Корпоративні футболки на неселикі магазики кафе і т.д.<br><br>
                </div>
                <div class="space-between-lots">
                </div>
                <div>
                    <img src="img/logos/bitch.png">
                    <img src="img/logos/fruit.png">
                    <img src="img/logos/sted.png">
                </div>
                <!--CONTENT-->
                <div class="space-between-lots">
                </div>
                <!--FOOTER-->
                <div class="footer">
                    <div class="magenta-logo-div">
                        <img class="magenta-logo" src="img/BST/magenta-logo.png" alt="">
                    </div>
                    <div class="magenta-under-logo">
                        <div class="phone-number">
                            <table>
                                <tr>
                                    <td align="center" colspan="3">
                                        <h3>
                                            <i class="fa fa-phone-square"></i>
                                           Телефон:
                                        </h3>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="5" colspan="3">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="icons-decor">
                                            <i class="fa fa-phone"></i>
                                        </div>
                                    </td>
                                    <td width=5></td>
                                    <td align="left">
                                        <a style="text-decoration: underline;
                                                  text-decoration-color: purple;" 
                                           href="tel:380988883332">+380988883332</a>
                                            (Київстар) 
                                    </td>
                                    <td vertical-align="center">
                                        <div class="icons-decor">
                                            <a href="viber://chat?number=380988883332">
                                                <img width=20 style="margin-top:5px; margin-left: 5px;" src="/img/BST/icons/viber-brands.svg">
                                            </a>
                                        </div>
                                    </td>
                                    <td vertical-align="center">
                                        <div class="icons-decor">
                                            <a href="https://t.me/printmagenta">
                                                <img width=20 style="margin-top:5px; margin-left: 5px;" src="/img/BST/icons/tg.png">
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="shedule">
                            <table>
                                <tr>
                                    <td align="center" colspan="3">
                                        <h3>
                                            <img width="15" style="vertical-align: middle;" src="/img/BST/icons/clock-solid.svg">
                                            Графік роботи:
                                        </h3>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="5" colspan="3">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Понеділок:</td>
                                    <td width=5></td>
                                    <td>10:00 — 19:00</td>
                                </tr>
                                <tr>
                                    <td>Вівторок:</td>
                                    <td></td>
                                    <td>10:00 — 19:00</td>
                                </tr>
                                <tr>
                                    <td>Середа:</td>
                                    <td></td>
                                    <td>10:00 — 19:00</td>
                                </tr>
                                <tr>
                                    <td>Четвер:</td>
                                    <td></td>
                                    <td>10:00 — 19:00</td>
                                </tr>
                                <tr>
                                    <td>П'ятниця:</td>
                                    <td></td>
                                    <td>10:00 — 19:00</td>
                                </tr>
                                <tr>
                                    <td>Субота:</td>
                                    <td></td>
                                    <td>10:00 — 17:00</td>
                                </tr>
                                <tr>
                                    <td>Неділя:</td>
                                    <td></td>
                                    <td>10:00 — 17:00</td>
                                </tr>
                            </table>
                        </div>
                        <div class="address">
                            <table >
                                <tr>
                                    <td align="center" colspan="3">                                        
                                        <h3>
                                          <img width="20" src="/img/BST/icons/place-of-worship-solid.svg">
                                           Адреса:
                                        </h3>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="5" colspan="3">
                                    </td>
                                </tr>
                                    <tr>
                                        <td align="center"><a style="
                                            text-decoration: underline;
                                            text-decoration-color: purple;
                                            " href="https://goo.gl/maps/65MSBQRFT82XLG6e8">м. Луцьк</a>
                                        </td> 
                                    </tr>
                                    <tr>
                                        <td><a style="
                                            text-decoration: underline;
                                            text-decoration-color: purple;
                                            " href="https://goo.gl/maps/65MSBQRFT82XLG6e8">проспект Соборності, 11-Ж</a>
                                        </td>
                                    </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="under-footer g">
                    <?= date("Y") ?> © Magenta Print, Всі права захищені
                </div>
        </div>

    </body>
</html>