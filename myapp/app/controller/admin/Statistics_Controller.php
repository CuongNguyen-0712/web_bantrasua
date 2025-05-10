<?php

namespace admin;

class Statistics_Controller extends Controller
{
    protected $statisticsModel;
    public function __construct()
    {
        $this->statisticsModel = $this->model('Statistics_Model');
    }
    public function index()
    {
        $start = $_GET['start'] ?? date('Y-m-d');
        $end = $_GET['end'] ?? date('Y-m-d');
        $totalCost = $this->statisticsModel->getTotalCost();
        $totalOrder = $this->statisticsModel->getTotalOrder();
        $totalMember = $this->statisticsModel->getTotalMember();
        $result = $this->statisticsModel->getStatistics($start, $end);

        $detail = [];

        if ($result) {
            foreach ($result as $row) {
                $raw = $this->statisticsModel->getDetail($row['account_id']);

                foreach ($raw as $item) {
                    $orderId = $item['order_id'];
                    $detail[$row['account_id']][$orderId][] = [
                        'name' => $item['name'],
                        'size' => $item['size'],
                        'topping' => $item['topping'],
                        'quantity' => $item['quantity'],
                        'total' => $item['total'],
                        'cost' => $item['cost'],
                    ];
                }
            }
        }

        $this->view('statistics', [
            'totalCost' => $totalCost,
            'totalOrder' => $totalOrder,
            'totalMember' => $totalMember,
            'result' => $result,
            'detail' => $detail
        ]);
    }

    public function handleStatistics()
    {
        $start = $_POST['time_from'];
        $end = $_POST['time_to'];

        if ($start > $end) {
            $_SESSION['error'] = 'Khoảng thời gian nhập không phù hợp vui lòng nhập lại';
            header("Location: /web_bantrasua/myapp/admin/statistics/index");
            return;
        } else {
            header("Location: /web_bantrasua/myapp/admin/statistics/index?start=$start&end=$end");
            exit();
        }
    }
}