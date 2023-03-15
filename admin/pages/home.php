<div class="body">
	<?php 
		if(isset($_SESSION['login']))
		{
			echo $_SESSION['login'];
			unset($_SESSION['login']);
		}
	?>
	<h2><?php echo $lang['welcome'] ?></h2>
	<br>
	<p>
		<?php echo $lang['welcome_message'] ?>
	</p>
	<br>
		<p>
			<?php echo $lang['contact'] ?> <a href="entropycrusade@gmail.com?Subject=moxie" target="_top">entropycrusade@gmail.com</a>
		</p>
</div>