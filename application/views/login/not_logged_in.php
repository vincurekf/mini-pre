<div class="message">
<?php
// show potential errors / feedback (from login object)
if (isset($login)) {
    if ($login->errors) {
        foreach ($login->errors as $error) {
            echo $error;
        }
    }
    if ($login->messages) {
        foreach ($login->messages as $message) {
            echo $message;
        }
    }
}

if (GLOBAL_ALLOWREGISTER){
    echo '<br><a href="'.URL.'register/">'.LNG_REGISTER.'</a>';
}

?>
</div>

<div class="user-area">
    <!-- login form box -->
    <form method="post" action="<?php echo URL; ?>" name="loginform">
        <input id="login_input_username" class="login_input" type="text" name="user_name" required placeholder="name" />
        <input id="login_input_password" class="login_input" type="password" name="user_password" autocomplete="off" required placeholder="password"/>
        <input type="submit"  name="login" value="Log in" />
    </form>
</div>
