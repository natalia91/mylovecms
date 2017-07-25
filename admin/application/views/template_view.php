<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<title>My CMS</title>
		<link rel="stylesheet" type="text/css" href="css/style.css" />

	</head>
	<body>
		<div id="wrapper">
			<div id="header">
				<div id="logo">
					<img src="images/logo.png" alt="love socks" />
				</div>
				<div id="menu">
					<ul>
						<li class="first active"><a href="?module=products">Товары</a></li>
						<li><a href="?module=categories"">Категории</a></li>
						<li><a href="?module=pages"">Страницы</a></li>
						<li><a href="?module=orders"">Заказы</a></li>

					</ul>
					<br class="clearfix" />
				</div>
			</div>
			<div id="page">
				<!--<div id="sidebar">

				</div>-->
				<div id="content">
					<div class="box">
						<?php include 'application/views/'.$content_view; ?>
					<br class="clearfix" />
				</div>
				<br class="clearfix" />
			</div>
		</div>

	</body>
</html>