(function (){
    function buildMedia() {
        var images = $(".mj-post .mj-post-content .mj-post-img img");
        var MAX=6;
    
        images.each(function (){
            if (MAX <= 0) return false;
            var src = $(this).attr("src");
            var postId = $(this).parent().parent().attr("data-post-id");
            var tpl =  '<div class="mj-media" data-post-id="'+postId+'" style="display: inline;margin: 2px;margin-bottom:12px;">'+
                '<a href="javascript:void(0)"><img src="'+src+'" width="90" height="90" style="margin: 2px;" /></a>'+
            '</div>';

            $("#mj-media-listing").append(tpl);
            MAX--;
        });
    }
    
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

    $("body").on("click", "#mj-timeline .mj-post", function () {
        var postId = $(this).attr("data-post-id");
        openPost(postId);
    });

    $("body").on("click", ".mj-media", function () {
        var postId = $(this).attr("data-post-id");
        openPost(postId);
    });
    
    buildMedia();
})();
