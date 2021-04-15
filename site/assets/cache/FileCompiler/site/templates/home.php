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
        <div class='uk-container'>
            <div class='uk-text-center'>
                <h1><?php echo $page->title ?></h1>
            </div>
        </div>
    </div>


    <div class='uk-container'>

        <h3 class='nadpis'><?php echo $page->obsah; ?></h3>
    </div>


    <div class='uk-section'>
    <div class='uk-container'>
    <div class="uk-child-width-1-3@m" uk-grid>
        
    <div>
        <div class="uk-card uk-card-default">
            
            <div class="uk-card-media-top">
            <?php echo "<img src='{$page->podobrazek7->url}' alt='Example image' >"; ?>
            </div>
            <div class="uk-card-body">
            <div class='uk-text-center'> <h3 class="uk-card-title">V čem se lišíme?</h3></div>
            <p><?php echo $page->obsah5 ?></p>
            </div>
        </div>
    </div>
    <div>
        <div class="uk-card uk-card-default">
            <div class="uk-card-media-top">
            <?php echo "<img src='{$page->podobrazek8->url}' alt='Example image' >"; ?>
            </div>
            <div class="uk-card-body">
            <div class='uk-text-center'> <h3 class="uk-card-title">Kdo je náš dodavatel?</h3></div>
            <p><?php echo $page->obsah6 ?></p>
            </div>
        </div>
    </div>
    <div>
        <div class="uk-card uk-card-default">
            <div class="uk-card-media-top">
            <?php echo "<img src='{$page->podobrazek9->url}' alt='Example image' >"; ?>
            </div>
            <div class="uk-card-body">
            <div class='uk-text-center'> <h3 class="uk-card-title">Jaké vedeme kurzy?</h3></div>
            <p><?php echo $page->obsah7 ?></p>
            </div>
        </div>
    </div>
</div>
</div>
</div>



    




    <div>
        <div class="uk-overflow-hidden">
            <?php echo "<img src='{$page->podobrazek4->url}' alt='Example image' uk-scrollspy='cls: uk-animation-kenburns; repeat: true'>"; ?>
        </div>



        
<div class='uk-padding'>
            <div class='uk-text-center'>
                <h1><?php echo $page->podnadpis ?></h1>
            </div>
            </div>

            
            <div class='uk-section uk-section-small'>
        <div class='uk-container'>

        <div class="uk-slider-container-offset" uk-slider>

    <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1">

        <ul class="uk-slider-items uk-child-width-1-2@s uk-grid">
            <li>
                <div class="uk-card uk-card-default">
                    <div class="uk-card-media-top">
                    <?php echo "<img src='{$page->podobrazek->url}' alt='Example image' >"; ?>
                    </div>
                    <div class="uk-card-body">
                    <div class='uk-text-center'> <h3 class="uk-card-title">Karel</h3></div>
                        <p class="uk-margin-remove"><?php echo $page->obsah2 ?></p>
                    </div>
                </div>
            </li>
            <li>
                <div class="uk-card uk-card-default">
                    <div class="uk-card-media-top">
                    <?php echo "<img src='{$page->podobrazek2->url}' alt='Example image' >"; ?>
                    </div>
                    <div class="uk-card-body">
                    <div class='uk-text-center'> <h3 class="uk-card-title">Karolína</h3></div>
                        <p class="uk-margin-remove"><?php echo $page->obsah3 ?></p>
                    </div>
                </div>
            </li>
            <li>
                <div class="uk-card uk-card-default">
                    <div class="uk-card-media-top">
                    <?php echo "<img src='{$page->podobrazek3->url}' alt='Example image' >"; ?>
                    </div>
                    <div class="uk-card-body">
                    <div class='uk-text-center'> <h3 class="uk-card-title">Daniel</h3></div>
                        <p class="uk-margin-remove"><?php echo $page->obsah4 ?></p>
                    </div>
                </div>
            </li>
            <li>
                <div class="uk-card uk-card-default">
                    <div class="uk-card-media-top">
                    <?php echo "<img src='{$page->podobrazek5->url}' alt='Example image' >"; ?>
                    </div>
                    <div class="uk-card-body">
                    <div class='uk-text-center'> <h3 class="uk-card-title">Denisa</h3></div>
                        <p class="uk-margin-remove"><?php echo $page->obsah8 ?></p>
                    </div>
                </div>
            </li>
            <li>
                <div class="uk-card uk-card-default">
                    <div class="uk-card-media-top">
                    <?php echo "<img src='{$page->podobrazek6->url}' alt='Example image' >"; ?>
                    </div>
                    <div class="uk-card-body">
                    <div class='uk-text-center'> <h3 class="uk-card-title">Petr</h3></div>
                        <p class="uk-margin-remove"><?php echo $page->obsah9 ?></p>
                    </div>
                </div>
            </li>
        </ul>

        <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
        <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>

    </div>

    <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>

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