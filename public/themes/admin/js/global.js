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
	onImageUpload: function(files, editor, welEditable) {
	    sendFile(files[0], editor, welEditable);
	},
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

function sendFile(file, editor, welEditable) {
      data = new FormData();
      data.append("image", file);
      data.append("ci_csrf_token",csfrData['ci_csrf_token']);
      $.ajax({
          data: data,
          type: "POST",
          url: "/admin/content/pages/upload_image",
          cache: false,
          contentType: false,
          processData: false,
          success: function(url) {
          	var data = JSON.parse(url);
              editor.insertImage(welEditable, "/assets/images/"+data.file_name);
          }
      });
  }