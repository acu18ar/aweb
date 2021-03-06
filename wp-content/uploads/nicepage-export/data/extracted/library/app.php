<?php

/**
 * Theme settings
 *
 * @param array $settings
 * @return array
 */
function theme_app_settings($settings) {
    return json_decode(<<<JSON
    {
    "colorScheme": {
        "bodyColors": [
            "#111111",
            "#ffffff"
        ],
        "bgColor": "#000000",
        "colors": [
            "#52576c",
            "#5fd7cb",
            "#303030",
            "#92e4fd",
            "#b8c1cc"
        ],
        "customColors": [
            {
                "color": "#5c73ce",
                "status": 0,
                "transparency": 1
            },
            {
                "color": "#4a6ae8",
                "status": 0,
                "transparency": 1
            },
            {
                "color": "#687abf",
                "status": 0,
                "transparency": 1
            },
            {
                "color": "#000000",
                "status": 0,
                "transparency": 1
            },
            {
                "color": "#ffc105",
                "status": 0,
                "transparency": 1
            }
        ],
        "shadingContrast": "body-alt-color",
        "whiteContrast": "body-color",
        "bgContrast": "body-alt-color",
        "name": "u11"
    },
    "fontScheme": {
        "name": "Roboto-OpenSans",
        "default": true,
        "isDefault": true,
        "fonts": {
            "heading": "Roboto, sans-serif",
            "text": "Open Sans, sans-serif",
            "accent": "Arial, sans-serif",
            "headingTitle": "Roboto",
            "textTitle": "Open Sans"
        }
    },
    "typography": {
        "name": "custom-page-typography-2",
        "title": {
            "font-weight": "400",
            "font-size": 3.75,
            "line-height": "1_1",
            "margin-top": 20,
            "margin-bottom": 20,
            "font": "Ubuntu, sans-serif",
            "text-transform": "uppercase"
        },
        "subtitle": {
            "font-weight": "400",
            "font-size": 2.25,
            "line-height": "1_1",
            "margin-top": 20,
            "margin-bottom": 20
        },
        "h1": {
            "font-weight": "400",
            "font-size": 3,
            "line-height": "1_1",
            "margin-top": 20,
            "margin-bottom": 20
        },
        "h2": {
            "font-size": 2.25,
            "line-height": "1_1",
            "margin-top": 20,
            "margin-bottom": 20,
            "font": "Ubuntu, sans-serif",
            "text-transform": "uppercase",
            "font-weight": 700,
            "font-style": "",
            "text-decoration": "",
            "letter-spacing": "",
            "text-color": "body-alt-color",
            "border-color": "",
            "border-style": "",
            "color": "",
            "border": "",
            "button-shape": "",
            "border-radius": "",
            "underline": "",
            "gradient": "",
            "list-icon-src": "",
            "list-icon-spacing": "0.3",
            "list-icon-size": "0.8"
        },
        "h3": {
            "font-weight": "400",
            "font-size": 1.875,
            "line-height": "1_2",
            "margin-top": 20,
            "margin-bottom": 20
        },
        "h4": {
            "font-weight": "400",
            "font-size": 1.5,
            "line-height": "1_2",
            "margin-top": 20,
            "margin-bottom": 20,
            "font": "Ubuntu, sans-serif",
            "text-transform": "uppercase"
        },
        "h5": {
            "font-weight": "400",
            "font-size": 1.25,
            "line-height": "1_2",
            "margin-top": 20,
            "margin-bottom": 20
        },
        "h6": {
            "font-weight": "400",
            "font-size": 1.125,
            "line-height": "1_2",
            "margin-top": 20,
            "margin-bottom": 20
        },
        "largeText": {
            "font-size": 1.25,
            "margin-top": 20,
            "margin-bottom": 20
        },
        "smallText": {
            "font-size": 0.875,
            "margin-top": 20,
            "margin-bottom": 20
        },
        "text": {
            "margin-top": 20,
            "margin-bottom": 20
        },
        "link": {},
        "button": {
            "color": "palette-1-base",
            "margin-top": 20,
            "margin-bottom": 20
        },
        "blockquote": {
            "font-style": "italic",
            "indent": 20,
            "border": 4,
            "border-color": "palette-1-base",
            "margin-top": 20,
            "margin-bottom": 20
        },
        "metadata": {
            "margin-top": 20,
            "margin-bottom": 20
        },
        "list": {
            "margin-top": 20,
            "margin-bottom": 20
        },
        "orderedlist": {
            "margin-top": 20,
            "margin-bottom": 20
        },
        "postContent": {
            "margin-top": 20,
            "margin-bottom": 20
        },
        "theme": {
            "gradient": "",
            "image": "",
            "background-image": false,
            "background-attachment": "fixed",
            "background-size": "cover",
            "background-position": "50% 50%",
            "background-repeat": "no-repeat"
        },
        "htmlBaseSize": 16,
        "hyperlink": {
            "text-color": "palette-1-base"
        }
    }
}
JSON
, true);
}
add_filter('np_theme_settings', 'theme_app_settings');

function theme_analytics() {
?>
    <?php $GLOBALS['googleAnalyticsMarker'] = false; ?>
<?php
}
add_action('wp_head', 'theme_analytics', 0);


function theme_favicon() {
    $custom_favicon_id = get_theme_mod('custom_favicon');
    @list($favicon_src, ,) = wp_get_attachment_image_src($custom_favicon_id, 'full');
    if (!$favicon_src) {
        $favicon_src = "";
        if ($favicon_src) {
            $favicon_src = get_template_directory_uri() . '/images/' . $favicon_src;
        }
    }

    if ($favicon_src) {
        echo "<link rel=\"icon\" href=\"$favicon_src\">";
    }
}
add_action('wp_head', 'theme_favicon');