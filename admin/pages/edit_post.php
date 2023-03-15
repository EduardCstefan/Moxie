<div class="body">
	<h2><?php echo $lang['edit_post'] ?></h2>
	<br>
	<?php 
		if(isset($_SESSION['edit']))
		{
			echo $_SESSION['edit'];
			unset($_SESSION['edit']);
		}

		if (isset($_GET['id']) && !empty($_GET['id'])) {
			$id = $_GET['id'];
			$tbl_name = 'tbl_posts';
			$where = "id='$id'";

			$query = $obj->select_data($tbl_name,$where);
			$res = $obj->execute_query($conn,$query);

			if($res==true)
			{
				$count_rows = $obj->num_rows($res);
				if($count_rows==1)
				{
					$row = $obj->fetch_data($res);
					$title_en = $row['title_en'];
					$description_en = $row['description_en'];
					$title_ro = $row['title_ro'];
					$description_ro = $row['description_ro'];
					$category = $row['category'];
					$subcategory = $row['subcategory'];
					$is_active = $row['is_active'];
					$is_featured = $row['is_featured'];
				}
			}
		}
		else
		{
			header('location:'.SITEURL.'admin/index.php?page=posts');
		}
	?>
	<form method="post" action="">
		<div class="input-group">
			<span class="input-label"><?php echo $lang['title'] ?> (<?php echo $lang['english'] ?>)</span>
			<input class="half" type="text" name="title_en" value="<?php echo $title_en; ?>" required="true">
		</div>
		<div class="input-group">
			<span class="input-label"><?php echo $lang['title'] ?> (<?php echo $lang['romanian'] ?>)</span>
			<input class="half" type="text" name="title_ro" value="<?php echo $title_ro; ?>">
		</div>

		<div class="input-group">
			<span class="input-label"><?php echo $lang['description'] ?> (<?php echo $lang['english'] ?>)</span>
			<textarea class="half" name="description_en" required="true"><?php echo $description_en; ?></textarea>
		</div>
		<div class="input-group">
			<span class="input-label"><?php echo $lang['description'] ?> (<?php echo $lang['romanian'] ?>)</span>
			<textarea class="half" name="description_ro"><?php echo $description_ro; ?></textarea>
		</div>

		<div class="input-group">
			<span class="input-label"><?php echo $lang['category'] ?></span>
			<select class="half" name="category">
				<?php 
					$tbl_name = 'tbl_categories';
					$query = $obj->select_data($tbl_name);
					$res = $obj->execute_query($conn,$query);
					if($res==true)
					{
						$count_rows = $obj->num_rows($res);
						if($count_rows>0)
						{
							while ($row=$obj->fetch_data($res)) {
								$cat_id=$row['id'];
								$title=$row['category_name_'.$_SESSION['lang']];
								?>
								<option <?php if($category==$cat_id){echo"selected='selected'";} ?> value="<?php echo $cat_id; ?>"><?php echo $title; ?></option>
								<?php
							}
						}
						else{
							?>
							<option value="0">None</option>
							<?php 
						}
					}
				?>
			</select>
		</div>
		<div class="input-group">
			<span class="input-label"><?php echo $lang['subtitle'] ?></span>
			<select class="half" name="subcategory">
				<?php 
					$tbl_name = 'tbl_sub_categories';
					$query = $obj->select_data($tbl_name);
					$res = $obj->execute_query($conn,$query);
					if($res==true)
					{
						$count_rows = $obj->num_rows($res);
						if($count_rows>0)
						{
							while ($row=$obj->fetch_data($res)) {
								$cat_id=$row['id'];
								$title=$row['subcategory_name_'.$_SESSION['lang']];
								?>
								<option <?php if($category==$cat_id){echo"selected='selected'";} ?> value="<?php echo $cat_id; ?>"><?php echo $title; ?></option>
								<?php
							}
						}
						else{
							?>
							<option value="0">None</option>
							<?php 
						}
					}
				?>
			</select>
		</div>
		<div class="input-group">
			<span class="input-label"><?php echo $lang['is_active'] ?></span>
			<input <?php if($is_active=='Yes'){echo"checked='checked'";} ?> type="radio" name="is_active" value="Yes"> <?php echo $lang['yes'] ?>
			<input <?php if($is_active=='No'){echo"checked='checked'";} ?> type="radio" name="is_active" value="No"> <?php echo $lang['no'] ?>
		</div>

		<div class="input-group">
			<span class="input-label"><?php echo $lang['is_featured'] ?></span>
			<input <?php if($is_featured=='Yes'){echo"checked='checked'";} ?> type="radio" name="is_featured" value="Yes"> <?php echo $lang['yes'] ?>
			<input <?php if($is_featured=='No'){echo"checked='checked'";} ?> type="radio" name="is_featured" value="No"> <?php echo $lang['no'] ?>
		</div>
		<br>
		<div class="input-group">
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			<input class="btn-primary btn-sm" type="submit" name="submit" value="<?php echo $lang['edit_post'] ?>">
		</div>
	</form>

	<?php 
		if(isset($_POST['submit']))
		{
			//echo "Clicked";
			$id = $_POST['id'];
			$title_en = $obj->sanitize($conn,$_POST['title_en']);
			$title_ro = $obj->sanitize($conn,$_POST['title_ro']);
			$description_en = $obj->sanitize($conn,$_POST['description_en']);
			$description_ro = $obj->sanitize($conn,$_POST['description_ro']);
			$url = strtolower(str_replace(' ', '-', $title_en));
			$category = $obj->sanitize($conn,$_POST['category']);
			$subcategory = $obj->sanitize($conn,$_POST['subcategory']);
			$is_active = $obj->sanitize($conn,$_POST['is_active']);
			$is_featured = $obj->sanitize($conn,$_POST['is_featured']);

			$data = "
				title_en='$title_en',
				title_ro='$title_ro',
				description_en='$description_en',
				description_ro='$description_ro',
				url = '$url',
				category='$category',
				subcategory='$subcategory',
				is_active='$is_active',
				is_featured='$is_featured'
			";
			$where = "id='$id'";
			$tbl_name = 'tbl_posts';
			$query = $obj->update_data($tbl_name,$data,$where);
			$res = $obj->execute_query($conn,$query);
			if($res==true)
			{
				$_SESSION['edit'] = "<div class='success'>".$lang['edit_success']."</div>";
				header('location:'.SITEURL.'admin/index.php?page=posts');
			}
			else
			{
				$_SESSION['edit'] = "<div class='error'>".$lang['edit_fail']."</div>";
				header('location:'.SITEURL.'admin/index.php?page=edit_post&id='.$id);
			}
		}
	?>
</div>