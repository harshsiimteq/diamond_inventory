$("#search_table").keyup(function(){
       _this = this;
       // Show only matching TR, hide rest of them
       $.each($("#searchtable tbody tr"), function() {
         console.log('aaa');
       if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
           $(this).hide();
           else
           $(this).show();
       });
     });
