(function () {
    $("#cat_not_found").hide();

    $("#mj-composer-upload-img").on("click", function () {
        $("#form_upload_file").click();
    });

    $("#mj-save-post").on("click", function () {
        var htmlBuffer = $("#mj-composer-editor").html();
        console.info(htmlBuffer);
    });

    $("#form_upload_file").change(function(){
        var form = $("#mj-composer-form _csrf");
        var fd = new FormData();
        fd.append("ImgUpload[file]", $("#form_upload_file")[0].files[0]);
        fd.append("X-CSRF-Token", $("#mj-composer-form input[name=_csrf]").val());
        fd.append("X-Requested-With", "XMLHttpRequest");

        $.ajax({
            type: "POST",
            url: "index.php?r=api/upload",
            data: fd,
            processData: false,
            contentType: false,

            success: function(data){
                var json = JSON.parse(data);                
                var id = json.id;
                var name = json.name;
                $("#mj-composer-editor").append('<div class="mj-post-img" data-img="'+name+'" id="mj'+id+'"><center><img src="'+json.path+'" /></center></div><br/>');
            },

            error: function (err) {
                console.error("error: ", err);
            }
        });
    });

    $("body").on("click", "#mj-composer-editor .mj-post-img img", function () {
        if (!confirm("Delete this?")) return;

        var elementId = $(this).parent().parent().attr("id");
        var image = $(this).parent().parent().attr("data-img");

        $.get("index.php?r=api/remove&file="+image)
        .then(function (d) {
            console.info(d);
            $("#"+elementId).remove();
        });
    });
    
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

                LogCategory();
                
                // TODO: do not duplicate this node
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
})();

function LogCategory() {
    console.info({
        id: $("#mj_category_id").text(),
        name: $("#mj_category_name").text()
    });
}

