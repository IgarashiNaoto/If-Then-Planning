<?php
session_start();
$userid = $_SESSION['userid'];

//DB接続
try {
$dsn = 'mysql:dbname=naotobass_ifthen;host=mysql1.php.xdomain.ne.jp;charset=utf8';
$user = 'naotobass_db';
$password ='kiyomori11';
$pdo = new PDO($dsn,$user,$password);
}catch (PDOException $e) {
exit('データベースに接続できませんでした。' . $e->getMessage());
}
$sql ="SELECT*FROM if_then where userid='$userid' and id='$_POST[edit_number])'";
$results = $pdo -> query($sql);
foreach($results as $row){
	$iftext = $row['if_text'];
	$thentext = $row['the_ntext'];
}

if(!empty($_POST['edit_number'])){
 $edit_number = htmlspecialchars($_POST['edit_number']);
 $new_if = htmlspecialchars($_POST['new_if']);
 $new_then = htmlspecialchars($_POST['new_then']);

//編集機能
 $sql = "update if_then set if_text='$new_if', the_ntext='$new_then' where userid=$_SESSION[userid] and id=$edit_number";
 $stm = $pdo -> query($sql);
}else{
	echo "error";
}
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
	<!--編集画面-->
	<div class="contents_box">
	<div class="edit_box">
	<form action="edit.php" method="post">
		<ul class="if_box">
			<li class="if_title"><label class="edit_if">IF</label></li>
			<li class="if_content"><textarea name="new_if" rows="2" cols="20" required="required"><?php echo $iftext;?></textarea></li>
		</ul>
		<ul class="then_box">
			<li class="then_title"><label class="edit_then">THEN</label></li>
			<li class="then_content"><textarea name="new_then" rows="2" cols="20" required="required"><?php echo $thentext;?></textarea></li>
		</ul>
		<input type="hidden" name="edit_number" value="<?php echo $edit_number;?>">
		<input type="submit" value="登録" class="btn">
	</form>
	</div>
	</div>
		<p  class="return"><a href="my_page.php">マイページに戻る</a></p>
</body>
</html>
