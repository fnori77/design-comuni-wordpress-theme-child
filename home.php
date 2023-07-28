<?php
/**
 * The template for displaying home
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Design_Comuni_Italia
 */

get_header();
?>
<section class="it-hero-wrapper it-dark it-overlay">
  <!-- - img-->
  <div class="img-responsive-wrapper">
    <div class="img-responsive">
        <div class="img-wrapper"><img src="https://comune.piedimonte-etneo.ct.it/wp-content/uploads/2023/03/Slide1.jpg" title="titolo immagine" alt="descrizione immagine"></div>
    </div>
  </div>
  <!-- - texts-->
  <div class="container">
    <div class="row">
        <div class="col-12">
          <div class="it-hero-text-wrapper bg-dark">
              <h2>Nel cuore del Parco dell’Etna.</h2>
              <p class="d-none d-lg-block">La storia di Piedimonte, ricca di motivi suggestivi per le sue origini, si carica di particolare fascino se si evocano i lontani trascorsi della civiltà bizantina presente nella frazione di Vena...</p>         
            </div>
        </div>
    </div>
  </div>
</section>
    <main id="main-container" class="main-container redbrown">
        <h1 class="visually-hidden" id="main-container">
            <?php echo dci_get_option("nome_comune"); ?>
        </h1>
        <section id="head-section">
            <h2 class="visually-hidden">Contenuti in evidenza</h2>
            <?php
			$messages = dci_get_option( "messages", "home_messages" );
            if($messages && !empty($messages)) {
                get_template_part("template-parts/home/messages");
            }
		    ?>
			
            <?php get_template_part("template-parts/home/notizie"); ?>
            <?php get_template_part("template-parts/home/calendario"); ?>
        </section>
        <section id="evidenza" class="evidence-section">
            <div class="section py-5 pb-lg-80 px-lg-5 position-relative" style="<?php if (file_exists(get_stylesheet_directory().'/assets/img/evidenza-header-roccadarce.webp')){ ?>background-image: url('<?php echo esc_url( get_stylesheet_directory_uri()); ?>/assets/img/evidenza-header-roccadarce.webp');<?php }else{ ?>background-image: url('<?php echo esc_url( get_template_directory_uri()); ?>/assets/img/evidenza-header-piedimonte.webp');<?php } ?>">
                <?php get_template_part("template-parts/home/argomenti"); ?>
                <?php get_template_part("template-parts/home/siti","tematici"); ?>
            </div>
        </section>
        <?php get_template_part("template-parts/home/ricerca"); ?>
        <?php get_template_part("template-parts/common/valuta-servizio"); ?>
        <?php get_template_part("template-parts/common/assistenza-contatti"); ?>
    </main>
	
<?php
get_footer();
