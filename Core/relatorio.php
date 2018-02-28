

<!DOCTYPE html>
<html>
<head>
	
	<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
        <script src="users/js/jquery.js"></script>
        <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
        <title>Layout Relatório</title>
        <meta charset="utf-8" />
        <link href="css/formulario.css" rel="stylesheet">
         <script src="users/js/jquery.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>
<body>
<?php require_once 'php/div_header.php'; ?>
 <form method="post" class="form-style">
            <h1>RELATÓRIO</h1>
            <fieldset>
                 <label for="ncns" class="margem">Data</label><br><p>
                <label for="ncns" class="margem">Inicial</label><br/>
                <input type="text" style="width: 30%" maxlength="10" name="dt_inicial" id="dt_inicial" /></br>
                <label for="nomep" class="margem">Final</label><br/>
                 <input type="text" style="width: 30%" maxlength="10" name="dt_final" id="dt_final" />
            </fieldset>
            <p>
            	<button type="button" class="botao" id="btn_lista_espera">Gerar Relatório</button>
		<?php
		require_once 'php/classes/usuario.Class.php';
		$obj_usuario = new Usuario();
		if ($obj_usuario->getPermission() != "Recepcionista") { ?>
		    <button type = "button" onclick = "javascript:history.back()">Voltar</button>
		<?php } ?>		
	    </p>
	    <br/>
	    <div id = "div_resultados">
	    </div>
	<div>
            <h1>RESULTADO</h1>
            <fieldset>
                 <label for="ncns" class="margem">Total de pessoas atendidas: </label> &nbsp;&nbsp;
                 <label id=""></label></br></br>
                 
                 <label>Sexo</label></br>
                 &nbsp;&nbsp;<label>Masculino:</label>
                 <label id=""></label></br>
                 &nbsp;&nbsp;<label>Feminino:</label>
                 <label id=""></label></br></br>

                 <label>Raça</label>
                 <label id=""></label></br></br>

                 <label>Faixa Etária (anos)</label></br>
                 &nbsp;&nbsp;<label>0-2 </label>
                 <label id=""></label><br>
                 &nbsp;&nbsp;<label>3-5</label>
                 <label id=""></label><br>
                 &nbsp;&nbsp;<label>6-13</label>
                 <label id=""></label><br>
                 &nbsp;&nbsp;<label>14-18</label>
                 <label id=""></label><br>
                 &nbsp;&nbsp;<label>19-40</label>
                 <label id=""></label><br>
                 &nbsp;&nbsp;<label>41-60</label>
                 <label id=""></label><br>
                 &nbsp;&nbsp;<label>60+</label>
                 <label id=""></label><br><br>

                 <label>Queixa Principal</label>
                 <label id=""></label><br><br>
                 
                 <label>UBS REF</label>
                 <label id=""></label><br><br>

                 <label>Raça</label>
                 <label id=""></label>

                            
            </fieldset>
            <p>
            	<button type="button" class="botao" id="btn_lista_espera">Gerar Relatório</button>
		<?php
		require_once 'php/classes/usuario.Class.php';
		$obj_usuario = new Usuario();
		if ($obj_usuario->getPermission() != "Recepcionista") { ?>
		    <button type = "button" onclick = "javascript:history.back()">Voltar</button>
		<?php } ?>		
	    </p>
	    <br/>
	    <div id = "div_resultados">
	    </div>
	</div>

	</form>

<script>
    $("document").ready(function () {
        //transformando o input em type date de uma forma que funciona em todos os navegadores
        $("#dt_inicial").datepicker({
            dateFormat: 'dd/mm/yy'
       });

       $("#dt_final").datepicker({
            dateFormat: 'dd/mm/yy'
       });

      
    });
 </script>

</body>
</html>