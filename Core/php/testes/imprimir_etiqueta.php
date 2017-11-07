<html>
<body>
	<iframe id="pdf_teste" name="pdf_teste" src="gerar_etiqueta.php?cd_paciente=12"></iframe>
	<button onclick="imprimir();">Imprimir</button>
	<script>
		function imprimir()
		{			
			window.frames["pdf_teste"].focus();
			window.frames["pdf_teste"].print();
		}
	</script>
</body>
</html>