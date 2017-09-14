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
    
    function streamPost(id) {
        return $.ajax({
            type: "GET",
            url: "index.php?r=api/post_stream&id="+id
        });
    }
    
    function savePost(json) {
        return new Promise(function (resolve, reject) {
            var content = json.content;
            var category = json.category;
            if (!content.trim() || !category) {
                return reject();  
            }

            $.ajax({
                type: "POST",
                url: "index.php?r=api/post_create",
                data: {
                    id: json.id,
                    content: content,
                    category: category
                },

                success: function(data){
                    resolve(data);
                },

                error: function (err) {
                    reject(err);
                }
            });
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

        var elementId = $(this).parent().attr("id");
        var image = $(this).parent().attr("data-img");

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

        var newPost = {
            content: htmlBuffer,
            category: category
        };
        
        savePost(newPost)
        .then(function (data){
            destroyComposer();
            var json = JSON.parse(data);

            setTimeout(function (){
                streamPost(json.id)
                .then(function (data) {
                    $("#mj-timeline-ref").append(data);
                    localStorage.removeItem("_postBackup");
                });
            }, 700);
        }, function (error) {
            console.error("error: ", error);
        });
    });

    $("body").on("click", ".mj-post", function () {
        var postId = $(this).attr("data-post-id");

        getPost(postId)
        .then(function (data) {
            $("#mj-post-view").html(data);
            $("#postViewModal").modal();
        });
    });
})();
