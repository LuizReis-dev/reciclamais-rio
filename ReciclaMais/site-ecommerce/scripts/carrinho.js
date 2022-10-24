let materiais = document.querySelectorAll('.material-adicionado');
        let totalValor;
        materiais.forEach((material, index) => {
            let totalDiv = document.getElementById(`preco-${material.dataset.id}`);
            let quantidadeinput = document.getElementsByName(`quantidade-${material.dataset.id}`);
            quantidadeinput[0].addEventListener('blur', () => {
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
            preco.innerHTML = `R$${valorFinal}`
            return valorFinal;
        }

        calcularValorFinal();

        let btnComprar = document.querySelector('#btn-comprar');

        var createCheckoutSession = function(stripe) {
            return fetch("../stripe_charge.php", {
                method: "POST",
                headers: {
                    "Content-Type": "aplication/json",
                },
                body: JSON.stringify({
                    checkoutSession: 1,
                    Price: calcularValorFinal(),
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
        var stripe = Stripe('pk_test_51LfOQfE7cOap8gRqcklPycJSGQvNoo6m4r0RMTcSbpQ7c68emsX7sfQN8dXCL7BV5tHvoT2zXiXs7W7kJIK0kSZE00LwS768H');

        btnComprar.addEventListener('click', (e) => {
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