<!DOCTYPE html>
<html>
    <head>
        <title>Hawks Typer</title>
        <link rel="icon" href="img/icon.png">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/typer.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.0/css/all.css" integrity="sha384-aOkxzJ5uQz7WBObEZcHvV5JvRW3TUc2rNPA7pe3AwnsUohiw1Vj2Rgx2KSOkF5+h" crossorigin="anonymous">
        <meta charset="UTF-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    </head>
    <body>
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
                    <p>Segundos: <span id="segundos-restante">8</span></p>
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
                    <a href="#"><i class="fas fa-undo" id="reiniciar"></i></a>
                </div>
                    <p>Caracteres digitados: <span id="caracteres-digitados">0</span></p>
                    <p>Palavras digitadas: <span id="palavras-digitadas">0</span></p>
            </div>
        </main>
        <footer class="container-fluid">
            <div class="resultado table-responsive">
            <h1>Resultados</h1>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Posição</th>
                            <th>Usuário</th>
                            <th>Tempo (Segundos)</th>                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#1</td>
                            <td>Renan do Nascimento</td>
                            <td>3</td>
                        </tr>
                        <tr>
                            <td>#2</td>
                            <td>Renan do Nascimento</td>
                            <td>2</td>
                        </tr>
                        <tr>
                            <td>#3</td>
                            <td>Renan do Nascimento</td>
                            <td>1</td>
                        </tr>
                    </tbody>
                </table>
            </div>
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
            let segundos_restantes = $("#segundos-restante").text();
            
            $(()=>contador())
            $("#quantidade-palavras").text(qnt_palavras);
            $("#reiniciar").click(()=>{if(segundos_restantes<=0)resetar()});
            
            
            function resetar(){
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
            
            mostrar_digitados();
            
            function mostrar_digitados(){
                frase_form.on("input",() => {
                    let qnt_palavras_digitadas = frase_form.val().split(/\S+/).length-1;
                    let palavras = palavras_digitadas.text(qnt_palavras_digitadas);
                    let qnt_caracteres = frase_form.val().length;
                    caracteres_digitados.text(qnt_caracteres)
                    verificaCorreto();
                });
            }
            function verificaCorreto(){
                console.log(frase_form.val())
                console.log(frase.substr(0,frase_form.val().length))
                if(frase_form.val() == frase.substr(0,frase_form.val().length)){
                    frase_form.addClass("frase-correta");
                    frase_form.removeClass("frase-incorreta");
                }else{
                    frase_form.addClass("frase-incorreta");
                    frase_form.removeClass("frase-correta");
                }
            }
            
            function contador(){
                frase_form.one("focus", () => {
                    let cronometro = setInterval( () => {
                        $("#segundos-restante").text(segundos_restantes);
                        segundos_restantes--;
                        if(segundos_restantes < 0){
                            frase_form.attr("disabled",true);
                            clearInterval(cronometro);
                        }
                    },1000);
                }
                );
              
            }
            
            
            
        </script>
    </body>    
</html>