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
                console.info("data: ", data);
            },
            
            error: function (err) {
                console.error("error: ", err);
            }
        });
    });
})();

