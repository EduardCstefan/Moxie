<!DOCTYPE html>
<html>
<head>
	<title><?php echo $lang['meta_title'] ?></title>
	<meta charset="utf-8">
	<meta title="description" content="<?php echo $lang['meta_description'] ?>">
	<meta title="keywords" content="<?php echo $lang['meta_keywords'] ?>">
	<meta title="Author" content="<?php echo $lang['author'] ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo SITEURL; ?>assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script language="Javascript">
	function openNav() {
		document.getElementById("mySidenav").style.width = "250px";
		document.getElementById("").style.marginLeft = "250px";
	}

	function closeNav() {
		document.getElementById("mySidenav").style.width = "0";
		document.getElementById("").style.marginLeft= "0";
	}
	function updateHairInput(val) {
        document.getElementById('texthair').value=val; 
    }
	function updateEyesInput(val) {
        document.getElementById('texteyes').value=val; 
    }
	function updateMouthInput(val) {
        document.getElementById('textmouth').value=val; 
    }
	function updateShirtInput(val) {
        document.getElementById('textshirt').value=val; 
    }
	function updatePantsInput(val) {
        document.getElementById('textpants').value=val; 
    }
	function updateShoesInput(val) {
        document.getElementById('textshoes').value=val; 
    }
    </script>
	<?php
		$site = SITEURL;
		$format = '<li><a href="%sindex.php?page=%s">%s</a></li>';
		$formatHeader = '<li class="right"><a href="%sindex.php?page=%s">%s</a></li>';
		$formatWelcome = '<li class="right"><a href="%sindex.php?page=%s">%s</a></li>';
	?>
</head>

<body>
	<header class="header">
		<div class="wrapper">
			<div class="dropdown">
				<a class="logo"><span  style="font-size:30px;cursor:pointer;color:#ffffff;" onclick="openNav()">&#9776;<h2><?php echo $lang['logo'] ?></h2></a></span>
			</div>
			<div class="menu">
				<ul>
					<?php
						if (isset($_SESSION["user"])) {
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
									while ($row=$obj->fetch_data($res)) {
										$prenume = $row['prenume'];
										$nume = $row['nume'];
									}
								}
							}
							$user = $prenume.' '.$nume;
							$welcomeMessage = $lang['welcomeuser'].$user;
							echo sprintf($formatHeader, $site,'logout', $lang['logout']);
							echo sprintf($formatHeader, $site,'dashboard', $welcomeMessage);
						}
						else {
							echo sprintf($formatHeader, $site,'signup', $lang['signup']);
							echo sprintf($formatHeader, $site,'login', $lang['login']);
						}
					?>
					<li class="right">
						<a href="<?php echo SITEURL; ?>index.php?lang=ro"><img src="https://upload.wikimedia.org/wikipedia/commons/7/73/Flag_of_Romania.svg" height=25 width=25></a>
					</li>
					<li class="right">
						<a href="<?php echo SITEURL; ?>index.php?lang=en"><img src="https://upload.wikimedia.org/wikipedia/commons/a/ae/Flag_of_the_United_Kingdom.svg" height=25 width=25></a>
					</li>
				</ul>
			</div>

			<div class="clearfix"></div>
		</div>
	</header>