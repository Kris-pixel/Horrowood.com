<?php

    $query = "SELECT * FROM article WHERE id != '$id' ORDER BY created_at DESC LIMIT 4";
 
    $arrname = [];
    $arrimg = [];
    $arrid = [];
    $result = '';
 
    $rez = mysqli_query($link, $query)or die("Ошибка " . mysqli_error($link)); 
    while ($row = mysqli_fetch_assoc($rez)) {
        $arrname[] = $row['title'];
        $arrimg[] = $row['img'];
        $arrid[] = $row['id'];
    }?>
<div class="row m-0">
   <?php for ($i=0; $i < count($arrname); $i++) { 
        $result .=  "<div class=' col-lg-12 col-md-6 mb-3'><div class='dark-card p-2'>
                        <a class='same-art' href='http://horrowood.com/index.php?action=article&id=".$arrid[$i]."'>
                            <div class='col-md-12 p-0 twocorner-img mb-2'><img  src='http://horrowood.com/img/db/article/".$arrimg[$i]."' alt='".$arrimg[$i]."' title='".$arrimg[$i]."'></div>
                            <div class='same-article-title mb-2 ml-2'>".$arrname[$i]."</div>
                            <div class='overlay'></div>
                        </a>
                    </div></div>";
    }
     
    echo $result; 

 ?>
 </div>