<?php

/**
 * This is a Anax pagecontroller.
 *
 */
// Get environment & autoloader and the $app-object.
require __DIR__ . '/config_with_app.php';

// Set configuration for theme
$app->theme->configure(ANAX_APP_PATH . 'config/theme_me.php');

// Set url cleaner url links
$app->url->setUrlType(\Anax\Url\CUrl::URL_CLEAN);

// Set routing options
$app->router->add('', function() use ($app) {
    $app->theme->setTitle("Home");

    $content = $app->fileContent->get('me.md');
    $content = $app->textFilter->doFilter($content, 'shortcode, markdown');

    $byline = $app->fileContent->get('byline.md');
    $byline = $app->textFilter->doFilter($byline, 'shortcode, markdown');

    $app->views->add('me/page', [
        'content' => $content,
        'byline' => $byline,
    ]);
});
 
$app->router->add('redovisning', function() use ($app) {
 
    $app->theme->setTitle("Redovisning");

    $content = $app->fileContent->get('redovisning.md');
    $content = $app->textFilter->doFilter($content, 'shortcode, markdown');
 
    $byline = $app->fileContent->get('byline.md');
    $byline = $app->textFilter->doFilter($byline, 'shortcode, markdown');
 
    $app->views->add('me/page', [
        'content' => $content,
        'byline' => $byline,
    ]);
 
});
 
$app->router->add('source', function() use ($app) {
 
    $app->theme->addStylesheet('css/source.css');
    $app->theme->setTitle("Källkod");
 
    $source = new \Mos\Source\CSource([
        'secure_dir' => '..', 
        'base_dir' => '..', 
        'add_ignore' => ['.htaccess'],
    ]);
 
    $app->views->add('me/source', [
        'content' => $source->View(),
    ]);
 
});

 
$app->router->handle();

$app->navbar->configure(ANAX_APP_PATH . 'config/navbar_me.php');

$app->theme->render();
