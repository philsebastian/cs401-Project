<!DOCTYPE html>
<html>
<head>
    <title><?php echo $data['name']?>
    </title>
    <link rel="shortcut icon" type="image/png" href="<?php echo URLROOT . COMMON . '/' ?>favicon.png" /><?php echo $data['links']; ?>
</head>
<body>
<?php require_once(STUDENTHEADER); ?>
    <div class="primarydiv">
        <div class="contents">
            <h1><?php echo $data['name']?>
            </h1>
            <p class="advance clickable">0</p>
        </div>
    </div>
<?php require_once(STUDENTFOOTER); ?>
</body>
</html>