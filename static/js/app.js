(function () {
    console.info("--- app init ---");    
})();

function savePost(json) {
    return new Promise(function (resolve, reject) {
        var content = json.content;
        var category = json.category;
        if (!content.trim() || !category) {
            return reject();  
        }        
        
        var data =  {
            id: json.id,
            content: content,
            category: category
        };
        
        if (json.parent) {
            data.parent = json.parent;
        }

        $.ajax({
            type: "POST",
            url: "index.php?r=api/post_create",
            data: data,

            success: function(data){
                resolve(data);
            },

            error: function (err) {
                reject(err);
            }
        });
    });
}

function readPost(id) {
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

function openPost(postId) {   
    readPost(postId)
    .then(function (data) {
        $("#mj-post-view").html(data);
        $("#postViewModal").modal();
        $("#form-post-parent-post_reply_12").val(postId);
    });
}

