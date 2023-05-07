<?php 

$search =mysqli_real_escape_string($link, $_GET['find']);

if($search != ''){

    SearchTable('items','f', $search, $link);
    SearchTable('items','b', $search, $link);
    SearchTable('article','', $search, $link);
    

}else{
    $url = $_SESSION['url'];
    echo "<script> location.href = '$url';</script>";
}


function SearchTable($table, $itemType, $search, $link){
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
        echo "<h2>$h2</h2>
        <div class='catalog pt-0'>";
        for ($i=0; $i < count($arrname); $i++) { 
                $result .=  "  <div class='card search-card mb-4 mx-2'>
                                    <a href='".$arrlink[$i]."'>
                                        <div class='card-div-img'><img src='http://horrowood.com/img/db/items/".$arrimg[$i]."' alt='".$arrimg[$i]."' title='".$arrimg[$i]."'></div>
                                        <div class='overlay'> <div class='text'>".$arrname[$i]."</div></div>
                                    </a>
                                </div>";
            }
            
                echo $result; 
        echo "</div>";
    }
    if(count($arrname) && $table =='article'){
        echo "<h2>$h2</h2>
        <div class=''>
    <div class='col-md-8 justify-content-start'>";
        for ($i=0; $i < count($arrname); $i++) { 
                $str = substr($arrtext[$i], 0, 229).'...';
                $result .=  "<div class='dark-article-card mb-4'>
                        <a class='catalog-article-link dark-article-layout' href='".$arrlink[$i]."'>
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
            
                echo $result; 
        echo "</div></div>";
    }
}