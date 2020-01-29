<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <form name="frm_login" id="frm_login" method="POST">
        <label>USUÁRIO:</label><br>
        <input type="text" name="usuario" id="usuario" placeholder="Nome de Usuário">
        
        <br>
        <label>SENHA:</label><br>
        <input type="text" name="senha" id="senha" placeholder="Senha de acesso">

        <br><br>
        <button id="btn-cadastrar">CADASTRAR</button>
        <button id="btn-acessar">ACESSAR</button>
    </form>

    <!-- Jquery -->
    <script src="js/jquery-3.4.1.min.js"></script>
    
    <!-- Post para login -->
    <script>
        $(document).ready(function(){    
            $("#frm_login").submit(function(e){
                e.preventDefault();
            });//Fim do submit
            
            $("#btn-acessar").click(function(){
                
                var usuario = $("#usuario").val();
                var senha = $("#senha").val();

                var dados = {
                    nome: usuario,
                    senha: senha
                }
                $.ajax({
                    url:  "processa_login.php",
                    type: "POST",
                    data: dados,
                    dataType: 'json',
                    beforeSend:function(){
                        $("#usuario").val("aguarde...");
                        $("#senha").val("aguarde...");
                    },
                    success:function(data){
                        if(data.retorno == true){
                            alert(data.message);

                            $("#usuario").val("");
                            $("#senha").val("");
                        }else{
                            alert(data.message);
                            
                            $("#usuario").val(dados.nome);
                            $("#senha").val(dados.senha);
                        }
                    }//fim do success
                });//Fim do Ajax
                
            });//fim do click acessar
            

            $("#btn-cadastrar").click(function(){
                var usuario = $("#usuario").val();
                var senha = $("#senha").val();
                                
                if(usuario == ""){
                    alert("Campo Obrigatório")
                    $("#usuario").focus();
                    // return false;                    
                }else if(senha == ""){
                    alert("Campo Obrigatório")
                    $("#senha").focus();
                    // return false;
                }else{
                    var dados = {
                    nome: usuario,
                    senha: senha
                    }

                    $.ajax({
                        url: "processa_cadastrar.php",
                        type: "POST",
                        data: dados,
                        dataType: "json",
                        beforeSend:function(){
                            $("#usuario").val("cadastrando...");
                            $("#senha").val("cadastrando...");
                        },
                        success:function(data){
                            if(data.retorno == true){
                                alert(data.message);
                                $("#usuario").val("");
                                $("#senha").val("");
                            }else{
                                alert(data.message);
                                $("#usuario").val(dados.nome);
                                $("#senha").val(dados.senha);
                            }
                        }//fim do success
                    });//fim do ajax
                };//fim do else
            });//fim do click cadastrar
            
        }); //Fim do ready.
    </script>

</body>
</html>