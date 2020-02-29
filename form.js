$("#view-more-case-studies").click( function(e) {
   e.preventDefault(); 
   var offset = $('#offsetValue').val();
   var termId = $('#term_id').val();
   $.ajax({
      type : "post",
      url : myAjax.ajaxurl,
      data : {action: "generate_case_studies_html",offset:offset,termId:termId},
      success: function(response) {
         if($.trim(response) != ""){
            $('.case-studies-listing').append(response);
            offset = parseInt(offset) + parseInt(4);
            $('#offsetValue').val(offset);
         }
         else{
            $("#view-more-case-studies").hide();
         }
         return false;
      }
   })   
});

$(".casestudyLink").click(function(e){
   e.preventDefault(); 
   var offset = 0;
   $(".tab-item").removeClass("active");
   $(this).parent().addClass("active");
   var termId = $(this).data('value');
   $('#offsetValue').val(0);
   $('#term_id').val(termId);
   $.ajax({
      type : "post",
      url : myAjax.ajaxurl,
      data : {action: "generate_case_studies_html",offset:offset,termId:termId},
      success: function(response) {
         if($.trim(response) != ""){
            $('.case-studies-listing').html('');
            $('.case-studies-listing').append(response);
            $("#view-more-case-studies").show();
            offset = parseInt(offset) + parseInt(4);
            $('#offsetValue').val(offset);
         }
         else{
            $("#view-more-case-studies").hide();
         }
         return false;
      }
   })
   return false;

});

