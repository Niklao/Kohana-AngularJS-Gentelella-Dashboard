<?php defined('SYSPATH') or die('No direct script access.');

class Viewloader{
	
	public static $commonJavascript=array('modernizr.js','jquery-2.1.4.min.js','reSizer.js','foundation.min.js','phery.js','classie.js','slick.js','jquery.smoove.js','bootstrap-rating.js','productSolo.js','smoothproducts2.js','waitMe.js','jquery.tooltipster.min.js','rfoot.js');

	public static function commonJavascript($arr){
		return array_merge(Niklogic::$commonJavascript,$arr);
	}

	public static function commonLoad($title,$role,$location,$cartState=True){
		$view=View::factory($role.'/l'.$location)->set('title' , $title);
		$view->body=View::factory('common/pbody');
		$view->body->head=View::factory('common/phead');
		$view->body->torso=View::factory($location.'/'.substr($location,0,1).'torso');
		$view->body->footer=View::factory('common/pfooter');
		return $view;
	}
	
	public static function psoloCommon($product){
		$productView=View::factory('product/psolo');
		$productView->productName=$product->name;
		$color=ORM::factory('Color')->where('pid', '=', $product->id )->find();
		$image=ORM::factory('Image')->where('colorid', '=', $color->cid )->find();
		if(isset($image))
		{
			$imageProcesing = Image::factory($image->path);
			if(file_exists(str_replace('\\','/',DOCROOT.$image->path)))
			{
				$imageProcesing->resize(350, NULL, Image::PRECISE);
				$imageProcesing->square();
				$filename=explode('/',$image->path);
				$imageProcesing->save(DOCROOT.'imagecache/'.$filename[1]);
				$productView->imagePath ='imagecache/'.$filename[1];
			}
			else
			{
				$productView->imagePath ='imagecache/missing-image-640x360.png';
			}
		}
		$productView->pid =$product->id;
		$productView->price = ($product->price != 0)? 'Rs '.$product->price : 'N/A';
		$productView->productLink='product/'.$product->id.'_'.str_replace('.','_',$product->name);
		return $productView;
	}
	
	public static function generateList($list)
	{
		$input='';
		foreach($list as $key => $value)
		{
			$input=$input.'<input type="hidden" name="'.$key.'" value="'.$value.'"></input>';
		}
		return $input;
	}
	
	public static function email($messageBody,$to)
	{
		$message = array(
		'subject' => 'Order Details',
		'body'    => $messageBody,
		'from'    => array('noreply@vernafurniture.com' => 'Verna Furnitue No Reply'),
		'to'      => $to
		);
		$code = Email::send('default',$message['subject'], $message['body'], $message['from'], $message['to']);
	}
	
	public static function flushCookie()
	{
		if($productno=Cookie::get('productno'))
		{			
			for($i=0;$i<=$productno;++$i)
			{
				Cookie::delete('product'.$i);
			}
		}
		Cookie::delete('productno');
	}
	
	public static function smallThumbnnail($product)
	{
		$smallThumbnail=View::factory('product/smallThumbnail');
		$color=ORM::factory('Color')->where('pid', '=', $product->id )->find();
		$image=ORM::factory('Image')->where('colorid', '=', $color->cid )->find();
		if(isset($image))
		{
			$imageProcesing = Image::factory($image->path);
			if($imageProcesing)
			{
				$imageProcesing->resize(350, NULL, Image::PRECISE);
				$imageProcesing->square();
				$filename=explode('/',$image->path);
				$imageProcesing->save(DOCROOT.'imagecache/smallThumbnail'.$filename[1]);
			}
		}
		$smallThumbnail->imagePath ='imagecache/smallThumbnail'.$filename[1];
		$smallThumbnail->name =$product->name;
		return $smallThumbnail;
	}

