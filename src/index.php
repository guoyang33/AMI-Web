<?php
/* 
 * index.php
 * 入口網頁(首頁)
 */

require_once 'html_head.php';
require_once 'utils.php';

echo '
<body>
    <header id="header" class="header fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
        <a href="index.php" class="logo d-flex align-items-center">
            <img class="logo" src="' . $info['logo'] . '" alt="' . $info['logo_alt'] . '">
        </a>
        <nav class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="#home">Home</a></li>
                <li><a class="nav-link scrollto" href="#about">About</a></li>
                <li><a class="nav-link scrollto" href="#products">Products</a></li>
                <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                <li><a class="nav-link scrollto" href="#news">news</a></li>
            </ul>
            <i class="bi mobile-nav-toggle bi-list"></i>
        </nav><!-- .navbar -->


        <div class="header-function-bar d-none">
            <div class="dropdown dropdown-language-switch">
                語言：
                <button class="btn dropdown-toggle border" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="dropdown-text">Language</span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="?lang=zh_TW">繁體中文</a></li>
                    <li><a class="dropdown-item" href="?lang=en">English</a></li>
                </ul>
            </div>
            <nav>
                <ul class="main-nav">
';
foreach ($info['header']['nav'] as $nav_item) {
echo '
                    <li>
                        <a href="' . $nav_item['link'] . '">' . $nav_item['text'] . '</a>
                    </li>
';
}
echo '
                    </ul>
                </nav>
            </div>
        </div>
    </header><!-- /.page-header -->
';
echo '
    <section id="hero" class="hero d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                <h1 data-aos="fade-up" class="aos-init aos-animate">We offer modern solutions for growing your business</h1>
                <h2 data-aos="fade-up" data-aos-delay="400" class="aos-init aos-animate">We are team of talented designers making websites with Bootstrap</h2>
                <div data-aos="fade-up" data-aos-delay="600" class="aos-init aos-animate">
                    <div class="text-center text-lg-start">
                    <a href="#about" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                        <span>Get Started</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                    </div>
                </div>
                </div>
                <div class="col-lg-6 hero-img aos-init aos-animate" data-aos="zoom-out" data-aos-delay="200">
                <img src="assets/img/hero-img.png" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </section><!-- /#hero -->
';

echo '
    <div id="home" class="big-bg d-none">
        <div class="home-content wrapper">
            <h2 class="page-title">' . $content['title'] . '</h2>
            <p>' . $content['text'] . '</p>
            <a class="button" href="' . $content['button']['link'] . '">' . $content['button']['text'] . '</a>
        </div><!-- /.home-content -->
    </div><!-- /#home -->
</body>
';
?>