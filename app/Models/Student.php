<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];


    // Define the relationship with the marks table
    public function mark()
    {
        return $this->hasMany(Mark::class);
    }

    /**
     *  Common Display Messsage Response.
     *
     * @param $resource
     * @param $message
     * @return \Illuminate\Http\JsonResponse
     */
    public static function GetMessage($resource, $message)
    {
        return response()->json([
            'message' => $message,
            'data' => $resource,
        ]);
    }

}
