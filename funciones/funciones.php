<?php
/**funcion para  pedir ala base de datos las ultima  4 entradas  */
function ultimas_entradas($conexion){

    $sql="SELECT * FROM publications ORDER BY  ID  DESC LIMIT 3 ";
    $retur_sql=mysqli_query($conexion,$sql);
return $retur_sql;
}


?>



