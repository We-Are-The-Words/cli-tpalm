(function(window,$){window.wp=window.wp||{};mejs.plugins.silverlight[0].types.push('video/x-ms-wmv');mejs.plugins.silverlight[0].types.push('audio/x-ms-wma');function wpMediaElement(){var settings={};function initialize(){if(typeof _wpmejsSettings!=='undefined'){settings=$.extend(!0,{},_wpmejsSettings)}
settings.success=settings.success||function(mejs){var autoplay,loop;if('flash'===mejs.pluginType){autoplay=mejs.attributes.autoplay&&'false'!==mejs.attributes.autoplay;loop=mejs.attributes.loop&&'false'!==mejs.attributes.loop;autoplay&&mejs.addEventListener('canplay',function(){mejs.play()},!1);loop&&mejs.addEventListener('ended',function(){mejs.play()},!1)}};$('.wp-audio-shortcode, .wp-video-shortcode, .video-block video, .audio-block audio').not('.mejs-container').filter(function(){return!$(this).parent().hasClass('.mejs-mediaelement')}).mediaelementplayer(settings)}
return{initialize:initialize}}
window.wp.mediaelement=new wpMediaElement();$(window.wp.mediaelement.initialize)})(window,jQuery)