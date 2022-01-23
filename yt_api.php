<!DOCTYPE HTML>
<!--
	Massively by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>
			官方影片
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
						<a href="index.php" class="logo">Terraria</a>
					</header>
				<!-- Nav -->
					<nav id="nav">
						<ul class="links">
							<li><a href="index.php">首頁</a></li>
							<li class="active"><a href="yt_api.php">官方影片</a></li>
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
							<li><a href="https://github.com/GuoJiaSetsuna/teerrariawiki" class="icon brands fa-github"><span class="label">GitHub</span></a></li>
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">
						<div align="center">
							<h1 id="p">官方影片</h1>
						</div>
						<!-- Posts -->
							<section class="posts">
								<?php
								//設定第一頁FOR迴圈的顯示所需變數
								$j=6;
								//抓取YT頻道API,playlistId為抓取頻道的ID,key為API抓取者的API金鑰,maxResults為所要抓取的影片數量最大為50
								$url = "https://www.googleapis.com/youtube/v3/playlistItems?part=snippet,contentDetails,status&playlistId=UUq3QzpKNapKhCl4jpgQB44w&key=AIzaSyBcq35ojaeSWUGtg4LtITyN5WC1c4HcHCk&maxResults=36";
								//將所抓取的API json檔做處理
								$json = file_get_contents($url);
								$file = json_decode($json,true);
								//用IF,else判斷是否為第一頁,如是則進入

									for($i=0; $i<$j ; $i++ )
									{
										//以設計好的版型顯示該筆資料
										echo "<article>
												<header>
													<h2>".$file['items'][$i]['snippet']['title']."</h2>
												</header>
												<p><a class='image fit'><img src='".$file['items'][$i]['snippet']['thumbnails']['standard']['url']."' alt=''></a>"
												.mb_substr($file['items'][$i]['snippet']['description'],0,300)."</p>
												<ul class='actions special'>
													<li><a href=' https://www.youtube.com/watch?v=".$file['items'][$i]['snippet']['resourceId']['videoId']."' class='button'>查看更多</a></li>
												</ul>
											</article>";
									}

								?>
							</section>
						<!-- Footer -->
							<footer>
							<?php
							//判斷是否為第一頁,若是則進入
							if(!isset($_GET["page"]))
							{
							?>
								<div class="pagination">
									<!--<a href="#" class="previous">Prev</a>-->
									<!--切換頁碼時會跳至網頁的遊戲新聞位置-->
									<a href="yt_api.php#p" class="page active">1</a>
									<a href="yt_api.php?page=2#p" class="page">2</a>
									<a href="yt_api.php?page=3#p" class="page">3</a>
									<a href="yt_api.php?page=4#p" class="page">4</a>
									<a href="yt_api.php?page=5#p" class="page">5</a>
									<a href="yt_api.php?page=6#p" class="page">6</a>
									<a href="yt_api.php?page=2#p" class="next">Next</a>
								</div>
							<?php
							}
							//若不是第一頁則進入
							else
							{
							?>
								<div class="pagination">
									<!--<a href="#" class="previous">Prev</a>-->
									<!--切換頁碼時會跳至網頁的遊戲新聞位置,且依照當下為哪一頁該頁碼醒目顯示,最後next按鈕依照當下頁碼改變目標頁碼網址-->
									<a href="yt_api.php#p" class="page">1</a>
									<a href="yt_api.php?page=2#p" class="page<?php if($_GET["page"]==2){echo" active"; }?>">2</a>
									<a href="yt_api.php?page=3#p" class="page<?php if($_GET["page"]==3){echo" active"; }?>">3</a>
									<a href="yt_api.php?page=4#p" class="page<?php if($_GET["page"]==4){echo" active"; }?>">4</a>
									<a href="yt_api.php?page=5#p" class="page<?php if($_GET["page"]==5){echo" active"; }?>">5</a>
									<a href="yt_api.php?page=6#p" class="page<?php if($_GET["page"]==6){echo" active"; }?>">6</a>
									<a href="yt_api.php?page=<?php $p = $_GET["page"]+1;if($_GET["page"]<=5){echo $p;}else{echo $_GET["page"];}?>#p" class="next">Next</a>
								</div>
							<?php
							}
							?>
							</footer>
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
