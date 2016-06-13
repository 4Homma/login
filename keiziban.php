<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>掲示板画面</title>
</head>
<body>
<?php
try{
  $dsn = 'mysql:dbname=login;host=localhost';
  $user ='root';
  $password='';
  $dbh = new PDO($dsn,$user,$password);
  $dbh->query('SET NAMES utf8');
  $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
  print 'データベースに接続出来ました。';
}catch(PDOException $e){
  die('エラーメッセージ：'.$e->getMessage());
}


if(isset($_GET['add'])){
  $text = $_GET['item'];
$text = htmlspecialchars($text, ENT_QUOTES);
$stmt = $dbh->prepare('INSERT INTO logi(item) VALUES(:text)');
$stmt->bindValue(':text',$text);
$stmt-> execute();
unset($stt);
}



 ?>
<h1>掲示板画面</h1>
<form action="keiziban.php" method="get">
  <input type="text" name="item"><input type="submit" name="add" value="add">
</form>
<ul>
  <?php
  $sql = 'SELECT id, item FROM logi;';
  $stmt = $dbh->prepare($sql);
  $stmt->execute();
  while($task = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo '<li>'.$task['item'].'</li>';
  }
  $dbh = null;
  ?>
</ul>
</body>
</html>
