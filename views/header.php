<?php
    if(session_status()!=PHP_SESSION_ACTIVE) session_start();
?>

<nav class="dark">
        <a href="http://horrowood.com/">
            <div id="logoAnim"></div>
        </a>

        <form class="search-panel">
            <fieldset class="input-shadow input-search">
            <input class=" input-search" type="text" placeholder="Поиск...">
            <input class="button-search" type="submit">
            </fieldset>
        </form>

        <div class="nav-container">
            <a class="nav-item article" href="http://horrowood.com/index.php?action=articles&page=1">Статьи</a>

            <div class="menu-dropdown nav-item">
                <button class="dropbtn">Каталог</button>
                <div class="dropdown-content">
                <a href="http://horrowood.com/index.php?action=filmCatalog">Фильмы</a>
                <a href="http://horrowood.com/index.php?action=bookCatalog">Книги</a>
                </div>
            </div>

            <?php
                if (!empty($_SESSION['login']) && $_SESSION['role'] != 1) {

                    $login = $_SESSION['login'];
                    $row = getUserForHeader($link, $login);

                    $user_id = $row['id'];

                    $img = $row['img'];
                    if($img == NULL){ $img ='default_user.png';}

                    echo "
                            <div class='menu-dropdown nav-item'>
                                <button class='dropbtn'>
                                    <p>$login</p>
                                    <img class='login-pic' src='http://horrowood.com/img/db/users/$img' alt=''>
                                </button>
                                <div class='dropdown-content'>
                                    <a href='http://horrowood.com/index.php?action=user&page=film'>Список фильмов</a>
                                    <a href='http://horrowood.com/index.php?action=user&page=book'>Список книг</a>
                                    <a href='http://horrowood.com/index.php?action=user&page=like'>Избранное</a>
                                    <hr>
                                    <a href='http://horrowood.com/index.php?action=user&page=achiv'>Достижения</a>
                                    <hr>
                                    <a href='http://horrowood.com/index.php?action=logout'>Выход</a>
                                </div>
                            </div>
                        ";

                }else if(!empty($_SESSION['login']) && $_SESSION['role'] == 1){
                    $login = $_SESSION['login'];
                    $row = getUserForHeader($link, $login);

                    $user_id = $row['id'];

                    $img = $row['img'];
                    if($img == NULL){ $img ='default_user.png';}

                    echo "
                            <div class='menu-dropdown nav-item'>
                                <button class='dropbtn'>
                                    <p>$login</p>
                                    <img class='login-pic' src='http://horrowood.com/img/db/users/$img' alt=''>
                                </button>
                                <div class='dropdown-content'>
                                    <a href='http://horrowood.com/index.php?action=admin&tab=Article&page=1'>Панель администратора</a>
                                    <hr>
                                    <a href='http://horrowood.com/index.php?action=newArticle'>Новая статья</a>
                                    <a href='http://horrowood.com/index.php?action=newItem&i=f'>Добавить фильм</a>
                                    <a href='http://horrowood.com/index.php?action=newItem&i=b'>Добавить книгу</a>
                                    <hr>
                                    <a href='http://horrowood.com/index.php?action=logout'>Выход</a>
                                </div>
                            </div>
                        ";
                }else{
                    echo "
                        <div class='guest-buttons'>
                            <a class='nav-item in-but' href='http://horrowood.com/views/pages/login.php'>Вход</a>
                            <a class='nav-item reg-but' href='http://horrowood.com/views/pages/signup.php'>Регистрация</a>
                        </div>
                    ";
                }
            ?>

            <!-- <div class="menu-dropdown nav-item">
                <button class="dropbtn">
                    <p>Логин</p>
                    <img class="login-pic" src="ava.png" alt="">
                </button>
                <div class="dropdown-content">
                <a href="#">Список фильмов</a>
                <a href="#">Список книг</a>
                <hr>
                <a href="/">Достижения</a>
                <hr>
                <a href=".">Выход</a>
                </div>
            </div> -->

            <!-- <div class=" guest-buttons">
                <a class="nav-item in-but" href="http://horrowood.com/views/pages/login.php">Вход</a>
                <a class="nav-item reg-but" href="http://horrowood.com/views/pages/signup.php">Регистрация</a>
            </div> -->
        </div>

    </nav>