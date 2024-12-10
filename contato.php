<div class="container p-4 my-4">
      <div class=" d-flex justify-content-center">
            <div class="contato p-2 shadow bg-body border rounded-4">
              <h5 class="m-4 text-center text-dark"><strong>Sua mensagem é muito importante para nós</strong></h5>
              <button type="button" class="mx-auto d-flex focus-ring focus-ring-dark py-3 px-5 mt-2 text-decoration-none border rounded-4 justify-content-center bg-claro ocupacity 75 text-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <strong>ENTRAR EM CONTATO</strong>
        </button> 
         <p class="card-text mt-8 p-4 text-center text-dark"><strong>Em breve entraremos em contato, caso seja necessário.
         Obrigado!<strong></p> 
            </div>
          </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header text-dark">
                      <img class="align-self-center m-2 p-2"src="admin/imagens/user.png"  width="75" height="75">
                        <h5 class="modal-title" id="exampleModalLabel">Envie sua mensagem</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-dark">
                        <form class="row g-3">
                          <div class="col-12">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="nome" placeholder="Digite seu nome">
                          </div>
                          <div class="col-md-8">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email"placeholder="Digite seu email">
                          </div>
                          <div class="col-md-4">
                            <label for="estado" class="form-label">Estado</label>
                            <input type="text" class="form-control" id="estado" placeholder="SP">
                          </div>
                          <div class="col-md-4">
                            <label for="cidade" class="form-label">Cidade</label>
                            <input type="text" class="form-control" id="cidade"placeholder="Digite sua cidade">
                          </div>
                          <div class="col-md-4">
                            <label for="telefone" class="form-label">Telefone</label>
                            <input type="text" class="form-control" id="telefone" placeholder="DDD xxxxxxxxx">
                          </div>
                          <div class="col-md-4">
                            <label for="cliente" class="form-label">Cliente</label>
                            <input type="text" class="form-control" id="cliente" placeholder="Sim ou Não">
                          </div>
                          <hr>
                          <div class="col-12">
                            <label for="assunto" class="form-label">Assunto</label>
                            <input type="text" class="form-control" id="assunto"placeholder="sugestões, dúvidas, reclamações, elogios">
                          </div>
                          <div class="col-12">
                            <label for="mensagem" class="form-label">Mensagem</label>
                            <textarea class="form-control" id="mensagem" rows="6"></textarea>
                          </div>
                          <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
  </div> 