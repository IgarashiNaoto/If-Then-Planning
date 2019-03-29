<?php
session_start();

//DB情報
try {
$dsn = 'mysql:dbname=naotobass_ifthen;host=mysql1.php.xdomain.ne.jp;charset=utf8';
$user = 'naotobass_db';
$password ='kiyomori11';
$pdo = new PDO($dsn,$user,$password);
}catch (PDOException $e) {
exit('データベースに接続できませんでした。' . $e->getMessage());
}



if(isset($_POST['user_name'])&&isset($_POST['pass'])){
//変数格納
$user_name= htmlspecialchars($_POST['user_name']);
$pass = htmlspecialchars($_POST['pass']);
//照合
$sql = "SELECT*FROM user_info  where username='$user_name' and password ='$pass'";
$result = $pdo ->query($sql);
foreach($result as $rows){
	if($user_name==$rows['username']&&$pass==$rows['password']){
			$_SESSION['userid'] = $rows['id'];
			header("Location: my_page.php");
		}else{
		echo "ユーザー名またはパスワードが違います";
		}
		}
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
	<!--ログインフォーム-->
	<div class="contents_box">
	<div class="rog_in">
		<form action="rogin.php" method="post">
			<label class="rogin_text">ユーザーネーム</label><br>
			<input type="text" name="user_name"><br>
			<label class="rogin_text">パスワード</label><br>
			<input type="text" name="pass"><br>
			<input type="submit" value="ログイン">
		</form>
	</div>
	<!--新規登録フォーム-->
	<div class="new">
		<a href="registrate.php"><p  class="new_text">新規登録</p></a>
	</div>
	</div>
</body>
</html>