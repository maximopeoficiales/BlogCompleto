<!-- featured 
    ================================================== -->
<section class="s-featured">
    <div class="row">
        <div class="col-full">
            <div class="featured-slider featured" data-aos="zoom-in">
                <?php
                $db = \Config\Database::connect();
                $query = $db->query("
                CALL mostrar_slide;
                ");
                $result = $query->getResult();
                foreach ($result as $re) {

                ?>
                    <div class="featured__slide">
                        <div class="entry">
                            <?php
                            $url = base_url() . "/uploads/" . $re->banner;
                            $urlpost = base_url() . '/dashboard/post/' . $re->slug . '/' . $re->id_post;
                            $fechaformat = date('d M,Y', strtotime($re->created_at));
                            ?>
                            <div class="entry__background" style="background-image:url('<?= $url ?>');"></div>

                            <div class="entry__content">
                                <span class="entry__category"><a href="#0"><?= $re->nombre_cat ?></a></span>

                                <h1><a href="<?= $urlpost ?>" title=""><?= $re->title ?></a></h1>

                                <div class="entry__info">
                                    <a href="#0" class="entry__profile-pic">
                                        <img class="avatar" src="<?= base_url() ?>/assets/images/avatars/user-05.jpg" alt="">
                                    </a>
                                    <ul class="entry__meta">
                                        <li><a href="#0">Maximo</a></li>
                                        <li><?= $fechaformat ?></li>
                                    </ul>
                                </div>
                            </div> <!-- end entry__content -->
                        </div> <!-- end entry -->
                    </div> <!-- end featured__slide -->
                <?php

                }
                ?>
            </div> <!-- end featured -->

        </div> <!-- end col-full -->
    </div>
</section> <!-- end s-featured -->


<!-- s-content
    ================================================== -->
<section class="s-content">

    <div class="row entries-wrap wide">
        <div class="entries">
            <?php
            if (isset($_GET["pag"])) {
                $pagina = $_GET["pag"];
            } else {
                $pagina = 0;
            }
            $db = \Config\Database::connect();
            if (isset($_GET["s"])) {
                $buscar=$_GET["s"];
                $query = $db->query("
                CALL BuscarPost('$buscar');
                ");
            }else{
                $query = $db->query("
                CALL MostrarPosts($pagina);
                ");
            }
            $result = $query->getResult();
            foreach ($result as $post) {

            ?>
                <?php
                $imagen = base_url() . "/uploads/" . $post->banner;
                $urlpost = base_url() . '/dashboard/post/' . $post->slug . '/' . $post->id_post;
                $fechaformat = date('d M,Y', strtotime($post->created_at));
                ?>
                <article class="col-block">

                    <div class="item-entry" data-aos="zoom-in">
                        <div class="item-entry__thumb">
                            <a href="<?= $urlpost ?>" class="item-entry__thumb-link">
                                <img src="<?= $imagen ?>" srcset="" alt="">
                            </a>
                        </div>

                        <div class="item-entry__text">
                            <div class="item-entry__cat">
                                <a href="category.html"><?= $post->nombre_cat ?></a>
                            </div>

                            <h1 class="item-entry__title"><a href="<?= $urlpost ?>"><?= $post->title ?></a></h1>

                            <div class="item-entry__date">
                                <a href="<?= $urlpost ?>"><?= $fechaformat ?></a>
                            </div>
                        </div>
                    </div> <!-- item-entry -->

                </article> <!-- end article -->
            <?php

            }
            ?>

        </div> <!-- end entries -->
    </div> <!-- end entries-wrap -->

    <div class="row pagination-wrap">
        <div class="col-full">
            <nav class="pgn" data-aos="fade-up">
                <ul>
                    <li><a class="pgn__prev" href="#0">Prev</a></li>
                    <li><a class="pgn__num current" href="#0">1</a></li>
                    <li><a class="pgn__num" href="#0">2</a></li>
                    <li><a class="pgn__num" href="#0">3</a></li>
                    <li><a class="pgn__num" href="#0">4</a></li>
                    <li><a class="pgn__num" href="#0">5</a></li>
                    <li><span class="pgn__num dots">…</span></li>
                    <li><a class="pgn__num" href="#0">8</a></li>
                    <li><a class="pgn__next" href="#0">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>

</section> <!-- end s-content -->