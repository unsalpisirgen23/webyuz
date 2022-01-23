"use strict";

jQuery(document).ready(function(){
    jQuery('#quickDrafting').click(function(e){
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "{{ url('/grocery/post') }}",
            method: 'post',
            data: {
                name: jQuery('#name').val(),
                type: jQuery('#type').val(),
                price: jQuery('#price').val()
            },
            success: function(result){
                jQuery('.alert').show();
                jQuery('.alert').html(result.success);
            }});
    });
});

