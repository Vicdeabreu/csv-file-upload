<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    
    public function scopeClientId($query, $clientId){
        $query->where('client_id', $clientId);
    }

    protected $guarded = [];

    public function clients() {
        return $this->belongsTo('App\Client');
    }

    protected $table = 'deals';
    protected $fillable = ['deal_type', 'status', 'amount', 'signed_date', 'client_id'];
    public $timestamps = false;

    public function importToDb(){
        $path = resource_path('pending-files/*.csv');

        $g = glob($path);

        foreach (array_slice($g, 0, 1) as $file) {
            
            $data = array_map('str_getcsv', file($file));

            foreach($data as $row) {
                    //   dd($row);
                      self::updateOrCreate([
                      'id'=>$row[0]
                  ], [
                      'deal_type'=>$row[1],
                      'status'=>$row[2],
                      'amount'=>$row[3],
                      'signed_date'=>$row[4],
                      'client_id'=>$row[5][0]
                  ]);
            }

            unlink($file);
        }
    }
}
