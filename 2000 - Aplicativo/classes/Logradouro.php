<?php

class Logradouro
{
    public $logradouro_id;
    public $endereco_id;
    public $numero;
    public $complemento;
    public $inscricao;
    public $matricula;
    public $lig_agua;
    public $lig_energia;

    // Define um método construtor na classe com parâmetro opcional
    public function __construct($logradouro_id = false)
    {
        // Verifica se a variável $id foi definida
        if ($logradouro_id) {
            // Atribui o valor de $id à propriedade $id do objeto
            $this->logradouro_id = $logradouro_id;
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
            $sql = "INSERT INTO tb_logradouro (numero, endereco_id, complemento, inscricao, matricula, lig_agua, lig_energia) VALUES (
            :numero,
            :endereco_id,
            :complemento,
            :inscricao,
            :matricula,
            :lig_agua,
            :lig_energia
        )";

            // Prepara a consulta SQL
            $stmt = $conn->prepare($sql);

            // Binde os parâmetros da consulta
            $stmt->bindParam(':numero', $this->numero);
            $stmt->bindParam(':endereco_id', $this->endereco_id);
            $stmt->bindParam(':complemento', $this->complemento);
            $stmt->bindParam(':inscricao', $this->inscricao);
            $stmt->bindParam(':matricula', $this->matricula);
            $stmt->bindParam(':lig_agua', $this->lig_agua);
            $stmt->bindParam(':lig_energia', $this->lig_energia);

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
            $sql = "SELECT * FROM tb_logradouro l JOIN tb_endereco e ON l.endereco_id = e.endereco_id JOIN tb_bairro b ON e.bairro_id = b.bairro_id ORDER BY l.logradouro_id";

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
        $sql = "DELETE FROM tb_logradouro WHERE logradouro_id=" . $this->logradouro_id;

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

            $sql = "SELECT * FROM tb_logradouro WHERE logradouro_id = :logradouro_id";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':logradouro_id', $this->logradouro_id);
            $stmt->execute();

            $linha = $stmt->fetch();

            // Atribuição dos valores dos campos recuperados do banco
            $this->endereco_id = $linha['endereco_id'];
            $this->numero = $linha['numero'];
            $this->complemento = $linha['complemento'];
            $this->inscricao = $linha['inscricao'];
            $this->matricula = $linha['matricula'];
            $this->lig_agua = $linha['lig_agua'];
            $this->lig_energia = $linha['lig_energia'];

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
            $sql = "UPDATE tb_logradouro SET
                    endereco_id = :endereco_id,
                    numero = :numero,
                    complemento = :complemento,
                    inscricao = :inscricao,
                    matricula = :matricula,
                    lig_agua = :lig_agua,
                    lig_energia = :lig_energia
                WHERE logradouro_id = :logradouro_id";

            // Preparação da consulta
            $stmt = $conn->prepare($sql);

            // Vinculação dos parâmetros
            $stmt->bindParam(':endereco_id', $this->endereco_id);
            $stmt->bindParam(':numero', $this->numero);
            $stmt->bindParam(':complemento', $this->complemento);
            $stmt->bindParam(':inscricao', $this->inscricao);
            $stmt->bindParam(':matricula', $this->matricula);
            $stmt->bindParam(':lig_agua', $this->lig_agua);
            $stmt->bindParam(':lig_energia', $this->lig_energia);
            $stmt->bindParam(':logradouro_id', $this->logradouro_id);

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