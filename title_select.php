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

$_SESSION['title'] = $_POST['title'];
echo $_SESSION['title'];
//ユーザー特定
$userid = $_SESSION['userid'];
$sql = "SELECT*FROM user_info where id='$userid'";
$result = $pdo -> query($sql);
foreach($result as $row){
	$username = $row['username'];
}

//タイトル取得
$sql="SELECT*FROM if_then where userid='$userid'";
$results = $pdo -> query($sql);
$data = $results->fetchall();
$title = array_column($data, 'title');
$main_title =array_unique($title);

?>

<!Doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<title>If-Then Planning~タイトル選択~</title>
</head>
<body>
	<!--タイトル-->
	<div class="my_page_title">
		<h1>If-Then Plannning</h1>
	</div>
	<!--内容-->
	<div class="list">
		<p class="list_all">リスト一覧</p>
		<?php
		foreach($main_title as $rows){
			//$_SESSION['title'] = $rows;
			echo "<li>";
			//echo "<form name='form_title' action='my_page.php' method='post'>";
			//echo "<input type='hidden' name='title' value='$rows'>";
			echo "<a href='edit_select.php?title=$rows'>";
			echo "<p class='list_content'>";
			echo $rows;
			echo "</p>";
			echo "</a>";
			//echo "</form>";
			//echo $_SESSION['title'];
			echo "</li>";
			echo "<br>";
		}
		?>
	</div>
	<p class="return"><a href="my_page.php">マイページに戻る</a></p>
</body>
</html>