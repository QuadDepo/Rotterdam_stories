
<div id="foto-previeuw">
    <img src="#" alt="">
    <div id="foto-knoppen">
        <div class="container-fluid">
            <div class="col-xs-6 no"><i class="fa fa-times"></i></div>
            <div class="col-xs-6 yes"><i class="fa fa-check"></i></div>

        </div>
    </div>
</div>

  <div id="top_menu" class="navbar-fixed-top">
      <div class="container-fluid">
          <div class="row">
              <div class="col-xs-4">
                  <img src="/img/logo_sm.svg" class="img-responsive logo" alt="">
              </div>
              <div class="col-xs-offset-4 col-xs-4">
                <button id="cam" type="button" name="button"><i class="fa fa-camera"></i></button>
                <input onchange="readURL(this);" class="hidden-input" type="file" accept="video/*capture=camcorder"></input>
              </div>
          </div>
      </div>
  </div>

      <div id="bottom_nav" class="container">
          <div class="row">
              <div class="col-xs-4">
                  <a href="/user/index.html" class="i_wrapper <?php echo ($active === 'home') ?  "active": "" ?>"><i class="fa fa-home"></i></a>
              </div>
              <div class="col-xs-4">
                  <a href="/user/list.html" class="i_wrapper <?php echo ($active === 'list') ?  "active": "" ?>"><i class="fa fa-list-ul"></i></a>
              </div>
              <div class="col-xs-4">
                  <a href="/user/profiel.html"  class="i_wrapper <?php echo ($active === 'user')?  "active": "" ?>"><i class="fa fa-user"></i></a>
              </div>
          </div>
      </div>
