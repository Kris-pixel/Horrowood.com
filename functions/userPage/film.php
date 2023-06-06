<?php 
require_once('../userFunc.php');
require_once('../../connect/db.php');
if(session_status()!=PHP_SESSION_ACTIVE) session_start();
?>


<div class="planing mb-4">
<div class="list-title col-md-12 dark-card mb-3"> <h4>Запланировано</h4></div>
<table>
  <thead>
    <tr>
      <th class="pr-2">#</th>
      <th class="col-lg-9">Название</th>
      <th>Оценка</th>
      <th>Эпизоды</th>
      <th></th>
    </tr>
    <tr class="table-border">
      <th colspan="5"></th>
    </tr>
  </thead>

    <tbody>
    <?php $rowcount=1; $rowcount = getTable($link, 'p', $rowcount, 'f%');?>
    </tbody>
  </table>
</div>

<div class="watching mb-4">
<div class="list-title col-md-12 dark-card mb-3"> <h4>Смотрю</h4></div>
<table>
  <thead>
    <tr>
      <th class="pr-2">#</th>
      <th class="col-lg-9">Название</th>
      <th>Оценка</th>
      <th>Эпизоды</th>
      <th></th>
    </tr>
    <tr class="table-border">
      <th colspan="5"></th>
    </tr>
  </thead>

    <tbody>
    <?php $rowcount = getTable($link, 's', $rowcount,'f%');?>
    </tbody>
  </table>
</div>

<div class="watched mb-4">
<div class="list-title col-md-12 dark-card mb-3"> <h4>Просмотрено</h4></div>
<table>
  <thead>
    <tr>
      <th class="pr-2">#</th>
      <th class="col-lg-9">Название</th>
      <th>Оценка</th>
      <th>Эпизоды</th>
      <th></th>
    </tr>
    <tr class="table-border">
      <th colspan="5"></th>
    </tr>
  </thead>

    <tbody>
    <?php $rowcount = getTable($link, 'w', $rowcount,'f%');?>
    </tbody>
  </table>
</div>

<div class="throw mb-4">
<div class="list-title col-md-12 dark-card mb-3"> <h4>Брошено</h4></div>
<table>
  <thead>
    <tr>
      <th class="pr-2">#</th>
      <th class="col-lg-9">Название</th>
      <th>Оценка</th>
      <th>Эпизоды</th>
      <th></th>
    </tr>
    <tr class="table-border">
      <th colspan="5"></th>
    </tr>
  </thead>

    <tbody>
    <?php $rowcount = getTable($link, 't', $rowcount,'f%');?>
    </tbody>
  </table>
</div>
<script src="js/editItem.js"></script>