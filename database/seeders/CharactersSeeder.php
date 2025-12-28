<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CharactersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $characters = [// --- SPECIAL CHARACTERS (Origin Varies) ---

            ['Name' => 'Traveler', 'Element' => 'Varies'],
            ['Name' => 'Aloy', 'Element' => 'Cryo'], // Collaboration Character


            // --- MONDSTADT (Anemo Archon: Barbatos/Venti) ---

            ['Name' => 'Albedo', 'Element' => 'Geo'],
            ['Name' => 'Amber', 'Element' => 'Pyro'],
            ['Name' => 'Barbara', 'Element' => 'Hydro'],
            ['Name' => 'Bennett', 'Element' => 'Pyro'],
            ['Name' => 'Diluc', 'Element' => 'Pyro'],
            ['Name' => 'Diona', 'Element' => 'Cryo'],
            ['Name' => 'Eula', 'Element' => 'Cryo'],
            ['Name' => 'Fischl', 'Element' => 'Electro'],
            ['Name' => 'Jean', 'Element' => 'Anemo'],
            ['Name' => 'Kaeya', 'Element' => 'Cryo'],
            ['Name' => 'Klee', 'Element' => 'Pyro'],
            ['Name' => 'Lisa', 'Element' => 'Electro'],
            ['Name' => 'Mika', 'Element' => 'Cryo'],
            ['Name' => 'Mona', 'Element' => 'Hydro'],
            ['Name' => 'Noelle', 'Element' => 'Geo'],
            ['Name' => 'Razor', 'Element' => 'Electro'],
            ['Name' => 'Rosaria', 'Element' => 'Cryo'],
            ['Name' => 'Sucrose', 'Element' => 'Anemo'],
            ['Name' => 'Venti', 'Element' => 'Anemo'],


            // --- LIYUE (Geo Archon: Morax/Zhongli) ---

            ['Name' => 'Baizhu', 'Element' => 'Dendro'],
            ['Name' => 'Beidou', 'Element' => 'Electro'],
            ['Name' => 'Chongyun', 'Element' => 'Cryo'],
            ['Name' => 'Gaming', 'Element' => 'Pyro'],
            ['Name' => 'Ganyu', 'Element' => 'Cryo'],
            ['Name' => 'Hu Tao', 'Element' => 'Pyro'],
            ['Name' => 'Keqing', 'Element' => 'Electro'],
            ['Name' => 'Lan Yan', 'Element' => 'Geo'], // New Character (Liyue tie-in in v6.x)
            ['Name' => 'Ningguang', 'Element' => 'Geo'],
            ['Name' => 'Qiqi', 'Element' => 'Cryo'],
            ['Name' => 'Shenhe', 'Element' => 'Cryo'],
            ['Name' => 'Xiao', 'Element' => 'Anemo'],
            ['Name' => 'Xianyun', 'Element' => 'Anemo'],
            ['Name' => 'Xiangling', 'Element' => 'Pyro'],
            ['Name' => 'Xingqiu', 'Element' => 'Hydro'],
            ['Name' => 'Xinyan', 'Element' => 'Pyro'],
            ['Name' => 'Yanfei', 'Element' => 'Pyro'],
            ['Name' => 'Yaoyao', 'Element' => 'Dendro'],
            ['Name' => 'Yelan', 'Element' => 'Hydro'],
            ['Name' => 'Yun Jin', 'Element' => 'Geo'],
            ['Name' => 'Zhongli', 'Element' => 'Geo'],


            // --- INAZUMA (Electro Archon: Raiden Shogun/Ei) ---

            ['Name' => 'Arataki Itto', 'Element' => 'Geo'],
            ['Name' => 'Ayaka (Kamisato Ayaka)', 'Element' => 'Cryo'],
            ['Name' => 'Ayato (Kamisato Ayato)', 'Element' => 'Hydro'],
            ['Name' => 'Gorou', 'Element' => 'Geo'],
            ['Name' => 'Kazuha (Kaedehara Kazuha)', 'Element' => 'Anemo'],
            ['Name' => 'Kirara', 'Element' => 'Dendro'],
            ['Name' => 'Kokomi (Sangonomiya Kokomi)', 'Element' => 'Hydro'],
            ['Name' => 'Kujou Sara', 'Element' => 'Electro'],
            ['Name' => 'Kuki Shinobu', 'Element' => 'Electro'],
            ['Name' => 'Raiden Shogun (Ei)', 'Element' => 'Electro'],
            ['Name' => 'Sayu', 'Element' => 'Anemo'],
            ['Name' => 'Shikanoin Heizou', 'Element' => 'Anemo'], // Was missing previously
            ['Name' => 'Thoma', 'Element' => 'Pyro'],
            ['Name' => 'Wanderer', 'Element' => 'Anemo'],
            ['Name' => 'Yae Miko', 'Element' => 'Electro'],
            ['Name' => 'Yoimiya', 'Element' => 'Pyro'],


            // --- SUMERU (Dendro Archon: Nahida) ---

            ['Name' => 'Alhaitham', 'Element' => 'Dendro'],
            ['Name' => 'Candace', 'Element' => 'Hydro'],
            ['Name' => 'Collei', 'Element' => 'Dendro'],
            ['Name' => 'Cyno', 'Element' => 'Electro'],
            ['Name' => 'Dehya', 'Element' => 'Pyro'],
            ['Name' => 'Dori', 'Element' => 'Electro'],
            ['Name' => 'Faruzan', 'Element' => 'Anemo'],
            ['Name' => 'Kaveh', 'Element' => 'Dendro'],
            ['Name' => 'Layla', 'Element' => 'Cryo'],
            ['Name' => 'Nahida', 'Element' => 'Dendro'],
            ['Name' => 'Nilou', 'Element' => 'Hydro'],
            ['Name' => 'Tighnari', 'Element' => 'Dendro'],


            // --- FONTAINE (Hydro Archon: Furina) ---

            ['Name' => 'Arlecchino', 'Element' => 'Pyro'],
            ['Name' => 'Charlotte', 'Element' => 'Cryo'],
            ['Name' => 'Chevreuse', 'Element' => 'Pyro'],
            ['Name' => 'Chiori', 'Element' => 'Geo'],
            ['Name' => 'Clorinde', 'Element' => 'Electro'],
            ['Name' => 'Emilie', 'Element' => 'Dendro'],
            ['Name' => 'Escoffier', 'Element' => 'Cryo'],
            ['Name' => 'Freminet', 'Element' => 'Cryo'],
            ['Name' => 'Furina', 'Element' => 'Hydro'],
            ['Name' => 'Lyney', 'Element' => 'Pyro'],
            ['Name' => 'Lynette', 'Element' => 'Anemo'],
            ['Name' => 'Navia', 'Element' => 'Geo'],
            ['Name' => 'Neuvillette', 'Element' => 'Hydro'],
            ['Name' => 'Sethos', 'Element' => 'Electro'],
            ['Name' => 'Sigewinne', 'Element' => 'Hydro'],
            ['Name' => 'Wriothesley', 'Element' => 'Cryo'],


            // --- NOD-KRAI (New Region, v6.0-v6.x) ---

            ['Name' => 'Aino', 'Element' => 'Hydro'],
            ['Name' => 'Dahlia', 'Element' => 'Cryo'], // Character from your list
            ['Name' => 'Durin', 'Element' => 'Pyro'], // Character from your list
            ['Name' => 'Flins', 'Element' => 'Electro'],
            ['Name' => 'Ifa', 'Element' => 'Anemo'], // Character from your list
            ['Name' => 'Ineffa', 'Element' => 'Electro'], // Character from your list
            ['Name' => 'Jahoda', 'Element' => 'Anemo'],
            ['Name' => 'Lauma', 'Element' => 'Dendro'],
            ['Name' => 'Mizuki (Yumemizuki Mizuki)', 'Element' => 'Cryo'], // Character from your list
            ['Name' => 'Nefer', 'Element' => 'Dendro'], // Character from your list
            ['Name' => 'Varesa', 'Element' => 'Electro'], // Character from your list


            // --- NATLAN (Pyro Archon: Murata/Mavuika) ---

            ['Name' => 'Chasca', 'Element' => 'Pyro'], // Character from your list
            ['Name' => 'Citlali', 'Element' => 'Geo'], // Character from your list
            ['Name' => 'Iansan', 'Element' => 'Pyro'], // First teased Natlan character
            ['Name' => 'Kinich', 'Element' => 'Dendro'], // Character from your list
            ['Name' => 'Mavuika', 'Element' => 'Pyro'], // The Pyro Archon
            ['Name' => 'Mualani', 'Element' => 'Hydro'], // Character from your list
            ['Name' => 'Ororon', 'Element' => 'Electro'], // Character from your list
            ['Name' => 'Xilonen', 'Element' => 'Geo'], // Character from your list


            // --- SNEZHNAYA / FATUI (Cryo Archon: The Tsaritsa) ---

            ['Name' => 'Skirk', 'Element' => 'Cryo'], // Character with strong Fatui/Abyss ties
            ['Name' => 'Tartaglia (Childe)', 'Element' => 'Hydro'], // Fatui Harbinger
        ];

// Ensure the table is empty before insertion to prevent duplicates
        DB::table('characters')->truncate();

// Insert the data
        DB::table('characters')->insert($characters);

        Log::info('CharactersSeeder finished. ' . count($characters) . ' characters added.');
    }
}
