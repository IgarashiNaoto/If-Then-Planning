<?php
// セッション開始
session_start();
// セッション変数を全て削除
$_SESSION = array();
// セッションクッキーを削除
if (isset($_COOKIE["PHPSESSID"])) {
  setcookie("PHPSESSID", '', time() - 1800, '/');
}
// セッションの登録データを削除
session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>If-Then Planning~ログアウト~</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<!--タイトル-->
	<div class="my_page_title">
		<h1>If-Then Plannning</h1>
	</div>

<div class="contents_box">
	<div  class="confirm_box">
		<h1>ログアウトしました</h1>
		<p><a href="rogin.php">ログイン画面へ</a></p>
	</div>
</div>
</body>
</html>