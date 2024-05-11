<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cafeteira IOT</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    <!-- HEADER: MENU + HEROE SECTION -->
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <h1>
                    <a class="navbar-brand" href="<?= base_url(); ?>">Cafeteria IOT</a>
                </h1>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a 
                                class="nav-link active" 
                                aria-current="page" 
                                href="<?= base_url("/logout"); ?>"
                            >
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- CONTENT -->

    <section style="height: 80vh;" class="d-flex align-items-center">
        <div class="container-fluid">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="text-center">
                                Cafeteira v1.0.0
                            </h1>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-center">Cafézin 🤤</h5>
                            <p class="card-text" id="text-cafeteira">
                                Clique em "Fazer Café" para ligar a cafeteira. Quando estiver pronto desligue a cafeteira clicando no botão vermelho.
                            </p>
                            <div class="d-flex justify-content-center">
                                <button class="btn btn-success m-1" onclick="handleRequest('ligar')">
                                    Fazer Café
                                </button>
                                <button class="btn btn-danger m-1" onclick="handleRequest('desligar')">
                                    Chega de Café
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script type="text/javascript">
        async function handleRequest(endpoint) {
            console.log("teste");
            try {
                let url = endpoint;

                const response = await fetch(url, {
                    method: "GET",
                    headers: {
                        "Content-Type": "application/json",
                        "X-Requested-With": "XMLHttpRequest"
                    }
                });

                const responseData = await response.json();

                if (responseData.success) {
                    let msg = responseData.msg;
                    let paragraph = document.getElementById("text-cafeteira");

                    paragraph.innerText = msg;
                    paragraph.style.textAlign = "center";
                } else {
                    console.log("Erro");
                    console.log(response);
                }
            } catch (error) {
                console.log("aaaa: " + error);
            }
        }
    </script>
</body>
</html>
