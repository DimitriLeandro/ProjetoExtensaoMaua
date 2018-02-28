function load_ubs_referencia() {
    //essa função serve pra pesquisar a ubs de referência do paciente. Ela é acionada depois que o cep é validado. A pesquisa da ubs<->cep é feita com um load() na div div_ubs_referencia
    //lembrando que no banco, os ceps estão armazenados com 00000-000, então é necessário garantir que a pesquisa será feita nesse formato também.
    //Nova variável "cep" somente com numeros.
    var cep = $("#cd_cep").val().replace(/\D/g, '');
    if (cep.length == 8) {
        //se entrou aqui então ta suave, é só botar o "-" no meio do número
        cep = cep.substring(0, 5) + "-" + cep.substring(5, 9);
        var endereco = "php/div_ubs_referencia.php?cd_cep=" + cep;
        $("#div_ubs_referencia").load(endereco);
        $("#div_ubs_referencia").show();
    } else {
        $("#div_ubs_referencia").hide();
    }
}