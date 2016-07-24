<?php

namespace Drupal\pokemon_structure\Entity;

use Drupal\views\EntityViewsData;
use Drupal\views\EntityViewsDataInterface;

/**
 * Provides Views data for Pokemon entities.
 */
class PokemonViewsData extends EntityViewsData implements EntityViewsDataInterface {

  /**
   * {@inheritdoc}
   */
  public function getViewsData() {
    $data = parent::getViewsData();

    $data['pokemon']['table']['base'] = array(
      'field' => 'id',
      'title' => $this->t('Pokemon'),
      'help' => $this->t('The Pokemon ID.'),
    );

    return $data;
  }

}
