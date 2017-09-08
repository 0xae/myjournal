(function (){
    function destroyComposer() {
        $("#mj-composer-editor").text("Write...");
        $("#composerModal").modal('hide');
    }
    
    function getPost(id) {
        return $.ajax({
            type: "GET",
            url: "index.php?r=api/post_view&id="+id
        });
    }

    $("#mj-composer-upload-img").on("click", function () {
        $("#form_upload_file").click();
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
                $("#mj-composer-editor").append('<div class="mj-post-img" data-img="'+name+'" id="mj'+id+'"><img style="max-width:500px;max-height:500px;" src="'+json.path+'" /></div><br/>');
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

    $("#mj-save-post").on("click", function () {
        var htmlBuffer = $("#mj-composer-editor").html().trim();
        var category = CategoryModule().getCurrentCategory().id;
        if (!htmlBuffer || htmlBuffer == 'Write...') return;  

        $.ajax({
            type: "POST",
            url: "index.php?r=api/post",
            data: {
                content: htmlBuffer,
                category: category
            },

            success: function(data){
                destroyComposer();
                var json = JSON.parse(data);
                
                setTimeout(function (){
                    getPost(json.id)
                    .then(function (data) {
                        console.info("stream-data: %o", data);
                        $("#mj-timeline-ref").append(data);
                    });
                }, 1500);
            },

            error: function (err) {
                console.error("error: ", err);
            }
        });
    });
})();
