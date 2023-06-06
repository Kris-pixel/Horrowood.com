<?php
require_once '../../connect/db.php';

$query = "SELECT COUNT(*) FROM items WHERE id LIKE 'b-%'";
$result = mysqli_query($link, $query);
$r = mysqli_fetch_row($result);

$numrows = $r[0];
$rowsperpage = 15;
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

$query = "SELECT * FROM items JOIN item_types ON items.type_code = item_types.code
            JOIN status ON items.satus_code = status.code
            WHERE id like 'b%'
            ORDER BY items.id DESC 
            LIMIT $offset, $rowsperpage";
$result = mysqli_query($link, $query);

if (mysqli_num_rows($result) < 1) {
    echo "Ничего нет";
}
echo "<table class='mt-2 admin-table'><thead>";
echo "<tr>";
echo "<th>#</th>";
echo "<th>Название</th>";
echo "<th>Тип</th>";
echo "<th>Статус</th>";
echo "<th>Автор</th>";
echo "<th class='mr-3'>Рейтинг</th>";
echo "<th>Дата добавления</th>";
echo "<th>Действие</th>";
echo "</tr>
        <tr class='table-border'>
        <th colspan='8'></th>
        </tr> 
    </thead><tbody>";

$index = 1;
while ($row = mysqli_fetch_assoc($result)) {
    $id = $row['id'];
    $title = $row['title'];
    $type = $row['name'];
    $status = $row['status_name'];
    $author = $row['author'];
    $r = $row['rating'];
    $date = date_create($row['date_rec_creation']);
    $time = date_format($date,'h:m:s d.m.Y');

    ?>

    <tr>
        <td><?=@$index;?></td>
        <td><a href="http://horrowood.com/index.php?action=bookItem&id=<?=@$id;?>"><?php echo substr($title, 0, 50); ?></a></td>
        <td><?=@$type;?></td>
        <td><?=@$status;?></td>
        <td><?=@$author;?></td>
        <td><?=@$r;?></td>
        <td><?=@$time;?></td>
        <td>
            <div  class="breadcrump del-admin-but" data-id="<?php echo $id;?>" data-script="http://horrowood.com/functions/admin/delItem.php?id=">Удалить</div>
        </td>
    </tr>

    <?php
    $index +=1;
}
echo "</tbody></table>";

// pagination
echo "<div class='mt-4 pagination-div'>";
if ($page > 1) {
    echo "<a class='pagination  pagination-active' href='http://horrowood.com/index.php?action=admin&tab=Book&page=1' class=''><<</a>";
    $prevpage = $page - 1;
    echo "<a class='pagination' href='http://horrowood.com/index.php?action=admin&tab=Book&page=$prevpage' class=''><</a>";
}
$range = 3;
for ($i = ($page - $range); $i < ($page + $range) + 1; $i++) {
    if (($i > 0) && ($i <= $totalpages)) {
        if ($i == $page) {
            echo "<div class='pagination  pagination-active'> $i</div>";
        } else {
            echo "<a class='pagination'  href='http://horrowood.com/index.php?action=admin&tab=Book&page=$i'>$i</a>";
        }
    }
}
if ($page != $totalpages) {
    $nextpage = $page + 1;
    echo "<a class='pagination' href='http://horrowood.com/index.php?action=admin&tab=Book&page=$nextpage'>></a>";
    echo "<a class='pagination' href='http://horrowood.com/index.php?action=admin&tab=Book&page=$totalpages'>>></a>";
}
echo "</div>";?>
<script src="js/confirm.js"></script>
