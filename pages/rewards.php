<div class="main">
 <div class="wrapper">
  <div class="body">
    <h1> <?php echo $lang['rewardsh'] ?> </h1>
    <br>
    <?php 
		$tbl_name = 'tbl_users';
      $id = $_SESSION['user'];
		$where = "username='$id' OR email='$id'";

		$query = $obj->select_data($tbl_name,$where);
		$res = $obj->execute_query($conn,$query);
		if($res == true)
		{
			$count_rows = $obj->num_rows($res);
			if($count_rows>0)
			{
				$row=$obj->fetch_data($res);
				$id = $row['id'];
				$points = $row['points'];
         }
      }
	?>
    <?php
      $price_1 = 25;
      $price_2 = 35;
      $price_3 = 40;
      $price_4 = 50;
      $price_5 = 100;
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
<div>
<?php
   echo '<strong>'.$lang['pointsp'].'</strong>'; echo ' '.$points;
?>
</div>
<?php
   if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['hair1']))
   {
      $cost = $price_1;
      $item = $hair_1;
      if($points>$cost OR $points == $cost)
      {
         $data = "
            hair_1='1'
         ";
         $tbl_name='tbl_rewards';
         $where = "id='$id'";
         $query = $obj->update_data($tbl_name,$data,$where);
         $res = $obj->execute_query($conn,$query);

         if($res==true)
            {
               echo "<div class='success'>".$lang['successpoints']."</div>";
               $tbl_name = 'tbl_users';
               $where = "id='$id'";
               $new_points = $points - $cost;
               $data = "
                  points='$new_points'
               ";
               $query = $obj->update_data($tbl_name,$data,$where);
               $res = $obj->execute_query($conn,$query);
               if($res==true){
                  header('location:'.SITEURL.'index.php?page=rewards');
               }
               else
               {
                  echo "<div class='error'>".$lang['nopoints']."</div>";
               }
            }
            else
            {
               echo "<div class='error'>".$lang['errorpoints']."</div>";
               header('location:'.SITEURL.'index.php?page=rewards');
            }
      }
      else
      {
         echo "<div class='error'>".$lang['nopoints']."</div>";
      }
   }
   if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['hair2']))
   {
      $cost = $price_1;
      $item = $hair_2;
      if($points>$cost OR $points == $cost)
      {
         $data = "
            hair_2='1'
         ";
         $tbl_name='tbl_rewards';
         $where = "id='$id'";
         $query = $obj->update_data($tbl_name,$data,$where);
         $res = $obj->execute_query($conn,$query);

         if($res==true)
            {
               echo "<div class='success'>".$lang['successpoints']."</div>";
               $tbl_name = 'tbl_users';
               $where = "id='$id'";
               $new_points = $points - $cost;
               $data = "
                  points='$new_points'
               ";
               $query = $obj->update_data($tbl_name,$data,$where);
               $res = $obj->execute_query($conn,$query);
               if($res==true){
                  header('location:'.SITEURL.'index.php?page=rewards');
               }
               else
               {
                  echo "<div class='error'>".$lang['nopoints']."</div>";
               }
            }
            else
            {
               echo "<div class='error'>".$lang['errorpoints']."</div>";
               header('location:'.SITEURL.'index.php?page=rewards');
            }
      }
      else
      {
         echo "<div class='error'>".$lang['nopoints']."</div>";
      }
   }
   if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['hair3']))
   {
      $cost = $price_1;
      $item = $hair_3;
      if($points>$cost OR $points == $cost)
      {
         $data = "
            hair_3='1'
         ";
         $tbl_name='tbl_rewards';
         $where = "id='$id'";
         $query = $obj->update_data($tbl_name,$data,$where);
         $res = $obj->execute_query($conn,$query);

         if($res==true)
            {
               echo "<div class='success'>".$lang['successpoints']."</div>";
               $tbl_name = 'tbl_users';
               $where = "id='$id'";
               $new_points = $points - $cost;
               $data = "
                  points='$new_points'
               ";
               $query = $obj->update_data($tbl_name,$data,$where);
               $res = $obj->execute_query($conn,$query);
               if($res==true){
                  header('location:'.SITEURL.'index.php?page=rewards');
               }
               else
               {
                  echo "<div class='error'>".$lang['nopoints']."</div>";
               }
            }
            else
            {
               echo "<div class='error'>".$lang['errorpoints']."</div>";
               header('location:'.SITEURL.'index.php?page=rewards');
            }
      }
      else
      {
         echo "<div class='error'>".$lang['nopoints']."</div>";
      }
   }
   if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['hair4']))
   {
      $cost = $price_1;
      $item = $hair_4;
      if($points>$cost OR $points == $cost)
      {
         $data = "
            hair_4='1'
         ";
         $tbl_name='tbl_rewards';
         $where = "id='$id'";
         $query = $obj->update_data($tbl_name,$data,$where);
         $res = $obj->execute_query($conn,$query);

         if($res==true)
            {
               echo "<div class='success'>".$lang['successpoints']."</div>";
               $tbl_name = 'tbl_users';
               $where = "id='$id'";
               $new_points = $points - $cost;
               $data = "
                  points='$new_points'
               ";
               $query = $obj->update_data($tbl_name,$data,$where);
               $res = $obj->execute_query($conn,$query);
               if($res==true){
                  header('location:'.SITEURL.'index.php?page=rewards');
               }
               else
               {
                  echo "<div class='error'>".$lang['nopoints']."</div>";
               }
            }
            else
            {
               echo "<div class='error'>".$lang['errorpoints']."</div>";
               header('location:'.SITEURL.'index.php?page=rewards');
            }
      }
      else
      {
         echo "<div class='error'>".$lang['nopoints']."</div>";
      }
   }
   if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['hair5']))
   {
      $cost = $price_1;
      $item = $hair_5;
      if($points>$cost OR $points == $cost)
      {
         $data = "
            hair_5='1'
         ";
         $tbl_name='tbl_rewards';
         $where = "id='$id'";
         $query = $obj->update_data($tbl_name,$data,$where);
         $res = $obj->execute_query($conn,$query);

         if($res==true)
            {
               echo "<div class='success'>".$lang['successpoints']."</div>";
               $tbl_name = 'tbl_users';
               $where = "id='$id'";
               $new_points = $points - $cost;
               $data = "
                  points='$new_points'
               ";
               $query = $obj->update_data($tbl_name,$data,$where);
               $res = $obj->execute_query($conn,$query);
               if($res==true){
                  header('location:'.SITEURL.'index.php?page=rewards');
               }
               else
               {
                  echo "<div class='error'>".$lang['nopoints']."</div>";
               }
            }
            else
            {
               echo "<div class='error'>".$lang['errorpoints']."</div>";
               header('location:'.SITEURL.'index.php?page=rewards');
            }
      }
      else
      {
         echo "<div class='error'>".$lang['nopoints']."</div>";
      }
   }
   if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['hair6']))
   {
      $cost = $price_1;
      $item = $hair_6;
      if($points>$cost OR $points == $cost)
      {
         $data = "
            hair_6='1'
         ";
         $tbl_name='tbl_rewards';
         $where = "id='$id'";
         $query = $obj->update_data($tbl_name,$data,$where);
         $res = $obj->execute_query($conn,$query);

         if($res==true)
            {
               echo "<div class='success'>".$lang['successpoints']."</div>";
               $tbl_name = 'tbl_users';
               $where = "id='$id'";
               $new_points = $points - $cost;
               $data = "
                  points='$new_points'
               ";
               $query = $obj->update_data($tbl_name,$data,$where);
               $res = $obj->execute_query($conn,$query);
               if($res==true){
                  header('location:'.SITEURL.'index.php?page=rewards');
               }
               else
               {
                  echo "<div class='error'>".$lang['nopoints']."</div>";
               }
            }
            else
            {
               echo "<div class='error'>".$lang['errorpoints']."</div>";
               header('location:'.SITEURL.'index.php?page=rewards');
            }
      }
      else
      {
         echo "<div class='error'>".$lang['nopoints']."</div>";
      }
   }
   if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['hair7']))
   {
      $cost = $price_2;
      $item = $hair_7;
      if($points>$cost OR $points == $cost)
      {
         $data = "
            hair_7='1'
         ";
         $tbl_name='tbl_rewards';
         $where = "id='$id'";
         $query = $obj->update_data($tbl_name,$data,$where);
         $res = $obj->execute_query($conn,$query);

         if($res==true)
            {
               echo "<div class='success'>".$lang['successpoints']."</div>";
               $tbl_name = 'tbl_users';
               $where = "id='$id'";
               $new_points = $points - $cost;
               $data = "
                  points='$new_points'
               ";
               $query = $obj->update_data($tbl_name,$data,$where);
               $res = $obj->execute_query($conn,$query);
               if($res==true){
                  header('location:'.SITEURL.'index.php?page=rewards');
               }
               else
               {
                  echo "<div class='error'>".$lang['nopoints']."</div>";
               }
            }
            else
            {
               echo "<div class='error'>".$lang['errorpoints']."</div>";
               header('location:'.SITEURL.'index.php?page=rewards');
            }
      }
      else
      {
         echo "<div class='error'>".$lang['nopoints']."</div>";
      }
   }
   if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['hair8']))
   {
      $cost = $price_2;
      $item = $hair_8;
      if($points>$cost OR $points == $cost)
      {
         $data = "
            hair_8='1'
         ";
         $tbl_name='tbl_rewards';
         $where = "id='$id'";
         $query = $obj->update_data($tbl_name,$data,$where);
         $res = $obj->execute_query($conn,$query);

         if($res==true)
            {
               echo "<div class='success'>".$lang['successpoints']."</div>";
               $tbl_name = 'tbl_users';
               $where = "id='$id'";
               $new_points = $points - $cost;
               $data = "
                  points='$new_points'
               ";
               $query = $obj->update_data($tbl_name,$data,$where);
               $res = $obj->execute_query($conn,$query);
               if($res==true){
                  header('location:'.SITEURL.'index.php?page=rewards');
               }
               else
               {
                  echo "<div class='error'>".$lang['nopoints']."</div>";
               }
            }
            else
            {
               echo "<div class='error'>".$lang['errorpoints']."</div>";
               header('location:'.SITEURL.'index.php?page=rewards');
            }
      }
      else
      {
         echo "<div class='error'>".$lang['nopoints']."</div>";
      }
   }
   if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['hair9']))
   {
      $cost = $price_3;
      $item = $hair_9;
      if($points>$cost OR $points == $cost)
      {
         $data = "
            hair_9='1'
         ";
         $tbl_name='tbl_rewards';
         $where = "id='$id'";
         $query = $obj->update_data($tbl_name,$data,$where);
         $res = $obj->execute_query($conn,$query);

         if($res==true)
            {
               echo "<div class='success'>".$lang['successpoints']."</div>";
               $tbl_name = 'tbl_users';
               $where = "id='$id'";
               $new_points = $points - $cost;
               $data = "
                  points='$new_points'
               ";
               $query = $obj->update_data($tbl_name,$data,$where);
               $res = $obj->execute_query($conn,$query);
               if($res==true){
                  header('location:'.SITEURL.'index.php?page=rewards');
               }
               else
               {
                  echo "<div class='error'>".$lang['nopoints']."</div>";
               }
            }
            else
            {
               echo "<div class='error'>".$lang['errorpoints']."</div>";
               header('location:'.SITEURL.'index.php?page=rewards');
            }
      }
      else
      {
         echo "<div class='error'>".$lang['nopoints']."</div>";
      }
   }
   if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['hair10']))
   {
      $cost = $price_3;
      $item = $hair_10;
      if($points>$cost OR $points == $cost)
      {
         $data = "
            hair_10='1'
         ";
         $tbl_name='tbl_rewards';
         $where = "id='$id'";
         $query = $obj->update_data($tbl_name,$data,$where);
         $res = $obj->execute_query($conn,$query);

         if($res==true)
            {
               echo "<div class='success'>".$lang['successpoints']."</div>";
               $tbl_name = 'tbl_users';
               $where = "id='$id'";
               $new_points = $points - $cost;
               $data = "
                  points='$new_points'
               ";
               $query = $obj->update_data($tbl_name,$data,$where);
               $res = $obj->execute_query($conn,$query);
               if($res==true){
                  header('location:'.SITEURL.'index.php?page=rewards');
               }
               else
               {
                  echo "<div class='error'>".$lang['nopoints']."</div>";
               }
            }
            else
            {
               echo "<div class='error'>".$lang['errorpoints']."</div>";
               header('location:'.SITEURL.'index.php?page=rewards');
            }
      }
      else
      {
         echo "<div class='error'>".$lang['nopoints']."</div>";
      }
   }
   if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['hair11']))
   {
      $cost = $price_4;
      $item = $hair_11;
      if($points>$cost OR $points == $cost)
      {
         $data = "
            hair_11='1'
         ";
         $tbl_name='tbl_rewards';
         $where = "id='$id'";
         $query = $obj->update_data($tbl_name,$data,$where);
         $res = $obj->execute_query($conn,$query);

         if($res==true)
            {
               echo "<div class='success'>".$lang['successpoints']."</div>";
               $tbl_name = 'tbl_users';
               $where = "id='$id'";
               $new_points = $points - $cost;
               $data = "
                  points='$new_points'
               ";
               $query = $obj->update_data($tbl_name,$data,$where);
               $res = $obj->execute_query($conn,$query);
               if($res==true){
                  header('location:'.SITEURL.'index.php?page=rewards');
               }
               else
               {
                  echo "<div class='error'>".$lang['nopoints']."</div>";
               }
            }
            else
            {
               echo "<div class='error'>".$lang['errorpoints']."</div>";
               header('location:'.SITEURL.'index.php?page=rewards');
            }
      }
      else
      {
         echo "<div class='error'>".$lang['nopoints']."</div>";
      }
   }
   if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['hair12']))
   {
      $cost = $price_5;
      $item = $hair_12;
      if($points>$cost OR $points == $cost)
      {
         $data = "
            hair_12='1'
         ";
         $tbl_name='tbl_rewards';
         $where = "id='$id'";
         $query = $obj->update_data($tbl_name,$data,$where);
         $res = $obj->execute_query($conn,$query);

         if($res==true)
            {
               echo "<div class='success'>".$lang['successpoints']."</div>";
               $tbl_name = 'tbl_users';
               $where = "id='$id'";
               $new_points = $points - $cost;
               $data = "
                  points='$new_points'
               ";
               $query = $obj->update_data($tbl_name,$data,$where);
               $res = $obj->execute_query($conn,$query);
               if($res==true){
                  header('location:'.SITEURL.'index.php?page=rewards');
               }
               else
               {
                  echo "<div class='error'>".$lang['nopoints']."</div>";
               }
            }
            else
            {
               echo "<div class='error'>".$lang['errorpoints']."</div>";
               header('location:'.SITEURL.'index.php?page=rewards');
            }
      }
      else
      {
         echo "<div class='error'>".$lang['nopoints']."</div>";
      }
   }
   if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['eyes1']))
   {
      $cost = $price_1;
      $item = $eyes_1;
      if($points>$cost OR $points == $cost)
      {
         $data = "
            eyes_1='1'
         ";
         $tbl_name='tbl_rewards';
         $where = "id='$id'";
         $query = $obj->update_data($tbl_name,$data,$where);
         $res = $obj->execute_query($conn,$query);

         if($res==true)
            {
               echo "<div class='success'>".$lang['successpoints']."</div>";
               $tbl_name = 'tbl_users';
               $where = "id='$id'";
               $new_points = $points - $cost;
               $data = "
                  points='$new_points'
               ";
               $query = $obj->update_data($tbl_name,$data,$where);
               $res = $obj->execute_query($conn,$query);
               if($res==true){
                  header('location:'.SITEURL.'index.php?page=rewards');
               }
               else
               {
                  echo "<div class='error'>".$lang['nopoints']."</div>";
               }
            }
            else
            {
               echo "<div class='error'>".$lang['errorpoints']."</div>";
               header('location:'.SITEURL.'index.php?page=rewards');
            }
      }
      else
      {
         echo "<div class='error'>".$lang['nopoints']."</div>";
      }
   }
   if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['eyes2']))
   {
      $cost = $price_1;
      $item = $eyes_2;
      if($points>$cost OR $points == $cost)
      {
         $data = "
            eyes_2='1'
         ";
         $tbl_name='tbl_rewards';
         $where = "id='$id'";
         $query = $obj->update_data($tbl_name,$data,$where);
         $res = $obj->execute_query($conn,$query);

         if($res==true)
            {
               echo "<div class='success'>".$lang['successpoints']."</div>";
               $tbl_name = 'tbl_users';
               $where = "id='$id'";
               $new_points = $points - $cost;
               $data = "
                  points='$new_points'
               ";
               $query = $obj->update_data($tbl_name,$data,$where);
               $res = $obj->execute_query($conn,$query);
               if($res==true){
                  header('location:'.SITEURL.'index.php?page=rewards');
               }
               else
               {
                  echo "<div class='error'>".$lang['nopoints']."</div>";
               }
            }
            else
            {
               echo "<div class='error'>".$lang['errorpoints']."</div>";
               header('location:'.SITEURL.'index.php?page=rewards');
            }
      }
      else
      {
         echo "<div class='error'>".$lang['nopoints']."</div>";
      }
   }
   if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['eyes3']))
   {
      $cost = $price_1;
      $item = $eyes_3;
      if($points>$cost OR $points == $cost)
      {
         $data = "
            eyes_3='1'
         ";
         $tbl_name='tbl_rewards';
         $where = "id='$id'";
         $query = $obj->update_data($tbl_name,$data,$where);
         $res = $obj->execute_query($conn,$query);

         if($res==true)
            {
               echo "<div class='success'>".$lang['successpoints']."</div>";
               $tbl_name = 'tbl_users';
               $where = "id='$id'";
               $new_points = $points - $cost;
               $data = "
                  points='$new_points'
               ";
               $query = $obj->update_data($tbl_name,$data,$where);
               $res = $obj->execute_query($conn,$query);
               if($res==true){
                  header('location:'.SITEURL.'index.php?page=rewards');
               }
               else
               {
                  echo "<div class='error'>".$lang['nopoints']."</div>";
               }
            }
            else
            {
               echo "<div class='error'>".$lang['errorpoints']."</div>";
               header('location:'.SITEURL.'index.php?page=rewards');
            }
      }
      else
      {
         echo "<div class='error'>".$lang['nopoints']."</div>";
      }
   }
   if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['eyes4']))
   {
      $cost = $price_1;
      $item = $eyes_4;
      if($points>$cost OR $points == $cost)
      {
         $data = "
            eyes_4='1'
         ";
         $tbl_name='tbl_rewards';
         $where = "id='$id'";
         $query = $obj->update_data($tbl_name,$data,$where);
         $res = $obj->execute_query($conn,$query);

         if($res==true)
            {
               echo "<div class='success'>".$lang['successpoints']."</div>";
               $tbl_name = 'tbl_users';
               $where = "id='$id'";
               $new_points = $points - $cost;
               $data = "
                  points='$new_points'
               ";
               $query = $obj->update_data($tbl_name,$data,$where);
               $res = $obj->execute_query($conn,$query);
               if($res==true){
                  header('location:'.SITEURL.'index.php?page=rewards');
               }
               else
               {
                  echo "<div class='error'>".$lang['nopoints']."</div>";
               }
            }
            else
            {
               echo "<div class='error'>".$lang['errorpoints']."</div>";
               header('location:'.SITEURL.'index.php?page=rewards');
            }
      }
      else
      {
         echo "<div class='error'>".$lang['nopoints']."</div>";
      }
   }
   if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['eyes5']))
   {
      $cost = $price_1;
      $item = $eyes_5;
      if($points>$cost OR $points == $cost)
      {
         $data = "
            eyes_5='1'
         ";
         $tbl_name='tbl_rewards';
         $where = "id='$id'";
         $query = $obj->update_data($tbl_name,$data,$where);
         $res = $obj->execute_query($conn,$query);

         if($res==true)
            {
               echo "<div class='success'>".$lang['successpoints']."</div>";
               $tbl_name = 'tbl_users';
               $where = "id='$id'";
               $new_points = $points - $cost;
               $data = "
                  points='$new_points'
               ";
               $query = $obj->update_data($tbl_name,$data,$where);
               $res = $obj->execute_query($conn,$query);
               if($res==true){
                  header('location:'.SITEURL.'index.php?page=rewards');
               }
               else
               {
                  echo "<div class='error'>".$lang['nopoints']."</div>";
               }
            }
            else
            {
               echo "<div class='error'>".$lang['errorpoints']."</div>";
               header('location:'.SITEURL.'index.php?page=rewards');
            }
      }
      else
      {
         echo "<div class='error'>".$lang['nopoints']."</div>";
      }
   }
   if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['eyes6']))
   {
      $cost = $price_1;
      $item = $eyes_6;
      if($points>$cost OR $points == $cost)
      {
         $data = "
            eyes_6='1'
         ";
         $tbl_name='tbl_rewards';
         $where = "id='$id'";
         $query = $obj->update_data($tbl_name,$data,$where);
         $res = $obj->execute_query($conn,$query);

         if($res==true)
            {
               echo "<div class='success'>".$lang['successpoints']."</div>";
               $tbl_name = 'tbl_users';
               $where = "id='$id'";
               $new_points = $points - $cost;
               $data = "
                  points='$new_points'
               ";
               $query = $obj->update_data($tbl_name,$data,$where);
               $res = $obj->execute_query($conn,$query);
               if($res==true){
                  header('location:'.SITEURL.'index.php?page=rewards');
               }
               else
               {
                  echo "<div class='error'>".$lang['nopoints']."</div>";
               }
            }
            else
            {
               echo "<div class='error'>".$lang['errorpoints']."</div>";
               header('location:'.SITEURL.'index.php?page=rewards');
            }
      }
      else
      {
         echo "<div class='error'>".$lang['nopoints']."</div>";
      }
   }
   if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['eyes7']))
   {
      $cost = $price_2;
      $item = $eyes_7;
      if($points>$cost OR $points == $cost)
      {
         $data = "
            eyes_7='1'
         ";
         $tbl_name='tbl_rewards';
         $where = "id='$id'";
         $query = $obj->update_data($tbl_name,$data,$where);
         $res = $obj->execute_query($conn,$query);

         if($res==true)
            {
               echo "<div class='success'>".$lang['successpoints']."</div>";
               $tbl_name = 'tbl_users';
               $where = "id='$id'";
               $new_points = $points - $cost;
               $data = "
                  points='$new_points'
               ";
               $query = $obj->update_data($tbl_name,$data,$where);
               $res = $obj->execute_query($conn,$query);
               if($res==true){
                  header('location:'.SITEURL.'index.php?page=rewards');
               }
               else
               {
                  echo "<div class='error'>".$lang['nopoints']."</div>";
               }
            }
            else
            {
               echo "<div class='error'>".$lang['errorpoints']."</div>";
               header('location:'.SITEURL.'index.php?page=rewards');
            }
      }
      else
      {
         echo "<div class='error'>".$lang['nopoints']."</div>";
      }
   }
   if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['eyes8']))
   {
      $cost = $price_2;
      $item = $eyes_8;
      if($points>$cost OR $points == $cost)
      {
         $data = "
            eyes_8='1'
         ";
         $tbl_name='tbl_rewards';
         $where = "id='$id'";
         $query = $obj->update_data($tbl_name,$data,$where);
         $res = $obj->execute_query($conn,$query);

         if($res==true)
            {
               echo "<div class='success'>".$lang['successpoints']."</div>";
               $tbl_name = 'tbl_users';
               $where = "id='$id'";
               $new_points = $points - $cost;
               $data = "
                  points='$new_points'
               ";
               $query = $obj->update_data($tbl_name,$data,$where);
               $res = $obj->execute_query($conn,$query);
               if($res==true){
                  header('location:'.SITEURL.'index.php?page=rewards');
               }
               else
               {
                  echo "<div class='error'>".$lang['nopoints']."</div>";
               }
            }
            else
            {
               echo "<div class='error'>".$lang['errorpoints']."</div>";
               header('location:'.SITEURL.'index.php?page=rewards');
            }
      }
      else
      {
         echo "<div class='error'>".$lang['nopoints']."</div>";
      }
   }
   if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['eyes9']))
   {
      $cost = $price_3;
      $item = $eyes_9;
      if($points>$cost OR $points == $cost)
      {
         $data = "
            eyes_9='1'
         ";
         $tbl_name='tbl_rewards';
         $where = "id='$id'";
         $query = $obj->update_data($tbl_name,$data,$where);
         $res = $obj->execute_query($conn,$query);

         if($res==true)
            {
               echo "<div class='success'>".$lang['successpoints']."</div>";
               $tbl_name = 'tbl_users';
               $where = "id='$id'";
               $new_points = $points - $cost;
               $data = "
                  points='$new_points'
               ";
               $query = $obj->update_data($tbl_name,$data,$where);
               $res = $obj->execute_query($conn,$query);
               if($res==true){
                  header('location:'.SITEURL.'index.php?page=rewards');
               }
               else
               {
                  echo "<div class='error'>".$lang['nopoints']."</div>";
               }
            }
            else
            {
               echo "<div class='error'>".$lang['errorpoints']."</div>";
               header('location:'.SITEURL.'index.php?page=rewards');
            }
      }
      else
      {
         echo "<div class='error'>".$lang['nopoints']."</div>";
      }
   }
   if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['eyes10']))
   {
      $cost = $price_3;
      $item = $eyes_10;
      if($points>$cost OR $points == $cost)
      {
         $data = "
            eyes_10='1'
         ";
         $tbl_name='tbl_rewards';
         $where = "id='$id'";
         $query = $obj->update_data($tbl_name,$data,$where);
         $res = $obj->execute_query($conn,$query);

         if($res==true)
            {
               echo "<div class='success'>".$lang['successpoints']."</div>";
               $tbl_name = 'tbl_users';
               $where = "id='$id'";
               $new_points = $points - $cost;
               $data = "
                  points='$new_points'
               ";
               $query = $obj->update_data($tbl_name,$data,$where);
               $res = $obj->execute_query($conn,$query);
               if($res==true){
                  header('location:'.SITEURL.'index.php?page=rewards');
               }
               else
               {
                  echo "<div class='error'>".$lang['nopoints']."</div>";
               }
            }
            else
            {
               echo "<div class='error'>".$lang['errorpoints']."</div>";
               header('location:'.SITEURL.'index.php?page=rewards');
            }
      }
      else
      {
         echo "<div class='error'>".$lang['nopoints']."</div>";
      }
   }
   if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['eyes11']))
   {
      $cost = $price_4;
      $item = $eyes_11;
      if($points>$cost OR $points == $cost)
      {
         $data = "
            eyes_11='1'
         ";
         $tbl_name='tbl_rewards';
         $where = "id='$id'";
         $query = $obj->update_data($tbl_name,$data,$where);
         $res = $obj->execute_query($conn,$query);

         if($res==true)
            {
               echo "<div class='success'>".$lang['successpoints']."</div>";
               $tbl_name = 'tbl_users';
               $where = "id='$id'";
               $new_points = $points - $cost;
               $data = "
                  points='$new_points'
               ";
               $query = $obj->update_data($tbl_name,$data,$where);
               $res = $obj->execute_query($conn,$query);
               if($res==true){
                  header('location:'.SITEURL.'index.php?page=rewards');
               }
               else
               {
                  echo "<div class='error'>".$lang['nopoints']."</div>";
               }
            }
            else
            {
               echo "<div class='error'>".$lang['errorpoints']."</div>";
               header('location:'.SITEURL.'index.php?page=rewards');
            }
      }
      else
      {
         echo "<div class='error'>".$lang['nopoints']."</div>";
      }
   }
   if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['eyes12']))
   {
      $cost = $price_5;
      $item = $eyes_12;
      if($points>$cost OR $points == $cost)
      {
         $data = "
            eyes_12='1'
         ";
         $tbl_name='tbl_rewards';
         $where = "id='$id'";
         $query = $obj->update_data($tbl_name,$data,$where);
         $res = $obj->execute_query($conn,$query);

         if($res==true)
            {
               echo "<div class='success'>".$lang['successpoints']."</div>";
               $tbl_name = 'tbl_users';
               $where = "id='$id'";
               $new_points = $points - $cost;
               $data = "
                  points='$new_points'
               ";
               $query = $obj->update_data($tbl_name,$data,$where);
               $res = $obj->execute_query($conn,$query);
               if($res==true){
                  header('location:'.SITEURL.'index.php?page=rewards');
               }
               else
               {
                  echo "<div class='error'>".$lang['nopoints']."</div>";
               }
            }
            else
            {
               echo "<div class='error'>".$lang['errorpoints']."</div>";
               header('location:'.SITEURL.'index.php?page=rewards');
            }
      }
      else
      {
         echo "<div class='error'>".$lang['nopoints']."</div>";
      }
   }
   if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['mouth1']))
   {
      $cost = $price_1;
      $item = $mouth_1;
      if($points>$cost OR $points == $cost)
      {
         $data = "
            mouth_1='1'
         ";
         $tbl_name='tbl_rewards';
         $where = "id='$id'";
         $query = $obj->update_data($tbl_name,$data,$where);
         $res = $obj->execute_query($conn,$query);

         if($res==true)
            {
               echo "<div class='success'>".$lang['successpoints']."</div>";
               $tbl_name = 'tbl_users';
               $where = "id='$id'";
               $new_points = $points - $cost;
               $data = "
                  points='$new_points'
               ";
               $query = $obj->update_data($tbl_name,$data,$where);
               $res = $obj->execute_query($conn,$query);
               if($res==true){
                  header('location:'.SITEURL.'index.php?page=rewards');
               }
               else
               {
                  echo "<div class='error'>".$lang['nopoints']."</div>";
               }
            }
            else
            {
               echo "<div class='error'>".$lang['errorpoints']."</div>";
               header('location:'.SITEURL.'index.php?page=rewards');
            }
      }
      else
      {
         echo "<div class='error'>".$lang['nopoints']."</div>";
      }
   }
   if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['mouth2']))
   {
      $cost = $price_1;
      $item = $mouth_2;
      if($points>$cost OR $points == $cost)
      {
         $data = "
            mouth_2='1'
         ";
         $tbl_name='tbl_rewards';
         $where = "id='$id'";
         $query = $obj->update_data($tbl_name,$data,$where);
         $res = $obj->execute_query($conn,$query);

         if($res==true)
            {
               echo "<div class='success'>".$lang['successpoints']."</div>";
               $tbl_name = 'tbl_users';
               $where = "id='$id'";
               $new_points = $points - $cost;
               $data = "
                  points='$new_points'
               ";
               $query = $obj->update_data($tbl_name,$data,$where);
               $res = $obj->execute_query($conn,$query);
               if($res==true){
                  header('location:'.SITEURL.'index.php?page=rewards');
               }
               else
               {
                  echo "<div class='error'>".$lang['nopoints']."</div>";
               }
            }
            else
            {
               echo "<div class='error'>".$lang['errorpoints']."</div>";
               header('location:'.SITEURL.'index.php?page=rewards');
            }
      }
      else
      {
         echo "<div class='error'>".$lang['nopoints']."</div>";
      }
   }
   if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['mouth3']))
   {
      $cost = $price_1;
      $item = $mouth_3;
      if($points>$cost OR $points == $cost)
      {
         $data = "
            mouth_3='1'
         ";
         $tbl_name='tbl_rewards';
         $where = "id='$id'";
         $query = $obj->update_data($tbl_name,$data,$where);
         $res = $obj->execute_query($conn,$query);

         if($res==true)
            {
               echo "<div class='success'>".$lang['successpoints']."</div>";
               $tbl_name = 'tbl_users';
               $where = "id='$id'";
               $new_points = $points - $cost;
               $data = "
                  points='$new_points'
               ";
               $query = $obj->update_data($tbl_name,$data,$where);
               $res = $obj->execute_query($conn,$query);
               if($res==true){
                  header('location:'.SITEURL.'index.php?page=rewards');
               }
               else
               {
                  echo "<div class='error'>".$lang['nopoints']."</div>";
               }
            }
            else
            {
               echo "<div class='error'>".$lang['errorpoints']."</div>";
               header('location:'.SITEURL.'index.php?page=rewards');
            }
      }
      else
      {
         echo "<div class='error'>".$lang['nopoints']."</div>";
      }
   }
   if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['mouth4']))
   {
      $cost = $price_1;
      $item = $mouth_4;
      if($points>$cost OR $points == $cost)
      {
         $data = "
            mouth_4='1'
         ";
         $tbl_name='tbl_rewards';
         $where = "id='$id'";
         $query = $obj->update_data($tbl_name,$data,$where);
         $res = $obj->execute_query($conn,$query);

         if($res==true)
            {
               echo "<div class='success'>".$lang['successpoints']."</div>";
               $tbl_name = 'tbl_users';
               $where = "id='$id'";
               $new_points = $points - $cost;
               $data = "
                  points='$new_points'
               ";
               $query = $obj->update_data($tbl_name,$data,$where);
               $res = $obj->execute_query($conn,$query);
               if($res==true){
                  header('location:'.SITEURL.'index.php?page=rewards');
               }
               else
               {
                  echo "<div class='error'>".$lang['nopoints']."</div>";
               }
            }
            else
            {
               echo "<div class='error'>".$lang['errorpoints']."</div>";
               header('location:'.SITEURL.'index.php?page=rewards');
            }
      }
      else
      {
         echo "<div class='error'>".$lang['nopoints']."</div>";
      }
   }
   if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['mouth5']))
   {
      $cost = $price_1;
      $item = $mouth_5;
      if($points>$cost OR $points == $cost)
      {
         $data = "
            mouth_5='1'
         ";
         $tbl_name='tbl_rewards';
         $where = "id='$id'";
         $query = $obj->update_data($tbl_name,$data,$where);
         $res = $obj->execute_query($conn,$query);

         if($res==true)
            {
               echo "<div class='success'>".$lang['successpoints']."</div>";
               $tbl_name = 'tbl_users';
               $where = "id='$id'";
               $new_points = $points - $cost;
               $data = "
                  points='$new_points'
               ";
               $query = $obj->update_data($tbl_name,$data,$where);
               $res = $obj->execute_query($conn,$query);
               if($res==true){
                  header('location:'.SITEURL.'index.php?page=rewards');
               }
               else
               {
                  echo "<div class='error'>".$lang['nopoints']."</div>";
               }
            }
            else
            {
               echo "<div class='error'>".$lang['errorpoints']."</div>";
               header('location:'.SITEURL.'index.php?page=rewards');
            }
      }
      else
      {
         echo "<div class='error'>".$lang['nopoints']."</div>";
      }
   }
   if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['mouth6']))
   {
      $cost = $price_1;
      $item = $mouth_6;
      if($points>$cost OR $points == $cost)
      {
         $data = "
            mouth_6='1'
         ";
         $tbl_name='tbl_rewards';
         $where = "id='$id'";
         $query = $obj->update_data($tbl_name,$data,$where);
         $res = $obj->execute_query($conn,$query);

         if($res==true)
            {
               echo "<div class='success'>".$lang['successpoints']."</div>";
               $tbl_name = 'tbl_users';
               $where = "id='$id'";
               $new_points = $points - $cost;
               $data = "
                  points='$new_points'
               ";
               $query = $obj->update_data($tbl_name,$data,$where);
               $res = $obj->execute_query($conn,$query);
               if($res==true){
                  header('location:'.SITEURL.'index.php?page=rewards');
               }
               else
               {
                  echo "<div class='error'>".$lang['nopoints']."</div>";
               }
            }
            else
            {
               echo "<div class='error'>".$lang['errorpoints']."</div>";
               header('location:'.SITEURL.'index.php?page=rewards');
            }
      }
      else
      {
         echo "<div class='error'>".$lang['nopoints']."</div>";
      }
   }
   if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['mouth7']))
   {
      $cost = $price_2;
      $item = $mouth_7;
      if($points>$cost OR $points == $cost)
      {
         $data = "
            mouth_7='1'
         ";
         $tbl_name='tbl_rewards';
         $where = "id='$id'";
         $query = $obj->update_data($tbl_name,$data,$where);
         $res = $obj->execute_query($conn,$query);

         if($res==true)
            {
               echo "<div class='success'>".$lang['successpoints']."</div>";
               $tbl_name = 'tbl_users';
               $where = "id='$id'";
               $new_points = $points - $cost;
               $data = "
                  points='$new_points'
               ";
               $query = $obj->update_data($tbl_name,$data,$where);
               $res = $obj->execute_query($conn,$query);
               if($res==true){
                  header('location:'.SITEURL.'index.php?page=rewards');
               }
               else
               {
                  echo "<div class='error'>".$lang['nopoints']."</div>";
               }
            }
            else
            {
               echo "<div class='error'>".$lang['errorpoints']."</div>";
               header('location:'.SITEURL.'index.php?page=rewards');
            }
      }
      else
      {
         echo "<div class='error'>".$lang['nopoints']."</div>";
      }
   }
   if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['mouth8']))
   {
      $cost = $price_2;
      $item = $mouth_8;
      if($points>$cost OR $points == $cost)
      {
         $data = "
            mouth_8='1'
         ";
         $tbl_name='tbl_rewards';
         $where = "id='$id'";
         $query = $obj->update_data($tbl_name,$data,$where);
         $res = $obj->execute_query($conn,$query);

         if($res==true)
            {
               echo "<div class='success'>".$lang['successpoints']."</div>";
               $tbl_name = 'tbl_users';
               $where = "id='$id'";
               $new_points = $points - $cost;
               $data = "
                  points='$new_points'
               ";
               $query = $obj->update_data($tbl_name,$data,$where);
               $res = $obj->execute_query($conn,$query);
               if($res==true){
                  header('location:'.SITEURL.'index.php?page=rewards');
               }
               else
               {
                  echo "<div class='error'>".$lang['nopoints']."</div>";
               }
            }
            else
            {
               echo "<div class='error'>".$lang['errorpoints']."</div>";
               header('location:'.SITEURL.'index.php?page=rewards');
            }
      }
      else
      {
         echo "<div class='error'>".$lang['nopoints']."</div>";
      }
   }
   if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['mouth9']))
   {
      $cost = $price_3;
      $item = $mouth_9;
      if($points>$cost OR $points == $cost)
      {
         $data = "
            mouth_9='1'
         ";
         $tbl_name='tbl_rewards';
         $where = "id='$id'";
         $query = $obj->update_data($tbl_name,$data,$where);
         $res = $obj->execute_query($conn,$query);

         if($res==true)
            {
               echo "<div class='success'>".$lang['successpoints']."</div>";
               $tbl_name = 'tbl_users';
               $where = "id='$id'";
               $new_points = $points - $cost;
               $data = "
                  points='$new_points'
               ";
               $query = $obj->update_data($tbl_name,$data,$where);
               $res = $obj->execute_query($conn,$query);
               if($res==true){
                  header('location:'.SITEURL.'index.php?page=rewards');
               }
               else
               {
                  echo "<div class='error'>".$lang['nopoints']."</div>";
               }
            }
            else
            {
               echo "<div class='error'>".$lang['errorpoints']."</div>";
               header('location:'.SITEURL.'index.php?page=rewards');
            }
      }
      else
      {
         echo "<div class='error'>".$lang['nopoints']."</div>";
      }
   }
   if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['mouth10']))
   {
      $cost = $price_3;
      $item = $mouth_10;
      if($points>$cost OR $points == $cost)
      {
         $data = "
            mouth_10='1'
         ";
         $tbl_name='tbl_rewards';
         $where = "id='$id'";
         $query = $obj->update_data($tbl_name,$data,$where);
         $res = $obj->execute_query($conn,$query);

         if($res==true)
            {
               echo "<div class='success'>".$lang['successpoints']."</div>";
               $tbl_name = 'tbl_users';
               $where = "id='$id'";
               $new_points = $points - $cost;
               $data = "
                  points='$new_points'
               ";
               $query = $obj->update_data($tbl_name,$data,$where);
               $res = $obj->execute_query($conn,$query);
               if($res==true){
                  header('location:'.SITEURL.'index.php?page=rewards');
               }
               else
               {
                  echo "<div class='error'>".$lang['nopoints']."</div>";
               }
            }
            else
            {
               echo "<div class='error'>".$lang['errorpoints']."</div>";
               header('location:'.SITEURL.'index.php?page=rewards');
            }
      }
      else
      {
         echo "<div class='error'>".$lang['nopoints']."</div>";
      }
   }
   if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['mouth11']))
   {
      $cost = $price_4;
      $item = $mouth_11;
      if($points>$cost OR $points == $cost)
      {
         $data = "
            mouth_11='1'
         ";
         $tbl_name='tbl_rewards';
         $where = "id='$id'";
         $query = $obj->update_data($tbl_name,$data,$where);
         $res = $obj->execute_query($conn,$query);

         if($res==true)
            {
               echo "<div class='success'>".$lang['successpoints']."</div>";
               $tbl_name = 'tbl_users';
               $where = "id='$id'";
               $new_points = $points - $cost;
               $data = "
                  points='$new_points'
               ";
               $query = $obj->update_data($tbl_name,$data,$where);
               $res = $obj->execute_query($conn,$query);
               if($res==true){
                  header('location:'.SITEURL.'index.php?page=rewards');
               }
               else
               {
                  echo "<div class='error'>".$lang['nopoints']."</div>";
               }
            }
            else
            {
               echo "<div class='error'>".$lang['errorpoints']."</div>";
               header('location:'.SITEURL.'index.php?page=rewards');
            }
      }
      else
      {
         echo "<div class='error'>".$lang['nopoints']."</div>";
      }
   }
   if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['mouth12']))
   {
      $cost = $price_5;
      $item = $mouth_12;
      if($points>$cost OR $points == $cost)
      {
         $data = "
            mouth_12='1'
         ";
         $tbl_name='tbl_rewards';
         $where = "id='$id'";
         $query = $obj->update_data($tbl_name,$data,$where);
         $res = $obj->execute_query($conn,$query);

         if($res==true)
            {
               echo "<div class='success'>".$lang['successpoints']."</div>";
               $tbl_name = 'tbl_users';
               $where = "id='$id'";
               $new_points = $points - $cost;
               $data = "
                  points='$new_points'
               ";
               $query = $obj->update_data($tbl_name,$data,$where);
               $res = $obj->execute_query($conn,$query);
               if($res==true){
                  header('location:'.SITEURL.'index.php?page=rewards');
               }
               else
               {
                  echo "<div class='error'>".$lang['nopoints']."</div>";
               }
            }
            else
            {
               echo "<div class='error'>".$lang['errorpoints']."</div>";
               header('location:'.SITEURL.'index.php?page=rewards');
            }
      }
      else
      {
         echo "<div class='error'>".$lang['nopoints']."</div>";
      }
   }
   if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['mouth13']))
   {
      $cost = $price_5;
      $item = $mouth_13;
      if($points>$cost OR $points == $cost)
      {
         $data = "
            mouth_13='1'
         ";
         $tbl_name='tbl_rewards';
         $where = "id='$id'";
         $query = $obj->update_data($tbl_name,$data,$where);
         $res = $obj->execute_query($conn,$query);

         if($res==true)
            {
               echo "<div class='success'>".$lang['successpoints']."</div>";
               $tbl_name = 'tbl_users';
               $where = "id='$id'";
               $new_points = $points - $cost;
               $data = "
                  points='$new_points'
               ";
               $query = $obj->update_data($tbl_name,$data,$where);
               $res = $obj->execute_query($conn,$query);
               if($res==true){
                  header('location:'.SITEURL.'index.php?page=rewards');
               }
               else
               {
                  echo "<div class='error'>".$lang['nopoints']."</div>";
               }
            }
            else
            {
               echo "<div class='error'>".$lang['errorpoints']."</div>";
               header('location:'.SITEURL.'index.php?page=rewards');
            }
      }
      else
      {
         echo "<div class='error'>".$lang['nopoints']."</div>";
      }
   }
   if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['tshirt1']))
   {
      $cost = $price_1;
      $item = $tshirt_1;
      if($points>$cost OR $points == $cost)
      {
         $data = "
            tshirt_1='1'
         ";
         $tbl_name='tbl_rewards';
         $where = "id='$id'";
         $query = $obj->update_data($tbl_name,$data,$where);
         $res = $obj->execute_query($conn,$query);

         if($res==true)
            {
               echo "<div class='success'>".$lang['successpoints']."</div>";
               $tbl_name = 'tbl_users';
               $where = "id='$id'";
               $new_points = $points - $cost;
               $data = "
                  points='$new_points'
               ";
               $query = $obj->update_data($tbl_name,$data,$where);
               $res = $obj->execute_query($conn,$query);
               if($res==true){
                  header('location:'.SITEURL.'index.php?page=rewards');
               }
               else
               {
                  echo "<div class='error'>".$lang['nopoints']."</div>";
               }
            }
            else
            {
               echo "<div class='error'>".$lang['errorpoints']."</div>";
               header('location:'.SITEURL.'index.php?page=rewards');
            }
      }
      else
      {
         echo "<div class='error'>".$lang['nopoints']."</div>";
      }
   }
   if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['tshirt2']))
   {
      $cost = $price_1;
      $item = $tshirt_2;
      if($points>$cost OR $points == $cost)
      {
         $data = "
            tshirt_2='1'
         ";
         $tbl_name='tbl_rewards';
         $where = "id='$id'";
         $query = $obj->update_data($tbl_name,$data,$where);
         $res = $obj->execute_query($conn,$query);

         if($res==true)
            {
               echo "<div class='success'>".$lang['successpoints']."</div>";
               $tbl_name = 'tbl_users';
               $where = "id='$id'";
               $new_points = $points - $cost;
               $data = "
                  points='$new_points'
               ";
               $query = $obj->update_data($tbl_name,$data,$where);
               $res = $obj->execute_query($conn,$query);
               if($res==true){
                  header('location:'.SITEURL.'index.php?page=rewards');
               }
               else
               {
                  echo "<div class='error'>".$lang['nopoints']."</div>";
               }
            }
            else
            {
               echo "<div class='error'>".$lang['errorpoints']."</div>";
               header('location:'.SITEURL.'index.php?page=rewards');
            }
      }
      else
      {
         echo "<div class='error'>".$lang['nopoints']."</div>";
      }
   }
   if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['tshirt3']))
   {
      $cost = $price_1;
      $item = $tshirt_3;
      if($points>$cost OR $points == $cost)
      {
         $data = "
            tshirt_3='1'
         ";
         $tbl_name='tbl_rewards';
         $where = "id='$id'";
         $query = $obj->update_data($tbl_name,$data,$where);
         $res = $obj->execute_query($conn,$query);

         if($res==true)
            {
               echo "<div class='success'>".$lang['successpoints']."</div>";
               $tbl_name = 'tbl_users';
               $where = "id='$id'";
               $new_points = $points - $cost;
               $data = "
                  points='$new_points'
               ";
               $query = $obj->update_data($tbl_name,$data,$where);
               $res = $obj->execute_query($conn,$query);
               if($res==true){
                  header('location:'.SITEURL.'index.php?page=rewards');
               }
               else
               {
                  echo "<div class='error'>".$lang['nopoints']."</div>";
               }
            }
            else
            {
               echo "<div class='error'>".$lang['errorpoints']."</div>";
               header('location:'.SITEURL.'index.php?page=rewards');
            }
      }
      else
      {
         echo "<div class='error'>".$lang['nopoints']."</div>";
      }
   }
   if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['tshirt4']))
   {
      $cost = $price_1;
      $item = $tshirt_4;
      if($points>$cost OR $points == $cost)
      {
         $data = "
            tshirt_4='1'
         ";
         $tbl_name='tbl_rewards';
         $where = "id='$id'";
         $query = $obj->update_data($tbl_name,$data,$where);
         $res = $obj->execute_query($conn,$query);

         if($res==true)
            {
               echo "<div class='success'>".$lang['successpoints']."</div>";
               $tbl_name = 'tbl_users';
               $where = "id='$id'";
               $new_points = $points - $cost;
               $data = "
                  points='$new_points'
               ";
               $query = $obj->update_data($tbl_name,$data,$where);
               $res = $obj->execute_query($conn,$query);
               if($res==true){
                  header('location:'.SITEURL.'index.php?page=rewards');
               }
               else
               {
                  echo "<div class='error'>".$lang['nopoints']."</div>";
               }
            }
            else
            {
               echo "<div class='error'>".$lang['errorpoints']."</div>";
               header('location:'.SITEURL.'index.php?page=rewards');
            }
      }
      else
      {
         echo "<div class='error'>".$lang['nopoints']."</div>";
      }
   }
   if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['tshirt5']))
   {
      $cost = $price_1;
      $item = $tshirt_5;
      if($points>$cost OR $points == $cost)
      {
         $data = "
            tshirt_5='1'
         ";
         $tbl_name='tbl_rewards';
         $where = "id='$id'";
         $query = $obj->update_data($tbl_name,$data,$where);
         $res = $obj->execute_query($conn,$query);

         if($res==true)
            {
               echo "<div class='success'>".$lang['successpoints']."</div>";
               $tbl_name = 'tbl_users';
               $where = "id='$id'";
               $new_points = $points - $cost;
               $data = "
                  points='$new_points'
               ";
               $query = $obj->update_data($tbl_name,$data,$where);
               $res = $obj->execute_query($conn,$query);
               if($res==true){
                  header('location:'.SITEURL.'index.php?page=rewards');
               }
               else
               {
                  echo "<div class='error'>".$lang['nopoints']."</div>";
               }
            }
            else
            {
               echo "<div class='error'>".$lang['errorpoints']."</div>";
               header('location:'.SITEURL.'index.php?page=rewards');
            }
      }
      else
      {
         echo "<div class='error'>".$lang['nopoints']."</div>";
      }
   }
   if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['tshirt6']))
   {
      $cost = $price_1;
      $item = $tshirt_6;
      if($points>$cost OR $points == $cost)
      {
         $data = "
            tshirt_6='1'
         ";
         $tbl_name='tbl_rewards';
         $where = "id='$id'";
         $query = $obj->update_data($tbl_name,$data,$where);
         $res = $obj->execute_query($conn,$query);

         if($res==true)
            {
               echo "<div class='success'>".$lang['successpoints']."</div>";
               $tbl_name = 'tbl_users';
               $where = "id='$id'";
               $new_points = $points - $cost;
               $data = "
                  points='$new_points'
               ";
               $query = $obj->update_data($tbl_name,$data,$where);
               $res = $obj->execute_query($conn,$query);
               if($res==true){
                  header('location:'.SITEURL.'index.php?page=rewards');
               }
               else
               {
                  echo "<div class='error'>".$lang['nopoints']."</div>";
               }
            }
            else
            {
               echo "<div class='error'>".$lang['errorpoints']."</div>";
               header('location:'.SITEURL.'index.php?page=rewards');
            }
      }
      else
      {
         echo "<div class='error'>".$lang['nopoints']."</div>";
      }
   }
   if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['tshirt7']))
   {
      $cost = $price_2;
      $item = $tshirt_7;
      if($points>$cost OR $points == $cost)
      {
         $data = "
            tshirt_7='1'
         ";
         $tbl_name='tbl_rewards';
         $where = "id='$id'";
         $query = $obj->update_data($tbl_name,$data,$where);
         $res = $obj->execute_query($conn,$query);

         if($res==true)
            {
               echo "<div class='success'>".$lang['successpoints']."</div>";
               $tbl_name = 'tbl_users';
               $where = "id='$id'";
               $new_points = $points - $cost;
               $data = "
                  points='$new_points'
               ";
               $query = $obj->update_data($tbl_name,$data,$where);
               $res = $obj->execute_query($conn,$query);
               if($res==true){
                  header('location:'.SITEURL.'index.php?page=rewards');
               }
               else
               {
                  echo "<div class='error'>".$lang['nopoints']."</div>";
               }
            }
            else
            {
               echo "<div class='error'>".$lang['errorpoints']."</div>";
               header('location:'.SITEURL.'index.php?page=rewards');
            }
      }
      else
      {
         echo "<div class='error'>".$lang['nopoints']."</div>";
      }
   }
   if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['tshirt8']))
   {
      $cost = $price_2;
      $item = $tshirt_8;
      if($points>$cost OR $points == $cost)
      {
         $data = "
            tshirt_8='1'
         ";
         $tbl_name='tbl_rewards';
         $where = "id='$id'";
         $query = $obj->update_data($tbl_name,$data,$where);
         $res = $obj->execute_query($conn,$query);

         if($res==true)
            {
               echo "<div class='success'>".$lang['successpoints']."</div>";
               $tbl_name = 'tbl_users';
               $where = "id='$id'";
               $new_points = $points - $cost;
               $data = "
                  points='$new_points'
               ";
               $query = $obj->update_data($tbl_name,$data,$where);
               $res = $obj->execute_query($conn,$query);
               if($res==true){
                  header('location:'.SITEURL.'index.php?page=rewards');
               }
               else
               {
                  echo "<div class='error'>".$lang['nopoints']."</div>";
               }
            }
            else
            {
               echo "<div class='error'>".$lang['errorpoints']."</div>";
               header('location:'.SITEURL.'index.php?page=rewards');
            }
      }
      else
      {
         echo "<div class='error'>".$lang['nopoints']."</div>";
      }
   }
   if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['tshirt9']))
   {
      $cost = $price_3;
      $item = $tshirt_9;
      if($points>$cost OR $points == $cost)
      {
         $data = "
            tshirt_9='1'
         ";
         $tbl_name='tbl_rewards';
         $where = "id='$id'";
         $query = $obj->update_data($tbl_name,$data,$where);
         $res = $obj->execute_query($conn,$query);

         if($res==true)
            {
               echo "<div class='success'>".$lang['successpoints']."</div>";
               $tbl_name = 'tbl_users';
               $where = "id='$id'";
               $new_points = $points - $cost;
               $data = "
                  points='$new_points'
               ";
               $query = $obj->update_data($tbl_name,$data,$where);
               $res = $obj->execute_query($conn,$query);
               if($res==true){
                  header('location:'.SITEURL.'index.php?page=rewards');
               }
               else
               {
                  echo "<div class='error'>".$lang['nopoints']."</div>";
               }
            }
            else
            {
               echo "<div class='error'>".$lang['errorpoints']."</div>";
               header('location:'.SITEURL.'index.php?page=rewards');
            }
      }
      else
      {
         echo "<div class='error'>".$lang['nopoints']."</div>";
      }
   }
   if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['pants1']))
   {
      $cost = $price_1;
      $item = $pants_1;
      if($points>$cost OR $points == $cost)
      {
         $data = "
            pants_1='1'
         ";
         $tbl_name='tbl_rewards';
         $where = "id='$id'";
         $query = $obj->update_data($tbl_name,$data,$where);
         $res = $obj->execute_query($conn,$query);

         if($res==true)
            {
               echo "<div class='success'>".$lang['successpoints']."</div>";
               $tbl_name = 'tbl_users';
               $where = "id='$id'";
               $new_points = $points - $cost;
               $data = "
                  points='$new_points'
               ";
               $query = $obj->update_data($tbl_name,$data,$where);
               $res = $obj->execute_query($conn,$query);
               if($res==true){
                  header('location:'.SITEURL.'index.php?page=rewards');
               }
               else
               {
                  echo "<div class='error'>".$lang['nopoints']."</div>";
               }
            }
            else
            {
               echo "<div class='error'>".$lang['errorpoints']."</div>";
               header('location:'.SITEURL.'index.php?page=rewards');
            }
      }
      else
      {
         echo "<div class='error'>".$lang['nopoints']."</div>";
      }
   }
   if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['pants2']))
   {
      $cost = $price_1;
      $item = $pants_2;
      if($points>$cost OR $points == $cost)
      {
         $data = "
            pants_2='1'
         ";
         $tbl_name='tbl_rewards';
         $where = "id='$id'";
         $query = $obj->update_data($tbl_name,$data,$where);
         $res = $obj->execute_query($conn,$query);

         if($res==true)
            {
               echo "<div class='success'>".$lang['successpoints']."</div>";
               $tbl_name = 'tbl_users';
               $where = "id='$id'";
               $new_points = $points - $cost;
               $data = "
                  points='$new_points'
               ";
               $query = $obj->update_data($tbl_name,$data,$where);
               $res = $obj->execute_query($conn,$query);
               if($res==true){
                  header('location:'.SITEURL.'index.php?page=rewards');
               }
               else
               {
                  echo "<div class='error'>".$lang['nopoints']."</div>";
               }
            }
            else
            {
               echo "<div class='error'>".$lang['errorpoints']."</div>";
               header('location:'.SITEURL.'index.php?page=rewards');
            }
      }
      else
      {
         echo "<div class='error'>".$lang['nopoints']."</div>";
      }
   }
   if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['pants3']))
   {
      $cost = $price_1;
      $item = $pants_3;
      if($points>$cost OR $points == $cost)
      {
         $data = "
            pants_3='1'
         ";
         $tbl_name='tbl_rewards';
         $where = "id='$id'";
         $query = $obj->update_data($tbl_name,$data,$where);
         $res = $obj->execute_query($conn,$query);

         if($res==true)
            {
               echo "<div class='success'>".$lang['successpoints']."</div>";
               $tbl_name = 'tbl_users';
               $where = "id='$id'";
               $new_points = $points - $cost;
               $data = "
                  points='$new_points'
               ";
               $query = $obj->update_data($tbl_name,$data,$where);
               $res = $obj->execute_query($conn,$query);
               if($res==true){
                  header('location:'.SITEURL.'index.php?page=rewards');
               }
               else
               {
                  echo "<div class='error'>".$lang['nopoints']."</div>";
               }
            }
            else
            {
               echo "<div class='error'>".$lang['errorpoints']."</div>";
               header('location:'.SITEURL.'index.php?page=rewards');
            }
      }
      else
      {
         echo "<div class='error'>".$lang['nopoints']."</div>";
      }
   }
   if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['pants4']))
   {
      $cost = $price_1;
      $item = $pants_4;
      if($points>$cost OR $points == $cost)
      {
         $data = "
            pants_4='1'
         ";
         $tbl_name='tbl_rewards';
         $where = "id='$id'";
         $query = $obj->update_data($tbl_name,$data,$where);
         $res = $obj->execute_query($conn,$query);

         if($res==true)
            {
               echo "<div class='success'>".$lang['successpoints']."</div>";
               $tbl_name = 'tbl_users';
               $where = "id='$id'";
               $new_points = $points - $cost;
               $data = "
                  points='$new_points'
               ";
               $query = $obj->update_data($tbl_name,$data,$where);
               $res = $obj->execute_query($conn,$query);
               if($res==true){
                  header('location:'.SITEURL.'index.php?page=rewards');
               }
               else
               {
                  echo "<div class='error'>".$lang['nopoints']."</div>";
               }
            }
            else
            {
               echo "<div class='error'>".$lang['errorpoints']."</div>";
               header('location:'.SITEURL.'index.php?page=rewards');
            }
      }
      else
      {
         echo "<div class='error'>".$lang['nopoints']."</div>";
      }
   }
   if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['pants5']))
   {
      $cost = $price_1;
      $item = $pants_5;
      if($points>$cost OR $points == $cost)
      {
         $data = "
            pants_5='1'
         ";
         $tbl_name='tbl_rewards';
         $where = "id='$id'";
         $query = $obj->update_data($tbl_name,$data,$where);
         $res = $obj->execute_query($conn,$query);

         if($res==true)
            {
               echo "<div class='success'>".$lang['successpoints']."</div>";
               $tbl_name = 'tbl_users';
               $where = "id='$id'";
               $new_points = $points - $cost;
               $data = "
                  points='$new_points'
               ";
               $query = $obj->update_data($tbl_name,$data,$where);
               $res = $obj->execute_query($conn,$query);
               if($res==true){
                  header('location:'.SITEURL.'index.php?page=rewards');
               }
               else
               {
                  echo "<div class='error'>".$lang['nopoints']."</div>";
               }
            }
            else
            {
               echo "<div class='error'>".$lang['errorpoints']."</div>";
               header('location:'.SITEURL.'index.php?page=rewards');
            }
      }
      else
      {
         echo "<div class='error'>".$lang['nopoints']."</div>";
      }
   }
   if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['pants6']))
   {
      $cost = $price_1;
      $item = $pants_6;
      if($points>$cost OR $points == $cost)
      {
         $data = "
            pants_6='1'
         ";
         $tbl_name='tbl_rewards';
         $where = "id='$id'";
         $query = $obj->update_data($tbl_name,$data,$where);
         $res = $obj->execute_query($conn,$query);

         if($res==true)
            {
               echo "<div class='success'>".$lang['successpoints']."</div>";
               $tbl_name = 'tbl_users';
               $where = "id='$id'";
               $new_points = $points - $cost;
               $data = "
                  points='$new_points'
               ";
               $query = $obj->update_data($tbl_name,$data,$where);
               $res = $obj->execute_query($conn,$query);
               if($res==true){
                  header('location:'.SITEURL.'index.php?page=rewards');
               }
               else
               {
                  echo "<div class='error'>".$lang['nopoints']."</div>";
               }
            }
            else
            {
               echo "<div class='error'>".$lang['errorpoints']."</div>";
               header('location:'.SITEURL.'index.php?page=rewards');
            }
      }
      else
      {
         echo "<div class='error'>".$lang['nopoints']."</div>";
      }
   }
   if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['pants7']))
   {
      $cost = $price_2;
      $item = $pants_7;
      if($points>$cost OR $points == $cost)
      {
         $data = "
            pants_7='1'
         ";
         $tbl_name='tbl_rewards';
         $where = "id='$id'";
         $query = $obj->update_data($tbl_name,$data,$where);
         $res = $obj->execute_query($conn,$query);

         if($res==true)
            {
               echo "<div class='success'>".$lang['successpoints']."</div>";
               $tbl_name = 'tbl_users';
               $where = "id='$id'";
               $new_points = $points - $cost;
               $data = "
                  points='$new_points'
               ";
               $query = $obj->update_data($tbl_name,$data,$where);
               $res = $obj->execute_query($conn,$query);
               if($res==true){
                  header('location:'.SITEURL.'index.php?page=rewards');
               }
               else
               {
                  echo "<div class='error'>".$lang['nopoints']."</div>";
               }
            }
            else
            {
               echo "<div class='error'>".$lang['errorpoints']."</div>";
               header('location:'.SITEURL.'index.php?page=rewards');
            }
      }
      else
      {
         echo "<div class='error'>".$lang['nopoints']."</div>";
      }
   }
   if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['pants8']))
   {
      $cost = $price_2;
      $item = $pants_8;
      if($points>$cost OR $points == $cost)
      {
         $data = "
            pants_8='1'
         ";
         $tbl_name='tbl_rewards';
         $where = "id='$id'";
         $query = $obj->update_data($tbl_name,$data,$where);
         $res = $obj->execute_query($conn,$query);

         if($res==true)
            {
               echo "<div class='success'>".$lang['successpoints']."</div>";
               $tbl_name = 'tbl_users';
               $where = "id='$id'";
               $new_points = $points - $cost;
               $data = "
                  points='$new_points'
               ";
               $query = $obj->update_data($tbl_name,$data,$where);
               $res = $obj->execute_query($conn,$query);
               if($res==true){
                  header('location:'.SITEURL.'index.php?page=rewards');
               }
               else
               {
                  echo "<div class='error'>".$lang['nopoints']."</div>";
               }
            }
            else
            {
               echo "<div class='error'>".$lang['errorpoints']."</div>";
               header('location:'.SITEURL.'index.php?page=rewards');
            }
      }
      else
      {
         echo "<div class='error'>".$lang['nopoints']."</div>";
      }
   }
   if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['shoes1']))
   {
      $cost = $price_1;
      $item = $shoes_1;
      if($points>$cost OR $points == $cost)
      {
         $data = "
            shoes_1='1'
         ";
         $tbl_name='tbl_rewards';
         $where = "id='$id'";
         $query = $obj->update_data($tbl_name,$data,$where);
         $res = $obj->execute_query($conn,$query);

         if($res==true)
            {
               echo "<div class='success'>".$lang['successpoints']."</div>";
               $tbl_name = 'tbl_users';
               $where = "id='$id'";
               $new_points = $points - $cost;
               $data = "
                  points='$new_points'
               ";
               $query = $obj->update_data($tbl_name,$data,$where);
               $res = $obj->execute_query($conn,$query);
               if($res==true){
                  header('location:'.SITEURL.'index.php?page=rewards');
               }
               else
               {
                  echo "<div class='error'>".$lang['nopoints']."</div>";
               }
            }
            else
            {
               echo "<div class='error'>".$lang['errorpoints']."</div>";
               header('location:'.SITEURL.'index.php?page=rewards');
            }
      }
      else
      {
         echo "<div class='error'>".$lang['nopoints']."</div>";
      }
   }
   if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['shoes2']))
   {
      $cost = $price_1;
      $item = $shoes_2;
      if($points>$cost OR $points == $cost)
      {
         $data = "
            shoes_2='1'
         ";
         $tbl_name='tbl_rewards';
         $where = "id='$id'";
         $query = $obj->update_data($tbl_name,$data,$where);
         $res = $obj->execute_query($conn,$query);

         if($res==true)
            {
               echo "<div class='success'>".$lang['successpoints']."</div>";
               $tbl_name = 'tbl_users';
               $where = "id='$id'";
               $new_points = $points - $cost;
               $data = "
                  points='$new_points'
               ";
               $query = $obj->update_data($tbl_name,$data,$where);
               $res = $obj->execute_query($conn,$query);
               if($res==true){
                  header('location:'.SITEURL.'index.php?page=rewards');
               }
               else
               {
                  echo "<div class='error'>".$lang['nopoints']."</div>";
               }
            }
            else
            {
               echo "<div class='error'>".$lang['errorpoints']."</div>";
               header('location:'.SITEURL.'index.php?page=rewards');
            }
      }
      else
      {
         echo "<div class='error'>".$lang['nopoints']."</div>";
      }
   }
   if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['shoes3']))
   {
      $cost = $price_1;
      $item = $shoes_3;
      if($points>$cost OR $points == $cost)
      {
         $data = "
            shoes_3='1'
         ";
         $tbl_name='tbl_rewards';
         $where = "id='$id'";
         $query = $obj->update_data($tbl_name,$data,$where);
         $res = $obj->execute_query($conn,$query);

         if($res==true)
            {
               echo "<div class='success'>".$lang['successpoints']."</div>";
               $tbl_name = 'tbl_users';
               $where = "id='$id'";
               $new_points = $points - $cost;
               $data = "
                  points='$new_points'
               ";
               $query = $obj->update_data($tbl_name,$data,$where);
               $res = $obj->execute_query($conn,$query);
               if($res==true){
                  header('location:'.SITEURL.'index.php?page=rewards');
               }
               else
               {
                  echo "<div class='error'>".$lang['nopoints']."</div>";
               }
            }
            else
            {
               echo "<div class='error'>".$lang['errorpoints']."</div>";
               header('location:'.SITEURL.'index.php?page=rewards');
            }
      }
      else
      {
         echo "<div class='error'>".$lang['nopoints']."</div>";
      }
   }
   if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['shoes4']))
   {
      $cost = $price_1;
      $item = $shoes_4;
      if($points>$cost OR $points == $cost)
      {
         $data = "
            shoes_4='1'
         ";
         $tbl_name='tbl_rewards';
         $where = "id='$id'";
         $query = $obj->update_data($tbl_name,$data,$where);
         $res = $obj->execute_query($conn,$query);

         if($res==true)
            {
               echo "<div class='success'>".$lang['successpoints']."</div>";
               $tbl_name = 'tbl_users';
               $where = "id='$id'";
               $new_points = $points - $cost;
               $data = "
                  points='$new_points'
               ";
               $query = $obj->update_data($tbl_name,$data,$where);
               $res = $obj->execute_query($conn,$query);
               if($res==true){
                  header('location:'.SITEURL.'index.php?page=rewards');
               }
               else
               {
                  echo "<div class='error'>".$lang['nopoints']."</div>";
               }
            }
            else
            {
               echo "<div class='error'>".$lang['errorpoints']."</div>";
               header('location:'.SITEURL.'index.php?page=rewards');
            }
      }
      else
      {
         echo "<div class='error'>".$lang['nopoints']."</div>";
      }
   }
   if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['shoes5']))
   {
      $cost = $price_1;
      $item = $shoes_5;
      if($points>$cost OR $points == $cost)
      {
         $data = "
            shoes_5='1'
         ";
         $tbl_name='tbl_rewards';
         $where = "id='$id'";
         $query = $obj->update_data($tbl_name,$data,$where);
         $res = $obj->execute_query($conn,$query);

         if($res==true)
            {
               echo "<div class='success'>".$lang['successpoints']."</div>";
               $tbl_name = 'tbl_users';
               $where = "id='$id'";
               $new_points = $points - $cost;
               $data = "
                  points='$new_points'
               ";
               $query = $obj->update_data($tbl_name,$data,$where);
               $res = $obj->execute_query($conn,$query);
               if($res==true){
                  header('location:'.SITEURL.'index.php?page=rewards');
               }
               else
               {
                  echo "<div class='error'>".$lang['nopoints']."</div>";
               }
            }
            else
            {
               echo "<div class='error'>".$lang['errorpoints']."</div>";
               header('location:'.SITEURL.'index.php?page=rewards');
            }
      }
      else
      {
         echo "<div class='error'>".$lang['nopoints']."</div>";
      }
   }
   if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['shoes6']))
   {
      $cost = $price_1;
      $item = $shoes_6;
      if($points>$cost OR $points == $cost)
      {
         $data = "
            shoes_6='1'
         ";
         $tbl_name='tbl_rewards';
         $where = "id='$id'";
         $query = $obj->update_data($tbl_name,$data,$where);
         $res = $obj->execute_query($conn,$query);

         if($res==true)
            {
               echo "<div class='success'>".$lang['successpoints']."</div>";
               $tbl_name = 'tbl_users';
               $where = "id='$id'";
               $new_points = $points - $cost;
               $data = "
                  points='$new_points'
               ";
               $query = $obj->update_data($tbl_name,$data,$where);
               $res = $obj->execute_query($conn,$query);
               if($res==true){
                  header('location:'.SITEURL.'index.php?page=rewards');
               }
               else
               {
                  echo "<div class='error'>".$lang['nopoints']."</div>";
               }
            }
            else
            {
               echo "<div class='error'>".$lang['errorpoints']."</div>";
               header('location:'.SITEURL.'index.php?page=rewards');
            }
      }
      else
      {
         echo "<div class='error'>".$lang['nopoints']."</div>";
      }
   }
   if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['shoes7']))
   {
      $cost = $price_2;
      $item = $shoes_7;
      if($points>$cost OR $points == $cost)
      {
         $data = "
            shoes_7='1'
         ";
         $tbl_name='tbl_rewards';
         $where = "id='$id'";
         $query = $obj->update_data($tbl_name,$data,$where);
         $res = $obj->execute_query($conn,$query);

         if($res==true)
            {
               echo "<div class='success'>".$lang['successpoints']."</div>";
               $tbl_name = 'tbl_users';
               $where = "id='$id'";
               $new_points = $points - $cost;
               $data = "
                  points='$new_points'
               ";
               $query = $obj->update_data($tbl_name,$data,$where);
               $res = $obj->execute_query($conn,$query);
               if($res==true){
                  header('location:'.SITEURL.'index.php?page=rewards');
               }
               else
               {
                  echo "<div class='error'>".$lang['nopoints']."</div>";
               }
            }
            else
            {
               echo "<div class='error'>".$lang['errorpoints']."</div>";
               header('location:'.SITEURL.'index.php?page=rewards');
            }
      }
      else
      {
         echo "<div class='error'>".$lang['nopoints']."</div>";
      }
   }
   if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['shoes8']))
   {
      $cost = $price_2;
      $item = $shoes_8;
      if($points>$cost OR $points == $cost)
      {
         $data = "
            shoes_8='1'
         ";
         $tbl_name='tbl_rewards';
         $where = "id='$id'";
         $query = $obj->update_data($tbl_name,$data,$where);
         $res = $obj->execute_query($conn,$query);

         if($res==true)
            {
               echo "<div class='success'>".$lang['successpoints']."</div>";
               $tbl_name = 'tbl_users';
               $where = "id='$id'";
               $new_points = $points - $cost;
               $data = "
                  points='$new_points'
               ";
               $query = $obj->update_data($tbl_name,$data,$where);
               $res = $obj->execute_query($conn,$query);
               if($res==true){
                  header('location:'.SITEURL.'index.php?page=rewards');
               }
               else
               {
                  echo "<div class='error'>".$lang['nopoints']."</div>";
               }
            }
            else
            {
               echo "<div class='error'>".$lang['errorpoints']."</div>";
               header('location:'.SITEURL.'index.php?page=rewards');
            }
      }
      else
      {
         echo "<div class='error'>".$lang['nopoints']."</div>";
      }
   }
   if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['shoes9']))
   {
      $cost = $price_3;
      $item = $shoes_9;
      if($points>$cost OR $points == $cost)
      {
         $data = "
            shoes_9='1'
         ";
         $tbl_name='tbl_rewards';
         $where = "id='$id'";
         $query = $obj->update_data($tbl_name,$data,$where);
         $res = $obj->execute_query($conn,$query);

         if($res==true)
            {
               echo "<div class='success'>".$lang['successpoints']."</div>";
               $tbl_name = 'tbl_users';
               $where = "id='$id'";
               $new_points = $points - $cost;
               $data = "
                  points='$new_points'
               ";
               $query = $obj->update_data($tbl_name,$data,$where);
               $res = $obj->execute_query($conn,$query);
               if($res==true){
                  header('location:'.SITEURL.'index.php?page=rewards');
               }
               else
               {
                  echo "<div class='error'>".$lang['nopoints']."</div>";
               }
            }
            else
            {
               echo "<div class='error'>".$lang['errorpoints']."</div>";
               header('location:'.SITEURL.'index.php?page=rewards');
            }
      }
      else
      {
         echo "<div class='error'>".$lang['nopoints']."</div>";
      }
   }
   if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['shoes10']))
   {
      $cost = $price_3;
      $item = $shoes_10;
      if($points>$cost OR $points == $cost)
      {
         $data = "
            shoes_10='1'
         ";
         $tbl_name='tbl_rewards';
         $where = "id='$id'";
         $query = $obj->update_data($tbl_name,$data,$where);
         $res = $obj->execute_query($conn,$query);

         if($res==true)
            {
               echo "<div class='success'>".$lang['successpoints']."</div>";
               $tbl_name = 'tbl_users';
               $where = "id='$id'";
               $new_points = $points - $cost;
               $data = "
                  points='$new_points'
               ";
               $query = $obj->update_data($tbl_name,$data,$where);
               $res = $obj->execute_query($conn,$query);
               if($res==true){
                  header('location:'.SITEURL.'index.php?page=rewards');
               }
               else
               {
                  echo "<div class='error'>".$lang['nopoints']."</div>";
               }
            }
            else
            {
               echo "<div class='error'>".$lang['errorpoints']."</div>";
               header('location:'.SITEURL.'index.php?page=rewards');
            }
      }
      else
      {
         echo "<div class='error'>".$lang['nopoints']."</div>";
      }
   }
   if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['shoes11']))
   {
      $cost = $price_4;
      $item = $shoes_11;
      if($points>$cost OR $points == $cost)
      {
         $data = "
            shoes_11='1'
         ";
         $tbl_name='tbl_rewards';
         $where = "id='$id'";
         $query = $obj->update_data($tbl_name,$data,$where);
         $res = $obj->execute_query($conn,$query);

         if($res==true)
            {
               echo "<div class='success'>".$lang['successpoints']."</div>";
               $tbl_name = 'tbl_users';
               $where = "id='$id'";
               $new_points = $points - $cost;
               $data = "
                  points='$new_points'
               ";
               $query = $obj->update_data($tbl_name,$data,$where);
               $res = $obj->execute_query($conn,$query);
               if($res==true){
                  header('location:'.SITEURL.'index.php?page=rewards');
               }
               else
               {
                  echo "<div class='error'>".$lang['nopoints']."</div>";
               }
            }
            else
            {
               echo "<div class='error'>".$lang['errorpoints']."</div>";
               header('location:'.SITEURL.'index.php?page=rewards');
            }
      }
      else
      {
         echo "<div class='error'>".$lang['nopoints']."</div>";
      }
   }
   if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['shoes12']))
   {
      $cost = $price_5;
      $item = $shoes_12;
      if($points>$cost OR $points == $cost)
      {
         $data = "
            shoes_12='1'
         ";
         $tbl_name='tbl_rewards';
         $where = "id='$id'";
         $query = $obj->update_data($tbl_name,$data,$where);
         $res = $obj->execute_query($conn,$query);

         if($res==true)
            {
               echo "<div class='success'>".$lang['successpoints']."</div>";
               $tbl_name = 'tbl_users';
               $where = "id='$id'";
               $new_points = $points - $cost;
               $data = "
                  points='$new_points'
               ";
               $query = $obj->update_data($tbl_name,$data,$where);
               $res = $obj->execute_query($conn,$query);
               if($res==true){
                  header('location:'.SITEURL.'index.php?page=rewards');
               }
               else
               {
                  echo "<div class='error'>".$lang['nopoints']."</div>";
               }
            }
            else
            {
               echo "<div class='error'>".$lang['errorpoints']."</div>";
               header('location:'.SITEURL.'index.php?page=rewards');
            }
      }
      else
      {
         echo "<div class='error'>".$lang['nopoints']."</div>";
      }
   }
