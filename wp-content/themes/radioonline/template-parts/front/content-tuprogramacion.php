<div class="row">
    <div class="col-lg-12 col-sm-12">

    <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <button type="button" id="stars" class="btn btn-primary" href="#tab1" data-toggle="tab">LU
                <div class="hidden-xs">Lunes</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="favorites" class="btn btn-default" href="#tab2" data-toggle="tab">MA
                <div class="hidden-xs">Martes</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="following" class="btn btn-default" href="#tab3" data-toggle="tab">MI
                <div class="hidden-xs">Miercoles</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="following" class="btn btn-default" href="#tab4" data-toggle="tab">JU
                <div class="hidden-xs">Jueves</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="following" class="btn btn-default" href="#tab5" data-toggle="tab">VI
                <div class="hidden-xs">Viernes</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="following" class="btn btn-default" href="#tab6" data-toggle="tab">SA
                <div class="hidden-xs">Sabado</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="following" class="btn btn-default" href="#tab7" data-toggle="tab">DO
                <div class="hidden-xs">Domingo</div>
            </button>
        </div>
    </div>

    <div class="well">
        <div class="tab-content">
            <div class="tab-pane fade in active" id="tab1">
                <?php echo do_shortcode("[vtimeline id='315']"); ?>
            </div>
            <div class="tab-pane fade in" id="tab2">
                <?php echo do_shortcode("[vtimeline id='316']"); ?>
            </div>
            <div class="tab-pane fade in" id="tab3">
                <?php echo do_shortcode("[vtimeline id='317']"); ?>
            </div>
            <div class="tab-pane fade in" id="tab4">
                <?php echo do_shortcode("[vtimeline id='318']"); ?>
            </div>
            <div class="tab-pane fade in" id="tab5">
                <?php echo do_shortcode("[vtimeline id='319']"); ?>
            </div>
            <div class="tab-pane fade in" id="tab6">
                <?php echo do_shortcode("[vtimeline id='320']"); ?>
            </div>
            <div class="tab-pane fade in" id="tab7">
                <?php echo do_shortcode("[vtimeline id='321']"); ?>
            </div>
        </div>
        </div>
    </div>
</div>