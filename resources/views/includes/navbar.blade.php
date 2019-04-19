<nav class="btn-group" data-toggle="links">
    <!--
    <a class="btn btn-secondary raised start btn-lg active" role="link" aria-pressed="true" href="#">Home</a>
    <a class="btn btn-secondary raised inner btn-lg active" role="button" aria-pressed="true" href="<?php echo URL::to('/vue')?>">projects</a>
    <a class="btn btn-secondary raised inner btn-lg active" role="link" aria-pressed="true" href="<?php echo URL::to('/about')?>">about</a>
    <a class="btn btn-secondary raised inner btn-lg active" role="link" aria-pressed="true" href="<?php echo URL::to('/contact')?>">contact</a>
    <a class="btn btn-secondary raised end btn-lg active" role="link" aria-pressed="true" href="<?php echo URL::to('/impressum')?>">impressum</a>
    -->

    <div class="main-wrapper">
        <a role="button" aria-pressed="true" href="#">
            <div class="badge yellow">
                <div class="circle"> <i class="fa fa-bolt"></i></div>
                <div class="ribbon">Home</div>
            </div>
        </a>
        <a role="button" aria-pressed="true" href="<?php echo URL::to('/vue')?>">
            <div class="badge orange">
                <div class="circle"> <i class="fa fa-wheelchair-alt"></i></div>
                <div class="ribbon">Projects</div>
            </div>
        </a>
        <a role="button" aria-pressed="true" href="<?php echo URL::to('/about')?>">
            <div class="badge pink">
                <div class="circle"> <i class="fa fa-pied-piper"></i></div>
                <div class="ribbon">About</div>
            </div>
        </a>
        <a role="button" aria-pressed="true" href="<?php echo URL::to('/contact')?>">
            <div class="badge red">
                <div class="circle"> <i class="fa fa-shield"></i></div>
                <div class="ribbon">Contact</div>
            </div>
        </a>
        <a role="button" aria-pressed="true" href="<?php echo URL::to('/impressum')?>">
            <div class="badge purple">
                <div class="circle"> <i class="fa fa-anchor"></i></div>
                <div class="ribbon">Impressum</div>
            </div>
        </a>
        <div class="badge teal">
            <div class="circle"> <i class="fa fa-bicycle"></i></div>
            <div class="ribbon">Learn</div>
        </div>
        <div class="badge blue">
            <div class="circle"> <i class="fa fa-users"></i></div>
            <div class="ribbon">Pusher</div>
        </div>
        <div class="badge blue-dark">
            <div class="circle"> <i class="fa fa-rocket"></i></div>
            <div class="ribbon">Escape</div>
        </div>
        <div class="badge green">
            <div class="circle"> <i class="fa fa-tree"></i></div>
            <div class="ribbon">Jungler</div>
        </div>
        <div class="badge green-dark">
            <div class="circle"> <i class="fa fa-user fa-street-view"></i></div>
            <div class="ribbon">Offlaner</div>
        </div>
        <div class="badge silver">
            <div class="circle"> <span class="font">AFK</span></div>
            <div class="ribbon">Carry</div>
        </div>
        <div class="badge gold">
            <div class="circle"> <i class="fa fa-magic"></i></div>
            <div class="ribbon">Support</div>
        </div>
    </div>
   </nav>

