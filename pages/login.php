<div id="main" class="main">
        <section class="login">
            <form action="" method="POST">
                <div class="title">
                    <h2>Log In</h2><br>
                    <?php 
                        if(isset($_SESSION['login']))
                        {
                            echo $_SESSION['login'];
                            unset($_SESSION['login']);
                        }
                    ?>
                </div>
                <div class="title">
                    <label><?php echo $lang['usernameslashemail'] ?>
                        <input class="full" type="text" name="username" required="true">
                    </label>
                </div>
                <div class="title">
                    <label><?php echo $lang['password'] ?>
                        <input class="full" type="password" name="password" required="true">
                    </label>
                </div>
                <br>
                <input class="btn-primary btn-md full" type="submit" name="submit" value="<?php echo $lang['btn_login'] ?>">
            </form>
            <?php 
                if(isset($_POST['submit']))
                    {
                        //echo "Click";
                        $username = $obj->sanitize($conn,$_POST['username']);
                        $password = md5($obj->sanitize($conn,$_POST['password']));

                        $tbl_name = "tbl_users";
                        $where = "password='$password' && username='$username' OR email='$username'";

                        $query = $obj->select_data($tbl_name,$where);
                        $res = $obj->execute_query($conn,$query);
                        $count_rows = $obj->num_rows($res);
                        if($count_rows>0)
                        {
                            $_SESSION['login'] = "<div class='success'>".$lang['login_success'].".</div>";
                            $_SESSION['user'] = $username;
                            header('location:'.SITEURL.'index.php');
                        }
                        else
                        {
                            $_SESSION['login'] = "<div class='error'>".$lang['login_fail']."</div>";
                            header('location:'.SITEURL.'index.php?page=login');
                        }
                    }
		    ?>
            </div>
        </section>
</div>

