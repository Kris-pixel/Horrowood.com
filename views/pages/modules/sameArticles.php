<?php

    $query = "SELECT * FROM article WHERE id != '$id' ORDER BY created_at DESC LIMIT 3";
 
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
        $result .=  "<div class='dark-card col-md-12 p-2 mb-3'>
                        <a href='http://horrowood.com/index.php?action=article&id=".$arrid[$i]."'>
                            <img class='col-md-12 p-0 twocorner-img' src='http://horrowood.com/img/db/article/".$arrimg[$i]."' alt='".$arrimg[$i]."' title='".$arrimg[$i]."'>
                            <div class='same-article-title'>".$arrname[$i]."</div>
                            <div class='overlay'></div>
                        </a>
                    </div>";
    }
     
    echo $result; 

 ?>


<!-- <div class="dark-card col-md-12 p-2 mb-3">
    <a href="">
        <img class="col-md-12 p-0 twocorner-img" src="horrorwood.jpg" alt="">
        <div class="same-article-title">Название статьиНазвание статьи Название статьи</div>
        <div class="overlay"> </div>
    </a>
</div>
<div class="dark-card col-md-12 p-2 mb-3">
    <a href="">
        <img class="col-md-12 p-0 twocorner-img" src="cover.jpg" alt="">
        <div class="same-article-title">Название статьиНазвание статьи Название статьи</div>
        <div class="overlay"> </div>
    </a>
</div>
<div class="dark-card col-md-12 p-2 mb-3">
    <a href="">
        <img class="col-md-12 p-0 twocorner-img" src="horrorwood.jpg" alt="">
        <div class="same-article-title">Название статьиНазвание статьи Название статьи</div>
        <div class="overlay"> </div>
    </a>
</div> -->