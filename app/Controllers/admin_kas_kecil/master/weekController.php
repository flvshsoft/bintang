<?php

namespace App\Controllers\admin_kas_kecil\master;

class weekController extends BaseController
{
    public function index()
    {
        $data['judul'] = 'Bintang';
        $data['judul1'] = 'Master Week';
        $data['model'] = $this->mdWeek
            ->join('user', 'user.id_user=week.id_user', 'left')
            ->where('week.id_branch', Session('userData')['id_branch'])
            ->findAll();
        return view('admin_kas_kecil/master/week/index', $data);
    }

    public function tambah()
    {
        $data['judul'] = 'Bintang';
        $data['judul1'] = 'Master Week';
        return view('admin_kas_kecil/master/week/tambah', $data);
    }

    public function generate()
    {
        $year = date('Y');
        $no = 1;
        for ($i = 1; $i <= 12; $i++) {
            $month = $i; // May
            # code...
            $weekCount = $this->getWeekCountInMonth($year, $month);
            echo "Number of weeks in $year-$month: $weekCount <br>";

            $k = 1;
            for ($j = 1; $j <= $weekCount; $j++) {
                $data = [
                    'nama_week' => $no,
                    'bulan_week' => $k,
                    'tahun_week' => $year,
                    'bulan' => $month,
                    'status_week' => 0,
                    'status_aktif' => 0,
                    'status_closing' => 0,
                    'id_user' => SESSION('userData')['id_user'],
                    'id_branch' => SESSION('userData')['id_branch'],
                ];
                $this->mdWeek->insert($data);
                $k++;
                $no++;
            }
        }
        return redirect()->to(base_url('/akk/master_week'));
    }

    public function getWeekCountInMonth($year, $month)
    {
        $numDays = cal_days_in_month(CAL_GREGORIAN, $month, $year);

        // Get the first day of the month
        $firstDayOfMonth = new \DateTime("$year-$month-01");

        // Get the last day of the month
        $lastDayOfMonth = new \DateTime("$year-$month-" . $firstDayOfMonth->format('t'));

        // Calculate the number of days in the first week
        $firstWeekDays = 7 - ($firstDayOfMonth->format('N') - 1);

        // Calculate the number of days in the last week
        $lastWeekDays = $lastDayOfMonth->format('N');

        // Calculate the total number of weeks
        $numWeeks = ceil(($firstWeekDays + $lastDayOfMonth->format('j') - $lastWeekDays) / 7);

        return $numWeeks;
    }

    public function input()
    {
        $data = [
            'id_user' => SESSION('userData')['id_user'],
            'nama_week' => $this->request->getPost('nama_week'),
            'bulan_week' => $this->request->getPost('bulan_week'),
            'tahun_week' => $this->request->getPost('tahun_week'),
            'status_week' => $this->request->getPost('status_week'),
            'status_aktif' => $this->request->getPost('status_aktif'),
            'bulan' => $this->request->getPost('bulan'),
            'status_closing' => $this->request->getPost('status_closing'),
        ];
        $this->mdWeek->insert($data);
        return redirect()->to(base_url('/akk/master_week'));
    }

    public function edit($id_week)
    {
        $data['judul'] = 'Bintang';
        $data['judul1'] = 'Edit Week';
        $data['model'] =  $this->mdWeek
            ->where('id_week', $id_week)
            ->find()[0];

        return view('admin_kas_kecil/master/week/edit', $data);
    }
    public function update()
    {
        $id_week = $this->request->getPost('id_week');
        $data = [
            'id_week' => $id_week,
            'id_user' => SESSION('userData')['id_user'],
            'nama_week' => $this->request->getPost('nama_week'),
            'bulan_week' => $this->request->getPost('bulan_week'),
            'tahun_week' => $this->request->getPost('tahun_week'),
            'status_week' => $this->request->getPost('status_week'),
            'status_aktif' => $this->request->getPost('status_aktif'),
            'bulan' => $this->request->getPost('bulan'),
            'status_closing' => $this->request->getPost('status_closing'),
        ];
        $this->mdWeek->save($data);
        return redirect()->to(base_url('/akk/master_week'));
    }

    public function hapus($id_week)
    {
        $delete = $this->mdWeek->delete($id_week);
        if ($delete) {
            return redirect()->to(base_url('/akk/master_week'));
        } else {
            echo 'Gagal menghapus data.';
        }
    }
}
