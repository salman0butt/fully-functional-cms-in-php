jQuery(document).ready(function($) {
	jQuery('#selectallboxes').click(function() {
		if (this.checked) {
			jQuery('.checkboxes').each(function(){
				this.checked = true;
				
			});
		}
		else {
			jQuery('.checkboxes').each(function(){
				this.checked = false;
			});
		}
	});
});