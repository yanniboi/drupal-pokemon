<?php

namespace Drupal\pokemon_structure\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Form controller for Pokemon edit forms.
 *
 * @ingroup pokemon_structure
 */
class PokemonForm extends ContentEntityForm {

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    /* @var $entity \Drupal\pokemon_structure\Entity\Pokemon */
    $form = parent::buildForm($form, $form_state);
    $entity = $this->entity;

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $entity = $this->entity;
    $status = parent::save($form, $form_state);

    switch ($status) {
      case SAVED_NEW:
        drupal_set_message($this->t('Created the %label Pokemon.', [
          '%label' => $entity->label(),
        ]));
        break;

      default:
        drupal_set_message($this->t('Saved the %label Pokemon.', [
          '%label' => $entity->label(),
        ]));
    }
    $form_state->setRedirect('entity.pokemon.canonical', ['pokemon' => $entity->id()]);
  }

}
