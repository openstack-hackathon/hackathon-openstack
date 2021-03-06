<?php
/**
 * Beaver Builder plugin support
 *
 * @link  https://www.wpbeaverbuilder.com/
 *
 * @since    1.1
 * @version  1.3.17
 *
 * @package     WebMan Amplifier
 * @subpackage  Shortcodes
 *
 * @todo  Shortcode generator button in page builder.
 * @todo  Load on page builder pages only - needed Beaver Builder update to do so.
 * @todo  Beaver Builder contains a bug: you can not set up a form field ID to `type`.
 *        Reported this bug already. Applied a workaround with a new shortcode parameter
 *        named `type_bb` (specifically in Divider, Price and Table shortcode).
 *
 * CONTENT:
 * -  10) Actions and filters
 * -  20) Helpers
 * -  30) Assets
 * -  40) Modules
 * - 100) Other functions
 */





/**
 * 10) Actions and filters
 */

	/**
	 * Actions
	 */

		add_action( 'init', 'wma_bb_custom_modules', 8 );
		add_action( 'init', 'wma_bb_shortcode_def',  9 );

		add_action( 'wp_enqueue_scripts', 'wma_bb_assets' );

		add_action( 'fl_builder_control_' . 'wm_radio', 'wma_bb_custom_field_wm_radio', 10, 3 );

		add_action( 'wmhook_shortcode_bb_module_frontend', 'wma_bb_custom_module_output', 10, 2 );



	/**
	 * Filters
	 */

		add_filter( 'fl_builder_upgrade_url', 'wma_bb_upgrade_url' );

		add_filter( 'fl_builder_module_custom_class', 'wma_bb_custom_modules_wrapper_class', 10, 2 );





/**
 * 20) Helpers
 */

	/**
	 * Upgrade link URL
	 *
	 * @since    1.1.6
	 * @version  1.2
	 *
	 * @param  string $url
	 */
	if ( ! function_exists( 'wma_bb_upgrade_url' ) ) {
		function wma_bb_upgrade_url( $url ) {

			// Output

				return esc_url( add_query_arg( 'fla', '67', $url ) );

		}
	} // /wma_bb_upgrade_url



	/**
	 * Get Beaver Builder shortcode definitions
	 *
	 * @since    1.1
	 * @version  1.3
	 *
	 * @param  string $shortcode
	 * @param  string $property
	 */
	if ( ! function_exists( 'wma_bb_shortcode_def' ) ) {
		function wma_bb_shortcode_def( $shortcode, $property = '' ) {

			// Helper variables

				$output = '';

				$def = wma_shortcodes()->get_definitions();
				$def = $def['bb_plugin'];

				$custom_modules_category = apply_filters( 'wmhook_shortcode_wma_bb_shortcode_def_category_custom_name', _x( 'Theme Modules', 'Page builder modules category name.', 'webman-amplifier' ) );

				if ( apply_filters( 'wmhook_shortcode_wma_bb_shortcode_def_category_advanced', false, $shortcode ) ) {
					$custom_modules_category = __( 'Advanced Modules', 'fl-builder' ); // Taking translation from Beaver Builder plugin
				}


			// Processing

				if ( 'all' === $shortcode ) {

					$output = $def; // Get the array of definitions for all BB supported shortcodes

				} elseif ( isset( $def[ $shortcode ] ) ) {

					$output = wp_parse_args( $def[ $shortcode ], array(
							'name'            => '-',
							'description'     => '',
							'category'        => $custom_modules_category,
							'enabled'         => true,
							'editor_export'   => true, // Export content to WP editor after BB plugin uninstall?
							'dir'             => trailingslashit( WMAMP_INCLUDES_DIR ) . 'shortcodes/page-builder/beaver-builder/modules/',
							'url'             => trailingslashit( WMAMP_INCLUDES_URL ) . 'shortcodes/page-builder/beaver-builder/modules/',
							'partial_refresh' => true,
							'output'          => '',
							'output_children' => '',
							'params'          => array(),
							'params_children' => array(),
							'form'            => array(),
							'form_children'   => array(),
						) );

					// Allow filtering

						$output = apply_filters( 'wmhook_shortcode_wma_bb_shortcode_def_output', $output, $shortcode );

					// Put all BB module registration values into a single array

						$output['register'] = array(
								'name'            => $output['name'],
								'description'     => $output['description'],
								'category'        => $output['category'],
								'enabled'         => $output['enabled'],
								'editor_export'   => $output['editor_export'],
								'dir'             => $output['dir'],
								'url'             => $output['url'],
								'partial_refresh' => $output['partial_refresh'],
							);

					if ( $property && isset( $output[ $property ] ) ) {
						$output = $output[ $property ];
					} elseif ( $property && ! isset( $output[ $property ] ) ) {
						$output = '';
					}

				}


			// Output

				return $output;

		}
	} // /wma_bb_shortcode_def





