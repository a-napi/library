<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'about'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'updated_at',
    ];

    /**
     * Get authors associated with this book.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function authors()
    {
        return $this->belongsToMany('App\Author');
    }

    /**
     * Get ids of authors associated with this book.
     *
     * @return array
     */
    public function authorsIds()
    {
        return $this->authors->pluck('id')->toArray();
    }

    /**
     * A book has file
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function file()
    {
        return $this->hasOne('App\File');
    }

    /**
     * A book has cover
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cover()
    {
        return $this->hasOne('App\Cover');
    }

    /**
     * A book has comments.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    
    /**
     * Get genres associated with this book.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function genres()
    {
        return $this->belongsToMany('App\Genre');
    }

    /**
     * A book belongs to category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}