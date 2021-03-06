<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Tiles style: JG Standard
 */
class DGWT_JG_TilesStyle_JGStandard extends DGWT_JG_TilesStyle{

	public $slug = 'JGStandard';

	function __construct() {

		parent::__construct();

		$this->init();
	}

	private function init() {

	    if(!DGWT_JG()->detector->isMobile() && !DGWT_JG()->detector->isTablet()) {
		    add_filter( 'dgwt/jg/gallery/tile_caption', array( $this, 'get_caption_html' ), 10, 2 );

		    add_action( 'dgwt/jg/js/gallery/complete', array( $this, 'on_gallery_complete' ) );
	    }

		add_filter('dgwt/jg/settings/tiles_style', array($this, 'add_settings'));

	}

	/**
	 * Add settings for this style
	 *
	 * @param array $settings
	 *
	 * @return array
	 */
	public function add_settings( $settings ) {

		$settings[] = array(
			'name'    => 'description',
			'label'   => __( 'Caption', DGWT_JG_DOMAIN ),
			'type'    => 'radio',
			'options' => array(
				'show' => __( 'Show', DGWT_JG_DOMAIN ),
				'hide' => __( 'Hide', DGWT_JG_DOMAIN ),
			),
			'default' => 'show',
		);

		return $settings;
	}

	/**
	 * Prepare caption html
	 *
	 * @param string $caption
	 * @param object $attachment
	 *
	 * @return null
	 */
	public function get_caption_html( $caption, $attachment ) {

		$label = trim( $attachment->post_excerpt ) ? wp_strip_all_tags( wptexturize( $attachment->post_excerpt ) ) : '';

		if ( empty( $label )) {
			$label = DGWT_JG_Helpers::get_loupe_svg();
		}

		$caption = '';
		$caption .= '<div class="dgwt-jg-caption">';
		$caption .= '<span>' . $label . '</span>';
		$caption .= '</div>';

		return $caption;
	}

	/**
	 * Print JS on gallery complete event
	 * @return null
	 */
	public function on_gallery_complete() {
		ob_start();
		?>
		<script>
            $item.each(function () {
                $(this).on('mouseenter mouseleave', function (e) {
                    var $this = $(this),
                        width = $this.width(),
                        height = $this.height();
                    var x = ( e.pageX - $this.offset().left - ( width / 2 ) ) * ( width > height ? ( height / width ) : 1 ),
                        y = ( e.pageY - $this.offset().top - ( height / 2 ) ) * ( height > width ? ( width / height ) : 1 );
                    // top = 0, right = 1, bottom = 2, left = 3
                    var dir_num = Math.round(( ( ( Math.atan2(y, x) * ( 180 / Math.PI ) ) + 180 ) / 90 ) + 3) % 4,
                        directions = ['top', 'right', 'bottom', 'left'];
                    // If mouse enter
                    if (e.type === 'mouseenter') {
                        // Remove all hover out classes
                        $this.removeClass(function (index, css) {
                            return ( css.match(/(^|\s)hover-out-\S+/g) || [] ).join(' ');
                        });
                        // Add in direction class
                        $this.addClass('hover-in-' + directions[dir_num]);
                    }

                    // If mouse leave
                    if (e.type === 'mouseleave') {
                        // Remove all hover in classes
                        $this.removeClass(function (index, css) {
                            return ( css.match(/(^|\s)hover-in-\S+/g) || [] ).join(' ');
                        });
                        // Add out direction class
                        $this.addClass('hover-out-' + directions[dir_num]);
                    }
                });
            });
		</script>
		<?php
		$js = str_replace( array( '<script>', '</script>' ), '', ob_get_clean() );

		echo $js;
	}

}