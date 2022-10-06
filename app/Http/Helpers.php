<?php

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

if (! function_exists('generateToken')) {
    /**
     * Generate token.based on length.
     *
     * @param int  $length
     * @return string
     */
    function generateToken($length)
    {
        return bin2hex(random_bytes($length));
    }
}

if (! function_exists('saveImg')) {
    /**
     * Save image.to storage.
     *
     * @param object  $img
     * @param string  $folder
     * @return string
     */
    function saveImg($img, $folder = 'images')
    {
        return 'storage/'.$img->store($folder);
    }
}

if (! function_exists('removeImg')) {
    /**
     * Remove image.from storage.
     *
     * @param string  $img
     * @return void
     */
    function removeImg($img)
    {
        $img = str_replace('storage/', '', $img);
        if (file_exists(storage_path('app/public/').$img)) {
            unlink(storage_path('app/public/').$img);
        }
    }
}

if (! function_exists('removeAndSaveNewImg')) {
    /**
     * Remove image from storage and save new image to storage.
     *
     * @param string  $removeImg
     * @param string  $saveImg
     * @return string
     */
    function removeAndSaveNewImg($removeImg, $saveImg)
    {
        if ($removeImg) {
            removeImg($removeImg);
        }

        return saveImg($saveImg);
    }
}

if (! function_exists('checkRole')) {
    /**
     * Validate user's role.
     *
     * @param string  $role
     * @return bool
     */
    function checkRole($role)
    {
        return auth()->check() && auth()->user()->isAn($role);
    }
}

if (! function_exists('customPaginate')) {
    /**
     * Custom paginate for collection.
     *
     * @param mixed  $items
     * @param int  $perpage
     * @param string|null  $path
     * @param  int|null  $currentPage
     * @return Illuminate\Pagination\LengthAwarePaginator
     */
    function customPaginate($items, $perPage = 20, $path = null, $currentPage = null)
    {
        $path = $path ? $path : Paginator::resolveCurrentPage();
        $page = $currentPage ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);

        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $currentPage, [
            'path'     => $path,
            'pageName' => 'page',
        ]);
    }
}
