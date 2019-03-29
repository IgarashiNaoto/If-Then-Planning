<?php
//DB情報
try {
$dsn = 'mysql:dbname=naotobass_ifthen;host=mysql1.php.xdomain.ne.jp;charset=utf8';
$user = 'naotobass_db';
$password ='kiyomori11';
$pdo = new PDO($dsn,$user,$password);
}catch (PDOException $e) {
exit('データベースに接続できませんでした。' . $e->getMessage());
}


if(!empty($_POST['username'])&&!empty($_POST['pass'])){
//変数格納
$user_name= htmlspecialchars($_POST['username']);
$pass = htmlspecialchars($_POST['pass']);

//情報登録
$statement = $pdo->prepare("INSERT INTO user_info (username,password) VALUES (:username,:password)");
		$statement->bindValue(':username', $user_name, PDO::PARAM_STR);
		$statement->bindValue(':password', $pass, PDO::PARAM_STR);
		$statement->execute();
		//登録完了ページへ
		header("Location: confirm.html");
		}
?>
<!Doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>If-Then Planning~ログイン~</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="style.css">
</head>
<body>
<!--タイトル-->
	<div class="title">
		<h1>If-Then Plannning</h1>
	</div>
<!--登録フォーム-->
<div class="contents_box">
	<div class="registrate_box">
	<form action="registrate.php" method="post">
		<label class="registrate_text">ユーザーネーム</label><br>
		<input type="text" name="username" required="required"><br>
		<label class="registrate_text">パスワード</label><br>
		<input type="text" name="pass" required="required"><br>
		<input type="submit" value="登録">
	</form>
	</div>
</div>
</body>
</html>