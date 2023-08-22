<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Design_Comuni_Italia
 */
$theme_locations = get_nav_menu_locations();
$current_group = dci_get_current_group();
?>
<!doctype html>
<html lang="it">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<?php wp_head(); ?>
	<style>
		.dropdown-submenu {
  position: relative;
}

.dropdown-submenu .dropdown-menu {
  top: 0;
  left: 100%;
  margin-top: -1px;
}
		@media all and (min-width: 992px) {
	.navbar .nav-item .dropdown-menu{ display: none; }
	.navbar .nav-item:hover .nav-link{   }
	.navbar .nav-item:hover .dropdown-menu{ display: block; }
	.navbar .nav-item .dropdown-menu{ margin-top:0; }
}	
		.navbar .megamenu{ padding: 1rem; }

/* ============ desktop view ============ */
@media all and (min-width: 992px) {

  .navbar .has-megamenu{position:static!important;}
  .navbar .megamenu{left:0; right:0; width:100%; margin-top:0;  }

}	
/* ============ desktop view .end// ============ */

/* ============ mobile view ============ */
@media(max-width: 991px){
  .navbar.fixed-top .navbar-collapse, .navbar.sticky-top .navbar-collapse{
    overflow-y: auto;
      max-height: 90vh;
      margin-top:10px;
  }
}
/* ============ mobile view .end// ============ */
		/* ============ desktop view ============ */
