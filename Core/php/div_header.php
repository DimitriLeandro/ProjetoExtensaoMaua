<?php
require_once 'classes/usuario.Class.php';
$obj_usuario = new Usuario();
?>
<div id="div_header" style="position: absolute;	width: 100%; top: 3%;">
    <p align="right" style="padding-right: 30px;">
	<?php if ($obj_usuario->getPermission() == "Administrator") {
	    ?>
    	<a href="/ProjetoExtensaoMaua/Core/users/admin.php"><i class="fa fa-fw fa-cogs"></i> Admin Dashboard</a>
	    <?php }
	?>
	<a href="/ProjetoExtensaoMaua/Core/users/logout.php"><i class="fa fa-fw fa-sign-out"></i> Logout</a>
    </p>
</div>