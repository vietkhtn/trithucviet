$(function() {
    // Add/Update Cover Photo
    $('.add-cover-photo').on('click', function(){
        $('.add-cover-options').toggle();
    })

    $(document).mouseup(function(e) {
        var container = new Array();
        container.push('.add-cover-options');

        $.each(container, function(key, value) {
            if (!$(value).is(e.target) && $(value).has(e.target).length === 0){
                $(value).hide();
            }
        })
    })

    $('#cover-photo-upload').on('change', function(event){
        const formData = new FormData();
        formData.append("image", event.target.files[0]);
        fetch('https://api.imgbb.com/1/upload?key=a2f29c71dfc89ddf047715b1be2d96ea', {
                method: 'post',
                body: formData
            }).then(data => data.json()).then(data =>{
                if (data != null) {
                    $.post('http://localhost/stackoverflow_v1/core/ajax/coverPhoto.php', {  
                                imageUrl: data.data.url, 
                                userId: userId
                            }, function(data) {

                    })
                    $.ajax({
                        url: 'http://localhost/stackoverflow_v1/core/ajax/coverPhoto.php', 
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: formData,
                        type: 'post',
                        success: function(data){
                            $('.profile-cover-wrap').css('background-image','url(' + data + ')');
                            $('.add-cover-options').hide();
                        }
                    })
                }
            });
    })

    // Add/Update Profile Photo
    $('#profile-photo-upload').on('change', function(event){
        const formData = new FormData();
        formData.append("image", event.target.files[0]);
        fetch('https://api.imgbb.com/1/upload?key=a2f29c71dfc89ddf047715b1be2d96ea', {
                method: 'post',
                body: formData
            }).then(data => data.json()).then(data =>{
                if (data != null) {
                    $.post('http://localhost/stackoverflow_v1/core/ajax/profilePhoto.php', 
                    {  
                        imageUrl: data.data.url, 
                        userId: userId
                    }, function(data) {
                        
                    })
                    $.ajax({
                        url: 'http://localhost/stackoverflow_v1/core/ajax/profilePhoto.php', 
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: formData,
                        type: 'post',
                        success: function(data1){
                            console.log(data1);
                            $('.profile-pic-me').attr('src', '' + data1 + '');
                            $('.my-icon-ask').attr('src', '' + data1 + '');
                            $('.user-image-pic').attr('src', '' + data1 + '');
                            location.reload();
                        }
                    })
                }
            });
    })

    // Shorten question content
    questionContents = document.querySelectorAll(".nf-4");
    questionContents.forEach(item => {
        if (item.innerText.length > 200) {
            item.innerText = item.innerText.substr(0, 200) + '...';
        }else{
            item.innerText = item.innerText;
        }   
    })

    // Display dynamic label in stat container
    // Vote
    let votes = document.getElementsByClassName('question-vote');
    for(var i = 0; i < votes.length; i++){
        if (parseInt(votes[i].children[0].innerText) <= 1){
            votes[i].children[1].innerText = "vote";
        }else{
            votes[i].children[1].innerText = "votes";
        }
    }

    // Answer
    let answers = document.getElementsByClassName('question-answer');
    let listAnswer = new Array();
    for(var i = 0; i < answers.length; i++){
        listAnswer.push(answers[i]);
    }

    for(var i = 0; i < listAnswer.length; i++){
        if (parseInt(listAnswer[i].children[0].innerText) < 1){
            listAnswer[i].children[1].innerText = "answer";
        }else if(parseInt(listAnswer[i].children[0].innerText) == 1){
            listAnswer[i].children[1].innerText = "answer";
            listAnswer[i].className = "question-answered";
        }else{
            listAnswer[i].children[1].innerText = "answers";
            listAnswer[i].className = "question-answered";
        }
    }

    // Spam
    let spams = document.getElementsByClassName('question-spam');
    let listSpam = new Array();
    for(var i = 0; i < spams.length; i++){
        listSpam.push(spams[i]);
    }

    for(var i = 0; i < listSpam.length; i++){
        if (parseInt(listSpam[i].children[0].innerText) == 0){
            listSpam[i].children[1].innerText = "spam";
        }else if(parseInt(listSpam[i].children[0].innerText) == 1) {
            listSpam[i].children[1].innerText = "spam";
            listSpam[i].className = "question-isspam";
        }else{
            listSpam[i].children[1].innerText = "spams";
            listSpam[i].className = "question-isspam";
        }
    }

})