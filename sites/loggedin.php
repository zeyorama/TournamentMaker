<div class="navbar-content">
	<ul class="nav navbar-nav">
		<li <?php if ($cat == 'verwaltung') echo 'class="active"'; ?>><a href="index.php?cat=verwaltung">Verwaltung</a></li>
		<li <?php if ($cat == 'auftraege')  echo 'class="active"'; ?>><a href="index.php?cat=auftraege">Aufträge</a></li>
	</ul>

	<ul class="nav navbar-nav navbar-right">
		<li class="active">
			<a class="no-link">Eingeloggt als
				<span title="<?php echo $currentUser->Abteilung()->Firma()->Bezeichnung() . "\n" . $currentUser->Name(); ?>">
					<?php echo $currentUser->Typ()->Name(); ?>
				</span>
			</a>
		</li>
		<li style="padding-right: 5px;">
			<button class="btn btn-danger btn-xs navbar-btn" onClick="document.location = 'actions/session/logout.php';">Abmelden</button>
		</li>
	</ul>
</div>