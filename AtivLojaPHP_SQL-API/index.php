<?php
require_once 'conexao.php';

try {
    $sql = "SELECT nome, preco, foto, id FROM produto";
    $stmt = $conexao->prepare($sql);
    $stmt->execute();

    $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/pricing/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <title>always shop</title>

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            width: 100%;
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        .btn-bd-primary {
            --bd-violet-bg: #712cf9;
            --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

            --bs-btn-font-weight: 600;
            --bs-btn-color: var(--bs-white);
            --bs-btn-bg: var(--bd-violet-bg);
            --bs-btn-border-color: var(--bd-violet-bg);
            --bs-btn-hover-color: var(--bs-white);
            --bs-btn-hover-bg: #6528e0;
            --bs-btn-hover-border-color: #6528e0;
            --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
            --bs-btn-active-color: var(--bs-btn-hover-color);
            --bs-btn-active-bg: #5a23c8;
            --bs-btn-active-border-color: #5a23c8;
        }

        .bd-mode-toggle {
            z-index: 1500;
        }

        .bd-mode-toggle .dropdown-menu .active .bi {
            display: block !important;
        }
    </style>
    <link href="css/pricing.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">
        <header>
            <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
                <a href="/" class="d-flex align-items-center link-body-emphasis text-decoration-none">
                    <img src="image/logo.png" width="40" height="32" class="me-2" viewBox="0 0 118 94" role="img">
                    <span class="fs-4">always shop</span>
                </a>

                <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
                    <a class="me-3 py-2 link-body-emphasis text-decoration-none" href="dashboard.php">Cadastrar Produtos</a>
                </nav>
            </div>
            <img src="image/banner.png" width="950" class="banner-always"><br><br>
        </header>
        <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
    <?php        
    foreach ($produtos as $produto) {
        echo '<div class="col">';
        echo '<div class="card mb-4 rounded-3 shadow-sm">';
        echo '<div class="card-body">';
        echo '<img width="200" src="' . $produto['foto'] . '" alt="' . $produto['nome'] . '">';
        echo '<ul class="list-unstyled mt-3 mb-4">';
        echo '<li><h3>'. $produto['nome'] .'</h3></li>';
        echo '<li><p>Preço: R$ ' . number_format($produto['preco'], 2, ',', '.') .'</p></li>';
        echo '</ul>';
        echo '<a href="pagamento.php?id=' . $produto['id'] . '" class="w-100 btn btn-lg btn-outline-primary">Comprar</a>';
        echo '</div></div></div>';
    }
} catch (PDOException $e) {
    echo "Erro ao recuperar produtos: " . $e->getMessage();
}
?>

</body>

</html>