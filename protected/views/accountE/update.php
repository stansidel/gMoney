<?php
$this->breadcrumbs=array(
	'Account Es'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AccountE', 'url'=>array('index')),
	array('label'=>'Create AccountE', 'url'=>array('create')),
	array('label'=>'View AccountE', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage AccountE', 'url'=>array('admin')),
);
?>

<h1>Update AccountE <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>