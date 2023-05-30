<div class="same-part">


<?php

// подготовили жанры для поиска
$splitGenre = explode(", ",$genres); 
$findGenre = '';
for ($i=0; $i < count($splitGenre) ; $i++) { 
   $findGenre.= $splitGenre[$i]."', '";
}
$findGenre = trim($findGenre,"', '");

// в каком каталоге искать
    if($action == "bookItem")
    {
        $catalog ='b';
        $item="bookItem";
    }
    if($action == "filmItem")
    {
        $catalog = 'f';
        $item="filmItem";
    }
    $query = "SELECT  genre.id_item, count(genre_names.name) AS matches, title, img  FROM genre JOIN genre_names 
                ON genre.genre_code = genre_names.code JOIN items
                ON genre.id_item = items.id
                WHERE id_item != '$id' 
                AND id_item like '$catalog%'
                AND genre_names.name IN ('$findGenre')
                GROUP BY id_item
                ORDER BY matches DESC
                LIMIT 4";
 
    $arrname = [];
    $arrimg = [];
    $arrid = [];
    $result = '';
 
    $rez = mysqli_query($link, $query)or die("Ошибка " . mysqli_error($link)); 
    while ($row = mysqli_fetch_assoc($rez)) {
        $arrname[] = $row['title'];
        $arrimg[] = $row['img'];
        $arrid[] = $row['id_item'];
    }

    for ($i=0; $i < count($arrname); $i++) { 
        $result .=  "  <div class='same card mb-3'>
                            <a href='http://horrowood.com/index.php?action=$action&id=".$arrid[$i]."'>
                                <div class='samecard-div-img'><img src='http://horrowood.com/img/db/items/".$arrimg[$i]."' alt='".$arrimg[$i]."' title='".$arrimg[$i]."'></div>
                                <div class='overlay'> <div class='text'>".$arrname[$i]."</div></div>
                            </a>
                        </div>";
    }
     
    echo $result; 

 ?>
                </div> 