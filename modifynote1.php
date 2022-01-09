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
			討論區 修改文章 - Terraria Wiki
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
							<li class="active"><a href="note.php">討論區</a></li>
							<li><a href="login.php">登入</a></li>
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
									<h1>修改</h1>
									<?php
										if (!isset($_GET["ID"])||$_GET["ID"]==NULL)//初始無輸入值時若有人意外進入此網頁則不顯示
										{
											echo '<meta http-equiv=REFRESH CONTENT=1;url=note.php>';
										}
										else
										{
											// 接收使用者所傳送之ID與帳號
											$ID = $_GET["ID"];
											$acc = $_GET["account"];
											$cookie =$_COOKIE['account'];
											$link = new PDO('mysql:host='.$hostname.';dbname='.$database.';charset=utf8', $username, $password);
											//使用ID對資料庫之留言資料表進行搜尋
											$query = "SELECT`Note`.`Title`,`Note`.`ID`,`Note`.`Description` FROM `Note` WHERE `Note`.`ID` = '$ID' ;";
											$result = $link->query($query);
											//將搜尋結果放入text
											while ($row=$result->fetch(PDO::FETCH_ASSOC))
											{
												$title = $row['Title'];
												$description = $row['Description'];
											}
											//若帳號與發文者不相同則顯示提醒文字並返回討論區
											if($acc!=$cookie)
											{
												echo "<h1>您不是發文者並沒有權限修改</h1>";
												echo '<meta http-equiv=REFRESH CONTENT=3;url=note.php>';
											}
										}
									?>
									<form action="modifynote2.php" method="post">
									<input type="hidden" name='ID' value="<?php echo $ID; ?>">
									標題<input type='text' name='title' value='<?php echo $title; ?>'></br>
									內文<textarea cols='50' rows='10' name='description'><?php echo $description; ?></textarea></br>
									<input type="submit" value="修改資料"><input type="button" value="取消" onclick="location.href='http://localhost/displaynote.php'">
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