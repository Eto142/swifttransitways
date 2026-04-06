<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShipmentsSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        // ─── Shipment 1 ── ZAH-6500-15171-77307 ────────────────────────────
        if (!DB::table('shipments')->where('tracking_number', 'ZAH-6500-15171-77307')->exists()) {
            $s1 = DB::table('shipments')->insertGetId([
                'tracking_number'        => 'ZAH-6500-15171-77307',
                'reference_no'           => '15171',
                'origin'                 => 'Chile',
                'destination'            => 'Taiwan',
                'shipment_date'          => '2026-01-23',
                'carrier'                => '77307',
                'shipment_mode'          => 'Air Freight',
                'shipment_type'          => 'Air Shipment',
                'package_type'           => 'Package Box',
                'product'                => 'Unknown',
                'payment_mode'           => 'Paid',
                'total_freight'          => '$550',
                'value'                  => '10',
                'currency'               => 'USD',
                'departure_time'         => '2:00 PM',
                'expected_delivery_date' => '2026-01-19',
                'pickup_date'            => '2026-01-23',
                'pickup_time'            => '4:30 PM',
                'shipper_name'           => 'Eric Wang',
                'shipper_address'        => 'Alonso de Córdova 5151, Oficina 702, 7560873 Las Condes, Región Metropolitana, Chile',
                'shipper_country'        => 'Chile',
                'shipper_phone'          => '+15640025182',
                'receiver_name'          => '林晏岑',
                'receiver_address'       => '6th Floor, No. 2, Shulin 6th Street',
                'receiver_country'       => 'Taiwan',
                'quantity'               => 5,
                'piece_type'             => 'Unknown',
                'height'                 => '14',
                'weight'                 => '9kg',
                'description'            => 'Safety Quality N Professionalism',
                'comments'               => 'Your Value Is Safe With Us',
                'status'                 => 'In Transit',
                'created_at'             => $now,
                'updated_at'             => $now,
            ]);

            DB::table('shipment_histories')->insert([
                [
                    'shipment_id' => $s1,
                    'date'        => '2026-01-20',
                    'time'        => '00:04:00',
                    'location'    => 'Bolivia',
                    'status'      => 'In Transit',
                    'remarks'     => 'Safety Qualities N Professionalism',
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ],
                [
                    'shipment_id' => $s1,
                    'date'        => '2026-01-21',
                    'time'        => '07:20:00',
                    'location'    => 'Iraq',
                    'status'      => 'In Transit',
                    'remarks'     => 'Safe Quality N Professionalism',
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ],
                [
                    'shipment_id' => $s1,
                    'date'        => '2026-01-22',
                    'time'        => '10:25:00',
                    'location'    => 'Iran',
                    'status'      => 'In Transit',
                    'remarks'     => 'Safety, Quality N Professionalism',
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ],
            ]);
        }

        // ─── Shipment 2 ── ZAH-7500-10171-77305 ────────────────────────────
        if (!DB::table('shipments')->where('tracking_number', 'ZAH-7500-10171-77305')->exists()) {
            $s2 = DB::table('shipments')->insertGetId([
                'tracking_number'        => 'ZAH-7500-10171-77305',
                'reference_no'           => '10171',
                'origin'                 => 'United States',
                'destination'            => 'Alabama',
                'shipment_date'          => '2026-03-25',
                'carrier'                => '8772',
                'shipment_mode'          => 'Expedited Open-Carrier Transport',
                'shipment_type'          => 'Expedited Open-Carrier Transport',
                'package_type'           => 'Tesla / Consignment Box',
                'product'                => 'Tesla / Consignment Box',
                'payment_mode'           => 'Paid',
                'total_freight'          => '$1,800',
                'value'                  => '60',
                'currency'               => 'USD',
                'departure_time'         => '7:30 AM',
                'expected_delivery_date' => '2026-03-21',
                'pickup_date'            => '2026-03-25',
                'pickup_time'            => '4:30 PM',
                'shipper_name'           => 'John Wick',
                'shipper_address'        => 'New York',
                'shipper_country'        => 'United States',
                'shipper_phone'          => '+16402101966',
                'receiver_name'          => 'Tresia Lancaster',
                'receiver_address'       => '3555 Lagrange Rd. Leighton, Alabama 35646',
                'receiver_city'          => 'Leighton',
                'receiver_country'       => 'United States',
                'quantity'               => 2,
                'piece_type'             => 'Tesla / Box',
                'weight'                 => '2,700+ kg',
                'description'            => 'Safe Quality And Professionalism',
                'comments'               => 'Your Value Is Safe With Us',
                'status'                 => 'In Transit',
                'created_at'             => $now,
                'updated_at'             => $now,
            ]);

            DB::table('shipment_histories')->insert([
                [
                    'shipment_id' => $s2,
                    'date'        => '2026-03-21',
                    'time'        => '07:30:00',
                    'location'    => 'Mill Neck, NY 11765',
                    'status'      => 'In Transit',
                    'remarks'     => 'STWS in possession of item',
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ],
                [
                    'shipment_id' => $s2,
                    'date'        => '2026-03-21',
                    'time'        => '13:15:00',
                    'location'    => 'Mill Neck, NY 11765',
                    'status'      => 'In Transit',
                    'remarks'     => 'Departed Post Office',
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ],
            ]);
        }

        // ─── Shipment 3 ── ZAH-7520-16171-77301 ────────────────────────────
        if (!DB::table('shipments')->where('tracking_number', 'ZAH-7520-16171-77301')->exists()) {
            $s3 = DB::table('shipments')->insertGetId([
                'tracking_number'        => 'ZAH-7520-16171-77301',
                'reference_no'           => '16171',
                'origin'                 => 'United States',
                'destination'            => 'Taiwan',
                'shipment_date'          => '2026-03-29',
                'carrier'                => '8771',
                'shipment_mode'          => 'Air Freight',
                'shipment_type'          => 'Air Shipment',
                'package_type'           => 'Consignment Box',
                'product'                => 'Consignment Box',
                'payment_mode'           => 'Paid',
                'total_freight'          => '$3,960',
                'value'                  => '65',
                'currency'               => 'USD',
                'departure_time'         => '7:30 AM',
                'expected_delivery_date' => '2026-03-26',
                'pickup_date'            => '2026-03-29',
                'pickup_time'            => '4:30 AM',
                'shipper_name'           => 'Smith Chang',
                'shipper_address'        => 'Second Street District, Austin TX 8772',
                'shipper_city'           => 'Austin',
                'shipper_country'        => 'United States',
                'shipper_phone'          => '+16865100268',
                'receiver_name'          => '楊文芳',
                'receiver_address'       => '台灣，高雄市盐埕區府北路25號11樓之11',
                'receiver_city'          => 'Kaohsiung',
                'receiver_country'       => 'Taiwan',
                'quantity'               => 4,
                'piece_type'             => 'Unknown',
                'height'                 => '14',
                'weight'                 => '15kg',
                'description'            => 'STWS in possession of item',
                'comments'               => 'Your Value Is Safe With Us',
                'status'                 => 'On Hold',
                'created_at'             => $now,
                'updated_at'             => $now,
            ]);

            DB::table('shipment_histories')->insert([
                [
                    'shipment_id' => $s3,
                    'date'        => '2026-03-26',
                    'time'        => '20:45:00',
                    'location'    => 'Mexico',
                    'status'      => 'In Transit',
                    'remarks'     => 'Your Value Is Safe With Us',
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ],
                [
                    'shipment_id' => $s3,
                    'date'        => '2026-03-27',
                    'time'        => '03:30:00',
                    'location'    => 'Iraq',
                    'status'      => 'In Transit',
                    'remarks'     => 'Your Value Is Safe With Us',
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ],
                [
                    'shipment_id' => $s3,
                    'date'        => '2026-03-27',
                    'time'        => '23:30:00',
                    'location'    => 'Iran',
                    'status'      => 'On Hold',
                    'remarks'     => 'Your Value Is Safe With Us',
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ],
            ]);
        }
    }
}
