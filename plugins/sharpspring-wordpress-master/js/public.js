function sswp__callback(ss_resp) {
	if (typeof ss_resp.contact != 'undefined') { // Check if a contact record exists for this tracking ID
		var contact = ss_resp.contact;
		
		// For debugging
		//console.log(contact);
		
		// Set sswp-contact cookie as object
		Cookies.set('sswp-contact', contact, { expires: 365 });
		
		// sswp-if-is-contact
		jQuery('.sswp_if_is_contact').css('display','inline');
		
		// Loop through each field in contact and apply formatting as required
		for (var key in contact) {
			
			// sswp-field
			jQuery('.sswp_field[data-field="' + key + '"]').html(contact[key]);
			
			// sswp-if-field-equals
			jQuery('.sswp_if_field_equals[data-field="' + key + '"][data-field-equals="' + contact[key] + '"]').css('display','inline');
			
			// sswp-if-field-not-empty
			jQuery('.sswp_if_field_not_empty[data-field="' + key + '"]').css('display','inline');
			
		}
		
		// sswp-if-field-empty - Loop through each of these tags on the page and make visible if lead field does not exist
		jQuery('.sswp_if_field_empty').each(function() {
			var field_name = jQuery(this).attr('data-field');
			if (!(field_name in contact)) {
				jQuery(this).css('display','inline');
			}				
		});
		
		// sswp-field - Loop through each one and if not a key, set value back to default
		jQuery('.sswp_field').each(function() {
			var field_name = jQuery(this).attr('data-field');
			if (!(field_name in contact)) {
				jQuery(this).html(jQuery(this).attr('data-default'));
			}
		});
		
	} else {
		// Remove sswp-contact cookie in case it exists
		Cookies.remove('sswp-contact');
		
		// sswp-field - Loop through each one and set value back to default
		jQuery('.sswp_field').each(function() { jQuery(this).html(jQuery(this).attr('data-default')); });
		
		// sswp-if-is-not-contact
		jQuery('.sswp_if_is_not_contact').css('display','inline');
		
		// sswp-if-field-empty - No contact record found, so all fields to show if empty are shown
		jQuery('.sswp_if_field_empty').css('display','inline');
	}
	
	// sswp-if-field-equals, sswp-if-field-empty, sswp-if-not-field-empty, sswp-if-is-contact, sswp-if-is-not-contact - Remove show_initially class from all of these after JS has properly displayed them
	jQuery('.sswp_if_field_equals').removeClass('show_initially');
	jQuery('.sswp_if_field_empty').removeClass('show_initially');
	jQuery('.sswp_if_field_not_empty').removeClass('show_initially');
	jQuery('.sswp_if_is_contact').removeClass('show_initially');
	jQuery('.sswp_if_is_not_contact').removeClass('show_initially');
	
}
_ss.push(['_setResponseCallback', sswp__callback]);