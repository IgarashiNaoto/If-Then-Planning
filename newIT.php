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
	//変数定義
	$title = htmlspecialchars($_POST['title']);
	$if_text = htmlspecialchars($_POST['if']);
	$then_text = htmlspecialchars($_POST['then']);
	$userid = $_SESSION['userid'];

	//データ登録
	if(!empty($title)&&!empty($if_text)&&!empty($then_text)&&!empty($userid)){
		//情報登録
		$statement = $pdo->prepare("INSERT INTO if_then (userid,title,if_text,the_ntext) VALUES (:userid,:title,:if_text,:the_ntext)");
		$statement->bindValue(':userid', $userid, PDO::PARAM_STR);
		$statement->bindValue(':title', $title, PDO::PARAM_STR);
		$statement->bindValue(':if_text', $if_text, PDO::PARAM_STR);
		$statement->bindValue(':the_ntext', $then_text, PDO::PARAM_STR);
		$statement->execute();
		echo "登録しました";
}
?>
<!Doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>If-Then Planning~新規作成~</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<!--タイトル-->
	<div class="title">
		<h1>If-Then Plannning</h1>
	</div>
	<!--新規作成-->
	<div class="contents_box">
	<div class="newit_box">
	<form action="newIT.php" method="post">
		<label class="newit_text">リストタイトル</label><br>
		<input type="text" name="title" required="required"><br>
		<ul class="if_box">
			<li class="if_title"><label class="newit_text">IF</label></li>
			<li class="if_content"><textarea name="if" rows="2" cols="20" required="required"></textarea></li>
		</ul>
		<ul class="then_box">
			<li class="then_title"><label class="newit_text">THEN</label></li>
			<li class="then_content"><textarea name="then" rows="2" cols="20" required="required"></textarea></li>
		</ul>
		<input type="submit" value="登録" class="btn">
	</div>
	</form>
	</div>
		<p class="return"><a href="my_page.php">マイページに戻る</a></p>
</body>
</html>
