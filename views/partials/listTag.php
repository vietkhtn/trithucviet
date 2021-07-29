<div class="row" >

<?php
   forEach ($tagList as $tag) { 
       ?>
<div class="card col-4 m-3" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?php echo($tag->tag_name)?></h5>
    <!-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> -->
    <p class="card-text nf-4"><?php echo($tag->description)?></p>
    <span class="text-secondary"><?php echo($tag->count_question)?> questions</span>
  
  </div>
</div>




<?php } ?>
</div>    
<script>

     // Shorten question content
     questionContents = document.querySelectorAll(".nf-4");
     var size=250;
    questionContents.forEach(item => {
        if (item.innerText.length > size) {
            item.innerText = item.innerText.substr(0, size) + '...';
        }else{
            item.innerText = item.innerText;
        }   
    })
</script>
