<?php

namespace Model;

class CarroDao {

    public function find($pesquisa){ // passei um parametro denominado $pesquisa
   
        $sql_code = "SELECT * FROM carro WHERE fabricante LIKE ? OR modelo LIKE ? OR veiculo LIKE ?";
       
        $stmt = Conexao::getConn()->prepare($sql_code);
        $stmt->bindValue(1, "%$pesquisa%"); 
        $stmt->bindValue(2, "%$pesquisa%");
        $stmt->bindValue(3, "%$pesquisa%");

        $stmt->execute();

        if($stmt->rowCount() > 0): // olha o rowCount !!!
            // Se existe pelo menos uma linha (registro)
            $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC); 
            // insere em resultado o conteúdo
            return $resultado; 
            // retorna a variavel resultado
        else:
           $resultado = 0;
           return $resultado;
            // retorna um 0 caso não encontre
        endif;
   }
    
}
?>