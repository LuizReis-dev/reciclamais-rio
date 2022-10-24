<?php
    session_start();
    if($_SESSION["id_usuario"] != $_GET["id"]){
        header('location: usuario.php?id=' . $_SESSION["id_usuario"]);
    }
    require '../util/conexao.php';
    
    $id_usuario = $_GET["id"];
     $sql = "SELECT * FROM empresa WHERE id_usuario = $id_usuario";

     $result = $conn->query($sql);

    //Se a consulta tiver resultados
     if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        $id_empresa = $row["id"];
        $sqlCompras = "SELECT * FROM operacao_comercial WHERE id_empresa = $id_empresa";

        $resultCompras = $conn->query($sqlCompras);
        
?>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReciclaMaisRio | Usuário</title>
    <link rel="stylesheet" href="../css/usuario.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="icon" type="image/x-icon" href="../imagens/favicon.ico">
</head>

<body>
    <div id="pagina">
        <?php
        require('../util/cabecalho.php');
        ?>
        <div class="conteiner">
            <aside>
                <div class="user">
                    <i class="bi bi-person-circle"></i>
                </div>
                <div class="dados">
                    <h2>Empresa</h2>
                    <p><?php echo $row["nome"];?></p>
                    <h2>Telefone</h2>
                    <p><?php echo $row["telefone"];?></p>

                    <h2>CNPJ</h2>
                    <p><?php echo $row["cnpj"];?></p>

                    <h2>E-mail</h2>
                    <p><?php echo $row["email"];?></p>

                    <h2>Ramo</h2>
                    <p><?php echo $row["ramo"];?></p>

                    <h2>Endereço</h2>
                    <p><?php echo $row["endereco"];?></p>

                    <a href="<?php echo "editar.php?id=$id_usuario"?>">editar</a>

                </div>
            </aside>
            <main>
                
                <table class="compras">
                    <thead>
                        <tr>
                            <th colspan="3">Compras efetuadas</th>
                        </tr>
                    </thead>
                    <tbody>
                <?php 
                        while($rowCompras = $resultCompras->fetch_assoc()){
                        echo "<tr data-id='".$rowCompras["id"]."' class='row'>
                            <td>Preço: R$". $rowCompras["total_final"] ."</td>
                            <td>".$rowCompras["data"]."</td>
                            <td>".$rowCompras["status"]."</td>
                            </tr>";
                        }
                ?>
                        
                    </tbody>
                </table>
                    <?php 
     } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
     }
                    ?>
            </main>
        </div>
    </div>
<script>
    let rows = document.querySelectorAll(".row");
    console.log(rows);
    rows.forEach((row,index)=>{
        row.addEventListener('click', (e)=>{
            window.location.href = `../util/verdetalhesvenda.php?id=${row.dataset.id}`;
        })
    })
</script>
</body>

</html>