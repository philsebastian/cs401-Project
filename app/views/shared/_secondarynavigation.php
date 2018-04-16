<div class="tabnav">
    <?php
    foreach($data['tabs'] as $index => $name)
    {
        echo '<a href="' . STUDENTROOT . $name . '/" class="tablink';
        if(strcmp($data['view'], $index) == 0)
        {
            echo " secondaryactive";
        }
        echo '">' . ucwords($index) . "</a>" . NL;
    }
    ?>
</div>
