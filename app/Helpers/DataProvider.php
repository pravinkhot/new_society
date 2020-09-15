<?php

namespace App\Helpers;

use Illuminate\Support\Str;

class DataProvider
{
    /**
     * This function is used to return Breadcrumb list
     *
     * @param string $moduleName
     * @param string $actionName
     * @return array
     */
    public static function getBreadcrumbList(string $moduleName, string $actionName): array
    {
        $breadcrumbList[] = [
            'label' => 'Dashboard',
            'url' => route('dashboard')
        ];

        switch ($moduleName) {
            case 'members':
                $breadcrumbList[] = [
                    'label' => Str::title($moduleName),
                    'url' => route($moduleName.'.index')
                ];
                switch ($actionName) {
                    case 'create':
                        $breadcrumbList[] = [
                            'label' => 'Create '.Str::title(Str::singular($moduleName)),
                        ];
                        break;

                    case 'edit':
                        $breadcrumbList[] = [
                            'label' => 'Edit '.Str::title(Str::singular($moduleName)),
                        ];
                        break;
                }
                break;

            case 'wings':
            case 'services':
            case 'notices':
                $breadcrumbList[] = [
                    'label' => Str::title($moduleName),
                    'url' => route($moduleName.'.index')
                ];
                break;

            default:
                if ($moduleName == 'flats') {
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
                        case 'category':
                            $breadcrumbList[] = [
                                'label' => 'Expense Category',
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
                } else if ($moduleName == 'incomes') {
                    $breadcrumbList[] = [
                        'label' => 'Incomes',
                        'url' => route('incomes.index')
                    ];

                    switch ($actionName) {
                        case 'category':
                            $breadcrumbList[] = [
                                'label' => 'Income Category',
                            ];
                            break;
                    }
                }
                break;
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
