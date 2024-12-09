<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produto - Loja</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #000; /* Cor de fundo alterada para preto */
            color: #fff; /* Cor do texto alterada para branco */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .product-container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            max-width: 1200px; /* Largura máxima da caixa */
            width: 100%;
            padding: 40px;
            background-color: #222; /* Fundo da caixa */
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }
        .product-image {
            max-width: 50%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .product-info {
            max-width: 50%;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        .product-info h1 {
            font-size: 28px;
            margin-bottom: 10px;
        }
        .product-info p {
            color: #bbb; /* Cor do texto alterada para um tom mais suave */
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
        .action-buttons {
            display: flex;
            gap: 20px;
            margin-top: 20px;
        }
        .action-buttons button {
            padding: 12px 30px;
            font-size: 16px;
            background-color: #0D47A1;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .action-buttons button:hover {
            background-color: #1976D2;
        }
    </style>
</head>
<body>

<div class="product-container">
    <!-- Imagem do Produto -->
    <img class="product-image" src="img/nikeairmax.jpg" alt="Tênis Modelo XYZ">

    <!-- Informações do Produto -->
    <div class="product-info">
        <h1>Tênis Modelo XYZ</h1>
        <p class="price">R$ 399,90</p>
        <p><strong>Descrição:</strong> Este é um tênis confortável e estiloso, perfeito para o dia a dia.</p>

        <!-- Seleção de Tamanho -->
        <div>
            <strong>Tamanhos:</strong>
            <ul class="size-selector">
                <li>Tamanho 36</li>
                <li>Tamanho 37</li>
                <li>Tamanho 38</li>
                <li>Tamanho 39</li>
                <li>Tamanho 40</li>
                <li>Tamanho 41</li>
                <li>Tamanho 42</li>
                <li>Tamanho 43</li>
            </ul>
        </div>

        <!-- Quantidade -->
        <div class="quantity-selector">
            <label for="quantity">Quantidade:</label>
            <input type="number" id="quantity" name="quantity" min="1" max="10" value="1">
        </div>

        <!-- Calcular Frete -->
        <p>Digite o CEP para calcular o frete:</p>
        <input type="text" placeholder="Digite o CEP" style="padding: 8px; border-radius: 5px; border: 1px solid #ddd;">

        <!-- Botões de Ação -->
        <div class="action-buttons">
            <button>Calcular</button>
            <button>Comprar</button>
        </div>
    </div>
</div>

</body>
</html>
