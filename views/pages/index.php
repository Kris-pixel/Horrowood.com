
<div id="welcome">
</div>
        <div class="mt-3">
            <h2>Новое в каталоге</h2>
            <div class="catalog owl-carousel">
                <?php echo GetNewOrPopItems($link, 1);?>
            </div>
        </div>


            <div class="mb-5">
                <h2 class="mb-3">Новые статьи</h2>
                <div class="new-articles">

                <?php

                    $query = "SELECT * from article ORDER BY created_at DESC  LIMIT 3";
                    
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
                    }
                
                    for ($i=0; $i < count($arrname); $i++) { 
                        $result .=  "  <div class='card col-md-3'>
                                            <a href='http://horrowood.com/index.php?action=article&id=".$arrid[$i]."'>
                                            <div class='twocorner-img'><img  src='http://horrowood.com/img/db/article/".$arrimg[$i]."' alt='".$arrimg[$i]."' title='".$arrimg[$i]."'></div>
                                            <div class='article-title'>".$arrname[$i]."</div>
                                            <div class='overlay'> </div>
                                            </a>
                                        </div>";
                    }
                    
                        echo $result;  
                ?>
                </div>
            </div>
            <div >
            <h2 class="pt-5">Популярное в каталоге</h2>
            <div class="catalog owl-carousel">
                <?php echo GetNewOrPopItems($link, 0);?>
            </div>
        </div>

        </div>
    </div>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/corusel.js"></script>

    <?php
$_SESSION['url'] = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] ;
?>