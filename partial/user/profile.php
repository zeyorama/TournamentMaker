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
            <th>Number of played tournaments</th>
            <td>XXX</td>
          </tr>
          <tr>
            <th>Ingame Names</th>
            <td>
              XXX
            </td>
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
          <li><a href="index.php?f=user&s=remGame">Remove a Game</a></li>
          <li><a href="index.php?f=user&s=rP">Reset Password</a></li>
        </ul>
      </div>
<?php
    }
  }
?>
    </div>
    <div class="box pull-right span6">
      <div class="well">
        <li class="nav-header">Tournaments</li>
        <h6>Upcoming Tournaments</h6>
<?php
# Lists of Tournaments
?>
        ...
        <h6>Finished Tournaments</h6>
<?php
# List of finished Tournaments
?>
        ...
      </div>
      <div class="well">
        <li class="nav-header">Games</li>
        <?php
          $games = $user->getGames();
          if ($games == 10017)
            echo "No games in list<br>";
          else
            foreach ($games as $g)
              echo $g->name."<br>";
          
        ?>
      </div>
    </div>
  </div>
</div>