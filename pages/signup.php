<?php
    $_SESSION['signup'] = "";
?>
<div id="main" class="main">
<section class="login">
    <form action="" method="POST">
        <div class="title">
        <h2><?php echo $lang['signup'] ?></h2></br>
        </div>
        <div class="title"><label> <?php echo $lang['familynameregister'] ?>
         <input class="full" type="text" name="nume" required="true"></br>
        </label></div>

        <div class="title"><label> <?php echo $lang['firstnameregister'] ?>
         <input class="full" type="text" name="prenume" required="true"></br>
        </label></div>

        <div class="title"><label> <?php echo $lang['fatherinitial'] ?>
         <input class="full" type="text" name="initialatata" required="true"></br>
        </label></div>

        <div class="title"><label> <?php echo $lang['emailregister'] ?>
         <input class="full" type="text" name="email" required="true"></br>
        </label></div>

        <div class="title"><label> <?php echo $lang['password'] ?>
         <input class="full" type="password" name="password" required="true"></br>
        </label></div>

        <div class="title">
            <label> <?php echo $lang['repeatpassword'] ?>
                <input class="full" type="password" name="passwordrepeat" required="true"></br>
            </label>
        </div>
        <label><input type="checkbox" name="GDPR" required="true"> <?php echo $lang['gdpr'] ?>
        </label>
        <br>
        <button class="btn-primary btn-md full" type="submit" name="submit" ><?php echo $lang['registerbutton'] ?></button>

        </form>
        
        

    <?php 
        setLocale(LC_CTYPE, 'FR_fr.UTF-8');
		if(isset($_POST['submit']))
		{
			$nume = ucfirst(strtolower($obj->sanitize($conn,$_POST['nume'])));
            $prenume = ucfirst(strtolower($obj->sanitize($conn,$_POST['prenume'])));
            $initialatata = strtoupper($obj->sanitize($conn,$_POST['initialatata']));
			$email = $obj->sanitize($conn,$_POST['email']);
			$password = $obj->sanitize($conn,$_POST['password']);
            $passwordrepeat = $obj->sanitize($conn,$_POST['passwordrepeat']);
			$created_at = date('Y-m-d H:i:s');
            $points = 25;
            $username = $nume.'_'.$initialatata.'_'.$prenume;
            $full_name = $nume.' '.$initialatata.' '.$prenume;
            $avatar_path = 'assets/img/avatar_assets/default_avatar.png';

            if (!ctype_alpha($nume)) {
                echo "<div class = 'error'>".$lang['add_fail_lastname']."</div>";
				exit();
            }

            if (!ctype_alpha($prenume)) {
                echo "<div class = 'error'>".$lang['add_fail_firstname']."</div>";
				exit();
            }

            if (!ctype_alpha($initialatata) || strlen($initialatata)>1) {
                echo "<div class = 'error'>".$lang['add_fail_initiala']."</div>";
				exit();
            }

            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                echo "<div class = 'error'>".$lang['add_fail_email']."</div>";
                exit();
            }
            
            if(strlen($password)<=6){
                echo "<div class = 'error'>".$lang['add_fail_password']."</div>";
                exit();
            }

            if ($password !== $passwordrepeat) {
                echo "<div class = 'error'>".$lang['add_fail_password_not_match']."</div>";
				exit();
            }


            $securepassword = md5($obj->sanitize($conn,$_POST['password']));
			$data = "
                nume='$nume',
                prenume='$prenume',
				full_name='$full_name',
                initialatata='$initialatata',
				email='$email',
				username='$username',
				password='$securepassword',
				created_at='$created_at',
                points='$points',
                avatar_path='$avatar_path',
                points='$points'
			";
			$tbl_name='tbl_users';

            
                $query = $obj->insert_data($tbl_name,$data);
                $res = $obj->execute_query($conn,$query);
                

                if($res==true)
                {
                    $_SESSION['login'] = "<div class='success'>".$lang['signup_success']."</div>";
                    header('location:'.SITEURL.'index.php?page=login');
                }
                else
                {
                    $_SESSION['signup'] = "<div class='error'>".$lang['add_fail']."</div>";
                    header('location:'.SITEURL.'index.php?page=signup');
                }
            
		}
	?>
    </section>
</div>