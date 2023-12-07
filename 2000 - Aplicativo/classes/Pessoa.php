<?php

class Pessoa
{
    public $pessoa_id;
    public $nome;
    public $data_nascimento;
    public $email;
    public $cpf;
    public $rg;
    public $telefone;
    public $logradouro_id;
    public $senha;

    // Define um método construtor na classe com parâmetro opcional
    public function __construct($pessoa_id = false)
    {
        // Verifica se a variável $id foi definida
        if ($pessoa_id) {
            // Atribui o valor de $id à propriedade $id do objeto
            $this->pessoa_id = $pessoa_id;
            // carrega as informações correspondentes ao $id do objeto
            $this->carregar();
        }
    }

    public function inserir()
    {
        try {
            // Inclui o arquivo 'Conexao.php'
            include_once "Conexao.php";

            // Define a string SQL de inserção de dados na tabela
            $sql = "INSERT INTO tb_pessoa (nome, data_nascimento, email, cpf, rg, telefone, logradouro_id) VALUES (
            :nome,
            :data_nascimento,
            :email,
            :cpf,
            :rg,
            :telefone,
            :logradouro_id
        )";

            // Prepara a consulta SQL
            $stmt = $conn->prepare($sql);

            // Binde os parâmetros da consulta
            $stmt->bindParam(':nome', $this->nome);
            $stmt->bindParam(':data_nascimento', $this->data_nascimento);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':cpf', $this->cpf);
            $stmt->bindParam(':rg', $this->rg);
            $stmt->bindParam(':telefone', $this->telefone);
            $stmt->bindParam(':logradouro_id', $this->logradouro_id);

            // Executa a consulta SQL
            $stmt->execute();

            return "sucesso";
        } catch (PDOException $e) {
            // Retorna um array indicando erro
            return "erro";
        }
    }

    public function listar()
    {
        try {
            // Define a string SQL para selecionar todos os registros da tabela
            $sql = "SELECT * FROM tb_pessoa p JOIN tb_logradouro l ON p.logradouro_id = l.logradouro_id JOIN tb_endereco e ON l.endereco_id = e.endereco_id JOIN tb_bairro b ON e.bairro_id = b.bairro_id ORDER BY p.pessoa_id";

            // Cria uma nova conexão PDO com o banco de dados "sis-escolar"
            include_once "Conexao.php";

            // Utiliza prepared statement para evitar SQL injection
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            // Obtém todos os registros como um array associativo
            $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Retorna o array contendo todos os registros da tabela "tb_turmas"
            return $lista;
        } catch (PDOException $e) {
            // Trata o erro aqui (pode logar, lançar uma exceção personalizada, etc.)
            echo "Erro na consulta: " . $e->getMessage();
            return array(); // Retorna um array vazio em caso de erro
        }
    }


    public function excluir()
    {
        // Define a string de consulta SQL para deletar um registro
        // da tabela "tb_turmas" com base ni seu ID
        $sql = "DELETE FROM tb_pessoa WHERE pessoa_id=" . $this->pessoa_id;

        // Cria uma nova conexão PDO com o banco de dados localizado
        // no servidor "127.0.0.1" e autentica com o usuário "root" (sem senha)
        $conn = new PDO('mysql:host=127.0.0.1;dbname=test','root','');

        // Executa a intrução SQL de exclusão utilizando o métedo
        // "exerc" do objeto de conexão PDO criado acima
        $conn->exec($sql);
    }

    public function carregar()
    {
        try {
            include_once "Conexao.php";

            $sql = "SELECT * FROM tb_pessoa WHERE pessoa_id = :pessoa_id";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':pessoa_id', $this->pessoa_id);
            $stmt->execute();

            $linha = $stmt->fetch();

            // Atribuição dos valores dos campos recuperados do banco
            $this->nome = $linha['nome'];
            $this->data_nascimento = $linha['data_nascimento'];
            $this->email = $linha['email'];
            $this->cpf = $linha['cpf'];
            $this->rg = $linha['rg'];
            $this->telefone = $linha['telefone'];
            $this->logradouro_id = $linha['logradouro_id'];

        } catch (PDOException $e) {
            // Tratar exceções do PDO (por exemplo, exibir uma mensagem de erro)
            echo "Erro: " . $e->getMessage();
        }
    }

    public function atualizar()
    {
        try {
            $conn = new PDO('mysql:host=127.0.0.1;dbname=test','root','');

            // Consulta SQL preparada
            $sql = "UPDATE tb_pessoa SET
                    nome = :nome,
                    data_nascimento = :data_nascimento,
                    email = :email,
                    cpf = :cpf,
                    rg = :rg,
                    telefone = :telefone,
                    logradouro_id = :logradouro_id
                WHERE pessoa_id = :pessoa_id";

            // Preparação da consulta
            $stmt = $conn->prepare($sql);

            // Vinculação dos parâmetros
            $stmt->bindParam(':pessoa_id', $this->pessoa_id);
            $stmt->bindParam(':nome', $this->nome);
            $stmt->bindParam(':data_nascimento', $this->data_nascimento);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':cpf', $this->cpf);
            $stmt->bindParam(':rg', $this->rg);
            $stmt->bindParam(':telefone', $this->telefone);
            $stmt->bindParam(':logradouro_id', $this->logradouro_id);

            // Execução da consulta
            $stmt->execute();

            return "sucesso";
        } catch (PDOException $e) {
            // Tratamento de exceções
            return "Erro na atualização: " . $e->getMessage();
        }
    }
    public function atualizarSenha()
    {
        try {
            $conn = new PDO('mysql:host=127.0.0.1;dbname=test','root','');

            // Consulta SQL preparada
            $sql = "UPDATE tb_pessoa SET
                    senha = :senha
                WHERE pessoa_id = :pessoa_id";

            // Preparação da consulta
            $stmt = $conn->prepare($sql);

            // Vinculação dos parâmetros
            $stmt->bindParam(':pessoa_id', $this->pessoa_id);
            $stmt->bindParam(':senha', $this->senha);

            // Execução da consulta
            $stmt->execute();

            return "sucesso";
        } catch (PDOException $e) {
            // Tratamento de exceções
            return "Erro na atualização: " . $e->getMessage();
        }
    }


}

?>