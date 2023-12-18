<?php ob_start()?>

<form action="" method="POST" enctype="multipart/form-data">
    <div>
        <label for="">nom *</label>
        <input type="text" name="name_users" required>
    </div>
    <div>
        <label for="">prenom *</label>
        <input type="text" name="firstname_users" required>
    </div>
    <div>
        <label for="">email *</label>
        <input type="mail" name="email_users" required>
    </div>
    <div>
        <label for="">Mot de passe *</label>
        <input type="password" name="password_users" required>
    </div>
    <div>
        <label for="">Comfirmer Mot de passe *</label>
        <input type="password" name="repeat_password_users" required>
    </div>
    <div>
        <label for="">Image de profil</label>
        <input type="file" name="image_users">
    </div>
    <div>
        <input type="submit" name="submit" value="Valider">
    </div>
</form>
<?=$error?>


<?php $content = ob_get_clean()?>