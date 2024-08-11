<?php

namespace App\Models;

class Test {
    public static function all() {
        return [
            [
                'id' => 1,
                'title' => 'Listing One',
                'description' => 'This is Listing One, description. This is Listing One, description. This is Listing One, description.',
            ],
            [
                'id' => 2,
                'title' => 'Listing Two',
                'description' => 'This is Listing Two, description. This is Listing Two, description. This is Listing Two, description.',
            ],
            [
                'id' => 3,
                'title' => 'Listing Three',
                'description' => 'This is Listing Three, description. This is Listing Three, description. This is Listing Three, description.',
            ]
        ];
    }

    public static function find($id) {
        // return collect(self::all())->firstWhere('id', $id);
        // return $listings[$id];
        $listings = self::all();
        foreach ($listings as $listing) {
            if ($listing['id'] == $id) {
                return $listing;
            }
        }
    }
}