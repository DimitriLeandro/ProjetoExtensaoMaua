<?php
if (isset($source_frame) && $source_frame != "" && isset($txt_msg) && $txt_msg != '') {
    ?>
    <script src="../../users/js/jquery.js"></script>
    <script>
        //essa função precisa ficar aqui em cima 
        function imprimir()
        {
            $("#pdf_etiqueta").show();
            window.frames["pdf_etiqueta"].focus();
            window.frames["pdf_etiqueta"].print();
            window.location.href = '../../index.php';
        }
    </script>
    <iframe id="pdf_etiqueta" name="pdf_etiqueta" src="<?php echo $source_frame; ?>" style="width: 1px; height: 1px;" hidden></iframe>
    <div class="alert" id="div_alert">
        <section style="padding: 5px;">
            <h4>
                <p>
                    <?php echo $txt_msg; ?>
                </p>
            </h4>
            <br/>
            <p align="right">
                <button type="button" class="button" onclick="imprimir();">Sim</button>
                <button type="button" class="button" onclick="window.location.href = '../../index.php';">Não</button>
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
            padding-left: 25px;
            padding-right: 25px;
            font-size: larger;
        }

        .button {
            background-color: #4CCCFF;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }
    </style>
    <script>
        $("#div_corpo").fadeTo(0, 0.1);
    </script>
    <?php
}
?>
