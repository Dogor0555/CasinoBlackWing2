<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class ClassModel extends Model
{
    use HasFactory;
    protected $table = "class";

    static public function getRecord()
    {
        $query = ClassModel::select('class.*', 'users.name as created_by_name')
            ->join('users', 'users.id', 'class.created_by')
            ->where('class.is_delete', '=', 0);

        if (!empty(Request::get('name'))) {
            $query->where('class.name', 'like', '%' . Request::get('name') . '%');
        }

        if (!empty(Request::get('date'))) {
            $query->whereDate('class.created_at', '=', Request::get('date'));
        }

        // Solo aplicar la condición de estado si se selecciona explícitamente
        if (Request::has('status')) {
            $status = Request::get('status');
            if ($status === '0' || $status === '1') {
                $query->where('class.status', $status);
            } else {
                
            }
        }

        return $query->orderBy('class.id', 'desc')->paginate(10);
    }

    static public function getSingle($id)
    {
        return self::find($id);
    }
}