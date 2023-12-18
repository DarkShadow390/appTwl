<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <?php foreach ($css as $value):?>
        <link rel="stylesheet" href="./Public/asset/style/<?=$value?>">
        <?php endforeach ?>
        <?php foreach ($js as $value):?>
            <script src="./Public/asset/script/<?=$value?>" async></script>
        <?php endforeach ?>
        <?php 
        if(isset($_SESSION['connected'])){
            $image = $_SESSION['image'];
            echo "<style>
                #profilUser{
                    background-image: url('./Public/asset/images/$image');
                }
            </style>";
        }
        ?>
       
        <title><?=$title?></title>
    </head>
    <body>
        <?=$navbar?>
        <?=$content?>
        <?=$footer?>
    </body>
</html>