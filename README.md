# Projeto_login
Criação de um sistema de login com MVC e URL amigável

## Sobre
Estou colocando em prática nesse projeto o que estou aprendendo sobre sistema MVC e URL amigável utilizando a linguagem PHP

## Foi utilizado neste projeto
- Bootstrap 4
- PHP 7
- Mysql

### Comentario:
- Na tela de login e feita a verificação do preenchimento dos campos, que são todos obrigatórios. Ainda existe um link direto para a página de cadastro. Uma vez o usuario logado ele não poderá mais acessar a página de login sendo assim redirecionado a página de usuario "Admin".

- Na página de cadastro também é feita a verificação dos campos obrigatórios. Após o usuario se cadastrar ele é direcionado a página de login.

- A página do usuario "Admin" não pode ser acessada sem ter um usuario logado. Quando um usuario não logado tenta acessar pela a URL ele é redirecionado para a página de login. O usuario logado é recebido com uma tela de boas vindas com seu nome e um botão para SAIR, que por sua vez destruindo a sessão e o redireciona para a página de login.

