<?php
function Tojson($data)
{
    return json_encode($data,true);
}

function http_post_data($url, $data_string)
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


if (!function_exists('json')) {
    /**
     * 获取\think\response\Json对象实例
     * @param mixed $data    返回的数据
     * @param int   $code    状态码
     * @param array $header  头部
     * @param array $options 参数
     * @return \think\response\Json
     */
    function json($data = [])
    {
        return response()->json($data);
    }
}

function RSA_openssl($data, $type = 'encode')
{
    if (empty($data)) {
        return 'data参数不能为空';
    }
    if (is_array($data)) {
        return 'data参数不能是数组形式';
    }

    $rsa_public = config('rsa_public');
    if (empty($rsa_public)) {
        $rsa_public = '-----BEGIN PUBLIC KEY-----
MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCeopXN60n8FkAHqKAn8xe5/qD9
AYjZilJq6T2HE+odQ+i1x1Eycnb6Nwmyi8qIPCjbVCf3jqu8ZVObuK2yBUhWT1/W
D03kihcXj8jRuUQGMZs3rpbWveBy7MXQ0BigrceFl7m4fMNTM4SnUpU22QakGHSC
ywQFdku3QXFOz5+UrwIDAQAB
-----END PUBLIC KEY-----';
    }
    $rsa_private = config('rsa_private');
    if (empty($rsa_private)) {
        $rsa_private = '-----BEGIN PRIVATE KEY-----
MIICdgIBADANBgkqhkiG9w0BAQEFAASCAmAwggJcAgEAAoGBAJ6ilc3rSfwWQAeo
oCfzF7n+oP0BiNmKUmrpPYcT6h1D6LXHUTJydvo3CbKLyog8KNtUJ/eOq7xlU5u4
rbIFSFZPX9YPTeSKFxePyNG5RAYxmzeulta94HLsxdDQGKCtx4WXubh8w1MzhKdS
lTbZBqQYdILLBAV2S7dBcU7Pn5SvAgMBAAECgYBj2E9TgTFa4iJA78iF/IJFhdeM
Bwg8a8w+EDmyqD0lWFXC/AXGK7do+3U2FLhQERViHtDdBsZe2KPMEmv47Uw+URua
MTH70RB+M3znfk2h2P0bf+PS1OMo1NOXo0BYdCqtgfT5k01B4ZYN0Nhr5gIp1lGI
+PWpEMIwGeGKRRWAAQJBAMvC8EfBz11cEwphIpmuVKePs3k9NxZdkR+xPCGD7zHM
RiFp4K/ZvBduX6JOmzkL4eXCFF2B3PWn0PLYsW0qVK8CQQDHTfV7gfKpZI0TlRuB
4lbbP1EQIrmpADSvZLmUL5iQLPYwDGJlVPNMOQnc6M8PMDBWMCFRmF0nROuv97Ys
rsABAkBes0QvZYE118Q1r72ABYjss5nrQCspJuV7AEl9Hi9+Sn1RrD60HBMSJMcn
zTbRRZeAzDng16lVNuCi7VlQ7jqbAkEAn5Na3tXP7jL1Bd3YFWmc85TBmfLDxn3E
sT4rnGtzctSdFSGFUu7uknQE4pyA1P9XZFrLAqLEyyFSuCTU9vfAAQJARtdRPRgb
gN9qP3ogtQOEXjGVuW+IZYC/NV2o5+TvGAe3OwNGDWq4AChXla8nF2FMNnrYcqy9
Y+AkAg8grZ1WRg==
-----END PRIVATE KEY-----';
    }

    //私钥解密
    if ($type == 'decode') {
        $private_key = openssl_pkey_get_private($rsa_private);
        if (!$private_key) {
            return ('私钥不可用');
        }
        $content = base64_decode($data);
        //把需要解密的内容，按128位拆开解密
        $result = '';
        for ($i = 0; $i < strlen($content) / 128; $i++) {
            $data = substr($content, $i * 128, 128);
            openssl_private_decrypt($data, $decrypt, $private_key);
            $result .= $decrypt;
        }
        openssl_free_key($private_key);
        return $result;
    }

    //公钥加密
    $key = openssl_pkey_get_public($rsa_public);
    if (!$key) {
        return ('公钥不可用');
    }
    $crypted = array();
    $data = $data;
    $dataArray = str_split($data, 117);
    foreach ($dataArray as $subData) {
        $subCrypted = null;
        openssl_public_encrypt($subData, $subCrypted, $key);
        $crypted[] = $subCrypted;
    }
    $crypted = implode('', $crypted);
    return base64_encode($crypted);
}