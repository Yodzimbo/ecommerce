$(document).ready(function () {

    function refreshSmallBasket(){

        $.ajax({
            url: '/mod/basket_small_refresh.php',
            dataType: 'json',
            success:function (data) {
                $.each(data, function (k, v) {
                    $("#basket_left ." + k + "span").text(v);
                });
            },
            error: function (data) {
                alert("Błąd AJAX");
            }
        });

    }

    if($(".add_to_basket").length > 0)
    {
        $(".add_to_basket").click(function () {

            var trigger = $(this);
            var param = trigger.attr("rel");
            var item = param.split("_");

            $.ajax({
                type: 'post',
                url: '/mod/basket.php',
                dataType: 'json',
                data: ({id : item[0], job : item[1]}),
                success:function (data) {
                    var new_id = item[0] + '_' + data.job;
                    if (data.job != item[1]) {
                        if (data.job == 0) {
                            trigger.attr("rel", new_id);
                            trigger.text("Remove from basket");
                            trigger.addClass("red");
                        } else {
                            trigger.attr("rel", new_id);
                            trigger.text("Add to basket");
                            trigger.removeClass("red");
                        }
                        refreshSmallBasket();
                    }
                },
                error: function (data) {
                    alert("Błąf AJAX");
                }
            });
            return false;
        })
    }

});