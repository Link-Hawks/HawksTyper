<div class="modal fade" id="caixaSalvar" tabindex="-1" role="dialog" aria-labelledby="caixaSalvarTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="caixaSalvarTitle">Salvar Resultado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group row">                                
            <label for="nome" class="col-sm-2 col-form-label font-weight-bold">Nome</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="nome" placeholder="Digite seu nome">
            </div>
            <div class="form-row">
                <div class="col">
                    <label for="palavras" class="col-sm-2 col-form-label font-weight-bold">Palavras:</label>
                </div>
                <div class="col">
                      <input type="text" readonly class="form-control-plaintext" id="palavras" value="100">
                </div>
                <div class="col">
                    <label for="palavras" class="col-sm-2 col-form-label font-weight-bold">Segundos:</label>
                </div>
                <div class="col">
                      <input type="text" readonly class="form-control-plaintext" id="segundos" value="100">
                </div>
            </div>   
                <div class="col">
                    <label for="palavras" class="col-sm-15 col-form-label font-weight-bold">Palavras por segundo:</label>
                </div>
                <div class="col-sm-7 ">                                        
                      <input type="text" readonly class="form-control-plaintext " id="palavraspseg" value="1">
                </div>  
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button href="#" type="button" id="confirmar-save" class="btn btn-danger" data-dismiss="modal">Salvar Placar</button>
      </div>
    </div>
  </div>
</div>