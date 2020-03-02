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

$(document).on('click','.pagination li', function(e){
   e.preventDefault();
   var current_page = 0;
   var new_page = 0;
   var pageId = 0;
   var id = $(this).attr("id");
   if(id == "previous-page" || id == "next-page"){
      if(id == "next-page"){
         current_page = $("#current_page").val();
         total_pages = $('#total_pages').val();
         if(current_page == total_pages){
            return false;
         }
         $('.pagination li').removeClass('active');
         new_page = parseInt(current_page) + parseInt(1);
         $('.pageId-'+new_page).addClass('active');
         pageId = new_page;
      }
      else{
         current_page = $("#current_page").val();
         if(current_page == 1){
            return false;
         }
         $('.pagination li').removeClass('active');
         new_page = parseInt(current_page) - parseInt(1);
         $('.pageId-'+new_page).addClass('active');
         pageId = new_page;
      }
   }
   else{
      $('.pagination li').removeClass('active');
      $(this).addClass('active');
      pageId = $(this).text();
      new_page = parseInt(pageId);
   }
   var offset = parseInt(pageId-1)*9;
   var termId = $('#term_id').val();
   $("#current_page").val(new_page);
   $.ajax({
      type : "post",
      url : myAjax.ajaxurl,
      data : {action: "generate_tutorials_html",offset:offset,termId:termId},
      success: function(response) {
         if($.trim(response) != ""){
            $('.video-container').html('');
            $('.video-container').append(response);
         }
         return false;
      }
   })
   return false;
});

$('.checkboxTutorials').change(function(){
   var termId = "";
   if($(this).is(':checked')){
      if($(this).hasClass("allTutorials")){
         $('.checkboxTutorials').prop("checked", false);
         $(this).prop("checked", true);
      }
      else{
         $('.allTutorials').prop("checked", false);
         $(this).prop("checked", true);
      }
   }
   else{
      if($(this).hasClass("allTutorials")){
         $(this).prop("checked", true);
      }
      if($('.checkboxTutorials:checked').length == 0){
         $('.allTutorials').prop("checked", true);
      }
   }
   
   $('.checkboxTutorials:checked').each(function(){
      termId = termId + $(this).data('value') + ',';
   });

   termId = termId.replace(/,\s*$/, "");
   $.ajax({
      type : "post",
      url : myAjax.ajaxurl,
      data : {action: "generate_tutorials_checkbox_html",termId:termId},
      success: function(response) {
         if($.trim(response) != ""){
            $('.video-listing-block').html('');
            $('.video-listing-block').append(response);
         }
         return false;
      }
   })
   return false;
});

