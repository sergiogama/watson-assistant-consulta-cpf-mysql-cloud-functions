<?php
/**
  *
  * main() will be run when you invoke this action
  *
  * @args Cloud Functions actions accept a single parameter, which must be a JSON object.
  *
  * @return The output of this action, which must be a JSON object.
  * OBS.: As principais libraries já fazem parte 
  *       da instalação na Cloud Functions
  *       Por exemplo, não precisa com arquivo composer.json
  *        com:
  * {
  * "require": {
  *   "ext-mysqli": "*"
  *  }
  * }
  */
function main(array $args) : array
{
    $id = $args["cpf"];

    $mysql_server_name = "sl-us-south-1-portal.50.dblayer.com:29320";
    $mysql_username = "admin";
    $mysql_password = "ZEAPOETSDFUFJWRP";
    $mysql_database = "dxc";
//    echo "Debug: " . $mysql_server_name . ", " .  $mysql_username . ", " .  $mysql_password . "<br>";
    $conn = new mysqli($mysql_server_name, $mysql_username, $mysql_password, $mysql_database);
    if ($conn->connect_errno) {
        return ["Erro"  => "Erro na conexão com MySql: (" . $conn->connect_errno . ") " . $conn->connect_error];
    } else {
        $sql = "SELECT `cliente`.`nome` FROM `dxc`.`cliente` WHERE cpf = ". $id. ";";
        $result = $conn->query($sql);
        echo $sql;
        if ($result->num_rows > 0) {
          echo "Aqui";
          $row = $result->fetch_assoc();
          return ["nome" => $row['nome']];
        } else {
            return ["Erro" => "Registro não encontrado!"];
        }
    }
}
?>