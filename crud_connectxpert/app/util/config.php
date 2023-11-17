<?php
#Nome do arquivo: config.php
#Objetivo: define constantes para serem utilizadas no projeto

//Banco de dados: conexão MySQL
define('DB_HOST', 'localhost');
define('DB_NAME', 'connectxpert');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

//Caminho para adionar imagens, scripts e chamar páginas no sistema
//Deve ter o nome da pasta do projeto no servidor APACHE
define('BASEURL', '/ConnectXpert/crud_connectxpert/app');

//Nome do sistema
define('APP_NAME', 'Connect Xpert');

//Página inicial do sistema
define('HOME_PAGE', BASEURL . '/controller/HomeController.php?action=home');

//Página inicial do sistema do visitante
define('HOME_VISITANTE', BASEURL . '/controller/HomeVisitanteController.php?action=home');

//Página de logout do sistema
define('LOGIN_PAGE', BASEURL . '/controller/LoginController.php?action=login');

//Página de login do sistema
define('LOGOUT_PAGE', BASEURL . '/controller/LoginController.php?action=logout');

//Sessão do usuário
define('SESSAO_administrador_ID', "administradorLogadoId");
define('SESSAO_administrador_NOME', "administradorLogadoNome");
define('SESSAO_administrador_PAPEL', "administradorLogadoPapel");

//Diretório para fotos
define('PATH_FOTOS', __DIR__ . '/../../public/fotos');

define('BASEURL_FOTOS', BASEURL. '/../public/fotos/');






