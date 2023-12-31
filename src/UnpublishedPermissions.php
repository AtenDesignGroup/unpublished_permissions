<?php

namespace Drupal\unpublished_permissions;

use Drupal\node\Entity\NodeType;
use Drupal\node\NodePermissions;

/**
 * Provides dynamic permissions for nodes of different types.
 */
class UnpublishedPermissions extends NodePermissions {

  /**
   * Returns a list of node permissions for a given node type.
   *
   * @param \Drupal\node\Entity\NodeType $type
   *   The node type.
   *
   * @return array
   *   An associative array of permission names and descriptions.
   */
  protected function buildPermissions(NodeType $type) {
    $permissions = parent::buildPermissions($type);

    $type_id = $type->id();
    $type_params = ['%type_name' => $type->label()];

    $permissions["view any $type_id unpublished content"] = [
      'title' => $this->t('%type_name: View any unpublished content', $type_params),
    ];
    $permissions["edit any $type_id unpublished content"] = [
      'title' => $this->t('%type_name: Edit any unpublished content', $type_params),
    ];
    $permissions["delete any $type_id unpublished content"] = [
      'title' => $this->t('%type_name: Delete any unpublished content', $type_params),
    ];

    return $permissions;
  }

}
