<?php
/**
 * Api route
 *
 * @package Kenta Blocks
 */

namespace KentaBlocks;

use KentaBlocks\API\Router;

class Route {

	/**
	 * Register api v1
	 */
	public static function api_v1() {
		$router = new Router( 'kenta-blocks/v1' );
		$router->use( array( Route::class, 'auth' ) );

		$router->read( '/settings', array( Route::class, 'fetch' ) );
		$router->create( '/settings', array( Route::class, 'save' ) );

		$router->register();
	}

	/**
	 * API Auth
	 *
	 * @param $request
	 * @param $next
	 *
	 * @return mixed|\WP_Error|\WP_HTTP_Response|\WP_REST_Response
	 */
	public static function auth( $request, $next ) {

		if ( ! current_user_can( 'manage_options' ) ) {
			return rest_ensure_response( new \WP_Error( 403, __( 'Forbidden', 'kenta-blocks' ) ) );
		}

		return $next( $request );
	}

	/**
	 * Fetch all settings
	 */
	public static function fetch() {
		return rest_ensure_response( array(
			'template' => kenta_blocks_current_template(),
			'settings' => kenta_blocks_setting()->values()
		) );
	}

	/**
	 * Save all settings
	 */
	public static function save( $request ) {
		$settings = $request->get_param( 'settings' );
		foreach ( $settings as $id => $value ) {
			kenta_blocks_setting()->save( $id, $value );
		}

		return rest_ensure_response( $settings );
	}
}