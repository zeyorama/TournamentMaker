<nav class="well sidebar-nav">
    <ul class="nav nav-list">
      <li class="nav-header">Navigation</li>
      <!-- Not logged in -->
      <li><a href="index.php">Home</a></li>
      <li><a href="index.php?f=game&s=list">Games</a></li>
      <li><a href="index.php?f=tour&s=list">Tournaments</a></li>
      <hr>
      <?php if ($u != NULL) { ?>
      <!-- Looged in -->
      <li><a href="index.php?f=user&s=profile">My Profile</a></li>
      <li><a href="index.php?f=game&s=my">My Games</a></li>
      <li><a href="index.php?f=tour&s=list&fract=my">My Tournaments</a></li>
      <hr>
        <?php if ($u->isAdmin()) { ?>
      <!-- Admin logged in -->
      <li class="nav-header">Administration</li>
      <li><a href="index.php">Settings</a></li>
      <hr>
        <?php } ?>
      <?php } ?>
      <li><a href="index.php?f=main&s=impress">Imprint</a></li>
    </ul>
</nav>