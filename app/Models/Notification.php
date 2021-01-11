<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property int $notification_type_id
 * @property int $user_id
 * @property int $creator_id
 * @property \Carbon\Carbon $dismissed_at
 * @property string $title
 * @property string $details
 * @property string $link
 * @property \Carbon\Carbon $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Notification extends Model
{
    use HasFactory, SoftDeletes;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'notification_type_id',
        'user_id',
        'creator_id',
        'dismissed_at',
        'title',
        'details',
        'link',
    ];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'                   => 'integer',
        'notification_type_id' => 'integer',
        'user_id'              => 'integer',
        'creator_id'           => 'integer',
        'dismissed_at'         => 'timestamp',
    ];
    
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function notificationType()
    {
        return $this->belongsTo(\App\Models\NotificationType::class);
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator()
    {
        
        return $this->belongsTo(\App\Models\User::class);
    }
    
    
    public function scopeWaiting($query)
    {

        // a hack for the demo
        
         if(auth()->id()) { 

            $query
                ->whereNull('dismissed_at')
                ->where(function ($query) {
                    $query->where('creator_id', auth()->id())
                        ->orwhere('user_id', auth()->id());
            });    
        }else{

            $query->whereNull('id');
        }
       
            
    }
}
