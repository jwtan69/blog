// JavaScript Document

function getValidationRules () {
	var custom = {
		focusCleanup: false,
		
		wrapper: 'div',
		errorElement: 'span',
		
		highlight: function(element) {
			$(element).parents ('.form-group').removeClass ('success').addClass('error');
		},
		success: function(element) {
			$(element).parents ('.form-group').removeClass ('error').addClass('success');
			$(element).parents ('.form-group:not(:has(.clean))').find ('div:last').before ('<div class="clean"></div>');
		},
		errorPlacement: function(error, element) {
			error.prependTo(element.parents ('.form-group'));
		}
		
	};
	
	return custom;
}

var validationRules = getValidationRules ();