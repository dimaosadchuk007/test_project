<?php
/* @var $this RoomsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Rooms',
);
?>

<h1>Rooms</h1>

<table class="list">
	<tr>
		<td>Room id</td>
		<td>Room name</td>
		<td>Room number</td>
		<td>Room reserved for</td>
		<td>Edit</td>
		<td>Delete</td>
		<td>Reservation</td>
	</tr>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

</table>

<span class="contentNav">
	<a href="/rooms/create/">Add</a>
</span>