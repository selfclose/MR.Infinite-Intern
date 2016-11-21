<?php
/**
 * Welcome Screen Class
 */
class launch_welcome {

	/**
	 * Constructor for the welcome screen
	 */
	public function __construct() {

		/* create dashbord page */
		add_action( 'admin_menu', array( $this, 'launch_welcome_register_menu' ) );

		/* activation notice */
		add_action( 'load-themes.php', array( $this, 'launch_activation_admin_notice' ) );

		/* enqueue script and style for welcome screen */
		add_action( 'admin_enqueue_scripts', array( $this, 'launch_welcome_style_and_scripts' ) );

		/* enqueue script for customizer */
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'launch_welcome_scripts_for_customizer' ) );

		/* load welcome screen */
		add_action( 'launch_welcome', array( $this, 'launch_welcome_getting_started' ) );

		/* ajax callback for dismissable required actions */
		add_action( 'wp_ajax_launch_dismiss_required_action', array( $this, 'launch_dismiss_required_action_callback') );
		add_action( 'wp_ajax_nopriv_launch_dismiss_required_action', array($this, 'launch_dismiss_required_action_callback') );

	}

	/**
	 * Creates the dashboard page
	 * @see  add_theme_page()
	 * @since 1.8.2.4
	 */
	public function launch_welcome_register_menu() {
		add_theme_page( 'Getting Started with Launch', 'Getting Started with Launch', 'activate_plugins', 'launch-welcome', array( $this, 'launch_welcome_screen' ) );
	}

	/**
	 * Adds an admin notice upon successful activation.
	 * @since 1.8.2.4
	 */
	public function launch_activation_admin_notice() {
		global $pagenow;

		if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
			add_action( 'admin_notices', array( $this, 'launch_welcome_admin_notice' ), 99 );
		}
	}

	/**
	 * Display an admin notice linking to the welcome screen
	 * @since 1.8.2.4
	 */
	public function launch_welcome_admin_notice() {
		?>
			<div class="notice notice-info is-dismissible">
				<h2><?php _e( 'Welcome! Thank you for choosing Launch! ', 'launch' ); ?></h2>
                <p><?php echo sprintf( esc_html__( 'Visit our %swelcome page%s', 'launch' ), '<a href="' . esc_url( admin_url( 'themes.php?page=launch-welcome' ) ) . '">', '</a>' ); ?> <?php _e( 'to setup your theme and start customizing your site.', 'launch' ); ?></p>
				<p><a href="<?php echo esc_url( admin_url( 'themes.php?page=launch-welcome' ) ); ?>" class="button button-primary" style="text-decoration: none;"><?php _e( 'Get Started with Launch', 'launch' ); ?></a></p>
			</div>
		<?php
	}

	/**
	 * Load welcome screen css and javascript
	 * @since  1.8.2.4
	 */
	public function launch_welcome_style_and_scripts( $hook_suffix ) {

		if ( 'appearance_page_launch-welcome' == $hook_suffix ) {
			wp_enqueue_style( 'launch-welcome-screen-css', get_template_directory_uri() . '/inc/welcome/css/welcome.css' );

			global $launch_required_actions;

			$nr_actions_required = 0;

			/* get number of required actions */
			if( get_option('launch_show_required_actions') ):
				$launch_show_required_actions = get_option('launch_show_required_actions');
			else:
				$launch_show_required_actions = array();
			endif;

			if( !empty($launch_required_actions) ):
				foreach( $launch_required_actions as $launch_required_action_value ):
					if(( !isset( $launch_required_action_value['check'] ) || ( isset( $launch_required_action_value['check'] ) && ( $launch_required_action_value['check'] == false ) ) ) && ((isset($launch_show_required_actions[$launch_required_action_value['id']]) && ($launch_show_required_actions[$launch_required_action_value['id']] == true)) || !isset($launch_show_required_actions[$launch_required_action_value['id']]) )) :
						$nr_actions_required++;
					endif;
				endforeach;
			endif;

			wp_localize_script( 'launch-welcome-screen-js', 'LaunchWelcomeScreenObject', array(
				'nr_actions_required' => $nr_actions_required,
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
				'template_directory' => get_template_directory_uri(),
				'no_required_actions_text' => __( 'Hooray! There are no required actions for you right now.','launch' )
			) );
		}
	}

	/**
	 * Load scripts for customizer page
	 * @since  1.8.2.4
	 */
	public function launch_welcome_scripts_for_customizer() {

		global $launch_required_actions;

		$nr_actions_required = 0;

		/* get number of required actions */
		if( get_option('launch_show_required_actions') ):
			$launch_show_required_actions = get_option('launch_show_required_actions');
		else:
			$launch_show_required_actions = array();
		endif;

		if( !empty($launch_required_actions) ):
			foreach( $launch_required_actions as $launch_required_action_value ):
				if(( !isset( $launch_required_action_value['check'] ) || ( isset( $launch_required_action_value['check'] ) && ( $launch_required_action_value['check'] == false ) ) ) && ((isset($launch_show_required_actions[$launch_required_action_value['id']]) && ($launch_show_required_actions[$launch_required_action_value['id']] == true)) || !isset($launch_show_required_actions[$launch_required_action_value['id']]) )) :
					$nr_actions_required++;
				endif;
			endforeach;
		endif;

		wp_localize_script( 'launch-welcome-screen-customizer-js', 'LaunchWelcomeScreenCustomizerObject', array(
			'nr_actions_required' => $nr_actions_required,
			'aboutpage' => esc_url( admin_url( 'themes.php?page=launch-welcome#actions_required' ) ),
			'customizerpage' => esc_url( admin_url( 'customize.php#actions_required' ) ),
			'themeinfo' => __('View Theme Info','launch'),
		) );
	}

	/**
	 * Dismiss required actions
	 * @since 1.8.2.4
	 */
	public function launch_dismiss_required_action_callback() {

		global $launch_required_actions;

		$launch_dismiss_id = (isset($_GET['dismiss_id'])) ? $_GET['dismiss_id'] : 0;

		echo $launch_dismiss_id; /* this is needed and it's the id of the dismissable required action */

		if( !empty($launch_dismiss_id) ):

			/* if the option exists, update the record for the specified id */
			if( get_option('launch_show_required_actions') ):

				$launch_show_required_actions = get_option('launch_show_required_actions');

				$launch_show_required_actions[$launch_dismiss_id] = false;

				update_option( 'launch_show_required_actions',$launch_show_required_actions );

			/* create the new option,with false for the specified id */
			else:

				$launch_show_required_actions_new = array();

				if( !empty($launch_required_actions) ):

					foreach( $launch_required_actions as $launch_required_action ):

						if( $launch_required_action['id'] == $launch_dismiss_id ):
							$launch_show_required_actions_new[$launch_required_action['id']] = false;
						else:
							$launch_show_required_actions_new[$launch_required_action['id']] = true;
						endif;

					endforeach;

				update_option( 'launch_show_required_actions', $launch_show_required_actions_new );

				endif;

			endif;

		endif;

		die(); // this is required to return a proper result
	}


	/**
	 * Welcome screen content
	 * @since 1.8.2.4
	 */
	public function launch_welcome_screen() {

		get_template_part( ABSPATH . 'wp-load.php' );
		get_template_part( ABSPATH . 'wp-admin/admin.php' );
		get_template_part( ABSPATH . 'wp-admin/admin-header.php' );
		?>
        
        <div class="wrap about-wrap theme-welcome">
            <h1><?php esc_html_e('Welcome to Launch - Version 1.0.5', 'launch'); ?></h1>
            <div class="about-text"><?php esc_html_e('Launch is a responsive e-commerce WordPress theme perfect to market your products and services. It integrates with Woocommerce.', 'launch'); ?></div>
            <a class="wp-badge" href="<?php echo esc_url('https://www.themely.com/'); ?>" target="_blank"><span><?php esc_html_e('Visit Website', 'launch'); ?></span></a>
            <div class="clearfix"></div>
            <h2 class="nav-tab-wrapper">
                <a class="nav-tab nav-tab-active"><?php esc_html_e('Get Started', 'launch'); ?></a>
            </h2>
            <div class="info-tab-content">
                <div class="left">
                    <div>
                        <h3><?php esc_html_e('Step 1 - Install Plugins', 'launch'); ?></h3>
                        <ol>
                            <li><?php esc_html_e('Install', 'launch'); ?> <a target="_blank" href="<?php echo esc_url('https://wordpress.org/plugins/woocommerce/'); ?>"><?php esc_html_e('Woocommerce', 'launch'); ?></a> <?php esc_html_e('plugin', 'launch'); ?></li>
                            <li><?php esc_html_e('Install', 'launch'); ?> <a target="_blank" href="<?php echo esc_url('https://wordpress.org/plugins/social-pug/'); ?>"><?php esc_html_e('Social Pug', 'launch'); ?></a> <?php esc_html_e('plugin', 'launch'); ?></li>
                            <li><?php esc_html_e('Install', 'launch'); ?> <a target="_blank" href="<?php echo esc_url('https://wordpress.org/plugins/contact-form-7/'); ?>"><?php esc_html_e('Contact Form 7', 'launch'); ?></a> <?php esc_html_e('plugin', 'launch'); ?></li>
                        </ol>
                        <p>
                            <a class="button button-secondary" href="<?php echo esc_url('themes.php?page=tgmpa-install-plugins'); ?>"><?php esc_html_e('Install Plugins Here', 'launch'); ?></a>
                        </p>
                    </div>
                    <div>
                        <h3><?php esc_html_e('Step 2 - Configure Plugins', 'launch'); ?></h3>
                        <p><?php esc_html_e('Certain plugins will need to be configured in order for the theme to function as intended. It will only require a few minutes of your time. Click the button below to read the configuration instructions.', 'launch'); ?></p>
                        <p><a class="button button-secondary" target="_blank" href="<?php echo esc_url('http://support.themely.com/knowledgebase/launch-configure-plugins/'); ?>"><?php esc_html_e('Configuration Instructions', 'launch'); ?></a></p>
                    </div>
                    <div>
                        <h3><?php esc_html_e('Step 3 - Import Demo Content (OPTIONAL)', 'launch'); ?></h3>
                        <p><?php esc_html_e('Make your site look like our live demo; import all demo pages, posts, widgets and theme options.', 'launch'); ?> <?php esc_html_e('Live demo:', 'launch'); ?> <a target="_blank" href="<?php echo esc_url('http://demo.themely.com/launch/'); ?>">http://demo.themely.com/launch/</a></p>
                        <p><a class="button button-secondary" target="_blank" href="<?php echo esc_url('http://support.themely.com/knowledgebase/launch-import-demo-content/'); ?>"><?php esc_html_e('Demo Import Instructions', 'launch'); ?></a></p>
                    </div>
                </div>
                <div class="right">
                    <div>
                        <h3><?php esc_html_e('Theme Customizer', 'launch'); ?></h3>
                        <p class="about"><?php esc_html_e('Launch supports the default Wordpress Customizer for all theme settings. Click the button below to start customizing your site.', 'launch'); ?></p>
                        <p>
                            <a class="button button-primary" href="<?php echo esc_url('customize.php'); ?>"><?php esc_html_e('Launch Customizer', 'launch'); ?></a>
                        </p>
                    </div>
                    <div>
                        <h3><?php esc_html_e('Theme Support', 'launch'); ?></h3>
                        <p class="about"><?php esc_html_e('Support for Launch is conducted through our support ticket system.', 'launch'); ?></p>
                        <ul class="ul-square">
                            <li><a target="_blank" href="<?php echo esc_url('http://support.themely.com/forums/'); ?>"><?php esc_html_e('Support Forum', 'launch'); ?></a></li>
                            <li><a target="_blank" href="<?php echo esc_url('http://support.themely.com/section/launch/'); ?>"><?php esc_html_e('Theme Documentation', 'launch'); ?></a></li>
                        </ul>
                        <p><a class="button button-secondary" target="_blank" href="<?php echo esc_url('http://support.themely.com/forums/'); ?>"><?php esc_html_e('Create a support ticket', 'launch'); ?></a></p>
                    </div>
                </div>
            </div>
        </div>
        <?php
	}

}

$GLOBALS['launch_Welcome'] = new launch_Welcome();