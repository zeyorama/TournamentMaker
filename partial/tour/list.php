<?php if ( $u != NULL ) { ?>
<div class="box well">
  <li class="nav-header">Options</li>
  <a class="btn" href="index.php?f=tour&s=new">New tournament</a>
  <div class="btn-group pull-right">
    <a href="#" class="btn dropdown-toggle" data-toggle="dropdown">
      Tournaments
      <span class="caret"></span>
    </a>
    <ul class="dropdown-menu">
      <li><a href="index.php?f=tour&s=list" title="Really every tournament ever created">All Tournaments</a></li>
      <li><a href="index.php?f=tour&s=list&fract=my" title="All created tournament by me">My Tournaments</a></li>
      <li><hr></li>
      <li><span class="muted" style="padding-left: 5px; padding-right: 5px;">Tournaments I'm registered in</span></li>
      <li><a href="index.php?f=tour&s=list&fract=all" title="All tournaments I'm registered in and created">All of my Tournaments</a></li>
      <li><a href="index.php?f=tour&s=list&fract=up" title="All upcoming tournaments">Upcoming Tournaments</a></li>
      <li><a href="index.php?f=tour&s=list&fract=fin" title="All finished tournaments">Closed Tournaments</a></li>
    </ul>
  </div>
</div>
<?php } ?>
<div class="box well">
<?php
  if (isset($_GET['fract'])) {
    switch ($_GET['fract']) {
      case 'my':
        include 'partial/tour/fract/list_my.php';
        break;

      case 'fin':
        include 'partial/tour/fract/list_fin.php';
        break;
      
      case 'up':
        include 'partial/tour/fract/list_up.php';
        break;
      
      case 'all':
        include 'partial/tour/fract/list_all.php';
        break;
    }

  } else {
    include 'partial/tour/fract/list.php';

  }
?>
</div>