<div class="container">
    <div class="row justify-content-between">

        <div class="col-lg-12 col-12 d-flex align-items-center">
            <a class="site-header-text d-flex justify-content-center align-items-center me-auto" href="index.php">
                <i class="bi-box"></i>

                <span>
                    <?php echo $settings["s_webTitle"]?>
                </span>
            </a>

            <ul class="social-icon d-flex justify-content-center align-items-center mx-auto">
                <span class="text-white me-4 d-none d-lg-block">Stay connected</span>
                
                <?php if(!empty($settings["s_instagram"])):?>
                    <li class="social-icon-item">
                        <a href="<?php echo $settings["s_instagram"]?>" class="social-icon-link bi-instagram"></a>
                    </li>
                <?php endif?>
                
                <?php if(!empty($settings["s_twitter"])):?>
                    <li class="social-icon-item">
                        <a href="<?php echo $settings["s_twitter"]?>" class="social-icon-link bi-twitter"></a>
                    </li>
                <?php endif?>

                <?php if(!empty($settings["s_linkedin"])):?>
                    <li class="social-icon-item">
                        <a href="<?php echo $settings["s_linkedin"]?>" class="social-icon-link bi-linkedin"></a>
                    </li>
                <?php endif?>
                
                <?php if(!empty($settings["s_whatsapp"])):?>
                    <li class="social-icon-item">
                        <a href="<?php echo $settings["s_whatsapp"]?>" class="social-icon-link bi-whatsapp"></a>
                    </li>
                <?php endif?>
                
                <?php if(!empty($settings["s_telegram"])):?>
                    <li class="social-icon-item">
                        <a href="<?php echo $settings["s_telegram"]?>" class="social-icon-link bi-telegram"></a>
                    </li>
                <?php endif?>
            </ul>
            <?php if(isset($_SESSION["login"])):?>
                <span style="color: white;">Hoşgeldin <?php echo $userData["u_username"]?></span>
            <?php endif?>
            <a class="bi-list offcanvas-icon" data-bs-toggle="offcanvas" href="#offcanvasMenu" role="button" aria-controls="offcanvasMenu"></a>

        </div>

    </div>
</div>