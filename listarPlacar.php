<form method="get" action="#listaPlacar">
    <div class="modal fade" id="listaPlacar" tabindex="-1" role="dialog" aria-labelledby="placarTitulo" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="placarTitulo">Placar</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <div class="container-fluid">
                  <div class="table-responsive">
                        <table class="resultado table table-striped">
                            <thead>
                                <tr>
                                    <th>Posição</th>
                                    <th>Usuário</th>
                                    <th>Velocidade</th>                            
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
              </div>
              <i>*Velocidade medida em palavras por segundo</i>
          </div>
          <div class="modal-footer">
            <button type="submit" name="teste" class="btn btn-warning" >Atualizar</button>
            <button type="button" name="teste2" class="btn btn-secondary" data-dismiss="modal">Sair</button>
          </div>
        </div>
      </div>
    </div>
</form>