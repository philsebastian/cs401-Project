
<div>
    <nav class="navbar navbar-inverse bg-inverse min-navbar">
        <div class="container-fluid  max-navbar">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="' . $rootpath . '">
                    <img src="<?= URLROOT . COMMON ?>/favicon.ico" width="25" height="25" class="d-inline-block greyimg align-top" alt="" />Music Lessons
                </a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <?php
                    foreach($data['primarynav'] as $index => $name)
                    {
                        echo "<li id=\"{$name}\"";
                        if ($data[' name'] == $name)
                        {
                            echo ' class="active"';
                        }
                        echo "><a href=\"{$data['rootpath']}{$name}/\">" . ucwords($name) . "</a></li>";
                    }
                    ?>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php
                    foreach($data['controlnav'] as $index => $name)
                    {
                        echo "<li id=\"{$name}\"";
                        if ($data[' name'] == $name)
                        {
                            echo 'class="active"';
                        }
                        echo '><a href="' . URLROOT . $name . "/\"><span class=\"glyphicon glyphicon-{$data['glyphs'][$name]}\"></span>" . ucwords($name) . '</a></li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
</div>
