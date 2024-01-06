<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    use HasFactory;
    
    protected $fillable = ['student_id', 'english', 'computer', 'physics', 'chemistry', 'maths'];

    // Define the relationship with the Student model
    public function student()
    {
        return $this->belongsTo(Student::class);
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
