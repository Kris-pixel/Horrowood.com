<?php
require_once "../connect/db.php";
if(session_status()!=PHP_SESSION_ACTIVE) session_start();
// var_dump($_GET);

$action = $_GET['action'] != "bookCatalog"? 'f%' : 'b%';
$item = $_GET['action'] == "bookCatalog"? "bookItem" : "filmItem";
$type =( $_GET['type'])? "AND type_code ='".$_GET['type']."'" : '';
$raiting = $_GET['raiting']? "AND rating = '".$_GET['raiting']."'" : '';
$status = $_GET['status']? "AND satus_code ='".$_GET['status']."'" : '';
$year = $_GET['year']? "AND release_date like '".$_GET['year']."%'" : '';
$genre = $_GET['genre']?  "AND genre_code = '".$_GET['genre']."'": '';
// var_dump($type);
switch ($_GET['sort']) {
    case '1':
        $sort = "title ASC";
        break;
    case '2':
        $sort = "title DESC";
        break;
    case '3':
        $sort = "release_date ASC";
        break;
    case '4':
        $sort = "release_date DESC";
        break;
    
    default:
    $sort ="date_rec_creation";
        break;
}


$query = "SELECT DISTINCT items.id, title, img, date_rec_creation, release_date from items JOIN genre 
            ON items.id=genre.id_item 
            WHERE items.id like'$action' 
            $type $raiting $status $year $genre
            ORDER BY $sort";
        // var_dump($query);


$arrname = [];
$arrimg = [];
$arrid = [];
$result = '';

$rez = mysqli_query($link, $query)or die("Ошибка " . mysqli_error($link)); 
while ($row = mysqli_fetch_assoc($rez)) {
    $arrname[] = $row['title'];
    $arrimg[] = $row['img'];
    $arrid[] = $row['id'];
}

for ($i=0; $i < count($arrname); $i++) { 
    $result .=  "   <div class='col-xl-2 col-lg-3 col-md-3 col-sm-3 p-2'>
                        <div class='card m-0'>
                        <a href='http://horrowood.com/index.php?action=$item&id=".$arrid[$i]."'>
                        <div class='card-div-img'><img src='http://horrowood.com/img/db/items/".$arrimg[$i]."' alt='".$arrimg[$i]."' title='".$arrimg[$i]."'></div>
                            <div class='overlay'> <div class='text'>".$arrname[$i]."</div></div>
                        </a>
                        </div>
                    </div>";
}

    echo $result;  
?>