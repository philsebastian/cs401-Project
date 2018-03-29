    <div>
        <nav class="navbar navbar-inverse bg-inverse navbar-fixed-top min-navbar">
            <div class="container-fluid  max-navbar">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo URLROOT ?>">
                        <img src="<?php echo URLROOT . COMMON . '/' ?>favicon.ico" width="25" height="25" class="d-inline-block greyimg align-top" alt="" />Music Lessons
                    </a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li id='home' <?php if ($data['name']=="home") { echo ' class="active"'; } ?>>
                            <a href="<?php echo URLROOT ?>">Home</a>
                        </li>
                        <li id='learn' <?php if ($data['name']=="learn") { echo ' class="active"'; } ?>>
                            <a href="<?php echo URLROOT ?>learn">Learn</a>
                        </li>
                        <li id='teach' <?php if ($data['name']=="teach") { echo ' class="active"'; } ?>>
                            <a href="<?php echo URLROOT ?>teach/">Teach</a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li id="signup" <?php if ($data['name']=="signup") { echo ' class="active"'; } ?>>
                            <a href="<?php echo URLROOT ?>signup/">
                                <span class="glyphicon glyphicon-user"></span> Sign Up
                            </a>
                        </li>
                        <li id="login" <?php if ($data['name']=="login") { echo ' class="active"'; } ?>>
                            <a href="<?php echo URLROOT ?>login/">
                                <span class="glyphicon glyphicon-log-in"></span> Login
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
