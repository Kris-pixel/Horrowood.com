<?php 
require_once "../connect/db.php";
$hint='';
$search = $_POST['search'];
if($search != ''){
$query = "SELECT * FROM items";

$arrname = [];
$arrlink = [];
$result = '';

$rez = mysqli_query($link, $query)or die("Ошибка " . mysqli_error($link)); 
while ($row = mysqli_fetch_assoc($rez)) {
    $arrname[] = $row['title']." / ". $row['orig_title'];
    $item = substr($row['id'],0,1) =="f" ? "filmItem" : "bookItem";
    $arrlink[] = "http://horrowood.com/index.php?action=$item&id=".$row['id'];
}

$query = "SELECT * FROM article";

$rez = mysqli_query($link, $query)or die("Ошибка " . mysqli_error($link)); 
while ($row = mysqli_fetch_assoc($rez)) {
    $arrname[] = $row['title'];
    $arrlink[] = "http://horrowood.com/index.php?action=article&id=".$row['id'];
}
for ($i=0; $i < count($arrname); $i++) { 
    if(preg_match('/'.$search.'/iu', $arrname[$i])){  
        $hint .= "<tr><td><a href='".$arrlink[$i]."' class='search-link'>".$arrname[$i]."</a><hr></td></tr>";
    }
}
echo $hint;
}