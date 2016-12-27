<div class="container-fluid container-top">
     <div class="container no-padding">
          <nav class="navbar navbar-inverse">

               <!-- Brand and toggle get grouped for better mobile display -->
               <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                         <span class="sr-only">Toggle navigation</span>
                         <span class="icon-bar"></span>
                         <span class="icon-bar"></span>
                         <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?=site_url();?>">
                         <img alt="ATM" src="/www/images/logo_top.jpg">
                    </a>
               </div>

               <!-- Collect the nav links, forms, and other content for toggling -->
               <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-left">
                         <li class="active"><a href="<?=site_url();?>">Главная <span class="sr-only">(current)</span></a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                         <?=top_menu_links();?>
                         <li><a href="<?=site_url('contact');?>">Контакты</a></li>
                    </ul>
               </div><!-- /.navbar-collapse -->
          </nav>
     </div><!-- /.container -->     
</div>