<a href="index.php" class="btn span12">Home</a>
<hr>
<!-- Not logged in -->
<a href="" class="btn span11">Games</a>
<a href="" class="btn span11">Tournaments</a>
<?php if ($u != NULL) { ?>
  <?php if ($u->role = USER) { ?>
<!-- User logged in -->
<hr>
<a href="" class="btn span11">My Tournaments</a>

  <?php } ?>
  <?php if ($u->role = ADMIN) { ?>
<!-- Admin logged in -->
<hr>

  <?php } ?>
<?php } ?>