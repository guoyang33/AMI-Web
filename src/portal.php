<?php
/*
 * portal.php
 * 入口網站
 */
$default_lang = 'zh_TW';
$info = json_decode(file_get_contents('info.json'), true);
?>
<!doctype html>
<html lang="en" class="h-100">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.84.0">
        <link rel="icon" href="assets/images/icon.gif" type="image/x-icon" />
        <title>
            <?php echo $info[$default_lang]['title_short']; ?>
        </title>

        <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/cover/">

        

        <!-- Bootstrap core CSS -->
        <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

        <style>
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
            }

            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                    font-size: 3.5rem;
                }
            }
        </style>

        
        <!-- Custom styles for this template -->
        <link href="cover.css" rel="stylesheet">
    </head>
    <body class="d-flex h-100 text-center text-white bg-dark">
        
        <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
            <header class="mb-auto">
                <div>
                    <h3 class="float-md-start mb-0">
                        <!-- logo -->
                        <img src=<?php echo $info['icon']; ?> alt="logo" width="50" height="50">
                        <?php echo $info[$default_lang]['title_short']; ?>
                    </h3>
                    <nav class="nav nav-masthead justify-content-center float-md-end">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                        <a class="nav-link" href="">Features</a>
                        <a class="nav-link" href="#">Contact</a>
                    </nav>
                </div>
            </header>

            <main class="px-3">
                <h1>
                    <?php echo $info[$default_lang]['title']; ?>
                </h1>
                <?php 
                foreach ($info[$default_lang]['portal']['contents'] as $content) {
                    echo '<p class="lead">' . $content . '</p>';
                }
                ?>
                <!-- <p class="lead">Cover is a one-page template for building simple and beautiful home pages. Download, edit the text, and add your own fullscreen background photo to make it your own.</p> -->
                <!-- <p class="lead"> -->
                    <!-- <a href="#" class="btn btn-lg btn-secondary fw-bold border-white bg-white">Learn more</a> -->
                <!-- </p> -->
                <p class="lead">
                    <a href="index.php?lang=zh_TW" class="btn btn-lg btn-secondary fw-bold border-white bg-white">中文</a>
                    <a href="index.php?lang=en" class="btn btn-lg btn-secondary fw-bold border-white bg-white">English</a>
                </p>
            </main>

            <footer class="mt-auto text-white-50">
                <!-- 待去除 模板原生footer -->
                <p>Cover template for <a href="https://getbootstrap.com/" class="text-white">Bootstrap</a>, by <a href="https://twitter.com/mdo" class="text-white">@mdo</a>.</p>
            </footer>
        </div>
    </body>
</html>
