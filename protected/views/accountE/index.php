<?php
$this->breadcrumbs=array(
	'Account Es',
);

$this->menu=array(
	array('label'=>'Create AccountE', 'url'=>array('create')),
	array('label'=>'Manage AccountE', 'url'=>array('admin')),
);
?>

<h1>Account Es</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
