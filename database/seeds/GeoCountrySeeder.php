<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Country;

class GeoCountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {  
        if (Country::count() > 0) {
            DB::table('countries')->delete();
            $this->command->info('Table Countries is Fullfiled! Go ahead...');
        } else {
            $this->command->info('Seeding Countries Table with Geolite DB CSV! Large file, wait please...');

            // Get Geolite Country DB file
            $ch = curl_init();
            
            // Geolite DB Country Source URL 
            $source = "http://geolite.maxmind.com/download/geoip/database/GeoIPCountryCSV.zip";
            curl_setopt($ch, CURLOPT_URL, $source);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $data = curl_exec ($ch);
            
            curl_close ($ch);

            // Save Geolite DV Country
            $destination = 'GeoIPCountryCSV.zip';
            $file = fopen($destination, "w+");
            fputs($file, $data);
            fclose($file);

            // Unzip Geolite zip file
            $zip = new ZipArchive;
            $res = $zip->open($destination); // zip datei
            if ($res === TRUE) {
                $zip->extractTo('.'); // verz zum entpacken
                $zip->close();
                /* echo ' zip extracted; '; */
                unlink($destination);
                /* echo ' zip deleted; '; */
            } else {
                $this->command->info('unzip failed;');
            }       

            // Load CSV file
            $filehash = fopen('GeoIPCountryWhois.csv', 'r');
            /* $filehash = fopen(__DIR__ . '/../../database/data/GeoIPCountryWhois.csv', 'r'); */

            while (($row = fgetcsv($filehash, 0, ',')) != FALSE){
                DB::table('countries')->insert(
                    array (
                        'start_ip'      => $row[0],
                        'end_ip'        => $row[1],
                        'start_long'    => $row[2],
                        'end_long'      => $row[3],
                        'country_cod'   => $row[4],
                        'country_name'  => $row[5],
                    )
                );
            }

            $this->command->info('Seeding ended! thanks...');
        }
    }
}
