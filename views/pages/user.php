<?php
$user = GetUserInfo($link);

$reg =date_create_from_format('Y-m-d H:i:s', $user['reg_date']);
$reg = date_format($reg, 'd.m.Y');
?>
<div class="W-100 dark-card row m-0">
    <div class="col-md-3 p-3">
        <div id="ava"></div>
    </div>
    <div class="col-md-8">
        <h1><?=@$login;?></h1>
        <div class="stats">
            <div >
                <p class="reading-text">На сайте с <?=@$reg;?></p>
                <p class="reading-text">email: <?=@$user['email'];?></p>
            </div>
            <div class="stat-counts">
                <div class="stats-row">
                    <p class="reading-text">Время за просмотром и чтением </p>
                    <h2><?php echo CountTime($link); ?> мин</h2>
                </div>
                <div class="stats-row">
                    <p class="reading-text">Фильмы</p>
                    <h2><?php echo CountItems($link, 'f%'); ?></h2>
                </div>
                <div class="stats-row">
                    <p class="reading-text">Книги</p>
                    <h2><?php echo CountItems($link, 'b%'); ?></h2>
                </div>
            </div>
               
        </div>
        <div class="stats col-md-8 mb-0">
            <h4 id="film" class="user-link">Список фильмов</h4>
            <h4 id="book" class="user-link">Список книг</h4>
            <h4 id="like" class="user-link">Избранное</h4>
        </div>
    </div>
</div>
<div class="w-100 row m-0">
    <div class="col-md-3 p-0 mt-4">
        <div class="stats-card mb-4">
            <h4>Топ жанров</h4>
            <p class="reading-text"> <?php echo GetFavGenres($link); ?></p>
        </div>
        <div class="stats-card mb-4 pb-0">
            <h4 class="mb-0">Оценки</h4>
            <?php
                GetMarkStat($link,1); 
                GetMarkStat($link,2); 
                GetMarkStat($link,3); 
                GetMarkStat($link,4); 
                GetMarkStat($link,5); 
            ?>
            <canvas id="marks"></canvas>
        </div>
        <div class="stats-card mb-4">
            <h4>Уровень жести</h4>
            <?php
                GetRatingStat($link, 'R-17');
                GetRatingStat($link, 'R');
                GetRatingStat($link, 'PG-13');
            ?>
            <canvas id="horizontalBarChartCanvas"></canvas>
        </div>
    </div>
    <div id="content" class="col-md-9 pl-2 pr-0 mt-4">
        
    </div>
</div>


<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.2.1/chart.min.js" integrity="sha512-v3ygConQmvH0QehvQa6gSvTE2VdBZ6wkLOlmK7Mcy2mZ0ZF9saNbbk19QeaoTHdWIEiTlWmrwAL4hS8ElnGFbA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js" integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="js/switchUserPages.js"></script>
<script src="js/marksChart.js"></script>
<script src="js/horizontalBarChart.js"></script>