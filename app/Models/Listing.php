<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Listing extends Model {
    use HasFactory;

    protected $guarded = [];
    //protected $fillable = ['title','email','company','website','location','description'];

    public function scopeFilter($query, array $filters) {
        if ($filters['tag'] ?? false) {
            $query->where('tags','like','%' . request('tag') . '%');
        };

        if ($filters['search'] ?? false) { 
            $query->where('title','like','%' . request('search') . '%')
                ->orWhere('description','like','%' . request('search') . '%')
                ->orWhere('tags','like','%' . request('search') . '%');
        };
    }
    // public static function get_listing($id) {
    //     $all = self::get_all();

    //     foreach($all as $listing) {
    //         if ($listing["id"] == $id) { return $listing; }
    //     }

    //     return "Listing not found.";
    // }

    // public static function get_all() {
    //     return [
    //         ["id" => 1, "name" => "uno",  "value" => "Lorem Ipsum dor blq blq blq"],
    //         ["id" => 2, "name" => "dos",  "value" => "Lorem Ipsum dor blq blq blq"],
    //         ["id" => 3, "name" => "tres", "value" => "Lorem Ipsum dor blq blq blq"],
    //     ];
    // }
}
