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

//ユーザー情報
/*$sql ="CREATE TABLE user_info"
."("
."id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,"
."username VARCHAR(50) NOT NULL,"
."password VARCHAR(128) NOT NULL,"
."flag TINYINT(1) NOT NULL DEFAULT 1"
.");";
$stmt = $pdo ->query($sql);*/

$sql ="CREATE TABLE if_then"
."("
."id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,"
."userid INT NOT NULL,"
."title VARCHAR(120) NOT NULL,"
."if_text VARCHAR(120) NOT NULL,"
."the_ntext VARCHAR(120) NOT NULL"
.");";
$stmt = $pdo ->query($sql);

//テーブル確認
$sql ='SHOW TABLES';
$results = $pdo -> query($sql);
foreach($results as $row){
echo $row[0];
echo '<br>';
}
//内容
$sql ='SELECT*FROM if_then';
$result = $pdo ->query($sql);
foreach($result as $rows){
	echo $rows['id'];
	echo $rows['userid'];
	echo $rows['title'];
	//echo $rows['if_text'];
	echo $rows['the_ntext'];
	echo '<br>';
}

//削除
/*$sql ="delete from if_then";
$statement = $pdo -> query($sql);
$sql ="ALTER TABLE if_then AUTO_INCREMENT = 1";
$outcomes =$pdo ->query($sql)*/
?>