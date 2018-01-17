<?php
//É necessário que o GET tenha cd_paciente para imprimir a etiqueta de determinado paciente, e o txt_msg, que é a mensagem a ser alertada
if (isset($cd_paciente) && $cd_paciente > 0 && isset($txt_msg) && $txt_msg != '') {
    ?>
    <script>
        //essa funç~ao precisa ficar aqui em cima 
        function imprimir()
        {
            $("#div_etiqueta").show();
            window.frames["pdf_etiqueta"].focus();
            window.frames["pdf_etiqueta"].print();
            $("#div_etiqueta").hide();
            window.location.href = 'pesquisar_paciente.php';
        }
    </script>
    <iframe id="pdf_etiqueta" name="pdf_etiqueta" src="php/gerar_etiqueta.php?cd_paciente=<?php echo $cd_paciente; ?>" hidden></iframe>
    <div class="alert" id="div_alert">
        <section style="padding: 5px;">
    	<h4>
    	    <p>
    		<?php echo $txt_msg; ?>
    	    </p>
    	    <p>
    		Deseja imprimir a etiqueta?
    	    </p>
    	</h4>
    	<br/>
    	<p align="right">
    	    <button type="button" class="btn btn-info" onclick="imprimir();">Sim</button>
    	    <button type="button" class="btn btn-info" onclick="window.location.href = 'pesquisar_paciente.php';">Não</button>
    	</p>
        </section>
    </div>
    <style>
        .alert{
    	position: absolute;
    	width: 50%;
    	top: 50%;
    	margin-left: 25%;
    	background: #ffffff;
    	border-radius: 25px;
    	border: 2px solid #cccccc;
        }
    </style>
    <script>
        $("#div_corpo").fadeTo(0, 0.1);
    </script>
    <?php
}
?>
