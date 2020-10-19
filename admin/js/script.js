jQuery(document).ready(function($) {
    		$('.confirm_delete').click(function(event) {
    			return confirm("Are you sure You want to Delete");
    		});

    		$('.checkAllBox').click(function(event) {
    			if(this.checked == true){
    				$('.checkBoxes').each(function() {
    					this.checked = true;
    				});
    			}
    			else{
    				$('.checkBoxes').each(function() {
    					this.checked = false;
    				});
    			}
    		});
});