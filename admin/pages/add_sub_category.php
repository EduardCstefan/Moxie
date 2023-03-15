<div class="body">
	<h2><?php echo $lang['add_category'] ?></h2>

	<?php 
		if(isset($_SESSION['add']))
		{
			echo $_SESSION['add'];
			unset($_SESSION['add']);
		}
	?>

	<form method="post" action="">
		<div class="input-group">
			<span class="input-label"><?php echo $lang['title'] ?> (<?php echo $lang['english'] ?>)</span> 
			<input type="text" name="title_en" placeholder="Sub Category Title in English" required="true" class="half">
		</div>
		<div class="input-group">
			<span class="input-label"><?php echo $lang['title'] ?> (<?php echo $lang['romanian'] ?>)</span> 
			<input type="text" name="title_ro" placeholder="Sub Category Title in Romanian" required="true" class="half">
		</div>


		<div class="input-group">
			<span class="input-label">
				<input type="submit" name="submit" value="<?php echo $lang['add_category'] ?>" class="btn-primary btn-sm">
			</span>
		</div>
		<br>
	</form>
	
	<?php 
		if(isset($_POST['submit']))
		{
			//echo "Click";
			$title_en = $obj->sanitize($conn,$_POST['title_en']);
			$title_ro = $obj->sanitize($conn,$_POST['title_ro']);
			$tbl_name = 'tbl_sub_categories';

			$data= "
				subcategory_name_en = '$title_en',
				subcategory_name_ro = '$title_ro'
			";

			$query = $obj->insert_data($tbl_name,$data);

			$res = $obj->execute_query($conn,$query);

			if($res==true)
			{
				//Category Successfully Added
				$_SESSION['add'] = "<div class='success'>".$lang['add_success']."</div>";
				header('location:'.SITEURL.'admin/index.php?page=sub_categories');
			}
			else
			{
				//Failed to Add Categoy
				$_SESSION['add'] = "<div class='error'>".$lang['add_fail']."</div>";
				header('location:'.SITEURL.'admin/index.php?page=add_sub_category');
			}
		}
	?>
</div>