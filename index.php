<?php
// Essa pagina verifica onde o usuario quer ir atraves da URL.

// chama o arquivo core
require_once 'app/core/Core.php';
require_once 'app/controller/LoginController.php';
require_once 'app/controller/CadastrarController.php';
$core = new Core;
$core->start($_GET); // passa o GET como parametro da função start.