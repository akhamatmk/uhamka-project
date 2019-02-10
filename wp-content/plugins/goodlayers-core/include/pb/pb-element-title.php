<?php
	/*	
	*	Goodlayers Item For Page Builder
	*/
	
	gdlr_core_page_builder_element::add_element('title', 'gdlr_core_pb_element_title'); 
	
	if( !class_exists('gdlr_core_pb_element_title') ){
		class gdlr_core_pb_element_title{
			
			// get the element settings
			static function get_settings(){
				return array(
					'icon' => 'fa-text-width',
					'title' => esc_html__('Title', 'goodlayers-core')
				);
			}
			
			// return the element options
			static function get_options(){
				global $gdlr_core_item_pdb;
				
				return apply_filters('gdlr_core_title_item_options', array(
					'general' => array(
						'title' => esc_html__('General', 'goodlayers-core'),
						'options' => array(
							'title' => array(
								'title' => esc_html__('Title', 'goodlayers-core'),
								'type' => 'text',
								'default' => esc_html__('Default Sample Title', 'goodlayers-core'),
							),	
							'caption' => array(
								'title' => esc_html__('Caption', 'goodlayers-core'),
								'type' => 'textarea',
								'default' => esc_html__('Default sample caption text', 'goodlayers-core'),
							),
							'caption-position' => array(
								'title' => esc_html__('Caption Position', 'goodlayers-core'),
								'type' => 'combobox',
								'options' => array(
									'top' => esc_html__('Top', 'goodlayers-core'),
									'bottom' => esc_html__('Bottom', 'goodlayers-core'),
									'right' => esc_html__('Right', 'goodlayers-core'),
								),
								'default' => 'top'
							),	
							'title-width' => array(
								'title' => esc_html__('Title Width', 'goodlayers-core'),
								'type' => 'text',
								'data-input-type' => 'pixel',
								'default' => '300px',
								'condition' => array( 'caption-position' => 'right' )
							),
							'title-link-text' => array(
								'title' => esc_html__('Title Link Text', 'goodlayers-core'),
								'type' => 'text',
								'description' => esc_html__('Leave this field blank to link the title text', 'goodlayers-core')
							),
							'title-link' => array(
								'title' => esc_html__('Title Link', 'goodlayers-core'),
								'type' => 'text'
							),
							'title-link-target' => array(
								'title' => esc_html__('Title Link Target', 'goodlayers-core'),
								'type' => 'combobox',
								'options' => array(
									'_self' => esc_html__('Current Screen', 'goodlayers-core'),
									'_blank' => esc_html__('New Window', 'goodlayers-core'),
								)
							),				
						)
					),
					'style' => array(
						'title' => esc_html__('Style', 'goodlayers-core'),
						'options' => array(
							'text-align' => array(
								'title' => esc_html__('Text Align', 'goodlayers-core'),
								'type' => 'radioimage',
								'options' => 'text-align',
								'default' => 'left'
							),
							'left-media-type' => array(
								'title' => esc_html__('Left Media Type', 'goodlayers-core'),
								'type' => 'combobox',
								'options' => array(
									'none' => esc_html__('None', 'goodlayers-core'),
									'icon' => esc_html__('Icon', 'goodlayers-core'),
									'image' => esc_html__('Image', 'goodlayers-core'),
								),
								'default' => 'image',
								'condition' => array( 'text-align' => 'left' ),
							),
							'left-icon' => array(
								'title' => esc_html__('Left Icon Selector', 'goodlayers-core'),
								'type' => 'icons',
								'default' => 'fa fa-gear',
								'wrapper-class' => 'gdlr-core-fullsize',
								'condition' => array( 'text-align' => 'left', 'left-media-type' => 'icon' )
							),
							'left-image' => array(
								'title' => esc_html__('Left Image', 'goodlayers-core'),
								'type' => 'upload',
								'condition' => array( 'text-align' => 'left', 'left-media-type' => 'image' ),
							),
							'title-left-icon' => array(
								'title' => esc_html__('Title Left Icon', 'goodlayers-core'),
								'type' => 'icons',
								'allow-none' => true,
								'default' => 'none',
								'wrapper-class' => 'gdlr-core-fullsize',
								'condition' => array( 'text-align' => 'center' )
							),
							'enable-side-border' => array(
								'title' => esc_html__('Enable Side Border', 'goodlayers-core'),
								'type' => 'checkbox',
								'default' => 'disable',
								'condition' => array( 'text-align' => array('center', 'left') )
							),
							'side-border-size' => array(
								'title' => esc_html__('Side Border Size', 'goodlayers-core'),
								'type' => 'text',
								'data-input-type' => 'pixel',
								'default' => '1px',
								'condition' => array( 'text-align' => array('center', 'left'), 'enable-side-border' => 'enable'  )
							), 
							'side-border-spaces' => array(
								'title' => esc_html__('Side Border Spaces ( Before Title )', 'goodlayers-core'),
								'type' => 'text',
								'default' => '30px',
								'condition' => array( 'text-align' => array('center', 'left'), 'enable-side-border' => 'enable'  )
							), 
							'side-border-style' => array(
								'title' => esc_html__('Side Border Style', 'goodlayers-core'),
								'type' => 'combobox',
								'options' => array(
									'solid' => esc_html__('Solid', 'goodlayers-core'),
									'double' => esc_html__('Double', 'goodlayers-core'),
									'dotted' => esc_html__('Dotted', 'goodlayers-core'),
									'dashed' => esc_html__('Dash', 'goodlayers-core'),
								),
								'default' => 'solid',
								'condition' => array( 'text-align' => array('center', 'left'), 'enable-side-border' => 'enable' )
							),
							'side-border-divider-color' => array(
								'title' => esc_html__('Side Border Divider Color', 'goodlayers-core'),
								'type' => 'colorpicker',
								'condition' => array( 'text-align' => array('center', 'left'), 'enable-side-border' => 'enable'  )
							),	
							'heading-tag' => array(
								'title' => esc_html__('Heading Tag', 'goodlayers-core'),
								'type' => 'combobox',
								'options' => array(
									'h1' => esc_html__('H1', 'goodlayers-core'),
									'h2' => esc_html__('H2', 'goodlayers-core'),
									'h3' => esc_html__('H3', 'goodlayers-core'),
									'h4' => esc_html__('H4', 'goodlayers-core'),
									'h5' => esc_html__('H5', 'goodlayers-core'),
									'h6' => esc_html__('H6', 'goodlayers-core'),
									'div' => esc_html__('Div', 'goodlayers-core'),
								),
								'default' => 'h3'
							),
						)
					),
					'typography' => array(
						'title' => esc_html__('Typography', 'goodlayers-core'),
						'options' => array(
							'icon-font-size' => array(
								'title' => esc_html__('Left Icon Size ( Only for left align with icon )', 'goodlayers-core'),
								'type' => 'fontslider',
								'default' => '30px'
							),
							'title-font-size' => array(
								'title' => esc_html__('Title Font Size', 'goodlayers-core'),
								'type' => 'fontslider',
								'default' => '41px'
							),
							'mobile-title-font-size' => array(
								'title' => esc_html__('Mobile Title Font Size', 'goodlayers-core'),
								'type' => 'text',
								'data-input-type' => 'pixel',
								'description' => esc_html__('Breaks at 999px', 'goodlayers-core')
							),
							'title-font-weight' => array(
								'title' => esc_html__('Title Font Weight', 'goodlayers-core'),
								'type' => 'text',
								'default' => 800,
								'description' => esc_html__('Eg. lighter, bold, normal, 300, 400, 600, 700, 800', 'goodlayers-core')
							),
							'title-font-style' => array(
								'title' => esc_html__('Title Font Style', 'goodlayers-core'),
								'type' => 'combobox',
								'options' => array(
									'normal' => esc_html__('Normal', 'goodlayers-core'),
									'italic' => esc_html__('Italic', 'goodlayers-core'),
								),
								'default' => 'normal'
							),
							'title-font-letter-spacing' => array(
								'title' => esc_html__('Title Font Letter Spacing', 'goodlayers-core'),
								'type' => 'text',
								'data-input-type' => 'pixel',
								'default' => '1px'
							),
							'title-line-height' => array(
								'title' => esc_html__('Title Line Height', 'goodlayers-core'),
								'type' => 'text',
							),
							'title-font-uppercase' => array(
								'title' => esc_html__('Title Font Uppercase', 'goodlayers-core'),
								'type' => 'checkbox',
								'default' => 'enable'
							),	
							'caption-font-size' => array(
								'title' => esc_html__('Caption Font Size', 'goodlayers-core'),
								'type' => 'fontslider',
								'default' => '16px'
							),
							'caption-font-weight' => array(
								'title' => esc_html__('Caption Font Weight', 'goodlayers-core'),
								'type' => 'text',
								'default' => 400
							),
							'caption-font-style' => array(
								'title' => esc_html__('Caption Font Style', 'goodlayers-core'),
								'type' => 'combobox',
								'options' => array(
									'normal' => esc_html__('Normal', 'goodlayers-core'),
									'italic' => esc_html__('Italic', 'goodlayers-core'),
								),
								'default' => 'italic'
							),
							'caption-font-letter-spacing' => array(
								'title' => esc_html__('Caption Font Letter Spacing', 'goodlayers-core'),
								'type' => 'text',
								'data-input-type' => 'pixel',
								'default' => '0px'
							),
							'caption-font-uppercase' => array(
								'title' => esc_html__('Caption Font Uppercase', 'goodlayers-core'),
								'type' => 'checkbox',
								'default' => 'disable'
							),
							'title-link-text-size' => array(
								'title' => esc_html__('Title Link Text Size', 'goodlayers-core'),
								'type' => 'text',
								'data-input-type' => 'pixel',
							),
						)
					),
					'color' => array(
						'title' => esc_html__('Color', 'goodlayers-core'),
						'options' => array(
							'left-icon-color' => array(
								'title' => esc_html__('Left Icon Color', 'goodlayers-core'),
								'type' => 'colorpicker',
							),	
							'title-color' => array(
								'title' => esc_html__('Title Color', 'goodlayers-core'),
								'type' => 'colorpicker',
							),	
							'title-link-hover-color' => array(
								'title' => esc_html__('Title Link Hover Color', 'goodlayers-core'),
								'type' => 'colorpicker',
							),
							'title-text-shadow-size' => array(
								'title' => esc_html__('Title Text Shadow Size', 'goodlayers-core'),
								'type' => 'custom',
								'item-type' => 'padding',
								'options' => array('x', 'y', 'size'),
								'data-input-type' => 'pixel',
							),
							'title-text-shadow-color' => array(
								'title' => esc_html__('Title Text Shadow Color', 'goodlayers-core'),
								'type' => 'colorpicker',
							),
							'caption-color' => array(
								'title' => esc_html__('Caption Color', 'goodlayers-core'),
								'type' => 'colorpicker',
							),
						)
					),
					'spacing' => array(
						'title' => esc_html__('Spacing', 'goodlayers-core'),
						'options' => array(
							
							'item-left-margin' => array(
								'title' => esc_html__('Item Left Margin', 'goodlayers-core'),
								'type' => 'text',
								'data-input-type' => 'pixel',
								'default' => ''
							),
							'caption-spaces' => array(
								'title' => esc_html__('Space Between Caption ( And Title )', 'goodlayers-core'),
								'type' => 'text',
								'data-input-type' => 'pixel',
								'default' => '10px'
							),
							'media-margin' => array(
								'title' => esc_html__('Left Media Margin ( Only for left title style )', 'goodlayers-core'),
								'type' => 'custom',
								'item-type' => 'padding',
								'data-input-type' => 'pixel',
								'default' => array( 'top'=>'10px', 'right'=>'30px', 'bottom'=>'0px', 'left'=>'0px', 'settings'=>'unlink' ),
							),
							'padding-bottom' => array(
								'title' => esc_html__('Padding Bottom ( Item )', 'goodlayers-core'),
								'type' => 'text',
								'data-input-type' => 'pixel',
								'default' => $gdlr_core_item_pdb
							)
						)
					)
				));
			}
			
			// get the preview for page builder
			static function get_preview( $settings = array() ){
				$content  = self::get_content($settings, true);
				$id = mt_rand(0, 9999);
				
				ob_start();
?><script id="gdlr-core-preview-title-<?php echo esc_attr($id); ?>" >
jQuery(document).ready(function(){
	jQuery('#gdlr-core-preview-title-<?php echo esc_attr($id); ?>').parent().gdlr_core_title_divider();
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
						'title' => esc_html__('Default Sample Title', 'goodlayers-core'),
						'caption' => esc_html__('Default sample caption text', 'goodlayers-core'),
						'title-link' => '',
						'text-align' => 'left',
						'padding-bottom' => $gdlr_core_item_pdb
					);
				}

				$extra_style = '';
				if( !empty($settings['title-link']) && (!empty($settings['title-color']) || !empty($settings['title-link-hover-color'])) ){
					if( empty($settings['id']) ){
						global $gdlr_core_title_id; 
						$gdlr_core_title_id = empty($gdlr_core_title_id)? array(): $gdlr_core_title_id;
						
						// generate unique id so it does not get overwritten in admin area
						$rnd_title_id = mt_rand(0, 99999);
						while( in_array($rnd_title_id, $gdlr_core_title_id) ){
							$rnd_title_id = mt_rand(0, 99999);
						}
						$gdlr_core_title_id[] = $rnd_title_id;
						$settings['id'] = 'gdlr-core-title-item-id-' . $rnd_title_id;
					}
						
					
					if( !empty($settings['title-color']) ){
						$extra_style .= '#' . $settings['id'] . ' .gdlr-core-title-item-title a{ color:' . $settings['title-color'] . '; }';
					}
					if( !empty($settings['title-link-hover-color']) ){
						$extra_style .= '#' . $settings['id'] . ' .gdlr-core-title-item-title a:hover{ color:' . $settings['title-link-hover-color'] . '; }';
					}
					if( $preview ){
						$extra_style = '<style>' . $extra_style . '</style>';
					}else{
						gdlr_core_add_inline_style($extra_style);
						$extra_style = '';
					}
				}

				// mobile css
				if( !empty($settings['mobile-title-font-size']) ){
					if( empty($settings['id']) ){
						global $gdlr_core_title_item_id;
						$gdlr_core_title_item_id = empty($gdlr_core_title_item_id)? 1: $gdlr_core_title_item_id + 1;
						$settings['id'] = 'gdlr-core-title-item-' . $gdlr_core_title_item_id;
					}

					$mobile_style  = '@media only screen and (max-width: 999px){';
					$mobile_style .= '#' . $settings['id'] . ' .gdlr-core-title-item-title{';
					$mobile_style .= gdlr_core_esc_style(array('font-size'=>$settings['mobile-title-font-size']), false, true);
					$mobile_style .= '}';
					$mobile_style .= '}';
					gdlr_core_add_inline_style($mobile_style);
				}
				
				// default value
				$settings['text-align'] = empty($settings['text-align'])? 'left': $settings['text-align'];
				$settings['caption-position'] = empty($settings['caption-position'])? 'top': $settings['caption-position'];
				$settings['heading-tag'] = ($preview || empty($settings['heading-tag']))? 'h3': $settings['heading-tag'];

				$title_atts = array(
					'font-size' => (empty($settings['title-font-size']) || $settings['title-font-size'] == '41px')? '': $settings['title-font-size'],
					'font-weight' => (empty($settings['title-font-weight']) || $settings['title-font-weight'] == '800')? '': $settings['title-font-weight'],
					'font-style' => (empty($settings['title-font-style']) || $settings['title-font-style'] == 'normal')? '': $settings['title-font-style'],
					'letter-spacing' => (empty($settings['title-font-letter-spacing']) || $settings['title-font-letter-spacing'] == '1px')? '': $settings['title-font-letter-spacing'],
					'line-height' => empty($settings['title-line-height'])? '': $settings['title-line-height'],
					'text-transform' => (empty($settings['title-font-uppercase']) || $settings['title-font-uppercase'] == 'enable')? '': 'none',
					'color' => empty($settings['title-color'])? '': $settings['title-color']
				);
				if( !empty($settings['title-text-shadow-color']) && !empty($settings['title-text-shadow-color']) &&
					!empty($settings['title-text-shadow-size']['x']) && !empty($settings['title-text-shadow-size']['y']) && 
					!empty($settings['title-text-shadow-size']['size']) ){
					$title_atts['text-shadow'] = "{$settings['title-text-shadow-size']['x']} {$settings['title-text-shadow-size']['y']} {$settings['title-text-shadow-size']['size']} {$settings['title-text-shadow-color']}";
				}
				$caption_atts = array(
					'font-size' => (empty($settings['caption-font-size']) || $settings['caption-font-size'] == '16px')? '': $settings['caption-font-size'],
					'font-weight' => (empty($settings['caption-font-weight']) || $settings['caption-font-weight'] == '400')? '': $settings['caption-font-weight'],
					'font-style' => (empty($settings['caption-font-style']) || $settings['caption-font-style'] == 'italic')? '': $settings['caption-font-style'],
					'letter-spacing' => (empty($settings['caption-font-letter-spacing']) || $settings['caption-font-letter-spacing'] == '0px')? '': $settings['caption-font-letter-spacing'],
					'text-transform' => (empty($settings['caption-font-uppercase']) || $settings['caption-font-uppercase'] == 'disable')? '': 'uppercase',
					'color' => empty($settings['caption-color'])? '': $settings['caption-color']
				);

				$side_border = '';
				if( !empty($settings['enable-side-border']) && $settings['enable-side-border'] == 'enable' ){
					if( $settings['text-align'] == 'center' ){
						$title_atts['margin-left'] = empty($settings['side-border-spaces'])? '30px': $settings['side-border-spaces'];
						$title_atts['margin-right'] = $title_atts['margin-left'];
						
						$side_border_atts = array(
							'border-bottom-width' => (empty($settings['side-border-size']) || $settings['side-border-size'] == '1px')? '': $settings['side-border-size'],
							'border-style' => (empty($settings['side-border-style']) || $settings['side-border-style'] == 'solid')? '': $settings['side-border-style'],
							'border-color' => empty($settings['side-border-divider-color'])? '': $settings['side-border-divider-color']
						);

						$side_border  = '<div class="gdlr-core-title-item-divider gdlr-core-left gdlr-core-skin-divider" ' . gdlr_core_esc_style($side_border_atts) . ' ></div>';
						$side_border .= '<div class="gdlr-core-title-item-divider gdlr-core-right gdlr-core-skin-divider" ' . gdlr_core_esc_style($side_border_atts) . ' ></div>';
					}else if( $settings['text-align'] == 'left' ){
						$title_atts['margin-right'] = empty($settings['side-border-spaces'])? '30px': $settings['side-border-spaces'];

						$side_border_atts = array(
							'border-bottom-width' => (empty($settings['side-border-size']) || $settings['side-border-size'] == '1px')? '': $settings['side-border-size'],
							'border-style' => (empty($settings['side-border-style']) || $settings['side-border-style'] == 'solid')? '': $settings['side-border-style'],
							'border-color' => empty($settings['side-border-divider-color'])? '': $settings['side-border-divider-color']
						);

						$side_border  = '<div class="gdlr-core-title-item-divider gdlr-core-right gdlr-core-skin-divider" ' . gdlr_core_esc_style($side_border_atts) . ' ></div>';
					}
				}

				// start printing item
				$extra_class  = ' gdlr-core-' . $settings['text-align'] . '-align';
				$extra_class .= ' gdlr-core-title-item-caption-' . $settings['caption-position'];
				$extra_class .= empty($settings['no-pdlr'])? ' gdlr-core-item-pdlr': '';
				$extra_class .= empty($settings['class'])? '': ' ' . $settings['class'];
				$extra_class .= apply_filters('gdlr_core_pb_element_title_class', '', $settings);
				
				$ret  = '<div class="gdlr-core-title-item gdlr-core-item-pdb clearfix ' . esc_attr($extra_class) . '" ';
				$ret .= gdlr_core_esc_style(array(
					'padding-bottom' => (empty($settings['padding-bottom']) || $settings['padding-bottom'] == $gdlr_core_item_pdb)? '': $settings['padding-bottom'],
					'margin-left' => empty($settings['item-left-margin'])? '': $settings['item-left-margin']
				));
				if( !empty($settings['id']) ){
					$ret .= ' id="' . esc_attr($settings['id']) . '" ';
				}
				$ret .= ' >';

				if( $settings['text-align'] == 'left' ){
					$media_css_atts = array(
						'margin' => (empty($settings['media-margin']) || $settings['media-margin'] == array('top'=>'10px', 'right'=>'30px', 'bottom'=>'0px', 'left'=>'0px', 'settings'=>'unlink' ))? '': $settings['media-margin']
					);

					if( empty($settings['left-media-type']) || $settings['left-media-type'] == 'image' ){
						if( !empty($settings['left-image']) ){
							$ret .= '<div class="gdlr-core-title-item-left-image gdlr-core-media-image" ' . gdlr_core_esc_style($media_css_atts) . ' >' . gdlr_core_get_image($settings['left-image']) . '</div>';
							$ret .= '<div class="gdlr-core-title-item-left-image-wrap" >';
						}
					}else if( $settings['left-media-type'] == 'icon' ){

						$media_css_atts['font-size'] = (empty($settings['icon-font-size']) || $settings['icon-font-size'] == '30px')? '': $settings['icon-font-size'];

						$ret .= '<div class="gdlr-core-title-item-left-icon" ' . gdlr_core_esc_style($media_css_atts) . ' >';
						$ret .= '<i class="' . esc_attr($settings['left-icon']) . '" ' . gdlr_core_esc_style(array(
							'color' => empty($settings['left-icon-color'])? '': $settings['left-icon-color']
						)) . ' ></i>';
						$ret .= '</div>';	
						$ret .= '<div class="gdlr-core-title-item-left-icon-wrap" >';
					}
				}

				if( $settings['caption-position'] == 'top' && !empty($settings['caption']) ){
					$caption_atts['margin-bottom'] = (empty($settings['caption-spaces']) || $settings['caption-spaces'] == '10px')? '': $settings['caption-spaces'];
					$ret .= '<span class="gdlr-core-title-item-caption gdlr-core-info-font gdlr-core-skin-caption" ' . gdlr_core_esc_style($caption_atts) . ' >' . gdlr_core_text_filter($settings['caption']) . '</span>';
				}
				if( !empty($settings['title']) ){
					
					$ret .= '<div class="gdlr-core-title-item-title-wrap ';
					if( !empty($side_border) || ($settings['text-align'] == 'left' && !empty($settings['title-link-text']) && !empty($settings['title-link'])) ){
						$ret .= ' gdlr-core-js-2';
						if( !empty($side_border) ){
							$ret .= ' gdlr-core-with-divider';
						}
						if( $settings['text-align'] == 'left' && !empty($settings['title-link-text']) && !empty($settings['title-link']) ){
							$ret .= ' gdlr-core-with-link-text';
						}
					}
					$ret .= '" ';
					if( $settings['caption-position'] == 'right' ){
						$ret .= gdlr_core_esc_style(array(
							'width' => empty($settings['title-width'])? '': $settings['title-width']
						));
					}
					$ret .= ' >';

					$heading_tag_class = '';
					if( $settings['heading-tag'] == 'div' ){
						$heading_tag_class = ' gdlr-core-title-font';
					} 
					$ret .= '<' . $settings['heading-tag'] . ' class="gdlr-core-title-item-title gdlr-core-skin-title ' . esc_attr($heading_tag_class) . '" ' . gdlr_core_esc_style($title_atts) . ' >';
					if( empty($settings['title-link-text']) && !empty($settings['title-link']) ){
						$ret .= '<a href="'. esc_url($settings['title-link']) . '" target="' . (empty($settings['title-link-target'])? '_self': $settings['title-link-target']) . '" >';
					}
					if( $settings['text-align'] == 'center' && !empty($settings['title-left-icon']) ){
						if( $settings['title-left-icon'] != 'none' ){
							$ret .= '<i class="' . esc_attr($settings['title-left-icon']) . '" ' . gdlr_core_esc_style(array(
								'color' => empty($settings['left-icon-color'])? '': $settings['left-icon-color']
							)) . ' ></i>';
						}
					}
					$ret .= gdlr_core_text_filter($settings['title']);
					if( empty($settings['title-link-text']) && !empty($settings['title-link']) ){
						$ret .= '</a>';
					}
					$ret .= '<span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider" ></span>';
					$ret .= '</' . $settings['heading-tag'] . '>';
					$ret .= $side_border;

					if( $settings['text-align'] == 'left' && !empty($settings['title-link-text']) && !empty($settings['title-link']) && $settings['caption-position'] != 'right' ){
						$ret .= '<a href="'. esc_url($settings['title-link']) . '" target="' . (empty($settings['title-link-target'])? '_self': $settings['title-link-target']) . '" ' . gdlr_core_esc_style(array(
							'font-size' => empty($settings['title-link-text-size'])? '': $settings['title-link-text-size']
						)) . ' class="gdlr-core-title-item-link">';
						$ret .= gdlr_core_text_filter($settings['title-link-text']) . '</a>';
					}
					$ret .= '</div>';
					if( $settings['text-align'] != 'left' && !empty($settings['title-link-text']) && !empty($settings['title-link']) && $settings['caption-position'] != 'right' ){
						$ret .= '<a href="'. esc_url($settings['title-link']) . '" target="' . (empty($settings['title-link-target'])? '_self': $settings['title-link-target']) . '" ' . gdlr_core_esc_style(array(
							'font-size' => empty($settings['title-link-text-size'])? '': $settings['title-link-text-size']
						)) . ' class="gdlr-core-title-item-link">';
						$ret .= gdlr_core_text_filter($settings['title-link-text']) . '</a>';
					}
					
				}
				if( $settings['caption-position'] != 'top' && !empty($settings['caption']) ){
					$caption_atts['margin-top'] = (empty($settings['caption-spaces']) || $settings['caption-spaces'] == '10px')? '': $settings['caption-spaces'];
					$ret .= '<span class="gdlr-core-title-item-caption gdlr-core-info-font gdlr-core-skin-caption" ' . gdlr_core_esc_style($caption_atts) . ' >';
					$ret .= gdlr_core_text_filter($settings['caption']);
					if( !empty($settings['title-link-text']) && !empty($settings['title-link']) && $settings['caption-position'] == 'right' ){
						$ret .= '<a href="'. esc_url($settings['title-link']) . '" target="' . (empty($settings['title-link-target'])? '_self': $settings['title-link-target']) . '" ' . gdlr_core_esc_style(array(
							'font-size' => empty($settings['title-link-text-size'])? '': $settings['title-link-text-size']
						)) . ' class="gdlr-core-title-item-link">';
						$ret .= gdlr_core_text_filter($settings['title-link-text']) . '</a>';
					}
					$ret .= '</span>';
				}
				
				if( $settings['text-align'] == 'left' ){

					if( ((empty($settings['left-media-type']) || $settings['left-media-type'] == 'image') && !empty($settings['left-image'])) ||
						(!empty($settings['left-media-type']) && $settings['left-media-type'] == 'icon') ){

						$ret .= '</div>'; // gdlr-core-title-item-left-image-wrap
					}
				}

				$ret .= '</div>' . $extra_style;

				return $ret;
			}
			
		} // gdlr_core_pb_element_title
	} // class_exists	

	// [gdlr_core_title title="" caption="" ]
	add_shortcode('gdlr_core_title', 'gdlr_core_title_shortcode');
	if( !function_exists('gdlr_core_title_shortcode') ){
		function gdlr_core_title_shortcode($atts, $content = ''){
			$atts = wp_parse_args($atts, array(
				'no-pdlr' => true
			));

			return gdlr_core_pb_element_title::get_content($atts);
		}
	}