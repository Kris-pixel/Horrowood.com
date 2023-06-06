<?php
require_once '../../connect/db.php';

$query = "SELECT COUNT(*) FROM article";
$result = mysqli_query($link, $query);
$r = mysqli_fetch_row($result);

$numrows = $r[0];
$rowsperpage = 30;
$totalpages = ceil($numrows / $rowsperpage);
$page = 1;

if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $page = (INT)$_GET['page'];
}
if ($page > $totalpages) {
    $page = $totalpages;
}
if ($page < 1) {
    $page = 1;
}
$offset = ($page - 1) * $rowsperpage;

$query = "SELECT * FROM article ORDER BY id DESC LIMIT $offset, $rowsperpage";
$result = mysqli_query($link, $query);

if (mysqli_num_rows($result) < 1) {
    echo "Ничего нет";
}
echo "<table class='mt-2 admin-table'><thead>";
echo "<tr>";
echo "<th>#</th>";
echo "<th>Заголовок</th>";
echo "<th>Рубрика</th>";
echo "<th>Дата</th>";
echo "<th class='col-2 px-0'>Действие</th>";
echo "</tr>
        <tr class='table-border'>
        <th colspan='5'></th>
        </tr> 
    </thead><tbody>";

    $index = 1;
while ($row = mysqli_fetch_assoc($result)) {
    $id = $row['id'];
    $title = $row['title'];
    $topic = $row['topic'];
    $author = $row['posted_by'];
    $date = date_create($row['created_at']);
    $time = date_format($date,'h:m:s d.m.Y');

    ?>

    <tr>
        <td><?=@$index;?></td>
        <td><a href="http://horrowood.com/index.php?action=article&id=<?=@$id;?>"><?php echo $title; ?></a></td>
        <td><?php echo $topic; ?></td>
        <td><?php echo $time; ?></td>
        <td class="row m-0"><a class="mr-1" href="http://horrowood.com/index.php?action=editArticle&id=<?php echo $id; ?>">Редактировать</a> | 
        <div  class="ml-1 breadcrump del-admin-but" data-id="<?php echo $id;?>" data-script="http://horrowood.com/functions/admin/delArticle.php?id=">Удалить</div>
        </td>
    </tr>

    <?php
    $index +=1;
}
echo "</tbody></table>";

// pagination
echo "<div class='mt-4 pagination-div'>";
if ($page > 1) {
    echo "<a class='pagination  pagination-active' href='http://horrowood.com/index.php?action=admin&tab=Article&page=1' class=''><<</a>";
    $prevpage = $page - 1;
    echo "<a class='pagination' href='http://horrowood.com/index.php?action=admin&tab=Article&page=$prevpage' class=''><</a>";
}
$range = 3;
for ($i = ($page - $range); $i < ($page + $range) + 1; $i++) {
    if (($i > 0) && ($i <= $totalpages)) {
        if ($i == $page) {
            echo "<div class='pagination  pagination-active'> $i</div>";
        } else {
            echo "<a class='pagination'  href='http://horrowood.com/index.php?action=admin&tab=Article&page=$i'>$i</a>";
        }
    }
}
if ($page != $totalpages) {
    $nextpage = $page + 1;
    echo "<a class='pagination' href='http://horrowood.com/index.php?action=admin&tab=Article&page=$nextpage'>></a>";
    echo "<a class='pagination' href='http://horrowood.com/index.php?action=admin&tab=Article&page=$totalpages'>>></a>";
}
echo "</div>";?>

<script src="js/confirm.js"></script>
