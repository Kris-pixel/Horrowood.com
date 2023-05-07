<?php
if($action == "bookCatalog"){
    $pageTitle="книг";
}else{
    $pageTitle="фильмов";  
}
?>

<h1>Каталог <?=@$pageTitle;?></h1>
<div class="row pr-5">
    <div id='content-place' class="col-md-9 catalog pt-0">
    
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