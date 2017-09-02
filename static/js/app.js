(function () {
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
    
    $("body").on("click", "#mj-composer-editor .mj-post-img", function () {
        if (!confirm("Are you sure?")) return;

        var elementId = $(this).attr("id");
        var image = $(this).attr("data-img")

        $.get("index.php?r=api/remove&file="+image)
        .then(function (d) {
            console.info(d);
            $("#"+elementId).remove();
        });
    });
})();

