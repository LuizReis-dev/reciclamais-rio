<?php
require '../util/conexao.php';
session_start();
$materiais_no_carrinho = isset($_SESSION['carrinho']) ? $_SESSION['carrinho'] : array();
$materiais_para_pesquisar = " ";
foreach ($materiais_no_carrinho as $material) {
    $auxiliar = $materiais_para_pesquisar;
    $materiais_para_pesquisar = $material . ", " . $auxiliar;
}

$key = "pk_test_51LfOQfE7cOap8gRqcklPycJSGQvNoo6m4r0RMTcSbpQ7c68emsX7sfQN8dXCL7BV5tHvoT2zXiXs7W7kJIK0kSZE00LwS768xH";
?>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReciclaMaisRio | Carrinho</title>
    <link rel="stylesheet" href="../css/carrinho.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="../imagens/favicon.ico">
    <script src="https://js.stripe.com/v3/"></script>

</head>

<body>
    <div id="pagina">
        <?php
        require '../util/cabecalho.php';
        ?>
        <div class="letreiro">
            <h1 class="titulo">Carrinho</h1>
        </div>
        <table class="tabela">
            <thead>
                <tr>
                    <td colspan="2">Produto</td>
                    <td>Preço</td>
                    <td>Quantidade em kg</td>
                    <td>Total</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM material WHERE id IN (" . $materiais_para_pesquisar . "0 )";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<tr class="material-adicionado" data-preco="' . $row["preco_venda_kg"] . '"data-qtd="' . $row["qtd_disponivel_venda"] . '" data-id="' . $row["id"] . '">';
                        echo '<td class="img"><a href=""> <img src=">" width="50" height="50" alt=""></a> </td>';
                        echo ' <td>
                            <a href="">' . $row["nome"] . '</a>
                            <br>
                            <a href="../carrinho/removercarrinho.php?id_material=' . $row["id"] . '" class="remover">remover</a>
                            </td>
                            <td class="preco">R$' . $row["preco_venda_kg"] . '</td>
                            <td class="quantidade">
                            <input class="quantidade-input" type="number" name="quantidade-' . $row["id"] . '" value="1" min="1" max="" placeholder="quantidade em KG" required>
                            </td>
                            <td class="preco-calcular" id="preco-' . $row["id"] . '">R$' . $row["preco_venda_kg"] . '</td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<td colspan="5" style="text-align:center;"> Você ainda não adicionou nenhum material ao carrinho </td>';
                }
                ?>
            </tbody>
        </table>
        <div class="confirmar">
            <i class="fa-solid fa-circle-exclamation"></i>
            <p>Confira a quantidade selecionada antes de realizar a compra</p>
        </div>
        <div class="dados">
            <div class="subtotal">
                <span class="texto">Preço total</span>
                <span id="subtotal"></span>
            </div>
            <div class="buttons">
                <div>
                    <input type="submit" value="Atualizar" name="atualizar">
                    <a href="#">
                        <span></span>
                    </a>
                </div>
                <div>
                    <input type="submit" value="Comprar" name="comprar" id="btn-comprar">
                    <a href="#">
                        <span></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script>
        let materiais = document.querySelectorAll('.material-adicionado');
        let totalValor;
        materiais.forEach((material, index) => {
            let totalDiv = document.getElementById(`preco-${material.dataset.id}`);
            let quantidadeinput = document.getElementsByName(`quantidade-${material.dataset.id}`);
            quantidadeinput[0].addEventListener('input', () => {

                if(quantidadeinput[0].value > parseInt(material.dataset.qtd)){
                    quantidadeinput[0].value =  parseInt(material.dataset.qtd);
                }
                if(quantidadeinput[0].value < 0) {
                    quantidadeinput[0].value = 0
                }
                
                totalValor = quantidadeinput[0].value * material.dataset.preco;
                
                
                totalDiv.innerHTML = `R$${totalValor}`;
                calcularValorFinal();
            });
        })
        let calcularValorFinal = () => {
            let valorFinal = 0;
            let valores = document.querySelectorAll('.preco-calcular');
            valores.forEach((valor) => {
                valorFinal += parseFloat(valor.textContent.substr(2));
            })
            let preco = document.querySelector('#subtotal');
            preco.innerHTML = `R$${valorFinal}`;
            return valorFinal;
        }

        calcularValorFinal();

        let btnComprar = document.querySelector('#btn-comprar');

        const retornarMateriaisQuantidade = () => {
            let materiaisQuantidade = [];
            materiais.forEach((material, index) => {
                let quantidade = document.getElementsByName(`quantidade-${material.dataset.id}`);
                let materialId = material.dataset.id;

                const quantidadeObj = {
                    material: materialId,
                    quantidade: quantidade[0].value
                }

                materiaisQuantidade.push(quantidadeObj);
            })
            return materiaisQuantidade;
        }
        var createCheckoutSession = function(stripe) {
            return fetch("../stripe_charge.php", {
                method: "POST",
                headers: {
                    "Content-Type": "aplication/json",
                },
                body: JSON.stringify({
                    checkoutSession: 1,
                    Price: calcularValorFinal(),
                    quantidade: retornarMateriaisQuantidade()
                }),
            }).then(function(result) {
                return result.json();
            });
        };
        var handleResult = function(result) {
            if (result.error) {
                console.log(result.error.message);
            }
            buyBtn.disabled = false;
            buyBtn.textContent = 'Assinar agora';
        };
        var stripe = Stripe("<?php echo $key;?>");
        btnComprar.addEventListener('click', (e) => {
            btnComprar.disabled = true;
            btnComprar.textContent = "Aguarde...";
            console.log('Vasco');
            
            createCheckoutSession().then(function(data) {
                if (data.sessionId) {
                    stripe.redirectToCheckout({
                        sessionId: data.sessionId,
                    }).then(handleResult);
                } else {
                    handleResult(data);
                }
            });
        })
        
        
    </script>
</body>

</html>