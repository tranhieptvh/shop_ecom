<?php

namespace App\Repositories;

use Torann\LaravelRepository\Repositories\AbstractRepository;

class CategoryRepository extends AbstractRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    protected $model = \App\Category::class;

    public function getAllCategoriesAndRecursive() {
        return recursive($this->getBuilder()->orderBy('ordering')->get());
    }

    public function getCategoryBySlug($slug) {
        return $this->getBuilder()->where('slug', $slug)->first();
    }

    public function getChildCategories($category) {
        $category_ids = [];
        $category_ids[] = $category->id;
        if ($category->parent_id == 0) {
            $child_categories = $this->getBuilder()->select('id')->where('parent_id', $category->id)->get();
            if ($child_categories->count() > 0) {
                foreach ($child_categories as $item) {
                    $category_ids[] = $item->id;
                    $child_child_categories = $this->getBuilder()->select('id')->where('parent_id', $item->id)->get();
                    if ($child_child_categories->count() > 0) {
                        foreach ($child_child_categories as $child_item) {
                            $category_ids[] = $child_item->id;
                        }
                    }
                }
            }
        } else {
            $child_categories = $this->getBuilder()->select('id')->where('parent_id', $category->id)->get();
            if ($child_categories->count() > 0) {
                foreach ($child_categories as $item) {
                    $category_ids[] = $item->id;
                }
            }
        }

        return $category_ids;
    }

    public function getParentCategory($id) {
        $categories = [];
        $category = $this->getBuilder()->where('id', $id)->first();
        $categories[] = $category;
        if ($category->parent_id != 0) {
            $parent_category = $this->getBuilder()->where('id', $category->parent_id)->first();
            $categories[] = $parent_category;
            if ($parent_category->parent_id != 0) {
                $parent_parent_category = $this->getBuilder()->where('id', $parent_category->parent_id)->first();
                $categories[] = $parent_parent_category;
            }
        }
        return $categories;
    }
}
