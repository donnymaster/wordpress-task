<?php

get_header();

$query = new WP_Query([
    'numberposts' => -1,
    'post_type'   => 'offers'
]);

$count_posts = count($query->posts);

function status_img_offer($type)
{
    if ($type === 'active') {
        return 'tick-green.png';
    }

    if ($type === 'disabled') {
        return 'lock.png';
    }

    if ($type === 'customizable') {
        return 'tick-black.png';
    }

    return '';
}

function get_img_count_channels($count)
{
    if ($count === 0) {
        return 'lock.png';
    }
    return 'tick-black.png';
}

function get_count_channels_message($count)
{
    if ($count != 0) {
        echo $count . ' каналов IPTV (DVB-C)';
        return;
    }

    echo 'IPTV (DVB-C)';
}

?>

<div class="container">
    <div class="cards">
        <div class="cards-head">
            <div class="title">
                Рекомендуемые тарифы
            </div>
            <div class="categories-wrapped">
                <div id="categories" class="categories-items">
                    <div data-id="apartment" class="category selected rounding-top-left">
                        Квартиры
                    </div>
                    <div data-id="private_sector" class="category rounding-top-right">
                        Частный сектор
                    </div>
                </div>
            </div>
        </div>
        <?php if ($query->have_posts()) : ?>
            <div class="splide cards-items <?php echo ($count_posts <= 4) ? 'few-items' : null; ?> tab-items show">
                <div class="splide__track">
                    <ul class="splide__list">
                        <?php while ($query->have_posts()) : ?>
                            <?php
                            $query->the_post();
                            ?>
                            <li data-id="<?php echo get_field('type_housing'); ?>" class="splide__slide card-item <?php echo (get_field('type_housing') === 'private_sector') ? 'hide' : null; ?>">
                                <?php if (get_field('offer_is_hit')) : ?>
                                    <div class="rate-hit">
                                        <div class="left"></div>ХИТ<div class="right"></div>
                                    </div>
                                <?php endif; ?>
                                <div class="rate-speed"><? echo the_field('offer_speed'); ?> МБИТ/С</div>
                                <div class="access-port">
                                    <div>
                                        <? echo the_field('offer_access_port'); ?>
                                    </div>
                                    <span class="title"><span class="underline">Порт доступа</span><br>Мбит/с</span>
                                </div>
                                <div class="rate-items">
                                    <div class="rate-item">
                                        <picture>
                                            <img class="type" src="<?php echo get_stylesheet_directory_uri() . '/assets/image/' . status_img_offer(get_field('offer_cable_tv')); ?>" alt="tick">
                                        </picture>
                                        <div class="title item-<?php the_field('offer_cable_tv'); ?>">
                                            кабельное TV
                                        </div>
                                    </div>
                                    <div class="rate-item">
                                        <picture>
                                            <img class="type" src="<?php echo get_stylesheet_directory_uri() . '/assets/image/' . get_img_count_channels(get_field('count_channels')); ?>" alt="tick">
                                        </picture>
                                        <div class="title item-<?php get_field('count_channels') === 0 ? 'item-disabled' : null; ?>">
                                            <?php get_count_channels_message(get_field('count_channels')); ?>
                                        </div>
                                    </div>
                                    <div class="rate-item">
                                        <picture>
                                            <img class="type" src="<?php echo get_stylesheet_directory_uri() . '/assets/image/' . status_img_offer(get_field('offer_hd_channels')); ?>" alt="tick">
                                        </picture>
                                        <div class="title item-<?php the_field('offer_hd_channels'); ?>">
                                            HD каналы
                                        </div>
                                    </div>
                                    <div class="rate-item">
                                        <picture>
                                            <img class="type" src="<?php echo get_stylesheet_directory_uri() . '/assets/image/' . status_img_offer(get_field('offer_cinema_hall')); ?>" alt="tick">
                                        </picture>
                                        <div class="title item-<?php the_field('offer_cinema_hall'); ?>">
                                            кинозал
                                        </div>
                                    </div>
                                </div>
                                <div class="rate-description">
                                    <img class="type" src="<?php echo get_stylesheet_directory_uri() . '/assets/image/' . ((get_field('offer_cinema_hall') == 'active') || (get_field('offer_cinema_hall') == 'customizable') ? 'tick-black.png' : 'lock.png'); ?>" alt="tick">
                                    <div class="title item-<?php the_field('offer_cinema_hall'); ?>">
                                        Более 10 000 фильмов, каналы TV1000, FOX, Discovery, Sony, National Geographic, Футбол 1/2/3, Eurosport 1/2, Setanta Sports
                                    </div>
                                </div>
                                <div class="rate-price">
                                    <div>
                                        <? echo the_field('offer_price'); ?>
                                    </div>
                                    <span class="info"><span class="underline">ГРН</span><br>МЕС</span>
                                </div>
                                <div class="rate-action">
                                    <div class="btn">
                                        Заказать
                                    </div>
                                </div>
                            </li>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    </ul>
                </div>
            </div>
        <?php else : ?>
            <div class="empty-data">
                <h2>Данных нет</h2>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php

get_footer();
