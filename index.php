<?php
session_start();
// Essa pagina verifica onde o usuario quer ir atraves da URL.

// chama o arquivo core
require_once 'app/core/Core.php';
require_once 'app/model/Conexao.php';
require_once 'app/controller/LoginController.php';
require_once 'app/controller/CadastrarController.php';
require_once 'app/controller/AdminController.php';
require_once 'app/model/user.php';
$core = new Core;
$core->start($_GET); // passa o GET como parametro da função start.