<div class="form rectangle-shadow px-5 py-4">
        <div>
            <div>
                <h2>Новая статья</h2>
            </div>

            <form class="article-form" method="POST">

                <div class="box-input my-3">
                    <label class="form-label mr-2">Заголовок</label>
                    <input type="text" class="input input-shadow" name="title"> 
                    <span class="er-title"></span>
                </div>

                <div class="box-input mb-3">
                    <label class="form-label mr-4">Рубрика</label>
                    <input type="text" class="input input-shadow" name="topic"> 
                    <span class="er-topic"></span>
                </div>

                <div class="box-input mb-3">
                    <label class="form-label mr-4">Обложка</label>
                    <input type="file" name="img" accept=".png, .jpg, .jpeg">
                    <span class="input-file bbutton comment-button file-btn">Выберите файл</span>
                    <label class="ml-2 form-label file-name">Файл не выбран</label>
                    <span class="er-img"></span>
                </div>

                <div class="box-input mb-2">
                    <label class="form-label mr-3">Текст</label><span class="er-text"></span>
                    <textarea id = "description" row="30" cols="50" name="description"></textarea>
                </div>
                <div>
                    <input type="button" class=" mt-3 bbutton button-shadow" name="submit" value="Опубликовать">
                </div>
            </form>

        </div>
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.19.1/trumbowyg.min.js"></script>
<script>
    $('#description').trumbowyg();
</script>
<script src="js/newArticle.js"></script>