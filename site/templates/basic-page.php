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
		<title><?php echo $page->title; ?></title>
		<link rel="stylesheet" type="text/css" href="<?php echo $config->urls->templates?>styles/main.css?" />
	</head>
	<body>
        
            <div class='uk-container'>
            <div class='uk-width-auto'>
        <?php echo "<img class='logo' src='{$page->logo->url}' alt='logo'>"; ?>
        <div class='uk-width-expand'>
        <?php echo $menu ?>
        </div>
        </div>
        </div>
        
        <?php echo "<img src='{$page->obrazek->url}' alt='hl-obrazek'>"; ?>
		<h1><?php echo $page->title; ?></h1>
		<?php if($page->editable()) echo "<p><a href='$page->editURL'>Edit</a></p>"; ?>
        
	</body>
</html>



