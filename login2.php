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
			登入 - Terraria Wiki
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
							<li><a href="yt_api.php">官方影片</a></li>
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
									<h1>登入</h1>
									<?php
										$link = new PDO('pgsql:host='.$hostname.';port='.$port.';dbname='.$database,$username, $password);
											// 寫入SQL語法到變數
											if(!isset($_GET["account"])||!isset($_GET["password"]))//初始無輸入值時若有人意外進入此網頁則不顯示
											{
												echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
											}
											elseif($_GET["account"]==NULL||$_GET["password"]==NULL)//若帳號密碼為空顯示提醒字串
											{
												echo "<h3>帳號密碼不得為空</h3>";
												echo '<meta http-equiv=REFRESH CONTENT=2;url=login.php>';
											}
											else
											{	
												$account = $_GET["account"];
												$password = $_GET["password"];
												$account = addslashes($account);
												$password = addslashes($password);
												// 將輸入的帳號密碼使用SQL語法編譯並放入變數
												$query = "SELECT * FROM public.user where account like '".$account."';";
												// 將SQL語法執行並把結果放入陣列
												$result = $link->query($query);
												foreach ($result as $row);
												//如果無查詢結果顯示登入失敗
												if(!isset($row[1]))
												{
													echo "<h3>登入失敗</h3>";
													echo '<meta http-equiv=REFRESH CONTENT=2;url=login.php>';
												}
												//若帳號密碼正確將帳號放入cookie，並顯示登入成功
												elseif($row[1]==$account&&$row[2]==$password)
												{
													setcookie('account',$account);
													echo "<h3>登入成功</h3>";
													echo '<meta http-equiv=REFRESH CONTENT=2;url=note.php>';
												}
												//其餘意外狀況皆顯示登入失敗
												else
												{
													echo "<h3>登入失敗</h3>";
													echo '<meta http-equiv=REFRESH CONTENT=2;url=login.php>';
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
