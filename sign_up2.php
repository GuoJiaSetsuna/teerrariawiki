<!DOCTYPE HTML>
<!--
	Massively by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<?php
	//將資料庫連線所需變數引入
	include ("sql.php");
?>
<html>
	<head>
		<title>
			註冊 - Terraria Wiki
		</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">
		<!-- Wrapper -->
			<div id="wrapper">
				<!-- Header -->
					<header id="header">
						<a href="index.html" class="logo">Terraria</a>
					</header>

				<!-- Nav -->
					<nav id="nav">
						<ul class="links">
							<li><a href="index.php">首頁</a></li>
							<li><a href="weapons.php">武器</a></li>
							<li><a href="armor.php">盔甲</a></li>
							<li><a href="dps.php">DPS</a></li>
							<li><a href="note.php">討論區</a></li>
							<li class="active"><a href="login.php">登入</a></li>
							<li><a href="logout.php">登出</a></li>
						</ul>
						<ul class="icons">
							<li><a href="https://twitter.com/terraria_logic" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="https://www.facebook.com/TerrariaOfficial/" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
							<li><a href="https://www.instagram.com/terraria_logic/" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
							<li><a href="#" class="icon brands fa-github"><span class="label">GitHub</span></a></li>
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">
						<!-- Posts -->
							<article class="post featured">
								<header class="major">
									<h1>註冊</h1>
									<?php
										if (!isset($_GET["account"]) && !isset($_GET["accpassword"]))//初始無輸入值時若有人意外進入此網頁則不顯示
										{
											echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
										}
										elseif($_GET["account"]==NUll||$_GET["accpassword"]==null)//若帳號密碼為空顯示提醒字串
										{
											echo "<h3>帳號密碼不得為空</h3>";
											echo '<meta http-equiv=REFRESH CONTENT=2;url=sign_up.php>';
										}
										else
										{
											// 接收使用者所傳送之帳號與密碼
											$account = $_GET["account"];
											$accpassword = $_GET["accpassword"];
											$link = new PDO('pgsql:host='.$hostname.';port='.$port.';dbname='.$database,$username, $password);
											// 將輸入的帳號密碼使用SQL語法編譯並放入變數，搜尋是否有重複之帳號
											$query = "SELECT * FROM note where account like '".$account."';";
											$result = $link->query($query);
											foreach ($result as $row);
											//若$row不存在代表無相同帳號，進行註冊
											if(!isset($row[1]))
											{
												//INSERT所輸入帳號密碼進行註冊
												$query1 = "INSERT INTO user(account,password) VALUES ('$account','$accpassword')";
												$count=$link->exec($query1);
												echo "<h3>註冊成功</h3>";
												echo '<meta http-equiv=REFRESH CONTENT=2;url=login.php>';
											}
											else//若進行到這邊代表資料庫已有相同帳號，顯示提醒字串
											{
												echo "<h3>此帳號已存在</h3>";
												echo '<meta http-equiv=REFRESH CONTENT=2;url=sign_up.php>';
											}
										}
									?>
								</header>
							</article>
					</div>
				<!-- Copyright -->
					<div id="copyright">
						<ul>
							<li>&copy; Untitled</li>
							<li>Design: <a href="https://html5up.net">HTML5 UP</a></li>
						</ul>
					</div>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
