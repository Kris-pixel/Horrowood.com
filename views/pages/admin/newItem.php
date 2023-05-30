<?php 
    if($_GET['i'] == 'f'){
        $formTitle =  "Добавить фильм";
        $action = "filmCatalog";
        $ep_amount = "Количестко серий";
        $duration = "Длительность эпизода";
        $cover = "Постер";
        $display = "";
    }elseif ($_GET['i'] == 'b'){
        $formTitle =  "Добавить книгу";
        $action = "bookCatalog";
        $ep_amount = "Количестко томов";
        $duration = "Количество глав";
        $cover = "Обложка";
        $display = "style='display:none;'";
    }else{
        echo "<script>location.href='http://horrowood.com/index.php?action=404';</script>";
    }
?>

<div class="form rectangle-shadow px-5 py-4">
        <div>
            <div>
                <h2><?=@$formTitle;?></h2>
            </div>

            <form class="newitem-form" method="POST" id="<?=@$_GET['i'];?>">
                <div class ="d-flex flex-row justify-content-start">
<div class="mx-md-5">
                <div class="box-input my-4">
                    <label class="form-label mr-2">Название <span class="er-title"></span></label>
                    <input type="text" class="input input-shadow" name="title"> 
                </div>
                <div class="box-input my-4">
                    <label class="form-label mr-2">Оригинальное название  <span class="er-orig-title"></span></label>
                    <input type="text" class="input input-shadow" name="orig-title"> 
                </div>

                <div class="box-input my-4">
                    <label class="form-label mr-2">Страна   <span class="er-country"></span></label>
                    <input type="text" class="input input-shadow" name="country"> 
                </div> 
                <div class="box-input my-4">
                    <label class="form-label mr-2">Дата выхода  <span class="er-release-date"></span></label>
                    <input type="date" class="input input-shadow" name="release-date">    
                </div> 

                <div class="box-input my-4">
                    <label class="form-label mr-2">Статус  <span class="er-status"></span></label>
                    <select class="dropdown" placeholder="пожалуйста выберите" id="status" name="status">
                            <option value="0">Выберите статус</option>
                            <option value="a">Анонс</option>
                            <option value="o">Выходит</option>
                            <option value="v">Вышло</option>
                        </select> 
                </div>
               
                <div class="box-input my-4">
                    <label class="form-label mr-2">Рейтинг <span class="er-rating"></span></label>
                    <select id="raiting" class="dropdown" placeholder="пожалуйста выберите" name="raiting">
                        <option value="0">Выберите рейтинг</option>
                        <option value="PG-13">PG-13</option>
                        <option value="R">R</option>
                        <option value="R-17">R-17</option>
                    </select>
                </div>
                   
</div>
<div class="mx-md-5">
                


                
                <div class="box-input my-4">
                <label class="form-label mr-2">Тип  <span class="er-type"></span></label>
                        <select id="type" class="dropdown" placeholder="пожалуйста выберите" name="type">
                        <option value="0">Выберите тип</option>
                            <?php echo getTypeList($link,$action);?>
                        </select>  
                </div>

                <div class="box-input my-4">
                    <label class="form-label mr-2"><?=@$ep_amount;?>  <span class="er-ep-amount"></span></label>
                    <input class='input' type='number' name='episode-amount' min='0' value='1'>
                </div>
                <div class="box-input my-4">
                    <label class="form-label mr-2"><?=@$duration;?> <span class="er-duration"></span></label>
                    <input class='input' type='number' name='duration' min='0' value='1'>
                </div>

               
                <div class="box-input my-4" <?=@$display;?>>
                    <label class="form-label mr-2">Ссылка на трейлер <span class="er-trailer"></span></label>
                    <input type="url" class="input input-shadow w-100" name="trailer" style="font-size:12px;"> 
                </div>

                <div class="box-input mb-2">
                    <label class="form-label mr-3">Описание <span class="er-description"></span></label>
                    <textarea id = "description" class="input-shadow comment-text" row="30" cols="50" name="description"
                    style="font-size:12px;"></textarea>
                </div>         

              
</div>

<div>
                    <div class="box-input my-4">
                        <label class="form-label mr-2">Поджанры <span class="er-genre"></span></label>
                        <select data-placeholder="выберите поджанры" name="genre" multiple="multiple">
                           <?php echo getGenreList($link);?>
                        </select>
                    </div>

                <div class="box-input my-4">
                    <label class="form-label mr-4"><?=@$cover;?>  <span class="er-img"></span></label>
                    <input type="file" name="img" accept=".webp, .png, .jpg, .jpeg">
                    <span class="input-file bbutton comment-button file-btn">Выберите файл</span>
                    <label class="ml-2 form-label file-name">Файл не выбран</label>
                   
                </div>
                <div class="box-input my-4" <?=@$display;?>>
                    <label class="form-label mr-4">Кадры  <span class="er-frames"></span></label>
                    <input type="file" id="frames" name="frames" accept=".png, .jpg, .jpeg, .webp" multiple="multiple">
                    <span class="input-file bbutton comment-button file-btn">Выберите 3 файлa</span>
                    <label class="ml-2 form-label file-name">Файлы не выбраны</label>
                   
                </div>    
               
</div>
</div>
                <div>
                    <input type="button" class=" mt-3 bbutton button-shadow" name="submit" value="Добавить">
                </div>
            </form>

        </div>
    </div>

<script src="js/multipleSelect.js"></script>
<script src="js/filterSelect.js"></script>
<script src="js/newItem.js"></script>
