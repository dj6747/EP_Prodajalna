<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZipCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zip_codes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('code');
            $table->string('postal_name');
            $table->index('code');
        });


        $data = [
            [ 'code' => 8341, 'postal_name' => 'Adlešiči'],
            [ 'code' => 5270, 'postal_name' => 'Ajdovščina'],
            [ 'code' => 6280, 'postal_name' => 'Ankaran - Ancarano'],
            [ 'code' => 9253, 'postal_name' => 'Apače'],
            [ 'code' => 8253, 'postal_name' => 'Artiče'],
            [ 'code' => 4275, 'postal_name' => 'Begunje na Gorenjskem'],
            [ 'code' => 1382, 'postal_name' => 'Begunje pri Cerknici'],
            [ 'code' => 9231, 'postal_name' => 'Beltinci'],
            [ 'code' => 2234, 'postal_name' => 'Benedikt'],
            [ 'code' => 2345, 'postal_name' => 'Bistrica ob Dravi'],
            [ 'code' => 3256, 'postal_name' => 'Bistrica ob Sotli'],
            [ 'code' => 8259, 'postal_name' => 'Bizeljsko'],
            [ 'code' => 1223, 'postal_name' => 'Blagovica'],
            [ 'code' => 8283, 'postal_name' => 'Blanca'],
            [ 'code' => 4260, 'postal_name' => 'Bled'],
            [ 'code' => 4273, 'postal_name' => 'Blejska Dobrava'],
            [ 'code' => 9265, 'postal_name' => 'Bodonci'],
            [ 'code' => 9222, 'postal_name' => 'Bogojina'],
            [ 'code' => 4263, 'postal_name' => 'Bohinjska Bela'],
            [ 'code' => 4264, 'postal_name' => 'Bohinjska Bistrica'],
            [ 'code' => 4265, 'postal_name' => 'Bohinjsko jezero'],
            [ 'code' => 1353, 'postal_name' => 'Borovnica'],
            [ 'code' => 8294, 'postal_name' => 'Boštanj'],
            [ 'code' => 5230, 'postal_name' => 'Bovec'],
            [ 'code' => 5295, 'postal_name' => 'Branik'],
            [ 'code' => 3314, 'postal_name' => 'Braslovče'],
            [ 'code' => 5223, 'postal_name' => 'Breginj'],
            [ 'code' => 8280, 'postal_name' => 'Brestanica'],
            [ 'code' => 2354, 'postal_name' => 'Bresternica'],
            [ 'code' => 4243, 'postal_name' => 'Brezje'],
            [ 'code' => 1351, 'postal_name' => 'Brezovica pri Ljubljani'],
            [ 'code' => 8250, 'postal_name' => 'Brežice'],
            [ 'code' => 4210, 'postal_name' => 'Brnik - aerodrom'],
            [ 'code' => 8321, 'postal_name' => 'Brusnice'],
            [ 'code' => 3255, 'postal_name' => 'Buče'],
            [ 'code' => 8276, 'postal_name' => 'Bučka '],
            [ 'code' => 9261, 'postal_name' => 'Cankova'],
            [ 'code' => 3000, 'postal_name' => 'Celje - dostava'],
            [ 'code' => 3001, 'postal_name' => 'Celje - poštni predali'],
            [ 'code' => 3502, 'postal_name' => 'Celje'],
            [ 'code' => 3505, 'postal_name' => 'Celje'],
            [ 'code' => 3600, 'postal_name' => 'Celje'],
            [ 'code' => 4207, 'postal_name' => 'Cerklje na Gorenjskem'],
            [ 'code' => 8263, 'postal_name' => 'Cerklje ob Krki'],
            [ 'code' => 1380, 'postal_name' => 'Cerknica'],
            [ 'code' => 5282, 'postal_name' => 'Cerkno'],
            [ 'code' => 2236, 'postal_name' => 'Cerkvenjak'],
            [ 'code' => 2215, 'postal_name' => 'Ceršak'],
            [ 'code' => 2326, 'postal_name' => 'Cirkovce'],
            [ 'code' => 2282, 'postal_name' => 'Cirkulane'],
            [ 'code' => 5273, 'postal_name' => 'Col'],
            [ 'code' => 8251, 'postal_name' => 'Čatež ob Savi'],
            [ 'code' => 1413, 'postal_name' => 'Čemšenik'],
            [ 'code' => 5253, 'postal_name' => 'Čepovan'],
            [ 'code' => 9232, 'postal_name' => 'Črenšovci'],
            [ 'code' => 2393, 'postal_name' => 'Črna na Koroškem'],
            [ 'code' => 6275, 'postal_name' => 'Črni Kal'],
            [ 'code' => 5274, 'postal_name' => 'Črni Vrh nad Idrijo'],
            [ 'code' => 5262, 'postal_name' => 'Črniče'],
            [ 'code' => 8340, 'postal_name' => 'Črnomelj'],
            [ 'code' => 6271, 'postal_name' => 'Dekani'],
            [ 'code' => 5210, 'postal_name' => 'Deskle'],
            [ 'code' => 2253, 'postal_name' => 'Destrnik'],
            [ 'code' => 6215, 'postal_name' => 'Divača'],
            [ 'code' => 1233, 'postal_name' => 'Dob'],
            [ 'code' => 3224, 'postal_name' => 'Dobje pri Planini'],
            [ 'code' => 8257, 'postal_name' => 'Dobova'],
            [ 'code' => 1423, 'postal_name' => 'Dobovec'],
            [ 'code' => 5263, 'postal_name' => 'Dobravlje'],
            [ 'code' => 3204, 'postal_name' => 'Dobrna'],
            [ 'code' => 8211, 'postal_name' => 'Dobrnič'],
            [ 'code' => 1356, 'postal_name' => 'Dobrova'],
            [ 'code' => 9223, 'postal_name' => 'Dobrovnik - Dobronak '],
            [ 'code' => 5212, 'postal_name' => 'Dobrovo v Brdih'],
            [ 'code' => 1431, 'postal_name' => 'Dol pri Hrastniku'],
            [ 'code' => 1262, 'postal_name' => 'Dol pri Ljubljani'],
            [ 'code' => 1273, 'postal_name' => 'Dole pri Litiji'],
            [ 'code' => 1331, 'postal_name' => 'Dolenja vas'],
            [ 'code' => 8350, 'postal_name' => 'Dolenjske Toplice'],
            [ 'code' => 1230, 'postal_name' => 'Domžale'],
            [ 'code' => 2252, 'postal_name' => 'Dornava'],
            [ 'code' => 5294, 'postal_name' => 'Dornberk'],
            [ 'code' => 1319, 'postal_name' => 'Draga'],
            [ 'code' => 8343, 'postal_name' => 'Dragatuš'],
            [ 'code' => 3222, 'postal_name' => 'Dramlje'],
            [ 'code' => 2370, 'postal_name' => 'Dravograd'],
            [ 'code' => 4203, 'postal_name' => 'Duplje'],
            [ 'code' => 6221, 'postal_name' => 'Dutovlje'],
            [ 'code' => 8361, 'postal_name' => 'Dvor'],
            [ 'code' => 2343, 'postal_name' => 'Fala'],
            [ 'code' => 9208, 'postal_name' => 'Fokovci'],
            [ 'code' => 2313, 'postal_name' => 'Fram'],
            [ 'code' => 3213, 'postal_name' => 'Frankolovo'],
            [ 'code' => 1274, 'postal_name' => 'Gabrovka'],
            [ 'code' => 8254, 'postal_name' => 'Globoko'],
            [ 'code' => 5275, 'postal_name' => 'Godovič'],
            [ 'code' => 4204, 'postal_name' => 'Golnik'],
            [ 'code' => 3303, 'postal_name' => 'Gomilsko'],
            [ 'code' => 4224, 'postal_name' => 'Gorenja vas'],
            [ 'code' => 3263, 'postal_name' => 'Gorica pri Slivnici'],
            [ 'code' => 2272, 'postal_name' => 'Gorišnica'],
            [ 'code' => 9250, 'postal_name' => 'Gornja Radgona'],
            [ 'code' => 3342, 'postal_name' => 'Gornji Grad'],
            [ 'code' => 4282, 'postal_name' => 'Gozd Martuljek'],
            [ 'code' => 6272, 'postal_name' => 'Gračišče'],
            [ 'code' => 9264, 'postal_name' => 'Grad'],
            [ 'code' => 8332, 'postal_name' => 'Gradac'],
            [ 'code' => 1384, 'postal_name' => 'Grahovo'],
            [ 'code' => 5242, 'postal_name' => 'Grahovo ob Bači'],
            [ 'code' => 5251, 'postal_name' => 'Grgar'],
            [ 'code' => 3302, 'postal_name' => 'Griže'],
            [ 'code' => 3231, 'postal_name' => 'Grobelno'],
            [ 'code' => 1290, 'postal_name' => 'Grosuplje'],
            [ 'code' => 2288, 'postal_name' => 'Hajdina'],
            [ 'code' => 8362, 'postal_name' => 'Hinje'],
            [ 'code' => 2311, 'postal_name' => 'Hoče'],
            [ 'code' => 9205, 'postal_name' => 'Hodoš - Hodos'],
            [ 'code' => 1354, 'postal_name' => 'Horjul'],
            [ 'code' => 1372, 'postal_name' => 'Hotedršica'],
            [ 'code' => 1430, 'postal_name' => 'Hrastnik'],
            [ 'code' => 6225, 'postal_name' => 'Hruševje'],
            [ 'code' => 4276, 'postal_name' => 'Hrušica'],
            [ 'code' => 5280, 'postal_name' => 'Idrija'],
            [ 'code' => 1292, 'postal_name' => 'Ig'],
            [ 'code' => 6250, 'postal_name' => 'Ilirska Bistrica'],
            [ 'code' => 1295, 'postal_name' => 'Ivančna Gorica'],
            [ 'code' => 2259, 'postal_name' => 'Ivanjkovci'],
            [ 'code' => 1411, 'postal_name' => 'Izlake'],
            [ 'code' => 6310, 'postal_name' => 'Izola - Isola'],
            [ 'code' => 2222, 'postal_name' => 'Jakobski Dol'],
            [ 'code' => 2221, 'postal_name' => 'Jarenina'],
            [ 'code' => 6254, 'postal_name' => 'Jelšane'],
            [ 'code' => 4270, 'postal_name' => 'Jesenice'],
            [ 'code' => 8261, 'postal_name' => 'Jesenice na Dolenjskem'],
            [ 'code' => 3273, 'postal_name' => 'Jurklošter'],
            [ 'code' => 2223, 'postal_name' => 'Jurovski Dol'],
            [ 'code' => 2256, 'postal_name' => 'Juršinci'],
            [ 'code' => 5214, 'postal_name' => 'Kal nad Kanalom'],
            [ 'code' => 3233, 'postal_name' => 'Kalobje'],
            [ 'code' => 4246, 'postal_name' => 'Kamna Gorica'],
            [ 'code' => 2351, 'postal_name' => 'Kamnica'],
            [ 'code' => 1241, 'postal_name' => 'Kamnik'],
            [ 'code' => 5213, 'postal_name' => 'Kanal'],
            [ 'code' => 8258, 'postal_name' => 'Kapele'],
            [ 'code' => 2362, 'postal_name' => 'Kapla'],
            [ 'code' => 2325, 'postal_name' => 'Kidričevo'],
            [ 'code' => 1412, 'postal_name' => 'Kisovec'],
            [ 'code' => 6253, 'postal_name' => 'Knežak'],
            [ 'code' => 5222, 'postal_name' => 'Kobarid'],
            [ 'code' => 9227, 'postal_name' => 'Kobilje'],
            [ 'code' => 1330, 'postal_name' => 'Kočevje'],
            [ 'code' => 1338, 'postal_name' => 'Kočevska Reka'],
            [ 'code' => 2276, 'postal_name' => 'Kog'],
            [ 'code' => 5211, 'postal_name' => 'Kojsko'],
            [ 'code' => 6223, 'postal_name' => 'Komen'],
            [ 'code' => 1218, 'postal_name' => 'Komenda'],
            [ 'code' => 6000, 'postal_name' => 'Koper - Capodistria - dostava'],
            [ 'code' => 6001, 'postal_name' => 'Koper - Capodistria - poštni predali'],
            [ 'code' => 6503, 'postal_name' => 'Koper'],
            [ 'code' => 6502, 'postal_name' => 'Koper'],
            [ 'code' => 6505, 'postal_name' => 'Koper'],
            [ 'code' => 6504, 'postal_name' => 'Koper'],
            [ 'code' => 6501, 'postal_name' => 'Koper'],
            [ 'code' => 6600, 'postal_name' => 'Koper'],
            [ 'code' => 8282, 'postal_name' => 'Koprivnica'],
            [ 'code' => 5296, 'postal_name' => 'Kostanjevica na Krasu'],
            [ 'code' => 8311, 'postal_name' => 'Kostanjevica na Krki'],
            [ 'code' => 6256, 'postal_name' => 'Košana'],
            [ 'code' => 2394, 'postal_name' => 'Kotlje'],
            [ 'code' => 6240, 'postal_name' => 'Kozina'],
            [ 'code' => 3260, 'postal_name' => 'Kozje'],
            [ 'code' => 4000, 'postal_name' => 'Kranj - dostava'],
            [ 'code' => 4001, 'postal_name' => 'Kranj - poštni predali'],
            [ 'code' => 4600, 'postal_name' => 'Kranj'],
            [ 'code' => 4502, 'postal_name' => 'Kranj'],
            [ 'code' => 4280, 'postal_name' => 'Kranjska Gora'],
            [ 'code' => 1281, 'postal_name' => 'Kresnice'],
            [ 'code' => 4294, 'postal_name' => 'Križe'],
            [ 'code' => 9206, 'postal_name' => 'Križevci'],
            [ 'code' => 9242, 'postal_name' => 'Križevci pri Ljutomeru'],
            [ 'code' => 1301, 'postal_name' => 'Krka'],
            [ 'code' => 8296, 'postal_name' => 'Krmelj'],
            [ 'code' => 4245, 'postal_name' => 'Kropa'],
            [ 'code' => 8262, 'postal_name' => 'Krška vas'],
            [ 'code' => 8270, 'postal_name' => 'Krško'],
            [ 'code' => 9263, 'postal_name' => 'Kuzma'],
            [ 'code' => 2318, 'postal_name' => 'Laporje'],
            [ 'code' => 3270, 'postal_name' => 'Laško'],
            [ 'code' => 1219, 'postal_name' => 'Laze v Tuhinju'],
            [ 'code' => 2230, 'postal_name' => 'Lenart v Slovenskih goricah'],
            [ 'code' => 9220, 'postal_name' => 'Lendava - Lendva'],
            [ 'code' => 4248, 'postal_name' => 'Lesce'],
            [ 'code' => 3261, 'postal_name' => 'Lesično'],
            [ 'code' => 8273, 'postal_name' => 'Leskovec pri Krškem'],
            [ 'code' => 2372, 'postal_name' => 'Libeliče'],
            [ 'code' => 2341, 'postal_name' => 'Limbuš'],
            [ 'code' => 1270, 'postal_name' => 'Litija'],
            [ 'code' => 3202, 'postal_name' => 'Ljubečna'],
            [ 'code' => 1000, 'postal_name' => 'Ljubljana - dostava'],
            [ 'code' => 1001, 'postal_name' => 'Ljubljana - poštni predali'],
            [ 'code' => 1517, 'postal_name' => 'Ljubljana'],
            [ 'code' => 1505, 'postal_name' => 'Ljubljana'],
            [ 'code' => 1533, 'postal_name' => 'Ljubljana'],
            [ 'code' => 1512, 'postal_name' => 'Ljubljana'],
            [ 'code' => 1524, 'postal_name' => 'Ljubljana'],
            [ 'code' => 1523, 'postal_name' => 'Ljubljana'],
            [ 'code' => 1522, 'postal_name' => 'Ljubljana'],
            [ 'code' => 1510, 'postal_name' => 'Ljubljana'],
            [ 'code' => 1509, 'postal_name' => 'Ljubljana'],
            [ 'code' => 1538, 'postal_name' => 'Ljubljana'],
            [ 'code' => 1516, 'postal_name' => 'Ljubljana'],
            [ 'code' => 1528, 'postal_name' => 'Ljubljana'],
            [ 'code' => 1540, 'postal_name' => 'Ljubljana'],
            [ 'code' => 1504, 'postal_name' => 'Ljubljana'],
            [ 'code' => 1521, 'postal_name' => 'Ljubljana'],
            [ 'code' => 1545, 'postal_name' => 'Ljubljana'],
            [ 'code' => 1542, 'postal_name' => 'Ljubljana'],
            [ 'code' => 1525, 'postal_name' => 'Ljubljana'],
            [ 'code' => 1544, 'postal_name' => 'Ljubljana'],
            [ 'code' => 1514, 'postal_name' => 'Ljubljana'],
            [ 'code' => 1526, 'postal_name' => 'Ljubljana'],
            [ 'code' => 1502, 'postal_name' => 'Ljubljana'],
            [ 'code' => 1508, 'postal_name' => 'Ljubljana'],
            [ 'code' => 1501, 'postal_name' => 'Ljubljana'],
            [ 'code' => 1535, 'postal_name' => 'Ljubljana'],
            [ 'code' => 1536, 'postal_name' => 'Ljubljana'],
            [ 'code' => 1537, 'postal_name' => 'Ljubljana'],
            [ 'code' => 1520, 'postal_name' => 'Ljubljana'],
            [ 'code' => 1534, 'postal_name' => 'Ljubljana'],
            [ 'code' => 1503, 'postal_name' => 'Ljubljana'],
            [ 'code' => 1527, 'postal_name' => 'Ljubljana'],
            [ 'code' => 1603, 'postal_name' => 'Ljubljana'],
            [ 'code' => 1500, 'postal_name' => 'Ljubljana'],
            [ 'code' => 1600, 'postal_name' => 'Ljubljana'],
            [ 'code' => 1550, 'postal_name' => 'Ljubljana'],
            [ 'code' => 1532, 'postal_name' => 'Ljubljana'],
            [ 'code' => 1513, 'postal_name' => 'Ljubljana'],
            [ 'code' => 1511, 'postal_name' => 'Ljubljana'],
            [ 'code' => 1506, 'postal_name' => 'Ljubljana'],
            [ 'code' => 1519, 'postal_name' => 'Ljubljana'],
            [ 'code' => 1543, 'postal_name' => 'Ljubljana'],
            [ 'code' => 1546, 'postal_name' => 'Ljubljana'],
            [ 'code' => 1547, 'postal_name' => 'Ljubljana'],
            [ 'code' => 1518, 'postal_name' => 'Ljubljana'],
            [ 'code' => 1507, 'postal_name' => 'Ljubljana'],
            [ 'code' => 1529, 'postal_name' => 'Ljubljana'],
            [ 'code' => 1231, 'postal_name' => 'Ljubljana - Črnuče'],
            [ 'code' => 1261, 'postal_name' => 'Ljubljana - Dobrunje'],
            [ 'code' => 1260, 'postal_name' => 'Ljubljana - Polje'],
            [ 'code' => 1210, 'postal_name' => 'Ljubljana - Šentvid'],
            [ 'code' => 1211, 'postal_name' => 'Ljubljana - Šmartno'],
            [ 'code' => 3333, 'postal_name' => 'Ljubno ob Savinji'],
            [ 'code' => 9240, 'postal_name' => 'Ljutomer'],
            [ 'code' => 3215, 'postal_name' => 'Loče'],
            [ 'code' => 5231, 'postal_name' => 'Log pod Mangartom'],
            [ 'code' => 1370, 'postal_name' => 'Logatec'],
            [ 'code' => 1434, 'postal_name' => 'Loka pri Zidanem Mostu'],
            [ 'code' => 3223, 'postal_name' => 'Loka pri Žusmu'],
            [ 'code' => 6219, 'postal_name' => 'Lokev'],
            [ 'code' => 1318, 'postal_name' => 'Loški Potok'],
            [ 'code' => 2324, 'postal_name' => 'Lovrenc na Dravskem polju'],
            [ 'code' => 2344, 'postal_name' => 'Lovrenc na Pohorju'],
            [ 'code' => 3334, 'postal_name' => 'Luče'],
            [ 'code' => 1225, 'postal_name' => 'Lukovica'],
            [ 'code' => 9202, 'postal_name' => 'Mačkovci'],
            [ 'code' => 2322, 'postal_name' => 'Majšperk'],
            [ 'code' => 2321, 'postal_name' => 'Makole'],
            [ 'code' => 9243, 'postal_name' => 'Mala Nedelja'],
            [ 'code' => 2229, 'postal_name' => 'Malečnik'],
            [ 'code' => 6273, 'postal_name' => 'Marezige'],
            [ 'code' => 2000, 'postal_name' => 'Maribor - dostava'],
            [ 'code' => 2001, 'postal_name' => 'Maribor - poštni predali'],
            [ 'code' => 2504, 'postal_name' => 'Maribor'],
            [ 'code' => 2502, 'postal_name' => 'Maribor'],
            [ 'code' => 2509, 'postal_name' => 'Maribor'],
            [ 'code' => 2506, 'postal_name' => 'Maribor'],
            [ 'code' => 2508, 'postal_name' => 'Maribor'],
            [ 'code' => 2505, 'postal_name' => 'Maribor'],
            [ 'code' => 2503, 'postal_name' => 'Maribor'],
            [ 'code' => 2500, 'postal_name' => 'Maribor'],
            [ 'code' => 2600, 'postal_name' => 'Maribor'],
            [ 'code' => 2603, 'postal_name' => 'Maribor'],
            [ 'code' => 2501, 'postal_name' => 'Maribor'],
            [ 'code' => 2507, 'postal_name' => 'Maribor'],
            [ 'code' => 2206, 'postal_name' => 'Marjeta na Dravskem polju'],
            [ 'code' => 2281, 'postal_name' => 'Markovci'],
            [ 'code' => 9221, 'postal_name' => 'Martjanci'],
            [ 'code' => 6242, 'postal_name' => 'Materija'],
            [ 'code' => 4211, 'postal_name' => 'Mavčiče'],
            [ 'code' => 1215, 'postal_name' => 'Medvode'],
            [ 'code' => 1234, 'postal_name' => 'Mengeš'],
            [ 'code' => 8330, 'postal_name' => 'Metlika'],
            [ 'code' => 2392, 'postal_name' => 'Mežica'],
            [ 'code' => 2204, 'postal_name' => 'Miklavž na Dravskem polju'],
            [ 'code' => 2275, 'postal_name' => 'Miklavž pri Ormožu'],
            [ 'code' => 5291, 'postal_name' => 'Miren'],
            [ 'code' => 8233, 'postal_name' => 'Mirna'],
            [ 'code' => 8216, 'postal_name' => 'Mirna Peč'],
            [ 'code' => 2382, 'postal_name' => 'Mislinja'],
            [ 'code' => 4281, 'postal_name' => 'Mojstrana'],
            [ 'code' => 8230, 'postal_name' => 'Mokronog'],
            [ 'code' => 1251, 'postal_name' => 'Moravče'],
            [ 'code' => 9226, 'postal_name' => 'Moravske Toplice'],
            [ 'code' => 5216, 'postal_name' => 'Most na Soči'],
            [ 'code' => 1221, 'postal_name' => 'Motnik'],
            [ 'code' => 3330, 'postal_name' => 'Mozirje'],
            [ 'code' => 9000, 'postal_name' => 'Murska Sobota - dostava'],
            [ 'code' => 9001, 'postal_name' => 'Murska Sobota - poštni predali'],
            [ 'code' => 9501, 'postal_name' => 'Murska Sobota'],
            [ 'code' => 9600, 'postal_name' => 'Murska Sobota'],
            [ 'code' => 2366, 'postal_name' => 'Muta'],
            [ 'code' => 4202, 'postal_name' => 'Naklo'],
            [ 'code' => 4501, 'postal_name' => 'Naklo'],
            [ 'code' => 3331, 'postal_name' => 'Nazarje'],
            [ 'code' => 1357, 'postal_name' => 'Notranje Gorice'],
            [ 'code' => 3203, 'postal_name' => 'Nova Cerkev'],
            [ 'code' => 5000, 'postal_name' => 'Nova Gorica - dostava'],
            [ 'code' => 5001, 'postal_name' => 'Nova Gorica - poštni predali'],
            [ 'code' => 5600, 'postal_name' => 'Nova Gorica'],
            [ 'code' => 1385, 'postal_name' => 'Nova vas'],
            [ 'code' => 8000, 'postal_name' => 'Novo mesto - dostava'],
            [ 'code' => 8001, 'postal_name' => 'Novo mesto - poštni predali'],
            [ 'code' => 8501, 'postal_name' => 'Novo mesto'],
            [ 'code' => 8600, 'postal_name' => 'Novo mesto'],
            [ 'code' => 6243, 'postal_name' => 'Obrov'],
            [ 'code' => 9233, 'postal_name' => 'Odranci'],
            [ 'code' => 2317, 'postal_name' => 'Oplotnica'],
            [ 'code' => 2312, 'postal_name' => 'Orehova vas'],
            [ 'code' => 2270, 'postal_name' => 'Ormož'],
            [ 'code' => 1316, 'postal_name' => 'Ortnek'],
            [ 'code' => 1337, 'postal_name' => 'Osilnica'],
            [ 'code' => 8222, 'postal_name' => 'Otočec'],
            [ 'code' => 2361, 'postal_name' => 'Ožbalt'],
            [ 'code' => 2231, 'postal_name' => 'Pernica'],
            [ 'code' => 2211, 'postal_name' => 'Pesnica pri Mariboru'],
            [ 'code' => 9203, 'postal_name' => 'Petrovci'],
            [ 'code' => 3301, 'postal_name' => 'Petrovče'],
            [ 'code' => 6330, 'postal_name' => 'Piran - Pirano'],
            [ 'code' => 8255, 'postal_name' => 'Pišece'],
            [ 'code' => 6257, 'postal_name' => 'Pivka'],
            [ 'code' => 6232, 'postal_name' => 'Planina'],
            [ 'code' => 3225, 'postal_name' => 'Planina pri Sevnici'],
            [ 'code' => 6276, 'postal_name' => 'Pobegi'],
            [ 'code' => 8312, 'postal_name' => 'Podbočje'],
            [ 'code' => 5243, 'postal_name' => 'Podbrdo'],
            [ 'code' => 3254, 'postal_name' => 'Podčetrtek'],
            [ 'code' => 2273, 'postal_name' => 'Podgorci'],
            [ 'code' => 6216, 'postal_name' => 'Podgorje'],
            [ 'code' => 2381, 'postal_name' => 'Podgorje pri Slovenj Gradcu'],
            [ 'code' => 6244, 'postal_name' => 'Podgrad'],
            [ 'code' => 1414, 'postal_name' => 'Podkum'],
            [ 'code' => 2286, 'postal_name' => 'Podlehnik'],
            [ 'code' => 5272, 'postal_name' => 'Podnanos'],
            [ 'code' => 4244, 'postal_name' => 'Podnart'],
            [ 'code' => 3241, 'postal_name' => 'Podplat'],
            [ 'code' => 3257, 'postal_name' => 'Podsreda'],
            [ 'code' => 2363, 'postal_name' => 'Podvelka'],
            [ 'code' => 2208, 'postal_name' => 'Pohorje'],
            [ 'code' => 2257, 'postal_name' => 'Polenšak'],
            [ 'code' => 1355, 'postal_name' => 'Polhov Gradec'],
            [ 'code' => 4223, 'postal_name' => 'Poljane nad Škofjo Loko'],
            [ 'code' => 2319, 'postal_name' => 'Poljčane'],
            [ 'code' => 1272, 'postal_name' => 'Polšnik'],
            [ 'code' => 3313, 'postal_name' => 'Polzela'],
            [ 'code' => 3232, 'postal_name' => 'Ponikva'],
            [ 'code' => 6320, 'postal_name' => 'Portorož - Portorose'],
            [ 'code' => 6230, 'postal_name' => 'Postojna'],
            [ 'code' => 2331, 'postal_name' => 'Pragersko'],
            [ 'code' => 3312, 'postal_name' => 'Prebold'],
            [ 'code' => 4205, 'postal_name' => 'Preddvor'],
            [ 'code' => 6255, 'postal_name' => 'Prem'],
            [ 'code' => 1352, 'postal_name' => 'Preserje'],
            [ 'code' => 6258, 'postal_name' => 'Prestranek'],
            [ 'code' => 2391, 'postal_name' => 'Prevalje'],
            [ 'code' => 3262, 'postal_name' => 'Prevorje'],
            [ 'code' => 1276, 'postal_name' => 'Primskovo '],
            [ 'code' => 3253, 'postal_name' => 'Pristava pri Mestinju'],
            [ 'code' => 9207, 'postal_name' => 'Prosenjakovci - Partosfalva'],
            [ 'code' => 5297, 'postal_name' => 'Prvačina'],
            [ 'code' => 2250, 'postal_name' => 'Ptuj'],
            [ 'code' => 2323, 'postal_name' => 'Ptujska Gora'],
            [ 'code' => 9201, 'postal_name' => 'Puconci'],
            [ 'code' => 2327, 'postal_name' => 'Rače'],
            [ 'code' => 1433, 'postal_name' => 'Radeče'],
            [ 'code' => 9252, 'postal_name' => 'Radenci'],
            [ 'code' => 9502, 'postal_name' => 'Radenci'],
            [ 'code' => 2360, 'postal_name' => 'Radlje ob Dravi'],
            [ 'code' => 1235, 'postal_name' => 'Radomlje'],
            [ 'code' => 4240, 'postal_name' => 'Radovljica'],
            [ 'code' => 8274, 'postal_name' => 'Raka'],
            [ 'code' => 1381, 'postal_name' => 'Rakek'],
            [ 'code' => 4283, 'postal_name' => 'Rateče - Planica'],
            [ 'code' => 2390, 'postal_name' => 'Ravne na Koroškem'],
            [ 'code' => 3332, 'postal_name' => 'Rečica ob Savinji'],
            [ 'code' => 5292, 'postal_name' => 'Renče'],
            [ 'code' => 1310, 'postal_name' => 'Ribnica'],
            [ 'code' => 2364, 'postal_name' => 'Ribnica na Pohorju'],
            [ 'code' => 3272, 'postal_name' => 'Rimske Toplice'],
            [ 'code' => 1314, 'postal_name' => 'Rob'],
            [ 'code' => 5215, 'postal_name' => 'Ročinj'],
            [ 'code' => 3250, 'postal_name' => 'Rogaška Slatina'],
            [ 'code' => 9262, 'postal_name' => 'Rogašovci'],
            [ 'code' => 3252, 'postal_name' => 'Rogatec'],
            [ 'code' => 1373, 'postal_name' => 'Rovte'],
            [ 'code' => 2342, 'postal_name' => 'Ruše'],
            [ 'code' => 1282, 'postal_name' => 'Sava'],
            [ 'code' => 6333, 'postal_name' => 'Sečovlje - Sicciole'],
            [ 'code' => 4227, 'postal_name' => 'Selca'],
            [ 'code' => 2352, 'postal_name' => 'Selnica ob Dravi'],
            [ 'code' => 8333, 'postal_name' => 'Semič'],
            [ 'code' => 8281, 'postal_name' => 'Senovo'],
            [ 'code' => 6224, 'postal_name' => 'Senožeče'],
            [ 'code' => 8290, 'postal_name' => 'Sevnica'],
            [ 'code' => 6210, 'postal_name' => 'Sežana'],
            [ 'code' => 2214, 'postal_name' => 'Sladki Vrh'],
            [ 'code' => 5283, 'postal_name' => 'Slap ob Idrijci'],
            [ 'code' => 2380, 'postal_name' => 'Slovenj Gradec'],
            [ 'code' => 2310, 'postal_name' => 'Slovenska Bistrica'],
            [ 'code' => 3210, 'postal_name' => 'Slovenske Konjice'],
            [ 'code' => 1216, 'postal_name' => 'Smlednik'],
            [ 'code' => 5232, 'postal_name' => 'Soča'],
            [ 'code' => 1317, 'postal_name' => 'Sodražica'],
            [ 'code' => 3335, 'postal_name' => 'Solčava'],
            [ 'code' => 5250, 'postal_name' => 'Solkan'],
            [ 'code' => 4229, 'postal_name' => 'Sorica'],
            [ 'code' => 4225, 'postal_name' => 'Sovodenj'],
            [ 'code' => 5281, 'postal_name' => 'Spodnja Idrija'],
            [ 'code' => 2241, 'postal_name' => 'Spodnji Duplek'],
            [ 'code' => 9245, 'postal_name' => 'Spodnji Ivanjci'],
            [ 'code' => 2277, 'postal_name' => 'Središče ob Dravi'],
            [ 'code' => 4267, 'postal_name' => 'Srednja vas v Bohinju'],
            [ 'code' => 8256, 'postal_name' => 'Sromlje '],
            [ 'code' => 5224, 'postal_name' => 'Srpenica'],
            [ 'code' => 1242, 'postal_name' => 'Stahovica'],
            [ 'code' => 1332, 'postal_name' => 'Stara Cerkev'],
            [ 'code' => 8342, 'postal_name' => 'Stari trg ob Kolpi'],
            [ 'code' => 1386, 'postal_name' => 'Stari trg pri Ložu'],
            [ 'code' => 2205, 'postal_name' => 'Starše'],
            [ 'code' => 2289, 'postal_name' => 'Stoperce'],
            [ 'code' => 8322, 'postal_name' => 'Stopiče'],
            [ 'code' => 3206, 'postal_name' => 'Stranice'],
            [ 'code' => 8351, 'postal_name' => 'Straža'],
            [ 'code' => 1313, 'postal_name' => 'Struge'],
            [ 'code' => 6323, 'postal_name' => 'Strunjan - Strugnano (sezonska pošta)'],
          [ 'code' => 8293, 'postal_name' => 'Studenec'],
          [ 'code' => 8331, 'postal_name' => 'Suhor'],
          [ 'code' => 2233, 'postal_name' => 'Sv. Ana v Slovenskih goricah'],
          [ 'code' => 2353, 'postal_name' => 'Sv. Duh na Ostrem Vrhu'],
          [ 'code' => 9244, 'postal_name' => 'Sv. Jurij ob Ščavnici'],
          [ 'code' => 2235, 'postal_name' => 'Sv. Trojica v Slovenskih goricah'],
          [ 'code' => 3264, 'postal_name' => 'Sveti Štefan'],
          [ 'code' => 2258, 'postal_name' => 'Sveti Tomaž'],
          [ 'code' => 9204, 'postal_name' => 'Šalovci'],
          [ 'code' => 5261, 'postal_name' => 'Šempas'],
          [ 'code' => 5290, 'postal_name' => 'Šempeter pri Gorici'],
          [ 'code' => 3311, 'postal_name' => 'Šempeter v Savinjski dolini'],
          [ 'code' => 4208, 'postal_name' => 'Šenčur'],
          [ 'code' => 2212, 'postal_name' => 'Šentilj v Slovenskih goricah'],
          [ 'code' => 8297, 'postal_name' => 'Šentjanž'],
          [ 'code' => 2373, 'postal_name' => 'Šentjanž pri Dravogradu'],
          [ 'code' => 8310, 'postal_name' => 'Šentjernej'],
          [ 'code' => 3230, 'postal_name' => 'Šentjur'],
          [ 'code' => 3271, 'postal_name' => 'Šentrupert'],
          [ 'code' => 8232, 'postal_name' => 'Šentrupert'],
          [ 'code' => 1296, 'postal_name' => 'Šentvid pri Stični'],
          [ 'code' => 8275, 'postal_name' => 'Škocjan'],
          [ 'code' => 6281, 'postal_name' => 'Škofije'],
          [ 'code' => 4220, 'postal_name' => 'Škofja Loka'],
          [ 'code' => 3211, 'postal_name' => 'Škofja vas'],
          [ 'code' => 1291, 'postal_name' => 'Škofljica'],
          [ 'code' => 6274, 'postal_name' => 'Šmarje'],
          [ 'code' => 1293, 'postal_name' => 'Šmarje - Sap'],
          [ 'code' => 3240, 'postal_name' => 'Šmarje pri Jelšah'],
          [ 'code' => 8220, 'postal_name' => 'Šmarješke Toplice'],
          [ 'code' => 2315, 'postal_name' => 'Šmartno na Pohorju'],
          [ 'code' => 3341, 'postal_name' => 'Šmartno ob Dreti'],
          [ 'code' => 3327, 'postal_name' => 'Šmartno ob Paki'],
          [ 'code' => 1275, 'postal_name' => 'Šmartno pri Litiji'],
          [ 'code' => 2383, 'postal_name' => 'Šmartno pri Slovenj Gradcu'],
          [ 'code' => 3201, 'postal_name' => 'Šmartno v Rožni dolini'],
          [ 'code' => 3325, 'postal_name' => 'Šoštanj'],
          [ 'code' => 6222, 'postal_name' => 'Štanjel'],
          [ 'code' => 3220, 'postal_name' => 'Štore'],
          [ 'code' => 3304, 'postal_name' => 'Tabor'],
          [ 'code' => 3221, 'postal_name' => 'Teharje'],
          [ 'code' => 9251, 'postal_name' => 'Tišina'],
          [ 'code' => 5220, 'postal_name' => 'Tolmin'],
          [ 'code' => 3326, 'postal_name' => 'Topolšica'],
          [ 'code' => 2371, 'postal_name' => 'Trbonje'],
          [ 'code' => 1420, 'postal_name' => 'Trbovlje'],
          [ 'code' => 8231, 'postal_name' => 'Trebelno '],
          [ 'code' => 8210, 'postal_name' => 'Trebnje'],
          [ 'code' => 5252, 'postal_name' => 'Trnovo pri Gorici'],
          [ 'code' => 2254, 'postal_name' => 'Trnovska vas'],
          [ 'code' => 1222, 'postal_name' => 'Trojane'],
          [ 'code' => 1236, 'postal_name' => 'Trzin'],
          [ 'code' => 4290, 'postal_name' => 'Tržič'],
          [ 'code' => 8295, 'postal_name' => 'Tržišče'],
          [ 'code' => 1311, 'postal_name' => 'Turjak'],
          [ 'code' => 9224, 'postal_name' => 'Turnišče'],
          [ 'code' => 8323, 'postal_name' => 'Uršna sela'],
          [ 'code' => 1252, 'postal_name' => 'Vače'],
          [ 'code' => 1336, 'postal_name' => 'Vas'],
          [ 'code' => 3320, 'postal_name' => 'Velenje - dostava'],
          [ 'code' => 3322, 'postal_name' => 'Velenje - poštni predali'],
          [ 'code' => 3503, 'postal_name' => 'Velenje'],
          [ 'code' => 3504, 'postal_name' => 'Velenje'],
          [ 'code' => 8212, 'postal_name' => 'Velika Loka'],
          [ 'code' => 2274, 'postal_name' => 'Velika Nedelja'],
          [ 'code' => 9225, 'postal_name' => 'Velika Polana'],
          [ 'code' => 1315, 'postal_name' => 'Velike Lašče'],
          [ 'code' => 8213, 'postal_name' => 'Veliki Gaber'],
          [ 'code' => 9241, 'postal_name' => 'Veržej'],
          [ 'code' => 1312, 'postal_name' => 'Videm - Dobrepolje'],
          [ 'code' => 2284, 'postal_name' => 'Videm pri Ptuju'],
          [ 'code' => 8344, 'postal_name' => 'Vinica'],
          [ 'code' => 5271, 'postal_name' => 'Vipava'],
          [ 'code' => 4212, 'postal_name' => 'Visoko'],
          [ 'code' => 1294, 'postal_name' => 'Višnja Gora'],
          [ 'code' => 3205, 'postal_name' => 'Vitanje'],
          [ 'code' => 2255, 'postal_name' => 'Vitomarci'],
          [ 'code' => 1217, 'postal_name' => 'Vodice'],
          [ 'code' => 3212, 'postal_name' => 'Vojnik'],
          [ 'code' => 5293, 'postal_name' => 'Volčja Draga'],
          [ 'code' => 2232, 'postal_name' => 'Voličina'],
          [ 'code' => 3305, 'postal_name' => 'Vransko'],
          [ 'code' => 6217, 'postal_name' => 'Vremski Britof'],
          [ 'code' => 1360, 'postal_name' => 'Vrhnika'],
          [ 'code' => 2365, 'postal_name' => 'Vuhred'],
          [ 'code' => 2367, 'postal_name' => 'Vuzenica'],
          [ 'code' => 8292, 'postal_name' => 'Zabukovje '],
          [ 'code' => 1410, 'postal_name' => 'Zagorje ob Savi'],
          [ 'code' => 1303, 'postal_name' => 'Zagradec'],
          [ 'code' => 2283, 'postal_name' => 'Zavrč'],
          [ 'code' => 8272, 'postal_name' => 'Zdole '],
          [ 'code' => 4201, 'postal_name' => 'Zgornja Besnica'],
          [ 'code' => 2242, 'postal_name' => 'Zgornja Korena'],
          [ 'code' => 2201, 'postal_name' => 'Zgornja Kungota'],
          [ 'code' => 2316, 'postal_name' => 'Zgornja Ložnica'],
          [ 'code' => 2314, 'postal_name' => 'Zgornja Polskava'],
          [ 'code' => 2213, 'postal_name' => 'Zgornja Velka'],
          [ 'code' => 4247, 'postal_name' => 'Zgornje Gorje'],
          [ 'code' => 4206, 'postal_name' => 'Zgornje Jezersko'],
          [ 'code' => 2285, 'postal_name' => 'Zgornji Leskovec'],
          [ 'code' => 1432, 'postal_name' => 'Zidani Most'],
          [ 'code' => 3214, 'postal_name' => 'Zreče'],
          [ 'code' => 4209, 'postal_name' => 'Žabnica'],
          [ 'code' => 3310, 'postal_name' => 'Žalec'],
          [ 'code' => 4228, 'postal_name' => 'Železniki'],
          [ 'code' => 2287, 'postal_name' => 'Žetale'],
          [ 'code' => 4226, 'postal_name' => 'Žiri'],
          [ 'code' => 4274, 'postal_name' => 'Žirovnica'],
          [ 'code' => 8360, 'postal_name' => 'Žužemberk']];

        DB::table('zip_codes')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zip_codes');
    }
}