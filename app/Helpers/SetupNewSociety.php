<?php
namespace App\Helpers;

use App\Models\Role as RoleModel;
use App\Models\Entity as EntityModel;
use App\Models\RolePermission as RolePermissionModel;

class SetupNewSociety
{
    public function setupNewSociety()
    {
        echo 'exit';
        exit;
        $societyId = 2;
        $this->insertDefaultEntities($societyId);
        $this->insertDefaultRoles($societyId);
    }

    private function insertDefaultRoles(int $societyId): bool
    {
        RoleModel::truncate();
        $roleList = [
            [
                'name' => 'Admin',
                'description' => 'Admin Role',
                'society_id' => $societyId
            ], [
                'name' => 'Member',
                'description' => 'Member Role',
                'society_id' => $societyId
            ],
        ];
        foreach ($roleList as $role) {
            $roleModel = new RoleModel();
            $roleModel->fill($role);
            $roleModel->save();
            $this->insertDefaultRolePermissions($roleModel->id, 1, 1);
        }
        return true;
    }

    private function insertDefaultRolePermissions(int $roleId, int $societyId, int $userId): bool
    {
        $entityList = \CommonFunction::getEntityList();
        $entityActionList = \CommonFunction::getEntityActionList();
        foreach ($entityList as $key => $entity) {
            $result = [
                'role_id' => $roleId,
                'entity_id' => $key
            ];

            foreach ($entityActionList as $entityAction) {
                if ($roleId == 1) {
                    $result[$entityAction] = 1;
                } else {
                    if ($roleId == 2 && $entityAction == 'view') {
                        $result[$entityAction] = 1;
                    } else {
                        $result[$entityAction] = 0;
                    }
                }
            }
            $rolePermissionModel = new RolePermissionModel();
            $rolePermissionModel->fill($result);
            $rolePermissionModel->save();
        }
        return true;
    }

    private function insertDefaultEntities(int $societyId): bool
    {
        $entityList = [
            [
                'name' => 'member',
                'order' => 1,
                'society_id' => $societyId
            ], [
                'name' => 'wing',
                'order' => 2,
                'society_id' => $societyId
            ]
        ];

        EntityModel::truncate();
        foreach ($entityList as $entity) {
            $entityModel = new EntityModel();
            $entityModel->fill($entity);
            $entityModel->save();
        }
        return true;
    }

    private function insertEntityTypes(): bool
    {
        
    }
}
