<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class Seller extends Model
{
    protected $fillable = ['name','email','phone','city_id','status'];
    protected $appends = array('cityName','stateName', 'createdDate');
    protected $hidden = ['city_id', 'user_id'];

    protected $casts = [
        'status' => 'boolean'
    ];
    public function getCreatedDateAttribute()
    {
        return Carbon::parse($this->created_at)->format('d-m-Y');
    }

    public function city(){
        return $this->belongsTo(City::class);
    }

    public function getCityNameAttribute(){
        return $this->city->name;
    }
    public function getStateNameAttribute(){
        return $this->city->state->name;
    }

    public function database(){
        return $this->hasOne(SellerDatabase::class);
    }
    public function createSchema()
    {
        // We will use the `statement` method from the connection class so that
        // we have access to parameter binding.
        //return DB::connection()->statement('CREATE DATABASE :schema', array('schema' => $schemaName));

        $dbName = "om_".str_replace(' ', '_', $this->cityName);
        DB::statement("create database ".$dbName);
        $model = SellerDatabase::create([
            'name' => $dbName,
            'seller_id' => $this->id,
            'status' => true,
        ]);
        // //$this->setConnection(configureConnectionByName($dbName));
        // configureConnectionByName($dbName);
        // Artisan::call('migrate', array('--database' => $dbName, '--path' => 'database/migrations/seller', '--force' => true));

    }
}
