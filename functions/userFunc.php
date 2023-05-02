<?php
// require_once('connect\db.php');

function getUserForHeader($link,$login){
    $query = "SELECT img FROM user  WHERE login ='$login'";
    $rez = mysqli_query($link, $query)or die("Ошибка " . mysqli_error($link)); 
    $row = mysqli_fetch_assoc($rez);
    return $row;
}

function GetUserInfo($link){
    $id = $_SESSION['id'];
    $query = "SELECT * FROM user  WHERE id ='$id'";
    $rez = mysqli_query($link, $query)or die("Ошибка " . mysqli_error($link)); 
    $row = mysqli_fetch_assoc($rez);
    return $row;
}

function CountItems($link, $code){
    $id = $_SESSION['id'];
    $query = "SELECT COUNT(title) as c FROM items JOIN lists
            ON items.id = lists.id_item
            WHERE id_user ='$id' AND items.id like '$code' 
            AND list_type_code IS NOT NULL";
    $rez = mysqli_query($link, $query)or die("Ошибка " . mysqli_error($link)); 
    $row = mysqli_fetch_assoc($rez);
    return $row['c'];
}

function CountTime($link){
    $id = $_SESSION['id'];
    $query = "SELECT DISTINCT ((SELECT COUNT(duration)*25 as c FROM items JOIN lists
                ON items.id = lists.id_item
                WHERE id_user ='$id' AND type_code like 'k%') +
            (SELECT COUNT(duration) FROM items JOIN lists
                ON items.id = lists.id_item
                WHERE id_user ='$id' AND type_code like 'f%') ) as c
            FROM items";
    $rez = mysqli_query($link, $query)or die("Ошибка " . mysqli_error($link)); 
    $row = mysqli_fetch_assoc($rez);
    return $row['c'];
}

function GetFavGenres($link){
    $id = $_SESSION['id'];
    $query = "SELECT count(name) as c, name FROM lists JOIN genre 
            ON lists.id_item=genre.id_item JOIN genre_names 
            ON genre.genre_code=genre_names.code
            WHERE id_user = '$id'
            GROUP BY name ORDER BY c DESC LIMIT 6";
        $rez = mysqli_query($link, $query)or die("Ошибка " . mysqli_error($link)); 
        while ($row = mysqli_fetch_assoc($rez)) {
          $arr[] = $row['name'];
        }
        if(count($arr)>0){
          $genre = implode(", ", $arr);
        }
        else{ $genre = " ";}
    return $genre;
}

function GetMarkStat($link, $mark){
    $id = $_SESSION['id'];
    $query = "SELECT count(id) AS c FROM lists WHERE id_user ='$id' AND mark='$mark'";
    $rez = mysqli_query($link, $query)or die("Ошибка " . mysqli_error($link)); 
    $row = mysqli_fetch_assoc($rez);
    $count = $row['c'];

    if($count){
        echo "<p style='display:none;' id='m$mark'>$count</p>";
    }else{
        echo "<p style='display:none;' id='m$mark'>0</p>";
    }
}

function GetRatingStat($link, $rat){
    $id = $_SESSION['id'];
    $query = "SELECT count(lists.id) AS c FROM lists JOIN items
            ON lists.id_item = items.id
            WHERE id_user ='$id' AND rating='$rat'";
    $rez = mysqli_query($link, $query)or die("Ошибка " . mysqli_error($link)); 
    $row = mysqli_fetch_assoc($rez);
    $count = $row['c'];

    if($count){
        echo "<p style='display:none;' id='r$rat'>$count</p>";
    }else{
        echo "<p style='display:none;' id='r$rat'>0</p>";
    }
}

function getTable($link, $listType, $rowcount, $itemType){
    $selectTextW = $itemType == 'f%' ? "просмотрено" : "прочитано";
    $selectTextS =  $itemType == 'f%' ? "смотрю" : "читаю";

    $selectAmount =  $itemType == 'f%' ? "episode_amount" : "duration";

    $id = $_SESSION['id'];
    $arrname = []; $arrmarks = [];
    $arrwatched = []; $arrepisoddes = []; $recordId = [];
    $result = '';
    $query = "SELECT lists.id AS i,lists.id_item AS a, lists.id_user AS u, w_amount,mark, title, $selectAmount AS amount, list_type_code 
    FROM lists JOIN items ON lists.id_item=items.id
    WHERE id_user='$id' AND list_type_code='$listType' AND items.id like '$itemType'";
    $rez = mysqli_query($link, $query)or die("Ошибка " . mysqli_error($link)); 
    while ($row = mysqli_fetch_assoc($rez)) {
        $arrname[] = $row['title'];
        $arrmarks[] = $row['mark'];
        $itemId[] = $row['a'];
        $arrwatched[] = $row['w_amount'];
        $arrepisoddes[] = $row['amount'];
        $recordId[] = $row['i'];

    }

    for ($i=0; $i < count($arrname); $i++) { 
        $mark = $arrmarks[$i] == NULL ? "-" : $arrmarks[$i];
        $markForm = $arrmarks[$i] == NULL ? NULL : $arrmarks[$i];
        $index=$i+1;
        $result .=  "<tr class='data-row'>
        <td>$index</td>
        <td>
          <a href='http://horrowood.com/index.php?action=filmItem&id=$itemId[$i]'>$arrname[$i]</a>
        </td>
        <td>
          <span class='user-mark'>$mark</span>
        </td>
        <td><span class='episod'>$arrwatched[$i]</span><span>/</span>$arrepisoddes[$i]
        </td>
        <td class='num text-end'><button id='$rowcount' type='button 'class='edit bbutton list-button'>Изменить</button>
        <input type='hidden' value='$listType'></td>
      </tr>
    
      <tr class='editform' id='form$rowcount'>
        <td colspan ='5'>
        <form>
        <div class='list-div'>
            <label>Список:</label>
            <select>
                <option></option>
                <option value='s'>$selectTextS</option>
                <option value='w'>$selectTextW</option>
                <option value='p'>запланировано</option>
                <option value='t'>брошено</option>
            </select>
          </div>
        <div class='mark-div'>
          <label for='mark'>Оценка:</label>
          <input class='input' type='number' name='mark' min='1' max='5' value='$markForm'>
        </div>
        <div class='episod-div'>
          <label for='wctd'>Просмотрено:</label>
          <input class='input' type='number' id='wctd' name='wctd' min='0' max='$arrepisoddes[$i]' value='$arrwatched[$i]'>
          <label for='pwd'> из $arrepisoddes[$i]</label>
        </div>
        <div>
        <a class='delete'>Удалить из списка</a>
        <input class='edit-submit bbutton list-button' type='button' value='Готово'>
        <input type='hidden' value='$recordId[$i]'></input>
        </div>
      </form>
        </td>
        </tr> ";
        $rowcount++;
    }
    
    echo $result;
        return $rowcount; 
}
?>