?>
</div>
<div class="body">
<div style="overflow-x:auto;">
<table>
   <tr>
   <?php $sn = 0; ?>
      <td style="font-weight: bold;font-size: large;color: #5680e9;" rowspan="4"><?php echo $lang['avatarhat'] ?></td>
      <td><?php echo $lang['generalstyle'].$sn++ ?></td>
      <td><?php echo $lang['generalstyle'].$sn++ ?></td>
      <td><?php echo $lang['generalstyle'].$sn++ ?></td>
      <td><?php echo $lang['generalstyle'].$sn++ ?></td>
      <td><?php echo $lang['generalstyle'].$sn++ ?></td>
      <td><?php echo $lang['generalstyle'].$sn++ ?></td>
      <td><?php echo $lang['generalstyle'].$sn++ ?></td>
      <td><?php echo $lang['generalstyle'].$sn++ ?></td>
      <td><?php echo $lang['generalstyle'].$sn++ ?></td>
      <td><?php echo $lang['generalstyle'].$sn++ ?></td>
      <td><?php echo $lang['generalstyle'].$sn++ ?></td>
      <td><?php echo $lang['generalstyle'].$sn++ ?></td>
      <td><?php echo $lang['generalstyle'].$sn++ ?></td>
   </tr>
   <tr>
      <td><?php echo '<img height=200 width=150 src="assets/img/avatar_assets/Hair/hair_0.png">'; ?></td>
      <td><?php echo '<img height=200 width=150 src="assets/img/avatar_assets/Hair/hair_1.png">'; ?></td>
      <td><?php echo '<img height=200 width=150 src="assets/img/avatar_assets/Hair/hair_2.png">'; ?></td>
      <td><?php echo '<img height=200 width=150 src="assets/img/avatar_assets/Hair/hair_3.png">'; ?></td>
      <td><?php echo '<img height=200 width=150 src="assets/img/avatar_assets/Hair/hair_4.png">'; ?></td>
      <td><?php echo '<img height=200 width=150 src="assets/img/avatar_assets/Hair/hair_5.png">'; ?></td>
      <td><?php echo '<img height=200 width=150 src="assets/img/avatar_assets/Hair/hair_6.png">'; ?></td>
      <td><?php echo '<img height=200 width=150 src="assets/img/avatar_assets/Hair/hair_7.png">'; ?></td>
      <td><?php echo '<img height=200 width=150 src="assets/img/avatar_assets/Hair/hair_8.png">'; ?></td>
      <td><?php echo '<img height=200 width=150 src="assets/img/avatar_assets/Hair/hair_9.png">'; ?></td>
      <td><?php echo '<img height=200 width=150 src="assets/img/avatar_assets/Hair/hair_10.png">'; ?></td>
      <td><?php echo '<img height=200 width=150 src="assets/img/avatar_assets/Hair/hair_11.png">'; ?></td>
      <td><?php echo '<img height=200 width=150 src="assets/img/avatar_assets/Hair/hair_12.png">'; ?></td>
   </tr>
   <tr>
      <td><output><?php echo $lang['itemowned']; ?></output></td>
      <td><?php if($hair_1 != 1) { echo '<output>'.$lang['itemnotowned'].'</output>'.'<br>'.'<output>'.$lang['cost'].$price_1.$lang['pct'].'</output>'; } else { echo '<output>'.$lang['itemowned'].'</output>'; } ?></td>
      <td><?php if($hair_2 != 1) { echo '<output>'.$lang['itemnotowned'].'</output>'.'<br>'.'<output>'.$lang['cost'].$price_1.$lang['pct'].'</output>'; } else { echo '<output>'.$lang['itemowned'].'</output>'; } ?></td>
      <td><?php if($hair_3 != 1) { echo '<output>'.$lang['itemnotowned'].'</output>'.'<br>'.'<output>'.$lang['cost'].$price_1.$lang['pct'].'</output>'; } else { echo '<output>'.$lang['itemowned'].'</output>'; } ?></td>
      <td><?php if($hair_4 != 1) { echo '<output>'.$lang['itemnotowned'].'</output>'.'<br>'.'<output>'.$lang['cost'].$price_1.$lang['pct'].'</output>'; } else { echo '<output>'.$lang['itemowned'].'</output>'; } ?></td>
      <td><?php if($hair_5 != 1) { echo '<output>'.$lang['itemnotowned'].'</output>'.'<br>'.'<output>'.$lang['cost'].$price_1.$lang['pct'].'</output>'; } else { echo '<output>'.$lang['itemowned'].'</output>'; } ?></td>
      <td><?php if($hair_6 != 1) { echo '<output>'.$lang['itemnotowned'].'</output>'.'<br>'.'<output>'.$lang['cost'].$price_1.$lang['pct'].'</output>'; } else { echo '<output>'.$lang['itemowned'].'</output>'; } ?></td>
      <td><?php if($hair_7 != 1) { echo '<output>'.$lang['itemnotowned'].'</output>'.'<br>'.'<output>'.$lang['cost'].$price_2.$lang['pct'].'</output>'; } else { echo '<output>'.$lang['itemowned'].'</output>'; } ?></td>
      <td><?php if($hair_8 != 1) { echo '<output>'.$lang['itemnotowned'].'</output>'.'<br>'.'<output>'.$lang['cost'].$price_2.$lang['pct'].'</output>'; } else { echo '<output>'.$lang['itemowned'].'</output>'; } ?></td>
      <td><?php if($hair_9 != 1) { echo '<output>'.$lang['itemnotowned'].'</output>'.'<br>'.'<output>'.$lang['cost'].$price_3.$lang['pct'].'</output>'; } else { echo '<output>'.$lang['itemowned'].'</output>'; } ?></td>
      <td><?php if($hair_10 != 1) { echo '<output>'.$lang['itemnotowned'].'</output>'.'<br>'.'<output>'.$lang['cost'].$price_3.$lang['pct'].'</output>'; } else { echo '<output>'.$lang['itemowned'].'</output>'; } ?></td>
      <td><?php if($hair_11 != 1) { echo '<output>'.$lang['itemnotowned'].'</output>'.'<br>'.'<output>'.$lang['cost'].$price_4.$lang['pct'].'</output>'; } else { echo '<output>'.$lang['itemowned'].'</output>'; } ?></td>
      <td><?php if($hair_12 != 1) { echo '<output>'.$lang['itemnotowned'].'</output>'.'<br>'.'<output>'.$lang['cost'].$price_5.$lang['pct'].'</output>'; } else { echo '<output>'.$lang['itemowned'].'</output>'; } ?></td>
   </tr>
   <tr>
   <form method="post">
      <td></td>
      <td><?php if($hair_1 != 1) { echo '<input class="btn-primary btn-md full" type="submit" name="hair1" value='.$lang['btn_buy'].'>'; } ?></td>
      <td><?php if($hair_2 != 1) { echo '<input class="btn-primary btn-md full" type="submit" name="hair2" value='.$lang['btn_buy'].'>'; } ?></td>
      <td><?php if($hair_3 != 1) { echo '<input class="btn-primary btn-md full" type="submit" name="hair3" value='.$lang['btn_buy'].'>'; } ?></td>
      <td><?php if($hair_4 != 1) { echo '<input class="btn-primary btn-md full" type="submit" name="hair4" value='.$lang['btn_buy'].'>'; } ?></td>
      <td><?php if($hair_5 != 1) { echo '<input class="btn-primary btn-md full" type="submit" name="hair5" value='.$lang['btn_buy'].'>'; } ?></td>
      <td><?php if($hair_6 != 1) { echo '<input class="btn-primary btn-md full" type="submit" name="hair6" value='.$lang['btn_buy'].'>'; } ?></td>
      <td><?php if($hair_7 != 1) { echo '<input class="btn-primary btn-md full" type="submit" name="hair7" value='.$lang['btn_buy'].'>'; } ?></td>
      <td><?php if($hair_8 != 1) { echo '<input class="btn-primary btn-md full" type="submit" name="hair8" value='.$lang['btn_buy'].'>'; } ?></td>
      <td><?php if($hair_9 != 1) { echo '<input class="btn-primary btn-md full" type="submit" name="hair9" value='.$lang['btn_buy'].'>'; } ?></td>
      <td><?php if($hair_10 != 1) { echo '<input class="btn-primary btn-md full" type="submit" name="hair10" value='.$lang['btn_buy'].'>'; } ?></td>
      <td><?php if($hair_11 != 1) { echo '<input class="btn-primary btn-md full" type="submit" name="hair11" value='.$lang['btn_buy'].'>'; } ?></td>
      <td><?php if($hair_12 != 1) { echo '<input class="btn-primary btn-md full" type="submit" name="hair12" value='.$lang['btn_buy'].'>'; } ?></td>
   </form>
   </tr>
