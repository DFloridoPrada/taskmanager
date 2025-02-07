<?php
    require_once "../vendor/autoload.php";
    use davidflorido\Lib\Database;

    $db = new Database();
    $conn = $db -> getConn();
    echo "<pre>";
    echo var_dump($conn);
    echo "</pre>";

    ////////////// INSERT USUARIO
    // echo "Sentencia INSERT";
    // echo "<br>";
    // $query = 'INSERT INTO usuarios (usuario, password) VALUES (?,?)';
    // $param = ['David', '$2y$10$Hi3ab5GvmAFPEk.wEGzIE.uBTBeZLiBXikWhromtBBhRIVawFtXqa'];
    // $result = $db -> updateQuery($query, $param, 'ss');
    // echo $result;
    // echo "<br>";

    ////////////// INSERT TAREA
    // echo "Sentencia INSERT";
    // echo "<br>";
    // $query = 'INSERT INTO tareas (titulo, descripcion, usuario) VALUES (?,?,?)';
    // $param = ['Tarea larga', 'sadjhasiuhdsauihdasiuhduiashduahsudhasuipdhasphdasuhduashduaishdsuahduaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaio', 'David'];
    // $result = $db -> updateQuery($query, $param, 'sss');
    // echo $result;
    // echo "<br>";

    /////////////// DELETE
    // echo "Sentencia DELETE";
    // echo "<br>";
    // $query = 'DELETE FROM usuarios WHERE id=7';
    // $result = $db -> runQuery($query, [], '');
    // echo $result;
    // echo "<br>";

    /////////////// SELECT
    echo "Sentencia SELECT";
    echo "<br>";
    $query = 'SELECT * FROM usuarios';
    $result = $db -> executeQuery($query, [], '');
    echo '<pre>';
    echo print_r($result);
    echo '</pre>';
    echo "<br>";

    /////////////// UPDATE
    // echo "Sentencia UPDATE";
    // echo "<br>";
    // $query = 'UPDATE usuarios SET usuario = ? WHERE id = ?';
    // $result = $db -> runQuery($query, ['Mario', 8], 'si');
    // echo $result;
    // echo "<br>";
?>