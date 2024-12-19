$(document).ready(function() {
    
    $(document).on('change', '#type', function () {
        var countryID = $(this).val();
        var formData = {
            'type': countryID,
    
        };
        if (countryID) {
            $.ajax({
                type: 'POST',
                url: 'backend-scripts.php',
                data: formData,
                success: function (result) {
                    
                    $('#treatment').html(result);
                    
                   
                    
     
                }
            });
        } else {
            $('#treatment').html('<option value=""> No Treatment Available</option>');
            $('#editor').html("This is editor");

    
        }
    });
    $(document).on('change', '#treatment', function () {
        var countryID = $(this).val();
        var formData = {
            'treatment': countryID,
    
        };
       
        if (countryID) {
            $.ajax({
                type: 'POST',
                url: 'backend-scripts.php',
                data: formData,
                success: function (result) {
                   
                    
                    tinyMCE.activeEditor.setContent(result);
                  
                   
                    
    
                }
            });
        } else {
           
            tinyMCE.activeEditor.setContent("This is editor");

    
        }
    });
    $(document).on('change', '#aesthatic', function () {
        var countryID = $(this).val();
        var formData = {
            'aesthatic': countryID,
    
        };
       
        if (countryID) {
            $.ajax({
                type: 'POST',
                url: 'backend-scripts.php',
                data: formData,
                success: function (result) {
                   
                    $("#editor").html(result);
                    tinyMCE.activeEditor.setContent(result);
                  
                   
                    
    
                }
            });
        } else {
           
            tinyMCE.activeEditor.setContent("This is editor");

    
        }
    });
    
  
})

