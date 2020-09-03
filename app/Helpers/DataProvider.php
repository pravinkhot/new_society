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
        } else if ($moduleName == 'expenses') {
            $breadcrumbList[] = [
                'label' => 'Expenses',
                'url' => route('expenses.index')
            ];
            switch ($actionName) {
                case 'create':
                    $breadcrumbList[] = [
                        'label' => 'Create Expense',
                    ];
                    break;

                case 'edit':
                    $breadcrumbList[] = [
                        'label' => 'Edit Expense',
                    ];
                    break;

                case 'viewInvoice':
                    $breadcrumbList[] = [
                        'label' => 'View Invoice',
                    ];
                    break;
            }
        } else if ($moduleName == 'charges') {
            $breadcrumbList[] = [
                'label' => 'Charges',
                'url' => route('charges.index')
            ];
            switch ($actionName) {
                case 'create':
                    $breadcrumbList[] = [
                        'label' => 'Create Charge',
                    ];
                    break;

                case 'edit':
                    $breadcrumbList[] = [
                        'label' => 'Edit Charge',
                    ];
                    break;
            }
        } else if ($moduleName == 'services') {
            $breadcrumbList[] = [
                'label' => 'Services',
                'url' => route('services.index')
            ];
        } else if ($moduleName == 'notices') {
            $breadcrumbList[] = [
                'label' => 'Notices',
                'url' => route('notices.index')
            ];
        }  else if ($moduleName == 'incomes') {
            $breadcrumbList[] = [
                'label' => 'Incomes',
                'url' => route('incomes.index')
            ];
        }
        return $breadcrumbList;
    }

    public static function getPaymentModeList(): array
    {
        return [
            1 => 'Cash',
            2 => 'Cheque',
            3 => 'Other'
        ];
    }
}
