# Gerenciar Recursos - API

## Acessando a API

Você pode acessar a API através da seguinte URL: [Link para API](http://gerenciar-recursos-cb-capi-18d9d6e277a4.herokuapp.com/public_html/api/)

## Documentação

A documentação da API se encontra no arquivo `docs.php` ou pode ser acessada pela seguinte URL: [Link para Documentação](http://gerenciar-recursos-cb-capi-18d9d6e277a4.herokuapp.com/docs.php)

## Configuração Local

Se você estiver testando localmente, certifique-se de que o servidor Apache está configurado para permitir o uso de arquivos `.htaccess`. Isso é controlado pela diretiva `AllowOverride` no arquivo de configuração do Apache (`httpd.conf`), que precisa ser definido como `All` ou `FileInfo` para permitir o uso do `mod_rewrite` em um arquivo `.htaccess`.

## Requisitos

- PHP versão 8.0.25 ou superior
- Servidor MySQL versão 8.0.26 ou superior

## Configuração do Banco de Dados

As configurações do banco de dados podem ser alteradas no arquivo `config.php`.

## Instalação

Certifique-se de ter o `composer` instalado em seu sistema.

Dentro do diretório do projeto, execute o seguinte comando:

```bash
composer update
```

Depois do comando acima, o projeto estará pronto para rodar no servidor de sua preferência, desde que ele atenda aos requisitos mencionados acima.

## Endpoints da API

Os endpoints da API podem ser acessados na URL public_html/api/{endpointAqui}.
[/clube]
[/recurso]

ocumentação](http://gerenciar-recursos-cb-capi-18d9d6e277a4.herokuapp.com/docs.php)

# Lembrete

Ao acessar os endpoints, substitua {endpointAqui} pelo endpoint desejado.

# Documentação

[Link para Documentação](http://gerenciar-recursos-cb-capi-18d9d6e277a4.herokuapp.com/docs.php)
