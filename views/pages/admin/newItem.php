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

            <form class="newitem-form" method="POST">
                <div class ="d-flex flex-row justify-content-start">
<div class="mx-md-5">
                <div class="box-input my-4">
                    <label class="form-label mr-2">Название</label>
                    <input type="text" class="input input-shadow" name="title"> 
                    <span class="er-title"></span>
                </div>
                <div class="box-input my-4">
                    <label class="form-label mr-2">Оригинальное название</label>
                    <input type="text" class="input input-shadow" name="orig-title"> 
                    <span class="er-orig-title"></span>
                </div>

                <div class="box-input my-4">
                    <label class="form-label mr-2">Страна</label>
                    <input type="text" class="input input-shadow" name="country"> 
                    <span class="er-country"></span>
                </div> 

                <div class="box-input my-4">
                    <label class="form-label mr-2">Дата выхода</label>
                    <input type="date" class="input input-shadow" name="release-date"> 
                    <span class="er-release-date"></span>
                </div>       

                <div class="box-input my-4">
                    <label class="form-label mr-2">Статус</label>
                    <select class="dropdown" placeholder="пожалуйста выберите" id="status">
                            <option value="0">Выберите статус</option>
                            <option value="a">Анонс</option>
                            <option value="o">Выходит</option>
                            <option value="v">Вышло</option>
                        </select>
                        <span class="er-status"></span>
                </div>

                <div class="box-input my-4">
                <label class="form-label mr-2">Тип</label>
                        <select id="type" class="dropdown" placeholder="пожалуйста выберите" id="type">
                        <option value="0">Выберите тип</option>
                            <?php echo getTypeList($link,$action);?>
                        </select>
                        <span class="er-type"></span>
                </div>
</div>
<div class="mx-md-5">
                <div class="box-input my-4" <?=@$display;?>>
                    <label class="form-label mr-2">Ссылка на трейлер</label>
                    <input type="url" class="input input-shadow" name="trailer"> 
                    <span class="er-trailer"></span>
                </div>

                <div class="box-input my-4">
                    <label class="form-label mr-2"><?=@$ep_amount;?></label>
                    <input class='input' type='number' name='episode-amount' min='0' value='1'>
                    <span class="er-ep-amount"></span>
                </div>
                <div class="box-input my-4">
                    <label class="form-label mr-2"><?=@$duration;?></label>
                    <input class='input' type='number' name='duration' min='0' value='1'>
                    <span class="er-duration"></span>
                </div>

              
                <div class="box-input my-4">
                        <label class="form-label mr-2">Поджанры</label>
                        <select class="dropdown" placeholder="пожалуйста выберите" name="genre" multiple="multiple">
                        <option value="0"> </option>
                           <?php echo getGenreList($link);?>
                        </select>
                        <span class="er-genre"></span>
                    </div>

              

                <div class="box-input mb-2">
                    <label class="form-label mr-3">Описание</label><span class="er-description"></span>
                    <textarea id = "description" class="input-shadow comment-text" row="30" cols="50" name="description"></textarea>
                </div>
</div>

<div>
                <div class="box-input my-4">
                    <label class="form-label mr-4"><?=@$cover;?></label>
                    <input type="file" name="img" accept=".png, .jpg, .jpeg">
                    <span class="input-file bbutton comment-button file-btn">Выберите файл</span>
                    <label class="ml-2 form-label file-name">Файл не выбран</label>
                    <span class="er-img"></span>
                </div>
                <div class="box-input my-4" <?=@$display;?>>
                    <label class="form-label mr-4">Кадры</label>
                    <input type="file" name="frames" accept=".png, .jpg, .jpeg" multiple="multiple">
                    <span class="input-file bbutton comment-button file-btn">Выберите 3 файлa</span>
                    <label class="ml-2 form-label file-name">Файлы не выбраны</label>
                    <span class="er-frames"></span>
                </div>    
              

               
</div>
</div>
                <div>
                    <input type="button" class=" mt-3 bbutton button-shadow" name="submit" value="Добавить">
                </div>
            </form>

        </div>
    </div>

<script src="js/filterSelect.js"></script>
<script src="js/newItemSelect.js"></script>
<script src="js/newItem.js"></script>
