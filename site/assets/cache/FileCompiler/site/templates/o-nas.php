<?php
$homepage = $pages->get(1);

$stranky = $homepage->children->prepend($homepage);

$menu = "<div class='menu'>";
$menu .= "<nav class='uk-navbar-container' uk-navbar>";
$menu .= "<div class='uk-navbar-right'>";
$menu .= "<ul class='uk-navbar-nav uk-visible@m'>";


foreach ($stranky as $p) {
    if ($page->id == $p->id) {
        $menu .= "<li class='uk-active polozka_menu '><a href ='$p->url'>$p->title</a></li>";
    } else {
        $menu .= "<li><a href ='$p->url'>$p->title</a></li>";
    }
};


$menu .= "</ul>";
$menu .= "<button class='uk-hidden@m uk-button uk-button-default ' type='button' uk-toggle='target: #offcanvas-usage'>Menu</button>";
$menu .= "</div>";
$menu .= "</nav>";
$menu .= "</div>";

?>



<!DOCTYPE html>
<html lang="cs">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.5.10/dist/css/uikit.min.css" />

    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.5.10/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.5.10/dist/js/uikit-icons.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&display=swap" rel="stylesheet">
    <title><?php echo $page->title; ?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo $config->urls->templates ?>styles/main.css?" />
</head>

<body>
<div class='uk-padding'>
        <div class='uk-container'>
            <div class='uk-width-auto'>
                <div class='uk-align-left'>
                    <?php echo "<img class='logo' src='{$page->logo->url}' alt='logo'>"; ?></div>
                <div class='uk-width-expand'>
                    <?php echo $menu ?>
                </div>
            </div>
        </div>
    </div>

    <?php echo "<img src='{$page->obrazek->url}' alt='hl-obrazek'>"; ?>

    <div class='uk-padding'>
        <div class='uk-container '>


            <div class='uk-text-center'>
                <h1><?php echo $page->title; ?></h1>

            </div>

            <p><?php echo $page->obsah; ?></p>
        </div>
    </div>


    <div class='uk-container'>
        <div class='uk-padding'>
            <div class="uk-card uk-card-default uk-grid-collapse uk-child-width-1-2@s uk-margin" uk-grid>
                <div class="uk-card-media-left uk-cover-container">
                    <?php echo "<img src='{$page->podobrazek->url}' alt='centrum' uk-cover>"; ?>
                    <canvas width="600" height="400"></canvas>
                </div>
                <div>
                    <div class="uk-card-body">
                        <div class='uk-text-center'>
                            <h3 class="uk-card-title"><?php echo $page->podnadpis; ?></h3>
                        </div>
                        <p><?php echo $page->obsah2; ?></p>
                    </div>
                </div>
            </div>

            <div class='uk-section uk-section-small'>
            <div class="uk-card uk-card-default uk-grid-collapse uk-child-width-1-2@s uk-margin" uk-grid>
                <div class="uk-flex-last@s uk-card-media-right uk-cover-container">
                    <?php echo "<img src='{$page->podobrazek2->url}' alt='majitel' uk-cover>"; ?>
                    <canvas width="600" height="400"></canvas>
                </div>
                <div>
                    <div class="uk-card-body">
                        <div class='uk-text-center'>
                            <h3 class="uk-card-title"><?php echo $page->podnadpis2; ?></h3>
                        </div>
                        <p><?php echo $page->obsah3; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="uk-child-width-1-1@s uk-text-center" uk-grid>
        <div>
            <div class="uk-background-secondary uk-light uk-padding uk-margin-top  uk-panel">
                <p><?php echo $page->pata; ?></p>

            </div>
        </div>
    </div>

    <div id="offcanvas-usage" uk-offcanvas>
                <div class="uk-offcanvas-bar">

                    <button class="uk-offcanvas-close" type="button" uk-close></button>

                    <h3>Menu</h3>
                    <ul class='uk-nav'>
<?php
foreach ($stranky as $p) {
    if ($page->id == $p->id) {
        echo "<li class='uk-active polozka_menu '><a href ='$p->url'>$p->title</a></li>";
    } else {
        echo "<li><a href ='$p->url'>$p->title</a></li>";
    }
};
?>
</ul>

                </div>
            </div>
</body>

</html>