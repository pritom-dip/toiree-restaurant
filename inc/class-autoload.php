 <?php
if ( ! class_exists( 'TRT_Autoload' ) ) {
	class TRT_Autoload {

//		protected static $_instance = null;
////
////		static function instance() {
////			if ( ! self::$_instance ) {
////				self::$_instance = new self();
////			}
////			return self::$_instance;
////		}

		public function __construct() {
			$this->init();
	    }

		public function init() {
			  do_action( 'before_trt_init' );
			  spl_autoload_register( array( $this, 'autoload' ) );
			  do_action( 'after_trt_init' );
	    }


       public function autoload( $class ) {
		  $class = strtolower( $class );
		  $file_name = 'class-' . str_replace( '_', '-', $class ) . '.php';
		  /**
		   * Inc
		   */
		  $path = THIM_CORE_INC_PATH . DIRECTORY_SEPARATOR . $file_name;
		  if ( is_readable( $path ) ) {
			return $this->_require( $path );
		  }
		  /**
		   * Admin
		   */
		  $path = THIM_CORE_ADMIN_PATH . DIRECTORY_SEPARATOR . $file_name;
		  if ( is_readable( $path ) ) {
			return $this->_require( $path );
		  }
		  return false;
	    }


	}
	//TRT_Autoload::instance();
}// End if().
