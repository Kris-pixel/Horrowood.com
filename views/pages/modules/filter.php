<form id="<?=@$action;?>" class="col-md-12 dark-card py-4 dropdown-filter">
                    <div class="box-input">
                        <label class="form-label">Статус:</label>
                        <select id="status" class="dropdown" placeholder="пожалуйста выберите">
                            <option value="0">Любой</option>
                            <option value="a">Анонс</option>
                            <option value="o">Выходит</option>
                            <option value="v">Вышло</option>
                        </select>
                    </div>
                    <div class="box-input mb-3">
                        <label class="form-label">Тип:</label>
                        <select id="type" class="dropdown" placeholder="пожалуйста выберите">
                        <option value="0">любой</option>
                            <?php echo getTypeList($link,$action);?>
                        </select>
                    </div>
                    <div class="box-input mb-3">
                        <label class="form-label">Поджанр:</label>
                        <select id="genre" class="dropdown" placeholder="пожалуйста выберите">
                        <option value="0">любой</option>
                           <?php echo getGenreList($link);?>
                        </select>
                    </div>
                    <div class="box-input mb-3">
                        <label class="form-label">Рейтинг:</label>
                        <select id="raiting" class="dropdown" placeholder="пожалуйста выберите">
                            <option value="0">любой</option>
                            <option value="R">R</option>
                            <option value="R-17">R-17</option>
                        </select>
                    </div>
                    <div class="box-input mb-3">
                        <label class="form-label">Год:</label>
                        <select id="year" class="dropdown" placeholder="пожалуйста выберите">
                            <option value="0">любой</option>
                            <option value="202">2020-е</option>
                            <option value="201">2010-е</option>
                            <option value="200">2000-е</option>
                            <option value="19">до 2000</option>
                        </select>
                    </div>
                    <div class="box-input mb-3">
                        <label class="form-label">Сортировать по:</label>
                        <select id="sort" class="dropdown" placeholder="пожалуйста выберите">
                            <option value="0">неважно</option>
                            <option value="1">алфавиту (А-Я)</option>
                            <option value="2">алфавиту (Я-А)</option>
                            <option value="3">сначала новые</option>
                            <option value="4">сначала старые</option>
                        </select>
                    </div>
                <!-- <div class="button">
                    <input type="submit" class="bbutton button-shadow" value="Натйи">
                </div> -->
                </form>
                <script src="js/filterSelect.js"></script>
                <script src="js/filter.js"></script>