<?php

class Endereco
{
    public $endereco_id;
    public $via;
    public $titulo;
    public $endereco;
    public $bairro_id;
    public $cep;

    // Define um método construtor na classe com parâmetro opcional
    public function __construct($endereco_id = false)
    {
        // Verifica se a variável $id foi definida
        if ($endereco_id) {
            // Atribui o valor de $id à propriedade $id do objeto
            $this->endereco_id = $endereco_id;
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
            $sql = "INSERT INTO tb_endereco (via, titulo, endereco, bairro_id, cep) VALUES (
            :via,
            :titulo,
            :endereco,
            :bairro_id,
            :cep
        )";

            // Prepara a consulta SQL
            $stmt = $conn->prepare($sql);

            // Binde os parâmetros da consulta
            $stmt->bindParam(':via', $this->via);
            $stmt->bindParam(':titulo', $this->titulo);
            $stmt->bindParam(':endereco', $this->endereco);
            $stmt->bindParam(':bairro_id', $this->bairro_id);
            $stmt->bindParam(':cep', $this->cep);

            // Executa a consulta SQL
            $stmt->execute();

            return "sucesso";
        } catch (PDOException $e) {
            // Retorna um array indicando erro
            return "erro" . $e;
        }
    }

    public function listar()
    {
        try {
            // Define a string SQL para selecionar todos os registros da tabela
            $sql = "SELECT e.endereco_id, e.endereco, e.via, e.titulo, e.cep, e.bairro_id, b.grupo, b.bairro, b.cidade, b.estado FROM tb_endereco e JOIN tb_bairro b ON e.bairro_id = b.bairro_id ORDER BY e.endereco_id";

            // Inclui o arquivo com a conexão PDO com o banco de dados
            include_once "Conexao.php";

            // Utiliza prepared statement para evitar SQL injection
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            // Obtém todos os registros como um array associativo
            $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Retorna o array contendo todos os registros da tabela
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
        $sql = "DELETE FROM tb_endereco WHERE endereco_id=" . $this->endereco_id;

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

            $sql = "SELECT * FROM tb_endereco WHERE endereco_id = :endereco_id";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':endereco_id', $this->endereco_id);
            $stmt->execute();

            $linha = $stmt->fetch();

            // Atribuição dos valores dos campos recuperados do banco
            $this->via = $linha['via'];
            $this->titulo = $linha['titulo'];
            $this->endereco = $linha['endereco'];
            $this->bairro_id = $linha['bairro_id'];
            $this->cep = $linha['cep'];

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
            $sql = "UPDATE tb_endereco SET
                    via = :via,
                    titulo = :titulo,
                    endereco = :endereco,
                    bairro_id = :bairro_id,
                    cep = :cep
                WHERE endereco_id = :endereco_id";

            // Preparação da consulta
            $stmt = $conn->prepare($sql);

            // Vinculação dos parâmetros
            $stmt->bindParam(':endereco_id', $this->endereco_id);
            $stmt->bindParam(':via', $this->via);
            $stmt->bindParam(':titulo', $this->titulo);
            $stmt->bindParam(':endereco', $this->endereco);
            $stmt->bindParam(':bairro_id', $this->bairro_id);
            $stmt->bindParam(':cep', $this->cep);

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