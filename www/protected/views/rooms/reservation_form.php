<div class="form blockType formField">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'rooms-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div id="reserve" class="row typeText">
		<?php echo $form->labelEx($model,'room_reservedFor'); ?>
		<?php echo $form->textField($model,'room_reservedFor',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'room_reservedFor'); ?>
	</div>

	<div class="row buttons buttonInForm">
		<?php echo CHtml::submitButton('Reserve'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->