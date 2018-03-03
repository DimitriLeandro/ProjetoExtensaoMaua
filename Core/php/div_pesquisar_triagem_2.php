<?php
//vendo se alguma data espec´ifica foi setada no GET, caso n~ao, mostrar as triagens do dia atual
$data_triagem = date("Y-m-d");
if (isset($_GET['dt_triagem'])) {
    //verificando se a data ´e v´alida, caso n~ao seja, mostra o dia de hoje
    //yyyy-mm-dd

    $data_setada = explode('-', $_GET['dt_triagem']);

    /* $dia_triagem = $data_setada[2];
      $mes_triagem = $data_setada[1];
      $ano_triagem = $data_setada[0]; */

    if (count($data_setada) == 3 && $data_setada[0] != "" && $data_setada[1] != "" && $data_setada[2] != "") {
	//checkdate( int $month , int $day , int $year )
	if (checkdate($data_setada[1], $data_setada[2], $data_setada[0]) === true) {
	    $data_triagem = $_GET['dt_triagem'];
	}
    }
}
?>

<div class="form-style">
    <h1>
        Triagens do Dia 
        <span id="span_data"><?php echo date_format(new DateTime($data_triagem), "d/m/Y"); ?></span>
    </h1>
    <fieldset>
        <p>
            <label for="nascp" style="width: 20%"class="margem">Escolher outra data:</label>
            <input type="text" style="width: 30%" maxlength="10" name="dt_triagem" id="dt_triagem" />
            <button type="button" id="btn_buscar">Buscar</button>
        </p>
        <p>
            <label>Mostrar apenas triagens sem diagnóstico</label>
            <input type="checkbox" id="chk_nao_finalizada" checked />
        </p>
    </fieldset>
    <br/>

    <?php
    //Não é necessário criar um objeto da classe paciente pois isso já foi feito em pesquisar_triagem.php
    require_once('classes/conexao.Class.php');
    require_once('classes/triagem.Class.php');

    $conexao = new Conexao();
    $triagem = new Triagem();

    $db_maua = $conexao->get_db_maua();

    if ($stmt = $db_maua->prepare('SELECT cd_triagem FROM tb_triagem WHERE dt_registro = ?;')) {
	$stmt->bind_param('s', $data_triagem);
	$stmt->execute();
	$stmt->bind_result($codigo_triagem);

	while ($stmt->fetch()) {
	    $triagem->selecionar($codigo_triagem);
	    $redirect_ver_mais = 'visualizar_triagem.php?cd_triagem=' . $triagem->getCdTriagem();
	    //Pegando os dados do usuario da triagem para mostrar o nome etc
	    $paciente->selecionar($triagem->getCdPaciente());
	    ?>
	    <fieldset class="<?php
	    if ($triagem->getIcFinalizada() == 1) {
		echo "finalizada";
	    } else {
		echo "nao_finalizada";
	    }
	    ?>" style="border: solid 1px; padding: 15px;">
		<p><label>Paciente: <?php echo $paciente->getNmPaciente() ?> </label><p/>
		<p><label>Queixa: <?php echo $triagem->getDsQueixa() ?> </label><p/>
		<p><label>Data: <?php echo $triagem->getDtRegistro() ?> </label><p/>
		<p><label>Hora: <?php echo $triagem->getHrRegistro() ?></label><p/>
		<p><button type="button" class="botao" onclick="window.location.href = '<?php echo $redirect_ver_mais; ?>';">Ver Mais</button></p>
	    </fieldset>
	    <br/>
	    <?php
	}
    }
    ?> 
    <?php
    require_once 'php/classes/usuario.Class.php';
    $obj_usuario = new Usuario();
    if ($obj_usuario->getPermission() != "Outorgante") {
	?>
        <button type = "button" onclick = "javascript:history.back()">Voltar</button>
<?php } ?>	
</div>
<script>
    $("document").ready(function () {
        //transformando o input em type date de uma forma que funciona em todos os navegadores
        $("#dt_triagem").datepicker({
            dateFormat: 'dd/mm/yy',
            onSelect: function () {
                $("#btn_buscar").click();
            }
        });

        //arrumando o valor do input para que ele n~ao fique em branco
        $("#dt_triagem").datepicker('setDate', new Date());

        //mostrando s´o as triagens n~ao finalizadas
        trocar_triagens_visiveis();
    });

    //funç~ao para mostrar apenas as triagens finalizadas ou todas
    $("#chk_nao_finalizada").on("click", function () {
        trocar_triagens_visiveis();
    });

    function trocar_triagens_visiveis()
    {
        if ($("#chk_nao_finalizada").is(':checked'))
        {
            //mostra s´o as triagens n~ao finalizadas
            $(".finalizada").hide();
        } else
        {
            $(".finalizada").show();
        }
    }

    function mascarar_data()
    {
        if ($("#dt_triagem").val().length == 2 || $("#dt_triagem").val().length == 5)
        {
            $("#dt_triagem").val("" + $("#dt_triagem").val() + '/');
        }
    }

    $("#dt_triagem").keypress(function (e) {
        if (e.which == 13)
        {
            $("#btn_buscar").click();
        }
        mascarar_data();
    });

    $("#btn_buscar").on("click", function () {
        var dd = $("#dt_triagem").val().substring(0, 2);
        var mm = $("#dt_triagem").val().substring(3, 5);
        var aaaa = $("#dt_triagem").val().substring(6, 10);

        //alert(dd+"\n"+mm+"\n"+aaaa);
        window.location = "pesquisar_triagem.php?dt_triagem=" + aaaa + "-" + mm + "-" + dd + "";
    });

    function voltar() {
        window.location = "index.php"
    }

</script>