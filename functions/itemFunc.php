<?php

function RenderCardCatalog ($link, $action){

    if($action == "bookCatalog")
    {
        $query ="SELECT id, title, img from items WHERE type_code like 'k%';";
        $item="bookItem";
    }
    if($action == "filmCatalog")
    {
        $query = "SELECT id, title, img from items WHERE type_code like 'f%'";
        $item="filmItem";
    }


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
        $result .=  "  <div class='card col-md-2 mb-4 mx-2'>
                            <a href='http://horrowood.com/index.php?action=$item&id=".$arrid[$i]."'>
                                <img src='http://horrowood.com/img/db/items/".$arrimg[$i]."' alt='".$arrimg[$i]."' title='".$arrimg[$i]."'>
                                <div class='overlay'> <div class='text'>".$arrname[$i]."</div></div>
                            </a>
                        </div>";
    }
    
        return $result;  
}


function GetItemById($link, $id){
    $query = "SELECT * from items JOIN item_types ON items.type_code = item_types.code JOIN status ON items.satus_code = status.code WHERE id='$id'";
    $rez = mysqli_query($link, $query)or die("Ошибка " . mysqli_error($link)); 
    $row = mysqli_fetch_assoc($rez);
    return $row;
}

function GetItemGanresById($link, $id){
    $genres = '';

    $query = "SELECT * from genre JOIN genre_names ON genre.genre_code = genre_names.code  WHERE genre.id_item ='$id'";
    $rez = mysqli_query($link, $query)or die("Ошибка " . mysqli_error($link)); 
    while ($row = mysqli_fetch_assoc($rez)) {
        $genres .= $row['name'] . ", ";
    }

    return trim($genres,', ');
}
function GetItemFramesById($link, $id){
    $frames = [];

    $query = "SELECT img from frame WHERE id_item ='$id'";
    $rez = mysqli_query($link, $query)or die("Ошибка " . mysqli_error($link)); 
    while ($row = mysqli_fetch_assoc($rez)) {
        $frames[] = $row['img'];
    }

    return $frames;
}


function ItemCheckInLists($link, $id){
    $userId = $_SESSION['id'];

    $query = "SELECT list_type_code AS k FROM lists WHERE id_item='$id' AND id_user='$userId'";
    $rez = mysqli_query($link, $query)or die("Ошибка " . mysqli_error($link)); 
    $row = mysqli_fetch_assoc($rez);
    return $row;
}

function GetItemRaitingNumber($link, $id){
    $query = "SELECT ROUND(avg(mark),1) AS m from lists WHERE id_item='$id'";

    $rez = mysqli_query($link, $query)or die("Ошибка " . mysqli_error($link)); 
    $row = mysqli_fetch_assoc($rez);

    if($row['m'] != NULL){
        return $row['m'];
    }else{
        return "0.0";
    }  
}

function GetItemRaitingStars($link, $id){
    $query = "SELECT ROUND(avg(mark),0) AS m from lists WHERE id_item='$id'";

    $rez = mysqli_query($link, $query)or die("Ошибка " . mysqli_error($link)); 
    $row = mysqli_fetch_assoc($rez);

    if($row['m'] != NULL){
        return $row['m'];
    }else{
        return 0;
    }  
}

function GetUserRaitingStars($link, $id){
    $userId = $_SESSION['id'];
    $query = "SELECT mark AS m from lists WHERE id_item='$id' AND id_user='$userId'";

    $rez = mysqli_query($link, $query)or die("Ошибка " . mysqli_error($link)); 
    $row = mysqli_fetch_assoc($rez);
    return $row; 
}

function GetNewOrPopItems($link, $newOrPop){
    if($newOrPop){
        $query = "SELECT id, title, img, type_code from items ORDER BY $newOrPop LIMIT 8";
    }else{
        $query = "SELECT id, title, img,type_code,( SELECT AVG(mark) AS m from lists WHERE lists.id_item = items.id) as m from items ORDER BY m DESC LIMIT 8";
    }
    
    $arrname = [];
    $arrimg = [];
    $arrid = [];
    $type='';
    $result = '';

    $rez = mysqli_query($link, $query)or die("Ошибка " . mysqli_error($link)); 
    while ($row = mysqli_fetch_assoc($rez)) {
        $arrname[] = $row['title'];
        $arrimg[] = $row['img'];
        $arrid[] = $row['id'];
        $type = substr($row['type_code'],0,1) == 'f' ? "filmItem" : "bookItem";
    }

    for ($i=0; $i < count($arrname); $i++) { 
        $result .=  "  <div class='card'>
                            <a href='http://horrowood.com/index.php?action=$type&id=".$arrid[$i]."'>
                                <img src='http://horrowood.com/img/db/items/".$arrimg[$i]."' alt='".$arrimg[$i]."' title='".$arrimg[$i]."'>
                                <div class='overlay'> <div class='text'>".$arrname[$i]."</div></div>
                            </a>
                        </div>";
    }
    
        return $result;  
}


function getGenreList($link) // DONE
{
    $arr = [];
    $arrCode = [];
    $result = '';
    $query = "SELECT * from genre_names ORDER BY name ASC";
    $rez = mysqli_query($link, $query)or die("Ошибка " . mysqli_error($link)); 
    while ($row = mysqli_fetch_assoc($rez)) {
        $arr[] = $row['name'];
        $arrCode[] = $row['code'];
    }

    for ($i=0; $i < count($arr); $i++) { 
        $result .=  "<option value='".$arrCode[$i]."'>".$arr[$i]."</option>";
    }
    
        return $result;  
}

function getTypeList($link, $action) // DONE
{
    if($action == "bookCatalog"){
        $t='k';
    }else{
        $t='f';  
    }
    $arr = [];
    $arrCode = [];
    $result = '';
    $query = "SELECT * from item_types WHERE code like '$t%' ORDER BY name ASC";
    $rez = mysqli_query($link, $query)or die("Ошибка " . mysqli_error($link)); 
    while ($row = mysqli_fetch_assoc($rez)) {
        $arr[] = $row['name'];
        $arrCode[] = $row['code'];
    }

    for ($i=0; $i < count($arr); $i++) { 
        $result .=  "<option value='".$arrCode[$i]."'>".$arr[$i]."</option>";
    }
    
        return $result;  
}