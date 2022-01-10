<!DOCTYPE HTML>
<!--
	Massively by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>
			TERRARIA WIKI
		</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">
		<!-- Wrapper -->
			<div id="wrapper" class="fade-in">
				<!-- Intro -->
					<div id="intro">
						<h1>
							Terraria<br />Wiki
						</h1>
						<h2>歡迎來到 TERRARIA WIKI</h2>
						<ul class="actions">
							<li>
								<a href="#header" class="button icon solid solo fa-arrow-down scrolly">Continue</a>
							</li>
						</ul>
					</div>
				<!-- Header -->
					<header id="header">
						<a href="index.php" class="logo">Terraria</a>
					</header>

				<!-- Nav -->
					<nav id="nav">
						<ul class="links">
							<li class="active"><a href="index.php">首頁</a></li>
							<li><a href="weapons.php">武器</a></li>
							<li><a href="armor.php">盔甲</a></li>
							<li><a href="dps.php">DPS</a></li>
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

						<!-- Featured Post -->
							<article class="post featured">
								<header class="major">
									<h2><a href="#">遊戲簡介</a></h2>
									<p>挖掘、戰鬥、探險、建造！在這個動作感十足的冒險遊戲裡，沒有不可能的事。這世界是畫板，而這片大地本身就是您的顏料！
										<br>拿起你的工具並出發吧！製作武器來擊退各種敵人。挖到地底深處來取得配件，金錢，和很多其他非常有用的東西。收集資源來創造在您擁有的世界裡的所有東西。蓋個房子，堡壘，或甚至一座城堡。人們會搬到那裏，說不定還會賣您各式各樣的能協助您冒險的工具呢。
										<br>但小心，還有更多的挑戰在等著您... 您準備好接受任務了嗎？
										<br>重點特色：
										<br>&ensp;&bull;&ensp;<b>沙盒（Sandbox）遊戲模式</b>
										<br>&ensp;&bull;&ensp;<b>隨機建立的遊戲世界</b>
										<br>&ensp;&bull;&ensp;<b>免費的內容更新</b>
									</p>
									<font size="50"><b>關於</b></font>
									<a href="#" class="image main"><img src="assets/images/header.jpg" alt="" /></a>
									<p>發行日期：2011&ensp;年&ensp;5&ensp;月&ensp;17&ensp;日&ensp;<a href="https://zh.wikipedia.org/wiki/%E6%B3%B0%E6%8B%89%E7%91%9E%E4%BA%9A">維基百科</a>
										<br>開發人員：<a href="https://store.steampowered.com/developer/Re-Logic">Re-Logic</a>
										<br>發行商：<a href="https://store.steampowered.com/developer/Re-Logic">Re-Logic</a>
										<br>購買連結：<a href="https://store.steampowered.com/app/105600/Terraria/">STEAM</a>&ensp;,&ensp;<a href="https://www.playstation.com/zh-hant-tw/games/terraria/">PlayStation</a>&ensp;,&ensp;<a href="https://store.nintendo.com.hk/70010000023876">NintendoSwitch</a>
									</p>
								</header>
							</article>
							<div align="center">
								<h1>遊戲新聞</h1>
							</div>
						<!-- Posts -->
							<section class="posts">
								<?php
								$url = "https://api.steampowered.com/ISteamNews/GetNewsForApp/v0002/?appid=105600&count=6&maxlength=300&format=json";
								$json = file_get_contents($url);
								$file = json_decode($json,true);
								foreach($file['appnews']['newsitems'] as $key1 => $value1)
								{
									echo "<article>
											<header>
												<h2>".$file['appnews']['newsitems'][$key1]['title']."</h2>
											</header>
											<p>".$file['appnews']['newsitems'][$key1]['contents']."</p>
											<ul class='actions special'>
												<li><a href='".$file['appnews']['newsitems'][$key1]['url']."' class='button'>查看更多</a></li>
											</ul>
										</article>";
								}
								?>
							</section>
						<!-- Footer -->
							<footer>
								<div class="pagination">
									<!--<a href="#" class="previous">Prev</a>-->
									<a href="#" class="page active">1</a>
									<a href="#" class="page">2</a>
									<a href="#" class="page">3</a>
									<a href="#" class="page">4</a>
									<a href="#" class="page">5</a>
									<a href="#" class="page">6</a>
									<a href="#" class="page">7</a>
									<a href="#" class="next">Next</a>
								</div>
							</footer>
							<h2 align="center">聯絡我們</h2>
					</div>

				<!-- Footer -->
					<footer id="footer">
						<section>
							<form method="post" action="#">
								<div class="fields">
									<div class="field">
										<label for="name">Name</label>
										<input type="text" name="name" id="name" />
									</div>
									<div class="field">
										<label for="email">Email</label>
										<input type="text" name="email" id="email" />
									</div>
									<div class="field">
										<label for="message">Message</label>
										<textarea name="message" id="message" rows="3"></textarea>
									</div>
								</div>
								<ul class="actions">
									<li><input type="submit" value="Send Message" /></li>
								</ul>
							</form>
						</section>
						<section class="split contact">
							<section class="alt">
								<h3>Address</h3>
								<p>1234 Somewhere Road #87257<br />
								Nashville, TN 00000-0000</p>
							</section>
							<section>
								<h3>Phone</h3>
								<p><a href="#">(000) 000-0000</a></p>
							</section>
							<section>
								<h3>Email</h3>
								<p><a href="#">info@untitled.tld</a></p>
							</section>
							<section>
								<h3>Social</h3>
								<ul class="icons alt">
									<li><a href="https://twitter.com/terraria_logic" class="icon brands alt fa-twitter"><span class="label">Twitter</span></a></li>
									<li><a href="https://www.facebook.com/TerrariaOfficial/" class="icon brands alt fa-facebook-f"><span class="label">Facebook</span></a></li>
									<li><a href="https://www.instagram.com/terraria_logic/" class="icon brands alt fa-instagram"><span class="label">Instagram</span></a></li>
									<li><a href="#" class="icon brands alt fa-github"><span class="label">GitHub</span></a></li>
								</ul>
							</section>
						</section>
					</footer>

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
