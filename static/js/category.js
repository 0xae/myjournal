(function (){
    $("#cat_not_found").hide();

    $("body").on("click", "a.mj-category-option", function () {
        var id = $(this).attr("data-category-id");
        var name = $(this).attr("data-category-name");

        $("#mj_category_id").text(id);
        $("#mj_category_name").text(name);
        $("#mj_category_label").text(name);

        LogCategory();
    });

    $("#mj_category_filter").on("keyup", function () {
        var query = $(this).val();
        var found = false;
        $(".mj-category-index").each(function (el) {
            if ($(this).attr("data-category-name").indexOf(query) == -1) {
                $(this).hide();
            } else {
                found = true;
                $(this).show();
            }
        });
        
        if (!found) {
            $("#cat_not_found").show();
        } else {
            $("#cat_not_found").hide();
        }
    });
    
    $("#mj_create_category").on("click", function () {
        var catName = encodeURIComponent($("#mj_category_filter").val());
        $.ajax({
            type: "GET",
            url: "index.php?r=api/category&name=" + catName,
            success: function (data){
                var json = JSON.parse(data);                
                var id = json.id;
                var name = json.name;

                $("#mj_category_id").text(id);
                $("#mj_category_name").text(name);
                $("#mj_category_label").text(name);
                $("#cat_not_found").hide();

                LogCategory();
                
                // TODO: do not append this node if it's already there
                var tpl = '<li class="mj-category-index" data-category-name="'+name+'>" id="mj-category-'+id+'">'+
                    '<a style="border-top: 1px solid #ccc" href="#"'+
                        'class="mj-category-option"'+
                        'data-category-id="'+id+'"'+
                        'data-category-name="'+name+'">'+
                        name +
                    '</a>'+
                '</li>';
                $("#mj-category-menu").append(tpl);                
            },

            error: function (err) {
                console.error("error: ", err);
            }
        });
    });
    
    function getCurrentCategory() {
        var d= {
            id: $("#mj_category_id").text(),
            name: $("#mj_category_name").text()
        };

        if (!d.id || !d.name) {
            throw Error("Bad category " + JSON.stringify(d));
        }

        return d;
    }    

    function LogCategory() {
        console.info(getCurrentCategory());
    }

    var module = function () {
        return {
            logCategory: LogCategory,
            getCurrentCategory: getCurrentCategory
        }
    };

    window.CategoryModule = module;
    return module;
})();

