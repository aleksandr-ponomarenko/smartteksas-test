<?php

namespace Drush\Commands;

/**
 * Class UuidCommand.
 *
 * @package Drush\Commands
 */
class UuidCommand extends DrushCommands {

  /**
   * Sets a hardcoded site uuid right before `drush config:import`.
   *
   * @hook pre-command config:import
   */
  public function setUuid() {
    $staticUuidIsSet = \Drupal::state()->get('static_uuid_is_set');
    if (!$staticUuidIsSet) {
      $config_factory = \Drupal::configFactory();
      $config_factory->getEditable('system.site')->set('uuid', '97287728-566c-4f2d-90fb-b4770d40ef58')->save();
      \Drupal::state()->set('static_uuid_is_set', 1);
    }
  }

}
