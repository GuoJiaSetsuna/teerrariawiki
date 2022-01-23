<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<?php
	//將資料庫連線所需變數引入
	include ("sql.php");
?>
<html>
	<head>
		<title>盔甲 - Terraria Wiki</title>
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
							<li  class="active"><a href="armor.php">盔甲</a></li>
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

						<!-- Post -->
							<section class="post">
								<header class="major">
									<h1>盔甲</h1>
									<h3>盔甲是一套可裝備的防禦物品，能降低敵怪和大多數其他傷害源所造成的傷害。盔甲部件通過放置在玩家的物品欄的盔甲欄中進行裝備。
										盔甲也可以放在時裝欄中來改變玩家的外貌同時又不影響屬性。盔甲散件也可以製作得到、從 NPC 處購買、或掉落自敵怪。
										每件盔甲都有防禦屬性，能將所受到的傷害的數值減少一半 / 75% / 全部，向上取整。
										在單件盔甲提供的防禦之外，大多數盔甲類型在同時穿上同一盔甲類型的全部三個部件時會提供套裝獎勵對於基本的困難模式之前的礦石盔甲（銅盔甲到鉑金盔甲），這就是額外的一點防禦力。
										更高級的或獨特的盔甲能提供其他專門的套裝獎勵（例如，蘑菇礦盔甲提供了在不移動時隱身的能力）。</h3>
								</header>
								<form method="GET" action="armor.php">
									<p>請輸入所要查詢的盔甲名稱關鍵字<input type="text" name="amname"></p>
									<input type="submit" value="查詢">
								</form>
								<table id="customDataTable" width="950" align="center" cellpadding="3" cellspacing="0" border="1">
									<thead>
									<tr align=center class="headers col-xs-12"><td width="50">外觀</td><td>套裝</td><td>頭部</td><td>胸部</td><td>腿部</td><td>共計</td><td>獎勵&ensp;/&ensp;效果&ensp;/&ensp;備註</td><td>花費&ensp;/&ensp;來源&ensp;/&ensp;製作於</td></tr>
									</thead>
									<tbody>
									<?php
										// 建立與MySQL資料庫的連線
										$link = new PDO('pgsql:host='.$hostname.';port='.$port.';dbname='.$database,$username, $password);
										if(!isset($_GET["amname"]))//初始無輸入值時將全部資料印出
										{
											// 寫入SQL語法到變數
											$query = "SELECT * FROM armor ORDER BY ID;";
											// 將SQL語法執行並把結果放入陣列
											$result = $link->query($query);
											// 將結果印出
											foreach ($result as $row)
											{
												echo "<tr class='order col-xs-12'><td data-th='外觀'>".$row["image"]."</td><td data-th='套裝'>".$row["name"]."</td><td data-th='頭部'>".nl2br($row["head"])."</td><td data-th='胸部'>".nl2br($row["chest"])."</td><td data-th='腿部'>".nl2br($row["legs"])."</td><td data-th='共計'>".nl2br($row["total"])."</td><td width='300' data-th='獎勵/效果/備註'>".nl2br($row["bonuses"])."</td><td width='200' data-th='花費/來源/製作於'>".nl2br($row["source"])."</td></tr>";
											}
										}
										elseif($_GET["amname"]==NULL)//輸入值為空時印出全部資料並且提示輸入值為空
										{
											echo '輸入名稱為空';
											// 寫入SQL語法到變數
											$query = "SELECT * FROM armor ORDER BY ID;";
											// 將SQL語法執行並把結果放入陣列
											$result = $link->query($query);
											// 將結果印出
											foreach ($result as $row)
											{
												echo "<tr class='order col-xs-12'><td data-th='外觀'>".$row["image"]."</td><td data-th='套裝'>".$row["name"]."</td><td data-th='頭部'>".nl2br($row["head"])."</td><td data-th='胸部'>".nl2br($row["chest"])."</td><td data-th='腿部'>".nl2br($row["legs"])."</td><td data-th='共計'>".nl2br($row["total"])."</td><td width='300' data-th='獎勵/效果/備註'>".nl2br($row["bonuses"])."</td><td width='200' data-th='花費/來源/製作於'>".nl2br($row["source"])."</td></tr>";
											}
										}
										else//輸入值不為空時執行搜尋
										{
											$amname = $_GET["amname"];
											// 寫入SQL語法到變數
											$query = "SELECT *  FROM armor WHERE (name LIKE '".$amname."' OR name LIKE '%".$amname."%') ORDER BY ID ASC;";
											// 將SQL語法執行並把結果放入陣列
											$result = $link->query($query);
											// 將結果印出
											foreach ($result as $row)
											{
												echo "<tr class='order col-xs-12'><td data-th='外觀'>".$row["image"]."</td><td data-th='套裝'>".$row["name"]."</td><td data-th='頭部'>".nl2br($row["head"])."</td><td data-th='胸部'>".nl2br($row["chest"])."</td><td data-th='腿部'>".nl2br($row["legs"])."</td><td data-th='共計'>".nl2br($row["total"])."</td><td width='300' data-th='獎勵/效果/備註'>".nl2br($row["bonuses"])."</td><td width='200' data-th='花費/來源/製作於'>".nl2br($row["source"])."</td></tr>";
											}
										}
									?>
									</tbody>
								</table>
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
