<?php

namespace Drupal\pokemon_structure;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the Pokemon entity.
 *
 * @see \Drupal\pokemon_structure\Entity\Pokemon.
 */
class PokemonAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\pokemon_structure\Entity\PokemonInterface $entity */
    switch ($operation) {
      case 'view':
        return AccessResult::allowedIfHasPermission($account, 'view published pokemon entities');

      case 'update':
        return AccessResult::allowedIfHasPermission($account, 'edit pokemon entities');

      case 'delete':
        return AccessResult::allowedIfHasPermission($account, 'delete pokemon entities');
    }

    // Unknown operation, no opinion.
    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add pokemon entities');
  }

}
