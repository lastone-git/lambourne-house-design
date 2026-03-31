<?php
/**
 * Title: Lambourne Marquee Icons
 * Slug: lambourne-house-block-starter/marquee-icons
 * Inserter: no
 */
?>
<!-- wp:html -->
<section class="lh-marquee lh-marquee--image lh-marquee--text-below is-continuous no-radius" style="--speed:50s;--card-width:120px;--image-height:50px;--gap:20px;--section-pad-y:12px;--section-bg:transparent;">
  <div class="lh-marquee__viewport">
    <div class="lh-marquee__track">
      <?php
      $icons = array(
          'AirConditioning.svg' => 'Air Conditioning',
          'AudioVisualTech.svg' => 'AudioVisual Tech',
          'BikeStorage.svg' => 'Bike Storage',
          'BreakoutSpaces.svg' => 'Breakout Spaces',
          'CommunityEvents.svg' => 'Community Events',
          'Conference.svg' => 'Conference',
          'Courtyard.svg' => 'Courtyard',
          'Coworking.svg' => 'Coworking',
          'EVCharger.svg' => 'EV Charger',
          'FreeWifi.svg' => 'Free Wifi',
          'KitchenAreas.svg' => 'Kitchen Areas',
          'MeetingRoom.svg' => 'Meeting Room',
          'OfficeSpace.svg' => 'Office Space',
          'Parking.svg' => 'Parking',
          'PrivatePod.svg' => 'Private Pod',
          'Receptionist.svg' => 'Receptionist',
          'Shower.svg' => 'Shower',
          'SolarPanels.svg' => 'Solar Panels',
          'SupportStaff.svg' => 'Support Staff',
          'WellnessRoom.svg' => 'Wellness Room',
      );

      for ($i = 0; $i < 2; $i++) :
          foreach ($icons as $file => $label) :
              ?>
              <div class="lh-marquee__card">
                <img class="lh-marquee__image" src="<?php echo esc_url(get_theme_file_uri('assets/images/icons/' . $file)); ?>" alt="<?php echo esc_attr($label); ?>" loading="lazy" draggable="false">
                <div class="lh-marquee__below">
                  <span class="lh-marquee__label"><?php echo esc_html($label); ?></span>
                </div>
              </div>
              <?php
          endforeach;
      endfor;
      ?>
    </div>
  </div>
</section>
<!-- /wp:html -->
