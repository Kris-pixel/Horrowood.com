<?php
if($action == "bookCatalog"){
    $pageTitle="книг";
}else{
    $pageTitle="фильмов";  
}
?>

<h1>Каталог <?=@$pageTitle;?></h1>
<div class="row">
    <div id='content-place' class="col-md-9 row catalog justify-content-start py-0">
    
    <?php 
        echo RenderCardCatalog($link, $_GET['action']);
    ?>

    </div>
    <div class="col-md-3 p-0">
    <?php include_once("modules/filter.php");?>
    </div>
</div>

<?php
$_SESSION['url'] = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] ;
?>