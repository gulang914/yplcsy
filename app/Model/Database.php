<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Database extends Model
{
    protected $table = 'database_table';
    protected $primaryKey = 'id';
    protected $fillable = [
        'table_name','table_category','table_controller','table_route','table_note','table_model','table_migrations',
        'field_type','field_name'
    ];

    public $timestamps = true;

    /**
     * 获取当前表的字段列表
     * @return \Illuminate\Database\Schema\Builder
     */
    public function getTableColumns()
    {
        return $this->getConnection()->getSchemaBuilder();
    }
}
