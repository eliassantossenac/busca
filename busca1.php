<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Lista de veículos</h1>
    <form action="" method="get">
        <input name="busca" placeholder="Digite os termos da pesquisa" type="text">
        <button type="submit" name="pesquisa">Pesquisar</button>
    </form>
    <!-- inseri os dados em um tabela ao inves de usar o recurso do bootstrap de colunas-->
    <table border="1"> 
        <tr>
            <td> Marca </td>
            <td> Veículo </td>
            <td> Modelo </td>
        </tr>
        <?php
        if (!isset($_GET['busca'])) { // se não há um conteúdo em busca
        ?>
        <tr>
            <td colspan="3">Digite algo para pesquisar...</td>
        </tr>
        <?php
         } else { // caso haja um conteúdo em busca
            
            require_once('Model/conexao.php');  // faz a conexao
            $pesquisa = $_GET['busca']; // pega o conteudo digitado
            $sql_code = "SELECT * FROM carro WHERE fabricante LIKE '%$pesquisa%' OR modelo LIKE '%$pesquisa%' OR veiculo LIKE '%$pesquisa%'";
            $stmt = Conexao::getConn()->prepare($sql_code); 
            $stmt->execute();

            // veja acima que estamos fazendo uma busca por aproximação
            
            if ($stmt->rowCount() == 0) { // lembra-se do rowCount? usado na classe read?
               ?>
                <tr>
                    <td colspan="3">Nenhum resultado encontrado ...</td>
                </tr> 
            <?php 
            } else {
                // o método abaixo também estava no método read
                foreach ($stmt->fetchAll(\PDO::FETCH_ASSOC) as $resultado): 
                    ?>
                    <tr>
                        <td><?php echo $resultado["fabricante"]; ?></td>
                        <td><?php echo $resultado["veiculo"]; ?></td>
                        <td><?php echo $resultado["modelo"]; ?></td>
                    </tr>
                <?php
                endforeach;   
            }
            ?>
        <?php 
        }?>
</body>
</html>