</table>
</div>
</div>

<br>
<div class="body">
<div style="overflow-x:auto;">
<table>
   <tr>
   <?php $sn = 1; ?>
      <td style="font-weight: bold;font-size: large;color: #5680e9;" rowspan="4"><?php echo $lang['avatareye'] ?></td>
      <td><?php echo $lang['generalstyle'].$sn++ ?></td>
      <td><?php echo $lang['generalstyle'].$sn++ ?></td>
      <td><?php echo $lang['generalstyle'].$sn++ ?></td>
      <td><?php echo $lang['generalstyle'].$sn++ ?></td>
      <td><?php echo $lang['generalstyle'].$sn++ ?></td>
      <td><?php echo $lang['generalstyle'].$sn++ ?></td>
      <td><?php echo $lang['generalstyle'].$sn++ ?></td>
      <td><?php echo $lang['generalstyle'].$sn++ ?></td>
      <td><?php echo $lang['generalstyle'].$sn++ ?></td>
      <td><?php echo $lang['generalstyle'].$sn++ ?></td>
      <td><?php echo $lang['generalstyle'].$sn++ ?></td>
      <td><?php echo $lang['generalstyle'].$sn++ ?></td>
   </tr>
   <tr>
      <td><?php echo '<img height=200 width=150 src="assets/img/avatar_assets/Eyes/eyes_1.png">'; ?></td>
      <td><?php echo '<img height=200 width=150 src="assets/img/avatar_assets/Eyes/eyes_2.png">'; ?></td>
      <td><?php echo '<img height=200 width=150 src="assets/img/avatar_assets/Eyes/eyes_3.png">'; ?></td>
      <td><?php echo '<img height=200 width=150 src="assets/img/avatar_assets/Eyes/eyes_4.png">'; ?></td>
      <td><?php echo '<img height=200 width=150 src="assets/img/avatar_assets/Eyes/eyes_5.png">'; ?></td>
      <td><?php echo '<img height=200 width=150 src="assets/img/avatar_assets/Eyes/eyes_6.png">'; ?></td>
      <td><?php echo '<img height=200 width=150 src="assets/img/avatar_assets/Eyes/eyes_7.png">'; ?></td>
      <td><?php echo '<img height=200 width=150 src="assets/img/avatar_assets/Eyes/eyes_8.png">'; ?></td>
      <td><?php echo '<img height=200 width=150 src="assets/img/avatar_assets/Eyes/eyes_9.png">'; ?></td>
      <td><?php echo '<img height=200 width=150 src="assets/img/avatar_assets/Eyes/eyes_10.png">'; ?></td>
      <td><?php echo '<img height=200 width=150 src="assets/img/avatar_assets/Eyes/eyes_11.png">'; ?></td>
      <td><?php echo '<img height=200 width=150 src="assets/img/avatar_assets/Eyes/eyes_12.png">'; ?></td>
   </tr>
   <tr>
      <td><?php if($eyes_1 != 1) { echo '<output>'.$lang['itemnotowned'].'</output>'.'<br>'.'<output>'.$lang['cost'].$price_1.$lang['pct'].'</output>'; } else { echo '<output>'.$lang['itemowned'].'</output>'; } ?></td>
      <td><?php if($eyes_2 != 1) { echo '<output>'.$lang['itemnotowned'].'</output>'.'<br>'.'<output>'.$lang['cost'].$price_1.$lang['pct'].'</output>'; } else { echo '<output>'.$lang['itemowned'].'</output>'; } ?></td>
      <td><?php if($eyes_3 != 1) { echo '<output>'.$lang['itemnotowned'].'</output>'.'<br>'.'<output>'.$lang['cost'].$price_1.$lang['pct'].'</output>'; } else { echo '<output>'.$lang['itemowned'].'</output>'; } ?></td>
      <td><?php if($eyes_4 != 1) { echo '<output>'.$lang['itemnotowned'].'</output>'.'<br>'.'<output>'.$lang['cost'].$price_1.$lang['pct'].'</output>'; } else { echo '<output>'.$lang['itemowned'].'</output>'; } ?></td>
      <td><?php if($eyes_5 != 1) { echo '<output>'.$lang['itemnotowned'].'</output>'.'<br>'.'<output>'.$lang['cost'].$price_1.$lang['pct'].'</output>'; } else { echo '<output>'.$lang['itemowned'].'</output>'; } ?></td>
      <td><?php if($eyes_6 != 1) { echo '<output>'.$lang['itemnotowned'].'</output>'.'<br>'.'<output>'.$lang['cost'].$price_1.$lang['pct'].'</output>'; } else { echo '<output>'.$lang['itemowned'].'</output>'; } ?></td>
      <td><?php if($eyes_7 != 1) { echo '<output>'.$lang['itemnotowned'].'</output>'.'<br>'.'<output>'.$lang['cost'].$price_2.$lang['pct'].'</output>'; } else { echo '<output>'.$lang['itemowned'].'</output>'; } ?></td>
      <td><?php if($eyes_8 != 1) { echo '<output>'.$lang['itemnotowned'].'</output>'.'<br>'.'<output>'.$lang['cost'].$price_2.$lang['pct'].'</output>'; } else { echo '<output>'.$lang['itemowned'].'</output>'; } ?></td>
      <td><?php if($eyes_9 != 1) { echo '<output>'.$lang['itemnotowned'].'</output>'.'<br>'.'<output>'.$lang['cost'].$price_3.$lang['pct'].'</output>'; } else { echo '<output>'.$lang['itemowned'].'</output>'; } ?></td>
      <td><?php if($eyes_10 != 1) { echo '<output>'.$lang['itemnotowned'].'</output>'.'<br>'.'<output>'.$lang['cost'].$price_3.$lang['pct'].'</output>'; } else { echo '<output>'.$lang['itemowned'].'</output>'; } ?></td>
      <td><?php if($eyes_11 != 1) { echo '<output>'.$lang['itemnotowned'].'</output>'.'<br>'.'<output>'.$lang['cost'].$price_4.$lang['pct'].'</output>'; } else { echo '<output>'.$lang['itemowned'].'</output>'; } ?></td>
      <td><?php if($eyes_12 != 1) { echo '<output>'.$lang['itemnotowned'].'</output>'.'<br>'.'<output>'.$lang['cost'].$price_5.$lang['pct'].'</output>'; } else { echo '<output>'.$lang['itemowned'].'</output>'; } ?></td>
   </tr>
   <tr>
   <form method="post">
      <td><?php if($eyes_1 != 1) { echo '<input class="btn-primary btn-md full" type="submit" name="eyes1" value='.$lang['btn_buy'].'>'; } ?></td>
      <td><?php if($eyes_2 != 1) { echo '<input class="btn-primary btn-md full" type="submit" name="eyes2" value='.$lang['btn_buy'].'>'; } ?></td>
      <td><?php if($eyes_3 != 1) { echo '<input class="btn-primary btn-md full" type="submit" name="eyes3" value='.$lang['btn_buy'].'>'; } ?></td>
      <td><?php if($eyes_4!= 1) { echo '<input class="btn-primary btn-md full" type="submit" name="eyes4" value='.$lang['btn_buy'].'>'; } ?></td>
      <td><?php if($eyes_5 != 1) { echo '<input class="btn-primary btn-md full" type="submit" name="eyes5" value='.$lang['btn_buy'].'>'; } ?></td>
      <td><?php if($eyes_6 != 1) { echo '<input class="btn-primary btn-md full" type="submit" name="eyes6" value='.$lang['btn_buy'].'>'; } ?></td>
      <td><?php if($eyes_7 != 1) { echo '<input class="btn-primary btn-md full" type="submit" name="eyes7" value='.$lang['btn_buy'].'>'; } ?></td>
      <td><?php if($eyes_8 != 1) { echo '<input class="btn-primary btn-md full" type="submit" name="eyes8" value='.$lang['btn_buy'].'>'; } ?></td>
      <td><?php if($eyes_9 != 1) { echo '<input class="btn-primary btn-md full" type="submit" name="eyes9" value='.$lang['btn_buy'].'>'; } ?></td>
      <td><?php if($eyes_10 != 1) { echo '<input class="btn-primary btn-md full" type="submit" name="eyes10" value='.$lang['btn_buy'].'>'; } ?></td>
      <td><?php if($eyes_11 != 1) { echo '<input class="btn-primary btn-md full" type="submit" name="eyes11" value='.$lang['btn_buy'].'>'; } ?></td>
      <td><?php if($eyes_12 != 1) { echo '<input class="btn-primary btn-md full" type="submit" name="eyes12" value='.$lang['btn_buy'].'>'; } ?></td>
   </form>
   </tr>
