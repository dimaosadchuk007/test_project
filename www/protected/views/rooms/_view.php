<?php
/* @var $this RoomsController */
/* @var $data Rooms */
?>

<div class="view">
		<tr>
				<td><?=$data->room_id?></td>
				<td><?=$data->room_name?></td>
				<td><?=$data->room_number?></td>
				<td><?=$data->room_reservedFor?></td>
				<td>
					 <a href="/rooms/update/?id=<?=$data->room_id?>">
						<img src="https://goo.gl/BRPJrR" height="25" width="25" alt="edit">
					 </a>
				</td>
				<td class="deleteButton">
					 <a href="/rooms/delete/?id=<?=$data->room_id?>">
						<img src="https://goo.gl/jZF9fe" height="25" width="25" alt="delete">
					</a>
				</td>
				<td>
				<a id="rButton" href="/rooms/reserve/?id=<?=$data->room_id?>" >
					<?php echo ($data->room_reservedFor=='')  ? "Reserve" : "Remove";  ?>
				</a>
				</td>
				
		</tr>
</div>