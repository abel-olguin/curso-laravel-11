<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Builder;

trait HasSearch
{
    public function searchFields()
    {
        return [];
    }

    public function scopeWithSearch(Builder $builder, $search = null)
    {
        $search = $search ?: request()->get('search');

        if (!$search) {
            return;
        }

        if (!method_exists($this, 'searchFields')) {
            abort(500, 'Search fields are not defined');
        }

        $fields       = $this->searchFields();
        $normalFields = array_filter($fields, fn($field) => !str_contains($field, '.'));
        //$relationalFields = array_filter($fields, fn($field) => str_contains($field, '.'));
        //$normalFields = collect($fields)->filter(fn($field) => !str($field)->contains('.'));
        //$relationalFields = collect($fields)->filter(fn($field) => str($field)->contains('.'));

        $relationalFields = $this->getRelationalFields($fields);

        $builder->where(function ($query) use ($search, $normalFields, $relationalFields) {
            foreach (explode(' ', $search) as $word) {// separamos todas las palabras
                $query->whereAny($normalFields, 'LIKE', "%{$word}%");
                /*foreach ($normalFields as $field) { // Lo de arriba es equivalente a esto
                    $query->OrWhere($field, 'like', "%{$word}%");
                }*/
                foreach ($relationalFields as $relation => $relationFields) {
                    $query->orWhereHas($relation,
                        fn($queryHas) => $queryHas->whereAny($relationFields, 'like', "%{$word}%")
                    );
                }
            }
        });
    }

    /**
     * @param array $fields
     * @return mixed
     */
    protected function getRelationalFields(array $fields): array
    {
        return array_reduce($fields, function ($result, $field) {
            if (str_contains($field, '.')) {   // si contiene un punto
                $parts = explode('.', $field); //separamos la cadena de texto usando el . para identificar cada elemento
                if (count($parts) !== 2) { // sino tiene solo 2 elementos mandamos un error
                    abort(500, 'Relational fields must have 2 parts');
                }

                $result[$parts[0]][] = $parts[1];
                /*
                 valor por defecto -> result = []
                 primera iteración -> result = ['categories'=> ['name']]
                 segunda iteración -> result = ['categories'=> ['name', 'id']]
                 */
                return $result;
            }
        }, []);
    }
}
