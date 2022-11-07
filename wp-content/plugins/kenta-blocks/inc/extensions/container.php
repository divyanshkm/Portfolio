<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'kenta_blocks_container_global_style' ) ) {
	/**
	 * Global style for container
	 *
	 * @param array $defaults
	 *
	 * @return array[]
	 */
	function kenta_blocks_container_global_style( $defaults = array() ) {
		$defaults = wp_parse_args( $defaults, array(
			'color'      => array(
				'initial' => \KentaBlocks\Css::INITIAL_VALUE,
			),
			'typography' => array(
				'family'     => \KentaBlocks\Css::INITIAL_VALUE,
				'fontSize'   => \KentaBlocks\Css::INITIAL_VALUE,
				'variant'    => \KentaBlocks\Css::INITIAL_VALUE,
				'lineHeight' => \KentaBlocks\Css::INITIAL_VALUE,
			)
		) );

		return array(
			// global style
			'globalColor'      => array(
				'type'    => 'object',
				'default' => $defaults['color']
			),
			'globalTypography' => array(
				'type'    => 'object',
				'default' => $defaults['typography']
			)
		);
	}
}

if ( ! function_exists( 'kenta_blocks_container_global_css' ) ) {
	/**
	 * Global css for container
	 *
	 * @param $attrs
	 * @param $metadata
	 *
	 * @return array
	 */
	function kenta_blocks_container_global_css( $attrs, $metadata ) {
		return array_merge(
			kenta_blocks_css()->typography( kenta_blocks_block_attr( 'globalTypography', $attrs, $metadata ) ),
			kenta_blocks_css()->colors( kenta_blocks_block_attr( 'globalColor', $attrs, $metadata ), array(
				'initial' => [
					'color',
					'--kenta-headings-color',
					'--kenta-headings-h1-color',
					'--kenta-headings-h2-color',
					'--kenta-headings-h3-color',
					'--kenta-headings-h4-color',
					'--kenta-headings-h5-color',
					'--kenta-headings-h6-color',
				],
			) )
		);
	}
}