@media all and (min-width: 992px) {
	.dropdown-menu li{ position: relative; 	}
	.nav-item .submenu{ 
		display: none;
		position: absolute;
		left:100%; top:-7px;
	}
	.nav-item .submenu-left{ 
		right:100%; left:auto;
	}
	.dropdown-menu > li:hover{ background-color: #f1f1f1 }
	.dropdown-menu > li:hover > .submenu{ display: block; }
}	
/* ============ desktop view .end// ============ */

/* ============ small devices ============ */
@media (max-width: 991px) {
  .dropdown-menu .dropdown-menu{
      margin-left:0.7rem; margin-right:0.7rem; margin-bottom: .5rem;
  }
}	
	</style>
<script type="text/javascript">
document.addEventListener("DOMContentLoaded", function(){
// make it as accordion for smaller screens
if (window.innerWidth < 992) {

  // close all inner dropdowns when parent is closed
  document.querySelectorAll('.navbar .dropdown').forEach(function(everydropdown){
    everydropdown.addEventListener('hidden.bs.dropdown', function () {
      // after dropdown is hidden, then find all submenus
        this.querySelectorAll('.submenu').forEach(function(everysubmenu){
          // hide every submenu as well
          everysubmenu.style.display = 'none';
        });
    })
  });

  document.querySelectorAll('.dropdown-menu a').forEach(function(element){
    element.addEventListener('click', function (e) {
        let nextEl = this.nextElementSibling;
        if(nextEl && nextEl.classList.contains('submenu')) {	
          // prevent opening link if link needs to open dropdown
          e.preventDefault();
          if(nextEl.style.display == 'block'){
            nextEl.style.display = 'none';
          } else {
            nextEl.style.display = 'block';
          }

        }
    });
  })
}
// end if innerWidth
}); 
// DOMContentLoaded  end
</script>
</head>
<body <?php body_class(); ?>>

<?php get_template_part("template-parts/common/svg"); ?>
<?php get_template_part("template-parts/common/sprites"); ?>
<?php get_template_part("template-parts/common/skiplink"); ?>

<header
    class="it-header-wrapper"
    data-bs-target="#header-nav-wrapper"
    style=""
>
    <?php get_template_part("template-parts/header/slimheader"); ?> 

    <div class="it-nav-wrapper">
    <div class="it-header-center-wrapper">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="it-header-center-content-wrapper">
              <div class="it-brand-wrapper">
                <a 
                href="<?php echo home_url(); ?>" 
                <?php if(!is_front_page()) echo 'title="Vai alla Homepage"'; ?>>
                    <div class="it-brand-text d-flex align-items-center">
                      <?php get_template_part("template-parts/common/logo"); ?>
                      <div>
                        <div class="it-brand-title"><?php echo dci_get_option("nome_comune"); ?></div>
                        <div class="it-brand-tagline d-none d-md-block">
                          <?php echo dci_get_option("motto_comune"); ?>
                        </div>
                      </div>
                    </div>
                </a>
              </div>
              <div class="it-right-zone">
				 <!--PAGOPA
<a href="https://servizi.piedimonteetneoonline.it/" target="_self"> 
   <img style="width: 75%; padding-left: 150px; margin-right: -60px;"src="https://comune.piedimonte-etneo.ct.it/wp-content/uploads/2023/07/PagoPa.png" alt="PagoPa" border="0"/> 
</a>
				PAGOPA-->
              <?php
                    $show_socials = dci_get_option( "show_socials", "socials" );
                    if($show_socials == "true") : 
                    $socials = dci_get_option('link_social', 'socials');
                    ?>
                    <div class="it-socials d-none d-lg-flex">
                        <span>Seguici su:</span>
                        <ul>
                            <?php foreach ($socials as $social) { ?>
                              <li>
                                <a href="<?php echo $social['url_social'] ?>" target="_blank">
                                    <svg class="icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" href="#<?php echo $social['icona_social'] ?>"></use>
                                  </svg>
                                  <span class="visually-hidden"><?php echo $social['nome_social']; ?></span>
                                </a>
                            </li>
                            <?php } ?>                            
                        </ul><!-- /header-social-wrapper -->
                    </div><!-- /it-socials -->
                    <?php endif ?>
                <div class="it-search-wrapper">
                  <span class="d-none d-md-block">Cerca</span>
                  <button class="search-link rounded-icon" type="button" data-bs-toggle="modal" data-bs-target="#search-modal" aria-label="Cerca nel sito">
                      <svg class="icon">
                        <use href="#it-search"></use>
                      </svg>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="it-header-navbar-wrapper" id="header-nav-wrapper">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div
              class="navbar navbar-expand-lg has-megamenu"
            >
              <button
                class="custom-navbar-toggler"
                type="button"
                aria-controls="nav4"
                aria-expanded="false"
                aria-label="Mostra/Nascondi la navigazione"
                data-bs-target="#nav4"
                data-bs-toggle="navbarcollapsible"
              >
                <svg class="icon">
                  <use href="#it-burger"></use>
                </svg>
              </button>
              <div class="navbar-collapsable" id="nav4">
                <div class="overlay" style="display: none"></div>
                <div class="close-div">
                  <button class="btn close-menu" type="button">
                    <span class="visually-hidden">Nascondi la navigazione</span>
                    <svg class="icon">
                      <use href="#it-close-big"></use>
                    </svg>
                  </button>
                </div>
                <div class="menu-wrapper">
                <a href="<?php echo home_url(); ?>" aria-label="Vai alla homepage" class="logo-hamburger">
                    <?php get_template_part("template-parts/common/logo-mobile"); ?>
                  <div class="it-brand-text">
                    <div class="it-brand-title"><?php echo dci_get_option("nome_comune"); ?></div>
                  </div>
                </a>
					<!--menu primario-->
					
          <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
<div class="container-fluid">
	<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="main_nav">
		<ul data-element="main-navigation" class="navbar-nav">
			<li class="nav-item"><a class="nav-link" href="/amministrazione" data-element="management"> Amministrazione </a></li>
			<li class="nav-item"><a class="nav-link" href="/novita" data-element="news">Novità</a></li>
			<!--<li class="nav-item dropdown has-megamenu">
				<a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"> Mega menu  </a>
				<div class="dropdown-menu megamenu" role="menu">
					This is content of megamenu. <br>
				       Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat.
				</div> <!-- dropdown-mega-menu.// 
			</li>-->
		</ul>
		<ul class="navbar-nav ms-auto">
			<li class="nav-item"><a class="nav-link" href="/servizi" data-element="all-services">Servizi</a></li>
			<li class="nav-item"><a class="nav-link" href="/vivere-il-comune" data-element="live">Vivere il Comune</a></li>
		</ul>
		
	</div> <!-- navbar-collapse.// -->
</div> <!-- container-fluid.// -->
</nav>
		
					<!--menu primario-->
                <nav aria-label="Secondaria">
                  <?php
                    $location = "menu-header-right";
                    if ( has_nav_menu( $location ) ) {
                        wp_nav_menu(array(
                          "theme_location" => $location, 
                          "depth" => 0,  
                          "menu_class" => "navbar-nav navbar-secondary", 
                          "container" => "",
                          'list_item_class'  => 'nav-item',
                          'link_class'   => 'nav-link',
                          'walker' => new Menu_Header_Right_Walker()
                        ));
                    }
                    ?>
                </nav>
					
                  <?php
                    $show_socials = dci_get_option( "show_socials", "socials" );
                    if($show_socials == "true") : 
                    $socials = dci_get_option('link_social', 'socials');
                    ?>
                    <div class="it-socials">
                        <span>Seguici su:</span>
                        <ul>
                            <?php foreach ($socials as $social) { ?>
                              <li>
                                <a href="<?php echo $social['url_social'] ?>" target="_blank">
                                    <svg class="icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" href="#<?php echo $social['icona_social'] ?>"></use>
                                  </svg>
                                  <span class="visually-hidden"><?php echo $social['nome_social']; ?></span>
                                </a>
                            </li>
                            <?php } ?>                            
                        </ul><!-- /header-social-wrapper -->
                    </div><!-- /it-socials -->
                    <?php endif ?>
					
				
								
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</header>

<?php get_template_part("template-parts/common/search-modal"); ?>
<?php
if(!is_user_logged_in())
    get_template_part("template-parts/common/access-modal");
?>
