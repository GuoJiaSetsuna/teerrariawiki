<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<?php
	//將資料庫連線所需變數引入
	include ("sql.php");
?>
<html>
	<head>
		<title>DPS計算器 - Terraria Wiki</title>
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
							<li class="active"><a href="dps.php">DPS</a></li>
							<li><a href="note.php">討論區</a></li>
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

						<!-- Post -->
							<section class="post">
								<header class="major">
									<h1>DPS(每秒攻擊傷害)計算器</h1>
									<?php
										if(!isset($_GET["dmg"])||!isset($_GET["crit"])||!isset($_GET["critdmg"])||!isset($_GET["speed"])||!isset($_GET["buff"])||!isset($_GET["dot"])||!isset($_GET["hp"])||!isset($_GET["armor"])||!isset($_GET["hot"]))
										{//初始無輸入值時不顯示
										}
										elseif($_GET["dmg"]==NULL||$_GET["crit"]==NULL||$_GET["critdmg"]==NULL||$_GET["speed"]==NULL||$_GET["buff"]==NULL||$_GET["dot"]==NULL||$_GET["hp"]==NULL||$_GET["armor"]==NULL||$_GET["hot"]==NULL)
										{//輸入值為空時提示字樣
											echo '<font size="50"><b>以下數值全皆不得為空</b></font>';
										}
										else
										{
											// DPS算式
											$dps = (((($_GET["dmg"]*(1+($_GET["buff"]/100)))*(1+($_GET["crit"]/100)*($_GET["critdmg"]/100)))*$_GET["speed"])+$_GET["dot"]);//計算DPS
											echo "攻擊者的理想DPS(每秒攻擊傷害)是:$dps<br>";
											//所需擊殺時間算式
											$time = $_GET["hp"]/(((($_GET["dmg"]*(1+($_GET["buff"]/100)))*(1+($_GET["crit"]/100)*($_GET["critdmg"]/100)))*(1-($_GET["armor"]/100))*$_GET["speed"])+($_GET["dot"]-$_GET["hot"]));//計算擊殺時間
											if($time<0) //如果time<0代表傷害低於目標每秒回血則回傳無法擊殺
											{
												echo "<font size="50"><b>你無法擊殺目標</b></font>";
											}
											else //回傳擊殺目標所需時間
											{
												echo "<font size="50"><b>攻擊者必須至少花.$time.秒才能殺死目標</b></font>";
											}
										}
									?>
									<form method="GET" action="dps.php">
										<p>請輸入基礎傷害數值:<br><input type="text" name="dmg"></p>
										<p>請輸入爆擊機率(單位:%):<br><input type="text" name="crit"></p>
										<p>請輸入爆擊傷害倍率(單位:%):<br><input type="text" name="critdmg"></p>
										<p>請輸入攻擊速度(單位:每秒攻擊次數):<br><input type="text" name="speed"></p>
										<p>請輸入傷害提升BUff倍率(單位:%):<br><input type="text" name="buff"></p>
										<p>請輸入DOT(流血、中毒等等)效果數值:<br><input type="text" name="dot"></p>
										<p>請輸入攻擊目標血量:<br><input type="text" name="hp"></p>
										<p>請輸入攻擊目標防禦力減免數值(單位:%):<br><input type="text" name="armor"></p>
										<p>請輸入攻擊目標回血數值(單位:每秒回血量):<br><input type="text" name="hot"></p>
										<input type="submit" value="查詢">
										<input type="reset" value="清空">
									</form>
								</header>
							</section>

					</div>
				<!-- Copyright -->
					<div id="copyright">
						<ul><li>&copy; Untitled</li><li>Design: <a href="https://html5up.net">HTML5 UP</a></li></ul>
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
		<!-- Global site tag (gtag.js) - Google Analytics -->
			<script async src="https://www.googletagmanager.com/gtag/js?id=G-7CKNK56WQ8"></script>
			<script>
			  window.dataLayer = window.dataLayer || [];
			  function gtag(){dataLayer.push(arguments);}
			  gtag('js', new Date());

			  gtag('config', 'G-7CKNK56WQ8');
			</script>

	</body>
</html>
