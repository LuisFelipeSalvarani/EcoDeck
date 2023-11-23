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
        // Define a string SQL para selecionar todos os registros da tabela
        $sql = "SELECT * FROM tb_disciplinas";

        // Cria uma nova conexão PDO com o banco de dados "sis-escolar"
        $conexao = new PDO('mysql:host=127.0.0.1;dbname=sis-escolar', 'root', '');

        // Executa a string SQL na conexão retornando um objeto de restultado
        $resultado = $conexao->query($sql);

        // Extrai todos os registros do objeto e os armazena em um array
        $lista = $resultado->fetchALL();

        // Retorna o array contendo todos os registros da tabela "tb_turmas"
        return $lista;
    }

    public function excluir()
    {
        // Define a string de consulta SQL para deletar um registro
        // da tabela "tb_turmas" com base ni seu ID
        $sql = "DELETE FROM tb_disciplinas WHERE id=" . $this->id;

        // Cria uma nova conexão PDO com o banco de dados localizado
        // no servidor "127.0.0.1" e autentica com o usuário "root" (sem senha)
        $conexao = new PDO('mysql:host=127.0.0.1;dbname=sis-escolar', 'root', '');

        // Executa a intrução SQL de exclusão utilizando o métedo
        // "exerc" do objeto de conexão PDO criado acima
        $conexao->exec($sql);
    }

    public function carregar()
    {
        // Query SQL para buscar uma turma no banco de dados pelo id
        $sql = "SELECT * FROM tb_disciplinas WHERE id=" . $this->id;
        $conexao = new PDO('mysql:host=127.0.0.1;dbname=sis-escolar', 'root', '');

        // Execução do query e armazenamento do resultado em uma variável
        $resultado = $conexao->query($sql);
        // Recuperação da primeira linha do resultado como um array associativo
        $linha = $resultado->fetch();

        // Atribuição dos valores dos campos recuperados do banco
        $this->nome = $linha['nome'];
        $this->email = $linha['email'];
    }

    public function atualizar()
    {
        // Query SQL para atualizar uma turma no banco de dados pelo id
        $sql = "UPDATE tb_disciplinas SET
                    nome = '$this->nome' ,
                    email = '$this->email' 
                WHERE pessoa_id = $this->pessoa_id ";

        $conexao = new PDO('mysql:host=127.0.0.1;dbname=sis-escolar', 'root', '');
        $conexao->exec($sql);
    }

}

?>