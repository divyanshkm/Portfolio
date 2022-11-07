<?php

/**
 * Helper functions for our plugin
 *
 * @package Kenta Blocks
 */
if ( !function_exists( 'kenta_blocks_css' ) ) {
    /**
     * Get css utils instance
     *
     * @return \KentaBlocks\Css
     */
    function kenta_blocks_css()
    {
        return \KentaBlocks\Css::get_instance();
    }

}
if ( !function_exists( 'kenta_blocks_setting' ) ) {
    /**
     * Get settings instance or setting value
     */
    function kenta_blocks_setting( $key = null )
    {
        $instance = \KentaBlocks\Settings::get_instance();
        if ( $key !== null ) {
            return $instance->get( $key );
        }
        return $instance;
    }

}
if ( !function_exists( 'kenta_blocks_parse_content' ) ) {
    /**
     * Parse blocks from content
     *
     * @param $content
     *
     * @return array[]
     */
    function kenta_blocks_parse_content( $content )
    {
        global  $wp_version ;
        return ( version_compare( $wp_version, '5', '>=' ) ? parse_blocks( $content ) : gutenberg_parse_blocks( $content ) );
    }

}
if ( !function_exists( 'kenta_blocks_all' ) ) {
    /**
     * Get all blocks
     *
     * @param null $key
     *
     * @return array|mixed
     */
    function kenta_blocks_all( $key = null )
    {
        $blocks = (require KENTA_BLOCKS_PLUGIN_PATH . 'inc/blocks.php');
        if ( $key ) {
            $blocks = array_map( function ( $item ) use( $key ) {
                return $item[$key];
            }, $blocks );
        }
        return $blocks;
    }

}
if ( !function_exists( 'kenta_blocks_template_part' ) ) {
    /**
     * Include template
     *
     * @param $slug
     */
    function kenta_blocks_template_part( $slug )
    {
        $path = KENTA_BLOCKS_PLUGIN_PATH . 'templates/' . $slug . '.php';
        if ( file_exists( $path ) ) {
            require $path;
        }
    }

}
if ( !function_exists( 'kenta_blocks_sanitize_rgba_color' ) ) {
    /**
     * RGBA color sanitization callback example.
     *
     * @param $color
     *
     * @return string|void
     */
    function kenta_blocks_sanitize_rgba_color( $color )
    {
        // css var
        if ( false !== strpos( $color, 'var' ) ) {
            return $color;
        }
        if ( empty($color) || is_array( $color ) ) {
            return 'rgba(0,0,0,0)';
        }
        // If string does not start with 'rgba', then treat as hex
        // sanitize the hex color and finally convert hex to rgba
        if ( false === strpos( $color, 'rgba' ) ) {
            return sanitize_hex_color( $color );
        }
        // By now we know the string is formatted as an rgba color so we need to further sanitize it.
        $color = str_replace( ' ', '', $color );
        sscanf(
            $color,
            'rgba(%d,%d,%d,%f)',
            $red,
            $green,
            $blue,
            $alpha
        );
        return 'rgba(' . $red . ',' . $green . ',' . $blue . ',' . $alpha . ')';
    }

}
if ( !function_exists( 'kenta_blocks_sanitize_rgba_color_collect' ) ) {
    /**
     * A collect of RGBA color sanitization callback example.
     *
     * @param $colors
     *
     * @return mixed
     */
    function kenta_blocks_sanitize_rgba_color_collect( $colors )
    {
        if ( !is_array( $colors ) ) {
            return [];
        }
        foreach ( $colors as $key => $value ) {
            $colors[$key] = kenta_blocks_sanitize_rgba_color( $value );
        }
        return $colors;
    }

}
if ( !function_exists( 'kenta_blocks_sanitize_checkbox' ) ) {
    /**
     * Checkbox sanitization callback example.
     *
     * Sanitization callback for 'checkbox' type controls. This callback sanitizes `$checked`
     * as a boolean value, either TRUE or FALSE.
     *
     * @param mixed $checked Whether the checkbox is checked.
     *
     * @return string Whether the checkbox is checked.
     */
    function kenta_blocks_sanitize_checkbox( $checked )
    {
        // Boolean check.
        return ( $checked === 'yes' ? $checked : 'no' );
    }

}
if ( !function_exists( 'kenta_blocks_current_template' ) ) {
    /**
     * Get current template name
     *
     * @return string
     */
    function kenta_blocks_current_template()
    {
        return strtolower( str_replace( '-premium', '', get_option( 'template' ) ) );
    }

}
if ( !function_exists( 'kenta_blocks_get_shapes' ) ) {
    /**
     * Get all shapes
     *
     * @param null $id
     *
     * @return array|array[]|mixed|null
     */
    function kenta_blocks_get_shapes( $id = null )
    {
        $shapes = array(
            'none'     => array(
            'title'   => _x( 'None', 'Shapes', 'kenta-blocks' ),
            'options' => array(),
        ),
            'tilt'     => array(
            'title'   => _x( 'Tilt', 'Shapes', 'kenta-blocks' ),
            'options' => array( 'shape_flip' ),
        ),
            'clouds'   => array(
            'title'   => _x( 'Clouds (Pro)', 'Shapes', 'kenta-blocks' ),
            'options' => array( 'shape_flip', 'shape_invert' ),
        ),
            'triangle' => array(
            'title'   => _x( 'Triangle (Pro)', 'Shapes', 'kenta-blocks' ),
            'options' => array( 'shape_invert' ),
        ),
        );
        foreach ( $shapes as $shape => $shape_data ) {
            $folder = 'assets/images/shapes/';
            $files = array();
            $filepath = KENTA_BLOCKS_PLUGIN_PATH . ($folder . $shape . '.svg');
            if ( is_file( $filepath ) && is_readable( $filepath ) ) {
                $files['svg'] = file_get_contents( $filepath );
            }
            
            if ( in_array( 'shape_invert', $shape_data['options'] ) ) {
                $negative_filepath = KENTA_BLOCKS_PLUGIN_PATH . ($folder . $shape . '-negative' . '.svg');
                if ( is_file( $negative_filepath ) && is_readable( $negative_filepath ) ) {
                    $files['negative'] = file_get_contents( $negative_filepath );
                }
            }
            
            $shapes[$shape]['files'] = $files;
        }
        if ( $id !== null ) {
            return $shapes[$id] ?? null;
        }
        return $shapes;
    }

}
if ( !function_exists( 'kenta_blocks_shape_css' ) ) {
    /**
     * Generate shape divider css
     *
     * @param $selector
     * @param $attrs
     * @param $metadata
     *
     * @return array|array[]
     */
    function kenta_blocks_shape_css( $selector, $attrs, $metadata )
    {
        $value = kenta_blocks_block_attr( 'shape', $attrs, $metadata );
        $zIndex = kenta_blocks_block_attr( 'shapeZIndex', $attrs, $metadata );
        $flip = kenta_blocks_block_attr( 'flipShape', $attrs, $metadata );
        $width = kenta_blocks_block_attr( 'shapeWidth', $attrs, $metadata );
        $height = kenta_blocks_block_attr( 'shapeHeight', $attrs, $metadata );
        $color = kenta_blocks_block_attr( 'shapeColor', $attrs, $metadata );
        $shapeData = kenta_blocks_get_shapes( $value );
        if ( !$shapeData || empty($shapeData['files']) ) {
            return array(
                $selector => array(
                'display' => 'none',
            ),
            );
        }
        $flip = $flip === 'yes' && in_array( 'shape_flip', $shapeData['options'] );
        return array(
            $selector         => array(
            'z-index'         => $zIndex,
            '--kb-shape-fill' => $color,
        ),
            "{$selector} svg" => array(
            'width'     => $width,
            'height'    => $height,
            'transform' => ( $flip ? 'translateX(-50%) rotateY(180deg)' : 'translateX(-50%)' ),
        ),
        );
    }

}