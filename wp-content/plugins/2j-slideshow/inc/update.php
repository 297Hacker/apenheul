<?php 
/*  
 * 2J SlideShow		http://2joomla.net/wordpress
 * Version:           1.2.20 - 95609
 * Author:            2J Team (c)
 * Author URI:        http://2joomla.net/wordpress
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Date:              Sat, 08 Oct 2016 06:23:57 GMT
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class TwojSlideshowUpdate {

	public $updateFlag = 1;

	public $nowInstall = false;

	
	public function __construct(){
		
		$this->nowInstall = get_option( 'twojSlideshowVersion' );
		if(!$this->nowInstall) $this->nowInstall = 0;

		if( $this->nowInstall && $this->nowInstall == TWOJ_SLIDESHOW_VERSION )  $this->updateFlag = false;

		if( $this->updateFlag ){
			delete_option("twojs_slideshow_install_action");
			add_option( 'twojs_slideshow_install_action', '1' );

			// delete_option("twojSlideshowVersion");
			// add_option( "twojSlideshowVersion", ROBO_GALLERY_VERSION );
		}
	}

}
