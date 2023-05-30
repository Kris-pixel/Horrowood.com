<footer class="footer">
        <div class="col-md-4 col-12 ">
            <a href="http://horrowood.com/">
                <div id="logoAnim2"></div>
            </a>
            <h1>Horrorwood</h1>
            <h5 class="slogan">– онлайн-портал для<br> любителей жанра horror</h5>
        </div>
        <div class="col-lg-4 col-md-6 col-12 row  footer-nav mt-5">

            <div class="col-6">
                <a href="http://horrowood.com/index.php?action=filmCatalog">Каталог фильмов</a>
                <a href="http://horrowood.com/index.php?action=bookCatalog">Каталог книг</a>
                <a href="http://horrowood.com/index.php?action=articles">Статьи</a>
            </div>
            <div class="col-6">

            <?php
                if (!empty($_SESSION['login']) && $_SESSION['role'] != 1) {

                    echo "
                            <a href='http://horrowood.com/index.php?action=user&page=film'>Личный кабинет</a>
                        ";

                }else if(!empty($_SESSION['login']) && $_SESSION['role'] == 1){
                    echo "
                    <a href='http://horrowood.com/index.php?action=admin'>Панель администратора</a>
                ";
                }else{
                    echo "
                            <a href='http://horrowood.com/views/pages/login.php'>Вход</a>
                            <a href='http://horrowood.com/views/pages/signup.php'>Регистрация</a>
                        ";
                }
            ?>
            </div>
            
        </div>
        <div class="col-lg-4 col-md-6  footer-nav mt-5 mb-3 social">
            <a href="https://twitter.com/home?lang=ru"><img src="img/icons/twetter.svg" alt=""></a>
            <a href="mailto:vaskris1.618@gmail.com"><img src="img/icons/gmail.svg" alt=""></a>
            <a href="https://www.tiktok.com/"><img src="img/icons/tiktok.svg" alt=""></a>
            <a href="https://www.instagram.com/"><img src="img/icons/insta.svg" alt=""></a>
        </div>
        <div class="col-12 fanhint">Создано фанатом для фанатов, 2023 г.</div>
      </footer>