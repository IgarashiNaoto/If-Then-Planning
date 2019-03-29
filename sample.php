<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
<a href="<?php echo $_SERVER['PHP_SELF']; ?>?time=<?php echo urlencode('現在時刻は：'.date('Y/m/d H:i:s')); ?>">現在時刻を送信します。<?php echo '現在時刻は：'.date('Y/m/d H:i:s'); ?></a><br/>
</form>
<?php
//$_GET['time']が存在していれば
if(isset($_GET['time']) && $_GET['time'] != ''){
    echo '<strong>$_GET[\'time\']が送信されました。値は[ '.$_GET['time'].' ]です。'."</strong><br/>\n";
    ?>
<?php
}else{
    echo '<strong>$_GET[\'time\']はまだ送信されていません。'."</strong><br/>\n";
}
?>