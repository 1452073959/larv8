<?php

namespace App\Http\Controllers\Api;
use Symfony\Component\HttpFoundation\Response as FoundationResponse;
use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;
use App\Http\Controllers\Controller as BaseController;

class Controller extends BaseController
{
    use Helpers;
//    public $user=[];
//    protected $guard = 'api';
//    public function __construct(Request $request)
//    {
////      $this->middleware('refresh')->except('wechat');;
////        $this->middleware('auth:api', ['except' => ['wechat']]);
////        $this->middleware('jwt.auth', ['except' => ['wechat','tokenupdate','productlist','productshow','cate']]);
//        $this->user =  auth('api')->user();
//    }
//
//    public function respondWithToken($token)
//    {
//        return response()->json([
//            'access_token' => $token,
//            'token_type' => 'Bearer',
//            'expires_in' => auth('api')->factory()->getTTL() * 60
//        ]);
//    }


    /**
     * @var int

    1. 返回正确信息

    return $this->success('用户登录成功...');
    2. 返回正确资源信息

    return $this->success($user);
    3. 返回自定义 http 状态码的正确信息

    return $this->setStatusCode(201)->success('用户登录成功...');
    4. 返回错误信息

    return $this->failed('用户注册失败');
    5. 返回自定义 http 状态码的错误信息

    return $this->failed('用户登录失败',401);
    6. 返回自定义 http 状态码的错误信息，同时也想返回自己内部定义的错误码

    return $this->failed('用户登录失败',401,10001);
    默认 success 返回的状态码是 200，failed 返回的状态码是 400
     */
    protected $statusCode = FoundationResponse::HTTP_OK;
    /**
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param $statusCode
     * @return $this
     */
    public function setStatusCode($statusCode,$httpCode=null)
    {
        $httpCode = $httpCode ?? $statusCode;
        $this->statusCode = $statusCode;
        return $this;
    }

    /**
     * @param $data
     * @param array $header
     * @return mixed
     */
    public function respond($data, $header = [])
    {

        return Response::json($data,$this->getStatusCode(),$header);
    }

    /**
     * @param $status
     * @param array $data
     * @param null $code
     * @return mixed
     */
    public function status($status, array $data, $code = null){

        if ($code){
            $this->setStatusCode($code);
        }
        $status = [
            'status' => $status,
            'code' => $this->statusCode
        ];

        $data = array_merge($status,$data);
        return $this->respond($data);

    }

    /**
     * @param $message
     * @param int $code
     * @param string $status
     * @return mixed
     */
    /*
     * 格式
     * data:
     *  code:422
     *  message:xxx
     *  status:'error'
     */
    public function failed($message, $code = FoundationResponse::HTTP_BAD_REQUEST,$status = 'error'){

        return $this->setStatusCode($code)->message($message,$status);
    }

    /**
     * @param $message
     * @param string $status
     * @return mixed
     */
    public function message($message, $status = "success"){

        return $this->status($status,[
            'message' => $message
        ]);
    }

    /**
     * @param string $message
     * @return mixed
     */
    public function internalError($message = "Internal Error!"){

        return $this->failed($message,FoundationResponse::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * @param string $message
     * @return mixed
     */
    public function created($message = "created")
    {
        return $this->setStatusCode(FoundationResponse::HTTP_CREATED)
            ->message($message);

    }

    /**
     * @param $data
     * @param string $status
     * @return mixed
     */
    public function success($data, $status = "success"){

        return $this->status($status,compact('data'));
    }

    /**
     * @param string $message
     * @return mixed
     */
    public function notFond($message = 'Not Fond!')
    {
        return $this->failed($message,Foundationresponse::HTTP_NOT_FOUND);
    }
    // 其他通用的Api帮助函数

    public function http_post_data($url, $data_string)
    {
        $data_string = json_encode($data_string);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);

        $ssl = preg_match('/^https:\/\//i', $url) ? TRUE : FALSE;

        curl_setopt($ch, CURLOPT_URL, $url);

        if ($ssl) {

            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); // https请求 不验证证书和hosts

            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); // 不从证书中检查SSL加密算法是否存在

        }

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json; charset=utf-8',
                'Content-Length: ' . strlen($data_string))
        );

        //curl_setopt($ci, CURLOPT_HEADER, true); /*启用时会将头文件的信息作为数据流输出*/

        //curl_setopt($ci, CURLOPT_FOLLOWLOCATION, 1);

        curl_setopt($ch, CURLOPT_MAXREDIRS, 2);/*指定最多的HTTP重定向的数量，这个选项是和CURLOPT_FOLLOWLOCATION一起使用的*/


        curl_setopt($ch, CURLINFO_HEADER_OUT, true);

        ob_start();
        curl_exec($ch);
        $return_content = ob_get_contents();
        ob_end_clean();
        $return_content = json_decode($return_content, true);
        $return_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        return array($return_code, $return_content);
    }


    public function httpget($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.22 (KHTML, like Gecko)");
        curl_setopt($ch, CURLOPT_ENCODING, "gzip");//加入gzip解析
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $output = curl_exec($ch);
        curl_close($ch);

        return $output;
    }


    public function getAccessToken($appid,$appsecret)
    {
//        $url="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=APPID&secret=APPSECRET";
        $url = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=' . $appid . '&secret=' . $appsecret;
        $verify= json_decode($this->httpget($url),true);
        $verify= $verify['access_token'];
        return $verify;
    }

    //下单
    public function xiadan()
    {
        $payment = \EasyWeChat::payment(); // 微信支付

        $result = $payment->order->unify([
            'body'         => '你自己想写的名称',
            'out_trade_no' => '你自己定义的订单号',
            'trade_type'   => 'JSAPI',  // 必须为JSAPI
            'openid'       => '在上一步中获取到的openid', // 这里的openid为付款人的openid
            'total_fee'    => 1, // 总价
        ]);

// 如果成功生成统一下单的订单，那么进行二次签名
        if ($result['return_code'] === 'SUCCESS') {
            // 二次签名的参数必须与下面相同
            $params = [
                'appId'     => '你的小程序的appid',
                'timeStamp' => (string)time(),
                'nonceStr'  => $result['nonce_str'],
                'package'   => 'prepay_id=' . $result['prepay_id'],
                'signType'  => 'MD5',
            ];

            // config('wechat.payment.default.key')为商户的key
            $params['paySign'] = generate_sign($params, config('wechat.payment.default.key'));

            return $params;
        } else {
            return $result;
        }

    }

    protected function get_weeks($time = '', $format = 'Y-m-d')
    {
        $time = $time != '' ? $time : time();
        //组合数据
        $date = [];
        for ($i = 1; $i <= 7; $i++) {
            $date[$i] = date($format, strtotime('+' . $i - 7 . ' days', $time));
        }
        return $date;
    }
}
