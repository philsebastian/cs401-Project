<!DOCTYPE html>
<html>
<head>
    <title>
        <?php echo $data['name']?>
    </title>
    <link rel="shortcut icon" type="image/png" href="<?php echo URLROOT . COMMON . '/' ?>favicon.png" />
    <?php echo $data['links']; ?>
</head>
<body>
    <?php require_once(MAINHEADER); ?>
    <div class="primarydiv">
        <div class="contents">
            <h1>
                <?php echo $data['name']?>
            </h1>
            <p class="advance clickable">0</p>
            <?php 
            echo file_get_contents('https://loripsum.net/api/10/long/headers');
            ?>
        </div>
    </div>
    <?php require_once(MAINFOOTER); ?>
</body>
</html>