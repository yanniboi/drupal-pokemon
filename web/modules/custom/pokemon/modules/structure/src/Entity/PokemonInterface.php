<?php

namespace Drupal\pokemon_structure\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Pokemon entities.
 *
 * @ingroup pokemon_structure
 */
interface PokemonInterface extends ContentEntityInterface, EntityChangedInterface {

  // Add get/set methods for your configuration properties here.

  /**
   * Gets the Pokemon name.
   *
   * @return string
   *   Name of the Pokemon.
   */
  public function getName();

  /**
   * Sets the Pokemon name.
   *
   * @param string $name
   *   The Pokemon name.
   *
   * @return \Drupal\pokemon_structure\Entity\PokemonInterface
   *   The called Pokemon entity.
   */
  public function setName($name);

  /**
   * Gets the Pokemon creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Pokemon.
   */
  public function getCreatedTime();

  /**
   * Sets the Pokemon creation timestamp.
   *
   * @param int $timestamp
   *   The Pokemon creation timestamp.
   *
   * @return \Drupal\pokemon_structure\Entity\PokemonInterface
   *   The called Pokemon entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Returns the Pokemon published status indicator.
   *
   * Unpublished Pokemon are only visible to restricted users.
   *
   * @return bool
   *   TRUE if the Pokemon is published.
   */
  public function isPublished();

  /**
   * Sets the published status of a Pokemon.
   *
   * @param bool $published
   *   TRUE to set this Pokemon to published, FALSE to set it to unpublished.
   *
   * @return \Drupal\pokemon_structure\Entity\PokemonInterface
   *   The called Pokemon entity.
   */
  public function setPublished($published);

}
