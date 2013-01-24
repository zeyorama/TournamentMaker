<?php
	$games = $u->getGames();

	if(is_int($games)) {
		$_GET['e'] = $games;
		include 'partial/_alert.php';
	}
?>
<table class="table table-condensed">
	<thead>
    <th>Name</th>
    <th>Release</th>
    <th>Description</th>
    <th>Nickname</th>
	</thead>
	<tbody>
<?php
  if (!is_int($games)) {
    foreach ($games as $g) {
?>
  <tr>
    <td><i><?php echo $g->name; ?></i></td>
    <td><?php echo $g->release; ?></td>
    <td><?php echo str_replace("\n", '<br>', $g->description); ?></td>
    <td><?php $nick = $u->game_nick[$g->getID()]; echo $nick == '' ? 'No nickname set' : $nick; ?></td>
  </tr>
<?php
    }
  }
?>
	</tbody>
</table>