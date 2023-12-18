<?php ob_start()?>

<form action="" method="POST">
    <div>
        <label for="">mail</label>
        <input type="mail" name="email_users" required>
    </div>
    <div>
        <label for="">Mot de passe</label>
        <input type="password" name="password_users" required>
    </div>
    <div>
        <input type="submit" name="submit" value="Connexion">
    </div>
</form>
<?=$error?>


<?php $content = ob_get_clean()?>