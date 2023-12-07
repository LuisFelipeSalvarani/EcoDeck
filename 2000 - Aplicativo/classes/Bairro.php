<?php

class Bairro
{
    public $bairro_id;
    public $grupo;
    public $bairro;
    public $cidade;
    public $estado;

    // Define um método construtor na classe com parâmetro opcional
    public function __construct($bairro_id = false)
    {
        // Verifica se a variável $id foi definida
        if ($bairro_id) {
            // Atribui o valor de $id à propriedade $id do objeto
            $this->bairro_id = $bairro_id;
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
            $sql = "INSERT INTO tb_bairro (bairro, grupo, cidade, estado) VALUES (
            :bairro,
            :grupo,
            :cidade,
            :estado
        )";

            // Prepara a consulta SQL
            $stmt = $conn->prepare($sql);

            // Binde os parâmetros da consulta
            $stmt->bindParam(':bairro', $this->bairro);
            $stmt->bindParam(':grupo', $this->grupo);
            $stmt->bindParam(':cidade', $this->cidade);
            $stmt->bindParam(':estado', $this->estado);

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
            $sql = "SELECT * FROM tb_bairro";

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
        $sql = "DELETE FROM tb_bairro WHERE bairro_id=" . $this->bairro_id;

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

            $sql = "SELECT * FROM tb_bairro WHERE bairro_id = :bairro_id";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':bairro_id', $this->bairro_id);
            $stmt->execute();

            $linha = $stmt->fetch();

            // Atribuição dos valores dos campos recuperados do banco
            $this->grupo = $linha['grupo'];
            $this->bairro = $linha['bairro'];
            $this->cidade = $linha['cidade'];
            $this->estado = $linha['estado'];

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
            $sql = "UPDATE tb_bairro SET
                    grupo = :grupo,
                    bairro = :bairro,
                    cidade = :cidade,
                    estado = :estado
                WHERE bairro_id = :bairro_id";

            // Preparação da consulta
            $stmt = $conn->prepare($sql);

            // Vinculação dos parâmetros
            $stmt->bindParam(':grupo', $this->grupo);
            $stmt->bindParam(':bairro', $this->bairro);
            $stmt->bindParam(':cidade', $this->cidade);
            $stmt->bindParam(':estado', $this->estado);
            $stmt->bindParam(':bairro_id', $this->bairro_id);

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