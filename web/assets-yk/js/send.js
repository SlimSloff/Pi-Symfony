"use strict"; 
$(document).on( 'ready', function() { 
    $("#contact_form").submit(function(){ 
        var form = $(this); 
        var error = false;
        form.find('input').each( function(){
            if ($(this).val() == '') {  
                error = true; 
            }
        });
        if (!error) { 
            var data = form.serialize(); 
            $.ajax({ 
               type: 'POST', 
               url: 'scripts/send.php',
               dataType: 'json', 
               data: data, 
               beforeSend: function(data) { 
                    form.find('input[type="submit"]').attr('disabled', 'disabled'); 
                  },
               success: function(data){ 
                    if (data['error']) { 
                        (data['error']); 
                    } else { 
                        $("#messegeResult button").fadeOut('fast');
                        setTimeout(function(){
                          $('#messegeResult p').fadeIn('slow')},200);           
                        setTimeout(function(){
                          $('#messegeResult p').fadeOut('slow')},3000); 
                        setTimeout(function(){
                          $('#messegeResult button').fadeIn('slow')},3500); 
                        $('#contact_form')[0].reset();
                    }
                 },
               error: function (xhr, ajaxOptions, thrownError) { 
                    alert(xhr.status); 
                    alert(thrownError);
                 },
               complete: function(data) { 
                    form.find('input[type="submit"]').prop('disabled', false); 
                 }
                          
                 });
        }
        return false; 
    });

$("#contact_form_footer").submit(function(){ 
        var form = $(this); 
        var error = false;
        form.find('input').each( function(){
            if ($(this).val() == '') {  
                error = true; 
            }
        });
        if (!error) { 
            var data = form.serialize(); 
            $.ajax({ 
               type: 'POST', 
               url: 'scripts/send_footer.php',
               dataType: 'json', 
               data: data, 
               beforeSend: function(data) { 
                    form.find('input[type="submit"]').attr('disabled', 'disabled'); 
                  },
               success: function(data){ 
                    if (data['error']) { 
                        (data['error']); 
                    } else { 
                        $("#messegeResultFooter button").fadeOut('fast');
                        setTimeout(function(){
                          $('#messegeResultFooter p').fadeIn('slow')},200);           
                        setTimeout(function(){
                          $('#messegeResultFooter p').fadeOut('slow')},3000); 
                        setTimeout(function(){
                          $('#messegeResultFooter button').fadeIn('slow')},3500); 
                        $('#contact_form_footer')[0].reset();
                    }
                 },
               error: function (xhr, ajaxOptions, thrownError) { 
                    alert(xhr.status); 
                    alert(thrownError);
                 },
               complete: function(data) { 
                    form.find('input[type="submit"]').prop('disabled', false); 
                 }
                          
                 });
        }
        return false; 
    });
});