<?php
if (isset($source_frame) && $source_frame != "" && isset($txt_msg) && $txt_msg != '') {
    ?>
    <script>
        //essa função precisa ficar aqui em cima 
        function imprimir()
        {
            window.frames["pdf_etiqueta"].focus();
            window.frames["pdf_etiqueta"].print();
            window.location.href = 'index.php';
        }
    </script>
    <iframe id="pdf_etiqueta" name="pdf_etiqueta" src="<?php echo $source_frame; ?>" hidden></iframe>
    <div class="alert" id="div_alert">
        <section style="padding: 5px;">
    	<h4>
    	    <p>
    		<?php echo $txt_msg; ?>
    	    </p>
    	</h4>
    	<br/>
    	<p align="right">
    	    <button type="button" class="btn btn-info" onclick="imprimir();">Sim</button>
    	    <button type="button" class="btn btn-info" onclick="window.location.href = 'index.php';">Não</button>
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
