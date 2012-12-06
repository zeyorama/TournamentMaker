<?php
  /**
   * @author Frank Kevin Zey
   */
  
  $game = Game::getGame($_GET['game']);
  $gr = $game->getReviews(10);

  if ($u == NULL || $game->isReviewedByUser($u->getID())) {
?>
<div class="container-fluid">
  <li class="nav-header">game review</li>
  <div class="row-fluid">
    <div class="pull-right span4">  
      <div class="box well">
        <li class="disabled btn"><?php echo $game->name; ?></li>
        <li class="nav-header"><?php echo $game->description; ?></li>
        <li class="nav-header"><?php echo $game->release; ?></li>
        <li class="nav-header">USK <?php echo $game->usk; ?></li>
      </div>
    </div>
    <div class="pull-left span7">  
      <div class="box well">
        <li class="nav-header">reviews</li>
        <label>Average Rating:
<?php
  $rate = 0;
  $i = 0;
  foreach ($gr as $value) {
    $rate += $value['_rate'];
    $i++;
  }
  $rate /= $i;
  echo $rate;
?>
        <label>
        <label>Last 10 reviews:</label>
        <ul>
<?php
  foreach ($gr as $review) {
    $user = User::getUser($review['user_id']);
?>
          <div class="well">  
            <li class="nav-header"><strong><?php echo $user->username; ?></strong></li>
            <li class="nav-header">Rate: <?php echo $review['_rate']; ?></li>
            <li class="nav-header"><?php echo $review['_comment']; ?></li>
          </div>
<?php
  }
?>
        </ul>
      </div>
    </div>
  </div>
</div>
<?php 
  } else {
?>
<div class="container-fluid">
  <li class="nav-header">review a game</li>
  <div class="row-fluid">
    <div class="pull-right span4">  
      <div class="box well">
        <li class="disabled btn"><?php echo $game->name; ?></li>
        <li class="nav-header"><?php echo $game->description; ?></li>
        <li class="nav-header"><?php echo $game->release; ?></li>
        <li class="nav-header">USK <?php echo $game->usk; ?></li>
      </div>
    </div>
    <div class="pull-left span7">
      <div class="box well">
        <form class="form-vertical" action="action/game/review.php" method="POST">
          <input type="hidden" name="GID" value="<?php echo $_GET['game']; ?>">
          <div class="control-group">
            <label class="control-label" for="selectGameRate">Rating</label>
            <div class="controls">
              <select id="selectGameRate" class="control-select" name="rate">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8" selected>8</option>
              </select>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="inputGameComment">Comment</label>
            <div class="controls">
              <textarea id="inputGameComment" style="min-width: 250px; min-height: 150px;" class="control-textarea" name="comment" placeholder="Your additional comments here ..."></textarea>
            </div>
          </div>
          <div class="control-group">
              <div class="controls">
                <button type="submit" class="btn btn-mini">Review</button>
              </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php
  }
?>