<div id="main" class="main">
    <?php

		if(isset($_SESSION['avatar']))
		{
			echo $_SESSION['avatar'];
			unset($_SESSION['avatar']);
		}

		if (isset($_GET['id']) && !empty($_GET['id'])) {
			$id = $_GET['id'];

			$tbl_name = 'tbl_users';
			$where = "id='$id'";

			$query = $obj->select_data($tbl_name,$where);
			$res = $obj->execute_query($conn,$query);
			if($res==true)
			{
				$count_rows = $obj->num_rows($res);
				if($count_rows==1)
				{
					$row = $obj->fetch_data($res);
					$avatar_path = $row['avatar_path'];
				}
			}
		}
		else
		{
			header('location:'.SITEURL.'index.php?page=profile');
		}
        $temp_avatar_path = 'avatar/'.$id.'_temp.png';
        $new_avatar_path = 'avatar/'.$id.'.png';
    ?>
    <?php 
			$tbl_name = 'tbl_rewards';
            $where = "id='$id'";
			$query = $obj->select_data($tbl_name,$where);
			$res = $obj->execute_query($conn,$query);
			if($res)
			{
				$count_rows= $obj->num_rows($res);
				if($count_rows > 0)
				{
					$row=$obj->fetch_data($res);
                    $hair_1 = $row['hair_1'];
                    $hair_2 = $row['hair_2'];
                    $hair_3 = $row['hair_3'];
                    $hair_4 = $row['hair_4'];
                    $hair_5 = $row['hair_5'];
                    $hair_6 = $row['hair_6'];
                    $hair_7 = $row['hair_7'];
                    $hair_8 = $row['hair_8'];
                    $hair_9 = $row['hair_9'];
                    $hair_10 = $row['hair_10'];
                    $hair_11 = $row['hair_11'];
                    $hair_12 = $row['hair_12'];
                    $eyes_1 = $row['eyes_1'];
                    $eyes_2 = $row['eyes_2'];
                    $eyes_3 = $row['eyes_3'];
                    $eyes_4 = $row['eyes_4'];
                    $eyes_5 = $row['eyes_5'];
                    $eyes_6 = $row['eyes_6'];
                    $eyes_7 = $row['eyes_7'];
                    $eyes_8 = $row['eyes_8'];
                    $eyes_9 = $row['eyes_9'];
                    $eyes_10 = $row['eyes_10'];
                    $eyes_11 = $row['eyes_11'];
                    $eyes_12 = $row['eyes_12'];
                    $mouth_1 = $row['mouth_1'];
                    $mouth_2 = $row['mouth_2'];
                    $mouth_3 = $row['mouth_3'];
                    $mouth_4 = $row['mouth_4'];
                    $mouth_5 = $row['mouth_5'];
                    $mouth_6 = $row['mouth_6'];
                    $mouth_7 = $row['mouth_7'];
                    $mouth_8 = $row['mouth_8'];
                    $mouth_9 = $row['mouth_9'];
                    $mouth_10 = $row['mouth_10'];
                    $mouth_11 = $row['mouth_11'];
                    $mouth_12 = $row['mouth_12'];
                    $mouth_13 = $row['mouth_13'];
                    $pants_1 = $row['pants_1'];
                    $pants_2 = $row['pants_2'];
                    $pants_3 = $row['pants_3'];
                    $pants_4 = $row['pants_4'];
                    $pants_5 = $row['pants_5'];
                    $pants_6 = $row['pants_6'];
                    $pants_7 = $row['pants_7'];
                    $pants_8 = $row['pants_8'];
                    $shoes_1 = $row['shoes_1'];
                    $shoes_2 = $row['shoes_2'];
                    $shoes_3 = $row['shoes_3'];
                    $shoes_4 = $row['shoes_4'];
                    $shoes_5 = $row['shoes_5'];
                    $shoes_6 = $row['shoes_6'];
                    $shoes_7 = $row['shoes_7'];
                    $shoes_8 = $row['shoes_8'];
                    $shoes_9 = $row['shoes_9'];
                    $shoes_10 = $row['shoes_10'];
                    $shoes_11 = $row['shoes_11'];
                    $shoes_12 = $row['shoes_12'];
                    $tshirt_1 = $row['tshirt_1'];
                    $tshirt_2 = $row['tshirt_2'];
                    $tshirt_3 = $row['tshirt_3'];
                    $tshirt_4 = $row['tshirt_4'];
                    $tshirt_5 = $row['tshirt_5'];
                    $tshirt_6 = $row['tshirt_6'];
                    $tshirt_7 = $row['tshirt_7'];
                    $tshirt_8 = $row['tshirt_8'];
                    $tshirt_9 = $row['tshirt_9'];
					}
               else
               {
                  $data = "
                     id='$id'
                  ";
                  $query = $obj->insert_data($tbl_name,$data);
                  $res = $obj->execute_query($conn,$query);
                  if($res==true)
                  {
                     header('location:'.SITEURL.'index.php?page=rewards');
                  }
                  else
                  {
                     header('location:'.SITEURL.'index.php?page=profile');
                  }
               }
				}
	?>
    <div class="body">
    <form method="post" action="">
    <?php
        if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['generate']))
        {
            $a = imagecreatefrompng('assets/img/avatar_assets/structure.png');
            switch ($_POST['hair']) {
                case 0:
                    $b = imagecreatefrompng('assets/img/avatar_assets/nothing.png');
                    break;
                case 1:
                    if($hair_1 == 0)
                    {
                        echo "<div class = 'error'>".$lang['erroravatar'].$lang['itemhair']."</div>";
                        $b = imagecreatefrompng('assets/img/avatar_assets/Hair/hair_0.png');
                    }
                    else
                    {
                        $b = imagecreatefrompng('assets/img/avatar_assets/Hair/hair_1.png');
                    }
                    break;
                case 2:
                    if($hair_2 == 0)
                    {
                        echo "<div class = 'error'>".$lang['erroravatar'].$lang['itemhair']."</div>";
                        $b = imagecreatefrompng('assets/img/avatar_assets/Hair/hair_0.png');
                    }
                    else
                    {
                        $b = imagecreatefrompng('assets/img/avatar_assets/Hair/hair_2.png');
                    }
                    break;
                case 3:
                    if($hair_3 == 0)
                    {
                        echo "<div class = 'error'>".$lang['erroravatar'].$lang['itemhair']."</div>";
                        $b = imagecreatefrompng('assets/img/avatar_assets/Hair/hair_0.png');
                    }
                    else
                    {
                        $b = imagecreatefrompng('assets/img/avatar_assets/Hair/hair_3.png');
                    }
                    break;
                case 4:
                    if($hair_4 == 0)
                    {
                        echo "<div class = 'error'>".$lang['erroravatar'].$lang['itemhair']."</div>";
                        $b = imagecreatefrompng('assets/img/avatar_assets/Hair/hair_0.png');
                    }
                    else
                    {
                        $b = imagecreatefrompng('assets/img/avatar_assets/Hair/hair_4.png');
                    }
                    break;
                case 5:
                    if($hair_5 == 0)
                    {
                        echo "<div class = 'error'>".$lang['erroravatar'].$lang['itemhair']."</div>";
                        $b = imagecreatefrompng('assets/img/avatar_assets/Hair/hair_0.png');
                    }
                    else
                    {
                        $b = imagecreatefrompng('assets/img/avatar_assets/Hair/hair_5.png');
                    }
                    break;
                case 6:
                    if($hair_6 == 0)
                    {
                        echo "<div class = 'error'>".$lang['erroravatar'].$lang['itemhair']."</div>";
                        $b = imagecreatefrompng('assets/img/avatar_assets/Hair/hair_0.png');
                    }
                    else
                    {
                        $b = imagecreatefrompng('assets/img/avatar_assets/Hair/hair_6.png');
                    }
                    break;
                case 7:
                    if($hair_7 == 0)
                    {
                        echo "<div class = 'error'>".$lang['erroravatar'].$lang['itemhair']."</div>";
                        $b = imagecreatefrompng('assets/img/avatar_assets/Hair/hair_0.png');
                    }
                    else
                    {
                        $b = imagecreatefrompng('assets/img/avatar_assets/Hair/hair_7.png');
                    }
                    break;
                case 8:
                    if($hair_8 == 0)
                    {
                        echo "<div class = 'error'>".$lang['erroravatar'].$lang['itemhair']."</div>";
                        $b = imagecreatefrompng('assets/img/avatar_assets/Hair/hair_0.png');
                    }
                    else
                    {
                        $b = imagecreatefrompng('assets/img/avatar_assets/Hair/hair_8.png');
                    }
                    break;
                case 9:
                    if($hair_9 == 0)
                    {
                        echo "<div class = 'error'>".$lang['erroravatar'].$lang['itemhair']."</div>";
                        $b = imagecreatefrompng('assets/img/avatar_assets/Hair/hair_0.png');
                    }
                    else
                    {
                        $b = imagecreatefrompng('assets/img/avatar_assets/Hair/hair_9.png');
                    }
                    break;
                case 10:
                    if($hair_10 == 0)
                    {
                        echo "<div class = 'error'>".$lang['erroravatar'].$lang['itemhair']."</div>";
                        $b = imagecreatefrompng('assets/img/avatar_assets/Hair/hair_0.png');
                    }
                    else
                    {
                        $b = imagecreatefrompng('assets/img/avatar_assets/Hair/hair_10.png');
                    }
                    break;
                case 11:
                    if($hair_11 == 0)
                    {
                        echo "<div class = 'error'>".$lang['erroravatar'].$lang['itemhair']."</div>";
                        $b = imagecreatefrompng('assets/img/avatar_assets/Hair/hair_0.png');
                    }
                    else
                    {
                        $b = imagecreatefrompng('assets/img/avatar_assets/Hair/hair_11.png');
                    }
                    break;
                case 12:
                    if($hair_12 == 0)
                    {
                        echo "<div class = 'error'>".$lang['erroravatar'].$lang['itemhair']."</div>";
                        $b = imagecreatefrompng('assets/img/avatar_assets/Hair/hair_0.png');
                    }
                    else
                    {
                        $b = imagecreatefrompng('assets/img/avatar_assets/Hair/hair_12.png');
                    }
                    break;
            }
            switch ($_POST['eyes']) {
                case 1:
                    $c = imagecreatefrompng('assets/img/avatar_assets/Eyes/eyes_1.png');
                    break;
                case 2:
                    if($eyes_2 == 0)
                    {
                        echo "<div class = 'error'>".$lang['erroravatar'].$lang['itemeyes']."</div>";
                        $c = imagecreatefrompng('assets/img/avatar_assets/Eyes/eyes_1.png');
                    }
                    else
                    {
                        $c = imagecreatefrompng('assets/img/avatar_assets/Eyes/eyes_2.png');
                    }
                    break;
                case 3:
                    if($eyes_3 == 0)
                    {
                        echo "<div class = 'error'>".$lang['erroravatar'].$lang['itemeyes']."</div>";
                        $c = imagecreatefrompng('assets/img/avatar_assets/Eyes/eyes_1.png');
                    }
                    else
                    {
                        $c = imagecreatefrompng('assets/img/avatar_assets/Eyes/eyes_3.png');
                    }
                    break;
                case 4:
                    if($eyes_4 == 0)
                    {
                        echo "<div class = 'error'>".$lang['erroravatar'].$lang['itemeyes']."</div>";
                        $c = imagecreatefrompng('assets/img/avatar_assets/Eyes/eyes_1.png');
                    }
                    else
                    {
                        $c = imagecreatefrompng('assets/img/avatar_assets/Eyes/eyes_4.png');
                    }
                    break;
                case 5:
                    if($eyes_5 == 0)
                    {
                        echo "<div class = 'error'>".$lang['erroravatar'].$lang['itemeyes']."</div>";
                        $c = imagecreatefrompng('assets/img/avatar_assets/Eyes/eyes_1.png');
                    }
                    else
                    {
                        $c = imagecreatefrompng('assets/img/avatar_assets/Eyes/eyes_5.png');
                    }
                    break;
                case 6:
                    if($eyes_6 == 0)
                    {
                        echo "<div class = 'error'>".$lang['erroravatar'].$lang['itemeyes']."</div>";
                        $c = imagecreatefrompng('assets/img/avatar_assets/Eyes/eyes_1.png');
                    }
                    else
                    {
                        $c = imagecreatefrompng('assets/img/avatar_assets/Eyes/eyes_6.png');
                    }
                    break;
                case 7:
                    if($eyes_7 == 0)
                    {
                        echo "<div class = 'error'>".$lang['erroravatar'].$lang['itemeyes']."</div>";
                        $c = imagecreatefrompng('assets/img/avatar_assets/Eyes/eyes_1.png');
                    }
                    else
                    {
                        $c = imagecreatefrompng('assets/img/avatar_assets/Eyes/eyes_7.png');
                    }
                    break;
                case 8:
                    if($eyes_8 == 0)
                    {
                        echo "<div class = 'error'>".$lang['erroravatar'].$lang['itemeyes']."</div>";
                        $c = imagecreatefrompng('assets/img/avatar_assets/Eyes/eyes_1.png');
                    }
                    else
                    {
                        $c = imagecreatefrompng('assets/img/avatar_assets/Eyes/eyes_8.png');
                    }
                    break;
                case 9:
                    if($eyes_9 == 0)
                    {
                        echo "<div class = 'error'>".$lang['erroravatar'].$lang['itemeyes']."</div>";
                        $c = imagecreatefrompng('assets/img/avatar_assets/Eyes/eyes_1.png');
                    }
                    else
                    {
                        $c = imagecreatefrompng('assets/img/avatar_assets/Eyes/eyes_9.png');
                    }
                    break;
                case 10:
                    if($eyes_10 == 0)
                    {
                        echo "<div class = 'error'>".$lang['erroravatar'].$lang['itemeyes']."</div>";
                        $c = imagecreatefrompng('assets/img/avatar_assets/Eyes/eyes_1.png');
                    }
                    else
                    {
                        $c = imagecreatefrompng('assets/img/avatar_assets/Eyes/eyes_10.png');
                    }
                    break;
                case 11:
                    if($eyes_11 == 0)
                    {
                        echo "<div class = 'error'>".$lang['erroravatar'].$lang['itemeyes']."</div>";
                        $c = imagecreatefrompng('assets/img/avatar_assets/Eyes/eyes_1.png');
                    }
                    else
                    {
                        $c = imagecreatefrompng('assets/img/avatar_assets/Eyes/eyes_11.png');
                    }
                    break;
                case 12:
                    if($eyes_12 == 0)
                    {
                        echo "<div class = 'error'>".$lang['erroravatar'].$lang['itemeyes']."</div>";
                        $c = imagecreatefrompng('assets/img/avatar_assets/Eyes/eyes_1.png');
                    }
                    else
                    {
                        $c = imagecreatefrompng('assets/img/avatar_assets/Eyes/eyes_12.png');
                    }
                    break;
            }
            switch ($_POST['mouth']) {
                case 1:
                    $d = imagecreatefrompng('assets/img/avatar_assets/Mouths/mouth_1.png');
                    break;
                case 2:
                    if($mouth_2 == 0)
                    {
                        echo "<div class = 'error'>".$lang['erroravatar'].$lang['itemmouth']."</div>";
                        $d = imagecreatefrompng('assets/img/avatar_assets/Mouths/mouth_1.png');
                    }
                    else
                    {
                        $d = imagecreatefrompng('assets/img/avatar_assets/Mouths/mouth_2.png');
                    }
                    break;
                case 3:
                    if($mouth_3 == 0)
                    {
                        echo "<div class = 'error'>".$lang['erroravatar'].$lang['itemmouth']."</div>";
                        $d = imagecreatefrompng('assets/img/avatar_assets/Mouths/mouth_1.png');
                    }
                    else
                    {
                        $d = imagecreatefrompng('assets/img/avatar_assets/Mouths/mouth_3.png');
                    }
                    break;
                case 4:
                    if($mouth_4 == 0)
                    {
                        echo "<div class = 'error'>".$lang['erroravatar'].$lang['itemmouth']."</div>";
                        $d = imagecreatefrompng('assets/img/avatar_assets/Mouths/mouth_1.png');
                    }
                    else
                    {
                        $d = imagecreatefrompng('assets/img/avatar_assets/Mouths/mouth_4.png');
                    }
                    break;
                case 5:
                    if($mouth_5 == 0)
                    {
                        echo "<div class = 'error'>".$lang['erroravatar'].$lang['itemmouth']."</div>";
                        $d = imagecreatefrompng('assets/img/avatar_assets/Mouths/mouth_1.png');
                    }
                    else
                    {
                        $d = imagecreatefrompng('assets/img/avatar_assets/Mouths/mouth_5.png');
                    }
                    break;
                case 6:
                    if($mouth_6 == 0)
                    {
                        echo "<div class = 'error'>".$lang['erroravatar'].$lang['itemmouth']."</div>";
                        $d = imagecreatefrompng('assets/img/avatar_assets/Mouths/mouth_1.png');
                    }
                    else
                    {
                        $d = imagecreatefrompng('assets/img/avatar_assets/Mouths/mouth_6.png');
                    }
                    break;
                case 7:
                    if($mouth_7 == 0)
                    {
                        echo "<div class = 'error'>".$lang['erroravatar'].$lang['itemmouth']."</div>";
                        $d = imagecreatefrompng('assets/img/avatar_assets/Mouths/mouth_1.png');
                    }
                    else
                    {
                        $d = imagecreatefrompng('assets/img/avatar_assets/Mouths/mouth_7.png');
                    }
                    break;
                case 8:
                    if($mouth_8 == 0)
                    {
                        echo "<div class = 'error'>".$lang['erroravatar'].$lang['itemmouth']."</div>";
                        $d = imagecreatefrompng('assets/img/avatar_assets/Mouths/mouth_1.png');
                    }
                    else
                    {
                        $d = imagecreatefrompng('assets/img/avatar_assets/Mouths/mouth_8.png');
                    }
                    break;
                case 9:
                    if($mouth_9 == 0)
                    {
                        echo "<div class = 'error'>".$lang['erroravatar'].$lang['itemmouth']."</div>";
                        $d = imagecreatefrompng('assets/img/avatar_assets/Mouths/mouth_1.png');
                    }
                    else
                    {
                        $d = imagecreatefrompng('assets/img/avatar_assets/Mouths/mouth_9.png');
                    }
                    break;
                case 10:
                    if($mouth_10 == 0)
                    {
                        echo "<div class = 'error'>".$lang['erroravatar'].$lang['itemmouth']."</div>";
                        $d = imagecreatefrompng('assets/img/avatar_assets/Mouths/mouth_1.png');
                    }
                    else
                    {
                        $d = imagecreatefrompng('assets/img/avatar_assets/Mouths/mouth_10.png');
                    }
                    break;
                case 11:
                    if($mouth_11 == 0)
                    {
                        echo "<div class = 'error'>".$lang['erroravatar'].$lang['itemmouth']."</div>";
                        $d = imagecreatefrompng('assets/img/avatar_assets/Mouths/mouth_1.png');
                    }
                    else
                    {
                        $d = imagecreatefrompng('assets/img/avatar_assets/Mouths/mouth_11.png');
                    }
                    break;
                case 12:
                    if($mouth_12 == 0)
                    {
                        echo "<div class = 'error'>".$lang['erroravatar'].$lang['itemmouth']."</div>";
                        $d = imagecreatefrompng('assets/img/avatar_assets/Mouths/mouth_1.png');
                    }
                    else
                    {
                        $d = imagecreatefrompng('assets/img/avatar_assets/Mouths/mouth_12.png');
                    }
                    break;
                case 13:
                    if($mouth_13 == 0)
                    {
                        echo "<div class = 'error'>".$lang['erroravatar'].$lang['itemmouth']."</div>";
                        $d = imagecreatefrompng('assets/img/avatar_assets/Mouths/mouth_1.png');
                    }
                    else
                    {
                        $d = imagecreatefrompng('assets/img/avatar_assets/Mouths/mouth_13.png');
                    }
                    break;
            }
            switch ($_POST['tshirt']) {
                case 1:
                    $e = imagecreatefrompng('assets/img/avatar_assets/TShirts/thsirt_pink.png');
                    break;
                case 2:
                    if($tshirt_2 == 0)
                    {
                        echo "<div class = 'error'>".$lang['erroravatar'].$lang['itemtshirt']."</div>";
                        $e = imagecreatefrompng('assets/img/avatar_assets/TShirts/thsirt_pink.png');
                    }
                    else
                    {
                        $e = imagecreatefrompng('assets/img/avatar_assets/TShirts/tshirt_black.png');
                    }
                    break;
                case 3:
                    if($tshirt_3 == 0)
                    {
                        echo "<div class = 'error'>".$lang['erroravatar'].$lang['itemtshirt']."</div>";
                        $e = imagecreatefrompng('assets/img/avatar_assets/TShirts/thsirt_pink.png');
                    }
                    else
                    {
                        $e = imagecreatefrompng('assets/img/avatar_assets/TShirts/tshirt_darkblue.png');
                    }
                    break;
                case 4:
                    if($tshirt_4 == 0)
                    {
                        echo "<div class = 'error'>".$lang['erroravatar'].$lang['itemtshirt']."</div>";
                        $e = imagecreatefrompng('assets/img/avatar_assets/TShirts/thsirt_pink.png');
                    }
                    else
                    {
                        $e = imagecreatefrompng('assets/img/avatar_assets/TShirts/tshirt_green.png');
                    }
                    break;
                case 5:
                    if($tshirt_5 == 0)
                    {
                        echo "<div class = 'error'>".$lang['erroravatar'].$lang['itemtshirt']."</div>";
                        $e = imagecreatefrompng('assets/img/avatar_assets/TShirts/thsirt_pink.png');
                    }
                    else
                    {
                        $e = imagecreatefrompng('assets/img/avatar_assets/TShirts/tshirt_lightblue.png');
                    }
                    break;
                case 6:
                    if($tshirt_6 == 0)
                    {
                        echo "<div class = 'error'>".$lang['erroravatar'].$lang['itemtshirt']."</div>";
                        $e = imagecreatefrompng('assets/img/avatar_assets/TShirts/thsirt_pink.png');
                    }
                    else
                    {
                        $e = imagecreatefrompng('assets/img/avatar_assets/TShirts/tshirt_orange.png');
                    }
                    break;
                case 7:
                    if($tshirt_7 == 0)
                    {
                        echo "<div class = 'error'>".$lang['erroravatar'].$lang['itemtshirt']."</div>";
                        $e = imagecreatefrompng('assets/img/avatar_assets/TShirts/thsirt_pink.png');
                    }
                    else
                    {
                        $e = imagecreatefrompng('assets/img/avatar_assets/TShirts/tshirt_purple.png');
                    }
                    break;
                case 8:
                    if($tshirt_8 == 0)
                    {
                        echo "<div class = 'error'>".$lang['erroravatar'].$lang['itemtshirt']."</div>";
                        $e = imagecreatefrompng('assets/img/avatar_assets/TShirts/thsirt_pink.png');
                    }
                    else
                    {
                        $e = imagecreatefrompng('assets/img/avatar_assets/TShirts/tshirt_red.png');
                    }
                    break;
                case 9:
                    if($tshirt_9 == 0)
                    {
                        echo "<div class = 'error'>".$lang['erroravatar'].$lang['itemtshirt']."</div>";
                        $e = imagecreatefrompng('assets/img/avatar_assets/TShirts/thsirt_pink.png');
                    }
                    else
                    {
                        $e = imagecreatefrompng('assets/img/avatar_assets/TShirts/tshirt_yellow.png');
                    }
                    break;
            }
            switch ($_POST['pants']) {
                case 1:
                    $f = imagecreatefrompng('assets/img/avatar_assets/Pants/pants_black.png');
                    break;
                case 2:
                    if($pants_2 == 0)
                    {
                        echo "<div class = 'error'>".$lang['erroravatar'].$lang['itempants']."</div>";
                        $f = imagecreatefrompng('assets/img/avatar_assets/Pants/pants_black.png');
                    }
                    else
                    {
                        $f = imagecreatefrompng('assets/img/avatar_assets/Pants/pants_brown.png');
                    }
                    break;
                case 3:
                    if($pants_3 == 0)
                    {
                        echo "<div class = 'error'>".$lang['erroravatar'].$lang['itempants']."</div>";
                        $f = imagecreatefrompng('assets/img/avatar_assets/Pants/pants_black.png');
                    }
                    else
                    {
                        $f = imagecreatefrompng('assets/img/avatar_assets/Pants/pants_darkblue.png');
                    }
                    break;
                case 4:
                    if($pants_4 == 0)
                    {
                        echo "<div class = 'error'>".$lang['erroravatar'].$lang['itempants']."</div>";
                        $f = imagecreatefrompng('assets/img/avatar_assets/Pants/pants_black.png');
                    }
                    else
                    {
                        $f = imagecreatefrompng('assets/img/avatar_assets/Pants/pants_darkgreen.png');
                    }
                    break;
                case 5:
                    if($pants_5 == 0)
                    {
                        echo "<div class = 'error'>".$lang['erroravatar'].$lang['itempants']."</div>";
                        $f = imagecreatefrompng('assets/img/avatar_assets/Pants/pants_black.png');
                    }
                    else
                    {
                        $f = imagecreatefrompng('assets/img/avatar_assets/Pants/pants_darkpurple.png');
                    }
                    break;
                case 6:
                    if($pants_6 == 0)
                    {
                        echo "<div class = 'error'>".$lang['erroravatar'].$lang['itempants']."</div>";
                        $f = imagecreatefrompng('assets/img/avatar_assets/Pants/pants_black.png');
                    }
                    else
                    {
                        $f = imagecreatefrompng('assets/img/avatar_assets/Pants/pants_jean.png');
                    }
                    break;
                case 7:
                    if($pants_7 == 0)
                    {
                        echo "<div class = 'error'>".$lang['erroravatar'].$lang['itempants']."</div>";
                        $f = imagecreatefrompng('assets/img/avatar_assets/Pants/pants_black.png');
                    }
                    else
                    {
                        $f = imagecreatefrompng('assets/img/avatar_assets/Pants/pants_kaki.png');
                    }
                    break;
                case 8:
                    if($pants_8 == 0)
                    {
                        echo "<div class = 'error'>".$lang['erroravatar'].$lang['itempants']."</div>";
                        $f = imagecreatefrompng('assets/img/avatar_assets/Pants/pants_black.png');
                    }
                    else
                    {
                        $f = imagecreatefrompng('assets/img/avatar_assets/Pants/pants_olive.png');
                    }
                    break;
            }
            switch ($_POST['shoes']) {
                case 1:
                    $g = imagecreatefrompng('assets/img/avatar_assets/Shoes/shoes_bordeaux.png');
                    break;
                case 2:
                    if($shoes_2 == 0)
                    {
                        echo "<div class = 'error'>".$lang['erroravatar'].$lang['itemshoes']."</div>";
                        $g = imagecreatefrompng('assets/img/avatar_assets/Shoes/shoes_bordeaux.png');
                    }
                    else
                    {
                        $g = imagecreatefrompng('assets/img/avatar_assets/Shoes/shoes_brown.png');
                    }
                    break;
                case 3:
                    if($shoes_3 == 0)
                    {
                        echo "<div class = 'error'>".$lang['erroravatar'].$lang['itemshoes']."</div>";
                        $g = imagecreatefrompng('assets/img/avatar_assets/Shoes/shoes_bordeaux.png');
                    }
                    else
                    {
                        $g = imagecreatefrompng('assets/img/avatar_assets/Shoes/shoes_darkblue.png');
                    }
                    break;
                case 4:
                    if ($shoes_4 = 0)
                    {   
                        echo "<div class = 'error'>".$lang['erroravatar'].$lang['itemshoes']."</div>";
                        $g = imagecreatefrompng('assets/img/avatar_assets/Shoes/shoes_bordeaux.png');
                    }
                    else
                    {
                        $g = imagecreatefrompng('assets/img/avatar_assets/Shoes/shoes_darkgreen.png');
                    }
                    break;
                case 5:
                    if($shoes_5 == 0)
                    {
                        echo "<div class = 'error'>".$lang['erroravatar'].$lang['itemshoes']."</div>";
                        $g = imagecreatefrompng('assets/img/avatar_assets/Shoes/shoes_bordeaux.png');
                    }
                    else
                    {
                        $g = imagecreatefrompng('assets/img/avatar_assets/Shoes/shoes_darkgrey.png');
                    }
                    break;
                case 6:
                    if($shoes_6 == 0)
                    {
                        echo "<div class = 'error'>".$lang['erroravatar'].$lang['itemshoes']."</div>";
                        $g = imagecreatefrompng('assets/img/avatar_assets/Shoes/shoes_bordeaux.png');
                    }
                    else
                    {
                        $g = imagecreatefrompng('assets/img/avatar_assets/Shoes/shoes_darkkaki.png');
                    }
                    break;
                case 7:
                    if($shoes_7 == 0)
                    {
                        echo "<div class = 'error'>".$lang['erroravatar'].$lang['itemshoes']."</div>";
                        $g = imagecreatefrompng('assets/img/avatar_assets/Shoes/shoes_bordeaux.png');
                    }
                    else
                    {
                        $g = imagecreatefrompng('assets/img/avatar_assets/Shoes/shoes_lightblue.png');
                    }
                    break;
                case 8:
                    if($shoes_8 == 0)
                    {
                        echo "<div class = 'error'>".$lang['erroravatar'].$lang['itemshoes']."</div>";
                        $g = imagecreatefrompng('assets/img/avatar_assets/Shoes/shoes_bordeaux.png');
                    }
                    else
                    {
                        $g = imagecreatefrompng('assets/img/avatar_assets/Shoes/shoes_lightgrey.png');
                    }
                    break;
                case 9:
                    if($shoes_9 == 0)
                    {
                        echo "<div class = 'error'>".$lang['erroravatar'].$lang['itemshoes']."</div>";
                        $g = imagecreatefrompng('assets/img/avatar_assets/Shoes/shoes_bordeaux.png');
                    }
                    else
                    {
                        $g = imagecreatefrompng('assets/img/avatar_assets/Shoes/shoes_lightgreen.png');
                    }
                    break;
                case 10:
                    if($shoes_10 == 0)
                    {
                        echo "<div class = 'error'>".$lang['erroravatar'].$lang['itemshoes']."</div>";
                        $g = imagecreatefrompng('assets/img/avatar_assets/Shoes/shoes_bordeaux.png');
                    }
                    else
                    {
                        $g = imagecreatefrompng('assets/img/avatar_assets/Shoes/shoes_olive.png');
                    }
                    break;
                case 11:
                    if($shoes_11 == 0)
                    {
                        echo "<div class = 'error'>".$lang['erroravatar'].$lang['itemshoes']."</div>";
                        $g = imagecreatefrompng('assets/img/avatar_assets/Shoes/shoes_bordeaux.png');
                    }
                    else
                    {
                        $g = imagecreatefrompng('assets/img/avatar_assets/Shoes/shoes_orange.png');
                    }
                    break;
                case 12:
                    if($shoes_12 == 0)
                    {
                        echo "<div class = 'error'>".$lang['erroravatar'].$lang['itemshoes']."</div>";
                        $g = imagecreatefrompng('assets/img/avatar_assets/Shoes/shoes_bordeaux.png');
                    }
                    else
                    {
                        $g = imagecreatefrompng('assets/img/avatar_assets/Shoes/shoes_pink.png');
                    }
                    break;
            }

            generate_avatar($temp_avatar_path, $a, $b, $c, $d, $e, $f, $g);
        }
        else 
        {
            echo '<div class="profile_avatar">';
            echo '<p>';
            echo '<img height=200 width=150 src="'.$avatar_path.'">';
            echo '</p>';
            echo '</div>';
        }
        function generate_avatar($temp_avatar_path, $a, $b, $c, $d, $e, $f, $g)
        {
            $dest_image = imagecreatetruecolor(WIDTH, HEIGHT);

            imagesavealpha($dest_image, true);

            $trans_background = imagecolorallocatealpha($dest_image, 0, 0, 0, 127);

            //fill the image with a transparent background
            imagefill($dest_image, 0, 0, $trans_background);

            //copy each png file on top of the destination (result) png
            imagecopy($dest_image, $a, 0, 0, 0, 0, WIDTH, HEIGHT);
            imagecopy($dest_image, $b, 0, 0, 0, 0, WIDTH, HEIGHT);
            imagecopy($dest_image, $c, 0, 0, 0, 0, WIDTH, HEIGHT);
            imagecopy($dest_image, $d, 0, 0, 0, 0, WIDTH, HEIGHT);
            imagecopy($dest_image, $f, 0, 0, 0, 0, WIDTH, HEIGHT);
            imagecopy($dest_image, $e, 0, 0, 0, 0, WIDTH, HEIGHT);
            imagecopy($dest_image, $g, 0, 0, 0, 0, WIDTH, HEIGHT);

            //send the appropriate headers and output the image in the browser
            imagepng($dest_image, $temp_avatar_path);
			ob_start();
			imagepng($dest_image);
			$imagedata = ob_get_contents();
			ob_end_clean();
            echo '<div class="profile_avatar">';
            echo '<p>';
			echo '<img height=200 width=150 src="data:image/png;base64,'.base64_encode($imagedata).'"/>';
            echo '</p>';
            echo '</div>';
            //destroy all the image resources to free up memory
            imagedestroy($a);
            imagedestroy($b);
            imagedestroy($c);
            imagedestroy($d);
            imagedestroy($e);
            imagedestroy($f);
            imagedestroy($g);
            imagedestroy($dest_image);
        }
    ?>
    <table>
        <div class="title">
        <tr>
            <th scope="row"><label><?php echo $lang['avatarhat'] ?></th>
                <th><input type="range" name="hair" min="0" max="12" value="0" step="1" onchange="updateHairInput(this.value);"></th>
            </label>
            <th><label> <?php echo $lang['avatarstyle']; echo '<output id="texthair" value="">0</output>' ?> </label></th>
        </tr>
        </div>
        <div class="title">
        <tr>
            <th scope="row"><label><?php echo $lang['avatareye'] ?></th>
                <th><input type="range" name="eyes" min="1" max="12" value="1" step="1" onchange="updateEyesInput(this.value);"></th>
            </label>
            <th><label> <?php echo $lang['avatarstyle']; echo '<output id="texteyes" value="">1</output>' ?> </label></th>
        </tr>
        </div>
        <div class="title">
        <tr>
            <th scope="row"><label><?php echo $lang['avatarmouth'] ?></th>
                <th><input type="range" name="mouth" min="1" max="13" value="1" step="1" onchange="updateMouthInput(this.value);"></th>
            </label>
            <th><label> <?php echo $lang['avatarstyle']; echo '<output id="textmouth" value="">1</output>' ?> </label></th>
        </tr>
        </div>
        <div class="title">
        <tr>
            <th scope="row"><label><?php echo $lang['avatarbody'] ?></th>
                <th><input type="range" name="tshirt" min="1" max="9" value="1" step="1" onchange="updateShirtInput(this.value);"></th>
            </label>
            <th><label> <?php echo $lang['avatarstyle']; echo '<output id="textshirt" value="">1</output>' ?> </label></th>
        </tr>
        </div>
        <div class="title">
        <tr>
            <th scope="row"><label><?php echo $lang['avatarpants'] ?></th>
                <th><input type="range" name="pants" min="1" max="8" value="1" step="1" onchange="updatePantsInput(this.value);"></th>
            </label>
            <th><label> <?php echo $lang['avatarstyle']; echo '<output id="textpants" value="">1</output>' ?> </label></th>
        </tr>
        </div>
        <div class="title">
        <tr>
            <th scope="row"><label><?php echo $lang['avatarshoes'] ?></th>
                <th><input type="range" name="shoes" min="1" max="12" value="1" step="1" onchange="updateShoesInput(this.value);"></th>
            </label>
            <th><label> <?php echo $lang['avatarstyle']; echo '<output id="textshoes" value="">1</output>' ?> </label></th>
        </tr>
        </div>
        </table>
			<span class="input-label">
				<input class="btn-primary btn-sm" type="submit" name="back" value="<?php echo $lang['profile'] ?>">
			</span>
            <span class="input-label">
				<input class="btn-primary btn-sm" type="submit" name="generate" value="<?php echo $lang['generate_avatar'] ?>">
			</span>
			<span class="input-label">
				<input type="hidden" name="id" value="<?php echo $id; ?>">
				<input class="btn-primary btn-sm" type="submit" name="submit1" value="<?php echo $lang['save_avatar'] ?>">
			</span>
		<br>
	</form>
    </div>
    <?php
        if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['back']))
        {
            header('location:'.SITEURL.'index.php?page=profile');
        }
        else
        {
            if(isset($_POST['submit1']))
		    {
                $id = $_POST['id'];
                copy($temp_avatar_path, $new_avatar_path);
                unlink($temp_avatar_path);
                $data = "
                    avatar_path='$new_avatar_path'
                ";
                $tbl_name='tbl_users';
                $where = "id='$id'";
                $query = $obj->update_data($tbl_name,$data,$where);
                $res = $obj->execute_query($conn,$query);

                if($res==true)
                {
                    $_SESSION['profile'] = "<div class='success'>".$lang['edit_success']."</div>";
                    header('location:'.SITEURL.'index.php?page=profile');
                }
                else
                {
                    $_SESSION['avatar'] = "<div class='error'>".$lang['edit_fail']."</div>";
                    header('location:'.SITEURL.'index.php?page=avatar&id='.$id);
                }
		    }
        }
	?>
</div>