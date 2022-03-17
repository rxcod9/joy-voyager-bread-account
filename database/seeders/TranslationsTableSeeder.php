<?php

namespace Joy\VoyagerBreadAccount\Database\Seeders;

use Illuminate\Database\Seeder;
use Joy\VoyagerBreadAccount\Models\Account;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\MenuItem;
use TCG\Voyager\Models\Translation;

class TranslationsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        $this->dataTypesTranslations();
        $this->accountsTranslations();
        $this->menusTranslations();
    }

    /**
     * Auto generate Categories Translations.
     *
     * @return void
     */
    private function accountsTranslations()
    {
        // Adding translations for 'accounts'
        //
        $cat = Account::where('name', 'account-1')->first();
        if ($cat->exists) {
            $this->trans('pt', $this->arr(['accounts', 'name'], $cat->id), 'account-1');
            $this->trans('pt', $this->arr(['accounts', 'description'], $cat->id), 'Account 1');
        }
        $cat = Account::where('name', 'account-2')->first();
        if ($cat->exists) {
            $this->trans('pt', $this->arr(['accounts', 'name'], $cat->id), 'account-2');
            $this->trans('pt', $this->arr(['accounts', 'description'], $cat->id), 'Account 2');
        }
    }

    /**
     * Auto generate DataTypes Translations.
     *
     * @return void
     */
    private function dataTypesTranslations()
    {
        // Adding translations for 'display_name_singular'
        //
        $_fld = 'display_name_singular';
        $_tpl = ['data_types', $_fld];
        
        $dtp = DataType::where($_fld, __('joy-voyager-bread-account::seeders.data_types.category.singular'))->firstOrFail();
        if ($dtp->exists) {
            $this->trans('pt', $this->arr($_tpl, $dtp->id), 'Account');
        }

        // Adding translations for 'display_name_plural'
        //
        $_fld = 'display_name_plural';
        $_tpl = ['data_types', $_fld];
        $dtp = DataType::where($_fld, __('joy-voyager-bread-account::seeders.data_types.category.plural'))->firstOrFail();
        if ($dtp->exists) {
            $this->trans('pt', $this->arr($_tpl, $dtp->id), 'Accounts');
        }
    }

    /**
     * Auto generate Menus Translations.
     *
     * @return void
     */
    private function menusTranslations()
    {
        $_tpl = ['menu_items', 'title'];
        $_item = $this->findMenuItem(__('joy-voyager-bread-account::seeders.menu_items.accounts'));
        if ($_item->exists) {
            $this->trans('pt', $this->arr($_tpl, $_item->id), 'Accounts');
        }
    }

    private function findMenuItem($title)
    {
        return MenuItem::where('title', $title)->firstOrFail();
    }

    private function arr($par, $id)
    {
        return [
            'table_name'  => $par[0],
            'column_name' => $par[1],
            'foreign_key' => $id,
        ];
    }

    private function trans($lang, $keys, $value)
    {
        $_t = Translation::firstOrNew(array_merge($keys, [
            'locale' => $lang,
        ]));

        if (!$_t->exists) {
            $_t->fill(array_merge(
                $keys,
                ['value' => $value]
            ))->save();
        }
    }
}
