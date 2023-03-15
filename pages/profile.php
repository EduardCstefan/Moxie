
<div id="main" class="main">


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
					$user_username = $row['username'];
                    $user_nume = $row['nume'];
					$user_prenume = $row['prenume'];
					$created_at = $row['created_at'];
					$points = $row['points'];
					$avatar_path = $row['avatar_path'];
					?>

					<div class="body">
						<div class="userdata">
							<h2><?php echo $lang['usernamep'] ?> <?php echo $user_username;?></h2>
							<br>
							<p>
                            	<strong><?php echo $lang['familynamep'] ?></strong> <?php echo $user_nume; ?> <br>
								<strong><?php echo $lang['firstnamep'] ?></strong> <?php echo $user_prenume; ?> <br>
								<strong><?php echo $lang['pointsp'] ?></strong> <?php echo $points; ?> <br>
                            	<strong><?php echo $lang['registrydate'] ?></strong> <?php echo $created_at; ?> <br>
								<br>
								<a href="<?php echo SITEURL; ?>index.php?page=edit_user&id=<?php echo $id; ?>" class="btn-success btn-sm"><?php echo $lang['edit'] ?></a> 
								<a href="<?php echo SITEURL; ?>delete.php?page=users&id=<?php echo $id; ?>" class="btn-error btn-sm"><?php echo $lang['delete'] ?></a>
							</p>
						</div>
						<div class="profile_avatar">
							<p>
								<img src="<?php echo $avatar_path;?>" alt="Profile Picture" height=200 width=150><br>
								<a href="<?php echo SITEURL; ?>index.php?page=avatar&id=<?php echo $id; ?>" class="btn-primary btn-md"><?php echo $lang['avatar'] ?></a>
								
							</p>
						</div>
						
						<br>
					</div>
					<?php
				}
			}
			else
			{
				?>
				<div class="error">
					No Users Found. Try Again.
				</div>
				<?php
			}
	?>
</div>