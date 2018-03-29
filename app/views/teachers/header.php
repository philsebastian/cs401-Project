    <div>
        <nav class="navbar navbar-inverse bg-inverse min-navbar">
            <div class="container-fluid max-navbar">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo STUDENTROOT ?>">
                        <img src="<?php echo URLROOT . COMMON . '/' ?>favicon.ico" width="25" height="25" class="d-inline-block greyimg align-top" alt="" />Music Lessons
                    </a>
                </div>
                <!-- PHIL TODO -- i should be able to make this build based off of an array-->
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li id='account' <?php if ($data['name']=="account") { echo ' class="active"'; } ?>>
                            <a href="<?php echo TEACHERROOT ?>">Account</a>
                        </li>
                        <li id='appointments' <?php if ($data['name']=="appointments") { echo ' class="active"'; } ?>>
                            <a href="<?php echo TEACHERROOT ?>appointments">Appointments</a>
                        </li>
                        <li id='students' <?php if ($data['name']=="students") { echo ' class="active"'; } ?>>
                            <a href="<?php echo TEACHERROOT ?>students/">Students</a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li id="logout" <?php if ($data['name']=="logout") { echo ' class="active"'; } ?>>
                            <a href="<?php echo TEACHERROOT ?>login/">
                                <span class="glyphicon glyphicon-log-out"></span> Log Out
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
