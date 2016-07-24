<?php

namespace Drupal\pokemon_structure;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Routing\LinkGeneratorTrait;
use Drupal\Core\Url;

/**
 * Defines a class to build a listing of Pokemon entities.
 *
 * @ingroup pokemon_structure
 */
class PokemonListBuilder extends EntityListBuilder {

  use LinkGeneratorTrait;

  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['id'] = $this->t('Pokemon ID');
    $header['name'] = $this->t('Name');
    $header['description'] = $this->t('Classification');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    /* @var $entity \Drupal\pokemon_structure\Entity\Pokemon */
    $row['id'] = $entity->id();
    $row['name'] = $this->l(
      $entity->label(),
      new Url(
        'entity.pokemon.canonical', array(
          'pokemon' => $entity->id(),
        )
      )
    );
    $row['description'] = $entity->description->value;
    return $row + parent::buildRow($entity);
  }

}
