<?php

class Rua
{
    public $rua_id;
    public $rua;
    public $bairro_id;
    public $cep;

    // Define um método construtor na classe com parâmetro opcional
    public function __construct($rua_id = false)
    {
        // Verifica se a variável $id foi definida
        if ($rua_id) {
            // Atribui o valor de $id à propriedade $id do objeto
            $this->rua_id = $rua_id;
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
            $sql = "INSERT INTO tb_rua (rua, bairro_id, cep) VALUES (
            :rua,
            :bairro_id,
            :cep
        )";

            // Prepara a consulta SQL
            $stmt = $conn->prepare($sql);

            // Binde os parâmetros da consulta
            $stmt->bindParam(':rua', $this->rua);
            $stmt->bindParam(':bairro_id', $this->bairro_id);
            $stmt->bindParam(':cep', $this->cep);

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
        $sql = "SELECT * FROM tb_rua";

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
        $sql = "DELETE FROM tb_rua WHERE id=" . $this->id;

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
        $sql = "SELECT * FROM tb_rua WHERE id=" . $this->id;
        $conexao = new PDO('mysql:host=127.0.0.1;dbname=sis-escolar', 'root', '');

        // Execução do query e armazenamento do resultado em uma variável
        $resultado = $conexao->query($sql);
        // Recuperação da primeira linha do resultado como um array associativo
        $linha = $resultado->fetch();

        // Atribuição dos valores dos campos recuperados do banco
        $this->bairro = $linha['bairro'];
        $this->rua = $linha['rua'];
    }

    public function atualizar()
    {
        // Query SQL para atualizar uma turma no banco de dados pelo id
        $sql = "UPDATE tb_rua SET
                    bairro = '$this->bairro' ,
                    rua = '$this->rua' 
                WHERE rua_id = $this->rua_id ";

        $conexao = new PDO('mysql:host=127.0.0.1;dbname=sis-escolar', 'root', '');
        $conexao->exec($sql);
    }

}

?>