<?php
/* @var $this RoomsController */
/* @var $model Rooms */

$this->breadcrumbs=array(
	'Rooms'=>array('index'),
	$model->room_id=>array('view','id'=>$model->room_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Rooms', 'url'=>array('index')),
	array('label'=>'Create Rooms', 'url'=>array('create')),
	array('label'=>'View Rooms', 'url'=>array('view', 'id'=>$model->room_id)),
	array('label'=>'Manage Rooms', 'url'=>array('admin')),
);
?>

<h1>Update Rooms <?php echo $model->room_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>