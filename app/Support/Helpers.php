<?php
namespace App\Support;

use App\Models\User;

class Helper {

    /**
     * Generate Small Active Icon.
     *
     * @param null $active
     * @return string
     */
    public static function displayActiveIconList($active = null)
    {
        switch ($active) {
            case User::STATE_ACTIVE: {
                return '<i class="glyphicon glyphicon-ok text-success text-lg"></i> <span hidden>Active</span>';

            }
            case User::STATE_INACTIVE: {
                return '<i class="glyphicon glyphicon-ban-circle text-danger text-lg"></i> <span hidden>Inactive</span>';
            }
            default:
                return '';
        }
    }

    /**
     * Generate Big Active Icon.
     *
     * @param null $active
     * @return string
     */
    public static function displayActiveIconShow($active = null)
    {
        switch ($active) {
            case User::STATE_ACTIVE: {
                return '<h3><i class="glyphicon glyphicon-ok text-success"></i></h3>';

            }
            case User::STATE_INACTIVE: {
                return '<h3><i class="glyphicon glyphicon-ban-circle text-danger"></i></h3>';
            }
            default:
                return '';
        }
    }

    /**
     * Generate Role Label.
     *
     * @param $role
     * @return string
     */
    public static function displayLabelRole($role)
    {
        switch ($role) {
            case User::ROLE_ADMIN: {
                return '<span class="tag label label-success">Admin</span>';

            }
            case User::ROLE_CUSTOMER: {
                return '<span class="tag label label-info">Customer</span>';
            }
            default:
                return '';
        }
    }

    /**
     * Generate Gender Label.
     *
     * @param $gender
     * @return string
     */
    public static function displayLabelGender($gender)
    {
        switch ($gender) {
            case User::GENDER_MALE: {
                return '<span class="tag label label-primary">Male</span>';

            }
            case User::GENDER_FEMALE: {
                return '<span class="tag label label-warning">Female</span>';
            }
            default:
                return '';
        }
    }

    /**
     * Generate The Full Name of User if exists.
     *
     * @param $user
     * @return string
     */
    public static function getRealFullName($user)
    {
        $fullName = '<strike>User Deleted</strike >';
        if(!empty($user)) $fullName = '<a href = "' . route('admin.users.show', [$user->id]) . '" >'. $user->getFullName() . '</a >';

        return $fullName;
    }

    /**
     * Generate Email Link of User if exists.
     *
     * @param $contact
     * @return string
     */
    public static function findRealContactEmail($contact)
    {
        $email = $contact->email;
        if (!empty($contact->user)) $email = '<a href = "' . route('admin.users.show', [$contact->user->id]) . '" >'. $contact->user->email . '</a >';

        return $email;
    }

    /**
     * Generate Category Label.
     *
     * @param null $categories
     * @return string
     */
    public static function displayCategoriesLabel($categories = null)
    {
        return '<span class="tag label label-primary">' . $categories->count() . '</span>';
    }

    /**
     * Generate group of Category Labels.
     *
     * @param null $categories
     * @return string
     */
    public static function listingCategoryLabels($categories = null)
    {
        $result = '';
        foreach ($categories as $category) {
            $result .= '<span class="tag label label-primary">' . $category->name . '</span> ';
        }

        if (empty($result)) $result = view('admin.partials.common.alert', ['alert' => 'warning', 'message' => 'No Categories Selected'])->render();

        return $result;
    }

    /**
     * generate Tag Label.
     *
     * @param null $tags
     * @return string
     */
    public static function displayTagsLabel($tags = null)
    {
        return '<span class="tag label label-info">' . $tags->count() . '</span>';
    }

    /**
     * Generate group of Tag Labels.
     *
     * @param null $tags
     * @return string
     */
    public static function listingTagLabels($tags = null)
    {
        $result = '';
        foreach ($tags as $tag) {
            $result .= '<span class="tag label label-info">' . $tag->name . '</span> ';
        }

        if (empty($result)) $result = view('admin.partials.common.alert', ['alert' => 'warning', 'message' => 'No Categories Selected'])->render();

        return $result;
    }

    /**
     * Generate The real Title of Page.
     *
     * @param $page
     * @return string
     */
    public static function getPageTitle($page)
    {
        $title = '<strike>Page Deleted</strike >';
        if(!empty($page)) $title = '<a href = "' . route('admin.pages.show', [$page->id]) . '" >'. $page->title . '</a >';

        return $title;
    }

    /**
     * Generate The real Title of Section.
     *
     * @param $section
     * @return string
     */
    public static function getSectionTitle($section)
    {
        $title = '<strike>Section Deleted</strike >';
        if(!empty($section)) $title = '<a href = "' . route('admin.sections.show', [$section->id]) . '" >'. $section->title . '</a >';

        return $title;
    }


    /**
     * Generate Type Section Label.
     *
     * @param $gender
     * @return string
     */
    public static function displayLabelTypeSection($gender)
    {
        switch ($gender) {
            case User::GENDER_MALE: {
                return '<span class="tag label label-primary">Male</span>';

            }
            case User::GENDER_FEMALE: {
                return '<span class="tag label label-warning">Female</span>';
            }
            default:
                return '';
        }
    }
}
