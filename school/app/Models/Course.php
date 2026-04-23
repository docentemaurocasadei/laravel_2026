<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
class Course extends Model
{
    protected $guarded = [];
    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class);
    }
}
//creare le api per index,store,show,update,delete di un course

//creare in student un metodo search (inserire anche rotta per la ricerca 
// di uno studente con un determinato nome e cognome)