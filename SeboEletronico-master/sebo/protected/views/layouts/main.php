
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/img/android.ico">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
        
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/sebo_header.png" class="imgHeader"/></div>
	</div>

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
                                array('label'=>'Usuário', 'url'=>array('/usuario/index'))
//				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user),
//				array('label'=>'Logout ', 'url'=>array('/site/logout'), 'visible'=>Yii::app()->user)
			),
		)); ?>
	</div>
	<?php /* if(isset($this->breadcrumbs)){?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?>
        <?php }*/?>

	<?php echo $content; ?>

	<div class="clear"></div>
        <center>
                <div >
                        Sebo Eletrônico GPP_MDS - 2013/1<br/>

                </div>
        </center>
</div>

</body>
</html>
