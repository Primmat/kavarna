<?php 
$homepage = $pages->get(1);

$stranky =$homepage->children->prepend($homepage);

$menu = "<div class='menu'>";
$menu .= "<nav class='uk-navbar-container' uk-navbar>";
$menu .= "<div class='uk-navbar-right'>";
$menu .= "<ul class='uk-navbar-nav uk-visible@m'>";


foreach($stranky as $p){
    if($page->id == $p->id){
        $menu .="<li class='uk-active polozka_menu '><a href ='$p->url'>$p->title</a></li>";
    } else {
        $menu .="<li><a href ='$p->url'>$p->title</a></li>";
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
		<link rel="stylesheet" type="text/css" href="<?php echo $config->urls->templates?>styles/main.css?" />
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

        <div class='uk-margin'>
        <div class='uk-container'>
        <div class='uk-text-center'>
		<h1><?php echo $page->title; ?></h1>
        </div>
        </div>
        </div>
        
        
		

    <div class='uk-margin'>
    <div class='uk-container'>
    <div class='uk-grid'>

<div class="uk-child-width-1-2@s uk-child-width-1-1 uk-child-width-1-3@m" uk-grid uk-lightbox="animation: fade">
<?php foreach($page->galerie as $image): ?>
    <div>
    
        <?php echo "<a class='uk-inline' href='{$image->url}' data-caption='IT Cafe'>"; ?>
            <?php echo "<img src='{$image->size(400, 300)->url}' alt='galerie1'>"; ?>
        </a>
    </div>
 <?php endforeach ?>
</div>
</div>
</div>
</div>


<div class="uk-child-width-1-1@s uk-text-center" uk-grid>
<div>
        <div class="uk-background-secondary uk-light uk-padding uk-margin-top  uk-panel">
            <p><?php echo $page->pata;?></p>
            
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



