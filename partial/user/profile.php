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
        echo '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">x</button>An error occured while connecting to database, please retry or wait 10 minutes and retry than.</div>';
        exit();
        break;

    }

  } else {
    $user = $u;

  }

?>
<div class="container-fluid">
  <div class="row-fluid">
    <div class="span6 well">
      <div class="box">
        <p>Profile</p>
        <h3><?php echo $user->username; ?></h3>
        <table>
          <colgroup>
            <col width="200px">
            <col>
          </colgroup>
          <tr>
            <th>Userid</th>
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
    </div>
    <div class="span6 well">
      <div class="box">
        <p>Tournaments</p>
        <p>
<?php
  # Lists of Tournaments
?>
        </p>
        <p>
          <h6>Finished Tournaments</h6>
<?php
  # List of finished Tournaments
?>
        </p>
      </div>
    </div>
  </div>
</div>
