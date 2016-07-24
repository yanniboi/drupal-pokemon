<?php

/**
 * @file
 * Contains pokemon.page.inc.
 *
 * Page callback for Pokemon entities.
 */

use Drupal\Core\Render\Element;
use Drupal\Core\Link;
use Drupal\Core\Url;

/**
 * Prepares variables for Pokemon templates.
 *
 * Default template: pokemon.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_pokemon(array &$variables) {
  // Fetch Pokemon Entity Object.
  $pokemon = $variables['elements']['#pokemon'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
