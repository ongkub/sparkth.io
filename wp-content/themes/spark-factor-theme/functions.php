<?php

if (!defined("SPARK_FACTOR_WORDPRESS_VERSION")) {
  // Replace the version number of the theme on each release.
  define("SPARK_FACTOR_WORDPRESS_VERSION", "1.0.0");
}

if (!function_exists("spark_factor_wordpress_setup")):
  function spark_factor_wordpress_setup() {
    // Add support for block styles.
    add_theme_support("wp-block-styles");

    add_theme_support("block-template-parts");

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support("html5", [
      "search-form",
      "comment-form",
      "comment-list",
      "gallery",
      "caption",
      "style",
      "script",
    ]);

    /**
     * Add responsive embeds and block editor styles.
     */
    add_theme_support("responsive-embeds");
    add_theme_support("editor-styles");
    add_editor_style("editor-style.css");
  }
endif;
add_action("after_setup_theme", "spark_factor_wordpress_setup");

function spark_factor_wordpress_font_face_styles() {
  return "@font-face{\n" .
    "font-family: 'Sukhumvit Set';\n" .
    "src: url('" .
    get_theme_file_uri("assets/fonts/SukhumvitSet-Text.ttf") .
    "');\n}\n" .
    "@font-face{\n" .
    "font-family: 'Sukhumvit Set';\n" .
    "src: url('" .
    get_theme_file_uri("assets/fonts/SukhumvitSet-Bold.ttf") .
    "');\nfont-weight: bold;\n}";
}

function spark_factor_wordpress_font() {
  wp_register_style("spark-factor-wordpress-font-style", false);
  wp_enqueue_style("spark-factor-wordpress-font-style");

  wp_add_inline_style(
    "spark-factor-wordpress-font-style",
    spark_factor_wordpress_font_face_styles()
  );
}
add_action("wp_enqueue_scripts", "spark_factor_wordpress_font");

function spark_factor_wordpress_header() {
  wp_enqueue_script(
    "spark-factor-wordpress-header",
    get_stylesheet_directory_uri() . "/js/header.js",
    [],
    false,
    true
  );
}
add_action("wp_enqueue_scripts", "spark_factor_wordpress_header");

/**
 * Enqueue scripts and styles.
 */
function spark_factor_wordpress_scripts() {
  // Theme stylesheet
  wp_enqueue_style("style", get_stylesheet_uri());

  wp_enqueue_style(
    "wpb-google-fonts",
    "https://fonts.googleapis.com/css?family=Josefin+Sans:400,700",
    false
  );

  // Add home page style
  if (is_front_page()) {
    wp_enqueue_style(
      "home-style",
      get_template_directory_uri() . "/home-style.css"
    );
  } else {
    wp_enqueue_style(
      "blog-style",
      get_template_directory_uri() . "/blog-style.css"
    );
  }

  if (
    is_page([
      "contact-us",
      "services",
      "about-us",
      "industries",
      "case-studies",
      "terms-of-service",
      "privacy-policy",
    ])
  ) {
    wp_enqueue_style(
      "spark-factor-marketing-pages",
      get_template_directory_uri() . "/marketing-pages.css",
      ["style"],
      SPARK_FACTOR_WORDPRESS_VERSION
    );
  }
}
add_action("wp_enqueue_scripts", "spark_factor_wordpress_scripts");
