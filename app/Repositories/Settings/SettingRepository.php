<?php

namespace App\Repositories\Settings;
use App\SettingPage;
use \Exception;
use \Illuminate\Database\Eloquent\Collection;

class SettingRepository
{
    /**
     * @param int $id
     * @return SettingPage|null
     * @throws Exception
     */
    public function find(int $id): ?SettingPage
    {
        $item = SettingPage::find($id);
        if ($item) {
            return $item;
        }

        throw new Exception(trans('trans.exceptions.no_found'));
    }

    /**
     * @return SettingPage[]|Collection
     */
    public function findAll()
    {
        return SettingPage::all();
    }

    /**
     * @param string $type
     * @return SettingPage|null
     * @throws Exception
     */
    public function findByType(string $type): ?SettingPage
    {
        $item = SettingPage::where('type', $type)->first();
        if ($item) {
            return $item;
        }

        throw new Exception(trans('trans.exceptions.no_found'));
    }
}