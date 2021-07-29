$(function() {  
    // Set font-size postText 
    $('#postText').contents().find('body').css('font-size','13px');


    // Edit Post function
    const editTextButtons = document.querySelectorAll('button.edit-content-button-css');
    postText.document.designMode = "On";
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
                            postText.document.execCommand(cmd, false, data.data.url); // render image from API
                                const images = postText.document.querySelectorAll('img');
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
                postText.document.execCommand(cmd, false, url);
                const links = postText.document.querySelectorAll('a');
                links.forEach(item =>{
                    item.target = "_blank";
                    item.addEventListener('mouseover', ()=> {
                    postText.document.designMode = "Off";
                    })
                    item.addEventListener('mouseout', ()=> {
                    postText.document.designMode = "On";
                    })
                })
            }
            // Show code 
            else if(cmd === "showCode") {
                const textBody = postText.document.querySelector('body');
                if(showCode){
                    textBody.innerHTML = textBody.textContent;
                    showCode = false;
                }else {
                    textBody.textContent = textBody.innerHTML;
                    showCode = true;
                }
            }
            else{
            postText.document.execCommand(cmd, false, null);
            }
        })
    }

    // Handle up vote click
    $('.up-vote-button-css').on('click', function() {
        var formData = new FormData();
        formData.append('userId', userId);
        formData.append('questionId', questionId);
        formData.append('voteType', 'Up');
        $.ajax({
            url: 'http://localhost/trithucviet/core/ajax/vote.php', 
            cache: false,
            contentType: false,
            processData: false,
            type: 'post',
            data: formData,
            success: function(){
                location.reload();
            }, 
        })
    })

        // Handle down vote click
        $('.down-vote-button-css').on('click', function() {
            var formData = new FormData();
            formData.append('userId', userId);
            formData.append('questionId', questionId);
            formData.append('voteType', 'Down');
            $.ajax({
                url: 'http://localhost/trithucviet/core/ajax/vote.php', 
                cache: false,
                contentType: false,
                processData: false,
                type: 'post',
                data: formData,
                success: function(){
                    location.reload();
                }, 
            })
        })
})