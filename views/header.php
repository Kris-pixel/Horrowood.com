<?php
    if(session_status()!=PHP_SESSION_ACTIVE) session_start();
?>

<nav class="dark col-12 big-menu">
    <a class="col-1 mr-3" href="http://horrowood.com/">
        <div id="logoAnim" ></div>
    </a>

    <div class='search-div col-lg-6 col-md-4'>
        <form class="search-panel m-0 w-100" action="http://horrowood.com/index.php">
            <fieldset class="input-shadow">
                <input type="hidden" value="search" name="action">
                <input class=" input-search" type="text" placeholder="Поиск..." id='input-search' name="find">
                <input class="button-search" type="submit" id='search-submit'>
            </fieldset>
        </form>
    </div>

    <div class="nav-container col-5">
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
                    <div>$login</div>
                    <img class='login-pic' src='http://horrowood.com/img/db/users/$img' alt=''>
                </button>
                <div class='dropdown-content'>
                    <a href='http://horrowood.com/index.php?action=user&page=film'>Список фильмов</a>
                    <a href='http://horrowood.com/index.php?action=user&page=book'>Список книг</a>
                    <a href='http://horrowood.com/index.php?action=user&page=like'>Избранное</a>
                    <hr>
                    <a href='http://horrowood.com/index.php?action=logout'>Выход</a>
                </div>
            </div>";

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
        </div> ";
}else{
    echo "
        <div class='guest-buttons'>
            <a class='nav-item in-but' href='http://horrowood.com/views/pages/login.php'>Вход</a>
            <a class='nav-item reg-but' href='http://horrowood.com/views/pages/signup.php'>Регистрация</a>
        </div> ";
}
?>

    </div>

</nav>

<nav class="dark col-12 small-menu">
    <a class="col-1 mr-3" href="http://horrowood.com/">
        <div id="logoAnim3" ></div>
    </a>
    <img id="burger" src="img/icons/burger.png" width="35" height="auto">
</nav>
<?php

