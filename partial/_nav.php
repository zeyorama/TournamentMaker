<a href="index.php" class="btn span12">Home</a>
<hr>
<!-- Not logged in -->
<a href="" class="btn span11">Games</a>
<a href="" class="btn span11">Tournaments</a>
<?php if ($u != NULL) { ?>
<!-- User logged in -->
<?php if ($u->role = USER) { ?>

<?php } ?>
<!-- Admin logged in -->
<?php if ($u->role = ADMIN) { ?>

<?php } ?>
<?php } ?>