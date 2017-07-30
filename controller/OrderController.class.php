<?php

class OrderController extends Controller
{
    public $view = 'order';

    protected $userSession;

    public function index($data)
    {
        $response = [];
        if (isset($_COOKIE['user_session'])) {
            $session = $_COOKIE['user_session'];
            $response['order'] = db::getInstance()->Select(
                'SELECT * FROM orders WHERE user_session =:session AND status=:status',
                ['status' => OrderStatus::Active, 'session' => $session]
            );
            $response['goods'] = db::getInstance()->Select(
                'SELECT goods.name, goods.id, goods.price FROM 
                     goods
                LEFT JOIN orders_goods ON
                (goods.id = orders_goods.good_id)
                LEFT JOIN orders ON 
                (orders.id = orders_goods.order_id)
                    WHERE orders.status=:status AND orders.user_session=:session',
                ['session' => $session, 'status'=>OrderStatus::Active]
            );
        }
        return $response;
    }

    public function add($data)
    {
        $error = false;
        if (!isset($data['id'])) {
            $response = $this->getError('Товар отсутствует', 404);
            $error = true;
        }
        $orderId = $this->getOrderId();
        $getGood = db::getInstance()->Select(
            'SELECT * FROM goods WHERE id=:id AND status=:status',
            [
                'id' => $data['id'],
                'status' => Status::Active
            ]
        );

        if (!isset($getGood[0])) {
            $response = $this->getError('Товар отсутствует', 404);
            $error = true;
        }

        db::getInstance()->Query(
            'INSERT INTO orders_goods (order_id, good_id) values (:order_id, :good_id)',
            [
                'order_id' => $orderId,
                'good_id' => $getGood[0]['id']
            ]
        );
        if (!$error) {
            $response = ['success' => true,'sessionId' => $this->userSession];
        }
        echo json_encode($response);
        exit;
    }

    protected function getError($message, $code)
    {
        return ['error' => $message, 'code' => $code];
    }

    protected function getOrderId()
    {
        if (!isset($_COOKIE['user_session'])) {
            $this->createOrder();
        }

        $order = db::getInstance()->Select(
            'SELECT * FROM orders WHERE user_session=:user_session AND status=:status',
            ['status' => OrderStatus::Active, 'user_session' => $_COOKIE['user_session']]
        );
        if (count($order) === 0) {
            return $this->createOrder();
        }
        
        return $order[0]['id'];
    }
    
    protected function createOrder()
    {
        $session = md5(rand(0, 999)*time()+rand(1, 10000));
        db::getInstance()->Query('INSERT INTO orders (`user_session`, status) VALUES (:user_session, :status)', ['user_session' => $session, 'status' => OrderStatus::Active]);
        setcookie('user_session', $session, time()+86400);
        return db::getInstance()->getLastId();
    }
}
