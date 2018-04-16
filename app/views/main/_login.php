
<div class="contain">
    <form name="login" action="<?= URLROOT ?>login/authenticate/" method="POST">        
        <label class="grouplabel" for="credentials">Log in to your account:</label>
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
        <div name="credentials" class="container-well">
            <div class="form-row">
                <div class="col-15">
                    <label for="username">Email address:</label>
                </div>
                <div class="col-50">
                    <input type="email" name="username" value="<?= $data['username'] ?>" />
                </div>
            </div>
            <div class="form-row">
                <div class="col-15">
                    <label for="password">Password:</label>
                </div>
                <div class="col-50">
                    <input type="password" name="password" />
                </div>
            </div>          
        </div>       
        <div class="form-row row-space">
            <div class="col-15">
                <button name="submit" type="submit" class="btn btn-default">Submit</button>
            </div>
            <div class="col-50">
                Don't have an account.
                <a href="<?= URLROOT ?>signup/" class="text-primary">Sign ip.</a>
            </div>
        </div>
    </form>
</div>
