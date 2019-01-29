<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Incidente extends Model
{
    protected $fillable = ['titulo','descricao','criticidade','tipo','status'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'incidentes';
}