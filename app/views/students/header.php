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
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li id='account' <?php if ($data['name']=="account") { echo ' class="active"'; } ?>>
                            <a href="<?php echo STUDENTROOT ?>">Account</a>
                        </li>
                        <li id='appointments' <?php if ($data['name']=="appointments") { echo ' class="active"'; } ?>>
                            <a href="<?php echo STUDENTROOT ?>appointments">Appointments</a>
                        </li>
                        <li id='notebook' <?php if ($data['name']=="notebook") { echo ' class="active"'; } ?>>
                            <a href="<?php echo STUDENTROOT ?>notebook/">Notebook</a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li id="logout" <?php if ($data['name']=="logout") { echo ' class="active"'; } ?>>
                            <a href="<?php echo STUDENTROOT ?>login/">
                                <span class="glyphicon glyphicon-log-out"></span> Log Out
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
