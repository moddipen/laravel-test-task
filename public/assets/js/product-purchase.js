$(document).ready( function () {
    $(document).on('click', '.purchase', function(e){
        e.preventDefault();
        var element = $(this).prev('input');
        if($(this).prev('input').val() > 0){
            $.ajax({
                type:'POST',
                url: $(this).attr('href'),
                data: {
                    "_token": $('meta[name="csrf-token"]').attr('content'),
                    "qty" : element.val(),
                    "product_id" : $(this).attr('data-id'),
                },  
                success:function(data) {
                    $('.custom-message').html('<div class="alert alert-success">Product purchased successfully</div>');    
                    element.val("");  
                    window.location.reload();          
                }
            });    
        }               
    });
});