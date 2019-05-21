$(document).ready(function(){
	//unwrap elements to clean unnedeed elements
	$('.components-items-container').unwrap();
	$('.callout-group').unwrap();
	$('.document-title').unwrap();
    $('.callout-image-note').unwrap();
    $('.callout-img-container').unwrap();
    $('.html-styles_product-page-note').unwrap();
    $('.component-list-container').unwrap();
    $('.centered-table').unwrap();
    $('.product-notice').unwrap();
    $('li.notice').wrap('<div class="notice"/>').contents().unwrap();
    $('.notice').unwrap();
    $('.product-page-subtitle').unwrap();
    $('.product-page-category-box-group').unwrap();
	$('._idGenObjectLayout-1>.product-page-category-border').unwrap();
    $('._idGenObjectLayout-2>.product-page-category-border').unwrap();
	$('._idGenObjectLayout-1>.product-category-box').unwrap();
    $('._idGenObjectLayout-2>.product-category-box').unwrap();
	$('._idGenObjectLayout-1>.product-page-title').unwrap();
    $('._idGenObjectLayout-2>.product-page-title').unwrap();
	$('._idGenObjectLayout-1>.product-components-list-pages-container').unwrap();
    $('._idGenObjectLayout-2>.product-components-list-pages-container').unwrap();
	$('._idGenObjectLayout-1>.product-components-item-pages-container').unwrap();
    $('._idGenObjectLayout-2>.product-components-item-pages-container').unwrap();
	$('._idGenObjectLayout-1>.centered-tables').unwrap();
    $('._idGenObjectLayout-2>.centered-tables').unwrap();
	
	
	
	//remove un-needed classes and elements. 
	$('.Basic-Paragraph').remove();
    $('.ParaOverride-1').remove();
	$('div').removeClass('_idGenObjectLayout-1');
	$('div').removeClass('_idGenObjectLayout-2');
	$('div').removeClass('_idGenObjectLayout-3');
    $('div').removeClass('_idGenTablePara-1');
	$('div').removeClass('_idGenObjectStyleOverride-1');
	
    $('head').append('<meta name="viewport" content="width=device-width, initial-scale=1"/>');

	
});

