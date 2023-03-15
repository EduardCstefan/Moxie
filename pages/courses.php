<div class="main">
   <?php 
		$tbl_name = 'tbl_users';
      $uid = $_SESSION['user'];
		$where = "username='$uid' OR email='$uid'";

		$query = $obj->select_data($tbl_name,$where);
		$res = $obj->execute_query($conn,$query);
		if($res == true)
		{
			$count_rows = $obj->num_rows($res);
			if($count_rows>0)
			{
				$row=$obj->fetch_data($res);
				$uid = $row['id'];
         }
      }
	?>
   <?php
		$tbl_name = 'tbl_lessons';
		$where = "id='$uid'";
		$query = $obj->select_data($tbl_name,$where);
		$res = $obj->execute_query($conn,$query);
		if($res == true)
		{
			$count_rows = $obj->num_rows($res);
			if($count_rows==1)
			{
            $sn=1;
            $id=1;
				while($row = $obj->fetch_data($res))
            {
               $lesson[$sn] = $row['lessons_'.$id];
				   $test[$sn] = $row['test_'.$id];
               $sn++;
               $id++;
            }
				
			}
			else
			{
				$data = "
               id='$uid'
            ";
				$query = $obj->insert_data($tbl_name,$data);
            $res = $obj->execute_query($conn,$query);
				if($res==true)
                  {
                     header('location:'.SITEURL.'index.php?page=courses');
                  }
                  else
                  {
                     
                  }
			}
		}
	?>
   <form action="" method="POST">
      <div class="body">
      <h1> <?php echo $lang['coursesh'] ?></h1>
      <br>
      <div class="search_bar">
         <select style="height:30px;width:250px;" name="category">
         <option value="0">None</option>
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
                           $id=$row['id'];
                           $title=$row['category_name_'.$_SESSION['lang']];
                           ?>
                           <option value="<?php echo $id; ?>"><?php echo $title; ?></option>
                           <?php
                        }
                     }
                     else{
                        ?>

                        <?php 
                     }
                  }
               ?>
            </select>  
   <select style="height:30px;width:250px;" name="subcategory">
   <option value="0">None</option>
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
								$sid=$row['id'];
								$stitle=$row['subcategory_name_'.$_SESSION['lang']];
								?>
								<option value="<?php echo $sid; ?>"><?php echo $stitle; ?></option>
								<?php
							}
						}
						else{
							?>

							<?php 
						}
					}
				?>
			</select>

      <input id="filter" type="submit" name="filter" value="Filter">
   </div>

   <div class="search_bar">
      <div class="search">
         <input class="sbar" name="searchtext" type="text" placeholder="<?php echo $lang['search']; ?>">
         <input id="submit" type="submit" name="search" value="Search">
      </div>
   </div>

   </form>

   <div class="row">
    <?php
      if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['filter']))
      {
         $filtercategory = $obj->sanitize($conn,$_POST['category']);
         $filtersubcategory = $obj->sanitize($conn,$_POST['subcategory']);
         $sn = 0;
         $tbl_name = "tbl_posts";
         if($filtercategory != 0 AND  $filtersubcategory != 0)
         {
            $where = "category=$filtercategory && subcategory=$filtersubcategory";
         }
         else
         {
            $where = "category=$filtercategory OR subcategory=$filtersubcategory";
         }
         $query = $obj->select_data($tbl_name,$where);
         $res = $obj->execute_query($conn,$query);
         $count_rows = $obj->num_rows($res);
         if($count_rows>0)
            {
               while ($row=$obj->fetch_data($res)) {
               $id = $row['id'];
               $post_title = $row['title_'.$_SESSION['lang']];
               $post_description = $row['description_'.$_SESSION['lang']];
               $created_at = $row['created_at'];
               $sn++;
            ?>
             <div class="column">
              <div class="courses">  
               <div class="body">
                  <h2><?php echo $post_title; ?></h2>
                  <br>
                  <p>
                     <?php echo substr($post_description, 0,400).' ...'; ?>
                  </p>
                  <br>
                  <a href="<?php echo SITEURL; ?>index.php?page=lesson_detail&id=<?php echo $id; ?>">
                     <button type="button" class="btn-primary btn-sm"><?php echo $lang['accesscourse'] ?></button>
                  </a>
               </div>
              </div>
             </div>
            
            <?php 
               if($sn > 3) {
                  echo '<br>';
                  $sn = 0;
               }
            ?>
                     <?php
                  }
            }
         else
         {
            echo "<div class = 'error'>".$lang['add_fail_password_not_match']."</div>";
         }
      }
      else
      {
         if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['search']))
      {
         //echo "Click";
         $search = $obj->sanitize($conn,$_POST['searchtext']);
         $sn = 0;
         $tbl_name = "tbl_posts";
         $where = "title_en LIKE '%{$search}%' OR title_ro LIKE '%{$search}%' OR description_en LIKE '%{$search}%' OR description_ro LIKE '%{$search}%'";

         $query = $obj->select_data($tbl_name,$where);
         $res = $obj->execute_query($conn,$query);
         $count_rows = $obj->num_rows($res);
         if($count_rows>0)
         {
            while ($row=$obj->fetch_data($res)) {
               $id = $row['id'];
               $post_title = $row['title_'.$_SESSION['lang']];
               $post_description = $row['description_'.$_SESSION['lang']];
               $created_at = $row['created_at'];
               $sn++;
            ?>
              <div class="column">
               <div class="courses">
               <div class="body">
                  <h2><?php echo $post_title; ?></h2>
                  <br>
                  <p>
                     <?php echo substr($post_description, 0,400).' ...'; ?>
                  </p>
                  <br>
                  <a href="<?php echo SITEURL; ?>index.php?page=lesson_detail&id=<?php echo $id; ?>">
                     <button type="button" class="btn-primary btn-sm"><?php echo $lang['accesscourse'] ?></button>
                  </a>
               </div>
              </div>
            </div>
               <?php 
                  if($sn > 3) {
                     echo '<br>';
                     $sn = 0;
                  }
               ?>
                     <?php
                  }
               }
               else
               {
                  echo "<div class = 'error'>".$lang['add_fail_courses_no_matches']."</div>";
               }
         }
         else
         {
            $tbl_name = "tbl_posts";
            $sn = 0;
            $where = "is_active='Yes' && is_featured='Yes'";
            $other = "ORDER BY created_at DESC";
            $query = $obj->select_data($tbl_name,$where,$other);
            $res = $obj->execute_query($conn,$query);
            $count_rows = $obj->num_rows($res);
            if($count_rows>0)
            {
               while ($row=$obj->fetch_data($res))
                  {
                     $id = $row['id'];
                     $post_title = $row['title_'.$_SESSION['lang']];
                     $post_description = $row['description_'.$_SESSION['lang']];
                     $created_at = $row['created_at'];
                     $sn++;
                     ?>
                    <div class="column">
                     <div class="courses">
                      <div class="body">
                        <h2><?php echo $post_title; ?></h2>
                        <br>
                        <p>
                           <?php echo substr($post_description, 0,400).' ...'; ?>
                        </p>
                        <br>
                        <a href="<?php echo SITEURL; ?>index.php?page=lesson_detail&id=<?php echo $id; ?>">
                           <button type="button" class="btn-primary btn-sm"><?php echo $lang['accesscourse'] ?></button>
                        </a>
                     </div>
                  </div>
                  </div>

                     <?php if($sn > 3) {
                        echo '<br>';
                        $sn = 0;
                     } ?>

                     <?php
                  }
               }
               else {
                  echo "<div class = 'error'>".$lang['add_fail_courses_no_matches']."</div>";
               }
            }
      }
      
         ?>
      </div>
</div>