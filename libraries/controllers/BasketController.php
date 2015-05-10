<?php

session_start();

class BasketController extends Controller
{
    public function actionBasket()
    {
        $userId = isset($_SESSION['logged']) ? $_SESSION['logged'] : 1;
        
        if(!isset($_POST['id_book']))
        {
            $this->renderBasket($userId, 'basket');
        }
        else
        {
            $bookId = $_POST['id_book'];
            if(is_numeric($bookId))
            {
                if (Basket::RemoveItemFromBasket($bookId, $userId)) {
                    $this->renderBasket($userId, 'basket');
                }
                else
                {
                    $this->renderBasket($userId, 'basket', 'Item can\'t be removed.');
                }
            }
            else
            {
                if(Basket::RemoveAllBasket($userId))
                {
                    $this->renderBasket($userId, 'basket');
                }
                else
                {
                    $this->renderBasket($userId, 'basket', 'Basket can\'t be removed.');
                }
            }
        }
    }
    
    public function actionPayment()
    {
        if(isset($_SESSION['logged']) && $_SESSION['logged'] != 1)
        {
            $paymentType = isset($_POST['paymentType']) ? $_POST['paymentType'] : '';
            $userId = $_SESSION['logged'];
            $this->renderBasket($userId, 'payment', NULL, $paymentType);
        }
        else
        {
            $postedData['error'] = 'You must log in to buy.';
            $this->render('userLoginForm',$postedData);
        }
    }
    
    public function actionSummary()
    {
        if(isset($_SESSION['logged']) && $_SESSION['logged'] != 1)
        {
            $paymentType = isset($_POST['paymentType']) ? $_POST['paymentType'] : '';
            $userId = $_SESSION['logged'];
            $this->renderBasket($userId, 'summary', NULL, $paymentType);
        } 
        else
        {
            $postedData['error'] = 'You must log in to buy.';
            $this->render('userLoginForm', $postedData);
        }
    }
    
    public function actionPay()
    {
        if(isset($_SESSION['logged']) && $_SESSION['logged'] != 1)
        {
            if(Basket::SaveOrder($_SESSION['logged'], $_POST['paymentType'], $_POST['totalPrice']))
            {
                $postedData['success'] = 'Order was send';
                $this->render('userLogoutForm', $postedData);
            }
            else
            {
                $postedData['error'] = 'There was error, order cannot be send, please contact us at bookeshop@bookeshop.com.';
                $this->render('LogoutForm', $postedData);
            }
        }
        else
        {
            $postedData['error'] = 'There was error, order cannot be send, please contact us at bookeshop@bookeshop.com.';
            $this->render('LogoutForm', $postedData);
        }
    }
    
    public function renderBasket($userId, $template, $error = NULL, $paymentType = NULL)
    {
        if(($result = Basket::ShowBasket($userId)) && $error == NULL)
        {
            $postedData['show_basket_result'] = $result;
            $postedData['bookCount'] = count($result);
            $postedData['totalPrice'] = 0;
            $postedData['paymentType'] = $paymentType != NULL ? $paymentType : '';
            if($userResult = User::GetUserDetails($userId))
            {
                $postedData['name'] = $userResult[0]['user_name'];
                $postedData['email'] = $userResult[0]['user_email'];
                $postedData['phone'] = $userResult[0]['user_phone'];
            }
            foreach($result as $item)
            {
                $postedData['totalPrice'] += $item['book_price'];
            }
            $this->render($template, $postedData);
        }
        else
        {
            $postedData['error'] = $error != NULL ? $error : 'Basket don\'t have items.';
            $this->render($template, $postedData);
        }
    }
}