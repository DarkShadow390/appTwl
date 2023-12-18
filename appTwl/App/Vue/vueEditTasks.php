<?php ob_start()?>

<form action="" method="POST" enctype="multipart/form-data">
    <?php foreach($tab as $tasks):?>
        <div>
            <label for="title_tasks">Titre de la tâche *</label>
            <input type="text" name="title_tasks" value="<?=$tasks->title_tasks?>" required>
        </div>
        <div>
            <label for="description_tasks">description de la tâche </label>
            <textarea name="description_tasks"  cols="30" rows="10"><?=$tasks->description_tasks?></textarea>
        </div>
        <div>
            <label for="deadline_tasks">date limite </label>
            <input type="datetime-local" name="deadline_tasks" value="<?=$tasks->deadline_tasks?>">
        </div>
        <select name="id_categorie" >
            <option >--Choissez votre categorie--</option>
        </select>
        <div>
            <input type="submit" name="submit" value="Modifier">
        </div>
    <?php endforeach ?>
</form>
<?=$error?>


<?php $content = ob_get_clean()?>