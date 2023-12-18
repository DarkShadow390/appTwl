<?php ob_start()?>
<?php if(isset($_SESSION['connected'])):?>
    <header>
        <ul>
            <li><a href="./" id="twl">TWL</a></li>
            <li id="tagDate">date</li>
            <li><a href="./" id="profilUser"></a></li>
        </ul>
    </header>
<?php else:?>
    <header>
        <ul>
            <?php if($_SERVER['REQUEST_URI'] == "/appTwl/connexionUser"):?>
                <li><a href="./" id="twl">TWL</a></li>
                <li><a href="./addUser" id="inscription">Inscription</a></li>
            <?php elseif ($_SERVER['REQUEST_URI'] == "/appTwl/addUser"):?>
                <li><a href="./" id="twl">TWL</a></li>
                <li><a href="./connexionUser" id="connexion">Connexion</a></li>
            <?php else :?>
                <li><a href="./" id="twl">TWL</a></li>
                <li><a href="./addUser" id="inscription">Inscription</a></li>
                <li><a href="./connexionUser" id="connexion">Connexion</a></li>
            <?php endif ?>
        </ul>
    </header>
<?php endif;?>
<?php $navbar = ob_get_clean()?>
