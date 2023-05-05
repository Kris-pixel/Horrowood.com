<?php 
require_once('../../connect/db.php');
if(session_status()!=PHP_SESSION_ACTIVE) session_start();

$userId = $_SESSION['id'];

$query ="SELECT article.id as a, title, body, img from article JOIN likes 
            ON article.id = likes.id_item
            WHERE likes.id_user = '$userId'";

$arrname = [];
$arrimg = [];
$arrid = [];
$arrtext = [];
$result = '';

$rez = mysqli_query($link, $query)or die("Ошибка " . mysqli_error($link)); 
while ($row = mysqli_fetch_assoc($rez)) {
    $arrname[] = $row['title'];
    $arrimg[] = $row['img'];
    $arrid[] = $row['a'];
    $arrtext[] = $row['body'];
}

for ($i=0; $i < count($arrname); $i++) { 
    $str = substr($arrtext[$i], 0, 229).'...';
    $result .=  "   <div class='dark-article-card mb-4'>
                        <a class='catalog-article-link dark-article-layout' href='http://horrowood.com/index.php?action=article&id=".$arrid[$i]."'>
                            <div class='col-md-6 p-0 article-rounded-img'>
                                <img src='http://horrowood.com/img/db/article/".$arrimg[$i]."' alt='".$arrimg[$i]."' title='".$arrimg[$i]."'>
                            </div>
                            <div class='col-md-6'>
                            <h6 class='link-article-title'>".$arrname[$i]."</h6>
                            <p class='reading-text'>$str
                            </p>
                            <p class='breadcrump'>Читать дельше...</p>
                            </div>
                        </a>
                    </div>";
}
?>
  
  <div class="pl-3">
  <?php echo $result; ?>  
</div>