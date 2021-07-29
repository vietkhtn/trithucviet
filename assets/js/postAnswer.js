$(function() {
    //Handle post answer click
    $('.answer-button').on('click', function(){
        var iframe = document.getElementById('postText');
        var content = iframe.contentWindow.document.body.innerHTML;
        var contentText = iframe.contentWindow.document.body.innerText;
        // Call API check Bad Word in content
        // If content contains words -> check words in content
        if(contentText != ""){
            $.ajax({
                url: 'https://checkbadwordapi.herokuapp.com/check/' + encodeURIComponent(contentText),
                type: 'GET',
                headers: {
                    "accept": "application/json",
                    "api-key": "Y2hlY2tiYWR3b3JkYXBpa2V5"
                },
                success: function (data) {
                    // if content contains bad words -> alert error
                    if (data.is_bad == true){
                        alert("Answer contains " + data.total_bad_word +" unsuitable words: [" + data.list_of_bad_words + "].\nPlease re-check the content.")
                    } 
                    // else if content is good -> store in db
                    else {
                        var formData = new FormData();
                        formData.append('userId', userId);
                        formData.append('questionId', questionId);
                        formData.append('answerContent', contentText);
                        $.ajax({
                            url: 'http://localhost/trithucviet/core/ajax/postAnswer.php', 
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: formData,
                            type: 'post',
                            success: function(){
                                location.reload();
                            }
                        })
                    }
                },
                error: function(){
                    alert("Error: Cannot load data");
                }
            })
        }
        // else if content just include image
        else {
            alert("Your answer should contain body content. Please write the body !");
        }
    })
})