/**
 * 30) Assets
 */

	/**
	 * Styles and scripts
	 *
	 * @since    1.1
	 * @version  1.1.6
	 */
	if ( ! function_exists( 'wma_bb_assets' ) ) {
		function wma_bb_assets() {
			//Styles
				if ( class_exists( 'FLBuilderModel' ) && FLBuilderModel::is_builder_active() ) {
					wp_enqueue_style( 'wm-radio' );
					wp_enqueue_style( 'wm-shortcodes-bb-addon' );
				}
		}
	} // /wma_bb_assets





/**
 * 40) Modules
 */

	/**
	 * Add custom modules
	 *
	 * @since    1.1
	 * @version  1.1
	 */
	if ( ! function_exists( 'wma_bb_custom_modules' ) ) {
		function wma_bb_custom_modules() {
			//Helper variables
				$defs = wma_bb_shortcode_def( 'all' );

			//Include files
				if ( ! empty( $defs ) ) {
					foreach ( $defs as $module => $def ) {
						$module_file_path = trailingslashit( WMAMP_INCLUDES_DIR ) .'shortcodes/page-builder/beaver-builder/modules/wm_' . $module . '.php';
						if ( file_exists( $module_file_path ) ) {
							require_once( $module_file_path );
						}
					}
				}
		}
	} // /wma_bb_custom_modules



	/**
	 * Remove custom modules classes on module wrapper
	 *
	 * @since    1.1.1
	 * @version  1.1.1
	 *
	 * @param  string $class
	 * @param  object $module
	 */
	if ( ! function_exists( 'wma_bb_custom_modules_wrapper_class' ) ) {
		function wma_bb_custom_modules_wrapper_class( $class, $module ) {
			//Helper variables
				$defs = wma_bb_shortcode_def( 'all' );
				$defs = array_keys( $defs );

			//Preparing output
				if ( in_array( $module->settings->type, $defs ) ) {
					$class = '';
				}

			//Output
				return $class;
		}
	} // /wma_bb_custom_modules_wrapper_class



	/**
	 * Module output
	 *
	 * @since    1.1
	 * @version  1.3.7
	 *
	 * @param  obj    $module   Page builder's current module object
	 * @param  array  $settings Settings passed from page builder form
	 */
	if ( ! function_exists( 'wma_bb_custom_module_output' ) ) {
		function wma_bb_custom_module_output( $module, $settings = array() ) {
			//Requirements check
				if ( ! is_object( $module ) || ! isset( $module->slug ) ) {
					return;
				}

			//Helper variables
				$shortcode_output = $replace_children = '';

				/**
				 * Removing 'wm_' (string length = 3) from the beginning
				 * of the custom module file name slug.
				 */
				$module = substr( $module->slug, 3 );

				$output   = array(
						'parent' => (string) wma_bb_shortcode_def( $module, 'output' ),
						'child'  => (string) wma_bb_shortcode_def( $module, 'output_children' )
					);
				$params   = array(
						'parent' => (array) wma_bb_shortcode_def( $module, 'params' ),
						'child'  => (array) wma_bb_shortcode_def( $module, 'params_children' )
					);
				$children = ( isset( $settings->children ) ) ? ( array_filter( $settings->children ) ) : ( false );

			//Preparing output

				/**
				 * Basic form output (parent)
				 */

					foreach ( $params['parent'] as $param ) {

						$replace = '';
						$param   = trim( $param );

						if ( $param ) {
							if (
									isset( $settings->$param )
									&& ! empty( $settings->$param )
								) {

								$value = $settings->$param;

								//Convert the array shortcode parameter to string
									if ( is_array( $value ) ) {
										$value = implode( ',', $value );
									}

								$replace = ( 'content' === $param ) ? ( $value ) : ( ' ' . $param . '="' . $value . '"' );
								$replace = apply_filters( 'wmhook_shortcode_wma_bb_custom_module_output_parent_replace', $replace, $module, $param, $settings );

							}

							$output['parent'] = str_replace( '{{' . $param . '}}', $replace, $output['parent'] );
						}

					} // /foreach

				/**
				 * Items form output (children)
				 */

					if (
							is_array( $children )
							&& ! empty( $children )
							&& ! empty( $params['child'] )
						) {

						foreach ( $children as $child ) {

							//Requirements check
								if ( ! is_object( $child ) || empty( $child ) ) {
									continue;
								}

							$replace_child = $output['child'];

							foreach ( $params['child'] as $param ) {

								$replace = '';
								$param   = trim( $param );

								if ( $param ) {
									if (
											isset( $child->$param )
											&& ! empty( $child->$param )
										) {

										$value = $child->$param;

										//Convert the array shortcode parameter to string
											if ( is_array( $value ) ) {
												$value = implode( ',', $value );
											}

										$replace = ( 'content' === $param ) ? ( $value ) : ( ' ' . $param . '="' . $value . '"' );
										$replace = apply_filters( 'wmhook_shortcode_wma_bb_custom_module_output_child_replace', $replace, $module, $param, $child, $settings );

									}

									$replace_child = str_replace( '{{' . $param . '}}', $replace, $replace_child );
								}

							} // /foreach

							$replace_children .= $replace_child;

						} // /foreach

					}

				/**
				 * Actual outputted shortcode
				 */

					$shortcode_output = str_replace( array( '{{children}}', '{{items}}' ), $replace_children, $output['parent'] );

					$shortcode_output = apply_filters( 'wmhook_shortcode_wma_bb_custom_module_output', $shortcode_output, $module, $settings );

			//Output
				echo $shortcode_output;
		}
	} // /wma_bb_custom_module_output



	/**
	 * Module specific frontend JS
	 *
	 * @since    1.3.15
	 * @version  1.3.17
	 *
	 * @param  obj    $module   Page builder's current module object
	 * @param  array  $settings Settings passed from page builder form
	 */
	function wma_bb_custom_module_frontent_js( $module, $settings = array() ) {

		// Requirements check

			if (
					! class_exists( 'FLBuilderModel' )
					|| ! FLBuilderModel::is_builder_active()
					|| ! is_object( $module )
					|| ! isset( $module->slug )
					|| ! isset( $module->node )
				) {
				return;
			}


		// Helper variables

			$output = '';

			$id       = $module->node;
			$settings = (array) $settings;

			/**
			 * Removing 'wm_' (string length = 3) from the beginning
			 * of the custom module file name slug.
			 */
			$module = substr( $module->slug, 3 );


		// Processing

			switch ( $module ) {

				case 'accordion':
						$output = "WmampAccordion( '.fl-node-{{id}} .wm-accordion' );";
					break;

				case 'content_module':
				case 'posts':
				case 'testimonials':

					// Isotope

						if ( isset( $settings['filter'] ) && $settings['filter'] ) {
							$output = "WmampIsotope( '.fl-node-{{id}} .filter-this' );";
						}

					// Masonry

						if ( isset( $settings['class'] ) && false !== strpos( $settings['class'], 'masonry' ) ) {
							$output = "WmampMasonry( '.fl-node-{{id}} .masonry-this' );";
						}

					// Slick

						if ( isset( $settings['scroll'] ) && $settings['scroll'] ) {
							if ( version_compare( apply_filters( 'wmhook_shortcode_supported_version', WMAMP_VERSION ), '1.3', '<' ) ) {
								$output = "WmampOwl( '.fl-node-{{id}} [class*=\"scrollable-\"]' );";
							} else {
								$output = "WmampSlick( '.fl-node-{{id}} [class*=\"scrollable-\"]' );";
							}
						}

					break;

				case 'tabs':
						$output = "WmampTabs( '.fl-node-{{id}} .wm-tabs' );";
					break;

				default:
					break;

			} // /switch


		// Output

			if ( trim( $output ) ) {
				echo 'jQuery( function() { ' . str_replace( '{{id}}', $id, $output ) . ' } );';
			}

	} // /wma_bb_custom_module_frontent_js

	add_action( 'wmhook_shortcode_bb_module_frontend_js', 'wma_bb_custom_module_frontent_js', 10, 2 );





/**
 * 100) Other functions
 */

	/**
	 * Custom page builder input field: wm_radio
	 *
	 * @since    1.1
	 * @version  1.1.5
	 *
	 * @param  string $name
	 * @param  string $value
	 * @param  array  $field
	 */
	if ( ! function_exists( 'wma_bb_custom_field_wm_radio' ) ) {
		function wma_bb_custom_field_wm_radio( $name, $value, $field ) {
			//Output
				echo wma_custom_field_wm_radio( $name, $value, $field );
		}
	} // /wma_bb_custom_field_wm_radio



	/**
	 * Get custom module slug
	 *
	 * Removing 'wm_' (string length = 3) from the beginning
	 * of the custom module file name slug.
	 *
	 * @since    1.1.5
	 * @version  1.1.5
	 *
	 * @param  path $file
	 */
	if ( ! function_exists( 'wma_bb_get_custom_module_slug' ) ) {
		function wma_bb_get_custom_module_slug( $file = __FILE__ ) {
			//Output
				return substr( basename( $file, '.php' ), 3 );
		}
	} // /wma_bb_get_custom_module_slug
