!function(t){"use strict";wp.customize.controlConstructor.gdlr_core_fontslider=wp.customize.Control.extend({ready:function(){var i=this;this.container.find(".gdlr-core-customizer-fontslider").each(function(){var e=t(this),n=t('<div class="gdlr-core-customizer-fontslider-appearance" ></div>'),a=t(this).attr("data-min-value")?parseInt(t(this).attr("data-min-value")):6,r=t(this).attr("data-max-value")?parseInt(t(this).attr("data-max-value")):120,o=t(this).attr("data-suffix")?t(this).attr("data-suffix"):"px",c=e.val()?e.val():0;"none"==o&&(o=""),n.insertBefore(t(this)),n.slider({range:"min",min:a,max:r,value:parseInt(c),slide:function(t,n){e.val(n.value+o),i.setting.set(n.value+o)}}),e.val(parseInt(c)+o),t(this).on("input change",function(){n.slider("value",parseInt(e.val()))})})}}),t(document).ready(function(){t("body").on("change","input[data-input-type]",function(){var i=t(this).val().match(/^-?\d+/g),e="";"pixel"==t(this).attr("data-input-type")&&(e="px"),void 0!==i&&null!=i&&t(this).val(parseInt(i[0])+e)}),t("body").on("keydown","input[data-input-type]",function(i){var e=i.keyCode?i.keyCode:i.which;if(40==e||38==e){var n=t(this).val(),a=n.match(/^\d+/g),r="";"pixel"==t(this).attr("data-input-type")&&(r=n.length>0&&"%"==n.charAt(n.length-1)?"%":"px"),void 0!==a&&null!=a&&(40==e?t(this).val(parseInt(a[0])-1+r):38==e&&t(this).val(parseInt(a[0])+1+r))}t(this).trigger("change")}),"undefined"!=typeof gdlr_core_customizer_controls&&t.each(gdlr_core_customizer_controls,function(i,e){var n=t("#sub-accordion-section-"+i.trim());n.length||(n=t("#accordion-section-"+i.trim()).children(".accordion-section-content"));for(var a in e){var r=!0;for(var o in e[a]){var c=n.find('[data-customize-setting-link*="['+o+']"]'),s="";s=c.is('input[type="checkbox"]')?c.is(":checked")?"enable":"disable":c.is('input[type="radio"]')?c.filter(":checked").val():c.val(),r=r&&(s==e[a][o]||e[a][o].constructor===Array&&-1!=e[a][o].indexOf(s))}r?n.children("#customize-control-"+a).css("display","block"):n.children("#customize-control-"+a).css("display","none")}n.bind("change",'select, input[type="checkbox"], input[type="radio"]',function(){for(var t in e){var i=!0;for(var a in e[t]){var r=n.find('[data-customize-setting-link*="['+a+']"]'),o="";o=r.is('input[type="checkbox"]')?r.is(":checked")?"enable":"disable":r.is('input[type="radio"]')?r.filter(":checked").val():r.val(),i=i&&(o==e[t][a]||e[t][a].constructor===Array&&-1!=e[t][a].indexOf(o))}i?n.children("#customize-control-"+t).slideDown(200):n.children("#customize-control-"+t).slideUp(200)}})})})}(jQuery);