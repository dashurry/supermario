<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <!-- Header Section -->
    <section>
        <div class="container">
            <nav class="pt-4 navbar navbar-expand-lg navbar-light bg-transparent">
                <a class="navbar-brand" href="#"><img src="img/logo.svg" alt="Logo"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">

                        <li class="nav-item ">
                            <a class="nav-link" href="#">Home</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="#">FAQ</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="#">Sign In</a>
                        </li>


                    </ul>
                </div>
            </nav>
        </div>
    </section>
    <!-- End of Header Section -->



    <!-- Hero -->
    <section class="pb-100">
        <div class="container mt-100">
            <div class="row">
                <div class="col-lg-4">
                    <div class="purchaseArea" id="storePageBtn">
                        <h1>CIAO</h1>
                        <h4>entdecke unsere Pizzakreationen und ausgewählten Gerichte</h4>
                        <div class="purchasebutton mt-4"
                            style="transform: perspective(500px) rotateX(0deg) rotateY(0deg);" data-toggle="modal"
                            data-target=".bd-example-modal-xl">
                            <div class="purchaseicon" id="purchaseicon"
                                style="transform: translate3d(0px, 0px, 0px); transform-style: preserve-3d;"></div>
                            <div class="btntext" style="transform: translate3d(0px, 0px, 0px);">
                                <div class="purchasetitle">BESTELLEN</div>
                                <div class="purchasetext">JETZT ONLINE</div>
                            </div>
                        </div>
                        <p class="mt-4">Einfach Tisch online buchen. Unkompliziert und jederzeit einen Tisch reservieren
                        </p>
                        <a href="#" class="button mt-4" id="tbl_res_btn">Tisch Reservieren</a>
                    </div>
                    <div class="social" style="left: 65px !important;">
                        <a
                            href="https://www.tripadvisor.com/Restaurant_Review-g188068-d10660423-Reviews-Super_Mario_Ristorante_Pizzeria-St_Gallen_Canton_of_St_Gallen.html">
                            <img data-src="img/iconfinder_340_Tripadvisor_logo_4375113.svg" alt=""
                                src="img/iconfinder_340_Tripadvisor_logo_4375113.svg">
                        </a>
                        <a
                            href="https://www.google.com/search?sxsrf=ACYBGNQ9Zh96ZDNoRSomaUvZmQOtKuCAZw%3A1580310205289&amp;ei=vZ4xXuamEdLdwQLm54iYDw&amp;q=super+mario+ristorante&amp;oq=super+mar&amp;gs_l=psy-ab.3.0.35i39l3j0i273j0l6.1295.2432..3058...0.0..0.107.893.9j1......0....1..gws-wiz.......0i67j0i7i30j0i131j0i10i67.eSD-IoiF_q8">
                            <img data-src="img/icons8-google.svg" alt="" src="img/icons8-google.svg">
                        </a>
                        <a href="https://www.facebook.com/SUPERMARIORISTORANTE/">
                            <img data-src="img/icons8-facebook-old.svg" alt="" src="img/icons8-facebook-old.svg">
                        </a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="food-hero-container">
                        <div class="food-hero">
                            <img src="img/salata-tuna.webp" alt="">
                        </div>
                        <div class="tab-menu">
                            <a class="active" href="#">Salat</a>
                            <a href="#">Pasta</a>
                            <a href="#">Pizza</a>
                            <a href="#">Pizza</a>
                            <div class="bg-blue"></div>
                        </div>

                        <div class="tab-menu-odd">
                            <a style="background-image: url('img/Icon-Color.svg');" href="#">Pasta</a>
                            <a style="background-image: url('img/Icon-Style.svg');" href="#">Pizza</a>
                            <a style="background-image: url('img/Icon-Shadow.svg');" href="#">Pasta</a>
                            <div class="bg-white100"></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Hero -->


    <!-- Second Section -->
    <section class="section2">
        <img data-src="img/background-4.svg" alt="" class="background-section-two" src="img/background-4.svg">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-6 col-6 text-right">
                    <img width="150px" height="150px" src="img/plug-in.png" alt="">
                </div>
                <div class="col-lg-5 col-md-6 col-sm-6 col-6 text-right">
                    <img src="img/cloud.svg" width="186px" height="auto" alt="">
                </div>
            </div>

            <div class="row">
                <div class="col-lg-9 text-center">
                    <div id="15f12db3-ecff-bebd-09d4-7862ca85b74c" class="lottie-animation-2"></div>
                </div>
            </div>

            <div class="row mt-6rem cloud-view">
                <img src="img/mountains-clouds.svg" class="cloudImg" alt="">
                <img src="img/tree.svg" class="treeImg" alt="">
                <img data-src="img/flyingpaper.svg" alt="" class="paperplane" src="img/flyingpaper.svg">
                <div class="col-lg-8 col-md-6 text-right">
                    <img class="macImg" src="img/MacBook.webp" alt="">
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="mac-area">
                        <h2>Dieses ist wo "wir "trifft "dich ".</h2>
                        <p>Hier treffe ich Sie und wir treffen sie und es kommt zu Zusammengehörigkeit 😉
                            Wir haben diese Website erstellt, auf der Sie Ihre Bestellungen aufgeben
                            und Kontakt mit uns aufnehmen können</p>
                        <div class="social mt-5">
                            <a href="#"><img data-src="img/icons8-google.svg" alt=""
                                    src="img/iconfinder_340_Tripadvisor_logo_4375113.svg"></a>
                            <a href="#"><img data-src="img/icons8-google.svg" alt="" src="img/icons8-google.svg"></a>
                            <a href="#"><img data-src="img/icons8-google.svg" alt=""
                                    src="img/icons8-facebook-old.svg"></a>
                        </div>

                        <a href="#" class="button w-button mt-5" id="tbl_res_btn">Tisch Reservieren</a>
                    </div>

                </div>

            </div>
        </div>
    </section>
    <!-- End -->


    <!-- Third Section -->
    <section class="sec3 mt-150">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <img width="150px" height="150px" src="img/section3-icon.png" alt="">
                </div>
            </div>

            <div class="row mt-100 justify-content-center">
                <div class="col-lg-4 col-md-6 ">
                    <div class="mac-area">
                        <h2>WE’VE GOT YOU COVERED!BRO...</h2>
                        <p>So viele Pizzas. So viele Möglichkeiten. Schauen Sie vorbei, rufen Sie uns an oder bestellen
                            Sie online. Es war nie einfacher, Ihre Pizza zu bekommen.
                            Es gibt unendlich viele Möglichkeiten, Ihre Pizza durch Bearbeiten, Ändern von Elementen
                            zusammenzustellen. Hier sind einige Beispiele</p>
                        <div class="social mt-5">
                            <a href="#"><img data-src="img/icons8-google.svg" alt=""
                                    src="img/iconfinder_340_Tripadvisor_logo_4375113.svg"></a>
                            <a href="#"><img data-src="img/icons8-google.svg" alt="" src="img/icons8-google.svg"></a>
                            <a href="#"><img data-src="img/icons8-google.svg" alt=""
                                    src="img/icons8-facebook-old.svg"></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 text-center">
                    <div id="6baebf70-2edf-fa57-bcf9-ef01e4b6c8bc" class="lottie-animation-12"></div>
                </div>
            </div>

            <div class="row mt-6rem">

                <div class="col p-0">
                    <div class="prImg">
                        <img src="img/salata-tuna.webp" alt="">
                    </div>
                </div>
                <div class="col p-0">
                    <div class="prImg">
                        <img src="img/salata-blue-avocado.webp" alt="">
                    </div>
                </div>
                <div class="col p-0">
                    <div class="prImg">
                        <img src="img/salata-cabb.webp" alt="">
                    </div>
                </div>
                <div class="col p-0">
                    <div class="prImg">
                        <img src="img/salata-caesar-1.webp" alt="">
                    </div>
                </div>
                <div class="col p-0">
                    <div class="prImg">
                        <img src="img/salata-chicken-caprese.webp" alt="">
                    </div>
                </div>
                <div class="col p-0 mt-3">
                    <div class="prImg">
                        <img src="img/paste-tagliatelle-pirata.webp" alt="">
                    </div>
                </div>
                <div class="col p-0 mt-3">
                    <div class="prImg">
                        <img src="img/paste-gnocchi-spek-gorgonzola.webp" alt="">
                    </div>
                </div>
                <div class="col p-0 p-0 mt-3">
                    <div class="prImg">
                        <img src="img/paste-pomodorro-basilico.webp" alt="">
                    </div>
                </div>
                <div class="col p-0 mt-3">
                    <div class="prImg">
                        <img src="img/paste-carbonara.webp" alt="">
                    </div>
                </div>
                <div class="col p-0 mt-3">
                    <div class="prImg">
                        <img src="img/paste-penne-arrabiatta.webp" alt="">
                    </div>
                </div>
                <div class="col p-0 mt-3">
                    <div class="prImg">
                        <img src="img/paste-lasagna-clasica.webp" alt="">
                    </div>
                </div>
                <div class="col p-0 mt-3">
                    <div class="prImg">
                        <img src="img/paste-tortelinni-quattro-formaggi.webp" alt="">
                    </div>
                </div>
                <div class="col p-0 mt-3">
                    <div class="prImg">
                        <img src="img/paste-tagliatelle-ragu.webp" alt="">
                    </div>
                </div>
                <div class="col p-0 mt-3">
                    <div class="prImg">
                        <img src="img/paste-tagliatelle-porcini.webp" alt="">
                    </div>
                </div>
                <div class="col p-0 mt-3">
                    <div class="prImg">
                        <img src="img/paste-penne-panna-prosciutto-e-funghi.webp" alt="">
                    </div>
                </div>
                <div class="col p-0 p-0 mt-3">
                    <div class="prImg">
                        <img src="img/italineasca-diavola-salam-dulce.webp" alt="">
                    </div>
                </div>
                <div class="col p-0 mt-3">
                    <div class="prImg">
                        <img src="img/pizza-romaneasca-moldoveneasca.webp" alt="">
                    </div>
                </div>
                <div class="col p-0 mt-3">
                    <div class="prImg">
                        <img src="img/italiana-crudo-rucola.webp" alt="">
                    </div>
                </div>
                <div class="col p-0 mt-3">
                    <div class="prImg">
                        <img src="img/italiana-margherita.webp" alt="">
                    </div>
                </div>
                <div class="col p-0 mt-3">
                    <div class="prImg">
                        <img src="img/pizza-romaneasca-maramureseana.webp" alt="">
                    </div>
                </div>
                <div class="col p-0 mt-3">
                    <div class="prImg">
                        <img src="img/pizza-italeana-capriciosa.webp" alt="">
                    </div>
                </div>
                <div class="col p-0 mt-3">
                    <div class="prImg">
                        <img src="img/pizza-italiena-finocchio-salsicia.webp" alt="">
                    </div>
                </div>
                <div class="col p-0 mt-3">
                    <div class="prImg">
                        <img src="img/italiana-prosciutto-crudo-2.webp" alt="">
                    </div>
                </div>
                <div class="col p-0 mt-3">
                    <div class="prImg">
                        <img src="img/italiana-boscaiola.webp" alt="">
                    </div>
                </div>
                <div class="col p-0 mt-3">
                    <div class="prImg">
                        <img src="img/pizza-italiana-speck-gorgonzola.webp" alt="">
                    </div>
                </div>
                <div class="col p-0 mt-3">
                    <div class="prImg">
                        <img src="img/italiana-boscaiola.webp" alt="">
                    </div>
                </div>
                <div class="col p-0 mt-3">
                    <div class="prImg">
                        <img src="img/pizza-italeana-calzone.webp" alt="">
                    </div>
                </div>
                <div class="col p-0 mt-3">
                    <div class="prImg">
                        <img src="img/desert-tiramisu.webp" alt="">
                    </div>
                </div>
                <div class="col p-0 mt-3">
                    <div class="prImg">
                        <img src="img/desert-cannolli.webp" alt="">
                    </div>
                </div>
                <div class="col p-0 mt-3">
                    <div class="prImg">
                        <img src="img/desert-cheesecake.webp" alt="">
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End -->

    <!-- 4th Section -->
    <section class="sec4 mt-10">
        <img data-src="img/background7.svg" alt="" class="image-15" src="img/background7.svg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <img width="150px" height="150px" src="img/mockup-icon.png" alt="">
                </div>
            </div>

            <div class="row mt-60">
                <div class="col-lg-7 col-md-6 text-center">
                    <div id="4334fc75-2eb4-895a-851e-b90c5787e136" class="lottie-animation-3"></div>
                </div>
                <div class="col-lg-5 col-md-6 ">
                    <div class="text-area">
                        <h2>Get your own slice of Heaven</h2>
                        <p>Sowohl Fleischliebhaber als auch Vegetarier werden etwas nach ihrem Geschmack finden, und
                            Zöliakie-Leidende brauchen nicht weiter zu suchen - wir bieten glutenfreie Pizzen an!</p>
                        <div class="social mt-5">
                            <a href="#"><img data-src="img/icons8-google.svg" alt=""
                                    src="img/iconfinder_340_Tripadvisor_logo_4375113.svg"></a>
                            <a href="#"><img data-src="img/icons8-google.svg" alt="" src="img/icons8-google.svg"></a>
                            <a href="#"><img data-src="img/icons8-google.svg" alt=""
                                    src="img/icons8-facebook-old.svg"></a>
                        </div>
                        <a href="#" class="mt-5 button shia-labeouf w-button">Just Do It</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End -->


    <!-- Slider Section -->
    <section class="mt-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9 text-center">
                    <div class="blue-nav">
                        <div class="d-flex items">
                            <a data-card="1" name="sliderMenu" class="active p-2 flex-fill"
                                href="#"><span>WIR</span></a>
                            <a data-card="2" name="sliderMenu" class="p-2 flex-fill" href="#"><span>4</span> Jahren</a>
                            <a data-card="3" name="sliderMenu" class="p-2 flex-fill" href="#"><span>
                                    🗺️</span> Tracker</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="slider-container">
            <div class="slider">
                <div id="c1" data-card="1" class="custom-card active ps1">
                    <img src="img/background7.svg" class="card-bg1" alt="">
                    <img src="img/random-p-500.png" alt="">
                    <img src="img/Rossopomodoro-min-p-500.png" class="rpromo" alt="">
                    <img src="img/Salad-removebg-preview-p-500.png" class="salad-plate" alt="">
                    <img src="img/Soda-2-p-1080.png" class="soda-can" alt="">
                    <div class="text-center er">
                        <h2 class="wir">Erleben Sie den Unterschied</h2>
                        <p class="wir">Eines von allen, natürlich, Produkte aus Italien, insbesondere der Region
                            Kampanien, die
                            Verwendung von hochwertigen Zutaten für Qualität und Raffinesse. <br />Alle unsere Produkte
                            werden
                            präzise ausgewählt, um die bestmögliche Qualität
                            zu liefern.</p>
                    </div>
                </div>
                <div data-card="2" class="custom-card card2 ps1">
                    <img src="img/bump.jpg" class="bmp" alt="">
                    <div style="margin-top: -50px;">
                        <div class="text-center">
                            <h2>4 Jahre <br> Super Mario</h2>
                            <p class="mt-4">vielen herzlichen Dank für Ihr Vertrauen in uns!</p>
                        </div>
                        <div class="social text-center" style="left: 20px !important;">
                            <a
                                href="https://www.tripadvisor.com/Restaurant_Review-g188068-d10660423-Reviews-Super_Mario_Ristorante_Pizzeria-St_Gallen_Canton_of_St_Gallen.html">
                                <img data-src="img/iconfinder_340_Tripadvisor_logo_4375113.svg" alt=""
                                    src="img/iconfinder_340_Tripadvisor_logo_4375113.svg">
                            </a>
                            <a
                                href="https://www.google.com/search?sxsrf=ACYBGNQ9Zh96ZDNoRSomaUvZmQOtKuCAZw%3A1580310205289&amp;ei=vZ4xXuamEdLdwQLm54iYDw&amp;q=super+mario+ristorante&amp;oq=super+mar&amp;gs_l=psy-ab.3.0.35i39l3j0i273j0l6.1295.2432..3058...0.0..0.107.893.9j1......0....1..gws-wiz.......0i67j0i7i30j0i131j0i10i67.eSD-IoiF_q8">
                                <img data-src="img/icons8-google.svg" alt="" src="img/icons8-google.svg">
                            </a>
                            <a href="https://www.facebook.com/SUPERMARIORISTORANTE/">
                                <img data-src="img/icons8-facebook-old.svg" alt="" src="img/icons8-facebook-old.svg">
                            </a>
                        </div>
                        <div class="justify-content-center">
                            <!-- Primary translucent button -->
                            <a style="margin: 25px auto;" href="#widget" class="middle_card-button w-button">Review
                                Us!</a>
                        </div>
                    </div>
                </div>
                <div data-card="3" class="custom-card card3 ps1">
                    <div id="1073c957-e0d3-cd2a-44c5-081f3f124b79" class="lottie-animation-8"></div>
                    <div id="60a53772-2399-c3e7-2c8a-a49a425ece35" class="lottie-animation-7"></div>
                    <div class="trackerText pr-3 pl-3">
                        <div class="text-center">
                            <h2>TRACK<br> YOUR PIZZA</h2>
                            <p class="mt-4">Verfolgen Sie Ihre Bestellung von der Minute, in der Sie sie aufgeben, bis
                                zu dem Zeitpunkt, an dem sie zur Auslieferung ausgeht.</p>
                        </div>
                        <div class="justify-content-center">
                            <!-- Primary translucent button -->
                            <a style="margin: 65px auto;" href="#shop.html" class="middle_card-button w-button">Track</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Slider End -->

    <!-- Section Phone -->
    <section class="phoneSec">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-3">
                    <img src="img/FirstPhone.svg" alt="">
                </div>
                <div class="col-md-3">
                    <img src="img/Phonebottom III.svg" alt="">
                    <div id="7cdf7a2f-c635-65da-b58b-9f3c9d1b6343" class="lottie-animation-13"></div>
                </div>
                <div class="col-md-3">
                    <img src="img/Phonecomplete.svg" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- End -->

    <!-- Section Food Img -->
    <section class="foodImg">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 text-center">
                    <img width="150px" height="150px" src="img/WallPaperSectionIcon.png" alt="">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mt-5">
                <div class="col-lg-5 col-md-6 ">
                    <div class="mac-area">
                        <h2>WE’VE GOT YOU COVERED!BRO...</h2>
                        <p>So viele Pizzas. So viele Möglichkeiten. Schauen Sie vorbei, rufen Sie uns an oder bestellen
                            Sie online. Es war nie einfacher, Ihre Pizza zu bekommen. Es gibt unendlich viele
                            Möglichkeiten, Ihre Pizza durch Bearbeiten, Ändern von
                            Elementen zusammenzustellen. Hier sind einige Beispiele</p>
                        <div class="social mt-5">
                            <a href="#"><img data-src="img/icons8-google.svg" alt=""
                                    src="img/iconfinder_340_Tripadvisor_logo_4375113.svg"></a>
                            <a href="#"><img data-src="img/icons8-google.svg" alt="" src="img/icons8-google.svg"></a>
                            <a href="#"><img data-src="img/icons8-google.svg" alt=""
                                    src="img/icons8-facebook-old.svg"></a>
                        </div>
                        <a href="#" class="mt-5 button shia-labeouf w-button">Just Do It</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <img src="img/WallPaperSectionContaienrIllustration.svg" alt="">
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-6 mt-5" style="padding-left: 30px; padding-right: 30px;">
                    <img class="imgSm mt-100" src="img/b-standard-h1-image3.jpg" alt="">
                    <img class="imgSm mt-100" src="img/port-5-img-2-600x600.webp" alt="">
                </div>
                <div class="col-lg-5 col-md-6 mt-5">
                    <img class="imgSm" src="img/motorino-hong-kong-italian-pizzeria-2.webp" alt="">
                    <img class="imgSm mt-100" src="img/69986184_91795387191.webp" alt="">
                    <img class="imgSm mt-100" src="img/mike-marquez-VnlyIQxQS10-unsplash-min.webp" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- End -->

    <!-- Section Testimonial -->
    <section class="mt-80">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 text-center mb-6">
                    <img src="img/testimonial-icon.png" width="150px" height="150px" alt="">
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 text-center mb-2">
                    <h1 style="color: black;">Loved By 8000</h1>
                </div>
            </div>
            <div class="mt-5 row justify-content-center">
                <div class="col-lg-12 text-center brand-logo">
                    <img src="img/Google.svg" alt="Google">
                    <img src="img/Apple.svg" alt="Google">
                    <img src="img/airbnb.svg" alt="Google">
                    <img class="amazon" src="img/amazon.svg" alt="Google">
                    <img src="img/facebook.svg" alt="Google">
                    <img src="img/Square.svg" alt="Google">
                </div>
            </div>

            <div class="mt-100 row justify-content-center">
                <div class="col-lg-3">
                    <div class="testimonials__tweetbox">
                        <img style="width: 160%; height: auto; margin-left: -100px;" src="img/instagram.png" alt="">
                    </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="testimonials__tweetbox">
                            <img style="width: 160%; height: auto; margin-left: -100px;" src="img/instagram2.png" alt="">
                        </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="testimonials__tweetbox">
                                <img style="width: 160%; height: auto; margin-left: -100px;" src="img/instagram3.png" alt="">
                            </div>
                            </div>
                </div>

            <div class="row justify-content-center">
                <div class="col-lg-3">
                    <div class="testimonials__testimonialcard1">
                        <div class="testimonials__textbubble">
                            <img data-src="img/quote.svg" alt="" class="image-47" src="img/quote.svg">
                            <img data-src="img/quotes.svg" alt="" class="image-48" src="img/quotes.svg">
                            <p class="paragraph-3">Habe wirklich schon bei vielen Italiener gegessen, doch bei Super
                                Mario erhält man einen kulinarische Qualität zu einem sehr fairen
                                Preis-Leistungsverhältnis.Vielleicht ist es Ansichtssache, aber ich habe da schon oft
                                gegessen
                                und wurde wirklich noch nie enttäuscht.</p>
                            <div class="shape"></div>
                        </div>
                        <div class="testimonials__personcontainer">
                            <div class="testimonials__person">
                                <div class="testimonials__avatar">
                                    <img data-src="img/Kris.webp" alt="" class="image-51" src="img/Kris.webp">
                                </div>
                                <div class="avatarname">
                                    <h5 class="heading-11">Ninos M.</h5>
                                    <p class="paragraph-5"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="testimonials__testimonialcard1">
                        <div class="testimonials__textbubble">
                            <img data-src="img/quote.svg" alt="" class="image-47" src="img/quote.svg">
                            <img data-src="img/quotes.svg" alt="" class="image-48" src="img/quotes.svg">
                            <p class="paragraph-3">Das Personal ist fortlaufend stark befleißigt und ohne Unterlass
                                galant!Allem in allem vermittelt das Lokal einen schönen Eindruck.Die Auswahl der
                                Getränke empfanden meine Schwester und ich bombig!Ich war schon lange nicht mehr so
                                fasziniert von einem Lokal.</p>
                            <div class="shape"></div>
                        </div>
                        <div class="testimonials__personcontainer">
                            <div class="testimonials__person alexanderIcon">
                                <div class="testimonials__avatar">
                                    <img data-src="img/Alexander Schultheiss.webp" alt="" class="image-51"
                                        src="img/Alexander Schultheiss.webp">
                                </div>
                                <div class="avatarname">
                                    <h5 class="heading-11">Alexander Schultheiss</h5>
                                    <p class="paragraph-5"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="testimonials__testimonialcard1">
                        <div class="testimonials__textbubble">
                            <img data-src="img/quote.svg" alt="" class="image-47" src="img/quote.svg">
                            <img data-src="img/quotes.svg" alt="" class="image-48" src="img/quotes.svg">
                            <p class="paragraph-3">Sehr orginell man fühlt sich gleich wie in Italien, Die Pizzas sind
                                super gleich auch die vorspeisen die sie anbieten ! Das alles hat natürlich seinen Preis
                                und ist im verlgeich mit anderen Restaurants auf luxuriösen seite. Trotz dem immer
                                wieder einen besuch wert!</p>
                            <div class="shape"></div>
                        </div>
                        <div class="testimonials__personcontainer">
                            <div class="testimonials__person jussufIcon">
                                <div class="testimonials__avatar">
                                    <img data-src="img/Jussuf Lieberherr.webp" alt="" class="image-51"
                                        src="img/Jussuf Lieberherr.webp">
                                </div>
                                <div class="avatarname">
                                    <h5 class="heading-11">Jussuf Lieberherr</h5>
                                    <p class="paragraph-5"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            

        </div>
    </section>
    <!-- End -->

    <!-- Section FAQ -->
    <section class="faqSection">
        <img data-src="img/Background6.svg" alt="" class="backgroundFaqSection" src="img/Background6.svg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="text-center">
                    <h1>Frequently Asked Questions</h1>
                </div>
            </div>
            <div class="row mt-100 justify-content-center">
                <div class="col-md-12">
                    <div class="faq__card1">
                        <div>
                            <h5 class="heading-15">Glutenfrei, bekomme ich echt was?</h5>
                            <p class="paragraph-9">Auf jeden Fall. Wir bieten glutenfreie Pizzen an jedoch ist zu
                                beachten das wir versuchen immer, mit einem frischen Teig zu arbeiten,daher ist es
                                möglich dass uns der Teig ausgehen könnte.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mt-4">
                    <div class="faq__card2">
                        <div>
                            <h5 class="heading-16">Können Sie grosse Gesellschaften unterbringen?Private
                                Veranstaltungen?</h5>
                            <p class="paragraph-10">Das Restaurant bietet platz für max. 40 Personen. Jedoch haben bei
                                uns bereits Geburtstage, Firmenessen und Verlobungen statt gefunden.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 mt-4">
                    <div class="faq__card3">
                        <div>
                            <h5 class="faq__card3title">Verfügen Sie über Wi-Fi?</h5>
                            <p class="paragraph-11">Ja, wir bieten kostenlose Wi-Fi.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 mt-4">
                    <div class="faq__card4">
                        <div>
                            <h5 class="faq__card4title">Warum dauert es manchmal so lange,bis ich meine Lieferung
                                erhalte? :)</h5>
                            <p class="paragraph-12">Manchmal gehen 20 Bestellung auf einmal ein, da man oft nicht alles
                                innerhalb von 20 Minuten aus der Tür bekommen kann.
                                Stattdessen fangen die Bestellungen an, sich zu stauen und in 40-50 Minuten ist es
                                vernünftig,alles aus der Tür zu bekommen.
                                Ohne in Betracht zu ziehen, dass wir auch Leute im Restaurant haben, die darauf warten,
                                bedient zu werden.
                                Im Moment können wir das Zustellpersonal nicht entsprechend der Nachfrage aufstocken.
                            </p>
                        </div>
                    </div>
                </div>


                <div class="col-md-5">
                    <h1 class="pricingcard__title">Hier! Werfe einen Blick auf unseren Informationsschalter.</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- End -->

    <!-- Pricing Section -->
    <section class="pricing-area">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="price-box" style="left: 100px;top: 45px;">
                    <img src="img/price_card_right.svg" alt="">

                    <div class="purchasebutton free_button">
                        <div class="purchaseicon free_buttonicon"></div>
                        <div class="btntext">
                            <div class="purchasetitle">Menü</div>
                            <div class="purchasetext">DOWNLOAD</div>
                        </div>
                    </div>

                    <div class="free-text-box">
                        <h1 class="heading-19">Öffnungszeiten</h1>
                        <ul role="list" class="w-list-unstyled">
                            <li>
                                <p class="paragraph-23">
                                    Mo&nbsp;-&nbsp;Fr&nbsp;11.30&nbsp;-&nbsp;13.30<br>17.30&nbsp;-&nbsp;22.00
                                </p>
                            </li>
                            <li>
                                <p class="paragraph-23">Sa&nbsp;17.30&nbsp;-&nbsp;23.00</p>
                            </li>
                            <li>
                                <p class="paragraph-23">So&nbsp;17.30&nbsp;-&nbsp;21.00</p>
                            </li>
                            <li>
                                <p class="paragraph-23">Di&nbsp;-&nbsp;RUHETAG</p>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="price-box">
                    <img class="active" src="img/pricing_card_middle.svg" alt="">
                    <div class="store-illus">
                        <div class="animation">
                            <div id="07ec2f54-076f-1b9c-72a4-39590e7a2adf" class="lottie-animation-5"></div>
                        </div>
                    </div>
                    <div class="pro-text-box">
                        <h1 class="heading-17">Mindestbestellung und Liefergebiet</h1>
                        <ul role="list" class="list w-list-unstyled mt-5">
                            <li class="_1000-mockups">
                                <p class="paragraph-22">CHF 20 - St.Gallen</p>
                            </li>
                            <li class="_1000-mockups">
                                <p class="paragraph-22">CHF 30 - Wittenbach</p>
                            </li>
                            <li class="_1000-mockups">
                                <p class="paragraph-22">
                                    CHF 40 - Engelburg, Speicher, Mörschwil,<br>Niederteufen
                                </p>
                            </li>
                            <li class="_1000-mockups">
                                <p class="paragraph-22">CHF 50 - Trogen, Teufen </p>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="price-box" style="right: 90px;top: 45px;z-index: -1;">
                    <img src="img/price_card_left.svg" alt="">

                    <div class="purchasebutton lifetime_button">
                        <div class="purchasetitle">Tisch</div>
                        <div class="purchasetext">RESERVIEREN</div>
                        <div class="purchaseicon"></div>
                    </div>
                    <div class="lifetime-text-box">
                        <h1 class="heading-23">Kontakt</h1>
                        <ul role="list" class="list-2 w-list-unstyled">
                            <li class="list-item">
                                <p class="paragraph-20">Bürglistrasse 2</p>
                            </li>
                            <li class="list-item">
                                <p class="paragraph-21">9000 St. Gallen</p>
                            </li>
                            <li class="list-item">
                                <p class="paragraph-21">Tel. 071 534 64 00</p>
                            </li>
                            <li class="list-item">
                                <p class="paragraph-21">info@supermario.com</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center mt-4">
                <div class="purchasebutton mt-4" style="transform: perspective(500px) rotateX(0deg) rotateY(0deg);">
                    <div class="purchaseicon" id="purchaseicon"
                        style="transform: translate3d(0px, 0px, 0px); transform-style: preserve-3d;"></div>
                    <div class="btntext" style="transform: translate3d(0px, 0px, 0px);">
                        <div class="purchasetitle">BESTELLEN</div>
                        <div class="purchasetext">JETZT ONLINE</div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mt-4">
                <p class="pricing-note">Mockups are downloadable. Prices will
                    increase as Library grows. Using Angle for your team?Contact us for Team licenses.</p>
            </div>
            <div class="row justify-content-center mt-100 mb-6">
                <div id="00b4246a-bf0b-84cd-fe3e-14bae2c8da8a" class="lottie-animation-6"></div>
                
                <div class="widget" id="widget">
                    <div class="widget_shape"></div>
                    <h3 class="widget_title">Review Us!</h3>
                </div>
            </div>
        </div>
    </section>
    <!-- End -->


    <!-- Section Footer -->
    <section>
        <div class="footer__footerwrapper">
            <div class="footer__contentgrid">
                <div class="footer__leftwrapper">
                    <div class="footer__linkwrapper">
                        <a href="/" class="footer_link w--current">Home</a>
                        <a href="/" class="footer_link pricing w--current">Pricing</a>
                        <a href="/" class="footer_link mockup w--current">Werbung</a>
                        <a href="/" class="footer_link updates w--current">Updates</a>
                        <a href="/" class="footer_link downloads w--current">Downloads</a>
                        <a href="/" class="footer_link tutorials w--current">Tutorials</a>
                    </div>
                    <div class="footer__dctext">
                        <div>Made with love by me</div>
                    </div>
                    <div class="div-block-52">
                        <div>
                            2020 ©<a href="https://index.html/terms">Terms of Service</a>
                            -<a href="https://angle.sh/privacy">Privacy Policy</a>
                        </div>
                    </div>
                </div>
                <div id="w-node-d9cc0fe344fe-e9e6a061" class="footer__rightwrapper">
                    <div class="footer__newsletterwrapper">
                        <div class="footer__newslettertext">
                            <img data-src="img/Icon-Email.svg" alt="" class="image-61" src="img/Icon-Email.svg">
                            <div>
                                Abon&shy;nie&shy;ren um Updates über neue<br>zu erhalten. max. 1 E-Mail pro Monat. Kein
                                Spam.
                            </div>
                        </div>
                        <div class="footer__newsletterinput">
                            <div class="form-block-3 w-form">
                                <form id="email-form" name="email-form" data-name="Email Form" class="form-2">
                                    <input type="email" class="text-field w-input" maxlength="256" name="email"
                                        data-name="Email" placeholder="Your email" id="email" required="">
                                    <input type="submit" value="Submit" data-wait="Please wait..."
                                        class="submit-button-2 w-button">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/slider.js') }}"></script>
</body>

</html>