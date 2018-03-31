<!DOCTYPE html>
<html>
<head>
    <title>
        <?php echo $data['name'] ?>
    </title>
    <link rel="shortcut icon" type="image/png" href="<?php echo URLROOT . COMMON . '/' ?>favicon.png" /><?php echo Builder::GetCssAndJs(); ?>
</head>
<body>
    <?php echo Builder::GetHeading($data) ?>
    <div class="primarydiv">
        <div class="contents">
            <h1>
                <?php echo $data['name']?>
            </h1>
            <form name="signupForm" action="signup/addnew/" method="POST">
                <div class="usercredetials">
                    <label for="username">Email address:</label>
                    <input type="email" name="username" />
                    <label for="password">Password:</label>
                    <input type="password" name="password" />
                </div>
                <div class="userinfo">
                    <label for="street">Street address:</label>
                    <input type="text" name="street" />
                    <label for="city">City:</label>
                    <input type="text" name="city" />
                    <label for="zip">Zip Code:</label>
                    <input type="number" name="zip" />
                </div>
                <div class="clienttype">
                    <label for="permissionlevel">Account Type:</label>
                    <select name="permissionlevel">
                        <?php
                        foreach($data['permissions'] as $permission => $id)
                        {
                            $options .= "<option value=\"{$id}\">{$permission}</option>";
                        }
                        echo $options;
                        ?>
                    </select>
                </div>
            </form>
        </div>
    </div><?php echo Builder::GetCommonFooter(); ?>
</body>
</html>