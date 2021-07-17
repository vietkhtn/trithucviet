<?php
   forEach ($questionList as $question) { ?>
<div class="row" style="padding-bottom: 2rem;padding-top: 0.9rem; border-bottom-style: inset;border-width: 1px;">
    <div class="col-md-1" style="text-align: center;font-family: cursive;">
        <div>
            <div class="col-md-row"><?php echo($question->voteCount)?></div>
            <div class="col-md-row" style="padding-bottom: 6px;"> votes</div>
        </div>
        <?php if($question->answerCount != 0){?>
        <div
            style="border-color: #5EBA7D;border-style: solid;border-radius: 5px;border-width: 1.8px;color: white;font-weight: 600;background-color: #5EBA7D;">
            <div class="col-md-row"><?php echo($question->answerCount)?></div>
            <div class="col-md-row">answers</div>
        </div>
        <?php }else{ ?>
        <div style="border-color: #5EBA7D;border-style: solid;border-radius: 5px;border-width: 1.8px;">
            <div class="col-md-row"><?php echo($question->answerCount)?></div>
            <div class="col-md-row">answers</div>
        </div>
        <?php }?>
        <div class="col-md-row" style="padding-top: 10px;"><?php echo($question->answerCount*100+2)?> views</div>
    </div>
    <div class="col-md-11">
        <div class="row">
            <div class="badge bg-primary text-wrap"
                style="width: 2.2rem;height: 1.1rem;padding: 0.2em 0.2em;font-weight: 500;margin-top: 7px;">
                +50
            </div>
            <div class="col-md-auto"><a href=""
                    style="text-decoration: none;font-size: 22px;"><?php echo $question->title ?></a></div>
        </div>
        <div id="content" class="row" style="font-size: 16px;padding-bottom: 16px;padding-top: 2px;">
            <?php echo $question->content ?>
        </div>
        <div class="row">
            <div class="col-md-9" style="display: inline-flex;padding-top: 23px;">
                <div class="col-md-auto" style="padding-left: 0;padding-right: 0.4rem;">
                    <div
                        style="flex-wrap: wrap;display: flex;background-color: #D1E5F1;font-family: cursive;font-size: 16px;padding-left: 7px;padding-right: 8px;padding-top: 2px;padding-bottom: 3px;border-radius: 7px;">
                        <span class="material-icons material-icons-outlined">
                            sell
                        </span>Tags
                    </div>
                </div>
                <?php
                $listTags = explode (",", $question->tags);
                 forEach($listTags as $tag){ ?>
                 
                <div class="col-md-auto" style="padding-left: 0;padding-right: 0.4rem;">
                    <div
                        style="flex-wrap: wrap;display: flex;background-color: #D1E5F1;font-family: cursive;font-size: 16px;padding-left: 7px;padding-right: 7px;padding-top: 2px;padding-bottom: 3px;border-radius: 7px;">
                        <?php echo($tag)?>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="col-md-3" style="padding-left: 53px;">
                <div class="row"><?php echo($question->postOn)?></div>
                <div class="row">
                    <div class="col-md-auto" style="padding-left: 0;">
                        <img src="<?php echo($question->profilePic)?>" alt=""
                            style="height: 38px;width: 38px;padding-left: 0px;">
                    </div>
                    <div class="col-md-auto">
                        <div class="row" style="font-weight: 600;color: #0095FF;"><?php echo($question->first_name .' '.$question->last_name)?></div>
                        <div class="row" style="display: inline-block;color: #848D95;font-size: 14px;font-weight: 700;">
                            269
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php } ?>
<script>
  questionContents = document.querySelectorAll("#content");
    questionContents.forEach(item => {
        if (item.innerText.length > 200) {
            item.innerText = item.innerText.substr(0, 200) + '...';
        }else{
            item.innerText = item.innerText;
        }   
    })
</script>