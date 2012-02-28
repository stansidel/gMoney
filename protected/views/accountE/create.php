<?php
$this->breadcrumbs=array(
	'Account Es'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AccountE', 'url'=>array('index')),
	array('label'=>'Manage AccountE', 'url'=>array('admin')),
);
?>

<h1>Create AccountE</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>