<div class="col-md-12 same-part row p-0">


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
        $catalog ='k';
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
                AND type_code like '$catalog%'
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
        $result .=  "  <div class='same card mb-4'>
                            <a href='http://horrowood.com/index.php?action=$action&id=".$arrid[$i]."'>
                                <img src='http://horrowood.com/img/db/items/".$arrimg[$i]."' alt='".$arrimg[$i]."' title='".$arrimg[$i]."'>
                                <div class='overlay'> <div class='text'>".$arrname[$i]."</div></div>
                            </a>
                        </div>";
    }
     
    echo $result; 

 ?>

                    <!-- <div class="same card col-md-6 mb-4">
                        <a href="">
                        <img src="Akira.webp" alt="">
                        <div class="overlay"> <div class="text">Акира</div></div>
                        </a>
                    </div>
                    <div class="same card col-md-6 ml-2 mb-4">
                        <a href="">
                        <img src="Akira.webp" alt="">
                        <div class="overlay"> <div class="text">Акира</div></div>
                        </a>
                    </div> -->
                </div> 