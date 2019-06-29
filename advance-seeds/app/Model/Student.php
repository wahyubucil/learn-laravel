<?php
/* MODEL ANNOTATION:
@property bigint(20) unsigned $id Type: bigint(20) unsigned, Extra: auto_increment, Default: null, Key: PRI
@property enum('1','2','3') $department Type: enum('1','2','3'), Extra: , Default: null, Key: nil
@property year(4) $generation Type: year(4), Extra: , Default: null, Key: nil
@property string $phone_number Type: varchar(255), Extra: , Default: null, Key: nil
@property bigint(20) unsigned $user_id Type: bigint(20) unsigned, Extra: , Default: null, Key: MUL
@property int|null $created_at Type: timestamp, Extra: , Default: null, Key: nil
@property int|null $updated_at Type: timestamp, Extra: , Default: null, Key: nil

END MODEL ANNOTATION */

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'nim', 'fullname', 'department', 'generation', 'email', 'phone_number'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
