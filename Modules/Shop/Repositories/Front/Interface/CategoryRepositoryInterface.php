<?php

namespace Modules\Shop\Repositories\Front\Interface;

interface CategoryRepositoryInterface{
    public function findAll($options = array());
    public function findbySlug($slug);
}