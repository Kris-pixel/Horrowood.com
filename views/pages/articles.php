<?php
// COUNT
$query = "SELECT COUNT(*) FROM article";
$result = mysqli_query($link, $query);
$r = mysqli_fetch_row($result);
$numrows = $r[0];

$rowsperpage = 6;
$totalpages = ceil($numrows / $rowsperpage);

$page = 1;
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $page = (INT)$_GET['page'];
}

if ($page > $totalpages) {
    $page = $totalpages;
}

if ($page < 1) {
    $page = 1;
}
$offset = ($page - 1) * $rowsperpage;

$query = "SELECT * FROM article ORDER BY id DESC LIMIT $offset, $rowsperpage";
$result = mysqli_query($link, $query);

$arrid = [];
$arrtitle = [];
$arrtext = [];
$arrimg = [];

if (mysqli_num_rows($result) < 1) {
    echo '<div class="">Еще не статьей!</div>';
} else {
  while ($row = mysqli_fetch_assoc($result)) {

    $arrid[] = htmlentities($row['id']);
    $arrtitle[] = htmlentities($row['title']);
    $arrtext[] = htmlentities(strip_tags($row['body']));
    $arrimg[]= htmlentities($row['img']);
  }
  ?>


    <h1>Статьи</h1>
        <div class="col-md-12 module p-0">
            <div class="col-xl-7 col-lg-12 big-article mb-xl-0 mb-4">
                <a class="catalog-article-link" href="http://horrowood.com/index.php?action=article&id=<?=@$arrid[0];?>">
                    <div class="big-article-img"><img class="col-md-12 p-0 twocorner-img mb-3" src="http://horrowood.com/img/db/article/<?=@$arrimg[0];?>" alt="<?=@$arrimg[0];?>" title="<?=@$arrimg[0];?>"></div>
                    <h4 class="link-article-title"><?=@$arrtitle[0];?></h4>
                    <p class="reading-text"><?php echo substr($arrtext[0], 0, 229).'...'; ?>
                    </p>
                    <p class="breadcrump">Читать дальше...</p>
                    <div class='overlay'> </div>
                </a>
            </div>
            <div class="p-0 pl-xl-4 dark-article-container col-xl-5 col-lg-12">
                <div class=" dark-article-card mb-4 ">
                    <a class="catalog-article-link dark-article-layout" href="http://horrowood.com/index.php?action=article&id=<?=@$arrid[1];?>">
                        <div class="col-xl-6 col-lg-3 p-0 article-rounded-img">
                            <img src="http://horrowood.com/img/db/article/<?=@$arrimg[1];?>" alt="<?=@$arrimg[1];?>" title="<?=@$arrimg[1];?>">
                        </div>
                        <div class="col-md-6">
                        <h6 class="link-article-title"><?=@$arrtitle[1];?></h6>
                        <p class="reading-text"><?php echo substr(strip_tags($arrtext[1]), 0, 229).'...'; ?>
                        </p>
                        <p class="breadcrump">Читать дальше...</p>
                        </div>
                        <div class='overlay'> </div>
                    </a>
                </div>
                <div class=" dark-article-card">
                    <a class="catalog-article-link dark-article-layout" href="http://horrowood.com/index.php?action=article&id=<?=@$arrid[2];?>">
                        <div class="col-xl-6 col-lg-3 p-0 article-rounded-img">
                            <img src="http://horrowood.com/img/db/article/<?=@$arrimg[2];?>" alt="<?=@$arrimg[2];?>" title="<?=@$arrimg[2];?>">
                        </div>
                        <div class="col-md-6">
                        <h6 class="link-article-title"><?=@$arrtitle[2];?></h6>
                        <p class="reading-text"><?php echo substr($arrtext[2], 0, 229).'...'; ?>
                        </p>
                        <p class="breadcrump">Читать дальше...</p>
                        </div>
                        <div class='overlay' style="top:51.5%;"> </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-12 module p-0 mt-4">
            <div class="ml-xl-2 ml-md-0 col-xl-7 col-lg-12 big-article mb-xl-0 mb-4">
                <a class="catalog-article-link" href="http://horrowood.com/index.php?action=article&id=<?=@$arrid[3];?>">
                    <div class="big-article-img"><img class="col-md-12 p-0 twocorner-img mb-3" src="http://horrowood.com/img/db/article/<?=@$arrimg[3];?>" alt="<?=@$arrimg[3];?>" title="<?=@$arrimg[3];?>"></div>
                    <h4 class="link-article-title"><?=@$arrtitle[3];?></h4>
                    <p class="reading-text"><?php echo substr($arrtext[3], 0, 229).'...'; ?>
                    </p>
                    <p class="breadcrump">Читать дальше...</p>
                    <div class='overlay'> </div>
                </a>
            </div>
            <div class="p-0 pr-xl-3 dark-article-container col-xl-5 col-lg-12">
                <div class=" dark-article-card mb-4 ">
                    <a class="catalog-article-link dark-article-layout" href="http://horrowood.com/index.php?action=article&id=<?=@$arrid[4];?>">
                        <div class="col-xl-6 col-lg-3 p-0 article-rounded-img">
                            <img src="http://horrowood.com/img/db/article/<?=@$arrimg[4];?>" alt="<?=@$arrimg[4];?>" title="<?=@$arrimg[4];?>">
                        </div>
                        <div class="col-md-6">
                        <h6 class="link-article-title"><?=@$arrtitle[4];?></h6>
                        <p class="reading-text"><?php echo substr($arrtext[4], 0, 229).'...'; ?>
                        </p>
                        <p class="breadcrump">Читать дальше...</p>
                        </div>
                        <div class='overlay'> </div>
                    </a>
                    
                </div>
                <div class=" dark-article-card">
                    <a class="catalog-article-link dark-article-layout" href="http://horrowood.com/index.php?action=article&id=<?=@$arrid[5];?>">
                        <div class="col-xl-6 col-lg-3 p-0 article-rounded-img">
                            <img src="http://horrowood.com/img/db/article/<?=@$arrimg[5];?>" alt="<?=@$arrimg[5];?>" title="<?=@$arrimg[5];?>">
                        </div>
                        <div class="col-md-6">
                        <h6 class="link-article-title"><?=@$arrtitle[5];?></h6>
                        <p class="reading-text"><?php echo substr($arrtext[5], 0, 229).'...'; ?>
                        </p>
                        <p class="breadcrump">Читать дальше...</p>
                        </div>
                        <div class='overlay' style="top:51.5%;"> </div>
                    </a>
                </div>
            </div>
        </div>
<?php

echo "<div class='mt-4 row'>";

if ($page > 1) {
    echo "<a class='pagination  pagination-active' href='http://horrowood.com/index.php?action=articles&page=1'>&laquo;</a>";
    $prevpage = $page - 1;
    echo "<a class='pagination' href='http://horrowood.com/index.php?action=articles&page=$prevpage'><</a>";
}

$range = 5;
for ($x = $page - $range; $x < ($page + $range) + 1; $x++) {
    if (($x > 0) && ($x <= $totalpages)) {
        if ($x == $page) {
            echo "<div class='pagination  pagination-active'>$x</div>";
        } else {
            echo "<a class='pagination' href='http://horrowood.com/index.php?action=articles&page=$x'>$x</a>";
        }
    }
}

if ($page != $totalpages) {
    $nextpage = $page + 1;
    echo "<a class='pagination' href='http://horrowood.com/index.php?action=articles&page=$nextpage'>></a>";
    echo "<a class='pagination' href='http://horrowood.com/index.php?action=articles&page=$totalpages'>&raquo;</a>";
}

echo "</div>";
}
?>
<script>
    $('.pagination').on('click', function(){
        $('.pagination').removeClass('pagination-active');
        $(this).addClass('pagination-active');  
    })
</script>
<?php
$_SESSION['url'] = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] ;
?>