<?php

namespace Drupal\pokemon_structure\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBase;

/**
 * Defines the Pokemon type entity.
 *
 * @ConfigEntityType(
 *   id = "pokemon_type",
 *   label = @Translation("Pokemon type"),
 *   handlers = {
 *     "list_builder" = "Drupal\pokemon_structure\PokemonTypeListBuilder",
 *     "form" = {
 *       "add" = "Drupal\pokemon_structure\Form\PokemonTypeForm",
 *       "edit" = "Drupal\pokemon_structure\Form\PokemonTypeForm",
 *       "delete" = "Drupal\pokemon_structure\Form\PokemonTypeDeleteForm"
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\pokemon_structure\PokemonTypeHtmlRouteProvider",
 *     },
 *   },
 *   config_prefix = "pokemon_type",
 *   admin_permission = "administer site configuration",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "canonical" = "/admin/structure/pokemon_type/{pokemon_type}",
 *     "add-form" = "/admin/structure/pokemon_type/add",
 *     "edit-form" = "/admin/structure/pokemon_type/{pokemon_type}/edit",
 *     "delete-form" = "/admin/structure/pokemon_type/{pokemon_type}/delete",
 *     "collection" = "/admin/structure/pokemon_type"
 *   }
 * )
 */
class PokemonType extends ConfigEntityBase implements PokemonTypeInterface {

  /**
   * The Pokemon type ID.
   *
   * @var string
   */
  protected $id;

  /**
   * The Pokemon type label.
   *
   * @var string
   */
  protected $label;

}
