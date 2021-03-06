<?php
namespace App\Helpers;

use Illuminate\Http\UploadedFile;
use App\Models\Entity as EntityModel;
use App\Models\Roles\RoleModel;
use App\Models\Wings\WingModel;
use App\Models\Flats\FlatModel;
use App\Models\FlatStatus\FlatStatusModel;
use App\Models\MemberType as MemberTypeModel;
use App\Models\Incomes\Category\CategoryModel as IncomeCategoryModel;
use App\Models\Expenses\Category\CategoryModel as ExpensesCategoryModel;
use App\Models\Charges\Period\PeriodModel;

class CommonFunction
{
	/**
     * This function is used to return role list
     * @return array
     */
    public static function getRoleList(): array
    {
        $roleModel = new RoleModel();
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
     * This function is used to return flat status list
     *
     * @return array
     */
    public static function getFlatStatusList()
    {
        $flatStatusModel = new FlatStatusModel();
        return $flatStatusModel->getFlatStatusWithNameAndId();
    }

    /**
     * This function will return list of wings
     *
     * @return array
     */
    public static function getWingList(): array
    {
        $wingModelObj = new WingModel();
        return $wingModelObj->getWingListWithNameAndId();
    }

    /**
     * This function will return list of wings
     *
     * @return array
     */
    public static function getFlatListWithWing(): array
    {
        $flatModelObj = new FlatModel();
        $flatList = $flatModelObj->getFlatList();

        $result = [];
        foreach ($flatList as $flat) {
            $result[$flat->getFlatWing->name][$flat->id] = $flat->flat_no;
        }

        return $result;
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
        $expenseCategoryModel = new ExpensesCategoryModel();
        return $expenseCategoryModel->getExpenseCategoryWithNameAndId();
    }

    /**
     * This function is used to return income category list
     *
     * @return array
     */
    public static function getIncomeCategoryWithNameAndId()
    {
        $incomeCategoryModel = new IncomeCategoryModel();
        return $incomeCategoryModel->getIncomeCategoryWithNameAndId();
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

    public static function storeFile(UploadedFile $fileData, array $otherData): string
    {
        $entityName = $otherData['entityName'] ?? null;
        $fileNameId = $otherData['fileNameId'] ?? null;
        $storageFilePath = '/'.\Session::get('user.society_id').'/'.$entityName;
        $fileData->storeAs(
            $storageFilePath,
            $fileNameId.'.'.$fileData->extension()
        );
        return $fileNameId.'.'.$fileData->extension();
    }

    /**
     * Get charge period list
     * @return array
     */
    public static function getChargePeriodList(): array
    {
        $periodModel = new PeriodModel();
        return $periodModel->getChargePeriodWithNameAndId();
    }

    /**
     * Get invoice option list
     * @return array
     */
    public static function getInvoiceOptionList(): array
    {
        return [
            1 => 'All Member',
            2 => 'Building Member',
            3 => 'One Member'
        ];
    }
}
