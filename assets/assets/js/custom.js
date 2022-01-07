$('#searchh').keyup(function(){
    var search = $(this).val();
    
    if(search!=''){
        $.ajax({
            url: 'ajaxsearch.php',
            type: 'post',
            data: {query: search},

            success: function(result){
                console.log(result);
                $('#append').html(result)
            }
        });
    }else{
        $('#append').html('')
    }
});


$('#download').click(function() {
    Swal.fire({
        icon: 'success',
        title: 'Download Successful',
        showConfirmButton: true,
        
      })
  });
