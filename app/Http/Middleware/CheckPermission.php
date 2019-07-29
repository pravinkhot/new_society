<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Str;

use App\Models\Role as RoleModel;
use App\Models\Entity as EntityModel;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $checkPaermissionFlag)
    {
        $entityName = Str::singular($request->segment(1));
        $permissionDetails = $this->getPermissionForEntity($entityName);

        if ($checkPaermissionFlag) {
            $currentActionName = $request->route()->getActionMethod();
            $result = $this->checkCurrentActionPermission($currentActionName, $permissionDetails['currentEntityPermissions']);
            if (!$result) {
                abort(403);
            }
        }
        $request->attributes->add(['permissionDetails' => $permissionDetails]);
        return $next($request);
    }


    /**
     * @param  string $entityName
     * @return Array
     */
    private function getPermissionForEntity(string $entityName): array
    {
        $permissionDetails = [];
        $entityDetail = EntityModel::where([
            'name' => $entityName,
            'status' => 1
        ])
        ->first();

        $roleDetail = RoleModel::where([
            'id' => \Session::get('user.role_id')
        ])
        ->first();

        foreach ($roleDetail->rolePermissions ?? [] as $key => $permission) {
            $tempPermission = [
                'add' => $permission->add,
                'edit' => $permission->edit,
                'delete' => $permission->delete,
                'view' => $permission->view,
            ];
            $permissionDetails['allEntityPermissions'][$permission->entity_id] = $tempPermission;

            if (!empty($entityDetail) && ($permission->entity_id == $entityDetail->id)) {
                $permissionDetails['currentEntityPermissions'] = $tempPermission;
            }
        }
        if (empty($permissionDetails['currentEntityPermissions'])) {
            $permissionDetails['currentEntityPermissions'] = [
                'add' => 0,
                'edit' => 0,
                'delete' => 0,
                'view' => 0,
            ];
        }
        return $permissionDetails;
    }

    /**
     * @param  string $currentActionName
     * @param  array $permissionDetail
     * @return boolean
     */
    private function checkCurrentActionPermission(string $currentActionName, array $permissionDetail): bool
    {
        if (isset($permissionDetail['view']) && $permissionDetail['view'] == 0) {
            return false;
        }

        switch ($currentActionName) {
            case 'index':
            case 'show':
                if (isset($permissionDetail['view']) && $permissionDetail['view'] == 0) {
                    return false;
                }
                break;

            case 'create':
            case 'store':
                if (isset($permissionDetail['add']) && $permissionDetail['add'] == 0) {
                    return false;
                }
                break;

            case 'edit':
            case 'update':
                if (isset($permissionDetail['edit']) && $permissionDetail['edit'] == 0) {
                    return false;
                }
                break;

            case 'destroy':
                if (isset($permissionDetail['delete']) && $permissionDetail['delete'] == 0) {
                    return false;
                }
                break;
        }
        return true;
    }
}
