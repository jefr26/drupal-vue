<?php

namespace Drupal\vue\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides a 'Vue' Block.
 *
 * @Block(
 *   id = "vue_block",
 *   admin_label = @Translation("Vue block"),
 *   category = @Translation("Vue block"),
 * )
 */
class VueBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return ['label_display' => FALSE];
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $currentPath = \Drupal::request()->getSchemeAndHttpHost();

    $renderable = [
      '#theme' => 'vue',
      '#attached' => [
        'library' => [
          'vue/main'
        ],
        'drupalSettings' => [
          'vueBlock' => [
            'basePath' => $currentPath,
          ],
        ],
      ]
    ];

    return $renderable;
  }

}
