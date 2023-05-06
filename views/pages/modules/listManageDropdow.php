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

<form id="lists">
    <select id="listButton" class="dropdown" placeholder="Добавить в список">
        <option <?=@$cheked0;?> value='empty'>Добавить в список</option>
        <option <?=@$chekeds;?> value='s'><?=@$wname?></option>
        <option <?=@$chekedw;?> value='w'><?=@$donename?></option>
        <option <?=@$chekedp;?> value='p'>Запланировано</option>
        <option <?=@$chekedt;?> value='t'>Брошено</option>
        <option value='dlt'>Удалить из списка</option>
    </select>
</form>


<script src="js/customSelect.js"></script>
<script src="js/listLinks.js"></script>
<style>
    #lists div ul li#empty{
        display: none;
    }
</style>