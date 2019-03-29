<?php
session_start();

//DB接続
try {
$dsn = 'mysql:dbname=naotobass_ifthen;host=mysql1.php.xdomain.ne.jp;charset=utf8';
$user = 'naotobass_db';
$password ='kiyomori11';
$pdo = new PDO($dsn,$user,$password);
}catch (PDOException $e) {
exit('データベースに接続できませんでした。' . $e->getMessage());
}

if(!$_GET['title']==""){
$_SESSION['title'] = $_GET['title'];
}

//削除
$delete_number = htmlspecialchars($_POST['delete_number']);
$sql ="delete from if_then where id=$delete_number";
$statement = $pdo -> query($sql);
?>
<!Doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<title>If-Then Planning~コンテンツ~</title>
</head>
<body>
	<!--タイトル-->
	<div class="my_page_title">
		<h1>If-Then Plannning</h1>
	</div>
	<!--内容-->
	<div class="content">
		<div class="it_title">
			<h1><?php echo $_SESSION['title'];?></h1>
		</div>
		<div class="it_content">
			<table border="1">
				<thead>
					<tr>
						<th class="ifbox">IF</th>
						<th class="thenbox">THEN</th>
					</tr>
				</thead>
				<tbody>
			<?php
			//if-then内容取得
			$sql="SELECT*FROM if_then where userid='$_SESSION[userid]' && title='$_SESSION[title]'";
			$results = $pdo -> query($sql);
				foreach($results as $row){
					$number = $row['id'];
					echo "<tr>";
					echo "<td>";
					echo $row['if_text'];
					echo "</td>";
					echo "<td>";
					echo $row['the_ntext'];
					echo "</td>";
			echo "</tr>";
				}
			?>
				</tbody>
			</table>
		</div>
	</div>
	<p  class="return"><a href="my_page.php">マイページに戻る</a></p>
</body>
</html>