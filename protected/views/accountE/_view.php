<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('start_amount')); ?>:</b>
	<?php echo CHtml::encode($data->start_amount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_open')); ?>:</b>
	<?php echo CHtml::encode($data->date_open); ?>
	<br />


</div>