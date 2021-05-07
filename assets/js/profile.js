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

     // Edit Question function
    const editTextButtons = document.querySelectorAll('button.edit-content-button-css');
    questionText.document.designMode = "On";
    let showCode = false;
    for( let i = 0; i< editTextButtons.length; i++) {
        editTextButtons[i].addEventListener('click', () => {
            let cmd = editTextButtons[i].getAttribute('data-cmd');
            if (editTextButtons[i].name === "active"){
                editTextButtons[i].classList.toggle('active');
            }
            // Open local upload image
            if(cmd === "insertImage"){
                // open upload local
                $('#uploadImage').click();

                 // Upload image to imgBB API
                $('#uploadImage').off("change").on("change", function(event){ // fix bug exec multi pics when second insert image
                    const formData = new FormData();
                    formData.append("image", event.target.files[0]);
                    fetch('https://api.imgbb.com/1/upload?key=a2f29c71dfc89ddf047715b1be2d96ea', {
                            method: 'post',
                            body: formData
                        }).then(data => data.json()).then(data =>{
                            if (data != null) {
                                questionText.document.execCommand(cmd, false, data.data.url); // render image from API
                                const images = questionText.document.querySelectorAll('img');
                                images.forEach(item =>{
                                    item.style.maxWidth = "400px";
                                    item.style.maxHeight = "400px";
                                })
                            }
                        });
                    });
            }
            // Open link upload link
            else if(cmd === "createLink"){
                let url = prompt('Enter link here: ', '');
                questionText.document.execCommand(cmd, false, url);
                const links = questionText.document.querySelectorAll('a');
                links.forEach(item =>{
                    item.target = "_blank";
                    item.addEventListener('mouseover', ()=> {
                        questionText.document.designMode = "Off";
                    })
                    item.addEventListener('mouseout', ()=> {
                        questionText.document.designMode = "On";
                    })
                })
            }
            // Show code 
            else if(cmd === "showCode") {
                const textBody = questionText.document.querySelector('body');
                if(showCode){
                    textBody.innerHTML = textBody.textContent;
                    showCode = false;
                }else {
                    textBody.textContent = textBody.innerHTML;
                    showCode = true;
                }
            }
            else{
                questionText.document.execCommand(cmd, false, null);
            }
        })
    }

    // Set font-size questionText 
    $('#questionText').contents().find('body').css('font-size','12px');

    // Wrap tag when spacebar
    var tagInput = document.getElementById('questionTags');
    var firstCharTagStart = 0;
    var firstCharTagArray = new Array();
    firstCharTagArray.push(firstCharTagStart);
    var tagArray = new Array();
    tagInput.addEventListener('keyup', function(e){
        if (e.keyCode == 32){ // spacebar
            var textContentLen = tagInput.value.length;
            var textContentLenBeforeSpacebar = textContentLen - 1;        
            
            // Create tag under tag input
            var inputString = document.getElementById('questionTags').value;
            var tag = inputString.substring(firstCharTagStart,textContentLenBeforeSpacebar);
            if (tag != '') {
                tagArray.push(tag);
                var wrapper = document.createElement("div");
                wrapper.className = "tag-name-wrapper";
                wrapper.innerHTML = tag;
                document.getElementById("tag-space-container").appendChild(wrapper);
            }
            
            // update firstCharTagStart
            firstCharTagStart = textContentLen;
            firstCharTagArray.push(firstCharTagStart);
        }
        if (e.keyCode == 8) { // backspace
            textContentLen = tagInput.value.length;
            textContentLenBeforeSpacebar = textContentLen - 1;
            for (i = firstCharTagArray.length; i >= 0; i--) {
                if (textContentLenBeforeSpacebar < firstCharTagArray[i] - 1){
                    firstCharTagArray.pop(firstCharTagArray[i]); 
                    tagArray.pop(tagArray[i]);
                    document.getElementsByClassName('tag-name-wrapper')[i-1].remove();
                }
            }
            if (firstCharTagArray.length > 0){
                firstCharTagStart = firstCharTagArray[firstCharTagArray.length - 1];
            }else{
                firstCharTagStart = 0;
            }
        }
    })

    // Open/Close post question form when click Ask Question button
    $('.ask-question-button').on('click', function(){
        if (document.getElementById('question-post').style.display === '' || document.getElementById('question-post').style.display === 'none'){
            $('.profile-questtion-post').show('0.5');
        }
        else {
            $('.profile-questtion-post').hide('0.5');
        }
    })

    //Handle post question click
    $('.ask-button').on('click', function(){
        var title = document.getElementById('questionTitle').value;
        var listTag = document.getElementsByClassName('tag-name-wrapper');
        var iframe = document.getElementById('questionText');
        var content = iframe.contentWindow.document.body.innerHTML;
        var tags = new Array();
        for (var i = 0; i < listTag.length; i++) {
            tags.push(listTag[i].innerText);
        }
        console.log(title, tags, content);
        var formData = new FormData();
        formData.append('questionTitle', title);
        formData.append('questionTags', tags);
        formData.append('questionContent', content);
        formData.append('userId', userId);

        $.ajax({
            url: 'http://localhost/stackoverflow_v1/core/ajax/postQuestion.php', 
            cache: false,
            contentType: false,
            processData: false,
            data: formData,
            type: 'post',
            success: function(postData){
                location.reload();
            }
        })
        
    })

    // Shorten question content
    questionContents = document.querySelectorAll(".nf-4");
    questionContents.forEach(item => {
        if (item.innerText.length > 200) {
            item.innerText = item.innerText.substr(0,200) + '...';
        }else{
            item.innerText = item.innerText;
        }   
    })
})