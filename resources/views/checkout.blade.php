<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Stripe</title>
    <script src="https://js.stripe.com/v3/"></script>
    <style>
        body { display: flex; justify-content: center; align-items: center; height: 100vh; background: #f7f7f7; font-family: Arial, sans-serif; }
        button { background: #6772e5; color: #fff; padding: 12px 20px; border: none; border-radius: 5px; font-size: 18px; cursor: pointer; }
        button:hover { background: #5469d4; }
    </style>
</head>
<body>
    <button id="checkout-button">Pagar R$50,00</button>

  <script>
    let valor = 502323;
    document.getElementById('checkout-button').addEventListener('click', async () => {
        const response = await fetch("{{ route('checkout.session') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body:JSON.stringify({
                valor:500003
            })
        });

        const data = await response.json();
        console.log(data);

        // Redirecion   a para o checkout do Stripe
        // if (data.url) {
        //     window.location.href = data.url;
        // } else {
        //     alert("Erro ao criar sessão de pagamento");
        // }
    });
</script>

</body>
</html>
