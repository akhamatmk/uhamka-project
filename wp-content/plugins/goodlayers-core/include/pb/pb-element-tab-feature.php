<?php
	/*	
	*	Goodlayers Item For Page Builder
	*/
	
	gdlr_core_page_builder_element::add_element('tab-feature', 'gdlr_core_pb_element_tab_feature'); 
	
	if( !class_exists('gdlr_core_pb_element_tab_feature') ){
		class gdlr_core_pb_element_tab_feature{
			
			// get the element settings
			static function get_settings(){
				return array(
					'icon' => 'fa-folder-o',
					'title' => esc_html__('Tab Feature', 'goodlayers-core')
				);
			}
			
			// return the element options
			static function get_options(){
				global $gdlr_core_item_pdb;
				
				return array(
					'general' => array(
						'title' => esc_html__('General', 'goodlayers-core'),
						'options' => array(
							'tabs' => array(
								'title' => esc_html__('Add New Tab', 'goodlayers-core'),
								'type' => 'custom',
								'item-type' => 'tabs',
								'wrapper-class' => 'gdlr-core-fullsize',
								'options' => array(
									'title-background' => array(
										'title' => esc_html__('Title Background', 'goodlayers-core'),
										'type' => 'upload'
									),
									'title-image' => array(
										'title' => esc_html__('Title Image', 'goodlayers-core'),
										'type' => 'upload'
									),
									'title' => array(
										'title' => esc_html__('Title', 'goodlayers-core'),
										'type' => 'text'
									),
									'caption' => array(
										'title' => esc_html__('Caption', 'goodlayers-core'),
										'type' => 'text'
									),
									'content-left-image' => array(
										'title' => esc_html__('Content Left Image', 'goodlayers-core'),
										'type' => 'upload'
									),
									'content-left-caption' => array(
										'title' => esc_html__('Content Left Caption', 'goodlayers-core'),
										'type' => 'textarea'
									),
									'content' => array(
										'title' => esc_html__('Content', 'goodlayers-core'),
										'type' => 'tmce'
									),
									'content-button-text' => array(
										'title' => esc_html__('Content Button Text', 'goodlayers-core'),
										'type' => 'text'
									),
									'content-button-link' => array(
										'title' => esc_html__('Content Button Link', 'goodlayers-core'),
										'type' => 'text'
									),
									'content-button-target' => array(
										'title' => esc_html__('Content Button Link Target', 'goodlayers-core'),
										'type' => 'combobox',
										'options' => array(
											'_self' => esc_html__('Current Screen', 'goodlayers-core'),
											'_blank' => esc_html__('New Window', 'goodlayers-core'),
										),
									),
									'content-button2-text' => array(
										'title' => esc_html__('Content Button 2 Text', 'goodlayers-core'),
										'type' => 'text'
									),
									'content-button2-link' => array(
										'title' => esc_html__('Content Button 2 Link', 'goodlayers-core'),
										'type' => 'text'
									),
									'content-button2-target' => array(
										'title' => esc_html__('Content Button 2 Link Target', 'goodlayers-core'),
										'type' => 'combobox',
										'options' => array(
											'_self' => esc_html__('Current Screen', 'goodlayers-core'),
											'_blank' => esc_html__('New Window', 'goodlayers-core'),
										),
									),
								),
								'default' => array(
									array(
										'title' => esc_html__('Tab Title', 'goodlayers-core'),
										'content' => esc_html__('Tab content area', 'goodlayers-core'),
									),
									array(
										'title' => esc_html__('Tab Title', 'goodlayers-core'),
										'content' => esc_html__('Tab content area', 'goodlayers-core'),
									),
								)
							),
						),
					),
					'color' => array(
						'title' => esc_html__('Color', 'goodlayers-core'),
						'options' => array(
							'tab-title-color' => array(
								'title' => esc_html__('Tab Title Color', 'goodlayers-core'),
								'type' => 'colorpicker'
							),
							'tab-title-active-color' => array(
								'title' => esc_html__('Tab Title Active Color', 'goodlayers-core'),
								'type' => 'colorpicker'
							),
							'tab-title-background-color' => array(
								'title' => esc_html__('Tab Title Background Color', 'goodlayers-core'),
								'type' => 'colorpicker'
							),
							'tab-title-active-background-color' => array(
								'title' => esc_html__('Tab Title Active Background Color', 'goodlayers-core'),
								'type' => 'colorpicker'
							),
							'tab-title-border-color' => array(
								'title' => esc_html__('Tab Title Border Color', 'goodlayers-core'),
								'type' => 'colorpicker'
							),
							'tab-title-border-active-color' => array(
								'title' => esc_html__('Tab Title Border Active Color', 'goodlayers-core'),
								'type' => 'colorpicker'
							),
							'tab-content-color' => array(
								'title' => esc_html__('Tab Content Color', 'goodlayers-core'),
								'type' => 'colorpicker'
							),
						),
					),
					'spacing' => array(
						'title' => esc_html__('Spacing', 'goodlayers-core'),
						'options' => array(
							'padding-bottom' => array(
								'title' => esc_html__('Padding Bottom ( Item )', 'goodlayers-core'),
								'type' => 'text',
								'data-input-type' => 'pixel',
								'default' => $gdlr_core_item_pdb
							)
						)
					)
				);
			}

			// get the preview for page builder
			static function get_preview( $settings = array() ){
				$content  = self::get_content($settings, true);
				$id = mt_rand(0, 9999);
				
				ob_start();
?><script id="gdlr-core-preview-tab-feature-<?php echo esc_attr($id); ?>" >
jQuery(document).ready(function(){
	jQuery('#gdlr-core-preview-tab-feature-<?php echo esc_attr($id); ?>').parent().gdlr_core_tab();
});
</script><?php	
				$content .= ob_get_contents();
				ob_end_clean();
				
				return $content;
			}		
			
			// get the content from settings
			static function get_content( $settings = array(), $preview = false ){
				global $gdlr_core_item_pdb;

				// default variable
				if( empty($settings) ){
					$settings = array(
						'tabs' => array(
							array(
								'title' => esc_html__('Tab Title', 'goodlayers-core'),
								'content' => esc_html__('Tab content area', 'goodlayers-core'),
							),
							array(
								'title' => esc_html__('Tab Title', 'goodlayers-core'),
								'content' => esc_html__('Tab content area', 'goodlayers-core'),
							),
						),
						'padding-bottom' => $gdlr_core_item_pdb
					);
				}

				$tab_item_class  = empty($settings['no-pdlr'])? ' gdlr-core-item-pdlr': '';
				$tab_item_class .= empty($settings['class'])? '': ' ' . $settings['class'];

				// tab custom style
				// $custom_style  = '';
				// $custom_style .= empty($settings['tab-title-color'])? '': ' #custom_style_id .gdlr-core-tab-item-title{ color: ' . $settings['tab-title-color'] . '; }';
				// $custom_style .= empty($settings['tab-title-active-color'])? '': ' #custom_style_id .gdlr-core-tab-item-title.gdlr-core-active{ color: ' . $settings['tab-title-active-color'] . '; }';
				// $custom_style .= empty($settings['tab-title-background-color'])? '': ' #custom_style_id.gdlr-core-tab-style1-horizontal .gdlr-core-tab-item-title, #custom_style_id.gdlr-core-tab-style1-vertical .gdlr-core-tab-item-title{ background-color: ' . $settings['tab-title-background-color'] . '; }';
				// $custom_style .= empty($settings['tab-title-active-background-color'])? '': ' #custom_style_id.gdlr-core-tab-style1-horizontal .gdlr-core-tab-item-title.gdlr-core-active, #custom_style_id.gdlr-core-tab-style1-vertical .gdlr-core-tab-item-title.gdlr-core-active{ background-color: ' . $settings['tab-title-active-background-color'] . '; }';
				// $custom_style .= empty($settings['tab-title-border-color'])? '': ' #custom_style_id .gdlr-core-tab-item-title-wrap, #custom_style_id .gdlr-core-tab-item-content-wrap, #custom_style_id .gdlr-core-tab-item-title{ border-color: ' . $settings['tab-title-border-color'] . '; }';
				// $custom_style .= empty($settings['tab-title-border-active-color'])? '': ' #custom_style_id .gdlr-core-tab-item-title-line{ border-color: ' . $settings['tab-title-border-active-color'] . '; }';
				// if( !empty($custom_style) ){
				// 	if( empty($settings['id']) ){
				// 		global $gdlr_core_tab_id; 
				// 		$gdlr_core_tab_id = empty($gdlr_core_tab_id)? array(): $gdlr_core_tab_id;
				// 		
				// 		// generate unique id so it does not get overwritten in admin area
				// 		$rnd_tab_id = mt_rand(0, 99999);
				// 		while( in_array($rnd_tab_id, $gdlr_core_tab_id) ){
				// 			$rnd_tab_id = mt_rand(0, 99999);
				// 		}
				// 		$gdlr_core_tab_id[] = $rnd_tab_id;
				// 		$settings['id'] = 'gdlr-core-tab-' . $rnd_tab_id;
				// 	}
				// 	$custom_style = str_replace('custom_style_id', $settings['id'], $custom_style); 
				// 	if( $preview ){
				// 		$custom_style = '<style>' . $custom_style . '</style>';
				// 	}else{
				// 		gdlr_core_add_inline_style($custom_style);
				// 		$custom_style = '';
				// 	}
				// }
					
				// start printing item
				$ret  = '<div class="gdlr-core-tab-feature-item gdlr-core-js gdlr-core-item-pdb ' . esc_attr($tab_item_class) . '" ';
				if( !empty($settings['padding-bottom']) && $settings['padding-bottom'] != $gdlr_core_item_pdb ){
					$ret .= gdlr_core_esc_style(array('padding-bottom'=>$settings['padding-bottom']));
				}
				if( !empty($settings['id']) ){
					$ret .= ' id="' . esc_attr($settings['id']) . '" ';
				}
				$ret .= ' >';
				if( !empty($settings['tabs']) ){
					$count = 0; $active = 1;
					$ret .= '<div class="gdlr-core-tab-feature-title-item-wrap clearfix" >';
					foreach( $settings['tabs'] as $tab ){ $count++;
						$ret .= '<div class="gdlr-core-tab-feature-title-wrap ' . ($count == $active? ' gdlr-core-active': '') . '" data-tab-id="' . esc_attr($count) . '" >';
						if( $tab['title-image'] ){
							$ret .= '<i class="gdlr-core-tab-feature-title-icon" >' . gdlr_core_text_filter($tab['title-icon']) . '</i>';
						}
						if( $tab['title'] ){
							$ret .= '<h3 class="gdlr-core-tab-feature-title" >' . gdlr_core_text_filter($tab['title']) . '</h3>';
						}
						if( !empty($tab['caption']) ){
							$ret .= '<div class="gdlr-core-tab-feature-caption" >' . gdlr_core_text_filter($tab['caption']) . '</div>';
						}
						$ret .= '</div>';
					}
					$ret .= '</div>'; // gdlr-core-tab-item-tab-title-wrap
					
					$count = 0;
					$ret .= '<div class="gdlr-core-tab-feature-content-wrap clearfix" >';
					foreach( $settings['tabs'] as $tab ){ $count++;
						$ret .= '<div class="gdlr-core-tab-item-content ' . ($count == $active? ' gdlr-core-active': '') . '" data-tab-id="' . esc_attr($count) . '" ' . gdlr_core_esc_style(array(
							'color'=>empty($settings['tab-content-color'])? '': $settings['tab-content-color']
						)) . ' >' . gdlr_core_content_filter($tab['content']) . '</div>';
					}
					$ret .= '</div>'; // gdlr-core-tab-item-tab
				}
				$ret .= '</div>'; // gdlr-core-tab-item
				// $ret .= $custom_style;
				
				return $ret;
			}			
			
		} // gdlr_core_pb_element_tab_feature
	} // class_exists