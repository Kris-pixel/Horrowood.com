<?php 

$search =mysqli_real_escape_string($link, $_GET['find']);

$searchresult='';
if($search != ''){
    echo "<h1> Результаты поиска</h1>";
    $searchresult .= SearchTable('items','f', $search, $link);
    $searchresult .= SearchTable('items','b', $search, $link);
    $searchresult .= SearchTable('article','', $search, $link);
    
    if($searchresult != ''){
        echo $searchresult;
    }else{
        echo "<h2>Похоже у нас нет ничего но вашему запросу :(</h2>";
    }

}else{
    $url = $_SESSION['url'];
    echo "<script> location.href = '$url';</script>";
}


function SearchTable($table, $itemType, $search, $link){
    $output='';
    if($table == 'article'){
        $query = "SELECT * FROM $table WHERE title LIKE '%$search%' ORDER BY created_at DESC";
        $h2 = 'Статьи';
        $action = "article";
    }else{
        $query = "SELECT * FROM $table WHERE id LIKE '$itemType%' AND (title LIKE '%$search%' OR orig_title LIKE '%$search%')";
    }

    if($itemType == 'f'){
        $h2 = 'Фильмы';
        $action = "filmItem";
    }
    if($itemType == 'b'){
        $h2 = 'Книги';
        $action = "bookItem";
    }
  
    $arrname = [];
    $arrimg = [];
    $arrlink = [];
    $arrtext = [];
    $result = '';

    $rez = mysqli_query($link, $query)or die("Ошибка " . mysqli_error($link)); 
    while ($row = mysqli_fetch_assoc($rez)) {
        $arrname[] = $table == "article" ? $row['title'] : $row['title']." / ". $row['orig_title'];
        $arrlink[] = "http://horrowood.com/index.php?action=$action&id=".$row['id'];
        $arrimg[] = $row['img'];
        $arrtext[] = $row['body'];
    }

    if(count($arrname) && $table !='article'){
        $output .= "<h2>$h2</h2>
        <div class='catalog pt-0'>";
        for ($i=0; $i < count($arrname); $i++) { 
                $result .=  "  <div class='card search-card mb-4 mx-2'>
                                    <a href='".$arrlink[$i]."'>
                                        <div class='card-div-img'><img src='http://horrowood.com/img/db/items/".$arrimg[$i]."' alt='".$arrimg[$i]."' title='".$arrimg[$i]."'></div>
                                        <div class='overlay'> <div class='text'>".$arrname[$i]."</div></div>
                                    </a>
                                </div>";
            }
            
            $output .=  $result; 
            $output .=  "</div>";
    }
    if(count($arrname) && $table =='article'){
        $output .=  "<h2>$h2</h2>
        <div class='col-xl-8'>";
        for ($i=0; $i < count($arrname); $i++) { 
            $str = substr(strip_tags($arrtext[$i]), 0, 229).'...';
            $result .=  "
                <div class='dark-article-card mb-4'>
                    <a class='catalog-article-link dark-article-layout' href='http://horrowood.com/index.php?action=article&id=".$arrid[$i]."'>
                        <div class='col-md-3 p-0 article-rounded-img'>
                            <img src='http://horrowood.com/img/db/article/".$arrimg[$i]."' alt='".$arrimg[$i]."' title='".$arrimg[$i]."'>
                        </div>
                        <div class='col-md-9'>
                        <h6 class='link-article-title'>".$arrname[$i]."</h6>
                        <div class='reading-text'>$str
                        </div>
                        <p class='breadcrump'>Читать дальше...</p>
                        </div>
                    </a>
                </div>";
            }
            
            $output .=  $result; 
            $output .=  "</div>";
    }
    return $output;
}