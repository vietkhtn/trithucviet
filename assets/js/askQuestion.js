$(function() {  
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

})