</table>
</div>
</div>

<br>
<div class="body">
<div style="overflow-x:auto;">
<table>
   <tr>
   <?php $sn = 1; ?>
      <td style="font-weight: bold;font-size: large;color: #5680e9;" rowspan="4"><?php echo $lang['avatarmouth'] ?></td>
      <td><?php echo $lang['generalstyle'].$sn++ ?></td>
      <td><?php echo $lang['generalstyle'].$sn++ ?></td>
      <td><?php echo $lang['generalstyle'].$sn++ ?></td>
      <td><?php echo $lang['generalstyle'].$sn++ ?></td>
      <td><?php echo $lang['generalstyle'].$sn++ ?></td>
      <td><?php echo $lang['generalstyle'].$sn++ ?></td>
      <td><?php echo $lang['generalstyle'].$sn++ ?></td>
      <td><?php echo $lang['generalstyle'].$sn++ ?></td>
      <td><?php echo $lang['generalstyle'].$sn++ ?></td>
      <td><?php echo $lang['generalstyle'].$sn++ ?></td>
      <td><?php echo $lang['generalstyle'].$sn++ ?></td>
      <td><?php echo $lang['generalstyle'].$sn++ ?></td>
      <td><?php echo $lang['generalstyle'].$sn++ ?></td>
   </tr>
   <tr>
      <td><?php echo '<img height=200 width=150 src="assets/img/avatar_assets/Mouths/mouth_1.png">'; ?></td>
      <td><?php echo '<img height=200 width=150 src="assets/img/avatar_assets/Mouths/mouth_2.png">'; ?></td>
      <td><?php echo '<img height=200 width=150 src="assets/img/avatar_assets/Mouths/mouth_3.png">'; ?></td>
      <td><?php echo '<img height=200 width=150 src="assets/img/avatar_assets/Mouths/mouth_4.png">'; ?></td>
      <td><?php echo '<img height=200 width=150 src="assets/img/avatar_assets/Mouths/mouth_5.png">'; ?></td>
      <td><?php echo '<img height=200 width=150 src="assets/img/avatar_assets/Mouths/mouth_6.png">'; ?></td>
      <td><?php echo '<img height=200 width=150 src="assets/img/avatar_assets/Mouths/mouth_7.png">'; ?></td>
      <td><?php echo '<img height=200 width=150 src="assets/img/avatar_assets/Mouths/mouth_8.png">'; ?></td>
      <td><?php echo '<img height=200 width=150 src="assets/img/avatar_assets/Mouths/mouth_9.png">'; ?></td>
      <td><?php echo '<img height=200 width=150 src="assets/img/avatar_assets/Mouths/mouth_10.png">'; ?></td>
      <td><?php echo '<img height=200 width=150 src="assets/img/avatar_assets/Mouths/mouth_11.png">'; ?></td>
      <td><?php echo '<img height=200 width=150 src="assets/img/avatar_assets/Mouths/mouth_12.png">'; ?></td>
      <td><?php echo '<img height=200 width=150 src="assets/img/avatar_assets/Mouths/mouth_13.png">'; ?></td>
   </tr>
   <tr>
      <td><?php if($mouth_1 != 1) { echo '<output>'.$lang['itemnotowned'].'</output>'.'<br>'.'<output>'.$lang['cost'].$price_1.$lang['pct'].'</output>'; } else { echo '<output>'.$lang['itemowned'].'</output>'; } ?></td>
      <td><?php if($mouth_2 != 1) { echo '<output>'.$lang['itemnotowned'].'</output>'.'<br>'.'<output>'.$lang['cost'].$price_1.$lang['pct'].'</output>'; } else { echo '<output>'.$lang['itemowned'].'</output>'; } ?></td>
      <td><?php if($mouth_3 != 1) { echo '<output>'.$lang['itemnotowned'].'</output>'.'<br>'.'<output>'.$lang['cost'].$price_1.$lang['pct'].'</output>'; } else { echo '<output>'.$lang['itemowned'].'</output>'; } ?></td>
      <td><?php if($mouth_4 != 1) { echo '<output>'.$lang['itemnotowned'].'</output>'.'<br>'.'<output>'.$lang['cost'].$price_1.$lang['pct'].'</output>'; } else { echo '<output>'.$lang['itemowned'].'</output>'; } ?></td>
      <td><?php if($mouth_5 != 1) { echo '<output>'.$lang['itemnotowned'].'</output>'.'<br>'.'<output>'.$lang['cost'].$price_1.$lang['pct'].'</output>'; } else { echo '<output>'.$lang['itemowned'].'</output>'; } ?></td>
      <td><?php if($mouth_6 != 1) { echo '<output>'.$lang['itemnotowned'].'</output>'.'<br>'.'<output>'.$lang['cost'].$price_1.$lang['pct'].'</output>'; } else { echo '<output>'.$lang['itemowned'].'</output>'; } ?></td>
      <td><?php if($mouth_7 != 1) { echo '<output>'.$lang['itemnotowned'].'</output>'.'<br>'.'<output>'.$lang['cost'].$price_2.$lang['pct'].'</output>'; } else { echo '<output>'.$lang['itemowned'].'</output>'; } ?></td>
      <td><?php if($mouth_8 != 1) { echo '<output>'.$lang['itemnotowned'].'</output>'.'<br>'.'<output>'.$lang['cost'].$price_2.$lang['pct'].'</output>'; } else { echo '<output>'.$lang['itemowned'].'</output>'; } ?></td>
      <td><?php if($mouth_9 != 1) { echo '<output>'.$lang['itemnotowned'].'</output>'.'<br>'.'<output>'.$lang['cost'].$price_3.$lang['pct'].'</output>'; } else { echo '<output>'.$lang['itemowned'].'</output>'; } ?></td>
      <td><?php if($mouth_10 != 1) { echo '<output>'.$lang['itemnotowned'].'</output>'.'<br>'.'<output>'.$lang['cost'].$price_3.$lang['pct'].'</output>'; } else { echo '<output>'.$lang['itemowned'].'</output>'; } ?></td>
      <td><?php if($mouth_11 != 1) { echo '<output>'.$lang['itemnotowned'].'</output>'.'<br>'.'<output>'.$lang['cost'].$price_4.$lang['pct'].'</output>'; } else { echo '<output>'.$lang['itemowned'].'</output>'; } ?></td>
      <td><?php if($mouth_12 != 1) { echo '<output>'.$lang['itemnotowned'].'</output>'.'<br>'.'<output>'.$lang['cost'].$price_5.$lang['pct'].'</output>'; } else { echo '<output>'.$lang['itemowned'].'</output>'; } ?></td>
      <td><?php if($mouth_13 != 1) { echo '<output>'.$lang['itemnotowned'].'</output>'.'<br>'.'<output>'.$lang['cost'].$price_5.$lang['pct'].'</output>'; } else { echo '<output>'.$lang['itemowned'].'</output>'; } ?></td>
   </tr>
   <tr>
   <form method="post">
      <td><?php if($mouth_1 != 1) { echo '<input class="btn-primary btn-md full" type="submit" name="mouth1" value='.$lang['btn_buy'].'>'; } ?></td>
      <td><?php if($mouth_2 != 1) { echo '<input class="btn-primary btn-md full" type="submit" name="mouth2" value='.$lang['btn_buy'].'>'; } ?></td>
      <td><?php if($mouth_3 != 1) { echo '<input class="btn-primary btn-md full" type="submit" name="mouth3" value='.$lang['btn_buy'].'>'; } ?></td>
      <td><?php if($mouth_4 != 1) { echo '<input class="btn-primary btn-md full" type="submit" name="mouth4" value='.$lang['btn_buy'].'>'; } ?></td>
      <td><?php if($mouth_5 != 1) { echo '<input class="btn-primary btn-md full" type="submit" name="mouth5" value='.$lang['btn_buy'].'>'; } ?></td>
      <td><?php if($mouth_6 != 1) { echo '<input class="btn-primary btn-md full" type="submit" name="mouth6" value='.$lang['btn_buy'].'>'; } ?></td>
      <td><?php if($mouth_7 != 1) { echo '<input class="btn-primary btn-md full" type="submit" name="mouth7" value='.$lang['btn_buy'].'>'; } ?></td>
      <td><?php if($mouth_8 != 1) { echo '<input class="btn-primary btn-md full" type="submit" name="mouth8" value='.$lang['btn_buy'].'>'; } ?></td>
      <td><?php if($mouth_9 != 1) { echo '<input class="btn-primary btn-md full" type="submit" name="mouth9" value='.$lang['btn_buy'].'>'; } ?></td>
      <td><?php if($mouth_10 != 1) { echo '<input class="btn-primary btn-md full" type="submit" name="mouth10" value='.$lang['btn_buy'].'>'; } ?></td>
      <td><?php if($mouth_11 != 1) { echo '<input class="btn-primary btn-md full" type="submit" name="mouth11" value='.$lang['btn_buy'].'>'; } ?></td>
      <td><?php if($mouth_12 != 1) { echo '<input class="btn-primary btn-md full" type="submit" name="mouth12" value='.$lang['btn_buy'].'>'; } ?></td>
      <td><?php if($mouth_13 != 1) { echo '<input class="btn-primary btn-md full" type="submit" name="mouth13" value='.$lang['btn_buy'].'>'; } ?></td>
   </form>
   </tr>
