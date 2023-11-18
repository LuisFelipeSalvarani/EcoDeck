<link rel="stylesheet" href="../assets/css/cadastro.css" />
<div class="container">
        <div class="text">
          <h2>Cadastro</h2>
          <h3>Pessoa</h3>
        </div>
        <form action="" method="post" id="cadastro">
          <div class="form-linha">
            <div class="input">
              <input type="text" name="nome" id="nome" required />
              <div class="underline"></div>
              <label for="">Nome</label>
            </div>
            <div class="input">
              <input type="text" name="data-nascimento" id="data-nascimento" required />
              <div class="underline"></div>
              <label for="">Data de Nascimento</label>
            </div>
          </div>
          <div class="form-linha">
            <div class="input" id="cpf-input">
              <input type="text" name="CPF" id="CPF" required />
              <div class="underline"></div>
              <label for="">CPF</label>
            </div>
            <div class="input" id="rg-input">
              <input type="text" name="RG" id="RG" required />
              <div class="underline"></div>
              <label for="">RG</label>
            </div>
            <div class="input">
              <input type="email" name="email" id="email" required />
              <div class="underline"></div>
              <label for="">E-mail</label>
            </div>
          </div>
          <div class="form-linha">
            <div class="input" id="cep-input">
              <input type="text" name="cep" id="cep" required />
              <div class="underline"></div>
              <label for="">CEP</label>
            </div>
            <div class="input">
              <input type="text" name="logradouro" id="logradouro" required />
              <div class="underline"></div>
              <label for="">Rua</label>
            </div>
            <div class="input" id="numero-input">
              <input type="number" name="numero" id="numero" step="1" min="0" required />
              <div class="underline"></div>
              <label for="">N°</label>
            </div>
            <div class="input" id="complemento-input">
              <input type="text" name="complemento" id="complemento"/>
              <div class="underline"></div>
              <label for="">Complemento</label>
            </div>
          </div>
          <div class="form-linha">
            <div class="input">
              <input type="text" name="bairro" id="bairro" required />
              <div class="underline"></div>
              <label for="">Bairro</label>
            </div>
            <div class="input" id="cidade-input">
              <input type="text" name="cidade" id="cidade" required />
              <div class="underline"></div>
              <label for="">Cidade</label>
            </div>
            <div class="input" id="estado-input">
              <input type="text" name="Estado" id="Estado" required />
              <div class="underline"></div>
              <label for="">Estado</label>
            </div>
          </div>
        </form>
        <button class="btn-padrao" type="submit" form="cadastro"><span>Cadastrar</span></button>
      </div>