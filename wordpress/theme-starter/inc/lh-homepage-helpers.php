<?php
if (!defined('ABSPATH')) {
    exit;
}

function lh_homepage_asset_url($path) {
    return trailingslashit(get_stylesheet_directory_uri()) . 'assets/' . ltrim($path, '/');
}

function lh_homepage_motion_attrs($motion = array()) {
    $defaults = array(
        'x_start' => 0,
        'x_end' => 0,
        'y_start' => 0,
        'y_end' => 0,
        'appear_at' => 0,
        'appear_by' => 0.3,
        'animate_opacity' => true,
        'disable_below' => 800,
        'start_vh' => 0.85,
        'end_vh' => 0.35,
    );

    $motion = wp_parse_args($motion, $defaults);

    $attrs = array(
        'data-scroll-motion' => '1',
        'data-x-start' => $motion['x_start'],
        'data-x-end' => $motion['x_end'],
        'data-y-start' => $motion['y_start'],
        'data-y-end' => $motion['y_end'],
        'data-appear-at' => $motion['appear_at'],
        'data-appear-by' => $motion['appear_by'],
        'data-animate-opacity' => $motion['animate_opacity'] ? '1' : '0',
        'data-disable-below' => $motion['disable_below'],
        'data-start-vh' => $motion['start_vh'],
        'data-end-vh' => $motion['end_vh'],
    );

    $html = '';

    foreach ($attrs as $name => $value) {
        $html .= sprintf(' %s="%s"', esc_attr($name), esc_attr((string) $value));
    }

    return trim($html);
}

