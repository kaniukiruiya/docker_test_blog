<div class="off-canvas-overlay"></div>
 <?php 
     //off convas here
    if(!empty($grassywp_option['off_canvas'])){
        $off=$grassywp_option['off_canvas'];
        if($off == 1){
   ?>
    <nav class="nav-container">
      <ul class="sidenav">
        <li class='nav-close-menu-li'>
          <a href='#'><i class="fa fa-remove"></i>
          </a>
        </li>
        <?php dynamic_sidebar('sidebarcanvas-1'); ?>
      </ul>
    </nav>
    <?php 
    }
  }?>