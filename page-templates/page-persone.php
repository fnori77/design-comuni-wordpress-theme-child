<?php
/* Template Name: Politici elenco
 *
 * amministrazione template file
 *
 * @package Design_Comuni_Italia
 */
global $post;
	$prefix = "_dci_persona_pubblica_";
	$persone = dci_get_meta("incarichi", $prefix, 4590);
get_header();

?>
	<main>
		
		<?php
		while ( have_posts() ) :
			the_post();
			?>
			<?php get_template_part("template-parts/hero/hero"); ?>
			<?php get_template_part("template-parts/amministrazione/evidenza"); ?>	
	
		<div class="container py-5">
    <h2 class="title-xxlarge mb-4">
        Tutte le figure politiche del comune:
    </h2>
    <div class="row g-4">
        <div class="col-12 col-md-6 col-lg-12">
            <?php if (is_array($persone) && count($persone)) { ?>
                                <section id="persone" class="it-page-section mb-4">
                                    <p><strong>Tutte le persone che fanno parte di questo ufficio:</strong></p>
                                  
										<div style="margin-bottom:30px;" class="row g-10"></div>
                                        <div class="row g-2">
											
											<?php foreach ($persone as $persona_id) { ?>
                                                <div class="col-lg-3 col-md-12">
													<?php get_template_part("template-parts/persona/card-no-foto");?>
											</div>
											<?php } ?>
                                        </div>  
                                </section>
							<?php } ?>
        </div>
    </div>
</div>				
			<?php get_template_part("template-parts/common/valuta-servizio"); ?>
			<?php get_template_part("template-parts/common/assistenza-contatti"); ?>
							
		<?php 
			endwhile; // End of the loop.
		?>
	</main>

<?php
get_footer();