</table>
</div>
</div>
<br>

<div class="body">
<div style="overflow-x:auto;">
<table>
   <tr>
   <?php $sn = 1; ?>
      <td style="font-weight: bold;font-size: large;color: #5680e9;" rowspan="4"><?php echo $lang['avatarbody'] ?></td>
      <td><?php echo $lang['generalstyle'].$sn++ ?></td>
      <td><?php echo $lang['generalstyle'].$sn++ ?></td>
      <td><?php echo $lang['generalstyle'].$sn++ ?></td>
      <td><?php echo $lang['generalstyle'].$sn++ ?></td>
      <td><?php echo $lang['generalstyle'].$sn++ ?></td>
      <td><?php echo $lang['generalstyle'].$sn++ ?></td>
      <td><?php echo $lang['generalstyle'].$sn++ ?></td>
      <td><?php echo $lang['generalstyle'].$sn++ ?></td>
      <td><?php echo $lang['generalstyle'].$sn++ ?></td>
   </tr>
   <tr>
      <td><?php echo '<img height=200 width=150 src="assets/img/avatar_assets/TShirts/thsirt_pink.png">'; ?></td>
      <td><?php echo '<img height=200 width=150 src="assets/img/avatar_assets/TShirts/tshirt_black.png">'; ?></td>
      <td><?php echo '<img height=200 width=150 src="assets/img/avatar_assets/TShirts/tshirt_darkblue.png">'; ?></td>
      <td><?php echo '<img height=200 width=150 src="assets/img/avatar_assets/TShirts/tshirt_green.png">'; ?></td>
      <td><?php echo '<img height=200 width=150 src="assets/img/avatar_assets/TShirts/tshirt_lightblue.png">'; ?></td>
      <td><?php echo '<img height=200 width=150 src="assets/img/avatar_assets/TShirts/tshirt_orange.png">'; ?></td>
      <td><?php echo '<img height=200 width=150 src="assets/img/avatar_assets/TShirts/tshirt_purple.png">'; ?></td>
      <td><?php echo '<img height=200 width=150 src="assets/img/avatar_assets/TShirts/tshirt_red.png">'; ?></td>
      <td><?php echo '<img height=200 width=150 src="assets/img/avatar_assets/TShirts/tshirt_yellow.png">'; ?></td>
   </tr>
   <tr>
      <td><?php if($tshirt_1 != 1) { echo '<output>'.$lang['itemnotowned'].'</output>'.'<br>'.'<output>'.$lang['cost'].$price_1.$lang['pct'].'</output>'; } else { echo '<output>'.$lang['itemowned'].'</output>'; } ?></td>
      <td><?php if($tshirt_2 != 1) { echo '<output>'.$lang['itemnotowned'].'</output>'.'<br>'.'<output>'.$lang['cost'].$price_1.$lang['pct'].'</output>'; } else { echo '<output>'.$lang['itemowned'].'</output>'; } ?></td>
      <td><?php if($tshirt_3 != 1) { echo '<output>'.$lang['itemnotowned'].'</output>'.'<br>'.'<output>'.$lang['cost'].$price_1.$lang['pct'].'</output>'; } else { echo '<output>'.$lang['itemowned'].'</output>'; } ?></td>
      <td><?php if($tshirt_4 != 1) { echo '<output>'.$lang['itemnotowned'].'</output>'.'<br>'.'<output>'.$lang['cost'].$price_1.$lang['pct'].'</output>'; } else { echo '<output>'.$lang['itemowned'].'</output>'; } ?></td>
      <td><?php if($tshirt_5 != 1) { echo '<output>'.$lang['itemnotowned'].'</output>'.'<br>'.'<output>'.$lang['cost'].$price_1.$lang['pct'].'</output>'; } else { echo '<output>'.$lang['itemowned'].'</output>'; } ?></td>
      <td><?php if($tshirt_6 != 1) { echo '<output>'.$lang['itemnotowned'].'</output>'.'<br>'.'<output>'.$lang['cost'].$price_1.$lang['pct'].'</output>'; } else { echo '<output>'.$lang['itemowned'].'</output>'; } ?></td>
      <td><?php if($tshirt_7 != 1) { echo '<output>'.$lang['itemnotowned'].'</output>'.'<br>'.'<output>'.$lang['cost'].$price_2.$lang['pct'].'</output>'; } else { echo '<output>'.$lang['itemowned'].'</output>'; } ?></td>
      <td><?php if($tshirt_8 != 1) { echo '<output>'.$lang['itemnotowned'].'</output>'.'<br>'.'<output>'.$lang['cost'].$price_2.$lang['pct'].'</output>'; } else { echo '<output>'.$lang['itemowned'].'</output>'; } ?></td>
      <td><?php if($tshirt_9 != 1) { echo '<output>'.$lang['itemnotowned'].'</output>'.'<br>'.'<output>'.$lang['cost'].$price_3.$lang['pct'].'</output>'; } else { echo '<output>'.$lang['itemowned'].'</output>'; } ?></td>
   </tr>
   <tr>
   <form method="post">
      <td><?php if($tshirt_1 != 1) { echo '<input class="btn-primary btn-md full" type="submit" name="tshirt1" value='.$lang['btn_buy'].'>'; } ?></td>
      <td><?php if($tshirt_2 != 1) { echo '<input class="btn-primary btn-md full" type="submit" name="tshirt2" value='.$lang['btn_buy'].'>'; } ?></td>
      <td><?php if($tshirt_3 != 1) { echo '<input class="btn-primary btn-md full" type="submit" name="tshirt3" value='.$lang['btn_buy'].'>'; } ?></td>
      <td><?php if($tshirt_4 != 1) { echo '<input class="btn-primary btn-md full" type="submit" name="tshirt4" value='.$lang['btn_buy'].'>'; } ?></td>
      <td><?php if($tshirt_5 != 1) { echo '<input class="btn-primary btn-md full" type="submit" name="tshirt5" value='.$lang['btn_buy'].'>'; } ?></td>
      <td><?php if($tshirt_6 != 1) { echo '<input class="btn-primary btn-md full" type="submit" name="tshirt6" value='.$lang['btn_buy'].'>'; } ?></td>
      <td><?php if($tshirt_7 != 1) { echo '<input class="btn-primary btn-md full" type="submit" name="tshirt7" value='.$lang['btn_buy'].'>'; } ?></td>
      <td><?php if($tshirt_8 != 1) { echo '<input class="btn-primary btn-md full" type="submit" name="tshirt8" value='.$lang['btn_buy'].'>'; } ?></td>
      <td><?php if($tshirt_9 != 1) { echo '<input class="btn-primary btn-md full" type="submit" name="tshirt9" value='.$lang['btn_buy'].'>'; } ?></td>
   </form>
   </tr>