	public static function orderTable($orderId)
	{
		$table='';$totalPrice=0;
		$table='<table class="large-12 small-12 columns end"><tr><th scope="column">Item</th><th scope="column">Quantity</th><th scope="column">Price</th><th scope="column">SubTotal</th><th scope="column"></th></tr>';
		$productList=ORM::factory('OrderedProduct')->where('order_id', '=' , $orderId )->find_all();
		foreach($productList as $productList)
		{	
			$product=ORM::factory('Product')->where('id', '=', $productList->product_id )->find();
			$color=ORM::factory('Color')->where('pid', '=', $product->id )->find();
			$image=ORM::factory('Image')->where('colorid', '=', $color->cid )->find();
			$imageProcesing = Image::factory($image->path);
			if($imageProcesing)
			{
				$imageProcesing->resize(100, NULL, Image::PRECISE);
				$imageProcesing->square();
				$filename=explode('/',$image->path);
				$imageProcesing->save(DOCROOT.'imagecache/cartthumb_'.$filename[1]);
			}
			$table=$table.'<tr><td><div class="row"><div class="large-4 small-12 columns">'.HTML::anchor('product/'.$product->id.'_'.$product->name , HTML::image('imagecache/cartthumb_'.$filename[1])).'</div><div class="large-8 small-12 columns"><span style="line-height:100px">'.HTML::anchor('product/'.$product->id.'_'.$product->name, $product->name).'</span></div></div></td><td>'.$productList->quantity.'</td><td>'.(($product->price) ? $product->price : 'N/A' ).'</td><td>'.(($product->price) ? $product->price*((int)$productList->quantity) : 'N/A').'</td></tr>';
			$totalPrice=$totalPrice+(($product->price) ? $product->price*$productList->quantity : 0);
		}
		
		$table=$table.'<tr><td></td><td></td><td>Total:</td><td>'.$totalPrice.'</td></tr></table>';
		return $table;
	}
	
	///////////////////////////////Cart/////////////////////////////////////////
	
	public static function addToCart($product,$quantity)
	{
		$found=False;
		if($productno=Cookie::get('productno'))
		{
			for($i=0;$i<=$productno;++$i)
			{
				if($productAtt=Cookie::get('product'.(string)$i))
				{
					$productid=explode('_' , $productAtt);
					if($productid[0]==$product)
					{
						$product=ORM::factory('Product')->where('id','=',$productid[0])->find();
						if($product->price != 0)
						{
							Cookie::set('product'.(string)$i,$product.'_'.$quantity);
							$found=True;
							$message=Niklogic::smallThumbnnail($product);
						}
						else
						{
							$message="Product Is Not Available";
						}
					}
				}
			}
			if(!$found)
			{
				$product=ORM::factory('Product')->where('id','=',$product)->find();
				if($product->price != 0)
				{
					Cookie::set('product'.(string)++$productno , $product.'_'.$quantity );
					Cookie::set('productno' , $productno );
					$message=Niklogic::smallThumbnnail($product);
				}
				else
				{
					$message="Product Is Not Available";
				}
			}
		}
		else
		{	
			$product=ORM::factory('Product')->where('id','=',$product)->find();
			if($product->price != 0)
			{
				$productno=1;
				Cookie::set('product'.(string)$productno , $product.'_'.$quantity );
				Cookie::set('productno' , $productno );
				$message=Niklogic::smallThumbnnail($product);
			}
			else
			{
				$message="Product Is Not Available";
			}
		}
		return PheryResponse::factory()->jquery('.triggerOne')->trigger('dbclick')->jquery('#cartRate')->html('Rs.'.Niklogic::rate())->jquery('#toolTipContent')->html($message)->jquery('#toolTipContent')->trigger('dbclick');
	}
	
	public static function removeFromCart($product)
	{
		if($productno=Cookie::get('productno'))
		{
		}
		else
		{
			$productno=1;
		}
		for($i=0;$i<=$productno;++$i)
		{
			if($productAtt=Cookie::get('product'.$i))
			{
				$productid=explode('_' , $productAtt);
				if($productid[0]==$product)
				{
					Cookie::delete('product'.$i);
				}
			}
		}
		$table=Niklogic::loadCartTable();
		return PheryResponse::factory()->jquery('.triggerOne')->trigger('dbclick')->jquery('#cartProductList')->jquery('#cartProductList')->html($table)->prepend('<div data-alert class="alert-box success radius">Product Removed from Cart.<a href="#" class="close">&times;</a></div>')->jquery('#cartRate')->html('Rs.'.Niklogic::rate());
	}	
	
	public static function openCart()
    {
		return PheryResponse::factory()->jquery('#cartProductList')->html(Niklogic::loadCartTable())->jquery('#cartTitle')->trigger('click');
    }
	
