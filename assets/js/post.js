$(function() {  
    //1. ========================== Create Question Post Area =======================================
    
    // Open/Close post question form when click Ask Question button
    $('.ask-question-button').on('click', function(){
        if (document.getElementById('question-post').style.display === '' || document.getElementById('question-post').style.display === 'none'){
            $('.profile-question-post').show('0.5');
        }
        else {
            $('.profile-question-post').hide('0.5');
        }
    })

    // Set font-size questionText 
    $('#questionText').contents().find('body').css('font-size','12px');

    // Wrap tag when spacebar
    var tagInput = document.getElementById('questionTags');
    var firstCharTagStart = 0;
    var firstCharTagArray = new Array();
    firstCharTagArray.push(firstCharTagStart);
    var tagArray = new Array();
    var tagInput = document.getElementById('questionTags');
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

    //Handle post question click
    $('.ask-button').on('click', function(){
        var title = document.getElementById('questionTitle').value;
        var listTag = document.getElementsByClassName('tag-name-wrapper');
        var iframe = document.getElementById('questionText');
        var content = iframe.contentWindow.document.body.innerHTML;
        var contentText = iframe.contentWindow.document.body.innerText;
        var tags = new Array();
        for (var i = 0; i < listTag.length; i++) {
            tags.push(listTag[i].innerText);
        }
        //Call API check Bad Word in content
        // If content contains words -> check words in content

        if(contentText != ""){
            $.ajax({
                url: 'https://checkbadwordapi.herokuapp.com/check/' + contentText,
                type: 'GET',
                headers: {
                    "accept": "application/json",
                    "api-key": "Y2hlY2tiYWR3b3JkYXBpa2V5"
                },
                success: function (data) {
                    // if content contains bad words -> alert error
                    if (data.is_bad == true){
                        alert("Question contains " + data.total_bad_word +" unsuitable words: [" + data.list_of_bad_words + "].\nPlease re-check the content.")
                    } 
    
                    // else if content is good -> store in db
                    else {
                        var formData = new FormData();
                        formData.append('questionTitle', title);
                        formData.append('questionTags', tags);
                        formData.append('questionContent', content);
                        formData.append('userId', userId);
                    }
                },
                error: function(){
                    alert("Error: Cannot load data");
                }
            })
        }
        // else if content just include image
        else {
            alert("Your question should contain body content. Please write the body !");
        }
    })

    //2. ========================== Questions Post Timeline Area =======================================
    
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

    // Post Stats Container

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