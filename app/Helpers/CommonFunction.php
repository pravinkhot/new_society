<?php
namespace App\Helpers;

use App\Models\Entity as EntityModel;
use App\Models\Roles\RoleModel;
use App\Models\Wing as WingModel;
use App\Models\MemberType as MemberTypeModel;
use App\Models\ExpenseCategory as ExpenseCategoryModel;

class CommonFunction
{
	/**
     * This function is used to return role list
     * @return Array
     */
    public static function getRoleList(RoleModel $roleModel): array
    {
        return $roleModel->getRoleWithIdAndName();
    }

    /**
     * This function will return list of entity
     * 
     * @return array
     */
    public static function getEntityList(): array
    {
        return EntityModel::where([
                    'status' => 1,
                ])
                ->orderBy('order', 'ASC')
                ->pluck('name', 'id')
                ->toArray();
    }

    /**
     * This function will return list of entity action
     * 
     * @return array
     */
    public static function getEntityActionList(): array
    {
        return [
            'add', 'edit', 'delete', 'view'
        ];
    }

    /**
     * This function will return list of wings
     * 
     * @return array
     */
    public static function getWingList()
    {
        return WingModel::orderBy('name', 'ASC')
                ->pluck('name', 'id')
                ->toArray();
    }

    /**
     * This function is used to return member type list
     *
     * @return array
     */
    public static function getMemberTypeList()
    {
        return MemberTypeModel::pluck('name', 'id')->toArray();
    }

    /**
     * This function is used to return expense category list
     *
     * @return array
     */
    public static function getExpenseCategoryList()
    {
        return ExpenseCategoryModel::pluck('name', 'id')->toArray();
    }

    /**
     * This function is used to generate radom password
     * @param  int|integer $length 
     * @return string              
     */
    public static function randomPasswordGenerator(int $length = 8): string
    {
        $allowedAlphabets = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $passwordAlphabets = [];
        $alphabetLength = strlen($allowedAlphabets) - 1;
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphabetLength);
            $passwordAlphabets[] = $allowedAlphabets[$n];
        }
        return implode($passwordAlphabets);
    }
}
