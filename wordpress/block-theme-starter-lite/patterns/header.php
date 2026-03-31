<?php
/**
 * Title: Lambourne Header
 * Slug: lambourne-house-block-starter/header
 * Inserter: no
 */
?>
<!-- wp:html -->
<header class="lh-site-header" data-lh-sticky-header>
  <div class="lh-site-header__inner">
    <a class="lh-site-header__logo" href="<?php echo esc_url(home_url('/')); ?>">
      <img src="<?php echo esc_url(get_theme_file_uri('assets/images/branding/lambourne-house-logo.svg')); ?>" alt="Lambourne House">
    </a>

    <nav class="lh-site-header__nav" aria-label="Primary navigation">
      <ul class="lh-site-header__menu">
        <li class="lh-site-header__menu-item has-children">
          <a href="#about">Our Story <span aria-hidden="true">&#9662;</span></a>
          <ul class="lh-site-header__submenu">
            <li><a href="<?php echo esc_url(home_url('/about-us/')); ?>">About Us</a></li>
            <li><a href="<?php echo esc_url(home_url('/services/')); ?>">Our Services</a></li>
            <li><a href="<?php echo esc_url(home_url('/process/')); ?>">Our Process</a></li>
            <li><a href="<?php echo esc_url(home_url('/team/')); ?>">Our Team</a></li>
            <li><a href="<?php echo esc_url(home_url('/contact-us/')); ?>">Contact</a></li>
          </ul>
        </li>

        <li class="lh-site-header__menu-item has-children">
          <a href="#spaces">Meeting Rooms <span aria-hidden="true">&#9662;</span></a>
          <ul class="lh-site-header__submenu">
            <li><a href="#pearl-suite">Pearl Suite</a></li>
            <li><a href="#harlech-suite">Harlech Suite</a></li>
            <li><a href="#foundry-room">Foundry Room</a></li>
            <li><a href="#murrayfield-room">Murrayfield Room</a></li>
            <li><a href="#pods">Pods</a></li>
          </ul>
        </li>

        <li class="lh-site-header__menu-item">
          <a href="#coworking">Co working</a>
        </li>
      </ul>
    </nav>

    <a class="lh-site-header__button" href="https://new-directions.officernd.com/public/calendar/meeting_room">
      Book a meeting room
    </a>
  </div>
</header>
<!-- /wp:html -->
