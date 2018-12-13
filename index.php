<!DOCTYPE html>
<html>
    <head>
        <title>Hawks Typer</title>
        <link rel="icon" href="img/icon.png">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/typer.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.0/css/all.css" integrity="sha384-aOkxzJ5uQz7WBObEZcHvV5JvRW3TUc2rNPA7pe3AwnsUohiw1Vj2Rgx2KSOkF5+h" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <meta charset="UTF-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    </head>
    <body oncopy="return false" oncut="return false" onpaste="return false">
        <header class="container-fluid">
            <div class="topo">
                <div class="logo-marca">
                    <img src="img/brand-hover.png" width="80px" height="60px" class="logoTyper" alt="Logo Hawks Enterprise"><h1>Hawks Typer</h1>
                </div>
            </div>
        </header>
        <main class="container">
            <div class="principal">
                <span>Frase:</span><p id="frase"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                <div class="marcadores">
                    <p>Palavras: <span id="quantidade-palavras"></span></p>
                    <p>Segundos: <span id="segundos-restante">6</span></p>
                </div>
                
                <form>
                    <div class="input-group mb-3">
                        <label for="frase-form">
                          <div class="input-group-prepend">
                            <span class="input-group-text lbl-texto" >Digite a frase</span>
                          </div>
                        </label>
                        <textarea type="text" rows="5" class="form-control" id="frase-form" aria-describedby="basic-addon3"></textarea>
                    </div>
                </form>
                <div class="botoes-typer">
                    <a><i class="fas fa-undo" id="reiniciar" ></i></a>
                    <a  data-toggle="modal"  ><i class="fas fa-save" id="salvar" ></i></a>
                    <?php include("salvarPlacar.php")?>                    
                    <a href="#" data-toggle="modal" data-target="#listaPlacar"><i class="fas fa-list" id="listar"></i></a>
                    <?php include("ListarPlacar.php")?>   
                </div>
                    <p>Caracteres digitados: <span id="caracteres-digitados">0</span></p>
                    <p>Palavras digitadas: <span id="palavras-digitadas">0</span></p>
            </div>
        </main>
        <footer class="container-fluid">
            
        </footer>
        <script src="js/jquery-3.3.1.js"></script>
        <script>
            let frase_form = $("#frase-form");   
            let frase = $("#frase").text().trim();
            let qnt_palavras = frase.split(/\S+/).length-1;
            let char_digitados = frase_form.val();
            let tempo_inicial = $("#segundos-restante").text();
            let palavras_digitadas = $("#palavras-digitadas");
            let caracteres_digitados = $("#caracteres-digitados");
            let botaosalvar = $("#salvar");
            let segundos_restantes = $("#segundos-restante").text();
            let qnt_palavras_digitadas;     
            let contador_usuario = 0;
            let nome;
            let velocidade;
            
            $(()=>contador())
            $("#quantidade-palavras").text(qnt_palavras);
            $("#reiniciar").click(()=>{if(segundos_restantes<=0)resetar()});
            
            mostrar_digitados();
            
            $("#confirmar-save").click(()=>{
                nome = $("#nome").val();
                $("#nome").val("");
                salvaResultado();
                botaosalvar.parent().removeAttr("href");
                botaosalvar.parent().removeAttr("data-target");
                
            })
            
            function resetar(){
                qnt_palavras_digitadas = 0;
                botaosalvar.parent().removeAttr("href");
                botaosalvar.parent().removeAttr("data-target");
                frase_form.attr("disabled",false);
                frase_form.val("");
                $("#segundos-restante").text(tempo_inicial);
                palavras_digitadas.text("0");
                caracteres_digitados.text("0");
                segundos_restantes = tempo_inicial;
                frase_form.addClass("frase-correta");
                frase_form.removeClass("frase-incorreta");
                contador();    
            }
            
            function mostrar_digitados(){
                contador_usuario++;
                frase_form.on("input",() => {
                    qnt_palavras_digitadas = frase_form.val().split(/\S+/).length-1;
                    let palavras = palavras_digitadas.text(qnt_palavras_digitadas);
                    let qnt_caracteres = frase_form.val().length;
                    caracteres_digitados.text(qnt_caracteres)
                    verificaCorreto();
                });
            }
            
            function verificaCorreto(){
                if(frase.startsWith(frase_form.val())){
                    frase_form.addClass("frase-correta");
                    frase_form.removeClass("frase-incorreta");
                    return true;
                }else{
                    frase_form.addClass("frase-incorreta");
                    frase_form.removeClass("frase-correta");
                    return false;
                }
            }
            
            function contador(){
                frase_form.one("focus", () => {
                    let cronometro = setInterval( () => {
                        $("#segundos-restante").text(segundos_restantes);
                        segundos_restantes--;
                        if(segundos_restantes < 0){
                            terminaJogo();
                            clearInterval(cronometro);
                        }
                    },1000);
                }
                );
            }
            
            function terminaJogo(){
                frase_form.attr("disabled",true);
                $("#reiniciar").removeAttr("disabled").parent().attr("href","#");
                verificaCorreto() ? botaosalvar.parent().attr("data-target","#caixaSalvar").attr("href","#"):"";
                $("#palavras").val(qnt_palavras_digitadas);
                $("#segundos").val(tempo_inicial);
                
                velocidade = (qnt_palavras_digitadas/tempo_inicial).toFixed(2);
                $("#palavraspseg").val(velocidade);
            }
            
            function salvaResultado(){
                
                let corpoTabela = $(".resultado").find("tbody");
                let linha = $("<tr>");
                let colunaNum = $("<td>").text("#"+contador_usuario);
                linha.append(colunaNum);
                let colunaNome = $("<td>").text(nome);
                console.log(nome)
                linha.append(colunaNome);
                let colunaVelocidade = $("<td>").text(velocidade); 
                console.log(velocidade)      
                linha.append(colunaVelocidade);         
                let novalinha = corpoTabela.prepend(linha);
                
            }
            
        </script>
    </body>    
</html>