<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cro_countrys')->insert([
            [
                "iso3"=> "AFG",
                "continente"=> "AS",
                "nombre"=> "AFGANISTÁN"
            ],
            [
                "iso3"=> "ALB",
                "continente"=> "EU",
                "nombre"=> "ALBANIA"
            ],
            [
                "iso3"=> "DEU",
                "continente"=> "EU",
                "nombre"=> "ALEMANIA"
            ],
            [
                "iso3"=> "AND",
                "continente"=> "EU",
                "nombre"=> "ANDORRA"
            ],
            [
                "iso3"=> "AGO",
                "continente"=> "AF",
                "nombre"=> "ANGOLA"
            ],
            [
                "iso3"=> "AIA",
                "continente"=> "NA",
                "nombre"=> "ANGUILA"
            ],
            [
                "iso3"=> "ATA",
                "continente"=> "AN",
                "nombre"=> "ANTÁRTIDA"
            ],
            [
                "iso3"=> "ATG",
                "continente"=> "NA",
                "nombre"=> "ANTIGUA Y BARBUDA"
            ],
            [
                "iso3"=> "SAU",
                "continente"=> "AS",
                "nombre"=> "ARABIA SAUDITA"
            ],
            [
                "iso3"=> "DZA",
                "continente"=> "AF",
                "nombre"=> "ARGELIA"
            ],
            [
                "iso3"=> "ARG",
                "continente"=> "SA",
                "nombre"=> "ARGENTINA"
            ],
            [
                "iso3"=> "ARM",
                "continente"=> "AS",
                "nombre"=> "ARMENIA"
            ],
            [
                "iso3"=> "ABW",
                "continente"=> "NA",
                "nombre"=> "ARUBA"
            ],
            [
                "iso3"=> "AUS",
                "continente"=> "OC",
                "nombre"=> "AUSTRALIA"
            ],
            [
                "iso3"=> "AUT",
                "continente"=> "EU",
                "nombre"=> "AUSTRIA"
            ],
            [
                "iso3"=> "AZE",
                "continente"=> "AS",
                "nombre"=> "AZERBAIYÁN"
            ],
            [
                "iso3"=> "BHS",
                "continente"=> "NA",
                "nombre"=> "BAHAMAS"
            ],
            [
                "iso3"=> "BGD",
                "continente"=> "AS",
                "nombre"=> "BANGLADÉS"
            ],
            [
                "iso3"=> "BRB",
                "continente"=> "NA",
                "nombre"=> "BARBADOS"
            ],
            [
                "iso3"=> "BHR",
                "continente"=> "AS",
                "nombre"=> "BARÉIN"
            ],
            [
                "iso3"=> "BEL",
                "continente"=> "EU",
                "nombre"=> "BÉLGICA"
            ],
            [
                "iso3"=> "BLZ",
                "continente"=> "NA",
                "nombre"=> "BELICE"
            ],
            [
                "iso3"=> "BEN",
                "continente"=> "AF",
                "nombre"=> "BENÍN"
            ],
            [
                "iso3"=> "BMU",
                "continente"=> "NA",
                "nombre"=> "BERMUDAS"
            ],
            [
                "iso3"=> "BLR",
                "continente"=> "EU",
                "nombre"=> "BIELORRUSIA"
            ],
            [
                "iso3"=> "BOL",
                "continente"=> "SA",
                "nombre"=> "BOLIVIA, ESTADO PLURINACIONAL DE"
            ],
            [
                "iso3"=> "BES",
                "continente"=> "NA",
                "nombre"=> "BONAIRE, SAN EUSTAQUIO Y SABA"
            ],
            [
                "iso3"=> "BIH",
                "continente"=> "EU",
                "nombre"=> "BOSNIA Y HERZEGOVINA"
            ],
            [
                "iso3"=> "BWA",
                "continente"=> "AF",
                "nombre"=> "BOTSUANA"
            ],
            [
                "iso3"=> "BRA",
                "continente"=> "SA",
                "nombre"=> "BRASIL"
            ],
            [
                "iso3"=> "BRN",
                "continente"=> "AS",
                "nombre"=> "BRUNÉI DARUSSALAM"
            ],
            [
                "iso3"=> "BGR",
                "continente"=> "EU",
                "nombre"=> "BULGARIA"
            ],
            [
                "iso3"=> "BFA",
                "continente"=> "AF",
                "nombre"=> "BURKINA FASO"
            ],
            [
                "iso3"=> "BDI",
                "continente"=> "AF",
                "nombre"=> "BURUNDI"
            ],
            [
                "iso3"=> "BTN",
                "continente"=> "AS",
                "nombre"=> "BUTÁN"
            ],
            [
                "iso3"=> "CPV",
                "continente"=> "AF",
                "nombre"=> "CABO VERDE"
            ],
            [
                "iso3"=> "KHM",
                "continente"=> "AS",
                "nombre"=> "CAMBOYA"
            ],
            [
                "iso3"=> "CMR",
                "continente"=> "AF",
                "nombre"=> "CAMERÚN"
            ],
            [
                "iso3"=> "CAN",
                "continente"=> "NA",
                "nombre"=> "CANADÁ"
            ],
            [
                "iso3"=> "TCD",
                "continente"=> "AF",
                "nombre"=> "CHAD"
            ],
            [
                "iso3"=> "CHL",
                "continente"=> "SA",
                "nombre"=> "CHILE"
            ],
            [
                "iso3"=> "CHN",
                "continente"=> "AS",
                "nombre"=> "CHINA, REPÚBLICA POPULAR"
            ],
            [
                "iso3"=> "CYP",
                "continente"=> "AS",
                "nombre"=> "CHIPRE"
            ],
            [
                "iso3"=> "COL",
                "continente"=> "SA",
                "nombre"=> "COLOMBIA"
            ],
            [
                "iso3"=> "COM",
                "continente"=> "AF",
                "nombre"=> "COMORAS"
            ],
            [
                "iso3"=> "COD",
                "continente"=> "AF",
                "nombre"=> "CONGO, LA REPÚBLICA DEMOCRÁTICA DEL"
            ],
            [
                "iso3"=> "COG",
                "continente"=> "AF",
                "nombre"=> "CONGO"
            ],
            [
                "iso3"=> "KOR",
                "continente"=> "AS",
                "nombre"=> "COREA, REPÚBLICA DE"
            ],
            [
                "iso3"=> "PRK",
                "continente"=> "AS",
                "nombre"=> "COREA, REPÚBLICA DEMOCRÁTICA POPULAR DE"
            ],
            [
                "iso3"=> "CIV",
                "continente"=> "AF",
                "nombre"=> "COSTA DE MARFIL"
            ],
            [
                "iso3"=> "CRI",
                "continente"=> "NA",
                "nombre"=> "COSTA RICA"
            ],
            [
                "iso3"=> "HRV",
                "continente"=> "EU",
                "nombre"=> "CROACIA"
            ],
            [
                "iso3"=> "CUB",
                "continente"=> "NA",
                "nombre"=> "CUBA"
            ],
            [
                "iso3"=> "CUW",
                "continente"=> "NA",
                "nombre"=> "CURAZAO"
            ],
            [
                "iso3"=> "DNK",
                "continente"=> "EU",
                "nombre"=> "DINAMARCA"
            ],
            [
                "iso3"=> "DMA",
                "continente"=> "NA",
                "nombre"=> "DOMINICA"
            ],
            [
                "iso3"=> "ECU",
                "continente"=> "SA",
                "nombre"=> "ECUADOR"
            ],
            [
                "iso3"=> "EGY",
                "continente"=> "AF",
                "nombre"=> "EGIPTO"
            ],
            [
                "iso3"=> "SLV",
                "continente"=> "NA",
                "nombre"=> "EL SALVADOR"
            ],
            [
                "iso3"=> "ARE",
                "continente"=> "AS",
                "nombre"=> "EMIRATOS ÁRABES UNIDOS"
            ],
            [
                "iso3"=> "ERI",
                "continente"=> "AF",
                "nombre"=> "ERITREA"
            ],
            [
                "iso3"=> "SVK",
                "continente"=> "EU",
                "nombre"=> "ESLOVAQUIA"
            ],
            [
                "iso3"=> "SVN",
                "continente"=> "EU",
                "nombre"=> "ESLOVENIA"
            ],
            [
                "iso3"=> "ESP",
                "continente"=> "EU",
                "nombre"=> "ESPAÑA"
            ],
            [
                "iso3"=> "USA",
                "continente"=> "NA",
                "nombre"=> "ESTADOS UNIDOS"
            ],
            [
                "iso3"=> "EST",
                "continente"=> "EU",
                "nombre"=> "ESTONIA"
            ],
            [
                "iso3"=> "ETH",
                "continente"=> "AF",
                "nombre"=> "ETIOPÍA"
            ],
            [
                "iso3"=> "RUS",
                "continente"=> "EU",
                "nombre"=> "FEDERACION RUSA"
            ],
            [
                "iso3"=> "PHL",
                "continente"=> "AS",
                "nombre"=> "FILIPINAS"
            ],
            [
                "iso3"=> "FIN",
                "continente"=> "EU",
                "nombre"=> "FINLANDIA"
            ],
            [
                "iso3"=> "FJI",
                "continente"=> "OC",
                "nombre"=> "FIYI"
            ],
            [
                "iso3"=> "FRA",
                "continente"=> "EU",
                "nombre"=> "FRANCIA"
            ],
            [
                "iso3"=> "GAB",
                "continente"=> "AF",
                "nombre"=> "GABÓN"
            ],
            [
                "iso3"=> "GMB",
                "continente"=> "AF",
                "nombre"=> "GAMBIA"
            ],
            [
                "iso3"=> "GEO",
                "continente"=> "AS",
                "nombre"=> "GEORGIA"
            ],
            [
                "iso3"=> "GHA",
                "continente"=> "AF",
                "nombre"=> "GHANA"
            ],
            [
                "iso3"=> "GIB",
                "continente"=> "EU",
                "nombre"=> "GIBRALTAR"
            ],
            [
                "iso3"=> "GRD",
                "continente"=> "NA",
                "nombre"=> "GRANADA"
            ],
            [
                "iso3"=> "GRC",
                "continente"=> "EU",
                "nombre"=> "GRECIA"
            ],
            [
                "iso3"=> "GRL",
                "continente"=> "NA",
                "nombre"=> "GROENLANDIA"
            ],
            [
                "iso3"=> "GLP",
                "continente"=> "NA",
                "nombre"=> "GUADALUPE"
            ],
            [
                "iso3"=> "GUM",
                "continente"=> "OC",
                "nombre"=> "GUAM"
            ],
            [
                "iso3"=> "GTM",
                "continente"=> "NA",
                "nombre"=> "GUATEMALA"
            ],
            [
                "iso3"=> "GUF",
                "continente"=> "SA",
                "nombre"=> "GUAYANA FRANCESA"
            ],
            [
                "iso3"=> "GGY",
                "continente"=> "EU",
                "nombre"=> "GUERNSEY"
            ],
            [
                "iso3"=> "GNB",
                "continente"=> "AF",
                "nombre"=> "GUINEA-BISÁU"
            ],
            [
                "iso3"=> "GNQ",
                "continente"=> "AF",
                "nombre"=> "GUINEA ECUATORIAL"
            ],
            [
                "iso3"=> "GIN",
                "continente"=> "AF",
                "nombre"=> "GUINEA"
            ],
            [
                "iso3"=> "GUY",
                "continente"=> "SA",
                "nombre"=> "GUYANA"
            ],
            [
                "iso3"=> "HTI",
                "continente"=> "NA",
                "nombre"=> "HAITÍ"
            ],
            [
                "iso3"=> "HND",
                "continente"=> "NA",
                "nombre"=> "HONDURAS"
            ],
            [
                "iso3"=> "HKG",
                "continente"=> "AS",
                "nombre"=> "HONG KONG"
            ],
            [
                "iso3"=> "HUN",
                "continente"=> "EU",
                "nombre"=> "HUNGRÍA"
            ],
            [
                "iso3"=> "IND",
                "continente"=> "AS",
                "nombre"=> "INDIA"
            ],
            [
                "iso3"=> "IDN",
                "continente"=> "AS",
                "nombre"=> "INDONESIA"
            ],
            [
                "iso3"=> "IRQ",
                "continente"=> "AS",
                "nombre"=> "IRAK"
            ],
            [
                "iso3"=> "IRN",
                "continente"=> "AS",
                "nombre"=> "IRÁN, REPÚBLICA ISLÁMICA DE"
            ],
            [
                "iso3"=> "IRL",
                "continente"=> "EU",
                "nombre"=> "IRLANDA"
            ],
            [
                "iso3"=> "BVT",
                "continente"=> "AN",
                "nombre"=> "ISLA BOUVET"
            ],
            [
                "iso3"=> "IMN",
                "continente"=> "EU",
                "nombre"=> "ISLA DE MAN"
            ],
            [
                "iso3"=> "CXR",
                "continente"=> "AS",
                "nombre"=> "ISLA DE NAVIDAD"
            ],
            [
                "iso3"=> "NFK",
                "continente"=> "OC",
                "nombre"=> "ISLA NORFOLK"
            ],
            [
                "iso3"=> "ISL",
                "continente"=> "EU",
                "nombre"=> "ISLANDIA"
            ],
            [
                "iso3"=> "ALA",
                "continente"=> "EU",
                "nombre"=> "ISLAS ÅLAND"
            ],
            [
                "iso3"=> "CYM",
                "continente"=> "NA",
                "nombre"=> "ISLAS CAIMÁN"
            ],
            [
                "iso3"=> "CCK",
                "continente"=> "AS",
                "nombre"=> "ISLAS COCOS (KEELING)"
            ],
            [
                "iso3"=> "COK",
                "continente"=> "OC",
                "nombre"=> "ISLAS COOK"
            ],
            [
                "iso3"=> "FLK",
                "continente"=> "SA",
                "nombre"=> "ISLAS FALKLAND (MALVINAS)"
            ],
            [
                "iso3"=> "FRO",
                "continente"=> "EU",
                "nombre"=> "ISLAS FEROE"
            ],
            [
                "iso3"=> "SGS",
                "continente"=> "AN",
                "nombre"=> "ISLAS GEORGIAS DEL SUR Y SANDWICH DEL SUR"
            ],
            [
                "iso3"=> "HMD",
                "continente"=> "AN",
                "nombre"=> "ISLAS HEARD Y MCDONALD"
            ],
            [
                "iso3"=> "MNP",
                "continente"=> "OC",
                "nombre"=> "ISLAS MARIANAS DEL NORTE"
            ],
            [
                "iso3"=> "MHL",
                "continente"=> "OC",
                "nombre"=> "ISLAS MARSHALL"
            ],
            [
                "iso3"=> "SLB",
                "continente"=> "OC",
                "nombre"=> "ISLAS SALOMÓN"
            ],
            [
                "iso3"=> "TCA",
                "continente"=> "NA",
                "nombre"=> "ISLAS TURCAS Y CAICOS"
            ],
            [
                "iso3"=> "UMI",
                "continente"=> "OC",
                "nombre"=> "ISLAS ULTRAMARINAS MENORES DE ESTADOS UNIDOS"
            ],
            [
                "iso3"=> "VGB",
                "continente"=> "NA",
                "nombre"=> "ISLAS VIRGENES BRITÁNICAS"
            ],
            [
                "iso3"=> "VIR",
                "continente"=> "NA",
                "nombre"=> "ISLAS VIRGENES DE LOS ESTADOS UNIDOS"
            ],
            [
                "iso3"=> "ISR",
                "continente"=> "AS",
                "nombre"=> "ISRAEL"
            ],
            [
                "iso3"=> "ITA",
                "continente"=> "EU",
                "nombre"=> "ITALIA"
            ],
            [
                "iso3"=> "JAM",
                "continente"=> "NA",
                "nombre"=> "JAMAICA"
            ],
            [
                "iso3"=> "JPN",
                "continente"=> "AS",
                "nombre"=> "JAPÓN"
            ],
            [
                "iso3"=> "JEY",
                "continente"=> "EU",
                "nombre"=> "JERSEY"
            ],
            [
                "iso3"=> "JOR",
                "continente"=> "AS",
                "nombre"=> "JORDANIA"
            ],
            [
                "iso3"=> "KAZ",
                "continente"=> "AS",
                "nombre"=> "KAZAJISTÁN"
            ],
            [
                "iso3"=> "KEN",
                "continente"=> "AF",
                "nombre"=> "KENIA"
            ],
            [
                "iso3"=> "KGZ",
                "continente"=> "AS",
                "nombre"=> "KIRGUISTÁN"
            ],
            [
                "iso3"=> "KIR",
                "continente"=> "OC",
                "nombre"=> "KIRIBATI"
            ],
            [
                "iso3"=> "KWT",
                "continente"=> "AS",
                "nombre"=> "KUWAIT"
            ],
            [
                "iso3"=> "LSO",
                "continente"=> "AF",
                "nombre"=> "LESOTO"
            ],
            [
                "iso3"=> "LVA",
                "continente"=> "EU",
                "nombre"=> "LETONIA"
            ],
            [
                "iso3"=> "LBN",
                "continente"=> "AS",
                "nombre"=> "LÍBANO"
            ],
            [
                "iso3"=> "LBR",
                "continente"=> "AF",
                "nombre"=> "LIBERIA"
            ],
            [
                "iso3"=> "LBY",
                "continente"=> "AF",
                "nombre"=> "LIBIA"
            ],
            [
                "iso3"=> "LIE",
                "continente"=> "EU",
                "nombre"=> "LIECHTENSTEIN"
            ],
            [
                "iso3"=> "LTU",
                "continente"=> "EU",
                "nombre"=> "LITUANIA"
            ],
            [
                "iso3"=> "LUX",
                "continente"=> "EU",
                "nombre"=> "LUXEMBURGO"
            ],
            [
                "iso3"=> "MAC",
                "continente"=> "AS",
                "nombre"=> "MACAO"
            ],
            [
                "iso3"=> "MKD",
                "continente"=> "EU",
                "nombre"=> "MACEDONIA, LA ANTIGUA REPÚBLICA YUGOSLAVA DE"
            ],
            [
                "iso3"=> "MDG",
                "continente"=> "AF",
                "nombre"=> "MADAGASCAR"
            ],
            [
                "iso3"=> "MYS",
                "continente"=> "AS",
                "nombre"=> "MALASIA"
            ],
            [
                "iso3"=> "MWI",
                "continente"=> "AF",
                "nombre"=> "MALAUI"
            ],
            [
                "iso3"=> "MDV",
                "continente"=> "AS",
                "nombre"=> "MALDIVAS"
            ],
            [
                "iso3"=> "MLI",
                "continente"=> "AF",
                "nombre"=> "MALÍ"
            ],
            [
                "iso3"=> "MLT",
                "continente"=> "EU",
                "nombre"=> "MALTA"
            ],
            [
                "iso3"=> "MAR",
                "continente"=> "AF",
                "nombre"=> "MARRUECOS"
            ],
            [
                "iso3"=> "MTQ",
                "continente"=> "NA",
                "nombre"=> "MARTINICA"
            ],
            [
                "iso3"=> "MUS",
                "continente"=> "AF",
                "nombre"=> "MAURICIO"
            ],
            [
                "iso3"=> "MRT",
                "continente"=> "AF",
                "nombre"=> "MAURITANIA"
            ],
            [
                "iso3"=> "MYT",
                "continente"=> "AF",
                "nombre"=> "MAYOTTE"
            ],
            [
                "iso3"=> "MEX",
                "continente"=> "NA",
                "nombre"=> "MÉXICO"
            ],
            [
                "iso3"=> "FSM",
                "continente"=> "OC",
                "nombre"=> "MICRONESIA, ESTADOS FEDERADOS DE"
            ],
            [
                "iso3"=> "MDA",
                "continente"=> "EU",
                "nombre"=> "MOLDAVIA, REPÚBLICA DE"
            ],
            [
                "iso3"=> "MCO",
                "continente"=> "EU",
                "nombre"=> "MÓNACO"
            ],
            [
                "iso3"=> "MNG",
                "continente"=> "AS",
                "nombre"=> "MONGOLIA"
            ],
            [
                "iso3"=> "MNE",
                "continente"=> "EU",
                "nombre"=> "MONTENEGRO"
            ],
            [
                "iso3"=> "MSR",
                "continente"=> "NA",
                "nombre"=> "MONTSERRAT"
            ],
            [
                "iso3"=> "MOZ",
                "continente"=> "AF",
                "nombre"=> "MOZAMBIQUE"
            ],
            [
                "iso3"=> "MMR",
                "continente"=> "AS",
                "nombre"=> "MYANMAR"
            ],
            [
                "iso3"=> "NAM",
                "continente"=> "AF",
                "nombre"=> "NABIMIA"
            ],
            [
                "iso3"=> "NRU",
                "continente"=> "OC",
                "nombre"=> "NAURU"
            ],
            [
                "iso3"=> "NPL",
                "continente"=> "AS",
                "nombre"=> "NEPAL"
            ],
            [
                "iso3"=> "NIC",
                "continente"=> "NA",
                "nombre"=> "NICARAGUA"
            ],
            [
                "iso3"=> "NGA",
                "continente"=> "AF",
                "nombre"=> "NIGERIA"
            ],
            [
                "iso3"=> "NER",
                "continente"=> "AF",
                "nombre"=> "NÍGER"
            ],
            [
                "iso3"=> "NIU",
                "continente"=> "OC",
                "nombre"=> "NIUE"
            ],
            [
                "iso3"=> "NOR",
                "continente"=> "EU",
                "nombre"=> "NORUEGA"
            ],
            [
                "iso3"=> "NCL",
                "continente"=> "OC",
                "nombre"=> "NUEVA CALEDONIA"
            ],
            [
                "iso3"=> "NZL",
                "continente"=> "OC",
                "nombre"=> "NUEVA ZELANDA"
            ],
            [
                "iso3"=> "OMN",
                "continente"=> "AS",
                "nombre"=> "OMÁN"
            ],
            [
                "iso3"=> "NLD",
                "continente"=> "EU",
                "nombre"=> "PAÍSES BAJOS"
            ],
            [
                "iso3"=> "PAK",
                "continente"=> "AS",
                "nombre"=> "PAKISTÁN"
            ],
            [
                "iso3"=> "PLW",
                "continente"=> "OC",
                "nombre"=> "PALAOS"
            ],
            [
                "iso3"=> "PSE",
                "continente"=> "AS",
                "nombre"=> "PALESTINA, ESTADO DE"
            ],
            [
                "iso3"=> "PAN",
                "continente"=> "NA",
                "nombre"=> "PANAMÁ"
            ],
            [
                "iso3"=> "PNG",
                "continente"=> "OC",
                "nombre"=> "PAPÚA NUEVA GUINEA"
            ],
            [
                "iso3"=> "PRY",
                "continente"=> "SA",
                "nombre"=> "PARAGUAY"
            ],
            [
                "iso3"=> "PER",
                "continente"=> "SA",
                "nombre"=> "PERÚ"
            ],
            [
                "iso3"=> "PCN",
                "continente"=> "OC",
                "nombre"=> "PITCAIRN"
            ],
            [
                "iso3"=> "PYF",
                "continente"=> "OC",
                "nombre"=> "POLINESIA FRANCESA"
            ],
            [
                "iso3"=> "POL",
                "continente"=> "EU",
                "nombre"=> "POLONIA"
            ],
            [
                "iso3"=> "PRT",
                "continente"=> "EU",
                "nombre"=> "PORTUGAL"
            ],
            [
                "iso3"=> "PRI",
                "continente"=> "NA",
                "nombre"=> "PUERTO RICO"
            ],
            [
                "iso3"=> "QAT",
                "continente"=> "AS",
                "nombre"=> "QATAR"
            ],
            [
                "iso3"=> "GBR",
                "continente"=> "EU",
                "nombre"=> "REINO UNIDO"
            ],
            [
                "iso3"=> "CAF",
                "continente"=> "AF",
                "nombre"=> "REPÚBLICA CENTROAFRICANA"
            ],
            [
                "iso3"=> "CZE",
                "continente"=> "EU",
                "nombre"=> "REPÚBLICA CHECA"
            ],
            [
                "iso3"=> "LAO",
                "continente"=> "AS",
                "nombre"=> "REPÚBLICA DEMOCRÁTICA POPULAR LAO"
            ],
            [
                "iso3"=> "DOM",
                "continente"=> "NA",
                "nombre"=> "REPÚBLICA DOMINICANA"
            ],
            [
                "iso3"=> "REU",
                "continente"=> "AF",
                "nombre"=> "REUNIÓN"
            ],
            [
                "iso3"=> "RWA",
                "continente"=> "AF",
                "nombre"=> "RUANDA"
            ],
            [
                "iso3"=> "ROU",
                "continente"=> "EU",
                "nombre"=> "RUMANIA"
            ],
            [
                "iso3"=> "ESH",
                "continente"=> "AF",
                "nombre"=> "SAHARA OCCIDENTAL"
            ],
            [
                "iso3"=> "ASM",
                "continente"=> "OC",
                "nombre"=> "SAMOA AMERICANA"
            ],
            [
                "iso3"=> "WSM",
                "continente"=> "OC",
                "nombre"=> "SAMOA"
            ],
            [
                "iso3"=> "BLM",
                "continente"=> "NA",
                "nombre"=> "SAN BARTOLOMÉ"
            ],
            [
                "iso3"=> "KNA",
                "continente"=> "NA",
                "nombre"=> "SAN CRISTÓBAL Y NIEVES"
            ],
            [
                "iso3"=> "SMR",
                "continente"=> "EU",
                "nombre"=> "SAN MARINO"
            ],
            [
                "iso3"=> "MAF",
                "continente"=> "NA",
                "nombre"=> "SAN MARTÍN (PARTE FRANCESA)"
            ],
            [
                "iso3"=> "SPM",
                "continente"=> "NA",
                "nombre"=> "SAN PEDRO Y MIQUELÓN"
            ],
            [
                "iso3"=> "VCT",
                "continente"=> "NA",
                "nombre"=> "SAN VICENTE Y LAS GRANADINAS"
            ],
            [
                "iso3"=> "SHN",
                "continente"=> "AF",
                "nombre"=> "SANTA HELENA, ASCENSIÓN Y TRISTÁN DE ACUÑA"
            ],
            [
                "iso3"=> "LCA",
                "continente"=> "NA",
                "nombre"=> "SANTA LUCÍA"
            ],
            [
                "iso3"=> "VAT",
                "continente"=> "EU",
                "nombre"=> "SANTA SEDE (CIUDAD ESTADO VATICANO)"
            ],
            [
                "iso3"=> "STP",
                "continente"=> "AF",
                "nombre"=> "SANTO TOMÉ Y PRINCIPE"
            ],
            [
                "iso3"=> "SEN",
                "continente"=> "AF",
                "nombre"=> "SENEGAL"
            ],
            [
                "iso3"=> "SRB",
                "continente"=> "EU",
                "nombre"=> "SERBIA"
            ],
            [
                "iso3"=> "SYC",
                "continente"=> "AF",
                "nombre"=> "SEYCHELLES"
            ],
            [
                "iso3"=> "SLE",
                "continente"=> "AF",
                "nombre"=> "SIERRA LEONA"
            ],
            [
                "iso3"=> "SGP",
                "continente"=> "AS",
                "nombre"=> "SINGAPUR"
            ],
            [
                "iso3"=> "SXM",
                "continente"=> "NA",
                "nombre"=> "SINT MAARTEN (PARTE NEERLANDESA)"
            ],
            [
                "iso3"=> "SYR",
                "continente"=> "AS",
                "nombre"=> "SIRIA, REPÚBLICA ARABE DE"
            ],
            [
                "iso3"=> "SOM",
                "continente"=> "AF",
                "nombre"=> "SOMALIA"
            ],
            [
                "iso3"=> "LKA",
                "continente"=> "AS",
                "nombre"=> "SRI LANKA"
            ],
            [
                "iso3"=> "SWZ",
                "continente"=> "AF",
                "nombre"=> "SUAZILANDIA"
            ],
            [
                "iso3"=> "ZAF",
                "continente"=> "AF",
                "nombre"=> "SUDÁFRICA"
            ],
            [
                "iso3"=> "SSD",
                "continente"=> "AF",
                "nombre"=> "SUDÁN DEL SUR"
            ],
            [
                "iso3"=> "SDN",
                "continente"=> "AF",
                "nombre"=> "SUDÁN"
            ],
            [
                "iso3"=> "SWE",
                "continente"=> "EU",
                "nombre"=> "SUECIA"
            ],
            [
                "iso3"=> "CHE",
                "continente"=> "EU",
                "nombre"=> "SUIZA"
            ],
            [
                "iso3"=> "SUR",
                "continente"=> "SA",
                "nombre"=> "SURINAM"
            ],
            [
                "iso3"=> "SJM",
                "continente"=> "EU",
                "nombre"=> "SVALBARD Y JAN MAYEN"
            ],
            [
                "iso3"=> "THA",
                "continente"=> "AS",
                "nombre"=> "TAILANDIA"
            ],
            [
                "iso3"=> "TWN",
                "continente"=> "AS",
                "nombre"=> "TAIWÁN, PROVINCIA DE CHINA"
            ],
            [
                "iso3"=> "TZA",
                "continente"=> "AF",
                "nombre"=> "TANZANIA, REPÚBLICA UNIDA DE"
            ],
            [
                "iso3"=> "TJK",
                "continente"=> "AS",
                "nombre"=> "TAYIKISTÁN"
            ],
            [
                "iso3"=> "IOT",
                "continente"=> "AS",
                "nombre"=> "TERRITORIO BRITÁNICO DEL OCÉANO ÍNDICO"
            ],
            [
                "iso3"=> "ATF",
                "continente"=> "AN",
                "nombre"=> "TERRITORIOS AUSTRALES FRANCESES"
            ],
            [
                "iso3"=> "TLS",
                "continente"=> "AS",
                "nombre"=> "TIMOR-LESTE"
            ],
            [
                "iso3"=> "TGO",
                "continente"=> "AF",
                "nombre"=> "TOGO"
            ],
            [
                "iso3"=> "TKL",
                "continente"=> "OC",
                "nombre"=> "TOKELAU"
            ],
            [
                "iso3"=> "TON",
                "continente"=> "OC",
                "nombre"=> "TONGA"
            ],
            [
                "iso3"=> "TTO",
                "continente"=> "NA",
                "nombre"=> "TRINIDAD Y TOBAGO"
            ],
            [
                "iso3"=> "TUN",
                "continente"=> "AF",
                "nombre"=> "TÚNEZ"
            ],
            [
                "iso3"=> "TKM",
                "continente"=> "AS",
                "nombre"=> "TURKMENISTÁN"
            ],
            [
                "iso3"=> "TUR",
                "continente"=> "EU",
                "nombre"=> "TURQUÍA"
            ],
            [
                "iso3"=> "TUV",
                "continente"=> "OC",
                "nombre"=> "TUVALU"
            ],
            [
                "iso3"=> "UKR",
                "continente"=> "EU",
                "nombre"=> "UCRANIA"
            ],
            [
                "iso3"=> "UGA",
                "continente"=> "AF",
                "nombre"=> "UGANDA"
            ],
            [
                "iso3"=> "URY",
                "continente"=> "SA",
                "nombre"=> "URUGUAY"
            ],
            [
                "iso3"=> "UZB",
                "continente"=> "AS",
                "nombre"=> "UZBEKISTÁN"
            ],
            [
                "iso3"=> "VUT",
                "continente"=> "OC",
                "nombre"=> "VANUATU"
            ],
            [
                "iso3"=> "VEN",
                "continente"=> "SA",
                "nombre"=> "VENEZUELA, REPÚBLICA BOLIVARIANA DE"
            ],
            [
                "iso3"=> "VNM",
                "continente"=> "AS",
                "nombre"=> "VIET NAM"
            ],
            [
                "iso3"=> "WLF",
                "continente"=> "OC",
                "nombre"=> "WALLIS Y FUTUNA"
            ],
            [
                "iso3"=> "YEM",
                "continente"=> "AS",
                "nombre"=> "YEMEN"
            ],
            [
                "iso3"=> "DJI",
                "continente"=> "AF",
                "nombre"=> "YIBUTI"
            ],
            [
                "iso3"=> "ZMB",
                "continente"=> "AF",
                "nombre"=> "ZAMBIA"
            ],
            [
                "iso3"=> "ZWE",
                "continente"=> "AF",
                "nombre"=> "ZIMBABUE"
            ]
        ]);
    }
}