	public static function cartManager($product)
    {
		$found=False;
		if($productno=Cookie::get('productno'))
		{
			for($i=0;$i<=$productno;++$i)
			{
				if($productAtt=Cookie::get('product'.$i))
				{
					$productid=explode('_' , $productAtt);
					if($productid[0]==$product->id)
					{
						$quantity=$productid[1];
						$found=True;
					}
				}
			}
			if(!$found)
			{
				$quantity=1;
			}
		}
		else
		{
			$quantity=1;
		}
		
		$cartManager=View::factory('cart/cartManager');
		$cartManager->price=($product->price != 0)? 'Rs '.$product->price : 'N/A';
		$cartManager->quantity=$quantity;
		$cartManager->id=$product->id;
		return $cartManager;
	}
	
	public static function loadCartTable()
	{
		$table='';$totalPrice=0;
		$tableState=$firstTime=True;
		if($productno=Cookie::get('productno'))
		{			
			for($i=0;$i<=$productno;++$i)
			{
				if($productAtt=Cookie::get('product'.$i))
				{
					if($firstTime)
					{
						$table='<table class="large-12 small-12 columns end"><tr><th scope="column">Item</th><th scope="column">Quantity</th><th scope="column">Price</th><th scope="column">SubTotal</th><th scope="column"></th></tr>';
						$firstTime=False;
					}
					$tableState=False;
					$productId=explode('_' , $productAtt);
					$product=ORM::factory('Product')->where('id', '=', $productId[0])->find();
					$color=ORM::factory('Color')->where('pid', '=', $product->id )->find();
					$image=ORM::factory('Image')->where('colorid', '=', $color->cid )->find();
					$imageProcesing = Image::factory($image->path);
					if($imageProcesing)
					{
						$imageProcesing->resize(100, NULL, Image::PRECISE);
						$imageProcesing->square();
						$filename=explode('/',$image->path);
						$imageProcesing->save(DOCROOT.'imagecache/cartthumb_'.$filename[1]);
					}
					$table=$table.'<tr><td><div class="row"><div class="large-4 small-12 columns">'.HTML::anchor('product/'.$product->id.'_'.$product->name , HTML::image('imagecache/cartthumb_'.$filename[1])).'</div><div class="large-8 small-12 columns"><span style="line-height:100px">'.HTML::anchor('product/'.$product->id.'_'.$product->name, $product->name).'</span></div><div class="large-8 small-12 columns">'.HTML::anchor('#', 'Remove <i class=" fa fa-times-circle-o"></i>', array('data-product' => $product->id ,'class' => 'removeFromCart')).'</div></div></td><td>'.$productId[1].'</td><td>'.(($product->price) ? $product->price : 'N/A' ).'</td><td>'.(($product->price) ? $product->price*((int)$productId[1]) : 'N/A').'</td></tr>';
					$totalPrice=$totalPrice+(($product->price) ? $product->price*$productId[1] : 0);
				}
			}
			if(!$firstTime)
			{
				$table=$table.'<tr><td></td><td></td><td>Total:</td><td>'.$totalPrice.'</td></tr></table>';
			}
			
		}
		return $table=($tableState)? 'Your shopping cart is empty!' :$table;
	}

	public static function cronJobCounter(){
		$cronJob = ORM::factory('Setting')->where('name', '=', 'cronJobs' )->find();
		if(!$cronJob->loaded() ){
			$cronJob = ORM::factory('Setting');
			$cronJob->name='cronJobs';
			$cronJob->value=1;
			$cronJob->save();			
		} else {
			$cronJob->value=strVal(intVal($cronJob->value)+1);
			$cronJob->save();
		}
		return $cronJob->value;
	}

	public static function save_image($image){
		if (! Upload::valid($image) OR ! Upload::not_empty($image) OR ! Upload::type($image, array('jpg', 'jpeg', 'png', 'gif'))){
			return FALSE;
		}
		$directory = DOCROOT.'uploads/';

		if ($file = Upload::save($image, NULL, $directory)){
			$filename = strtolower(Text::random('alnum', 20)).'.jpg';
			Image::factory($file)->resize(200, 200, Image::AUTO)->save($directory.$filename);
			// Delete the temporary file
			unlink($file);
			return $filename;
		}
		return FALSE;
	}

	
	///////////////////////////////Cart/////////////////////////////////////////
} // END class Niklogic