</table>
</div>
</div>

<br>
<div class="body">
<div style="overflow-x:auto;">
<table>
   <tr>
   <?php $sn = 1; ?>
      <td style="font-weight: bold;font-size: large;color: #5680e9;" rowspan="4"><?php echo $lang['avatarpants'] ?></td>
      <td><?php echo $lang['generalstyle'].$sn++ ?></td>
      <td><?php echo $lang['generalstyle'].$sn++ ?></td>
      <td><?php echo $lang['generalstyle'].$sn++ ?></td>
      <td><?php echo $lang['generalstyle'].$sn++ ?></td>
      <td><?php echo $lang['generalstyle'].$sn++ ?></td>
      <td><?php echo $lang['generalstyle'].$sn++ ?></td>
      <td><?php echo $lang['generalstyle'].$sn++ ?></td>
      <td><?php echo $lang['generalstyle'].$sn++ ?></td>
   </tr>
   <tr>
      <td><?php echo '<img height=200 width=150 src="assets/img/avatar_assets/Pants/pants_black.png">'; ?></td>
      <td><?php echo '<img height=200 width=150 src="assets/img/avatar_assets/Pants/pants_brown.png">'; ?></td>
      <td><?php echo '<img height=200 width=150 src="assets/img/avatar_assets/Pants/pants_darkblue.png">'; ?></td>
      <td><?php echo '<img height=200 width=150 src="assets/img/avatar_assets/Pants/pants_darkgreen.png">'; ?></td>
      <td><?php echo '<img height=200 width=150 src="assets/img/avatar_assets/Pants/pants_darkpurple.png">'; ?></td>
      <td><?php echo '<img height=200 width=150 src="assets/img/avatar_assets/Pants/pants_jean.png">'; ?></td>
      <td><?php echo '<img height=200 width=150 src="assets/img/avatar_assets/Pants/pants_kaki.png">'; ?></td>
      <td><?php echo '<img height=200 width=150 src="assets/img/avatar_assets/Pants/pants_olive.png">'; ?></td>
   </tr>
   <tr>
      <td><?php if($pants_1 != 1) { echo '<output>'.$lang['itemnotowned'].'</output>'.'<br>'.'<output>'.$lang['cost'].$price_1.$lang['pct'].'</output>'; } else { echo '<output>'.$lang['itemowned'].'</output>'; } ?></td>
      <td><?php if($pants_2 != 1) { echo '<output>'.$lang['itemnotowned'].'</output>'.'<br>'.'<output>'.$lang['cost'].$price_1.$lang['pct'].'</output>'; } else { echo '<output>'.$lang['itemowned'].'</output>'; } ?></td>
      <td><?php if($pants_3 != 1) { echo '<output>'.$lang['itemnotowned'].'</output>'.'<br>'.'<output>'.$lang['cost'].$price_1.$lang['pct'].'</output>'; } else { echo '<output>'.$lang['itemowned'].'</output>'; } ?></td>
      <td><?php if($pants_4 != 1) { echo '<output>'.$lang['itemnotowned'].'</output>'.'<br>'.'<output>'.$lang['cost'].$price_1.$lang['pct'].'</output>'; } else { echo '<output>'.$lang['itemowned'].'</output>'; } ?></td>
      <td><?php if($pants_5 != 1) { echo '<output>'.$lang['itemnotowned'].'</output>'.'<br>'.'<output>'.$lang['cost'].$price_1.$lang['pct'].'</output>'; } else { echo '<output>'.$lang['itemowned'].'</output>'; } ?></td>
      <td><?php if($pants_6 != 1) { echo '<output>'.$lang['itemnotowned'].'</output>'.'<br>'.'<output>'.$lang['cost'].$price_1.$lang['pct'].'</output>'; } else { echo '<output>'.$lang['itemowned'].'</output>'; } ?></td>
      <td><?php if($pants_7 != 1) { echo '<output>'.$lang['itemnotowned'].'</output>'.'<br>'.'<output>'.$lang['cost'].$price_2.$lang['pct'].'</output>'; } else { echo '<output>'.$lang['itemowned'].'</output>'; } ?></td>
      <td><?php if($pants_8 != 1) { echo '<output>'.$lang['itemnotowned'].'</output>'.'<br>'.'<output>'.$lang['cost'].$price_2.$lang['pct'].'</output>'; } else { echo '<output>'.$lang['itemowned'].'</output>'; } ?></td>
   </tr>
   <tr>
   <form method="post">
      <td><?php if($pants_1 != 1) { echo '<input class="btn-primary btn-md full" type="submit" name="pants1" value='.$lang['btn_buy'].'>'; } ?></td>
      <td><?php if($pants_2 != 1) { echo '<input class="btn-primary btn-md full" type="submit" name="pants2" value='.$lang['btn_buy'].'>'; } ?></td>
      <td><?php if($pants_3 != 1) { echo '<input class="btn-primary btn-md full" type="submit" name="pants3" value='.$lang['btn_buy'].'>'; } ?></td>
      <td><?php if($pants_4 != 1) { echo '<input class="btn-primary btn-md full" type="submit" name="pants4" value='.$lang['btn_buy'].'>'; } ?></td>
      <td><?php if($pants_5 != 1) { echo '<input class="btn-primary btn-md full" type="submit" name="pants5" value='.$lang['btn_buy'].'>'; } ?></td>
      <td><?php if($pants_6 != 1) { echo '<input class="btn-primary btn-md full" type="submit" name="pants6" value='.$lang['btn_buy'].'>'; } ?></td>
      <td><?php if($pants_7 != 1) { echo '<input class="btn-primary btn-md full" type="submit" name="pants7" value='.$lang['btn_buy'].'>'; } ?></td>
      <td><?php if($pants_8 != 1) { echo '<input class="btn-primary btn-md full" type="submit" name="pants8" value='.$lang['btn_buy'].'>'; } ?></td>
   </form>
   </tr>
