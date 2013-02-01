<?php
  /**
   * @author Frank Kevin Zey
   */
?>
<?php
  $user = NULL;
  $err = 0;

  if (isset($_GET['id'])) {

    $user = User::getUser($_GET['id']);

    if (!($user instanceof User)) {
      $err = $user;
    }

    switch ($err) {
      
      case 10001:
      case 10002:
      case 10004:
        header("Location: index.php?e=$err");
        exit();
      
    }

  } else {
    if (!isset($u)) { header("Location: index.php"); exit(); }
    $user = $u;

  }

?>
<div class="container-fluid">
  <div class="row-fluid">
    <div class="box pull-left span6">
      <div class="well">
        <li class="nav-header">Profile</li>
        <h3><?php echo $user->username; ?></h3>
        <table>
          <colgroup>
            <col width="150px">
            <col>
          </colgroup>
          <tr>
            <th>UserID</th>
            <td><?php echo $user->getID(); ?></td>
          </tr>
          <tr>
            <th>Username</th>
            <td><?php echo $user->username; ?></td>
          </tr>
          <tr>
            <th>Member since</th>
            <td><?php echo date("M.Y", strtotime($user->created_at)); ?></td>
          </tr>
          <tr>
            <th>Tournaments played</th>
            <td>XXX</td>
          </tr>
        </table>
      </div>
<?php
  $b = true;
  if (current_user() != NULL) {
    if (isset($_GET['id'])) {
      $b = current_user()->getID()==$_GET['id'];
    }

    if ($b) {
?>
      <div class="box well">
        <ul class="nav">
          <li class="nav-header">Options</li>
          <li><a href="index.php?f=user&s=addGame">Add a Game</a></li>
          <li><a href="index.php?f=user&s=delGame">Remove a Game</a></li>
          <li><a href="index.php?f=user&s=rP">Reset Password</a></li>
        </ul>
      </div>
<?php
    }
  }
?>
    </div>
    <div class="box pull-right span6">
      <?php
        $tours = $user->getTournaments();
        $b = false;
        switch ($tours) {
          case 10021:
          case 10022:
            $num_tours = 0;
            break;
          
          default:
            $num_tours = count($tours);
            $b = true;
            break;
        }
      ?>
      <div class="well">
        <li class="nav-header">Tournaments - <?php echo $num_tours; ?> found</li>
<?php if ($b) { ?>
        <h6>Upcoming Tournaments</h6>
        <table class="table table-hover table-condensed">
          <thead>
            <tr>
              <th>Name</th>
              <th>Game</th>
              <th>Date</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
<?php
        foreach ($tours as $tour) {
          if ($tour->status >= 2) continue;
?>
            <tr>
              <td><a href="index.php?f=tour&s=tournament&id=<?php echo $tour->getID(); ?>"><?php echo $tour->name; ?></a></td>
              <td><?php echo $tour->getGame()->name; ?></td>
              <td><?php echo date("d.m.y", strtotime($tour->start)); ?></td>
              <td><?php
                switch ($tour->status) {
                  case TOUR_STATUS_NOT_STARTED :
                    echo "<font>Upcoming</font>";
                    break;
                  
                  case TOUR_STATUS_PREPARED :
                    echo "<font>Preparing</font>";
                    break;
                  
                  case TOUR_STATUS_RUNNING :
                    echo "<font>Running</font>";
                    break;
                  
                  case TOUR_STATUS_CLOSED :
                    echo "<font>Closed</font>";
                    break;
                }
              ?></td>
            </tr>
<?php
        }
?>
          </tbody>
        </table>
        <hr>
        <h6>Finished Tournaments</h6>
        <table class="table table-hover table-condensed">
          <thead>
            <tr>
              <th>Name</th>
              <th>Game</th>
              <th>Date</th>
            </tr>
          </thead>
          <tbody>
<?php
        foreach ($tours as $tour) {
          if ($tour->status < 2) continue;
?>
            <tr>
              <td><a href="index.php?f=tour&s=tournament&id=<?php echo $tour->getID(); ?>"><?php echo $tour->name; ?></a></td>
              <td><?php echo $tour->getGame()->name; ?></td>
              <td><?php echo date("d.m.y", strtotime($tour->start)); ?></td>
            </tr>
<?php
        }
?>    
          </tbody>
        </table>
<?php } ?>
      </div>
      <div class="well">
        <li class="nav-header">Games</li>
        <?php
          $games = $user->getGames();
          if (is_int($games))
            echo "No games in list<br>";
          else
            foreach ($games as $g) {
              $nn = '';
              if (($nick = $user->game_nick[$g->getID()]) != NULL)
                $nn = " - $nick";
              else 
                $nn = " - <a href='index.php?f=user&s=ingame&GID={$g->getID()}'>Set ingame nickname</a>";

              echo $g->name."".$nn."<br>";
            }
          
        ?>
      </div>
    </div>
  </div>
</div>