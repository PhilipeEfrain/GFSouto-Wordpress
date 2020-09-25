<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/pt-br:Editando_wp-config.php
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'gfsouto' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'root' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', '' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'localhost' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'PmX [,/91sIW[S-5{1/Ul?V%*s]8{=es!}~wB-0ut}2xgurqJx^c{.,4??e?@&~;' );
define( 'SECURE_AUTH_KEY',  '`}GblNkw/~?2P8;.q$;XK$VQ^`&THUfJo~q9eF*1CwP_$.F7#DYv7[l`%r9dA@Ir' );
define( 'LOGGED_IN_KEY',    'wg%hF%tSEu{SbS[~f@uv5u{66{S{u38@9~<O4u=4H(Ki-H:LW!?DN>!#dX+]D3E7' );
define( 'NONCE_KEY',        'tr+x1<j|1{T:WY1>ywm`3})i3?2@q{^lgu1*tx^3R!-^R*ZRn+tF(%XUEDV;s| ?' );
define( 'AUTH_SALT',        't/p8*jNkXzn>q?]$4 :T?q1a,iFXkN GZ.J3cNeBxHuq<KP:*^?8IS(*tY=]8 qt' );
define( 'SECURE_AUTH_SALT', 'C3NcWkkoc}WP6)U |T,Xij*-JYOWBRD~85~f/h,%,k?6-u]C%*1KeC>Gd.Q</S#=' );
define( 'LOGGED_IN_SALT',   'GaJrRRX,Q86#>l!#cZE>^9%cm)ckw{q+gGrlCY->n,A>t47qMQ]QOmpdtt(L!pgj' );
define( 'NONCE_SALT',       'S<:/06.6+uQ(LV^r&k)mv^3k)(bT{ly=b!4)2y};S**|L4b-:2qe_5;|@pl1L!iR' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'wp_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://codex.wordpress.org/pt-br:Depura%C3%A7%C3%A3o_no_WordPress
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Configura as variáveis e arquivos do WordPress. */
require_once(ABSPATH . 'wp-settings.php');
