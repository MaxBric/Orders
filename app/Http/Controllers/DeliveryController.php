<?php

namespace App\Http\Controllers;


use App\Delivery;

class DeliveryController extends Controller
{
    /**
     * Create a new delivery
     *
     * @param int $order_id
     * @return Delivery
     * @throws \Exception
     */
    public function addNewDelivery(int $order_id)
    {
        $delivery = new Delivery();
        $delivery->order_id = $order_id;
        $dateNow = new \DateTime('now');
        $delivery->delivery_date = $dateNow->format('Y-m-d');
        $delivery->status = 'shipped';

        $delivery->save();

        return $delivery;
    }

    /**
     * Exports deliveries to CSV
     */
    public function getCSV()
    {
        $delimiter = ';';
        $enclosure = '"';

        $deliveries = Delivery::all();
        if (count($deliveries) == 0) return null;

        header("Content-disposition: attachment; filename=deliveries.csv");
        header("Content-Type: text/csv");

        $fp = fopen("php://output", 'w');
        fputs($fp, $bom =( chr(0xEF) . chr(0xBB) . chr(0xBF) ));

        fputcsv($fp,array_keys((array)$deliveries[0]),$delimiter,$enclosure);

        // Add all the data in the file
        foreach ($deliveries as $fields) {
            fputcsv($fp, (array)$fields,$delimiter,$enclosure);
        }

        // Close the file
        fclose($fp);

        // Stop the script
        die();
    }
}
