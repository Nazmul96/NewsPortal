<?php
// page array --------------------------------------------------------------;

$home_position = array(0 => '--Select--');
for ($i = 1; $i <= 21; $i++) {
    $home_position[] = $i;
}

$other_positions = array(0 => '--Select--');
for ($i = 1; $i <= 13; $i++) {
    $other_positions[] = $i;
}


$ad_positions = array();
for ($i = 0; $i <= 35; $i++):
    $ad_positions[] = $i;
endfor;


$nw_img_search = array(
    'width' => '1000',
    'height' => '600',
    'scrollbars' => 'yes',
    'status' => 'yes',
    'resizable' => 'yes',
    'screenx' => '100',
    'screeny' => '10',
    'class' => ''
);

$fonts = ["ABeeZee","Abel","Abril Fatface","Aclonica","Acme","Actor","Adamina","Advent Pro","Aguafina Script","Akronim","Aladin","Aldrich","Alef","Alegreya","Alegreya SC","Alegreya Sans","Emilys Candy","Engagement","Englebert","Enriqueta","Erica One","Esteban","Euphoria Script","Ewert","Exo","Exo 2","Lato","Ubuntu","League Script","Leckerli One","Ledger","Lekton","Lemon","Libre Baskerville","Life Savers","Lilita One","Lily Script One","Limelight","Linden Hill","Lobster","Lobster Two","Londrina Outline","Londrina Shadow","Londrina Sketch","Londrina Solid","Lora","Love Ya Like A Sister","Loved by the King","Lovers Quarrel","Luckiest Guy","Odor Mean Chey","Offside","Old Standard TT","Poly","Pompiere","Pontano Sans","Poppins","Port Lligat Sans","Port Lligat Slab","Pragati Narrow","Prata","Preahvihear","Press Start 2P","Princess Sofia","Prociono","Prosto One","Puritan","Purple Purse","Quando","Quantico","Quattrocento","Quattrocento Sans","Questrial","Quicksand","Quintessential","Qwigley","Racing Sans One","Radley","Rajdhani","Raleway","Raleway Dots","Ramabhadra","Ramaraja","Rambla","Rammetto One","Ranchers","Rancho","Ranga","Rationale","Ravi Prakash","Redressed","Reenie Beanie","Revalia","Rhodium Libre","Ribeye","Ribeye Marrow","Righteous","Risque","Roboto","Roboto Condensed","Roboto Mono","Roboto Slab","Pacifico","Great Vibes"];


?>