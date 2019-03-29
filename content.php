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
echo $_SESSION['title'];
echo $_SESSION['userid'];;

//削除
$delete_number = htmlspecialchars($_POST['delete_number']);
echo $delete_number;
$sql ="delete from if_then where id=$delete_number";
$statement = $pdo -> query($sql);
?>
<!Doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>If-Then Planning~コンテンツ~</title>
</head>
<body>
	<!--タイトル-->
	<div class="title">If-Then Planning</div>
	<!--内容-->
	<div class="content">
		<div class="it_title">
			<?php echo $_SESSION['title'];?>
		</div>
		<div class="it_content">
			<table border="1">
				<thead>
					<tr>
						<th>IF</th>
						<th>THEN</th>
						<th>削除</th>
						<th>編集</th>
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
					echo "<td>";
					echo "<form action='content.php' method='post'>";
					echo "<input type='hidden' name='delete_number' value='$number'>";
					echo "<input type='submit' value='削除'>";
					echo "</form>";
					echo "</td>";
					echo "<td>";
					echo "<form action='edit.php' method='post'>";
					echo "<input type='hidden' name='edit_number' value='$number'>";
					echo "<input type='submit' value='編集'>";
					echo "</form>";
					echo "</td>";
					echo "</tr>";
				}
			?>
				</tbody>
			</table>
		</div>
	</div>
	<p><a href="my_page.php">マイページに戻る</a></p>
</body>
</html>