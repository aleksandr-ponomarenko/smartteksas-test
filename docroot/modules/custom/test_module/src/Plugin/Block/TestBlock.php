<?php

namespace Drupal\test_module\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Block\BlockPluginInterface;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a 'Test' Block.
 *
 * @Block(
 *   id = "test_block",
 *   admin_label = @Translation("Test block"),
 *   category = @Translation("Test Task"),
 * )
 */
class TestBlock extends BlockBase implements BlockPluginInterface {

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form = parent::blockForm($form, $form_state);

    $config = $this->getConfiguration();

    $form['test_block_heading'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Heading'),
      '#description' => $this->t('Simple Heading field.'),
      '#default_value' => $config['test_block_heading'] ?? '',
    ];

    $form['test_block_copy'] = [
      '#type' => 'text_format',
      '#title' => $this->t('Copy'),
      '#description' => $this->t('Simple Copy field.'),
      '#default_value' => $config['test_block_copy']['value'] ?? '',
      '#format' => $config['test_block_copy']['format'] ?? 'basic_html',
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    parent::blockSubmit($form, $form_state);
    $values = $form_state->getValues();
    $this->configuration['test_block_heading'] = $values['test_block_heading'] ?? '';
    $this->configuration['test_block_copy'] = $values['test_block_copy'] ?? [];
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $config = $this->getConfiguration();

    return [
      [
        '#type' => 'html_tag',
        '#tag' => 'h2',
        '#value' => $config['test_block_heading'] ?? '',
      ],
      [
        '#markup' => $config['test_block_copy']['value'] ?? '',
      ],
    ];
  }

}
