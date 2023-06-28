<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documentação Basica da api</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <style>
        .get {
            color: green;
        }

        pre {
            background-color: black;
            color: white;
        }

        .post {
            color: brown;
        }
    </style>
</head>

<body>
    <div class="container">
        <div style="margin: 60px 0;">
            <h1>Endpoints</h1>
        </div>
        <div>
            <div>
                <h2>Clube</h2>
                <h4>URL: {SEULOCAL}/GERENCIAR_RECURSOS_CBC_API/public_html/api/</h4>
                <h3>ENDPOINT: /clube</h3>
                <br>
            </div>

            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <span class="get"> METHOD GET </span> - ENDPOINT - {SEULOCAL}/GERENCIAR_RECURSOS_CBC_API/public_html/api/clube
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <strong></strong><br> retorna todos os clube regitrados.
                            <div>
                                <h6>status: 200</h6>
                                <br>
                                <pre>
                                <code>
[
    {
    "id":"1",
    "clube":"Clube 2",
    "saldo_disponivel":"500.00"
    }
]
                                </code>
                            </pre>
                                <br>
                                <h6>status: 404</h6>
                                <br>
                                <pre>
                                <code>
                                {"status": 404, "mensagem": "nenhum clube encontrado"}
                                </code>
                            </pre>
                                <br>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <span class="get"> METHOD GET </span> - ENDPOINT - {SEULOCAL}/GERENCIAR_RECURSOS_CBC_API/public_html/api/clube/{seuid}
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <strong></strong><br> retorna um unico clube de acordo com o id.
                            <div>
                                <h6>status: 200</h6>
                                <br>
                                <pre>
                                <code>
{
    "id":"2",
    "clube":"Clube A",
    "saldo_disponivel":"2000,00"
}
                                </code>
                            </pre>
                                <br>
                                <h6>status: 400</h6>
                                <br>
                                <pre>
                                <code>
                                {"status": 400, "mensagem": "nenhum clube encontrado"}
                                </code>
                            </pre>
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <span class="POST"> METHOD POST </span> - ENDPOINT - {SEULOCAL}/GERENCIAR_RECURSOS_CBC_API/public_html/api/clube

                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong>clube.</strong><br> Recebe um json.
                                <h6>Formato esperado:</h6>
                                <pre>
                                <code>
                                
{

"clube":"clube 2",
"saldo_disponivel":"500.00"

}
                                
                                </code>
                            </pre>
                                <div>
                                    <h6>RESPOSTA status: 200</h6>
                                    <br>
                                    <pre>
                                <code>
                                
    {
        "status": 200,
        "mensagem": "Sucesso"
    }
                                    
                                </code>
                            </pre>
                                    <br>
                                    <h6>status: 400</h6>
                                    <br>
                                    <pre>
                                <code>
                                {"status": 400, "mensagem": "Erro ao inserir clube"}
                                </code>
                            </pre>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div>
                <div style="margin-top: 150px;">
                    <h2>Recurso</h2>
                    <h4>URL: {SEULOCAL}/GERENCIAR_RECURSOS_CBC_API/public_html/api/</h4>
                    <h3>ENDPOINT: /recurso</h3>
                    <br>
                </div>
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                <span class="post"> METHOD POST </span> - ENDPOINT - {SEULOCAL}/GERENCIAR_RECURSOS_CBC_API/public_html/api/recurso
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong></strong><br> Consome os recursos de acordo.
                                <strong>clube.</strong><br> Recebe um json.
                                <h6>Formato esperado:</h6>
                                <pre>
                                <code>
                                
{
    "clube_id":"1",
    "recurso_id":"1",
    "valor_consumo":"500,00"
}
                                
                                </code>
                            </pre>
                                <div>
                                    <h6>status: 200</h6>
                                    <br>
                                    <pre>
                                <code>
{
    "clube": "CLUBE A",
    "saldo_anterior": "1222.00",
    "saldo_atual": "821.36"
}
                                </code>
                            </pre>
                                    <br>
                                    <h6>status: 404</h6>
                                    <br>
                                    <pre>
                                <code>
{
    "status": 400,
    "error": "O saldo disponível do clube é insuficiente."
}
                                </code>
                            </pre>
                                    <br>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>

</html>