<?php
/**
 * Template Name: Elenco persone per incarico
 *
 * @package Design_Comuni_Italia
 */
global $post, $titolo, $tipo_elenco, $incarichi,$alfabetico;
$description = dci_get_meta('descrizione','_dci_page_',$post->ID);
$titolo = dci_get_meta("titolo", '_dci_pagina_persone_', $post->ID);
$incarichi = dci_get_meta("incarichi", '_dci_pagina_persone_', $post->ID);
$alfabetico = dci_get_meta("tipo_visualizza_incarichi", '_dci_pagina_persone_', $post->ID);
$sidebar = dci_get_meta("visualizza_sidebar", '_dci_pagina_persone_', $post->ID);

get_header();
?>
    <main>
        <?php
        while ( have_posts() ) :
            the_post();

            ?>
            <div class="container" id="main-container">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-10">
                      <?php get_template_part("template-parts/common/breadcrumb"); ?>
                    </div>
                  </div>
                </div>
        
                <div class="container">
                  <div class="row justify-content-center">
                    <div class="col-12 col-lg-10">
                      <div class="cmp-heading pb-3 pb-lg-4">
                        <div class="row">
                          <div class="col-lg-8">
                            <div class="titolo-sezione">
                              <h1 data-element="page-name"><?php the_title(); ?></h1>
                            </div>
                            <!-- quale data element?? -->
                            <p class="subtitle-small mb-3" data-element="page-description">
                              <?php echo $description ?>
                            </p>
                          </div>
                          <div class="col-lg-3 offset-lg-1 mt-5 mt-lg-0">
                            <?php
                            $inline = true;
                            get_template_part('template-parts/single/actions');
                            ?>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
    
                <div class="container">
                    <div class="row border-top border-light row-column-border row-column-menu-left">
                        <?php if($sidebar == 'on') { ?>
                        <div class="col-12 col-lg-3 mb-4 border-col">
                            <div class="cmp-navscroll sticky-top" aria-labelledby="accordion-title-one">
                                <nav class="navbar it-navscroll-wrapper navbar-expand-lg" aria-label="Indice della pagina" data-bs-navscroll>
                                    <div class="navbar-custom" id="navbarNavProgress">
                                        <div class="menu-wrapper">
                                            <div class="link-list-wrapper">
                                                <div class="accordion">
                                                    <div class="accordion-item">
                                                    <span class="accordion-header" id="accordion-title-one">
                                                        <button class="accordion-button pb-10 px-3 text-uppercase" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-one" aria-expanded="true" aria-controls="collapse-one">
                                                            Indice della pagina
                                                            <svg class="icon icon-xs right">
                                                                <use href="#it-expand"></use>
                                                            </svg>
                                                        </button>
                                                    </span>
                                                        <div class="progress">
                                                            <div class="progress-bar it-navscroll-progressbar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                        <div id="collapse-one" class="accordion-collapse collapse show" role="region" aria-labelledby="accordion-title-one">
                                                            <div class="accordion-body">
                                                                <ul class="link-list" data-element="page-index">
                                                                    <li class="nav-item">
                                                                        <a class="nav-link" href="#cosa_fa">
                                                                            <span class="title-medium">Cosa fa</span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link" href="#composizione">
                                                                            <span class="title-medium"><?php echo $titolo; ?></span>
                                                                        </a>
                                                                    </li>
            													</ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </nav>
                            </div>
                        </div>
                        <?php } ?>
            
                        <div class="col-12 col-lg-8">
                            <div class="it-page-sections-container">
                                 <article class="article-wrapper">
                                    <section id='cosa_fa' class="it-page-section mb-4">
                                        <div class="row variable-gutters">
                                            <div class="col-lg-12">
                                                <?php
                                                the_content();
                                                ?>
                                            </div>
                                        </div>
                                    </section>
                                    <?php
                                    //elenco persone secondo i parametri impostati nei custom fields
                                    get_template_part("template-parts/common/persone");
                                    ?>
                                    <div class="row variable-gutters">
                                        <div class="col-lg-12">
                                            <?php
                                            if ( comments_open() || get_comments_number() ) :
                                                comments_template();
                                            endif;
                                            ?>
                                        </div>
                                    </div>
                                    <div class="row variable-gutters">
                                        <div class="col-lg-12">
                                            <?php get_template_part( "template-parts/single/bottom" ); ?>
                                        </div><!-- /col-lg-9 -->
                                    </div><!-- /row -->
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        endwhile; // End of the loop.
        ?>
        <?php get_template_part("template-parts/common/valuta-servizio"); ?>
  	    <?php get_template_part("template-parts/common/assistenza-contatti"); ?>
    </main>
<?php
get_footer();