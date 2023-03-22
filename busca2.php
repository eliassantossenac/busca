<!DOCTYPE html>
<html lang="en">
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
            require_once('Model/carro.php');
            require_once('Model/carroDao.php');
            $carro = new Model\Carro();  // instanciamento das classes
            $carroDao = new Model\CarroDao();

            if ($carroDao->find($_GET['busca'])==0) { // pega o conteudo digitado e passa para o método find
               ?>
                <tr>
                    <td colspan="3">Nenhum resultado encontrado ...</td>
                </tr> 
            <?php 
            } else {
                // o método abaixo também estava no método read
                foreach ($carroDao->find($_GET['busca']) as $carro):
                    ?>
                    <tr>
                        <td><?php echo $carro["fabricante"]; ?></td>
                        <td><?php echo $carro["veiculo"]; ?></td>
                        <td><?php echo $carro["modelo"]; ?></td>
                    </tr>
                <?php
                endforeach;   
            }
            ?>
        <?php 
        }?>
</body>
</html>