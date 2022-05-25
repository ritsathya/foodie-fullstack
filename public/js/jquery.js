$(function () {
  $('input[type=checkbox]').removeAttr('checked');
  
  var i=0;  
  $('#add').on('click', function(){  
        i++;  
        $('#dynamic_field').append(`
        <tr id="row${i}" class="dynamic-added">
          <td><input type="text" name="ingredients[${i}][name]" placeholder="Ingredient name" class="border-2 p-1 mr-2 mb-2 rounded-md" required/></td>  
          <td><input type="text" name="ingredients[${i}][amount]" placeholder="Amount" class="border-2 p-1 mb-2 rounded-md" required/></td>
          <td>
            <button type="button" name="remove" id="${i}" class="bg-red-400 ml-2 py-1 px-2 rounded btn_remove"><i class="fas fa-trash-alt"></i></button>
          </td>
        </tr>`);  
  });  

  $(document).on('click', '.btn_remove', function(){  
        var button_id = $(this).attr("id");   
        $('#row'+button_id+'').remove();  
  });  
})
