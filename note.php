<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<?php
	//將資料庫連線所需變數引入
	include ("sql.php");
?>
<html>
	<head>
		<title>討論區 - Terraria Wiki</title>
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

						<!-- Post -->
							<section class="post">
								<header class="major">
									<h1>討論區</h1>
									<h3>這裡是提供玩家們對網站改善提出意見或是討論遊戲相關話題的區域，請大家踴躍發言</h3>
								</header>
								<table id="customDataTable" width="950" align="center" cellpadding="3" cellspacing="0" border="1">
									<thead>
									<tr align=center class='order col-xs-12'><td width="50">帳號</td><td width="200">標題</td><td width="480">內文</td><td>發文時間</td><td>修改</td><td>刪除</td></tr>
									</thead>
									<tbody>
									<?php
									// 建立與MySQL資料庫的連線
									$link = new PDO('pgsql:host='.$hostname.';port='.$port.';dbname='.$database,$username, $password);
									// 寫入SQL語法到變數
									$query = "SELECT to_char(Time,'YYYY-Mon-dd') AS Time,Title,account,ID,Description FROM Note ORDER BY  DESC;";
									$result = $link->query($query);
									//印出
									foreach ($result as $row)						
									{
										echo "		<tr class='order col-xs-12'><td data-th='帳號'>".$row["account"]."</td><td data-th='標題'>".$row["title"]."</td><td data-th='內文'>".nl2br($row["description"])."</td><td data-th='發文時間'>".$row["time"]."</td><td data-th='修改'><a href='modifynote1.php?ID=".$row["id"]."&account=".$row["account"]."'>修改</a></td><td data-th='刪除'><a href='removenote.php?ID=".$row["id"]."&account=".$row["account"]."'>刪除</a></td></tr>";
									}
									//如果已經登入則顯示所登入帳號
									if(isset($_COOKIE['account']))
									{
										echo"<h3>已登入:".$_COOKIE['account']."</h3>";
									}
									?>
									</tbody>
								</table><br>
								<form action="addnote.php" method="post">
								標題<input type="text" name="title"></br>
								內文<textarea cols="50" rows="10" name="description"></textarea></br>
								圖片<input type="file" name="file" accept="image/*"></br>
								<input type="submit" value="新增資料">
							</section>

					</div>
				<!-- Copyright -->
					<div id="copyright">
						<ul>
							<li>
								&copy; Untitled
							</li>
							<li>
								Design: <a href="https://html5up.net">HTML5 UP</a>
							</li>
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
