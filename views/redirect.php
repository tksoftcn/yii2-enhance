<?php 
use tksoftcn\yii2\web\RedirectAsset;
use Yii;

$bundle = RedirectAsset::register($this);
$publishedUrl = Yii::$app->getAssetManager()->getPublishedUrl($bundle->sourcePath);

$this->beginPage();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=Edge" />
<title>提示信息</title>
<style type="text/css">
<!--
* {
	padding: 0;
	margin: 0;
	font-size: 12px
}

a:link,a:visited {
	text-decoration: none;
	color: #0068a6
}

a:hover,a:active {
	color: #ff6600;
	text-decoration: underline
}

.showMsg {
	border: 1px solid #1e64c8;
	zoom: 1;
	width: 450px;
	height: 172px;
	position: absolute;
	top: 44%;
	left: 50%;
	margin: -87px 0 0 -225px
}

.showMsg h5 {
	background-image: url(<?=$publishedUrl ?>/img/msg.png);
	background-repeat: no-repeat;
	color: #fff;
	padding-left: 35px;
	height: 25px;
	line-height: 26px;
	*line-height: 28px;
	overflow: hidden;
	font-size: 14px;
	text-align: left
}

.showMsg .content {
	padding: 46px 12px 10px 45px;
	font-size: 14px;
	height: 64px;
	text-align: left
}

.showMsg .bottom {
	background: #e4ecf7;
	margin: 0 1px 1px 1px;
	line-height: 26px;
	*line-height: 30px;
	height: 26px;
	text-align: center
}

.showMsg .ok,.showMsg .guery {
	background: url(<?=$publishedUrl ?>/img/msg_bg.png) no-repeat
		0px -560px;
}

.showMsg .guery {
	background-position: left -460px;
}
-->
</style>

<?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
	<div class="showMsg" style="text-align: center">
		<h5>提示信息</h5>
		<div class="content guery"
			style="display: inline-block; display: -moz-inline-stack; zoom: 1; *display: inline; max-width: 330px"><?php echo $msg?></div>
		<div class="bottom">
    <?php if($url=='goback' || $url=='') {?>
	<a href="javascript:history.back();">[点这里返回上一页]</a>
	<?php } elseif($url=="close") {?>
	<input type="button" name="close" value="关闭" onclick="window.close();" />
	<?php } elseif($url=="blank") {?>
	
	<?php
				} elseif ($url) {
					?>
	<a href="<?php echo $url?>">如果您的浏览器没有自动跳转，请点击这里</a> <script
					type="text/javascript">setTimeout("redirect('<?php echo $url?>');",<?php echo $ms?>);</script> 
	<?php }?>
	<?php if ($returnjs) { ?> <script type="text/javascript"><?php echo $returnjs;?></script><?php } ?>
	<?php if ($dialog):?><script type="text/javascript">window.top.right.location.reload();window.top.art.dialog({id:"<?php echo $dialog?>"}).close();</script><?php endif;?>

		</div>
	</div>
	<script type="text/javascript">
	function redirect(url) {
		location.href = url;
	}	
	function close_dialog() {
		window.top.right.location.reload();window.top.art.dialog({id:"<?php echo $dialog?>"}).close();
	}
</script>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>