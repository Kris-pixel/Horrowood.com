<div class="container-wrapper mb-5">  
    <div class="star-container d-flex align-items-center justify-content-center">
        <div class="row justify-content-center">    
                        
        <!-- star rating -->
            <div class="rating-wrapper">
                <h2 class="item-mark">
                    <?php echo GetItemRaitingNumber($link, $id);?>
                </h2>

                <?php
                    if(!empty($_SESSION['login'])){
                        $markUser = GetUserRaitingStars($link, $id);
                        // var_dump(GetUserRaitingStars($link, $id));
                        if($markUser['m']){
                            $mark = GetItemRaitingStars($link, $id);
                            
                            for ($i=5; $i > 0 ; $i--) { 
                                $checked = ($i == $mark)? 'checked' : '';
                                
                                echo "
                                    <input type='radio' id='$i-star-rating' name='star-rating' value='$i' $checked>
                                    <label for='$i-star-rating' class='star-rating star hoverable'>
                                        <i class='fas fa-star d-inline-block'></i>
                                    </label>
                                    ";
                            }
                        }else{
                            for ($i=5; $i > 0 ; $i--) {                                 
                                echo "
                                    <input type='radio' id='$i-star-rating' name='star-rating' value='$i'>
                                    <label for='$i-star-rating' class='star-rating star hoverable'>
                                        <i class='fas fa-star d-inline-block'></i>
                                    </label>
                                    ";
                            }
                        }

                    }else{
                        $mark = GetItemRaitingStars($link, $id);
                        for ($i=5; $i > 0 ; $i--) { 
                            $checked = ($i == $mark)? 'checked' : '';
                            
                            echo "
                                <input type='radio' id='$i-star-rating' name='star-rating' value='$i' disabled $checked>
                                <label for='$i-star-rating' class='star-rating star'>
                                    <i class='fas fa-star d-inline-block'></i>
                                </label>
                                ";
                        }
                    }
                ?>

            </div>
                        
        </div>
    </div>
</div>
<script src="js/stars.js"></script>