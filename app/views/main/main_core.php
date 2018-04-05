<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>
        <?php echo $data['name'] ?>
    </title>
    <link rel="shortcut icon" type="image/png" href="<?php echo URLROOT . COMMON . '/' ?>favicon.png" />
    <?php echo Builder::GetCssAndJs(); ?>
</head>
<body>
    <?php echo Builder::GetHeading($data) ?>
    <div class="primarydiv">
        <div class="contents">
            <div class="contents-tile">
                <h5>
                    Clickable Advance
                </h5>
                <p class="advance clickable">0</p>
            </div>
            <?php
            for($i = 0; $i < count($data['contents']); $i++)
            {
                echo Builder::IncludePartialView($data['contents'][$i], $data);
            }
            ?>
        </div>
    </div>
    <?php echo Builder::GetCommonFooter(); ?>
</body>
</html>