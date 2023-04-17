<?php
if($action == "bookItem")
{
    $wname="Читаю";
    $donename="Прочитано";
}
if($action == "filmItem")
{
    $wname="Смотрю";
    $donename="Просмотрено";
}

$cheked = ItemCheckInLists($link, $id);
    $cheked0='';
        $chekeds='';
        $chekedw='';
        $chekedp='';
        $chekedt='';
switch ($cheked['k']) {
    case 't':
        $chekedt='selected';
        break;
    case 's':
        $chekeds='selected';
        break;
    case 'w':
        $chekedw='selected';

        break;
    case 'p':
        $chekedp='selected';
        break;
    
    default:
        $cheked0='selected';
        break;
}
?>

<form action="">
    <select id="listButton" class="dropdown" placeholder="Добавить в список">
        <option <?=@$cheked0;?>>Добавить в список</option>
        <option <?=@$chekeds;?>><?=@$wname?></option>
        <option <?=@$chekedw;?>><?=@$donename?></option>
        <option <?=@$chekedp;?>>Запланировано</option>
        <option <?=@$chekedt;?>>Брошено</option>
        <option>Удалить из списка</option>
    </select>
</form>


<script src="js/customSelect.js"></script>
<script src="js/listLinks.js"></script>