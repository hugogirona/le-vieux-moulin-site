<?php if (have_rows('flexible_content')):
    while (have_rows('flexible_content')): the_row();

        if (get_row_layout() === 'text_media'):
            include('text-media/text-media.php');

        elseif (get_row_layout() === 'gallery'):
            include('gallery/gallery.php');

        elseif (get_row_layout() === 'slider'):
            include('slider/slider.php');

        elseif (get_row_layout() === 'faq'):
            include('faq/faq.php');

        elseif (get_row_layout() === 'house_characteristics'):
            include('house-characteristics/house-characteristics.php');

        elseif (get_row_layout() === 'employees'):
            include('employees/employees.php');

        elseif (get_row_layout() === 'latest_news'):
            include('latest-news/latest-news.php');

        elseif (get_row_layout() === 'sponsor_strip'):
            include('sponsor-strip/sponsor-strip.php');

    elseif (get_row_layout() === 'volunteering'):
            include('volunteering/volunteering.php');

    elseif (get_row_layout() === 'paragraph_aside'):
            include('paragraph-aside/paragraph-aside.php');

        elseif (get_row_layout() === 'testimonials'):
            include('testimonials/testimonials.php');

        elseif (get_row_layout() === 'chronology'):
            include('chronology/chronology.php');
        endif;

    endwhile;
endif;