<?php

// CPT TAXONOMY

include('configure/cpt-taxonomy.php');

// Utilities

include('configure/utilities.php');

// CONFIG

include('configure/configure.php');

// CUSTOMIZER

include('configure/customizer.php');

// JAVASCRIPT & CSS

include('configure/js-css.php');

// SHORTCODES

include('configure/shortcodes.php');

// ACF

include('configure/acf.php');

// HOOKS ADMIN

if (is_admin()) {
	include('configure/admin.php');
}

// THEMES DEPENDENCIES
include('configure/plugin.php');
