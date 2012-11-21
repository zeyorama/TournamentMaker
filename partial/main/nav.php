<nav class="well sidebar-nav">
    <ul class="nav nav-list">
      <li class="nav-header">Navigation</li>
      <!-- Not logged in -->
      <li><a href="index.php">Home</a></li>
      <li><a href="">Games</a></li>
      <li><a href="">Tournaments</a></li>
      <hr>
      <?php if ($u != NULL) { ?>
      <!-- Looged in -->
      <li class="nav-header">My SITENAME</li>
      <li><a href="">My Tournaments</a></li>
      <hr>
        <?php if ($u->role == ADMIN) { ?>
      <!-- Admin logged in -->
      <li class="nav-header">Administration</li>
      <li><a href="">Admin Area</a></li>
      <hr>
        <?php } ?>
      <?php } ?>
      <li><a href="index.php?f=main&s=impress">Imprint</a></li>
    </ul>
</nav>