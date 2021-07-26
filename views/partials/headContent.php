<div class="row" style="height: 90px; align-items: center;">
    <div class="col-md-10">
        <h2 style="font-weight: 400;">All Questions</h2>
    </div>
    <div class="col-md-2" style="text-align: end;">
        <div class="col-md-auto" style="padding-left: 0.2rem;">
            <button type="button" class="btn btn-primary" style="background-color: #52A3DC;">Ask
                Question</button>
        </div>
    </div>
</div>
<div class="row" style="border-bottom-style: groove;padding-bottom: 10px;border-width: 1px;">
    <div class="col-md-5">
        <div style="font-family: cursive; font-size: 24px;"><?php echo($countQuestion['count'])?> questions with
            bounties</div>
    </div>
    <div class="col-md-6" style="text-align: right;">
        <div class="btn-group" role="group">
            <a href="?filter=newest"><button type="button" class="btn btn-outline-secondary">Newest</button></a>
            <a href="?filter=active"><button type="button" class="btn btn-outline-secondary">Active</button></a>
            <button type="button" class="btn btn-outline-secondary" style="display: inline;">Bountied
            </button>
            <a href="?filter=unanswered"><button type="button" class="btn btn-outline-secondary">Unanswered</button></a>
            <button id="btnGroupDrop1" type="button" class="btn  btn-outline-secondary dropdown-toggle"
                data-bs-toggle="dropdown" aria-expanded="false">
                More
            </button>
            <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                <li><a class="dropdown-item" href="?filter=frequent">Frequent</a></li>
                <li><a class="dropdown-item" href="?filter=vote">Votes</a></li>
            </ul>
        </div>
    </div>
    <div class="col-md-1">

        <button type="button" class="btn btn-outline-secondary"
            style="background-color: #DDEBF5;color: cornflowerblue; height: 40px; width:84px">
            <span class="material-icons" style="font-size: 18px;">
                settings
            </span>
            Filter
        </button>
    </div>

</div>