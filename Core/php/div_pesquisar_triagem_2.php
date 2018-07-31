<?php
//essa página carrega a lista de triagens de um dia específico
require_once('classes/triagem.Class.php');
require_once 'php/classes/usuario.Class.php'; //preciso saber o tipo de usuario logado pra colocar o botão lá em baixo

//vendo se alguma data espec´ifica foi setada no GET, caso n~ao, mostrar as triagens do dia atual
$data_triagem = date("Y-m-d");
if (isset($_GET['dt_triagem'])) {
    //verificando se a data ´e v´alida, caso n~ao seja, mostra o dia de hoje
    //yyyy-mm-dd

    $data_setada = explode('-', $_GET['dt_triagem']);

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
        TRIAGENS DO DIA 
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
            <input type="checkbox" id="chk_nao_finalizada" checked/>
        </p>
        <br/>
        <p id="p_sem_triagens" align="center" hidden>Não há triagens regristradas nesse dia</p>
    </fieldset>
    <br/>

    <div id="div_triagens_nao_finalizadas">
        <h2>Triagens não finalizadas</h2>
        <?php
            //Aqui eu vou pegar a lista de triagens do dia a partir do método triagensDoDia da classe Triagens
            $triagem = new Triagem();
            $arrayTriagens = $triagem->triagensDoDia($data_triagem);
            foreach ($arrayTriagens as $row) {
                if ($row['ic_finalizada'] == 0) {
                    $redirect_ver_mais = 'visualizar_triagem.php?cd_triagem='.$row['cd_triagem'];
                    //Nas triagens abertas, o id do botão ver mais será o próprio redirect (isso é necessário para o bot)
        ?>
            	    <fieldset id="fieldset_triagem" style="border: solid 1px; padding: 15px;">
                		<p><label>Paciente: <?php echo $row['nm_paciente']; ?> </label><p/>
                		<p><label>Queixa: <?php echo $row['ds_queixa']; ?> </label><p/>
                		<p><label>Data: <?php echo $row['dt_registro']; ?> </label><p/>
                		<p><label>Hora: <?php echo $row['hr_registro']; ?> </label><p/>
                		<p><button type="button" id="<?php echo $redirect_ver_mais; ?>" class="botao" onclick="window.location.href = '<?php echo $redirect_ver_mais; ?>';">Ver Mais</button></p>
            	    </fieldset>
            	    <br/>
        <?php
                }
            }
        ?>
    </div>

    <div id="div_triagens_finalizadas" hidden>
        <h2>Triagens finalizadas</h2>
        <?php
            foreach ($arrayTriagens as $row) {
                if ($row['ic_finalizada'] == 1) {
                    $redirect_ver_mais = 'visualizar_triagem.php?cd_triagem='.$row['cd_triagem'];
                    //Nas triagens finalizadas, o id do botão ver mais será nulo (isso é necessário para o bot)
        ?>
                    <fieldset id="fieldset_triagem" style="border: solid 1px; padding: 15px;">
                        <p><label>Paciente: <?php echo $row['nm_paciente']; ?> </label><p/>
                        <p><label>Queixa: <?php echo $row['ds_queixa']; ?> </label><p/>
                        <p><label>Data: <?php echo $row['dt_registro']; ?> </label><p/>
                        <p><label>Hora: <?php echo $row['hr_registro']; ?> </label><p/>
                        <p><button type="button" id="" class="botao" onclick="window.location.href = '<?php echo $redirect_ver_mais; ?>';">Ver Mais</button></p>
                    </fieldset>
                    <br/>
        <?php
                }
            }
        ?>
    </div>
   
    <?php  //PARTE PARA COLOCAR O BOTÃO VOLTAR CASO O USUARIO SEJA SECRETARIO  
        $obj_usuario = new Usuario();
        if ($obj_usuario->getPermission() != "Secretario") {
	?>
        <br/><br/><button type="button" id="" onclick="window.location.href = 'index.php'">Voltar</button>
    <?php 
        } 
    ?>	
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
        $("#dt_triagem").val($("#span_data").text());

        //mostrando s´o as triagens n~ao finalizadas
        trocar_triagens_visiveis();
        
        //se o total de fieldsets for 1, então exibe uma msg com "Não há triagens regristradas nesse dia"
        if($("fieldset").size() == 1){
            $("#p_sem_triagens").show();
            $("#div_triagens_nao_finalizadas").hide();
        }
    });

    //funç~ao para mostrar apenas as triagens finalizadas ou todas
    $("#chk_nao_finalizada").on("click", function () {
        trocar_triagens_visiveis();
    });

    function trocar_triagens_visiveis()
    {
        if ($("#chk_nao_finalizada").is(':checked'))
        {
            $("#div_triagens_finalizadas").hide();
        } else
        {
            $("#div_triagens_finalizadas").show();
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