</table>
</div>
</div>

<br>
<div class="body">
<div style="overflow-x:auto;">
<table>
   <tr>
   <?php $sn = 1; ?>
      <td style="font-weight: bold;font-size: large;color: #5680e9;" rowspan="4"><?php echo $lang['avatarshoes'] ?></td>
      <td><?php echo $lang['generalstyle'].$sn++ ?></td>
      <td><?php echo $lang['generalstyle'].$sn++ ?></td>
      <td><?php echo $lang['generalstyle'].$sn++ ?></td>
      <td><?php echo $lang['generalstyle'].$sn++ ?></td>
      <td><?php echo $lang['generalstyle'].$sn++ ?></td>
      <td><?php echo $lang['generalstyle'].$sn++ ?></td>
      <td><?php echo $lang['generalstyle'].$sn++ ?></td>
      <td><?php echo $lang['generalstyle'].$sn++ ?></td>
      <td><?php echo $lang['generalstyle'].$sn++ ?></td>
      <td><?php echo $lang['generalstyle'].$sn++ ?></td>
      <td><?php echo $lang['generalstyle'].$sn++ ?></td>
      <td><?php echo $lang['generalstyle'].$sn++ ?></td>
   </tr>
   <tr>
      <td><?php echo '<img height=200 width=150 src="assets/img/avatar_assets/Shoes/shoes_bordeaux.png">'; ?></td>
      <td><?php echo '<img height=200 width=150 src="assets/img/avatar_assets/Shoes/shoes_brown.png">'; ?></td>
      <td><?php echo '<img height=200 width=150 src="assets/img/avatar_assets/Shoes/shoes_darkblue.png">'; ?></td>
      <td><?php echo '<img height=200 width=150 src="assets/img/avatar_assets/Shoes/shoes_darkgreen.png">'; ?></td>
      <td><?php echo '<img height=200 width=150 src="assets/img/avatar_assets/Shoes/shoes_darkgrey.png">'; ?></td>
      <td><?php echo '<img height=200 width=150 src="assets/img/avatar_assets/Shoes/shoes_darkkaki.png">'; ?></td>
      <td><?php echo '<img height=200 width=150 src="assets/img/avatar_assets/Shoes/shoes_lightblue.png">'; ?></td>
      <td><?php echo '<img height=200 width=150 src="assets/img/avatar_assets/Shoes/shoes_lightgrey.png">'; ?></td>
      <td><?php echo '<img height=200 width=150 src="assets/img/avatar_assets/Shoes/shoes_ligthgreen.png">'; ?></td>
      <td><?php echo '<img height=200 width=150 src="assets/img/avatar_assets/Shoes/shoes_olive.png">'; ?></td>
      <td><?php echo '<img height=200 width=150 src="assets/img/avatar_assets/Shoes/shoes_orange.png">'; ?></td>
      <td><?php echo '<img height=200 width=150 src="assets/img/avatar_assets/Shoes/shoes_pink.png">'; ?></td>
   </tr>
   <tr>
      <td><?php if($shoes_1 != 1) { echo '<output>'.$lang['itemnotowned'].'</output>'.'<br>'.'<output>'.$lang['cost'].$price_1.$lang['pct'].'</output>'; } else { echo '<output>'.$lang['itemowned'].'</output>'; } ?></td>
      <td><?php if($shoes_2 != 1) { echo '<output>'.$lang['itemnotowned'].'</output>'.'<br>'.'<output>'.$lang['cost'].$price_1.$lang['pct'].'</output>'; } else { echo '<output>'.$lang['itemowned'].'</output>'; } ?></td>
      <td><?php if($shoes_3 != 1) { echo '<output>'.$lang['itemnotowned'].'</output>'.'<br>'.'<output>'.$lang['cost'].$price_1.$lang['pct'].'</output>'; } else { echo '<output>'.$lang['itemowned'].'</output>'; } ?></td>
      <td><?php if($shoes_4 != 1) { echo '<output>'.$lang['itemnotowned'].'</output>'.'<br>'.'<output>'.$lang['cost'].$price_1.$lang['pct'].'</output>'; } else { echo '<output>'.$lang['itemowned'].'</output>'; } ?></td>
      <td><?php if($shoes_5 != 1) { echo '<output>'.$lang['itemnotowned'].'</output>'.'<br>'.'<output>'.$lang['cost'].$price_1.$lang['pct'].'</output>'; } else { echo '<output>'.$lang['itemowned'].'</output>'; } ?></td>
      <td><?php if($shoes_6 != 1) { echo '<output>'.$lang['itemnotowned'].'</output>'.'<br>'.'<output>'.$lang['cost'].$price_1.$lang['pct'].'</output>'; } else { echo '<output>'.$lang['itemowned'].'</output>'; } ?></td>
      <td><?php if($shoes_7 != 1) { echo '<output>'.$lang['itemnotowned'].'</output>'.'<br>'.'<output>'.$lang['cost'].$price_2.$lang['pct'].'</output>'; } else { echo '<output>'.$lang['itemowned'].'</output>'; } ?></td>
      <td><?php if($shoes_8 != 1) { echo '<output>'.$lang['itemnotowned'].'</output>'.'<br>'.'<output>'.$lang['cost'].$price_2.$lang['pct'].'</output>'; } else { echo '<output>'.$lang['itemowned'].'</output>'; } ?></td>
      <td><?php if($shoes_9 != 1) { echo '<output>'.$lang['itemnotowned'].'</output>'.'<br>'.'<output>'.$lang['cost'].$price_3.$lang['pct'].'</output>'; } else { echo '<output>'.$lang['itemowned'].'</output>'; } ?></td>
      <td><?php if($shoes_10 != 1) { echo '<output>'.$lang['itemnotowned'].'</output>'.'<br>'.'<output>'.$lang['cost'].$price_3.$lang['pct'].'</output>'; } else { echo '<output>'.$lang['itemowned'].'</output>'; } ?></td>
      <td><?php if($shoes_11 != 1) { echo '<output>'.$lang['itemnotowned'].'</output>'.'<br>'.'<output>'.$lang['cost'].$price_4.$lang['pct'].'</output>'; } else { echo '<output>'.$lang['itemowned'].'</output>'; } ?></td>
      <td><?php if($shoes_12 != 1) { echo '<output>'.$lang['itemnotowned'].'</output>'.'<br>'.'<output>'.$lang['cost'].$price_5.$lang['pct'].'</output>'; } else { echo '<output>'.$lang['itemowned'].'</output>'; } ?></td>
   </tr>
   <tr>
      <form method="post">
         <td><?php if($shoes_1 != 1) { echo '<input class="btn-primary btn-md full" type="submit" name="shoes1" value='.$lang['btn_buy'].'>'; } ?></td>
         <td><?php if($shoes_2 != 1) { echo '<input class="btn-primary btn-md full" type="submit" name="shoes2" value='.$lang['btn_buy'].'>'; } ?></td>
         <td><?php if($shoes_3 != 1) { echo '<input class="btn-primary btn-md full" type="submit" name="shoes3" value='.$lang['btn_buy'].'>'; } ?></td>
         <td><?php if($shoes_4 != 1) { echo '<input class="btn-primary btn-md full" type="submit" name="shoes4" value='.$lang['btn_buy'].'>'; } ?></td>
         <td><?php if($shoes_5 != 1) { echo '<input class="btn-primary btn-md full" type="submit" name="shoes5" value='.$lang['btn_buy'].'>'; } ?></td>
         <td><?php if($shoes_6 != 1) { echo '<input class="btn-primary btn-md full" type="submit" name="shoes6" value='.$lang['btn_buy'].'>'; } ?></td>
         <td><?php if($shoes_7 != 1) { echo '<input class="btn-primary btn-md full" type="submit" name="shoes7" value='.$lang['btn_buy'].'>'; } ?></td>
         <td><?php if($shoes_8 != 1) { echo '<input class="btn-primary btn-md full" type="submit" name="shoes8" value='.$lang['btn_buy'].'>'; } ?></td>
         <td><?php if($shoes_9 != 1) { echo '<input class="btn-primary btn-md full" type="submit" name="shoes9" value='.$lang['btn_buy'].'>'; } ?></td>
         <td><?php if($shoes_10 != 1) { echo '<input class="btn-primary btn-md full" type="submit" name="shoes10" value='.$lang['btn_buy'].'>'; } ?></td>
         <td><?php if($shoes_11 != 1) { echo '<input class="btn-primary btn-md full" type="submit" name="shoes11" value='.$lang['btn_buy'].'>'; } ?></td>
         <td><?php if($shoes_12 != 1) { echo '<input class="btn-primary btn-md full" type="submit" name="shoes12" value='.$lang['btn_buy'].'>'; } ?></td>
      </form>
   </tr>
</table>
</div>
</div>
</div>
</div>