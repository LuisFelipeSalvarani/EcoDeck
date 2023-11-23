<link rel="stylesheet" href="../assets/css/tabela.css">
<link rel="stylesheet" href="../assets/css/modal.css">
<div class="container">
  <div class="tabela">

    <!-- Cabeçalho da tabela -->

    <div class="linha header">
      <div class="celula">ID</div>
      <div class="celula">Nome</div>
      <div class="celula">Data de Nascimento</div>
      <div class="celula">CPF</div>
      <div class="celula">RG</div>
      <div class="celula">E-mail</div>
    </div>

    <!-- Linhas da tabela -->

    <div class="linha" id="linha">
      <div class="celula" data-title="ID">1</div>
      <div class="celula" data-title="Nome">Marta Silva</div>
      <div class="celula" data-title="Data de Nascimento">11/10/1980</div>
      <div class="celula" data-title="CPF">459.238.479-53</div>
      <div class="celula" data-title="RG">54.678.996-64</div>
      <div class="celula" data-title="E-mail">marta_silva@gmail.com</div>
    </div>

    <div class="linha" id="linha">
      <div class="celula" data-title="ID">2</div>
      <div class="celula" data-title="Nome">Nelson Pereira</div>
      <div class="celula" data-title="Data de Nascimento">02/07/1966</div>
      <div class="celula" data-title="CPF">009.288.974-30</div>
      <div class="celula" data-title="RG">02.781.576-10</div>
      <div class="celula" data-title="E-mail">nelsonpereira123@hotmail.com</div>
    </div>

    <div class="linha" id="linha">
      <div class="celula" data-title="ID">3</div>
      <div class="celula" data-title="Nome">Roberto Magalhães</div>
      <div class="celula" data-title="Data de Nascimento">01/03/1974</div>
      <div class="celula" data-title="CPF">069.458.357-75</div>
      <div class="celula" data-title="RG">06.547.776-01</div>
      <div class="celula" data-title="E-mail">magalhaes.p@yahoo.com.br</div>
    </div>

    <div class="linha" id="linha">
      <div class="celula" data-title="ID">4</div>
      <div class="celula" data-title="Nome">Gabriela Nascimento</div>
      <div class="celula" data-title="Data de Nascimento">23/09/2000</div>
      <div class="celula" data-title="CPF">429.178.813-60</div>
      <div class="celula" data-title="RG">54.968.455-X</div>
      <div class="celula" data-title="E-mail">gabi_nascimento@gmail.com</div>
    </div>
  </div>

  <dialog>
    <span class="fechar"><i class="fa-solid fa-circle-xmark"></i></span>
    <div class="container">
      <form action="" method="post" id="cadastro">
        <div class="form-linha">
          <div class="input">
            <input disabled type="text" name="nome" id="nome" required />
            <div class="underline"></div>
            <label for="">Nome</label>
          </div>
          <div class="input">
            <input disabled type="text" name="data-nascimento" id="data-nascimento" required />
            <div class="underline"></div>
            <label for="">Data de Nascimento</label>
          </div>
        </div>
        <div class="form-linha">
          <div class="input" id="cpf-input">
            <input disabled type="text" name="CPF" id="CPF" required />
            <div class="underline"></div>
            <label for="">CPF</label>
          </div>
          <div class="input" id="rg-input">
            <input disabled type="text" name="RG" id="RG" required />
            <div class="underline"></div>
            <label for="">RG</label>
          </div>
          <div class="input">
            <input disabled type="email" name="email" id="email" required />
            <div class="underline"></div>
            <label for="">E-mail</label>
          </div>
        </div>
        <div class="form-linha">
          <div class="input" id="cep-input">
            <input disabled type="text" name="cep" id="cep" required />
            <div class="underline"></div>
            <label for="">CEP</label>
          </div>
          <div class="input">
            <input disabled type="text" name="logradouro" id="logradouro" required />
            <div class="underline"></div>
            <label for="">Rua</label>
          </div>
          <div class="input" id="numero-input">
            <input disabled type="number" name="numero" id="numero" step="1" min="0" required />
            <div class="underline"></div>
            <label for="">N°</label>
          </div>
          <div class="input" id="complemento-input">
            <input disabled type="text" name="complemento" id="complemento" />
            <div class="underline"></div>
            <label for="">Complemento</label>
          </div>
        </div>
        <div class="form-linha">
          <div class="input">
            <input disabled type="text" name="bairro" id="bairro" required />
            <div class="underline"></div>
            <label for="">Bairro</label>
          </div>
          <div class="input" id="cidade-input">
            <input disabled type="text" name="cidade" id="cidade" required />
            <div class="underline"></div>
            <label for="">Cidade</label>
          </div>
          <div class="input" id="estado-input">
            <input disabled type="text" name="Estado" id="Estado" required />
            <div class="underline"></div>
            <label for="">Estado</label>
          </div>
        </div>
      </form>
      <div class="botoes">
        <button class="btn-padrao" type="submit" form="cadastro"><span>Salvar</span></button>
        <button class="btn-padrao" id="alterar"><span>Alterar</span></button>
      </div>
    </div>
  </dialog>
</div>
<script src="../assets/js/modal.js"></script>
<script src="../assets/js/alterar.js"></script>