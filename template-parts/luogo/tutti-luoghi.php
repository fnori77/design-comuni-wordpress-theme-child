<?php
global $the_query, $load_posts, $load_card_type;

$max_posts = isset($_GET['max_posts']) ? $_GET['max_posts'] : get_option( 'posts_per_page' );

$query = isset($_GET['search']) ? dci_removeslashes($_GET['search']) : null;
$page = get_query_var("paged");

$args = array(
    's'                 => $query,
    'posts_per_page'    => $max_posts,
    'post_type'         => 'luogo',
    'paged'             => $page,
    #'orderby'   => 'publish_date',
    'order' => 'ASC',
    'orderby' => 'post_title', // We want to organize the events by date

);
$the_query = new WP_Query( $args );
$posts = $the_query->posts;
?>


<div class="bg-grey-card py-5">
    <form role="search" id="search-form" method="get" class="search-form">
    <button type="submit" class="d-none"></button>
        <div class="container">
            <h2 class="title-xxlarge mb-4">
                Esplora tutti i luoghi
            </h2>
            <div>
                <div class="cmp-input-search">
                    <div class="form-group autocomplete-wrapper mb-0">
                        <div class="input-group">
                            <label for="autocomplete-two" class="visually-hidden"
                            >Cerca</label
                            >
                            <input
                            type="search"
                            class="autocomplete form-control"
                            placeholder="Cerca per parola chiave"
                            id="autocomplete-two"
                            name="search"
                            value="<?php echo $query; ?>"
                            data-bs-autocomplete="[]"
                            />
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit" id="button-3">
                                    Invio
                                </button>
                            </div>
                            <span class="autocomplete-icon" aria-hidden="true"
                            ><svg
                                class="icon icon-sm icon-primary"
                                role="img"
                                aria-labelledby="autocomplete-label"
                            >
                                <use
                                href="#it-search"
                                ></use></svg>
                            </span>
                        </div>
                        <p
                        id="autocomplete-label"
                        class="u-grey-light text-paragraph-card mt-2 mb-30 mt-lg-3 mb-lg-40"
                        >
                        <?php echo $the_query->found_posts; ?> luoghi trovati 
                        </p>
                    </div>
                </div>
            </div>
            <div class="row g-4" id="load-more">
                <?php 
                    foreach ($posts as $post_id) {
                    $post = get_post($post_id);
                    $load_card_type = 'luogo';
                    get_template_part("template-parts/luogo/card-full");
                }?>
            </div>
            
            
        </div>
    </form>
</div>
