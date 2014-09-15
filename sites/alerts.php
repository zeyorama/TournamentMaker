<?php
/**
 * alerts.php
 * 
 * @author: Frank Kevin Zey
 */

$success = $_SESSION['confirm'];
$_SESSION['confirm'] = array();
$info = $_SESSION['notice'];
$_SESSION['notice'] = array();
$danger = $_SESSION['error'];
$_SESSION['error'] = array();
?>
<script type="text/javascript">
<?php
if ($success) foreach ($success as $s => $suc)
{
 	$id = $s . '-success';
?>
AddAlert(GetAlert('col-lg-12', 'success', '<?php echo $suc; ?>', '<?php echo $id; ?>', 5000));
<?php
}
?>
<?php
if ($info) foreach ($info as $i => $inf)
{
	$id = $i . '-info';
?>
AddAlert(GetAlert('col-lg-12', 'info', '<?php echo $inf; ?>', '<?php echo $id; ?>', 5000));
<?php
}
?>
<?php
if ($danger) foreach ($danger as $d => $dan)
{
	$id = $d . '-danger';
?>
AddAlert(GetAlert('col-lg-12', 'danger', '<?php echo $dan; ?>', '<?php echo $id; ?>', 5000));
<?php
}
?>
</script>