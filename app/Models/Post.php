<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'post_categories'); #category_posts
    }

    public function excerpt(): Attribute
    {
        // hacer un decode del json que viene en la descripción e imprimir solo el texto
        $decodedDescription = json_decode($this->description, true);// convertimos el json en un array

        $result = array_map(function ($block) {
            if ($block['type'] !== 'list') {// si no es lista agregamos text a la variable result
                return $block['data']['text'] ?? '';
            }
            
            return implode(' ', $block['data']['items']);//si es de tipo lista convertimos los elementos en un string
        }, $decodedDescription['blocks']);

        return new Attribute(
            get: fn() => str(implode(' ', $result))->excerpt(),// lo que hay en la descripcion + mundo
        );
    }
}
