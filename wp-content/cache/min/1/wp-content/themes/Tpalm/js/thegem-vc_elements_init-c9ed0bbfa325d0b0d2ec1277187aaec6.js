(function($){$(function(){$('body').updateAccordions()});$.fn.updateAccordions=function(){$('.gem_accordion',this).each(function(index){var $accordion=$(this);$accordion.thegemPreloader(function(){var $tabs,interval=$accordion.attr("data-interval"),active_tab=!isNaN($accordion.data('active-tab'))&&parseInt($accordion.data('active-tab'))>0?parseInt($accordion.data('active-tab'))-1:!1,collapsible=$accordion.data('collapsible')==='yes';$tabs=$accordion.find('.gem_accordion_wrapper').accordion({header:"> div > .gem_accordion_header",autoHeight:!1,heightStyle:"content",active:active_tab,collapsible:collapsible,navigation:!0,activate:function(event,ui){if(ui.newPanel.size()>0){ui.newPanel.trigger('accordion-update')}},beforeActivate:function(event,ui){if(ui.newPanel.size()>0){$("html, body").animate({scrollTop:ui.newPanel.closest('.gem_accordion').offset().top-200},300)}}})})})}})(jQuery)