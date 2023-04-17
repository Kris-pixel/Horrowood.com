
<div id="welcome">
</div>
        <div class="mt-3">
            <h2>Новое в каталоге</h2>
            <div class="catalog owl-carousel">
                <?php echo GetNewOrPopItems($link, 1);?>
            </div>
        </div>


            <div>
                <h2 class="mb-3">Новые статьи</h2>
                <div class="new-articles">
                    <div class="card col-md-3">
                        <a href="">
                        <img class="twocorner-img" src="horrorwood.jpg" alt="">
                        <div class="article-title">Название статьиНазвание статьи Название статьи</div>
                        <div class="overlay"> </div>
                        </a>
                    </div>
                    <div class="card col-md-3">
                        <a href="">
                        <img class="twocorner-img" src="horrorwood.jpg" alt="">
                        <div class="article-title">Название статьиНазвание статьи Название статьи</div>
                        <div class="overlay"> </div>
                        </a>
                    </div>
                    <div class="card col-md-3">
                        <a href="">
                        <img class="twocorner-img" src="horrorwood.jpg" alt="">
                        <div class="article-title">Название статьиНазвание статьи Название статьи</div>
                        <div class="overlay"> </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="mt-3">
            <h2>Популярное в каталоге</h2>
            <div class="catalog owl-carousel">
                <?php echo GetNewOrPopItems($link, 0);?>
            </div>
        </div>

        </div>
    </div>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/corusel.js"></script>