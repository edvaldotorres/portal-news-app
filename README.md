## Descrição

O projeto é um Portal de Notícias seguindo padrão MVC, tem uma API onde pode ser facilmente consumida em outros sistemas, sem contar que também tem um RSS que é um formato de distribuição de informações. O sistema conta com perfil de usuário e permissões respectivamente para os devidos perfis.

## Stacks

- Laravel vs 8
- PHP
- Banco de dados MySQL
- Bootstrap

## Desafios

Bom a única parte do desafio encontra-se em deixar o projeto seguindo um padrão, tendo um código legível é fácil de dar manutenção.

## Problemas

Aparentemente não tive problemas com o desenvolvimento da aplicação, pois o framework é bem tranquilo de desenvolver.

## Observação

Possivelmente possível desenvolver novas features para o projeto.

## Rodar a aplicação

1. Clonar o projeto com `https://github.com/edvaldotorres/portal-news-app.git`
2. Crie um banco de dados. Não precisa criar as tabelas pois vamos usar as migration do laravel.
3. Depois entre na pasta do projeto. Renomeie o arquivo .env.example para .env
4. No arquivo .env faça a conexão com o banco criado.
5. Digite o commando `composer install`. Ele vai instalar todos os pacotes php necessários.
6. Digite o commando `php artisan key:generate`. Esse vai gerar uma chave para sua aplicação. Sem isso o Laravel não vai funcionar.
7. Pronto agora é só rodar o comando `php artisan migrate:refresh` para que ele crie a tabela junto com as colunas.
8. Rodar o comando `php artisan db:seed` aqui vamos criar dados padrão para nossas tabelas.
9. Agora só acessar o seu localhost e entrar com E-mail do usuário admin@admin.com e senha 123admin.
10. Em alguns casos seja preciso da algumas permissões para o projeto rodar.

## If you still don't follow, get to know social networks

<p align="center">
<a href="#" target="blank"><img align="center" src="https://cdn.jsdelivr.net/npm/simple-icons@3.0.1/icons/twitter.svg" alt="edvaldotorres" height="20" width="20" /></a>
<a href="https://www.linkedin.com/in/edvaldo-torres-de-souza-189894150/" target="blank"><img align="center" src="https://cdn.jsdelivr.net/npm/simple-icons@3.0.1/icons/linkedin.svg" alt="edvaldotorres" height="20" width="20" /></a>
<a href="https://www.facebook.com/edvaldo.torres.967/" target="blank"><img align="center" src="https://cdn.jsdelivr.net/npm/simple-icons@3.0.1/icons/facebook.svg" alt="edvaldotorres" height="20" width="20" /></a>
<a href="https://www.instagram.com/edvaldotorres_/" target="blank"><img align="center" src="https://cdn.jsdelivr.net/npm/simple-icons@3.0.1/icons/instagram.svg" alt="edvaldotorres" height="20" width="20" /></a>
</p>

⭐️ From [Edvaldo Torres](https://github.com/edvaldotorres)



