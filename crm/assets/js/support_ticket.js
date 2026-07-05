
/* Webarch Admin Dashboard 
/* This JS is only for DEMO Purposes - Extract the code that you need
-----------------------------------------------------------------*/ 
$(document).ready(function(){	
/** Text Editor **/
//$('#message').wysihtml5();	

/** Events **/
$('#btn-new-ticket').click( function() {
	$('#new-ticket-wrapper').slideToggle("fast","linear")
})

$('#btn-close-ticket').click( function() {
	$('#new-ticket-wrapper').slideToggle("fast","linear")
});

$('#new-ticket-form').validate({
                focusInvalid: false, 
                ignore: "",
                rules: {
                    txtSubject: {
                        minlength: 2,
                        required: true
                    },
                    txtDept: {
						minlength: 2,
                        required: true,
                    },
                    txtMessage: {
                        required: true
                    }
                },

                invalidHandler: function (event, validator) {
					//display error alert on form submit    
                },

                errorPlacement: function (label, element) { // render error placement for each input type   
					$('<span class="error"></span>').insertAfter(element).append(label)
                    var parent = $(element).parent();
                    parent.removeClass('success-control').addClass('error-control');  
                },

                highlight: function (element) { // hightlight error inputs
                    var parent = $(element).parent();
                    parent.removeClass('success-control').addClass('error-control'); 
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    
                },

                success: function (label, element) {
					var parent = $(element).parent();
					parent.removeClass('error-control').addClass('success-control'); 
                },

			    submitHandler: function(form) {
					$('#new-ticket-wrapper').slideToggle("fast","linear");
				}
            });	

	$('.grid .actions a.remove').on('click', function () {
            var removable = jQuery(this).parents(".grid");
            if (removable.next().hasClass('grid') || removable.prev().hasClass('grid')) {
                jQuery(this).parents(".grid").remove();
            } else {
                jQuery(this).parents(".grid").parent().remove();
            }
    });

    // Expand/collapse ticket details with ARIA updates and chevron rotation
    $('.grid .clickable').on('click', function (e) {
        // allow direct clicks on inner buttons to work separately
        if ($(e.target).closest('.toggle-btn').length) return;
        var grid = jQuery(this).parents('.grid');
        var el = grid.children('.grid-body');
        var bodyId = this.getAttribute('aria-controls');
        var expanded = this.getAttribute('aria-expanded') === 'true';
        el.slideToggle(200);
        // toggle attributes and icon after animation
        $(el).promise().done(function(){
          var newExpanded = !expanded;
          jQuery(e.currentTarget).attr('aria-expanded', newExpanded);
          var btn = jQuery(e.currentTarget).find('.toggle-btn');
          btn.attr('aria-expanded', newExpanded);
          btn.find('.toggle-icon').toggleClass('open', newExpanded);
        });
    });

    // Also handle clicks on the explicit toggle button (chevron)
    $(document).on('click', '.toggle-btn', function (e) {
       e.stopPropagation();
       var btn = $(this);
       var controls = btn.attr('aria-controls');
       var target = $('#' + controls);
       var expanded = btn.attr('aria-expanded') === 'true';
       target.slideToggle(200);
       var newExpanded = !expanded;
       btn.attr('aria-expanded', newExpanded);
       btn.closest('.clickable').attr('aria-expanded', newExpanded);
       btn.find('.toggle-icon').toggleClass('open', newExpanded);
    });

    // Open ticket details in a modal when the view action is clicked
    $(document).on('click', '.view.open-modal', function (e) {
        e.preventDefault();
        var btn = $(this);
        var ticketId = btn.data('ticket-id');
        var grid = btn.closest('.grid');
        var title = grid.find('h4.semi-bold').first().text().trim();
        var body = grid.find('.grid-body').first().html();
        if (!body) body = '<p>No details available.</p>';
        $('#ticketModalLabel').text(title + ' — Ticket #' + ticketId);
        $('#ticketModalBody').html(body);
        $('#ticketModal').modal('show');
    });
});