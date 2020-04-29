<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('room_types')->insert([
            'name' => 'Double Queen',
            'description' => 'Double Queen Beds',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('room_types')->insert([
            'name' => 'Single King',
            'description' => 'Single King Bed',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('room_types')->insert([
            'name' => 'Queen Suite',
            'description' => 'A single Queen Bed and a seating area',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('room_types')->insert([
            'name' => 'King Suite',
            'description' => 'A single King Bed and a seating area',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('rooms')->insert([
            'number' => 101,
            'room_type_id' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('rooms')->insert([
            'number' => 102,
            'room_type_id' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('rooms')->insert([
            'number' => 103,
            'room_type_id' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('rooms')->insert([
            'number' => 104,
            'room_type_id' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('rooms')->insert([
            'number' => 105,
            'room_type_id' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('rooms')->insert([
            'number' => 201,
            'room_type_id' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('rooms')->insert([
            'number' => 202,
            'room_type_id' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('rooms')->insert([
            'number' => 203,
            'room_type_id' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('rooms')->insert([
            'number' => 204,
            'room_type_id' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('rooms')->insert([
            'number' => 205,
            'room_type_id' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('rooms')->insert([
            'number' => 301,
            'room_type_id' => 3,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('rooms')->insert([
            'number' => 302,
            'room_type_id' => 3,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('rooms')->insert([
            'number' => 403,
            'room_type_id' => 4,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('rooms')->insert([
            'number' => 404,
            'room_type_id' => 4,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('discounts')->insert([
            'name' => 'Savers Special',
            'code' => 'savers',
            'discount' => 2500,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('discounts')->insert([
            'name' => 'Super Savers Special',
            'code' => 'super',
            'discount' => 5000,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('discounts')->insert([
            'name' => 'The Boss Savers Special',
            'code' => 'boss',
            'discount' => 10000,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('rates')->insert([
            'value' => 10000,
            'room_type_id' => 1,
            'is_weekend' => false,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('rates')->insert([
            'value' => 12000,
            'room_type_id' => 1,
            'is_weekend' => true,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('rates')->insert([
            'value' => 10000,
            'room_type_id' => 2,
            'is_weekend' => false,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('rates')->insert([
            'value' => 12000,
            'room_type_id' => 2,
            'is_weekend' => true,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('rates')->insert([
            'value' => 12500,
            'room_type_id' => 3,
            'is_weekend' => false,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('rates')->insert([
            'value' => 15000,
            'room_type_id' => 3,
            'is_weekend' => true,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('rates')->insert([
            'value' => 13500,
            'room_type_id' => 4,
            'is_weekend' => false,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('rates')->insert([
            'value' => 17000,
            'room_type_id' => 4,
            'is_weekend' => true,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}