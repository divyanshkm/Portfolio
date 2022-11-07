<?php

namespace KentaCompanion\Extensions;

use  LottaFramework\Customizer\Controls\BoxShadow ;
use  LottaFramework\Customizer\Controls\ColorPicker ;
use  LottaFramework\Customizer\Controls\Icons ;
use  LottaFramework\Customizer\Controls\Placeholder ;
use  LottaFramework\Customizer\Controls\Radio ;
use  LottaFramework\Customizer\Controls\Section ;
use  LottaFramework\Customizer\Controls\Separator ;
use  LottaFramework\Customizer\Controls\Slider ;
use  LottaFramework\Customizer\Controls\Spacing ;
use  LottaFramework\Customizer\Controls\Tabs ;
use  LottaFramework\Facades\Css ;
use  LottaFramework\Facades\CZ ;
use  LottaFramework\Icons\IconsManager ;
use  LottaFramework\Utils ;
/**
 * Class for scroll to top extension
 *
 * @package Kenta Companion
 */
class ScrollTop
{
    public function __construct()
    {
        // inject scroll top customize controls
        add_filter( 'kenta_global_section_controls', [ $this, 'injectControls' ] );
        // render hook
        add_filter( 'kenta_action_after_footer', [ $this, 'render' ], 99 );
        // add css
        add_filter( 'kenta_filter_dynamic_css', [ $this, 'css' ] );
    }
    
    /**
     * @param array $controls
     *
     * @return array
     */
    public function injectControls( $controls )
    {
        $controls[] = ( new Section( 'kenta_global_scroll_top' ) )->setLabel( __( 'Scroll Top', 'kenta-companion' ) )->enableSwitch()->setControls( $this->getScrollToTopControls() );
        return $controls;
    }
    
    /**
     * Show scroll to top button
     *
     * @return void
     */
    public function render()
    {
        if ( !CZ::checked( 'kenta_global_scroll_top' ) ) {
            return;
        }
        $css = [ 'kenta-to-top', 'kenta-to-top-' . CZ::get( 'kenta_to_top_position' ) ];
        $attrs = [
            'href'  => '#',
            'id'    => 'scroll-top',
            'class' => Utils::clsx( $css ),
        ];
        echo  '<a ' . Utils::render_attribute_string( $attrs ) . '>' ;
        
        if ( is_customize_preview() ) {
            echo  '<div data-shortcut="arrow" data-shortcut-location="kenta_global:kenta_global_scroll_top">' ;
            echo  '</div>' ;
        }
        
        IconsManager::print( CZ::get( 'kenta_to_top_icon' ) );
        echo  '</a>' ;
    }
    
    /**
     * Add dynamic css for scroll to top button
     *
     * @param $css
     *
     * @return mixed
     */
    public function css( $css )
    {
        if ( !CZ::checked( 'kenta_global_scroll_top' ) ) {
            return $css;
        }
        $css['.kenta-to-top'] = array_merge(
            Css::shadow( CZ::get( 'kenta_to_top_shadow' ) ),
            Css::dimensions( CZ::get( 'kenta_to_top_radius' ), 'border-radius' ),
            Css::colors( CZ::get( 'kenta_to_top_icon_color' ), [
            'initial' => '--kenta-to-top-icon-initial',
            'hover'   => '--kenta-to-top-icon-hover',
        ] ),
            Css::colors( CZ::get( 'kenta_to_top_background' ), [
            'initial' => '--kenta-to-top-background-initial',
            'hover'   => '--kenta-to-top-background-hover',
        ] ),
            [
            '--kenta-to-top-icon-size'     => CZ::get( 'kenta_to_top_icon_size' ),
            '--kenta-to-top-bottom-offset' => CZ::get( 'kenta_to_top_bottom_offset' ),
            '--kenta-to-top-side-offset'   => CZ::get( 'kenta_to_top_side_offset' ),
        ]
        );
        return $css;
    }
    
    protected function getScrollToTopControls()
    {
        return [ ( new Tabs() )->setActiveTab( 'content' )->addTab( 'content', __( 'Content', 'kenta-companion' ), [
            ( new Icons( 'kenta_to_top_icon' ) )->setLabel( __( 'Icon', 'kenta-companion' ) )->selectiveRefresh( '.kenta-to-top', [ $this, 'render' ], [
            'container_inclusive' => true,
        ] )->setDefaultValue( [
            'value'   => 'fas fa-angle-up',
            'library' => 'fa-solid',
        ] ),
            new Separator(),
            ( new Slider( 'kenta_to_top_icon_size' ) )->setLabel( __( 'Icon Size', 'kenta-companion' ) )->bindSelectiveRefresh( 'kenta-global-selective-css' )->enableResponsive()->setMin( 10 )->setMax( 50 )->setDefaultUnit( 'px' )->setDefaultValue( '14px' ),
            new Separator(),
            ( new Slider( 'kenta_to_top_bottom_offset' ) )->setLabel( __( 'Bottom Offset', 'kenta-companion' ) )->bindSelectiveRefresh( 'kenta-global-selective-css' )->enableResponsive()->setMin( 5 )->setMax( 300 )->setDefaultUnit( 'px' )->setDefaultValue( '48px' ),
            ( new Slider( 'kenta_to_top_side_offset' ) )->setLabel( __( 'Side Offset', 'kenta-companion' ) )->bindSelectiveRefresh( 'kenta-global-selective-css' )->enableResponsive()->setMin( 5 )->setMax( 300 )->setDefaultUnit( 'px' )->setDefaultValue( '48px' ),
            new Separator(),
            ( new Radio( 'kenta_to_top_position' ) )->setLabel( __( 'Position', 'kenta-companion' ) )->selectiveRefresh( '.kenta-to-top', [ $this, 'render' ], [
            'container_inclusive' => true,
        ] )->setDefaultValue( 'right' )->buttonsGroupView()->setChoices( [
            'left'  => __( 'Left', 'kenta-companion' ),
            'right' => __( 'Right', 'kenta-companion' ),
        ] )
        ] )->addTab( 'style', __( 'Style', 'kenta-companion' ), $this->getScrollToTopStyleControls() ) ];
    }
    
    /**
     * Scroll to top button style
     *
     * @return array
     */
    protected function getScrollToTopStyleControls()
    {
        return [
            ( new Placeholder( 'kenta_to_top_icon_color' ) )->addColor( 'initial', 'var(--kenta-base-color)' )->addColor( 'hover', 'var(--kenta-base-color)' ),
            ( new Placeholder( 'kenta_to_top_background' ) )->addColor( 'initial', 'var(--kenta-accent-active)' )->addColor( 'hover', 'var(--kenta-primary-color)' ),
            ( new Placeholder( 'kenta_to_top_padding' ) )->setDefaultValue( [
            'top'    => '16px',
            'bottom' => '16px',
            'left'   => '16px',
            'right'  => '16px',
            'linked' => true,
        ] ),
            ( new Placeholder( 'kenta_to_top_radius' ) )->setDefaultValue( [
            'top'    => '999px',
            'bottom' => '999px',
            'left'   => '999px',
            'right'  => '999px',
            'linked' => true,
        ] ),
            ( new Placeholder( 'kenta_to_top_shadow' ) )->setDefaultShadow(
            'rgba(44, 62, 80, 0.15)',
            '0px',
            '10px',
            '20px',
            '0px',
            true
        ),
            kcmp_upsell_info_control( __( 'Fully customize to top button in %sPro Version%s', 'kenta-companion' ) )
        ];
    }

}