<?php

namespace KentaCompanion\Extensions;

use LottaFramework\Customizer\Controls\ColorPicker;
use LottaFramework\Customizer\Controls\Icons;
use LottaFramework\Customizer\Controls\Repeater;
use LottaFramework\Customizer\Controls\Section;
use LottaFramework\Customizer\Controls\Separator;
use LottaFramework\Customizer\Controls\Text;

class Socials {

	public function __construct() {
		add_filter( 'kenta_global_section_controls', [ $this, 'injectControls' ] );
	}

	/**
	 * @param $controls
	 *
	 * @return mixed
	 */
	public function injectControls( $controls ) {
		$controls[] = ( new Section( 'kenta_global_socials' ) )
			->setLabel( __( 'Socials', 'kenta-companion' ) )
			->setControls( $this->getSocialsControls() );

		return $controls;
	}

	/**
	 * @return array
	 */
	public function getSocialsControls() {
		$repeater = ( new Repeater( 'kenta_social_networks' ) )
			->setLabel( __( 'Social Networks', 'kenta-companion' ) )
			->setTitleField( "<%= settings.label %>" )
			->setDefaultValue( [
				[
					'visible'  => true,
					'settings' => [
						'color' => [ 'official' => '#557dbc' ],
						'label' => 'Facebook',
						'url'   => '',
						'icon'  => [ 'value' => 'fab fa-facebook', 'library' => 'fa-brands' ]
					],
				],
				[
					'visible'  => true,
					'settings' => [
						'color' => [ 'official' => '#7acdee' ],
						'label' => 'Twitter',
						'url'   => '',
						'icon'  => [ 'value' => 'fab fa-twitter', 'library' => 'fa-brands' ]
					],
				],
				[
					'visible'  => true,
					'settings' => [
						'color' => [ 'official' => '#ed1376' ],
						'label' => 'Instagram',
						'url'   => '',
						'icon'  => [ 'value' => 'fab fa-instagram', 'library' => 'fa-brands' ]
					],
				],
			] )
			->setControls( [
				( new Text( 'label' ) )
					->setLabel( __( 'Label', 'kenta-companion' ) )
					->displayInline()
					->setDefaultValue( 'WordPress' )
				,
				( new Text( 'url' ) )
					->setLabel( __( 'URL', 'kenta-companion' ) )
					->displayInline()
					->setDefaultValue( '' )
				,
				( new Separator() ),
				( new ColorPicker( 'color' ) )
					->setLabel( __( 'Official Color', 'kenta-companion' ) )
					->addColor( 'official', __( 'Official', 'kenta-companion' ), 'var(--kenta-primary-active)' )
					->setSwatches( [
						'#557dbc' => 'Facebook',
						'#3d87fb' => 'Facebook Group',
						'#1887FC' => 'Facebook Messenger',
						'#7187d4' => 'Discord',
						'#40dfa3' => 'Tripadvisor',
						'#f84a7a' => 'Foursquare',
						'#ca252a' => 'Yelp',
						'#7acdee' => 'Twitter',
						'#ed1376' => 'Instagram',
						'#ea575a' => 'Pinterest',
						'#d77ea6' => 'Dribbble',
						'#00e59b' => 'Deviantart',
						'#1b64f6' => 'Behance',
						'#000000' => 'Unsplash',
						'#1c86c6' => 'Linkedin',
						'#bc2131' => 'Parler',
						'#368ad2' => 'Mastodon',
						'#292929' => 'Medium',
						'#4e1850' => 'Slack',
						'#000001' => 'Codepen',
						'#fc471e' => 'Reddit',
						'#9150fb' => 'Twitch',
						'#000002' => 'Tiktok',
						'#f9d821' => 'Snapchat',
						'#2ab859' => 'Spotify',
						'#fd561f' => 'Soundcloud',
						'#933ac3' => 'Apple Podcast',
						'#e65c4b' => 'Patreon',
						'#4a396f' => 'Alignable',
						'#5382b6' => 'Vk',
						'#e96651' => 'Youtube',
						'#233253' => 'Dtube',
						'#8ecfde' => 'Vimeo',
						'#f09124' => 'Rss',
						'#5bba67' => 'Whatsapp',
						'#7f509e' => 'Viber',
						'#229cce' => 'Telegram',
						'#20be60' => 'Line',
						'#0a5c5d' => 'Xing',
						'#e41c34' => 'Weibo',
						'#314255' => 'Tumblr',
						'#487fc8' => 'Qq',
						'#2dc121' => 'Wechat',
						'#2dc122' => 'Strava',
						'#0f64d1' => 'Flickr',
						'#244371' => 'Phone',
						'#392c44' => 'Email',
						'#24292e' => 'Github',
						'#f8713f' => 'Gitlab',
						'#1caae7' => 'Skype',
						'#1074a8' => 'Wordpress',
						'#fd6721' => 'Hacker News',
						'#eb7e2f' => 'Ok',
						'#c40812' => 'Flipboard',
					] )
				,
				( new Icons( 'icon' ) )
					->setLabel( __( 'Icon', 'kenta-companion' ) )
					->setLibraries( [ 'fa-brands' ] )
					->setDefaultValue( [
						'value'   => 'fab fa-wordpress',
						'library' => 'fa-brands',
					] )
				,
			] );

		if ( kenta_fs()->is_not_paying() ) {
			$repeater->setLimit( 4, kenta_upsell_info( __( 'Add more social networks in %sPro Version%s', 'kenta-companion' ) ) );
		}

		return [ $repeater ];
	}
}