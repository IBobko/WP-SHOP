<?php 
/**
 @todo Найти переменную храняющую в себе слеш для определенной операционной системы
 */
//autoload import script
include WPSHOP_CLASSES_DIR . '/class.Wpshop.Analityc.php';


class Wpshop_Payment_Data
{
	public $paymentID;
	public $name;
	public $fields;
	public $picture;
	/**
	 * Массив имеющий разного рода назначение
	 */
	public $data;
};

class Wpshop_Payment
{
	private static $instance = null;
	public $payments = array();

	private function __construct()
	{

		$i = 0;
		$this->payments[$i] = new Wpshop_Payment_Data();
		$this->payments[$i]->paymentID = "vizit";
		$this->payments[$i]->name = __('Self-delivery', 'wp-shop'); //Самовывоз;
		$this->payments[$i]->title = __('Making order using \'Self-delivery\' goods from our store / office', 'wp-shop'); // Оформление заказа с через ‘самовывоз’ товара из нашего магазина/офиса;
		$this->payments[$i]->fields = array("Order".'$#$hidden$#$0$#$0$#$0$#$0$#$0',
						   __('Order type:', 'wp-shop').' <b>'.__('Visit to our office', 'wp-shop').'</b>$#$hidden$#$0$#$0$#$0$#$0$#$0', // Тип заказа: <b>Визит в наш офис</b>
						   __('For making order please fill up the form:', 'wp-shop').'$#$fieldsetstart$#$0$#$0$#$0$#$0$#$0', // Для оформления заказа заполните эту форму:
						   __('Your name', 'wp-shop').'|||||Name$#$textfield$#$1$#$0$#$1$#$0$#$0', // Ваше имя
                           __('Contact phone', 'wp-shop').'|||||Phone$#$textfield$#$1$#$0$#$0$#$0$#$0', // Контактный телефон
						   __('Address', 'wp-shop').'|||||Address$#$textfield$#$0$#$0$#$0$#$0$#$0', // Контактный телефон
						   __('E-mail', 'wp-shop').'$#$textfield$#$0$#$1$#$0$#$0$#$0', // E-mail
						   __('Comment to the order', 'wp-shop').'$#$textarea$#$0$#$0$#$0$#$0$#$0'); // Комментарий к заказу
		$this->payments[$i]->picture = 'cash.png';

		$i = 1;
		$this->payments[$i] = new Wpshop_Payment_Data();
		$this->payments[$i]->paymentID = "cash";
		$this->payments[$i]->title = __('Making order with cash payment to courier when your goods delivered', 'wp-shop'); // Оформление заказа с оплатой наличными курьеру при получении товара
		$this->payments[$i]->name = __('Cash to courier', 'wp-shop'); // Наличными курьеру
		$this->payments[$i]->fields = array("Order".'$#$hidden$#$0$#$0$#$0$#$0$#$0',
						   __('Order type:', 'wp-shop').' <b>'.__('Cash to courier', 'wp-shop').'</b>$#$hidden$#$0$#$0$#$0$#$0$#$0', // Тип заказа: <b>Наличными курьеру
						   __('For making order please fill up the form:', 'wp-shop').'$#$fieldsetstart$#$0$#$0$#$0$#$0$#$0', // Для оформления заказа заполните эту форму:
						   __('Your name', 'wp-shop').'|||||Name$#$textfield$#$1$#$0$#$1$#$0$#$0', // Ваше имя
						   __('Contact phone', 'wp-shop').'|||||Phone$#$textfield$#$1$#$0$#$0$#$0$#$0', // Контактный телефон
						   __('Address', 'wp-shop').'|||||Address$#$textfield$#$0$#$0$#$0$#$0$#$0', // Контактный телефон
						   __('E-mail', 'wp-shop').'$#$textfield$#$0$#$1$#$0$#$0$#$0', // E-mail
						   __('Comment to the order', 'wp-shop').'$#$textarea$#$0$#$0$#$0$#$0$#$0');
		$this->payments[$i]->picture = 'cur_mpf.png';

		$i = 2;
		$this->payments[$i] = new Wpshop_Payment_Data();
		$this->payments[$i]->paymentID = "post";
		$this->payments[$i]->title =  __("Making order with payment at post-offce before receiving (Cash on delivery)",'wp-shop');  // Оформление заказа с оплатой на почте при получении (Наложенный платеж)
		$this->payments[$i]->name = __('Cash on delivery', 'wp-shop'); //Наложенный платеж
		$this->payments[$i]->fields = array("Order".'$#$hidden$#$0$#$0$#$0$#$0$#$0',
						   __('Order type:', 'wp-shop').' <b>'.__('Post', 'wp-shop').'</b>$#$hidden$#$0$#$0$#$0$#$0$#$0', // Тип заказа: <b>Наличными курьеру
						   __('For making order please fill up the form:', 'wp-shop').'$#$fieldsetstart$#$0$#$0$#$0$#$0$#$0', // Для оформления заказа заполните эту форму:
						   __('Your name', 'wp-shop').'|||||Name$#$textfield$#$1$#$0$#$1$#$0$#$0', // Ваше имя
						   __('Contact phone', 'wp-shop').'|||||Phone$#$textfield$#$1$#$0$#$0$#$0$#$0', // Контактный телефон
						   __('Address', 'wp-shop').'|||||Address$#$textfield$#$0$#$0$#$0$#$0$#$0', // Контактный телефон
						   __('E-mail', 'wp-shop').'$#$textfield$#$0$#$1$#$0$#$0$#$0', // E-mail
						   __('Comment to the order', 'wp-shop').'$#$textarea$#$0$#$0$#$0$#$0$#$0');
		$this->payments[$i]->picture = 'russianpost.png';

		$i = 3;
		$this->payments[$i] = new Wpshop_Payment_Data();
		$this->payments[$i]->paymentID = "wm";
		$this->payments[$i]->title = __('Making order using Web-money payment system', 'wp-shop'); //Оформление заказа с оплатой через систему ‘Web-Money’
		$this->payments[$i]->name = "Web-Money";
		$this->payments[$i]->fields = array("Order".'$#$hidden$#$0$#$0$#$0$#$0$#$0',
						   __('Order type:', 'wp-shop').' <b>'.__('Making order using Web-money payment system', 'wp-shop').'</b>$#$hidden$#$0$#$0$#$0$#$0$#$0', // Тип заказа: <b>Наличными курьеру
						   __('For making order please fill up the form:', 'wp-shop').'$#$fieldsetstart$#$0$#$0$#$0$#$0$#$0', // Для оформления заказа заполните эту форму:
						   __('Your name', 'wp-shop').'|||||Name$#$textfield$#$1$#$0$#$1$#$0$#$0', // Ваше имя
						   __('Contact phone', 'wp-shop').'|||||Phone$#$textfield$#$1$#$0$#$0$#$0$#$0', // Контактный телефон
						   __('Address', 'wp-shop').'|||||Address$#$textfield$#$0$#$0$#$0$#$0$#$0', // Контактный телефон
						   __('E-mail', 'wp-shop').'$#$textfield$#$0$#$1$#$0$#$0$#$0', // E-mail
						   __('Comment to the order', 'wp-shop').'$#$textarea$#$0$#$0$#$0$#$0$#$0');
		$this->payments[$i]->picture = 'wbmoney.png';
		$this->payments[$i]->textAfterSend = '<h3>'.__('To pay your order, click the button above \'Pay WM\'. <br/> After your payment, we will get data of your payment and our manager will contact you to arrange the delivery. <br/> Thank you for using our service!', 'wp-shop').'</h3>'; // Для оплаты Вашего заказа нажмите кнопку выше 'Оплатить WM'.<br/>После совершения Вами оплаты заказа информация передается нам, и наш менеджер обязательно свяжется с Вами для уточнения деталей доставки.<br/>Благодарим, что воспользовались нашим сервисом!

		$i = 4;
		$this->payments[$i] = new Wpshop_Payment_Data();
		$this->payments[$i]->paymentID = "bank";
		$this->payments[$i]->name = __('Cashless payment', 'wp-shop'); // Безналичный расчет
		$this->payments[$i]->title = __('Making order with payment using bank account (Non-cash payment)', 'wp-shop'); // Оформление заказа с оплатой через банк (Безналичный расчет)
		$this->payments[$i]->fields = array("Order".'$#$hidden$#$0$#$0$#$0$#$0$#$0',
						   __('Order type:', 'wp-shop').' <b>'.__('Cashless payment', 'wp-shop').'</b>$#$hidden$#$0$#$0$#$0$#$0$#$0', // Тип заказа: <b>Наличными курьеру
						   __('For making order please fill up the form:', 'wp-shop').'$#$fieldsetstart$#$0$#$0$#$0$#$0$#$0', // Для оформления заказа заполните эту форму:
						   __('Your name', 'wp-shop').'|||||Name$#$textfield$#$1$#$0$#$1$#$0$#$0', // Ваше имя
						   __('Contact phone', 'wp-shop').'|||||Phone$#$textfield$#$1$#$0$#$0$#$0$#$0', // Контактный телефон
						   __('Address', 'wp-shop').'|||||Address$#$textfield$#$0$#$0$#$0$#$0$#$0', // Контактный телефон
						   __('E-mail', 'wp-shop').'$#$textfield$#$0$#$1$#$0$#$0$#$0', // E-mail
						   __('Comment to the order', 'wp-shop').'$#$textarea$#$0$#$0$#$0$#$0$#$0');
		$this->payments[$i]->picture = 'bankoffice.png';

		$i = 5;
		$this->payments[$i] = new Wpshop_Payment_Data();
		$this->payments[$i]->paymentID = "robokassa";
		$this->payments[$i]->name = "RoboKassa";
		$this->payments[$i]->title = __('Making order with payment using ‘RoboKassa.ru’ payment system', 'wp-shop'); // Оформление заказа с оплатой через систему ‘RoboKassa.ru’
		$this->payments[$i]->fields = array("Order".'$#$hidden$#$0$#$0$#$0$#$0$#$0',
						   __('Order type:', 'wp-shop').' <b>'.__('Making order with payment using ‘RoboKassa.ru’ payment system', 'wp-shop').'</b>$#$hidden$#$0$#$0$#$0$#$0$#$0', // Тип заказа: <b>Наличными курьеру
						   __('For making order please fill up the form:', 'wp-shop').'$#$fieldsetstart$#$0$#$0$#$0$#$0$#$0', // Для оформления заказа заполните эту форму:
						   __('Your name', 'wp-shop').'|||||Name$#$textfield$#$1$#$0$#$1$#$0$#$0', // Ваше имя
						   __('Contact phone', 'wp-shop').'|||||Phone$#$textfield$#$1$#$0$#$0$#$0$#$0', // Контактный телефон
						   __('Address', 'wp-shop').'|||||Address$#$textfield$#$0$#$0$#$0$#$0$#$0', // Контактный телефон
						   __('E-mail', 'wp-shop').'$#$textfield$#$0$#$1$#$0$#$0$#$0', // E-mail
						   __('Comment to the order', 'wp-shop').'$#$textarea$#$0$#$0$#$0$#$0$#$0');
		$this->payments[$i]->picture = 'robokassa.gif';
		$this->payments[$i]->merchant = true;
		$this->payments[$i]->textAfterSend = '<h3>'.__('Select the appropriate payment method from the list of the available options and initiate the payment. When we will get payment data, our manager will contact you using your contact number for further details on your order. <br>Thank you for using our service!', 'wp-shop').'</h3>'; // Выберите подходящий Вам способ оплаты из списка имеющихся вариантов и осуществите платеж. Данные по совершенному Вами платежу поступят нашим менеджерам, которые свяжутся с Вами по контактному телефону для уточнения деталей по Вашему заказу.<br> Благодарим, что воспользовались нашим сервисом!

		$i = 6;
		$this->payments[$i] = new Wpshop_Payment_Data();
		$this->payments[$i]->paymentID = "paypal";
		$this->payments[$i]->name = "Pay Pal";
		$this->payments[$i]->title = __('Making order using Pay Pal payment system', 'wp-shop'); //Оформление заказа с оплатой через систему Pay Pal
		$this->payments[$i]->fields = array("Order".'$#$hidden$#$0$#$0$#$0$#$0$#$0',
						   __('Order type:', 'wp-shop').' <b>'.__('Making order with payment using ‘Pay Pal’ payment system', 'wp-shop').'</b>$#$hidden$#$0$#$0$#$0$#$0$#$0', // Тип заказа: <b>Наличными курьеру
						   __('For making order please fill up the form:', 'wp-shop').'$#$fieldsetstart$#$0$#$0$#$0$#$0$#$0', // Для оформления заказа заполните эту форму:
						   __('Your name', 'wp-shop').'|||||Name$#$textfield$#$1$#$0$#$1$#$0$#$0', // Ваше имя
						   __('Contact phone', 'wp-shop').'|||||Phone$#$textfield$#$1$#$0$#$0$#$0$#$0', // Контактный телефон
						   __('Address', 'wp-shop').'|||||Address$#$textfield$#$0$#$0$#$0$#$0$#$0', // Контактный телефон
						   __('E-mail', 'wp-shop').'$#$textfield$#$0$#$1$#$0$#$0$#$0', // E-mail
						   __('Comment to the order', 'wp-shop').'$#$textarea$#$0$#$0$#$0$#$0$#$0');
		$this->payments[$i]->picture = 'paypal.png';
		$this->payments[$i]->textAfterSend = '<h3>'.__('To pay your order, click the button above \'Pay PayPal\'. <br/> After your payment, we will get data of your payment and our manager will contact you to arrange the delivery. <br/> Thank you for using our service!', 'wp-shop').'</h3>';
				
		$i = 7;
		$this->payments[$i] = new Wpshop_Payment_Data();
		$this->payments[$i]->paymentID = "ek";
		$this->payments[$i]->title = __('Making order using Edinaya kassa payment system', 'wp-shop'); //Оформление заказа с оплатой через систему EK
		$this->payments[$i]->name = "Edinaya kassa";
		$this->payments[$i]->fields = array("Order".'$#$hidden$#$0$#$0$#$0$#$0$#$0',
						   __('Order type:', 'wp-shop').' <b>'.__('Making order using Edinaya kassa payment system', 'wp-shop').'</b>$#$hidden$#$0$#$0$#$0$#$0$#$0', // Тип заказа: <b>Наличными курьеру
						   __('For making order please fill up the form:', 'wp-shop').'$#$fieldsetstart$#$0$#$0$#$0$#$0$#$0', // Для оформления заказа заполните эту форму:
						   __('Your name', 'wp-shop').'|||||Name$#$textfield$#$1$#$0$#$1$#$0$#$0', // Ваше имя
						   __('Contact phone', 'wp-shop').'|||||Phone$#$textfield$#$1$#$0$#$0$#$0$#$0', // Контактный телефон
						   __('Address', 'wp-shop').'|||||Address$#$textfield$#$0$#$0$#$0$#$0$#$0', // Контактный телефон
						   __('E-mail', 'wp-shop').'$#$textfield$#$0$#$1$#$0$#$0$#$0', // E-mail
						   __('Comment to the order', 'wp-shop').'$#$textarea$#$0$#$0$#$0$#$0$#$0');
		$this->payments[$i]->picture = 'ek.gif';
		$this->payments[$i]->merchant = true;
		$this->payments[$i]->textAfterSend = '<h3>'.__('To pay your order, click the button above \'Pay EK\'. <br/> After your payment, we will get data of your payment and our manager will contact you to arrange the delivery. <br/> Thank you for using our service!', 'wp-shop').'</h3>';

		add_filter('init', array(&$this,'webMoneyResult'));
		add_filter('init', array(&$this,'robokassaResult'));
		add_filter('init', array(&$this,'ekResult'));
		add_filter('init', array(&$this,'paypalResult'));
	}

