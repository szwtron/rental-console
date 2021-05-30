<?php

class Transaction extends CI_model
{
    public function cek_denda()
    {
        $data = $this->db->query("SELECT * FROM transaksi o, console cs, user us WHERE o.id_console = cs.id_console AND o.id_user = us.id")->result();
        foreach ($data as $row) {
            $id_rental = $row->id_rental;
            $fromDate = $row->fromDate;
            $toDate = $row->toDate;
            $harga = $row->harga;
            $returnDate = $row->returnDate;
            $harga = $row->harga;
            $denda = $row->denda;

            //var_dump($id_rental);

            //Hitung durasi rental
            $duration = abs(strtotime($fromDate) - strtotime($toDate));
            $years = floor($duration / (365 * 60 * 60 * 24));
            $months = floor(($duration - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
            $days = floor(($duration - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));

            //var_dump($days);

            //Harga * hari
            $harga_transaksi = $harga * $days;

            date_default_timezone_set('Asia/Jakarta');

            $currentDate = time();
            $datestring = '%Y-%m-%d';
            $time = time();
            $better_date = mdate($datestring, $time); //  i.e : 2018-05-23 - 09:52 am | For AM | PM result
            //var_dump($toDate);
            //var_dump($better_date);
            //$c_date=date("Y-m-d H:i:s").'<br>'; // 2018-05-23 09:52:36 | For Seconds Result

            if ($returnDate != 0) {
                $overdue = strtotime($toDate) - strtotime($returnDate);

                $years_overdue = floor($overdue / (365 * 60 * 60 * 24));
                $months_overdue = floor(($overdue - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
                $days_overdue = floor(($overdue - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));

                //var_dump($id_rental);
                //var_dump($days_overdue);

                if ($days_overdue < 0) {
                    $denda = $harga * abs($days_overdue);
                } else {
                    $denda = 0;
                }

                //var_dump($denda);

                //die();
            } else if ($returnDate == 0) {
                $overdue = strtotime($toDate) - strtotime($better_date);

                $years_overdue = floor($overdue / (365 * 60 * 60 * 24));
                $months_overdue = floor(($overdue - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
                $days_overdue = floor(($overdue - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
                
                //var_dump($better_date);
                //var_dump($id_rental);
                //var_dump($days_overdue);
                //var_dump($denda);
            

                if ($days_overdue < 0) {
                    $denda = $harga * abs($days_overdue);
                } else {
                    $denda = 0;
                }
                
                //die();
            }

            //var_dump($denda);
            //var_dump($id_rental);

            $dat = array(
                'denda' => $denda,
            );

            $this->db->where('id_rental', $id_rental);
            $this->db->update('transaksi', $dat);

        }

        //die();

        //     $data=>'id_rental' = $id_rental;
        //     $data=>'fromDate' = $fromDate;
        //     $data=>'toDate' = $toDate;
        //     $data=>'harga' = $harga;
        //     $data=>'returnDate' = $returnDate;
        //     $data=>'denda' = $denda;

    }

    public function jumlah_transaksi($id)
    {
        $result = $this->db->where('id_user', $id)->get('transaksi');
        if ($result->num_rows() > 0) {
            return $result->num_rows();
        } else {
            return 0;
        }
    }

}