if (!empty($_SESSION['login']) && $_SESSION['role'] != 1) {
                    
    $login = $_SESSION['login'];
    $row = getUserForHeader($link, $login);

     $user_id = $row['id'];

    $img = $row['img'];
    if($img == NULL){ $img ='default_user.png';}

        echo " <div class='small-menu-block pt-5'>
        <div class='small-menu-head'>
            <div class='d-flex flex-row align-items-center justifycontent-center'><img class='login-pic' src='http://horrowood.com/img/db/users/$img'> <h1>$login</h1></div>
            <h2 class='menu-close'>X</h2>
        </div>
        <div class='small-menu-body'>
            <a  class='nav-item article px-5' href='http://horrowood.com/index.php?action=user&page=film'>Мои фильмы</a>
            <a  class='nav-item article px-5' href='http://horrowood.com/index.php?action=user&page=book'>Мои книги</a>
            <a  class='nav-item article px-5' href='http://horrowood.com/index.php?action=user&page=like'>Избранное</a>
            <hr class='small-menu-hr'>
            <a class='nav-item article px-5' href='http://horrowood.com/index.php?action=articles&page=1'>Статьи</a>
            <a   class='nav-item article px-5' href='http://horrowood.com/index.php?action=filmCatalog'> Каталог фильмов</a>
            <a  class='nav-item article px-5' href='http://horrowood.com/index.php?action=bookCatalog'>Каталог книг</a>
            <div class='search-div col-lg-6 col-md-4 ml-4'>
            <form class='search-panel m-0 w-100' action='http://horrowood.com/index.php'>
                <fieldset class='input-shadow'>
                    <input type='hidden' value='search' name='action'>
                    <input class=' input-search' type='text' placeholder='Поиск...' id='input-search' name='find'>
                    <input class='button-search' type='submit' id='search-submit'>
                </fieldset>
            </form>
        </div>
            <hr class='small-menu-hr'>
            <a  class='nav-item article px-5'href='http://horrowood.com/index.php?action=logout'>Выход</a>

        </div>
    </div>";

}else if(!empty($_SESSION['login']) && $_SESSION['role'] == 1){
    $login = $_SESSION['login'];
    $row = getUserForHeader($link, $login);

     $user_id = $row['id'];

    $img = $row['img'];
    if($img == NULL){ $img ='default_user.png';}

    echo "<div class='small-menu-block pt-5'>
    <div class='small-menu-head'>
        <div class='d-flex flex-row align-items-center justifycontent-center'><img class='login-pic' src='http://horrowood.com/img/db/users/$img'> <h1>$login</h1></div>
        <h2 class='menu-close'>X</h2>
    </div>
    <div class='small-menu-body'>
        <a  class='nav-item article px-5' href=''http://horrowood.com/index.php?action=admin&tab=Article&page=1'>Панель администратора</a>
        <hr class='small-menu-hr'>
        <a  class='nav-item article px-5' href='http://horrowood.com/index.php?action=newArticle'>Новая статья</a>
        <a  class='nav-item article px-5'  href='http://horrowood.com/index.php?action=newItem&i=f'>Добавить фильм</a>
        <a  class='nav-item article px-5' href='http://horrowood.com/index.php?action=newItem&i=b'>Добавить книгу</a>
        <hr class='small-menu-hr'>
        <a class='nav-item article px-5' href='http://horrowood.com/index.php?action=articles&page=1'>Статьи</a>
        <a   class='nav-item article px-5' href='http://horrowood.com/index.php?action=filmCatalog'> Каталог фильмов</a>
        <a  class='nav-item article px-5' href='http://horrowood.com/index.php?action=bookCatalog'>Каталог книг</a>
        <div class='search-div col-lg-6 col-md-4 ml-4'>
        <form class='search-panel m-0 w-100' action='http://horrowood.com/index.php'>
            <fieldset class='input-shadow'>
                <input type='hidden' value='search' name='action'>
                <input class=' input-search' type='text' placeholder='Поиск...' id='input-search' name='find'>
                <input class='button-search' type='submit' id='search-submit'>
            </fieldset>
        </form>
    </div>
        <hr class='small-menu-hr'>
            <a  class='nav-item article px-5'href='http://horrowood.com/index.php?action=logout'>Выход</a>
    </div>
</div> ";
}else{
    echo "<div class='small-menu-block pt-5'>
    <div class='small-menu-head'>
        <div class='d-flex flex-row align-items-center justifycontent-center'><h1>HORRORWOOD</h1></div>
        <h2 class='menu-close'>X</h2>
    </div>
    <div class='small-menu-body'>
    <div class='guest-buttons m-5'>
        <a class='nav-item in-but' href='http://horrowood.com/views/pages/login.php'>Вход</a>
        <a class='nav-item reg-but' href='http://horrowood.com/views/pages/signup.php'>Регистрация</a>
    </div>
        <hr class='small-menu-hr'>
        <a class='nav-item article px-5' href='http://horrowood.com/index.php?action=articles&page=1'>Статьи</a>
        <a   class='nav-item article px-5' href='http://horrowood.com/index.php?action=filmCatalog'> Каталог фильмов</a>
        <a  class='nav-item article px-5' href='http://horrowood.com/index.php?action=bookCatalog'>Каталог книг</a>
        <div class='search-div col-lg-6 col-md-4 ml-4'>
        <form class='search-panel m-0 w-100' action='http://horrowood.com/index.php'>
            <fieldset class='input-shadow'>
                <input type='hidden' value='search' name='action'>
                <input class=' input-search' type='text' placeholder='Поиск...' id='input-search' name='find'>
                <input class='button-search' type='submit' id='search-submit'>
            </fieldset>
        </form>
    </div>
    </div>
</div>  ";
}
?>

</div>

<div id="Search">
    <table id="SearchTable">
        <tbody id="txtHint">
        </tbody>
    </table>
</div>
<script type="text/javascript" src="js/search.js"></script>
<script>
    // if(window.innerWidth <= 768){
        // console.log(window.innerWidth);
    $( "#burger" ).on( "click", function() {
        console.log(window.innerWidth);
        $( ".small-menu-block" ).animate({ "left": "-=775px" }, "slow" );
    });

    $( ".menu-close" ).on( "click", function() {
        $( ".small-menu-block" ).animate({ "left": "+=775px" }, "slow" );
    });
    // }
</script>