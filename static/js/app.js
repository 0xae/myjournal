(function (){
    $("#mj-composer-upload-img").on("click", function () {
        console.info("upload img");
    });

    $("#mj-save-post").on("click", function () {
        var htmlBuffer = $("#mj-composer-editor").html();
        console.info(htmlBuffer);
    });

    function uploadFile(){
        var fd = new FormData();
        var e = document.getElementById("Model_logo");
        fd.append("Model[logo]", $(e)[0].files[0]);

        $.ajax({
            url: 'index.php?r=api/uploadimg',
            type: 'POST',
            cache: false,
            data: fd,
            processData: false,
            contentType: false,
            success: function (data) { 
                console.info("yeeee");
            },

            error: function (e) {
                console.error("yeeee");
            }
        });
    }
})();
