<?php
	/*	
	*	Goodlayers Menu Management File
	*	---------------------------------------------------------------------
	*	This file modify the menu area for mega menu implementation
	*	---------------------------------------------------------------------
	*/

	// custom menu
	if( !function_exists('kingster_get_custom_menu') ){
		function kingster_get_custom_menu( $settings = array() ){
			if( !empty($settings['type']) ){
				if( $settings['type'] == 'overlay' ){
					kingster_get_overlay_menu($settings);
				}else if( $settings['type'] == 'left' || $settings['type'] == 'right' ){
					$settings['slide'] = $settings['type'];
					kingster_get_mmenu($settings);
				}
			}
		}
	}

	// menu icon
	if( !function_exists('kingster_get_mobile_menu_icon') ){
		function kingster_get_mobile_menu_icon( $settings = array() ){

			$settings = wp_parse_args($settings, array(
				'href' => '#',
				'button-type' => kingster_get_option('general', 'right-menu-style', 'hamburger-with-border'),
 				'button-class' => '',
				'icon-class' => 'icon_menu'
			));

			$button_class  = $settings['button-class'];
			$button_class .= ' kingster-mobile-button-' . $settings['button-type'];

			echo '<a class="' . esc_attr($button_class) . '" href="' . $settings['href'] . '" >';
			if( $settings['button-type'] == 'hamburger-with-border' ){
				echo '<i class="' . esc_attr($settings['icon-class']) . '" ></i>';
			}else if( $settings['button-type'] == 'hamburger' ){
				echo '<span></span>';
			}
			echo '</a>';
		}
	}

	// overlay menu
	if( !function_exists('kingster_get_overlay_menu') ){
		function kingster_get_overlay_menu( $settings = array() ){

			$settings = wp_parse_args($settings, array(
				'container-class' => '',
				'button-class' => '',
				'icon-class' => 'icon_menu',
				'id' => '',
				'theme-location' => '',
			));

			echo '<div class="kingster-overlay-menu ' . esc_attr($settings['container-class']) . '" id="' . esc_attr($settings['id']) . '" >';
			
			$settings['button-class'] = 'kingster-overlay-menu-icon ' . $settings['button-class'];
			kingster_get_mobile_menu_icon($settings);

			echo '<div class="kingster-overlay-menu-content kingster-navigation-font" >';
			echo '<div class="kingster-overlay-menu-close" ></div>';

			echo '<div class="kingster-overlay-menu-row" >';
			echo '<div class="kingster-overlay-menu-cell" >';
			wp_nav_menu(array(
				'theme_location'=>$settings['theme-location'], 
				'container'=> ''
			));
			echo '</div>';
			echo '</div>';

			echo '</div>';
			echo '</div>';

		}
	}

	// mmenu
	if( !function_exists('kingster_get_mmenu') ){
		function kingster_get_mmenu( $settings = array() ){

			$settings = wp_parse_args($settings, array(
				'container-class' => '',
				'button-class' => '',
				'icon-class' => 'fa fa-bars',
				'id' => '',
				'theme-location' => '',
				'slide' => 'left'
			));

			if( !empty($settings['container-class']) ){
				echo '<div class="' .  esc_attr($settings['container-class']) . '" >';
			}

			$settings['button-class'] = 'kingster-mm-menu-button ' . $settings['button-class'];
			$settings['href'] = '#' .  $settings['id'];
			kingster_get_mobile_menu_icon($settings);

			echo '<div class="kingster-mm-menu-wrap kingster-navigation-font" id="' . esc_attr($settings['id']) . '" data-slide="' . esc_attr($settings['slide']) . '" >';
			wp_nav_menu(array(
				'theme_location'=>$settings['theme-location'], 
				'container'=> '', 
				'menu_class'=> 'm-menu'
			));
			echo '</div>';
			if( !empty($settings['container-class']) ){
				echo '</div>';
			}
		}
	}

	// nav menu script
	if( class_exists('gdlr_core_edit_nav_menu') ){
		new gdlr_core_edit_nav_menu(array(
			'icon-class' => array(
				'title' => esc_html__('Menu Icon Class', 'kingster'),
				'type' => 'text',
			),
			'enable-mega-menu' => array(
				'title' => esc_html__('Enable Mega Menu', 'kingster'),
				'type' => 'checkbox',
				'depth' => '0'
			),
			'mega-menu-background' => array(
				'title' => esc_html__('Mega Menu Background', 'kingster'),
				'type' => 'upload',
				'depth' => '0'
			),
			'mega-menu-background-position' => array(
				'title' => esc_html__('Mega Menu Background Position', 'kingster'),
				'type' => 'combobox',
				'options' => array(
					'center' => esc_html__('Center', 'kingster'),
					'top-left' => esc_html__('Top Left', 'kingster'),
					'top-center' => esc_html__('Top Center', 'kingster'),
					'top-right' => esc_html__('Top Right', 'kingster'),
					'center-left' => esc_html__('Center Left', 'kingster'),
					'center-right' => esc_html__('Center Right', 'kingster'),
					'bottom-left' => esc_html__('Bottom Left', 'kingster'),
					'bottom-center' => esc_html__('Bottom Center', 'kingster'),
					'bottom-right' => esc_html__('Bottom Right', 'kingster'),
				),
				'depth' => '0'
			),
			'mega-menu-background-repeat' => array(
				'title' => esc_html__('Mega Menu Background Repeat', 'kingster'),
				'type' => 'combobox',
				'options' => array(
					'cover' => esc_html__('Cover ( full width and height )', 'kingster'),
					'no-repeat' => esc_html__('No Repeat', 'kingster'),
					'repeat' => esc_html__('Repeat X & Y', 'kingster'),
					'repeat-x' => esc_html__('Repeat X', 'kingster'),
					'repeat-y' => esc_html__('Repeat Y', 'kingster'),
				),
				'default' => 'cover',
				'condition' => array( 'background-type' => 'image' )
			),
			'mega-menu-width' => array(
				'title' => esc_html__('Mega Menu Width ( Fill value with % or px )', 'kingster'),
				'type' => 'text',
				'default' => '100%',
				'depth' => '0'
			),
			'hide-menu-title' => array(
				'title' => esc_html__('Hide Menu Title', 'kingster'),
				'type' => 'checkbox',
				'depth' => '1'
			),
			'mega-menu-section-size' => array(
				'title' => esc_html__('Section Size ( Only for mega menu )', 'kingster'),
				'type' => 'combobox',
				'options' => array( 
					60 => '1/1', 30 => '1/2', 20 => '1/3', 40 => '2/3', 
					15 => '1/4', 45 => '3/4', 12 => '1/5', 24 => '2/5', 
					36 => '3/5', 48 => '4/5', 10 => '1/6', 50 => '5/6', 
				),
				'depth' => '1'
			),
			'mega-menu-section-content' => array(
				'title' => esc_html__('Section Content ( Only for mega menu )', 'kingster'),
				'type' => 'textarea',
				'depth' => '1'
			),
		));
	}
	
	// creating the class for outputing the custom navigation menu
	if( !class_exists('kingster_menu_walker') ){
		
		// from wp-includes/nav-menu-template.php file
		class kingster_menu_walker extends Walker_Nav_Menu{

			private $top_level_items = 0;
			private $top_level_count = 0;

			function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

				// for counting the parent middle menu item
				if( $depth == 0 ){
					if( $this->top_level_count == 0 && !empty($args->menu->term_id) ){
						$menus = wp_get_nav_menu_items($args->menu->term_id, array(
							'meta_query' => array(array(
								'key' => '_menu_item_menu_item_parent',
								'value' => '0'
							))
						));
						$this->top_level_items = sizeOf($menus);
					}

					$this->top_level_count++;

					if( ceil($this->top_level_items / 2) + 1 == $this->top_level_count ){
						$center_nav_item = apply_filters('kingster_center_menu_item', '');
						if( !empty($center_nav_item) ){
							$output .= '<li class="kingster-center-nav-menu-item" >' . $center_nav_item . '</li>';
						}
					}
				}

				$item->gdlr_core_nav_menu_custom = wp_parse_args($item->gdlr_core_nav_menu_custom, array(
					'enable-mega-menu' => 'disable',
					'mega-menu-width' => '100%',
					'hide-menu-title' => 'disable',
					'mega-menu-section-size' => '60',
					'mega-menu-section-content' => ''
				));
				
				$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

				$classes = empty( $item->classes ) ? array() : (array) $item->classes;
				$classes[] = 'menu-item-' . $item->ID;
				
				$args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );
				
				$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
				$data_size = '';
				if( $depth == 0 ){
					if( $item->gdlr_core_nav_menu_custom['enable-mega-menu'] == 'disable' ){
						$class_names .= ' kingster-normal-menu';
					}else{
						$class_names .= ' kingster-mega-menu';
					}
				}else if( $depth == 1 ){
					$data_size = ' data-size="' . esc_attr($item->gdlr_core_nav_menu_custom['mega-menu-section-size']) . '"';
				}
				$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

				$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
				$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

				$output .= $indent . '<li ' . $id . $class_names . $data_size .'>';
				
				$atts = array();
				$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
				$atts['target'] = ! empty( $item->target )     ? $item->target     : '';
				$atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
				$atts['href']   = ! empty( $item->url )        ? $item->url        : '';
				$atts['class']  = ! empty( $args->walker->has_children )? 'sf-with-ul-pre' : '';
				
				$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

				$attributes = '';
				foreach ( $atts as $attr => $value ) {
					if ( ! empty( $value ) ) {
						$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
						$attributes .= ' ' . $attr . '="' . $value . '"';
					}
				}
				
				$title = apply_filters( 'the_title', $item->title, $item->ID );
				$title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );
				
				$item_output = $args->before;
				if( $depth != 1 || $item->gdlr_core_nav_menu_custom['hide-menu-title'] == 'disable' ){
					$item_output .= '<a'. $attributes .'>';
					if( !empty($item->gdlr_core_nav_menu_custom['icon-class']) ){
						$item_output .= '<i class="' . esc_attr($item->gdlr_core_nav_menu_custom['icon-class']) . '" ></i>';
					}
					$item_output .= $args->link_before . $title . $args->link_after;
					$item_output .= '</a>';
				}
				if( $depth == 1 && !empty($item->gdlr_core_nav_menu_custom['mega-menu-section-content']) ){
					$item_output .= '<div class="kingster-mega-menu-section-content">';
					$item_output .= gdlr_core_escape_content(gdlr_core_text_filter($item->gdlr_core_nav_menu_custom['mega-menu-section-content']));
					$item_output .= '</div>';
				}
				$item_output .= $args->after;

				if( $depth == 0 && $item->gdlr_core_nav_menu_custom['enable-mega-menu'] == 'enable' ){
					$mega_background = '';
					if( !empty($item->gdlr_core_nav_menu_custom['mega-menu-background']) ){
						$mega_background_url = wp_get_attachment_image_url($item->gdlr_core_nav_menu_custom['mega-menu-background'], 'full');
						$mega_background .= ' background-image: url(\'' . esc_url($mega_background_url) . '\'); ';
						
						if( !empty($item->gdlr_core_nav_menu_custom['mega-menu-background-position']) ){
							$background_pos = str_replace('-', ' ', $item->gdlr_core_nav_menu_custom['mega-menu-background-position']);
							$mega_background .= ' background-position: ' . esc_attr($background_pos) . '; ';
						}
						if( !empty($item->gdlr_core_nav_menu_custom['mega-menu-background-repeat']) ){
							$mega_background .= ' background-repeat: ' . esc_attr($item->gdlr_core_nav_menu_custom['mega-menu-background-repeat']) . '; ';
						}
					}	

					if( empty($item->gdlr_core_nav_menu_custom['mega-menu-width']) || trim($item->gdlr_core_nav_menu_custom['mega-menu-width']) == '100%' ){
						$item_output .= '<div class="sf-mega sf-mega-full" style="' . $mega_background . '" >'; 
					}else{
						$item_output .= '<div class="sf-mega" style="width: ' . esc_attr($item->gdlr_core_nav_menu_custom['mega-menu-width']) . ';">'; 
					}
					
				}
				$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
			}
			
			function end_el( &$output, $item, $depth = 0, $args = array() ) {
				if( $depth == 0 ){
					if( !empty($item->gdlr_core_nav_menu_custom['enable-mega-menu']) && $item->gdlr_core_nav_menu_custom['enable-mega-menu'] == 'enable' ){
						$output .= '</div>';
					}
				}
				$output .= "</li>\n";
			}

		} // kingster_menu_walker
		
	} // class_exists