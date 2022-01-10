<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<?php
	//將資料庫連線所需變數引入
	include ("sql.php");
?>
<html>
	<head>
		<title>武器 - Terraria Wiki</title>
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
							<li class="active"><a href="weapons.php">武器</a></li>
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

						<!-- Post -->
							<section class="post">
								<header class="major">
									<h1>武器</h1>
									<h3>武器是必不可少的物品，用於與敵怪、Boss、小動物、甚至是其他玩家（在 PvP 遊戲期間）戰鬥。一些武器可以在工作檯或困難模式之前/困難模式的砧處製作出來，其他的則只能在寶箱中找到、由敵怪掉落、或從 NPC 處購買。泰拉瑞亞有各種各樣的武器和武器類別，每一種都適用於特定的遊戲風格或特定的任務。
										大多數工具也能用作武器，儘管這並非其主要用途。從更廣泛的意義上說，機關、正在自衛的 NPC 電腦版、主機版、和移動版、甚至是熔岩也可以用作武器。</h3>
								</header>
								<form method="GET" action="weapons.php">
									<p>請輸入所要查詢的武器名稱關鍵字<input type="text" name="wpname"></p>
									<input type="submit" value="查詢">
								</form>
								<table id="customDataTable" width="950" align="center" cellpadding="3" cellspacing="0" border="1">
									<thead>
										<tr align=center class="headers col-xs-12">
											<th width="50">外觀</th>
											<th>名稱</th>
											<th>武器類型</th>
											<th>傷害</th>
											<th>擊退</th>
											<th>魔力/暴擊率</th>
											<th>使用時間</th>
											<th>射速</th>
											<th>稀有度</th>
											<th>掉落自or製作自</th>
										</tr>
									</thead>
									<tbody>
									<?php
										// 建立與MySQL資料庫的連線
										$link = new PDO('pgsql:host='.$hostname.';port='.$port.';dbname='.$database,$username, $password);
										// 寫入SQL語法到變數
										if(!isset($_GET["wpname"]))//初始無輸入值時將全部資料印出
										{
											// 寫入SQL語法到變數
											$query = "SELECT * FROM weapon ORDER BY type;";
											// 將SQL語法執行並把結果放入陣列
											$result = $link->query($query);
											// 將結果印出
											foreach ($result as $row)
											{
												echo "<tr class='order col-xs-12'><td data-th='外觀'><img src='".$row["image"]."'></td><td data-th='名稱'>".$row["name"]."</td><td data-th='武器類型'>".$row["type"]."</td><td data-th='傷害'>".$row["damage"]."</td><td data-th='擊退'>".$row["knockback"]."</td><td data-th='魔力／暴集率'>".$row["critical"]."</td><td data-th='使用時間'>".$row["Use time"]."</td><td data-th='射速'>".$row["velocity"]."</td><td data-th='稀有度'>".$row["rarity"]."</td><td data-th='掉落自or製作自'>".$row["dropped"]."</td></tr>";
											}
										}
										elseif($_GET["wpname"]==NULL)//輸入值為空時印出全部資料並且提示輸入值為空，並把所有結果顯示出來
										{
											echo '輸入名稱為空';
											// 寫入SQL語法到變數
											$query = "SELECT * FROM weapon ORDER BY type;";
											// 將SQL語法執行並把結果放入陣列
											$result = $link->query($query);
											// 將結果印出
											foreach ($result as $row)
											{
												echo "<tr class='order col-xs-12'><td data-th='外觀'><img src='".$row["image"]."'></td><td data-th='名稱'>".$row["name"]."</td><td data-th='武器類型'>".$row["type"]."</td><td data-th='傷害'>".$row["damage"]."</td><td data-th='擊退'>".$row["knockback"]."</td><td data-th='魔力／暴集率'>".$row["critical"]."</td><td data-th='使用時間'>".$row["Use time"]."</td><td data-th='射速'>".$row["velocity"]."</td><td data-th='稀有度'>".$row["rarity"]."</td><td data-th='掉落自or製作自'>".$row["dropped"]."</td></tr>";										}
										else//輸入值不為空時執行搜尋
										{
											$wpname = $_GET["wpname"];
											//將輸入的關鍵字用SQL LIKE語法進行搜尋
											$query = "SELECT *  FROM weapon WHERE (name LIKE '".$wpname."' OR name LIKE '%".$wpname."%') ORDER BY ID ASC;";
											// 將SQL語法執行並把結果放入陣列
											$result = $link->query($query);
											// 將結果印出
											foreach ($result as $row)
											{
												echo "<tr class='order col-xs-12'><td data-th='外觀'><img src='".$row["image"]."'></td><td data-th='名稱'>".$row["name"]."</td><td data-th='武器類型'>".$row["type"]."</td><td data-th='傷害'>".$row["damage"]."</td><td data-th='擊退'>".$row["knockback"]."</td><td data-th='魔力／暴集率'>".$row["critical"]."</td><td data-th='使用時間'>".$row["Use time"]."</td><td data-th='射速'>".$row["velocity"]."</td><td data-th='稀有度'>".$row["rarity"]."</td><td data-th='掉落自or製作自'>".$row["dropped"]."</td></tr>";
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

	</body>
</html>
