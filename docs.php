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
    </style>
</head>

<body>
    <div class="container">
        <div style="margin: 60px 0;">
            <h1>Endpoints</h1>
        </div>
        <div>
            <div >
                <h3>/Clubes</h3>
                <br>
            </div>

            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <span class="get"> METHOD GET </span> - ENDPOINT - /clubes
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <strong>suaurl/clubes.</strong><br> retorna todos os clubes regitrados.
                            <div>
                                <h6>status: 200</h6>
                                <br>
                                <pre>
                                <code>
                                [
                                        {
                                        "id":"1",
                                        "clube":"Clube A",
                                        "saldo_disponivel":"2000,00"
                                        },
                                        {
                                        "id":"2",
                                        "clube":"Clube B",
                                        "saldo_disponivel":"3000,00"
                                        }
                                ]
                                </code>
                            </pre>
                                <br>
                                <h6>status: 400</h6>
                                <br>
                                <pre>
                                <code>
                                {"status": 400, "mensagem": "nenhum usuario encontrado"}
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
                            <span class="get"> METHOD GET </span> - ENDPOINT - /clubes/{seuid}
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <strong>suaurl/clubes.</strong><br> retorna um unico usuario de acordo com o id.
                            <div>
                                <h6>status: 200</h6>
                                <br>
                                <pre>
                                <code>
                                {
                                        "id":"1",
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
                                {"status": 400, "mensagem": "nenhum usuario encontrado"}
                                </code>
                            </pre>
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Accordion Item #3
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>

</html>