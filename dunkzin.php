<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Produto</title>
</head>
<body>
<?php 
    include_once("../Drop-Pace/includes/menu.php")
?> 
<style>
    body {
        font-family: 'Roboto', sans-serif;
        margin: 0;
        padding: 0;
        background-color: black;
        height: auto;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    nav {
        padding: 15px 20px;
        color: white;
        font-size: 18px;
        text-align: center;
        width: 100%;
    }

    .product-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        padding: 40px;
        background-color: #fff;
        max-width: 1200px;
        width: 100%;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        margin-top: 20px;
        gap: 20px;
    }

    .product-image {
        max-width: 500px;
        height: auto;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }

    .product-info {
        max-width: 600px;
        display: flex;
        flex-direction: column;
        gap: 20px;
        width: 100%;
    }

    .product-info h1 {
        font-size: 28px;
        margin-bottom: 10px;
    }

    .product-info p {
        color: #555;
        font-size: 16px;
    }

    .product-info .price {
        font-size: 24px;
        color: #E53935;
        font-weight: bold;
    }

    .size-selector {
        list-style-type: none;
        padding: 0;
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    .size-selector li {
        display: inline-block;
        padding: 8px 15px;
        font-size: 16px;
        border: 1px solid #ddd;
        border-radius: 5px;
        background-color: #f5f5f5;
        cursor: pointer;
    }

    .size-selector li:hover {
        background-color: #ddd;
    }

    .size-selector li.selected {
        background-color: black;
        color: white;
    }

    .quantity-selector {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .quantity-selector input {
        width: 50px;
        padding: 5px;
        text-align: center;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    .frete-container {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .frete-container input {
        width: 366px;
        padding: 8px;
        border-radius: 5px;
        border: 1px solid #ddd;
    }

    @media (max-width: 768px) {
        .product-container {
            flex-direction: column;
            align-items: center;
        }

        .product-image {
            max-width: 100%;
        }

        .product-info {
            max-width: 100%;
            padding: 20px;
            text-align: center;
        }

        .frete-container {
            flex-direction: column;
            gap: 5px;
        }

        .frete-container input {
            width: 100%;
        }
    }
</style>

<section class="product-container">
    <img class="product-image" src="img/dunkzada.jpg" alt="Tênis Modelo XYZ">

    <div class="product-info">
        <h1>Nike Sb Dunk</h1>
        <p class="price">R$ 1749,90</p>


        <div>
            <strong>Tamanhos:</strong>
            <ul class="size-selector">
                <li onclick="toggleSize(this)">Tamanho 36</li>
                <li onclick="toggleSize(this)">Tamanho 37</li>
                <li onclick="toggleSize(this)">Tamanho 38</li>
                <li onclick="toggleSize(this)">Tamanho 39</li>
                <li onclick="toggleSize(this)">Tamanho 40</li>
                <li onclick="toggleSize(this)">Tamanho 41</li>
                <li onclick="toggleSize(this)">Tamanho 42</li>
                <li onclick="toggleSize(this)">Tamanho 43</li>
            </ul>
        </div>

        <div class="quantity-selector">
            <label for="quantity">Quantidade:</label>
            <input type="number" id="quantity" name="quantity" min="1" max="10" value="1">
        </div>

        <div class="frete-container">
            <input type="text" placeholder="Digite o CEP">
            <button class="btn btn-outline-dark">Calcular</button>
        </div>

        <div class="action-buttons">
            <button onclick="adicionarAoCarrinho()" class="btn btn-outline-dark">Comprar</button>
        </div>
    </div>
</section>

<script>
    function toggleSize(element) {
        if (element.classList.contains('selected')) {
            element.classList.remove('selected');
        } else {
            document.querySelectorAll('.size-selector li').forEach(function(size) {
                size.classList.remove('selected');
            });
            element.classList.add('selected');
        }
    }

    function adicionarAoCarrinho() {
        const nomeProduto = document.querySelector('.product-info h1').textContent;
        const precoProduto = document.querySelector('.price').textContent;
        const tamanhoSelecionado = document.querySelector('.size-selector .selected')?.textContent || 'Não selecionado';
        const quantidade = document.querySelector('#quantity').value;

        const url = `carrinho.php?nome=${encodeURIComponent(nomeProduto)}&preco=${encodeURIComponent(precoProduto)}&tamanho=${encodeURIComponent(tamanhoSelecionado)}&quantidade=${quantidade}`;

        window.location.href = url;
    }
</script>
</body>
</html>
