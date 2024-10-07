<ul>
    <?php if(!isset($_SESSION["login"])):?>
        <li>
            <a href="login.php">Giriş yap</a>
        </li>

        <li>
            <a href="register.php">Hesap oluştur</a>
        </li>
    <?php else:?>    
        <li>
            <a href="../ctf/index.php">Kurallar</a>
        </li>
        <li>
            <a href="../ctf/question.php">Sorular</a>
        </li>
        <?php if(isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"] == 1):?>
            <li>
                <a href="../admin/">Admin Paneli</a>
            </li>
        <?php endif?>

        <!-- <li>
            <a href="../ctf/scoreboard.php">Scoreboard</a>
        </li> -->
        <li>
            <a href="phpPro/logout.php">Çıkış yap</a>
        </li>
    <?php endif?>
</ul>