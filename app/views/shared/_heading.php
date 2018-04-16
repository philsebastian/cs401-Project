
<div class="topnav">
    <div id="navbar" class="topnav max-navbar">
        <a class="navbar-brand nohover" href=" <?php echo $data['rootpath'] ?>">
            <img src="<?= URLROOT . COMMON ?>/favicon.ico" width="25" height="25" class="d-inline-block greyimg align-top" alt="" />Music Lessons
        </a>
        <?php
        foreach($data['primarynav'] as $index => $name)
        {
            echo "<a href=\"{$data['rootpath']}{$name}/\"";
            if (strcmp($data['name'], $name) == 0)
            {
                echo ' class="active"';
            }
            echo ">" . ucwords($name) . "</a>";
        }
        ?>
        <div class="navtopright">
            <?php
            foreach($data['controlnav'] as $index => $name)
            {
                echo '<a href="' . URLROOT . $name . '/"';
                if ($data['name'] == $name)
                {
                    echo 'class="active"';
                }
                echo "><span class=\"glyphicon glyphicon-{$data['glyphs'][$name]}\"></span>" . ucwords($name) . '</a>';
            }
            ?>
        </div>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
    </div>
</div>
