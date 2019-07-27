<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

use App\Models\Country as CountryModel;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CountryModel::truncate();
        $countryList = $this->getCountries();
        CountryModel::insert($countryList);
    }

    /**
     * Run the database seeds.
     *
     * @return array
     */
    private function getCountries(): array
    {
        return [
            [
                'name' => "Albania", 'two_digit_country_code' => "AL", 'three_digit_country_code' => "ALB", 'created_at' => Carbon::now()
            ], [
                'name' => "Algeria", 'two_digit_country_code' => "DZ", 'three_digit_country_code' => "DZA", 'created_at' => Carbon::now()
            ], [
                'name' => "American Samoa", 'two_digit_country_code' => "AS", 'three_digit_country_code' => "ASM", 'created_at' => Carbon::now()
            ], [
                'name' => "Andorra", 'two_digit_country_code' => "AD", 'three_digit_country_code' => "AND", 'created_at' => Carbon::now()
            ], [
                'name' => "Afghanistan", 'two_digit_country_code' => "AF", 'three_digit_country_code' => "AFG", 'created_at' => Carbon::now()
            ], [
                'name' => "Angola", 'two_digit_country_code' => "AO", 'three_digit_country_code' => "AGO", 'created_at' => Carbon::now()
            ], [
                'name' => "Anguilla", 'two_digit_country_code' => "AI", 'three_digit_country_code' => "AIA", 'created_at' => Carbon::now()
            ], [
                'name' => "Antarctica", 'two_digit_country_code' => "AQ", 'three_digit_country_code' => "ATA", 'created_at' => Carbon::now()
            ], [
                'name' => "Antigua and Barbuda", 'two_digit_country_code' => "AG", 'three_digit_country_code' => "ATG", 'created_at' => Carbon::now()
            ], [
                'name' => "Argentina", 'two_digit_country_code' => "AR", 'three_digit_country_code' => "ARG", 'created_at' => Carbon::now()
            ], [
                'name' => "Armenia", 'two_digit_country_code' => "AM", 'three_digit_country_code' => "ARM", 'created_at' => Carbon::now()
            ], [
                'name' => "Aruba", 'two_digit_country_code' => "AW", 'three_digit_country_code' => "ABW", 'created_at' => Carbon::now()
            ], [
                'name' => "Australia", 'two_digit_country_code' => "AU", 'three_digit_country_code' => "AUS", 'created_at' => Carbon::now()
            ], [
                'name' => "Austria", 'two_digit_country_code' => "AT", 'three_digit_country_code' => "AUT", 'created_at' => Carbon::now()
            ], [
                'name' => "Azerbaijan", 'two_digit_country_code' => "AZ", 'three_digit_country_code' => "AZE", 'created_at' => Carbon::now()
            ], [
                'name' => "Bahamas (the)", 'two_digit_country_code' => "BS", 'three_digit_country_code' => "BHS", 'created_at' => Carbon::now()
            ], [
                'name' => "Bahrain", 'two_digit_country_code' => "BH", 'three_digit_country_code' => "BHR", 'created_at' => Carbon::now()
            ], [
                'name' => "Bangladesh", 'two_digit_country_code' => "BD", 'three_digit_country_code' => "BGD", 'created_at' => Carbon::now()
            ], [
                'name' => "Barbados", 'two_digit_country_code' => "BB", 'three_digit_country_code' => "BRB", 'created_at' => Carbon::now()
            ], [
                'name' => "Belarus", 'two_digit_country_code' => "BY", 'three_digit_country_code' => "BLR", 'created_at' => Carbon::now()
            ], [
                'name' => "Belgium", 'two_digit_country_code' => "BE", 'three_digit_country_code' => "BEL", 'created_at' => Carbon::now()
            ], [
                'name' => "Belize", 'two_digit_country_code' => "BZ", 'three_digit_country_code' => "BLZ", 'created_at' => Carbon::now()
            ], [
                'name' => "Benin", 'two_digit_country_code' => "BJ", 'three_digit_country_code' => "BEN", 'created_at' => Carbon::now()
            ], [
                'name' => "Bermuda", 'two_digit_country_code' => "BM", 'three_digit_country_code' => "BMU", 'created_at' => Carbon::now()
            ], [
                'name' => "Bhutan", 'two_digit_country_code' => "BT", 'three_digit_country_code' => "BTN", 'created_at' => Carbon::now()
            ], [
                'name' => "Bolivia (Plurinational State of)", 'two_digit_country_code' => "BO", 'three_digit_country_code' => "BOL", 'created_at' => Carbon::now()
            ], [
                'name' => "Bonaire, Sint Eustatius and Saba", 'two_digit_country_code' => "BQ", 'three_digit_country_code' => "BES", 'created_at' => Carbon::now()
            ], [
                'name' => "Bosnia and Herzegovina", 'two_digit_country_code' => "BA", 'three_digit_country_code' => "BIH", 'created_at' => Carbon::now()
            ], [
                'name' => "Botswana", 'two_digit_country_code' => "BW", 'three_digit_country_code' => "BWA", 'created_at' => Carbon::now()
            ], [
                'name' => "Bouvet Island", 'two_digit_country_code' => "BV", 'three_digit_country_code' => "BVT", 'created_at' => Carbon::now()
            ], [
                'name' => "Brazil", 'two_digit_country_code' => "BR", 'three_digit_country_code' => "BRA", 'created_at' => Carbon::now()
            ], [
                'name' => "British Indian Ocean Territory (the)", 'two_digit_country_code' => "IO", 'three_digit_country_code' => "IOT", 'created_at' => Carbon::now()
            ], [
                'name' => "Brunei Darussalam", 'two_digit_country_code' => "BN", 'three_digit_country_code' => "BRN", 'created_at' => Carbon::now()
            ], [
                'name' => "Bulgaria", 'two_digit_country_code' => "BG", 'three_digit_country_code' => "BGR", 'created_at' => Carbon::now()
            ], [
                'name' => "Burkina Faso", 'two_digit_country_code' => "BF", 'three_digit_country_code' => "BFA", 'created_at' => Carbon::now()
            ], [
                'name' => "Burundi", 'two_digit_country_code' => "BI", 'three_digit_country_code' => "BDI", 'created_at' => Carbon::now()
            ], [
                'name' => "Cabo Verde", 'two_digit_country_code' => "CV", 'three_digit_country_code' => "CPV", 'created_at' => Carbon::now()
            ], [
                'name' => "Cambodia", 'two_digit_country_code' => "KH", 'three_digit_country_code' => "KHM", 'created_at' => Carbon::now()
            ], [
                'name' => "Cameroon", 'two_digit_country_code' => "CM", 'three_digit_country_code' => "CMR", 'created_at' => Carbon::now()
            ], [
                'name' => "Canada", 'two_digit_country_code' => "CA", 'three_digit_country_code' => "CAN", 'created_at' => Carbon::now()
            ], [
                'name' => "Cayman Islands (the)", 'two_digit_country_code' => "KY", 'three_digit_country_code' => "CYM", 'created_at' => Carbon::now()
            ], [
                'name' => "Central African Republic (the)", 'two_digit_country_code' => "CF", 'three_digit_country_code' => "CAF", 'created_at' => Carbon::now()
            ], [
                'name' => "Chad", 'two_digit_country_code' => "TD", 'three_digit_country_code' => "TCD", 'created_at' => Carbon::now()
            ], [
                'name' => "Chile", 'two_digit_country_code' => "CL", 'three_digit_country_code' => "CHL", 'created_at' => Carbon::now()
            ], [
                'name' => "China", 'two_digit_country_code' => "CN", 'three_digit_country_code' => "CHN", 'created_at' => Carbon::now()
            ], [
                'name' => "Christmas Island", 'two_digit_country_code' => "CX", 'three_digit_country_code' => "CXR", 'created_at' => Carbon::now()
            ], [
                'name' => "Cocos (Keeling) Islands (the)", 'two_digit_country_code' => "CC", 'three_digit_country_code' => "CCK", 'created_at' => Carbon::now()
            ], [
                'name' => "Colombia", 'two_digit_country_code' => "CO", 'three_digit_country_code' => "COL", 'created_at' => Carbon::now()
            ], [
                'name' => "Comoros (the)", 'two_digit_country_code' => "KM", 'three_digit_country_code' => "COM", 'created_at' => Carbon::now()
            ], [
                'name' => "Congo (the Democratic Republic of the)", 'two_digit_country_code' => "CD", 'three_digit_country_code' => "COD", 'created_at' => Carbon::now()
            ], [
                'name' => "Congo (the)", 'two_digit_country_code' => "CG", 'three_digit_country_code' => "COG", 'created_at' => Carbon::now()
            ], [
                'name' => "Cook Islands (the)", 'two_digit_country_code' => "CK", 'three_digit_country_code' => "COK", 'created_at' => Carbon::now()
            ], [
                'name' => "Costa Rica", 'two_digit_country_code' => "CR", 'three_digit_country_code' => "CRI", 'created_at' => Carbon::now()
            ], [
                'name' => "Croatia", 'two_digit_country_code' => "HR", 'three_digit_country_code' => "HRV", 'created_at' => Carbon::now()
            ], [
                'name' => "Cuba", 'two_digit_country_code' => "CU", 'three_digit_country_code' => "CUB", 'created_at' => Carbon::now()
            ], [
                'name' => "Curaçao", 'two_digit_country_code' => "CW", 'three_digit_country_code' => "CUW", 'created_at' => Carbon::now()
            ], [
                'name' => "Cyprus", 'two_digit_country_code' => "CY", 'three_digit_country_code' => "CYP", 'created_at' => Carbon::now()
            ], [
                'name' => "Czechia", 'two_digit_country_code' => "CZ", 'three_digit_country_code' => "CZE", 'created_at' => Carbon::now()
            ], [
                'name' => "Côte d'Ivoire", 'two_digit_country_code' => "CI", 'three_digit_country_code' => "CIV", 'created_at' => Carbon::now()
            ], [
                'name' => "Denmark", 'two_digit_country_code' => "DK", 'three_digit_country_code' => "DNK", 'created_at' => Carbon::now()
            ], [
                'name' => "Djibouti", 'two_digit_country_code' => "DJ", 'three_digit_country_code' => "DJI", 'created_at' => Carbon::now()
            ], [
                'name' => "Dominica", 'two_digit_country_code' => "DM", 'three_digit_country_code' => "DMA", 'created_at' => Carbon::now()
            ], [
                'name' => "Dominican Republic (the)", 'two_digit_country_code' => "DO", 'three_digit_country_code' => "DOM", 'created_at' => Carbon::now()
            ], [
                'name' => "Ecuador", 'two_digit_country_code' => "EC", 'three_digit_country_code' => "ECU", 'created_at' => Carbon::now()
            ], [
                'name' => "Egypt", 'two_digit_country_code' => "EG", 'three_digit_country_code' => "EGY", 'created_at' => Carbon::now()
            ], [
                'name' => "El Salvador", 'two_digit_country_code' => "SV", 'three_digit_country_code' => "SLV", 'created_at' => Carbon::now()
            ], [
                'name' => "Equatorial Guinea", 'two_digit_country_code' => "GQ", 'three_digit_country_code' => "GNQ", 'created_at' => Carbon::now()
            ], [
                'name' => "Eritrea", 'two_digit_country_code' => "ER", 'three_digit_country_code' => "ERI", 'created_at' => Carbon::now()
            ], [
                'name' => "Estonia", 'two_digit_country_code' => "EE", 'three_digit_country_code' => "EST", 'created_at' => Carbon::now()
            ], [
                'name' => "Eswatini", 'two_digit_country_code' => "SZ", 'three_digit_country_code' => "SWZ", 'created_at' => Carbon::now()
            ], [
                'name' => "Ethiopia", 'two_digit_country_code' => "ET", 'three_digit_country_code' => "ETH", 'created_at' => Carbon::now()
            ], [
                'name' => "Falkland Islands (the) [Malvinas]", 'two_digit_country_code' => "FK", 'three_digit_country_code' => "FLK", 'created_at' => Carbon::now()
            ], [
                'name' => "Faroe Islands (the)", 'two_digit_country_code' => "FO", 'three_digit_country_code' => "FRO", 'created_at' => Carbon::now()
            ], [
                'name' => "Fiji", 'two_digit_country_code' => "FJ", 'three_digit_country_code' => "FJI", 'created_at' => Carbon::now()
            ], [
                'name' => "Finland", 'two_digit_country_code' => "FI", 'three_digit_country_code' => "FIN", 'created_at' => Carbon::now()
            ], [
                'name' => "France", 'two_digit_country_code' => "FR", 'three_digit_country_code' => "FRA", 'created_at' => Carbon::now()
            ], [
                'name' => "French Guiana", 'two_digit_country_code' => "GF", 'three_digit_country_code' => "GUF", 'created_at' => Carbon::now()
            ], [
                'name' => "French Polynesia", 'two_digit_country_code' => "PF", 'three_digit_country_code' => "PYF", 'created_at' => Carbon::now()
            ], [
                'name' => "French Southern Territories (the)", 'two_digit_country_code' => "TF", 'three_digit_country_code' => "ATF", 'created_at' => Carbon::now()
            ], [
                'name' => "Gabon", 'two_digit_country_code' => "GA", 'three_digit_country_code' => "GAB", 'created_at' => Carbon::now()
            ], [
                'name' => "Gambia (the)", 'two_digit_country_code' => "GM", 'three_digit_country_code' => "GMB", 'created_at' => Carbon::now()
            ], [
                'name' => "Georgia", 'two_digit_country_code' => "GE", 'three_digit_country_code' => "GEO", 'created_at' => Carbon::now()
            ], [
                'name' => "Germany", 'two_digit_country_code' => "DE", 'three_digit_country_code' => "DEU", 'created_at' => Carbon::now()
            ], [
                'name' => "Ghana", 'two_digit_country_code' => "GH", 'three_digit_country_code' => "GHA", 'created_at' => Carbon::now()
            ], [
                'name' => "Gibraltar", 'two_digit_country_code' => "GI", 'three_digit_country_code' => "GIB", 'created_at' => Carbon::now()
            ], [
                'name' => "Greece", 'two_digit_country_code' => "GR", 'three_digit_country_code' => "GRC", 'created_at' => Carbon::now()
            ], [
                'name' => "Greenland", 'two_digit_country_code' => "GL", 'three_digit_country_code' => "GRL", 'created_at' => Carbon::now()
            ], [
                'name' => "Grenada", 'two_digit_country_code' => "GD", 'three_digit_country_code' => "GRD", 'created_at' => Carbon::now()
            ], [
                'name' => "Guadeloupe", 'two_digit_country_code' => "GP", 'three_digit_country_code' => "GLP", 'created_at' => Carbon::now()
            ], [
                'name' => "Guam", 'two_digit_country_code' => "GU", 'three_digit_country_code' => "GUM", 'created_at' => Carbon::now()
            ], [
                'name' => "Guatemala", 'two_digit_country_code' => "GT", 'three_digit_country_code' => "GTM", 'created_at' => Carbon::now()
            ], [
                'name' => "Guernsey", 'two_digit_country_code' => "GG", 'three_digit_country_code' => "GGY", 'created_at' => Carbon::now()
            ], [
                'name' => "Guinea", 'two_digit_country_code' => "GN", 'three_digit_country_code' => "GIN", 'created_at' => Carbon::now()
            ], [
                'name' => "Guinea-Bissau", 'two_digit_country_code' => "GW", 'three_digit_country_code' => "GNB", 'created_at' => Carbon::now()
            ], [
                'name' => "Guyana", 'two_digit_country_code' => "GY", 'three_digit_country_code' => "GUY", 'created_at' => Carbon::now()
            ], [
                'name' => "Haiti", 'two_digit_country_code' => "HT", 'three_digit_country_code' => "HTI", 'created_at' => Carbon::now()
            ], [
                'name' => "Heard Island and McDonald Islands", 'two_digit_country_code' => "HM", 'three_digit_country_code' => "HMD", 'created_at' => Carbon::now()
            ], [
                'name' => "Holy See (the)", 'two_digit_country_code' => "VA", 'three_digit_country_code' => "VAT", 'created_at' => Carbon::now()
            ], [
                'name' => "Honduras", 'two_digit_country_code' => "HN", 'three_digit_country_code' => "HND", 'created_at' => Carbon::now()
            ], [
                'name' => "Hong Kong", 'two_digit_country_code' => "HK", 'three_digit_country_code' => "HKG", 'created_at' => Carbon::now()
            ], [
                'name' => "Hungary", 'two_digit_country_code' => "HU", 'three_digit_country_code' => "HUN", 'created_at' => Carbon::now()
            ], [
                'name' => "Iceland", 'two_digit_country_code' => "IS", 'three_digit_country_code' => "ISL", 'created_at' => Carbon::now()
            ], [
                'name' => "India", 'two_digit_country_code' => "IN", 'three_digit_country_code' => "IND", 'created_at' => Carbon::now()
            ], [
                'name' => "Indonesia", 'two_digit_country_code' => "ID", 'three_digit_country_code' => "IDN", 'created_at' => Carbon::now()
            ], [
                'name' => "Iran (Islamic Republic of)", 'two_digit_country_code' => "IR", 'three_digit_country_code' => "IRN", 'created_at' => Carbon::now()
            ], [
                'name' => "Iraq", 'two_digit_country_code' => "IQ", 'three_digit_country_code' => "IRQ", 'created_at' => Carbon::now()
            ], [
                'name' => "Ireland", 'two_digit_country_code' => "IE", 'three_digit_country_code' => "IRL", 'created_at' => Carbon::now()
            ], [
                'name' => "Isle of Man", 'two_digit_country_code' => "IM", 'three_digit_country_code' => "IMN", 'created_at' => Carbon::now()
            ], [
                'name' => "Israel", 'two_digit_country_code' => "IL", 'three_digit_country_code' => "ISR", 'created_at' => Carbon::now()
            ], [
                'name' => "Italy", 'two_digit_country_code' => "IT", 'three_digit_country_code' => "ITA", 'created_at' => Carbon::now()
            ], [
                'name' => "Jamaica", 'two_digit_country_code' => "JM", 'three_digit_country_code' => "JAM", 'created_at' => Carbon::now()
            ], [
                'name' => "Japan", 'two_digit_country_code' => "JP", 'three_digit_country_code' => "JPN", 'created_at' => Carbon::now()
            ], [
                'name' => "Jersey", 'two_digit_country_code' => "JE", 'three_digit_country_code' => "JEY", 'created_at' => Carbon::now()
            ], [
                'name' => "Jordan", 'two_digit_country_code' => "JO", 'three_digit_country_code' => "JOR", 'created_at' => Carbon::now()
            ], [
                'name' => "Kazakhstan", 'two_digit_country_code' => "KZ", 'three_digit_country_code' => "KAZ", 'created_at' => Carbon::now()
            ], [
                'name' => "Kenya", 'two_digit_country_code' => "KE", 'three_digit_country_code' => "KEN", 'created_at' => Carbon::now()
            ], [
                'name' => "Kiribati", 'two_digit_country_code' => "KI", 'three_digit_country_code' => "KIR", 'created_at' => Carbon::now()
            ], [
                'name' => "Korea (the Democratic People's Republic of)", 'two_digit_country_code' => "KP", 'three_digit_country_code' => "PRK", 'created_at' => Carbon::now()
            ], [
                'name' => "Korea (the Republic of)", 'two_digit_country_code' => "KR", 'three_digit_country_code' => "KOR", 'created_at' => Carbon::now()
            ], [
                'name' => "Kuwait", 'two_digit_country_code' => "KW", 'three_digit_country_code' => "KWT", 'created_at' => Carbon::now()
            ], [
                'name' => "Kyrgyzstan", 'two_digit_country_code' => "KG", 'three_digit_country_code' => "KGZ", 'created_at' => Carbon::now()
            ], [
                'name' => "Lao People's Democratic Republic (the)", 'two_digit_country_code' => "LA", 'three_digit_country_code' => "LAO", 'created_at' => Carbon::now()
            ], [
                'name' => "Latvia", 'two_digit_country_code' => "LV", 'three_digit_country_code' => "LVA", 'created_at' => Carbon::now()
            ], [
                'name' => "Lebanon", 'two_digit_country_code' => "LB", 'three_digit_country_code' => "LBN", 'created_at' => Carbon::now()
            ], [
                'name' => "Lesotho", 'two_digit_country_code' => "LS", 'three_digit_country_code' => "LSO", 'created_at' => Carbon::now()
            ], [
                'name' => "Liberia", 'two_digit_country_code' => "LR", 'three_digit_country_code' => "LBR", 'created_at' => Carbon::now()
            ], [
                'name' => "Libya", 'two_digit_country_code' => "LY", 'three_digit_country_code' => "LBY", 'created_at' => Carbon::now()
            ], [
                'name' => "Liechtenstein", 'two_digit_country_code' => "LI", 'three_digit_country_code' => "LIE", 'created_at' => Carbon::now()
            ], [
                'name' => "Lithuania", 'two_digit_country_code' => "LT", 'three_digit_country_code' => "LTU", 'created_at' => Carbon::now()
            ], [
                'name' => "Luxembourg", 'two_digit_country_code' => "LU", 'three_digit_country_code' => "LUX", 'created_at' => Carbon::now()
            ], [
                'name' => "Macao", 'two_digit_country_code' => "MO", 'three_digit_country_code' => "MAC", 'created_at' => Carbon::now()
            ], [
                'name' => "Macedonia (the former Yugoslav Republic of)", 'two_digit_country_code' => "MK", 'three_digit_country_code' => "MKD", 'created_at' => Carbon::now()
            ], [
                'name' => "Madagascar", 'two_digit_country_code' => "MG", 'three_digit_country_code' => "MDG", 'created_at' => Carbon::now()
            ], [
                'name' => "Malawi", 'two_digit_country_code' => "MW", 'three_digit_country_code' => "MWI", 'created_at' => Carbon::now()
            ], [
                'name' => "Malaysia", 'two_digit_country_code' => "MY", 'three_digit_country_code' => "MYS", 'created_at' => Carbon::now()
            ], [
                'name' => "Maldives", 'two_digit_country_code' => "MV", 'three_digit_country_code' => "MDV", 'created_at' => Carbon::now()
            ], [
                'name' => "Mali", 'two_digit_country_code' => "ML", 'three_digit_country_code' => "MLI", 'created_at' => Carbon::now()
            ], [
                'name' => "Malta", 'two_digit_country_code' => "MT", 'three_digit_country_code' => "MLT", 'created_at' => Carbon::now()
            ], [
                'name' => "Marshall Islands (the)", 'two_digit_country_code' => "MH", 'three_digit_country_code' => "MHL", 'created_at' => Carbon::now()
            ], [
                'name' => "Martinique", 'two_digit_country_code' => "MQ", 'three_digit_country_code' => "MTQ", 'created_at' => Carbon::now()
            ], [
                'name' => "Mauritania", 'two_digit_country_code' => "MR", 'three_digit_country_code' => "MRT", 'created_at' => Carbon::now()
            ], [
                'name' => "Mauritius", 'two_digit_country_code' => "MU", 'three_digit_country_code' => "MUS", 'created_at' => Carbon::now()
            ], [
                'name' => "Mayotte", 'two_digit_country_code' => "YT", 'three_digit_country_code' => "MYT", 'created_at' => Carbon::now()
            ], [
                'name' => "Mexico", 'two_digit_country_code' => "MX", 'three_digit_country_code' => "MEX", 'created_at' => Carbon::now()
            ], [
                'name' => "Micronesia (Federated States of)", 'two_digit_country_code' => "FM", 'three_digit_country_code' => "FSM", 'created_at' => Carbon::now()
            ], [
                'name' => "Moldova (the Republic of)", 'two_digit_country_code' => "MD", 'three_digit_country_code' => "MDA", 'created_at' => Carbon::now()
            ], [
                'name' => "Monaco", 'two_digit_country_code' => "MC", 'three_digit_country_code' => "MCO", 'created_at' => Carbon::now()
            ], [
                'name' => "Mongolia", 'two_digit_country_code' => "MN", 'three_digit_country_code' => "MNG", 'created_at' => Carbon::now()
            ], [
                'name' => "Montenegro", 'two_digit_country_code' => "ME", 'three_digit_country_code' => "MNE", 'created_at' => Carbon::now()
            ], [
                'name' => "Montserrat", 'two_digit_country_code' => "MS", 'three_digit_country_code' => "MSR", 'created_at' => Carbon::now()
            ], [
                'name' => "Morocco", 'two_digit_country_code' => "MA", 'three_digit_country_code' => "MAR", 'created_at' => Carbon::now()
            ], [
                'name' => "Mozambique", 'two_digit_country_code' => "MZ", 'three_digit_country_code' => "MOZ", 'created_at' => Carbon::now()
            ], [
                'name' => "Myanmar", 'two_digit_country_code' => "MM", 'three_digit_country_code' => "MMR", 'created_at' => Carbon::now()
            ], [
                'name' => "Namibia", 'two_digit_country_code' => "NA", 'three_digit_country_code' => "NAM", 'created_at' => Carbon::now()
            ], [
                'name' => "Nauru", 'two_digit_country_code' => "NR", 'three_digit_country_code' => "NRU", 'created_at' => Carbon::now()
            ], [
                'name' => "Nepal", 'two_digit_country_code' => "NP", 'three_digit_country_code' => "NPL", 'created_at' => Carbon::now()
            ], [
                'name' => "Netherlands (the)", 'two_digit_country_code' => "NL", 'three_digit_country_code' => "NLD", 'created_at' => Carbon::now()
            ], [
                'name' => "New Caledonia", 'two_digit_country_code' => "NC", 'three_digit_country_code' => "NCL", 'created_at' => Carbon::now()
            ], [
                'name' => "New Zealand", 'two_digit_country_code' => "NZ", 'three_digit_country_code' => "NZL", 'created_at' => Carbon::now()
            ], [
                'name' => "Nicaragua", 'two_digit_country_code' => "NI", 'three_digit_country_code' => "NIC", 'created_at' => Carbon::now()
            ], [
                'name' => "Niger (the)", 'two_digit_country_code' => "NE", 'three_digit_country_code' => "NER", 'created_at' => Carbon::now()
            ], [
                'name' => "Nigeria", 'two_digit_country_code' => "NG", 'three_digit_country_code' => "NGA", 'created_at' => Carbon::now()
            ], [
                'name' => "Niue", 'two_digit_country_code' => "NU", 'three_digit_country_code' => "NIU", 'created_at' => Carbon::now()
            ], [
                'name' => "Norfolk Island", 'two_digit_country_code' => "NF", 'three_digit_country_code' => "NFK", 'created_at' => Carbon::now()
            ], [
                'name' => "Northern Mariana Islands (the)", 'two_digit_country_code' => "MP", 'three_digit_country_code' => "MNP", 'created_at' => Carbon::now()
            ], [
                'name' => "Norway", 'two_digit_country_code' => "NO", 'three_digit_country_code' => "NOR", 'created_at' => Carbon::now()
            ], [
                'name' => "Oman", 'two_digit_country_code' => "OM", 'three_digit_country_code' => "OMN", 'created_at' => Carbon::now()
            ], [
                'name' => "Pakistan", 'two_digit_country_code' => "PK", 'three_digit_country_code' => "PAK", 'created_at' => Carbon::now()
            ], [
                'name' => "Palau", 'two_digit_country_code' => "PW", 'three_digit_country_code' => "PLW", 'created_at' => Carbon::now()
            ], [
                'name' => "Palestine, State of", 'two_digit_country_code' => "PS", 'three_digit_country_code' => "PSE", 'created_at' => Carbon::now()
            ], [
                'name' => "Panama", 'two_digit_country_code' => "PA", 'three_digit_country_code' => "PAN", 'created_at' => Carbon::now()
            ], [
                'name' => "Papua New Guinea", 'two_digit_country_code' => "PG", 'three_digit_country_code' => "PNG", 'created_at' => Carbon::now()
            ], [
                'name' => "Paraguay", 'two_digit_country_code' => "PY", 'three_digit_country_code' => "PRY", 'created_at' => Carbon::now()
            ], [
                'name' => "Peru", 'two_digit_country_code' => "PE", 'three_digit_country_code' => "PER", 'created_at' => Carbon::now()
            ], [
                'name' => "Philippines (the)", 'two_digit_country_code' => "PH", 'three_digit_country_code' => "PHL", 'created_at' => Carbon::now()
            ], [
                'name' => "Pitcairn", 'two_digit_country_code' => "PN", 'three_digit_country_code' => "PCN", 'created_at' => Carbon::now()
            ], [
                'name' => "Poland", 'two_digit_country_code' => "PL", 'three_digit_country_code' => "POL", 'created_at' => Carbon::now()
            ], [
                'name' => "Portugal", 'two_digit_country_code' => "PT", 'three_digit_country_code' => "PRT", 'created_at' => Carbon::now()
            ], [
                'name' => "Puerto Rico", 'two_digit_country_code' => "PR", 'three_digit_country_code' => "PRI", 'created_at' => Carbon::now()
            ], [
                'name' => "Qatar", 'two_digit_country_code' => "QA", 'three_digit_country_code' => "QAT", 'created_at' => Carbon::now()
            ], [
                'name' => "Romania", 'two_digit_country_code' => "RO", 'three_digit_country_code' => "ROU", 'created_at' => Carbon::now()
            ], [
                'name' => "Russian Federation (the)", 'two_digit_country_code' => "RU", 'three_digit_country_code' => "RUS", 'created_at' => Carbon::now()
            ], [
                'name' => "Rwanda", 'two_digit_country_code' => "RW", 'three_digit_country_code' => "RWA", 'created_at' => Carbon::now()
            ], [
                'name' => "Réunion", 'two_digit_country_code' => "RE", 'three_digit_country_code' => "REU", 'created_at' => Carbon::now()
            ], [
                'name' => "Saint Barthélemy", 'two_digit_country_code' => "BL", 'three_digit_country_code' => "BLM", 'created_at' => Carbon::now()
            ], [
                'name' => "Saint Helena, Ascension and Tristan da Cunha", 'two_digit_country_code' => "SH", 'three_digit_country_code' => "SHN", 'created_at' => Carbon::now()
            ], [
                'name' => "Saint Kitts and Nevis", 'two_digit_country_code' => "KN", 'three_digit_country_code' => "KNA", 'created_at' => Carbon::now()
            ], [
                'name' => "Saint Lucia", 'two_digit_country_code' => "LC", 'three_digit_country_code' => "LCA", 'created_at' => Carbon::now()
            ], [
                'name' => "Saint Martin (French part)", 'two_digit_country_code' => "MF", 'three_digit_country_code' => "MAF", 'created_at' => Carbon::now()
            ], [
                'name' => "Saint Pierre and Miquelon", 'two_digit_country_code' => "PM", 'three_digit_country_code' => "SPM", 'created_at' => Carbon::now()
            ], [
                'name' => "Saint Vincent and the Grenadines", 'two_digit_country_code' => "VC", 'three_digit_country_code' => "VCT", 'created_at' => Carbon::now()
            ], [
                'name' => "Samoa", 'two_digit_country_code' => "WS", 'three_digit_country_code' => "WSM", 'created_at' => Carbon::now()
            ], [
                'name' => "San Marino", 'two_digit_country_code' => "SM", 'three_digit_country_code' => "SMR", 'created_at' => Carbon::now()
            ], [
                'name' => "Sao Tome and Principe", 'two_digit_country_code' => "ST", 'three_digit_country_code' => "STP", 'created_at' => Carbon::now()
            ], [
                'name' => "Saudi Arabia", 'two_digit_country_code' => "SA", 'three_digit_country_code' => "SAU", 'created_at' => Carbon::now()
            ], [
                'name' => "Senegal", 'two_digit_country_code' => "SN", 'three_digit_country_code' => "SEN", 'created_at' => Carbon::now()
            ], [
                'name' => "Serbia", 'two_digit_country_code' => "RS", 'three_digit_country_code' => "SRB", 'created_at' => Carbon::now()
            ], [
                'name' => "Seychelles", 'two_digit_country_code' => "SC", 'three_digit_country_code' => "SYC", 'created_at' => Carbon::now()
            ], [
                'name' => "Sierra Leone", 'two_digit_country_code' => "SL", 'three_digit_country_code' => "SLE", 'created_at' => Carbon::now()
            ], [
                'name' => "Singapore", 'two_digit_country_code' => "SG", 'three_digit_country_code' => "SGP", 'created_at' => Carbon::now()
            ], [
                'name' => "Sint Maarten (Dutch part)", 'two_digit_country_code' => "SX", 'three_digit_country_code' => "SXM", 'created_at' => Carbon::now()
            ], [
                'name' => "Slovakia", 'two_digit_country_code' => "SK", 'three_digit_country_code' => "SVK", 'created_at' => Carbon::now()
            ], [
                'name' => "Slovenia", 'two_digit_country_code' => "SI", 'three_digit_country_code' => "SVN", 'created_at' => Carbon::now()
            ], [
                'name' => "Solomon Islands", 'two_digit_country_code' => "SB", 'three_digit_country_code' => "SLB", 'created_at' => Carbon::now()
            ], [
                'name' => "Somalia", 'two_digit_country_code' => "SO", 'three_digit_country_code' => "SOM", 'created_at' => Carbon::now()
            ], [
                'name' => "South Africa", 'two_digit_country_code' => "ZA", 'three_digit_country_code' => "ZAF", 'created_at' => Carbon::now()
            ], [
                'name' => "South Georgia and the South Sandwich Islands", 'two_digit_country_code' => "GS", 'three_digit_country_code' => "SGS", 'created_at' => Carbon::now()
            ], [
                'name' => "South Sudan", 'two_digit_country_code' => "SS", 'three_digit_country_code' => "SSD", 'created_at' => Carbon::now()
            ], [
                'name' => "Spain", 'two_digit_country_code' => "ES", 'three_digit_country_code' => "ESP", 'created_at' => Carbon::now()
            ], [
                'name' => "Sri Lanka", 'two_digit_country_code' => "LK", 'three_digit_country_code' => "LKA", 'created_at' => Carbon::now()
            ], [
                'name' => "Sudan (the)", 'two_digit_country_code' => "SD", 'three_digit_country_code' => "SDN", 'created_at' => Carbon::now()
            ], [
                'name' => "Suriname", 'two_digit_country_code' => "SR", 'three_digit_country_code' => "SUR", 'created_at' => Carbon::now()
            ], [
                'name' => "Svalbard and Jan Mayen", 'two_digit_country_code' => "SJ", 'three_digit_country_code' => "SJM", 'created_at' => Carbon::now()
            ], [
                'name' => "Sweden", 'two_digit_country_code' => "SE", 'three_digit_country_code' => "SWE", 'created_at' => Carbon::now()
            ], [
                'name' => "Switzerland", 'two_digit_country_code' => "CH", 'three_digit_country_code' => "CHE", 'created_at' => Carbon::now()
            ], [
                'name' => "Syrian Arab Republic", 'two_digit_country_code' => "SY", 'three_digit_country_code' => "SYR", 'created_at' => Carbon::now()
            ], [
                'name' => "Taiwan (Province of China)", 'two_digit_country_code' => "TW", 'three_digit_country_code' => "TWN", 'created_at' => Carbon::now()
            ], [
                'name' => "Tajikistan", 'two_digit_country_code' => "TJ", 'three_digit_country_code' => "TJK", 'created_at' => Carbon::now()
            ], [
                'name' => "Tanzania, United Republic of", 'two_digit_country_code' => "TZ", 'three_digit_country_code' => "TZA", 'created_at' => Carbon::now()
            ], [
                'name' => "Thailand", 'two_digit_country_code' => "TH", 'three_digit_country_code' => "THA", 'created_at' => Carbon::now()
            ], [
                'name' => "Timor-Leste", 'two_digit_country_code' => "TL", 'three_digit_country_code' => "TLS", 'created_at' => Carbon::now()
            ], [
                'name' => "Togo", 'two_digit_country_code' => "TG", 'three_digit_country_code' => "TGO", 'created_at' => Carbon::now()
            ], [
                'name' => "Tokelau", 'two_digit_country_code' => "TK", 'three_digit_country_code' => "TKL", 'created_at' => Carbon::now()
            ], [
                'name' => "Tonga", 'two_digit_country_code' => "TO", 'three_digit_country_code' => "TON", 'created_at' => Carbon::now()
            ], [
                'name' => "Trinidad and Tobago", 'two_digit_country_code' => "TT", 'three_digit_country_code' => "TTO", 'created_at' => Carbon::now()
            ], [
                'name' => "Tunisia", 'two_digit_country_code' => "TN", 'three_digit_country_code' => "TUN", 'created_at' => Carbon::now()
            ], [
                'name' => "Turkey", 'two_digit_country_code' => "TR", 'three_digit_country_code' => "TUR", 'created_at' => Carbon::now()
            ], [
                'name' => "Turkmenistan", 'two_digit_country_code' => "TM", 'three_digit_country_code' => "TKM", 'created_at' => Carbon::now()
            ], [
                'name' => "Turks and Caicos Islands (the)", 'two_digit_country_code' => "TC", 'three_digit_country_code' => "TCA", 'created_at' => Carbon::now()
            ], [
                'name' => "Tuvalu", 'two_digit_country_code' => "TV", 'three_digit_country_code' => "TUV", 'created_at' => Carbon::now()
            ], [
                'name' => "Uganda", 'two_digit_country_code' => "UG", 'three_digit_country_code' => "UGA", 'created_at' => Carbon::now()
            ], [
                'name' => "Ukraine", 'two_digit_country_code' => "UA", 'three_digit_country_code' => "UKR", 'created_at' => Carbon::now()
            ], [
                'name' => "United Arab Emirates (the)", 'two_digit_country_code' => "AE", 'three_digit_country_code' => "ARE", 'created_at' => Carbon::now()
            ], [
                'name' => "United Kingdom of Great Britain and Northern Ireland (the)", 'two_digit_country_code' => "GB", 'three_digit_country_code' => "GBR", 'created_at' => Carbon::now()
            ], [
                'name' => "United States Minor Outlying Islands (the)", 'two_digit_country_code' => "UM", 'three_digit_country_code' => "UMI", 'created_at' => Carbon::now()
            ], [
                'name' => "United States of America (the)", 'two_digit_country_code' => "US", 'three_digit_country_code' => "USA", 'created_at' => Carbon::now()
            ], [
                'name' => "Uruguay", 'two_digit_country_code' => "UY", 'three_digit_country_code' => "URY", 'created_at' => Carbon::now()
            ], [
                'name' => "Uzbekistan", 'two_digit_country_code' => "UZ", 'three_digit_country_code' => "UZB", 'created_at' => Carbon::now()
            ], [
                'name' => "Vanuatu", 'two_digit_country_code' => "VU", 'three_digit_country_code' => "VUT", 'created_at' => Carbon::now()
            ], [
                'name' => "Venezuela (Bolivarian Republic of)", 'two_digit_country_code' => "VE", 'three_digit_country_code' => "VEN", 'created_at' => Carbon::now()
            ], [
                'name' => "Viet Nam", 'two_digit_country_code' => "VN", 'three_digit_country_code' => "VNM", 'created_at' => Carbon::now()
            ], [
                'name' => "Virgin Islands (British)", 'two_digit_country_code' => "VG", 'three_digit_country_code' => "VGB", 'created_at' => Carbon::now()
            ], [
                'name' => "Virgin Islands (U.S.)", 'two_digit_country_code' => "VI", 'three_digit_country_code' => "VIR", 'created_at' => Carbon::now()
            ], [
                'name' => "Wallis and Futuna", 'two_digit_country_code' => "WF", 'three_digit_country_code' => "WLF", 'created_at' => Carbon::now()
            ], [
                'name' => "Western Sahara", 'two_digit_country_code' => "EH", 'three_digit_country_code' => "ESH", 'created_at' => Carbon::now()
            ], [
                'name' => "Yemen", 'two_digit_country_code' => "YE", 'three_digit_country_code' => "YEM", 'created_at' => Carbon::now()
            ], [
                'name' => "Zambia", 'two_digit_country_code' => "ZM", 'three_digit_country_code' => "ZMB", 'created_at' => Carbon::now()
            ], [
                'name' => "Zimbabwe", 'two_digit_country_code' => "ZW", 'three_digit_country_code' => "ZWE", 'created_at' => Carbon::now()
            ], [
                'name' => "Åland Islands", 'two_digit_country_code' => "AX", 'three_digit_country_code' => "ALA", 'created_at' => Carbon::now()
            ]
        ];
    }
}
