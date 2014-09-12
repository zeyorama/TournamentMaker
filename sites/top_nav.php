<?php
$cat = '';
if (isset($_GET['cat']))
	$cat = $_GET['cat'];
?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="index.php">TournamentMaker</a>
		</div>
<?php
if ($currentUser)
{
	include 'sites/loggedin.php';
}
else
{
	include 'sites/guest.php';
}
?>
	</div>		
</nav>

<?php
if ($currentUser) # WENN EIN USER ANGEMELDET IST !!!!!!!!!!!!!!!!!
{
	;
}
else # WENN KEIN USER ANGEMELDET IST !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
{
?>
<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="Login Modal" aria-hidden="true" style="z-index:9999;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="LoginModalTitle">Login</h4>
      </div>
      <form class="form-horizontal" role="form" method="POST" action="actions/session/login.php">
	      <div class="modal-body">
	        <div class="form-group">
	        	<label class="control-label col-sm-2" for="userLogin">Username</label>
	        	<div class="col-xs-5 col-sm-offset-1">
	        		<input type="text" class="form-control" id="userLogin" name="username" required>
	        	</div>
	        </div>
	        <div class="form-group">
	        	<label class="control-label col-sm-2" for="passLogin">Password</label>
	        	<div class="col-xs-5 col-sm-offset-1">
	        		<input type="password" class="form-control" id="passLogin" name="drowssap" required>
	        	</div>
	        </div>
	      </div>
	      <div class="modal-footer">
	        <button type="submit" class="btn btn-success">Login</button>
	        <button type="reset" class="btn btn-warning">Reset</button>
	        <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
	      </div>      
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="Register Modal" aria-hidden="true" style="z-index:9999;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="LoginModalTitle">Register</h4>
      </div>
      <form class="form-horizontal" role="form" method="POST" action="actions/session/register.php">
	      <div class="modal-body">
	        <div class="form-group">
	        	<label class="control-label col-sm-2" for="userLogin">Username</label>
	        	<div class="col-xs-5 col-sm-offset-1">
	        		<input type="text" class="form-control" id="userLogin" name="username" required>
	        	</div>
	        </div>
	        <div class="form-group">
	        	<label class="control-label col-sm-2" for="emailLogin">Email</label>
	        	<div class="col-xs-5 col-sm-offset-1">
	        		<input type="email" class="form-control" id="emailLogin" name="email" required>
	        	</div>
	        </div>
	        <div class="form-group">
	        	<label class="control-label col-sm-2" for="passLogin">Password</label>
	        	<div class="col-xs-5 col-sm-offset-1">
	        		<input type="password" class="form-control" id="passLogin" name="drowssap" required>
	        	</div>
	        </div>
	      </div>
	      <div class="modal-footer">
	        <button type="submit" class="btn btn-success">Register</button>
	        <button type="reset" class="btn btn-warning">Reset</button>
	        <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
	      </div>      
      </form>
    </div>
  </div>
</div>
<?php
}
?>