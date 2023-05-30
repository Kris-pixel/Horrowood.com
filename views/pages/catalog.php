<?php
if($action == "bookCatalog"){
    $pageTitle="книг";
}else{
    $pageTitle="фильмов";  
}
?>

<div class="d-flex flex-row justify-content-between align-items-center">
    <h1>Каталог <?=@$pageTitle;?></h1> 
    <img class="filter-img" src="img/icons/filter.png" width="35" height="35">
</div>
<div class="row p-0 ml-md-0 ml-sm-3 ml-0">
    <div id='content-place' class="col-xl-10 col-lg-9 col-md-12 catalog p-0">
    
    <?php 
        echo RenderCardCatalog($link, $_GET['action']);
    ?>

    </div>
    <div class="col-xl-2 col-lg-3 col-md-5 p-0 filter-block">
    <?php include_once("modules/filter.php");?>
    </div>
</div>

<?php
$_SESSION['url'] = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] ;
?>

<script>
    // if(window.innerWidth <= 768){
        // console.log(window.innerWidth);
    $( ".filter-img" ).on( "click", function() {
        console.log(window.innerWidth);
        $( ".filter-block" ).animate({ "right": "+=415px" }, "slow" );
    });

    $( ".filter-close" ).on( "click", function() {
        $( ".filter-block" ).animate({ "right": "-=415px" }, "slow" );
    });
    // }
</script>