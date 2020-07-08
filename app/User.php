<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravelista\Comments\Commenter;
use Cmgmyr\Messenger\Traits\Messagable;
use DateTime;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, Commenter, Messagable;

    const USER_NOT_SUSPENDED = 0;
    const USER_SUSPENDED = 1;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'user_image', 'user_about',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function hasRole()
    {
        return $this->role->name;
    }

    public function isAdmin()
    {
        return $this->role_id === Role::ADMIN_ROLE_ID;
    }

    public function isUser()
    {
        return $this->role_id === Role::USER_ROLE_ID;
    }

    public function hasSuspended()
    {
        return $this->user_suspended === User::USER_SUSPENDED;
    }

    public function hasActive()
    {
        return $this->user_suspended === User::USER_NOT_SUSPENDED;
    }

    /**
     * Get the items for the user.
     */
    public function items()
    {
        return $this->hasMany('App\Item');
    }

    /**
     * Get the items saved by this user
     */
    public function savedItems()
    {
        return $this->belongsToMany('App\Item')->withTimestamps();
    }

    public function hasSavedItem(int $item_id)
    {
        return DB::table('item_user')
            ->where('item_id', $item_id)
            ->where('user_id', $this->id)
            ->get()
            ->count() > 0 ? true : false;
    }

    public function subscription()
    {
        return $this->hasOne('App\Subscription');
    }

    public function hasPaidSubscription()
    {
        $today = new DateTime('now');
        $today = $today->format("Y-m-d");

        $subscription_exist = Subscription::where('user_id', $this->id)
            ->where('subscription_end_date', '>=', $today)->count();

        return $subscription_exist > 0 ? true : false;
    }

    public function canFeatureItem()
    {
        if($this->hasPaidSubscription())
        {
            $subscription = $this->subscription()->get()->first();
            $allowed_num_featured_items = intval($subscription->subscription_max_featured_listing);

            if(empty($allowed_num_featured_items))
            {
                return true;
            }
            else
            {
                $total_featured_items = $this->items()
                    ->where('item_featured', Item::ITEM_FEATURED)
                    ->get()->count();

                if($allowed_num_featured_items - $total_featured_items >= 1)
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }

        }
        elseif($this->isAdmin())
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public static function getAdmin()
    {
        return User::where('role_id', Role::ADMIN_ROLE_ID)->first();
    }
}
