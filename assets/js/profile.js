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
                    $.post('http://localhost/trithucviet/core/ajax/coverPhoto.php', {  
                                imageUrl: data.data.url, 
                                userId: userId
                            }, function(data) {

                    })
                    $.ajax({
                        url: 'http://localhost/trithucviet/core/ajax/coverPhoto.php', 
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
                    $.post('http://localhost/trithucviet/core/ajax/profilePhoto.php', 
                    {  
                        imageUrl: data.data.url, 
                        userId: userId
                    }, function(data) {
                        
                    })
                    $.ajax({
                        url: 'http://localhost/trithucviet/core/ajax/profilePhoto.php', 
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

})