	/**
	 * обыкновенный синглетон)
	 */
	public function getInstance()
	{
		if (self::$instance==null)
		{
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * @deprecated
	 */
	public function getSingleton()
	{
		return self::getInstance();
	}

	/**
	 * Возвращает доступные формы оплаты
	 *
	 * @return Array
	 */
	public function getPayments()
	{
		return $this->payments;
	}
	/**
	 *
	 */
	public function getPaymentByID($id)
	{
		foreach($this->payments as $key => $value)
		{
			if ($value->paymentID == $id) return $this->payments[$key];
		}
		return null;
	}

	public function webMoneyResult()
	{
		if (isset($_GET['wmResult']))
		{
			Wpshop_Orders::setStatus($_GET['order_id'],1);
			echo "YES";
			exit;
		}

	}

	public function robokassaResult()
	{
		if (isset($_GET['robokassaResult']))
		{
			$robokassa = get_option("wpshop.payments.robokassa");

			// регистрационная информация (пароль #2)
			// registration info (password #2)
			$mrh_pass2 = $robokassa['pass2'];

			//установка текущего времени
			//current date
			$tm=getdate(time()+9*3600);
			$date="{$tm['year']}-{$tm['mon']}-{$tm['mday']} {$tm['hours']}:{$tm['minutes']}:{$tm['seconds']}";

			// чтение параметров
			// read parameters
			$out_summ = $_REQUEST["OutSum"];
			$inv_id = $_REQUEST["InvId"];
			$shp_item = $_REQUEST["Shp_item"];
			$crc = $_REQUEST["SignatureValue"];

			$crc = strtoupper($crc);

			$my_crc = strtoupper(md5("{$out_summ}:{$inv_id}:{$mrh_pass2}:Shp_item={$shp_item}"));

			// проверка корректности подписи
			// check signature
			if ($my_crc !=$crc)
			{
			  echo "bad sign\n";
			  exit();
			}
			// признак успешно проведенной операции
			// success
			echo "OK$inv_id\n";
			Wpshop_Orders::setStatus($inv_id,1);
			exit();
		}
	}
	public function ymlRequest()
	{
		if (isset($_GET['wpshop_yml']))
		{
			global $wpdb;
			ob_end_clean();
			ob_start();
			include WPSHOP_DIR ."/views/wm.redirect.php";
			echo ob_get_clean();
			exit;
		}
	}
	public function ekResult()
	{
		$status_order = Wpshop_Orders::getStatus_order($_POST["WMI_PAYMENT_NO"]);
			
		 if (isset($_POST['WMI_ORDER_STATE'])&&$status_order[0]->order_status==0&&isset($_POST["SESSION_USER"]))
			{ 
					// Функция, которая возвращает результат в Единую кассу

					function print_answer($result, $description)
					{
					  print "WMI_RESULT=" . strtoupper($result) . "&";
					  print "WMI_DESCRIPTION=" .urlencode($description);
					  global $wpdb;
					  
					  $wpdb->query("DELETE FROM {$wpdb->prefix}wpshop_selected_items WHERE selected_items_session_id='".$_POST["SESSION_USER"]."'");
					
					  Wpshop_Orders::setStatus($_POST["WMI_PAYMENT_NO"],1);
					  exit();
					}

					if (strtoupper($_POST["WMI_ORDER_STATE"]) == "ACCEPTED")
					  {
						// TODO: Пометить заказ, как «Оплаченный» в системе учета магазина

						print_answer("Ok", "Заказ #" . $_POST["WMI_PAYMENT_NO"] . " оплачен!");
					  }
					  else
					  {
						// Случилось что-то странное, пришло неизвестное состояние заказа

						print_answer("Retry", "Неверное состояние ". $_POST["WMI_ORDER_STATE"]);
					  }
			
			}
		
	}
	
	public function paypalResult()
	{
	if (isset($_POST['mc_gross'])){ 
  
		// read the data send by PayPal
		$req = 'cmd=_notify-validate';
		foreach ($_POST as $key => $value) {
			$value = urlencode(stripslashes($value));
			$req .= "&$key=$value";
		}
		$email = get_option("wpshop.payments.paypal");  
		// post back to PayPal system to validate
		$header .= "POST /cgi-bin/webscr HTTP/1.0\r\n";
		if($email['test']==true){$header .= "Host: www.sandbox.paypal.com\r\n";}
		if($email['test']==false){ $header .= "Host: www.paypal.com\r\n";}
		$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
		$header .= "Content-Length: " . strlen($req) . "\r\n\r\n";
		
		if($email['test']==true){ $fp = fsockopen ('ssl://www.sandbox.paypal.com', 443, $errno, $errstr, 30);}
		if($email['test']==false){ $fp = fsockopen ('ssl://www.paypal.com', 443, $errno, $errstr, 30);}
		
		
		$payment_status = $_POST['payment_status'];
		$payment_amount = $_POST['mc_gross'];
		$receiverEmail = $_POST['business'];
		
		$order = new Wpshop_Order($_POST["invoice"]);
		$full_price = $order->getTotalSum();
		
		$email_saler = $email['email'];

		if (!$fp) {
		// HTTP ERROR
		} else {
				fputs ($fp, $header . $req);
				while (!feof($fp)) {
				$res = fgets ($fp, 1024);
				if (strcmp ($res, "VERIFIED") == 0) {
					// PAYMENT VALID
					if ($payment_amount==$full_price&&$email_saler==$receiverEmail) {
						global $wpdb;
						$wpdb->query("DELETE FROM {$wpdb->prefix}wpshop_selected_items WHERE selected_items_session_id='".$_POST["custom"]."'");
						Wpshop_Orders::setStatus($_POST["invoice"],1);
						
					}
				}
		  
				else if (strcmp ($res, "INVALID") == 0) {
					
					// PAYMENT INVALID
		  
				}
		}
		fclose ($fp);
		}
		}		
			
	}

}
