/* Nofication Close Buttons */
$('.notification a.close').click(function(e){
	e.preventDefault();

	$(this).parent('.notification').fadeOut();
});

/*
	Check All Feature
*/
$(".check-all").click(function(){
	$("table input[type=checkbox]").attr('checked', $(this).is(':checked'));
});

/*
	Dropdowns
*/
$('.dropdown-toggle').dropdown();

/*
	Set focus on the first form field
*/
$(":input:visible:first").focus();

/*
	Responsive Navigation
*/
$('.collapse').collapse();

/*
 Prevent elements classed with "no-link" from linking
*/
//$(".no-link").click(function(e){ e.preventDefault();	});

$(".summernote").summernote({
	height:200,
	toolbar: [
	    //[groupname, [button list]]
	     
	    ['style', ['bold', 'italic', 'underline', 'clear']],
	    ['insert', ['picture', 'link', 'table', 'hr']],
	    ['fontsize', ['fontsize']],
	    ['color', ['color']],
	    ['para', ['ul', 'ol', 'paragraph']],
	    ['height', ['height']],
	    ['codeview',['codeview']]
	  ],
	  codemirror: { // codemirror options
	      theme: 'monokai'
	    }
	});