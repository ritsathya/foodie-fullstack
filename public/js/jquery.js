$(function () {
    var i = 0;
    $("#add").on("click", function () {
        i++;
        $("#dynamic_field").append(`
        <tr id="row${i}" class="dynamic-added">
          <td><input type="text" name="ingredients[${i}][name]" placeholder="Ingredient name" class="border-2 p-1 mr-2 mb-2 rounded-md" required/></td>  
          <td><input type="text" name="ingredients[${i}][amount]" placeholder="Amount" class="border-2 p-1 mb-2 rounded-md" required/></td>
          <td>
            <button type="button" name="remove" id="${i}" class="bg-red-400 ml-2 py-1 px-2 rounded btn_remove"><i class="fas fa-trash-alt"></i></button>
          </td>
        </tr>`);
    });

    $(document).on("click", ".btn_remove", function () {
        var button_id = $(this).attr("id");
        $("#row" + button_id + "").remove();
    });

    var userId = window.userId

    window.Echo.private(`App.Models.User.${userId}`)
              .notification((notification) => {
                  console.log(notification.message);
                  var notification_icon = $('#notify-bell');
                  var notification_body = $('#notify-body');
                  var old_notification = notification_body.html();

                  notification_icon.html(`<i class="fas fa-bell" style="color:red;"></i>`);
                  notification_body.html(`<li><i class="fas fa-comment-alt mr-1"></i><span> ${notification.message}</span</li>` + old_notification);

                });
});
