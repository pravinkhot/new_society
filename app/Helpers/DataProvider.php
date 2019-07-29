<?php
namespace App\Helpers;

class DataProvider
{
    /**
     * This function is used to return Breadcrumb list
     * @return Array
     */
    public static function getBreadcrumbList(string $moduleName, string $actionName): array
    {
        $breadcrumbList[] = [
            'label' => 'Dashboard',
            'url' => route('dashboard')
        ];
        if ($moduleName == 'members') {
            $breadcrumbList[] = [
                'label' => 'Members',
                'url' => route('members.index')
            ];
            switch ($actionName) {
                case 'create':
                    $breadcrumbList[] = [
                        'label' => 'Create Member',
                    ];
                    break;

                case 'edit':
                    $breadcrumbList[] = [
                        'label' => 'Edit Member',
                    ];
                    break;
            }
        } else if ($moduleName == 'flats') {
            $breadcrumbList[] = [
                'label' => 'Flats',
                'url' => route('flats.index')
            ];
            switch ($actionName) {
                case 'create':
                    $breadcrumbList[] = [
                        'label' => 'Create Flat',
                    ];
                    break;

                case 'edit':
                    $breadcrumbList[] = [
                        'label' => 'Edit Flat',
                    ];
                    break;
            }
        }
        return $breadcrumbList;
    }
}