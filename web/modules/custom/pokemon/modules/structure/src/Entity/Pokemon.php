<?php

namespace Drupal\pokemon_structure\Entity;

use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityChangedTrait;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\user\UserInterface;

/**
 * Defines the Pokemon entity.
 *
 * @ingroup pokemon_structure
 *
 * @ContentEntityType(
 *   id = "pokemon",
 *   label = @Translation("Pokemon"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\pokemon_structure\PokemonListBuilder",
 *     "views_data" = "Drupal\pokemon_structure\Entity\PokemonViewsData",
 *
 *     "form" = {
 *       "default" = "Drupal\pokemon_structure\Form\PokemonForm",
 *       "add" = "Drupal\pokemon_structure\Form\PokemonForm",
 *       "edit" = "Drupal\pokemon_structure\Form\PokemonForm",
 *       "delete" = "Drupal\pokemon_structure\Form\PokemonDeleteForm",
 *     },
 *     "access" = "Drupal\pokemon_structure\PokemonAccessControlHandler",
 *     "route_provider" = {
 *       "html" = "Drupal\pokemon_structure\PokemonHtmlRouteProvider",
 *     },
 *   },
 *   base_table = "pokemon",
 *   admin_permission = "administer pokemon entities",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "name",
 *     "uuid" = "uuid",
 *     "uid" = "user_id",
 *     "langcode" = "langcode",
 *     "status" = "status",
 *   },
 *   links = {
 *     "canonical" = "/admin/structure/pokemon/{pokemon}",
 *     "add-form" = "/admin/structure/pokemon/add",
 *     "edit-form" = "/admin/structure/pokemon/{pokemon}/edit",
 *     "delete-form" = "/admin/structure/pokemon/{pokemon}/delete",
 *     "collection" = "/admin/structure/pokemon",
 *   },
 *   field_ui_base_route = "pokemon.settings"
 * )
 */
class Pokemon extends ContentEntityBase implements PokemonInterface {

  use EntityChangedTrait;

  /**
   * {@inheritdoc}
   */
  public static function preCreate(EntityStorageInterface $storage_controller, array &$values) {
    parent::preCreate($storage_controller, $values);
    $values += array(
      'user_id' => \Drupal::currentUser()->id(),
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getName() {
    return $this->get('name')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setName($name) {
    $this->set('name', $name);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getCreatedTime() {
    return $this->get('created')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setCreatedTime($timestamp) {
    $this->set('created', $timestamp);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function isPublished() {
    return (bool) $this->getEntityKey('status');
  }

  /**
   * {@inheritdoc}
   */
  public function setPublished($published) {
    $this->set('status', $published ? NODE_PUBLISHED : NODE_NOT_PUBLISHED);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {
    $fields = parent::baseFieldDefinitions($entity_type);

    $fields['name'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Name'))
      ->setDescription(t('The name of the Pokemon entity.'))
      ->setSettings(array(
        'max_length' => 50,
        'text_processing' => 0,
      ))
      ->setDefaultValue('')
      ->setDisplayOptions('view', array(
        'label' => 'above',
        'type' => 'string',
        'weight' => -4,
      ))
      ->setDisplayOptions('form', array(
        'type' => 'string_textfield',
        'weight' => -4,
      ))
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['description'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Classification'))
      ->setSettings(array(
        'max_length' => 50,
        'text_processing' => 0,
      ))
      ->setDefaultValue('')
      ->setDisplayOptions('view', array(
        'label' => 'above',
        'type' => 'string',
        'weight' => -4,
      ))
      ->setDisplayOptions('form', array(
        'type' => 'string_textfield',
        'weight' => -4,
      ))
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['caught'] = BaseFieldDefinition::create('boolean')
      ->setLabel(t('Has the pokemon been caught?'))
      ->setDescription(t('A boolean indicating whether the Pokemon is published.'))
      ->setDefaultValue(TRUE);

    $fields['created'] = BaseFieldDefinition::create('created')
      ->setLabel(t('Created'))
      ->setDescription(t('The time that the entity was created.'));

    $fields['changed'] = BaseFieldDefinition::create('changed')
      ->setLabel(t('Changed'))
      ->setDescription(t('The time that the entity was last edited.'));

    return $fields;
  }

}
