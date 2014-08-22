<! DOCTYPE html>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style2.css" type="text/css" media="all">
        
</head>

<body>
    <div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Cadastrar', 'url'=>array('/usuario/cadastra')),
                                array('label'=>'Alterar', 'url'=>array('/usuario/femail')),
				array('label'=>'Deletar', 'url'=>array('/usuario/deleta'), 'visible'=>Yii::app()->user),
				array('label'=>'Pesquisar', 'url'=>array('/usuario/lista'), 'visible'=>Yii::app()->user)
			),
		)); ?>
	</div>
    
    <br/>
    <br/>
    <br/>
    
    <table class="insr" >
 
      
        <td class="titlein"> <h5>Usuários Cadastrados</h5></td>
   
        
  
	  <?php 
          
          $pesquisa =  UsuarioController::actionListaCadastros();
          
            foreach($pesquisa as $k => $v) {
                                      
                    ?>
                <tr>
                    <td> <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/usuario/user?id=<?php echo $v['id_pessoa']?>"><h4><?php echo $v['nome'];?></h4></a></td>
                </tr>
          <?php
                  }?>
    </table>
</body>
</html>