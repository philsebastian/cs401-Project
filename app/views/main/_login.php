                <div class="container-fluid">
                    <div name="credentials" class="well">
                        <form class="form-horizontal" name="login" action="<?= URLROOT ?>login/authenticate/" method="POST">
                            <h3 class="text-center space-after">
                                Login
                            </h3>
                            <?php
                            if (isset($_SESSION['successMessage']))
                            {
                                $message = "<div class=\"alert alert-success\">{$_SESSION['successMessage']}</div>";
                                unset($_SESSION['successMessage']);
                                echo $message;
                            }
                            if (isset($_SESSION['errorMessage']))
                            {
                                $message = "<div class=\"alert alert-danger\">{$_SESSION['errorMessage']}</div>";
                                unset($_SESSION['errorMessage']);
                                echo $message;
                            }
                            ?>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="username">Email address:</label>
                                <div class="col-xs-5">
                                    <input type="email" name="username" class="form-control" value="<?= $data['username'] ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="password">Password:</label>
                                <div class="col-xs-5">
                                    <input type="password" name="password" class="form-control" />
                                </div>
                            </div>
                            <!--<div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" /> Remember me
                            </label>
                        </div>-->
                            <div class="form-group">
                                <div class="col-xs-offset-2 col-xs-1">
                                    <button name="submit" type="submit" class="btn btn-default" value="true">Submit</button>
                                </div>
                                <div class="col-xs-3 bottom-align-text">
                                    Don't have an account.
                                    <a href="<?= URLROOT ?>login/" class="text-primary">Sign up.</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>