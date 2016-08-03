<?php

namespace Win\Request;

/**
 * Auxilia a pegar variáveis globais ($_REQUEST, $_POST, $_GET, etc)
 * 
 * Esta classe fornece uma camada de segurança maior do que manipular as variaveis globais diretamente.
 */
class Input {

	/**
	 * Retorna variavel $_POST
	 *
	 * @param string $name
	 * @param int $filter
	 * @param string $default
	 */
	public static function post($name, $filter = FILTER_DEFAULT, $default = '') {
		$post = filter_input(INPUT_POST, $name, $filter);
		return ($post) ? $post : $default;
	}

	/**
	 * Retorna variavel $_SERVER
	 * 
	 * @param string $name
	 * @param int $filter
	 * @return string
	 */
	public static function server($name, $filter = FILTER_DEFAULT) {
		return filter_var($_SERVER[$name], $filter);
	}

	/**
	 * Retorna variavel $_GET
	 */
	public static function get() {

	}

	/**
	 * Retorna variavel $_FILE
	 */
	public static function file() {

	}

	/**
	 * Retorna variavel $_PUT
	 */
	public static function put() {

	}

	/**
	 * Retorna variavel $_DELETE
	 */
	public static function delete() {

	}

	/**
	 * Retorna variavel $_COOKIE
	 */
	public static function cookie() {
		
	}

	/**
	 * Retorna o protocolo atual
	 * @return string http|https
	 */
	public static function protocol() {
		$https = Input::server('HTTPS');
		$port = Input::server('SERVER_PORT');
		if (!empty($https) && $https !== 'off' || $port == 443):
			return 'https';
		endif;
		return 'http';
	}

}
