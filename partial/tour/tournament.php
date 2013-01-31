<?php
  $tour = Tournament::getTournament($_GET['id']);
?>
<div class="row-fluid">
  <div class="span12">
    <div class="box">
      <div class="box-header nav-header">
        Tournament
      </div>   
      <div class="box-content">
        <ul class="nav nav-pills">
<?php if ($u != NULL) { ?>
<?php   if ($tour->isRegistered($u)) { ?>
          <li><a href="">Cancel</a></li>
<?php   } else { ?>
          <li><a href="">Sign up</a></li>
<?php   } ?>
<?php } ?>
          <li><a href="index.php?f=tour&s=players&id=<?php echo $tour->getID(); ?>">Players</a></li>
          <li><a href="">Brackets</a></li>
          <li><a href="">Reglement</a></li>
          <li><a href="">Streams</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="row-fluid">
  <div class="<?php echo ($u != NULL && $tour->owner->equals($u)) ? 'span8' : 'span12'; ?>">
    <div class="box well">
      <div class="box-header">
        <strong><?php printf("Tournament #%08u", $tour->getID()); ?></strong>
      </div>
      <div class="box-content">
        <table class="table table-hover table-condensed">
          <tbody>
            <tr>
              <th>Name</th>
              <td><?php echo $tour->name; ?></td>
            </tr>
            <tr>
              <th>Game</th>
              <td><?php echo $tour->getGame()->name; ?></td>
            </tr>
            <tr>
              <th>Created</th>
              <td><?php echo date("D, d.m.y", strtotime($tour->inserted)); ?></td>
            </tr>
            <tr>
              <th>Start</th>
              <td><?php echo date("D, d.m.y H:i", strtotime($tour->start)); ?></td>
            </tr>
            <tr>
              <th>Status</th>
              <td><?php echo $tour->printStatus(); ?></td>
            </tr>
            <tr>
              <th>Currently joined players</th>
              <td><?php echo count($tour->playerList); ?> Players</td>
            </tr>
            <tr>
              <th>Max player count</th>
              <td><?php echo $tour->maxPlayers; ?> Players</td>
            </tr>
            <tr>
              <th>Bracket system</th>
              <td><i><?php $tour->printGrid(); ?></i></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
<?php if ($u != NULL && $u->isAdmin()) { ?>
  <div class="span4 pull-right">
    <div class="box well">
      <div class="box-header nav-header">
        Administration
      </div>
      <div class="box-content">
        <ul class="nav nav-list">
          <li><a href="">Edit Tournament</a></li>
          <li><a href="">Edit Reglement</a></li>
          <li><span><a href="">Set Referee</a></span> <span class="label label-success tmwb_badget"><?php echo $tour->getNewRefereeRequestsCount(); ?></span></li>
          <li><span><a href="">Set Stream</a></span> <span class="label label-info tmwb_badget"><?php echo $tour->getNewStreamRequestsCount(); ?></span></li>
          <li><hr></li>
<?php if ($tour->status == TOUR_STATUS_NOT_STARTED) { ?>
          <li><a href="">Generate Brackets</a></li>
<?php } else if ($tour->status == TOUR_STATUS_PREPARED) { ?>
          <li><a href="">Start</a></li>
<?php } else if ($tour->status == TOUR_STATUS_RUNNING) { ?>
          <li><a href="">Close</a></li>
<?php } else if ($tour->status == TOUR_STATUS_CLOSED) { ?>
          <li><a href=""></a></li>
<?php } ?>
        </ul>
      </div>
    </div>
  </div>
<?php } ?>
</div>
<div class="row-fluid">
  <div class="span12">
    <div class="box">
      <div class="box-header">
        <li class="nav-header">Informations</li>
      </div>
      <div class="box-content">
        <div class="container-fluid">
          <div class="fluid-row">
            <div class="span6">
              <div class="box well">
                <li class="nav-header">Streams</li>
              </div>
            </div>
            <div class="span6">
              <div class="box well">
                <li class="nav-header">Referee</li>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>