function lh_homepage_sample_data() {
    return array(
        'header' => array(
            'home_url' => home_url('/'),
            'logo_url' => lh_homepage_asset_url('images/branding/lambourne-house-logo.svg'),
            'logo_alt' => 'Lambourne House',
            'book_url' => 'https://new-directions.officernd.com/public/calendar/meeting_room',
            'book_label' => 'Book a meeting room',
            'nav_items' => array(
                array(
                    'label' => 'Our Story',
                    'url' => '#about',
                    'children' => array(
                        array('label' => 'About Us', 'url' => home_url('/about-us/')),
                        array('label' => 'Our Services', 'url' => home_url('/services/')),
                        array('label' => 'Our Process', 'url' => home_url('/process/')),
                        array('label' => 'Our Team', 'url' => home_url('/team/')),
                        array('label' => 'Contact', 'url' => home_url('/contact-us/')),
                    ),
                ),
                array(
                    'label' => 'Meeting Rooms',
                    'url' => '#spaces',
                    'children' => array(
                        array('label' => 'Pearl Suite', 'url' => '#pearl-suite'),
                        array('label' => 'Harlech Suite', 'url' => '#harlech-suite'),
                        array('label' => 'Foundry Room', 'url' => '#foundry-room'),
                        array('label' => 'Murrayfield Room', 'url' => '#murrayfield-room'),
                        array('label' => 'Pods', 'url' => '#pods'),
                    ),
                ),
                array(
                    'label' => 'Co working',
                    'url' => '#coworking',
                    'children' => array(),
                ),
            ),
        ),
        'hero' => array(
            'eyebrow' => 'Spaces That Work for You',
            'title' => 'A Collaborative space<br>for the Everyday',
            'subtitle' => 'Host events, run meetings, or grow your business in adaptable,<br>fully equipped spaces backed by dedicated support.<br><br><strong>Contact us now at 029 2082 7550</strong>',
            'images' => array(
                'images/heros/00.webp',
                'images/heros/10.webp',
            ),
            'move_px' => -220,
            'slide_ms' => 10000,
            'scroll_label' => 'Scroll for more',
        ),
        'welcome' => array(
            'background_image' => 'images/bgs/plant-04-small.webp',
            'lines' => array(
                array(
                    'text' => 'Welcome to Lambourne House',
                    'modifier' => 'lh-welcome__line--small',
                    'motion' => array(
                        'y_start' => 6.5,
                        'appear_at' => 0,
                        'appear_by' => 0.25,
                    ),
                ),
                array(
                    'text' => 'Rooms & Spaces For Hire',
                    'modifier' => 'lh-welcome__line--large',
                    'motion' => array(
                        'x_start' => -10,
                        'appear_at' => 0.2,
                        'appear_by' => 0.5,
                    ),
                ),
                array(
                    'text' => '- Available Now -',
                    'modifier' => 'lh-welcome__line--meta',
                    'motion' => array(
                        'y_start' => 5.5,
                        'appear_at' => 0.3,
                        'appear_by' => 0.2,
                    ),
                ),
            ),
        ),
        'media_grid' => array(
            'background_image' => 'images/bgs/plant-02-small.webp',
            'columns' => array(
                array(
                    'class_name' => '',
                    'motion' => array(
                        'y_start' => -20,
                        'animate_opacity' => false,
                    ),
                    'items' => array(
                        array(
                            'type' => 'image',
                            'src' => 'images/stock/02.webp',
                            'alt' => 'Meeting room view',
                        ),
                    ),
                ),
                array(
                    'class_name' => 'is-center',
                    'motion' => array(
                        'animate_opacity' => false,
                    ),
                    'items' => array(
                        array(
                            'type' => 'video',
                            'src' => 'videos/office.mp4',
                        ),
                    ),
                ),
                array(
                    'class_name' => '',
                    'motion' => array(
                        'y_start' => -200,
                        'animate_opacity' => false,
                    ),
                    'items' => array(
                        array(
                            'type' => 'image',
                            'src' => 'images/stock/21.webp',
                            'alt' => 'Workspace details',
                        ),
                        array(
                            'type' => 'image',
                            'src' => 'images/stock/06.webp',
                            'alt' => 'Office seating',
                        ),
                    ),
                ),
            ),
        ),
        'quote' => array(
            'title' => 'Why choose Lambourne House?',
            'body' => 'Lambourne House offers a variety of spaces including flexible offices, coworking areas, meeting rooms, conference facilities and event spaces, but also boasts a variety of unique features and amenities designed to support you, your business or event.',
            'link' => array(
                'url' => '#more',
                'label' => 'More about us',
            ),
        ),
        'steps' => array(
            array(
                'image_side' => 'left',
                'background_image' => 'images/bgs/plant-03-small.webp',
                'title' => 'Event & Conference Space',
                'eyebrow' => "Let's Arrange a Time...",
                'body' => 'Our venue offers a dynamic setting perfect for corporate meetings, networking events, workshops, AGMs, exhibitions, training days, studio space and more. We can offer flexible layouts, modern facilities, and a dedicated support team, to ensure your event is a success.',
                'link' => array(
                    'url' => home_url('/contact-us/'),
                    'label' => 'Get in touch',
                ),
                'image' => 'images/heros/09.webp',
            ),
            array(
                'image_side' => 'right',
                'title' => 'Coworking',
                'eyebrow' => 'Become a member now',
                'body' => 'Experience our dynamic co-working space, offering open desks, private offices, and shared meeting rooms. With high-speed internet, networking events, and a kitchen area, it is ideal for freelancers, start-ups, and small businesses.',
                'link' => array(
                    'url' => home_url('/contact-us/'),
                    'label' => 'Get in touch',
                ),
                'image' => 'images/heros/04.webp',
            ),
        ),
        'marquees' => array(
            array(
                'render_mode' => 'background',
                'text_position' => 'over-bottom',
                'speed_seconds' => 80,
                'card_width' => 320,
                'image_height' => 550,
                'gap' => 20,
                'section_pad_y' => 50,
                'border_radius' => false,
                'pause_on_hover' => false,
                'items' => array(
                    array('label' => 'Pearl Suite', 'link_name' => 'Book it now', 'href' => '#', 'image' => 'images/heros/01.webp'),
                    array('label' => 'Foundry Room', 'link_name' => 'Book it now', 'href' => '#', 'image' => 'images/heros/02.webp'),
                    array('label' => 'Harlech Suite', 'link_name' => 'Book it now', 'href' => '#', 'image' => 'images/heros/03.webp'),
                    array('label' => 'Millennium', 'link_name' => 'Book it now', 'href' => '#', 'image' => 'images/heros/04.webp'),
                    array('label' => 'Foundry Room', 'link_name' => 'Book it now', 'href' => '#', 'image' => 'images/heros/05.webp'),
                    array('label' => 'Harlech Suite', 'link_name' => 'Book it now', 'href' => '#', 'image' => 'images/heros/06.webp'),
                    array('label' => 'Millennium', 'link_name' => 'Book it now', 'href' => '#', 'image' => 'images/heros/07.webp'),
                ),
            ),
            array(
                'render_mode' => 'image',
                'text_position' => 'below',
                'speed_seconds' => 50,
                'card_width' => 120,
                'image_height' => 50,
                'gap' => 20,
                'section_pad_y' => 12,
                'border_radius' => false,
                'pause_on_hover' => false,
                'items' => array(
                    array('label' => 'Air Conditioning', 'image' => 'images/icons/AirConditioning.svg'),
                    array('label' => 'AudioVisual Tech', 'image' => 'images/icons/AudioVisualTech.svg'),
                    array('label' => 'Bike Storage', 'image' => 'images/icons/BikeStorage.svg'),
                    array('label' => 'Breakout Spaces', 'image' => 'images/icons/BreakoutSpaces.svg'),
                    array('label' => 'Community Events', 'image' => 'images/icons/CommunityEvents.svg'),
                    array('label' => 'Conference', 'image' => 'images/icons/Conference.svg'),
                    array('label' => 'Courtyard', 'image' => 'images/icons/Courtyard.svg'),
                    array('label' => 'Coworking', 'image' => 'images/icons/Coworking.svg'),
                    array('label' => 'EV Charger', 'image' => 'images/icons/EVCharger.svg'),
                    array('label' => 'Free Wifi', 'image' => 'images/icons/FreeWifi.svg'),
                    array('label' => 'Kitchen Areas', 'image' => 'images/icons/KitchenAreas.svg'),
                    array('label' => 'Meeting Room', 'image' => 'images/icons/MeetingRoom.svg'),
                    array('label' => 'Office Space', 'image' => 'images/icons/OfficeSpace.svg'),
                    array('label' => 'Parking', 'image' => 'images/icons/Parking.svg'),
                    array('label' => 'Private Pod', 'image' => 'images/icons/PrivatePod.svg'),
                    array('label' => 'Receptionist', 'image' => 'images/icons/Receptionist.svg'),
                    array('label' => 'Shower', 'image' => 'images/icons/Shower.svg'),
                    array('label' => 'Solar Panels', 'image' => 'images/icons/SolarPanels.svg'),
                    array('label' => 'Support Staff', 'image' => 'images/icons/SupportStaff.svg'),
                    array('label' => 'Wellness Room', 'image' => 'images/icons/WellnessRoom.svg'),
                ),
            ),
        ),
        'footer' => array(
            'logo_url' => lh_homepage_asset_url('images/branding/lh-logo.svg'),
            'logo_alt' => 'Lambourne House',
            'headline' => 'A collaborative space for the everyday',
            'actions' => array(
                array(
                    'label' => 'Book a meeting room',
                    'url' => 'https://lambourne.house/contact-us/?swcfpc=1',
                    'class_name' => 'is-primary',
                ),
                array(
                    'label' => 'Book a tour',
                    'url' => 'https://new-directions.officernd.com/tours/locations',
                    'class_name' => 'is-secondary',
                    'new_tab' => true,
                ),
            ),
            'contact_intro' => 'Contact us now at the below:',
            'contact_lines' => array(
                'Email: enquiries@lambourne.house',
                'Call: 029 2082 7550',
                'Lambourne House, Lambourne Crescent, Cardiff CF14 5GL',
            ),
            'socials' => array(
                array('label' => 'Instagram', 'short_label' => 'IG', 'url' => 'https://www.instagram.com/lambourne.house?swcfpc=1'),
                array('label' => 'LinkedIn', 'short_label' => 'LI', 'url' => 'https://www.linkedin.com/company/lambourne-house?swcfpc=1'),
                array('label' => 'Facebook', 'short_label' => 'FB', 'url' => 'https://www.facebook.com/lambourne.house.cardiff?swcfpc=1'),
            ),
            'legal_links' => array(
                array('label' => 'Privacy Policy', 'url' => 'https://www.new-directions.co.uk/privacy-policy/'),
                array('label' => 'Modern Slavery Statement', 'url' => 'https://www.new-directions.co.uk/wp-content/uploads/modern-slavery-statement.pdf'),
            ),
            'copyright' => 'All rights reserved. A part of the New Directions Group.',
            'copyright_url' => 'https://www.new-directions.co.uk/',
        ),
    );
}
