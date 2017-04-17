<?php
//支付宝支付测试
namespace App\Http\Controllers\Test;

class TestAlipay extends TestBase
{
    //支付
    public function pay()
    {
        $aop = new \AopClient();
        $aop->gatewayUrl = 'https://openapi.alipay.com/gateway.do';
        $aop->appId = '2017041606752864';
        $aop->rsaPrivateKey = 'MIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQCh1S6CHOHbU97uqcGtc8vatQPnSAVfdNGrBZxvmo8+Nlrizj835dEqSxHyeQ4AEb/QmbGI7L/935uxHZ0mz9bZlezDi/cHFnu0OUoFEPgu4ts8egaFXr/FmcFvOedofygITiLd+ttDBhsDl/vh7OLf9FkYNb+cMsHJEytGJa0jCpGzEVWP71X8wqoYWQn/M7xG9WhkI2eXeuIT5LBvLYKZgGfzVJKv8rBcfyasjly+8EYbHgZSPAwAWN/MTLeKYy8xt0Zj9aJDScHHZG0Jkn3+ZdvK1lriTK9aZIN4Qfo82rV1/uFdOrgjVmTkEt7w8tNSqbqUiOgcYbPGM4f+miqlAgMBAAECggEAR8JDsSYlcB+shp93ZfYmun/xjyh8WWtvXSpLx6D9S1TG0DMsDRk2uk43UxEiiB1WtKSx+EkiiOwSGWNMP92BI1I7fioeC2KIz81naP+xTPkCxbpGEfWFi5U2FJ/UYJ2hnq0nAM8vUnTunZVS90cXAr9Skk2i/Rv0mbiKQ7yJHTPnFcwLpXJ/y/Sv/zZPf8P/d7pf9qnJQajYg+rke8rGg3TgtFGDcxm4nSydpNkVUBUDSC9yEFowQH9ufjdufC/lkGyHRHoK6n3MonqZyAW9Zg/98Ct9s6bj25CIQnJmO9u/ImFf5NM1g5Zx5Nv0rJlWnJoZWhlNd+j/A6vlMPg6MQKBgQDz7oAT/DEXNyasQsGSZNPSBNQP3BuiwULMDnX//5AHGIoHsYv0H/K7XX+nRieFy9Rx6eUO6syc1wT5p6Gyb871DqMewC0AL+6UCJMj2rFHbKuIRTWb1wrMXrEdqepTE/Wd6/UHZCnV22VhfmGLIJO2ItC0PE6lJfIj0W4hTiXSKwKBgQCp1t0BAkyg9P/a2C3NLS2jU+ivziw0glXgs0OOF1ERPkNnVEOHlRBPSL05+Ces1KSgT+zwf9E/fys+bwmOSVp1HyYg75Fi2t0/bp+0WjDWVmk1rKiNb+zu+kCqhyyxScoJ2S1i0NUrzAMBrT5ejnW1SjL4AFJwMmNhMK8xpjkebwKBgE0HGEy3S20wTjcBUYz/59+fBLQJZnSroIM9Yce4FOwYtKWfTDmHySefa8sPnTVj2y8pk9p1DK3OPFT1uVrWcbzypVH1j4BKooT+fDBLQ8XxK+15JWeTrWZB1J4wZL1dRSdcNmDiIU/V2xrBRN4hKGPQdKUlkhQWenMTFDrSKaFHAoGADjwxF+WOcKs4Sqp15E2WFqtwxFN+hwQpmITN87nmlJBoa9+3LUUEMfEB0zsGcEj+Z2VrkZjU/AJ3qGr8HQ3u5AQxWO9bezKm+qsV/bLVhxGFDfejxP8Nl9Yn12MvDskFgx/N2wtv4pTd56USpjBAk2pdrUWxoy/F/p5rALlS7kcCgYEAvT5nXZsqlnxXO5Q3PJxLV5POfxv8PzOT1cRGHiOZEio2o6Ga675YGe3Z9tvfBV6uayldr/LiNNUyMa/G5qc7h75RczqTr6fMnHx18k22z3RAwp5cIm5Dwnw4FARuhcv+LAFHX562uV+uyuxxLuIpDLo58nDE6sDzoxikdZNok6g=';
        $aop->alipayrsaPublicKey='MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEApqSNnFtECUcendzoW4gi2ScRS+dy0Xw0OIxhWo5kHWpB7ySSwt3h86YjdbnHeZpO7M+Fbggp+zhBYvGa5xBIIjQraqor7R0SBdTFuhEAfD1J4hII2vy2d8QMWg6xPgyRKm1m0PlbRQkTYDzpmcY6o0XgH8KZu1V8qHFmAEf7yqWABrYRJ4v/EITMUVyznFnNsPO0HE659pNyAt6TOHrIDM1xeWmI1T7qTHS1BxUMdMC0/VxsBCLWviRJZFvV2l9oY0ivN7L28HxpGJ6QmnTVb5Dink5AwVK83HTY4kXTtQp9YRv+FlGH3J5KqzvDpyjf8Cq3uwcLdOhsUwdfHTNXSQIDAQAB';
        $aop->apiVersion = '1.0';
        $aop->signType = 'RSA2';
        $aop->postCharset='UTF-8';
        $aop->format='json';
        $request = new \AlipayFundTransToaccountTransferRequest();
        $request->setBizContent("{" .
            "    \"out_biz_no\":\"3142321423432\"," .
            "    \"payee_type\":\"ALIPAY_LOGONID\"," .
            "    \"payee_account\":\"15035697801\"," .
            "    \"amount\":\"1.00\"," .
            "    \"payer_show_name\":\"尉鑫伟\"," .
            "    \"payee_real_name\":\"荆杨\"," .
            "    \"remark\":\"转账\"" .
            "  }");
        $result = $aop->execute ( $request);
        return array($result);

        $responseNode = str_replace(".", "_", $request->getApiMethodName()) . "_response";
        $resultCode = $result->$responseNode->code;
        if(!empty($resultCode)&&$resultCode == 10000){
            echo "成功";
        } else {
            echo "失败";
        }
    }

    //支付结果查询
    public function query()
    {
        $aop = new \AopClient();
        $aop->gatewayUrl = 'https://openapi.alipay.com/gateway.do';
        $aop->appId = '2017041606752864';
        $aop->rsaPrivateKey = 'MIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQCh1S6CHOHbU97uqcGtc8vatQPnSAVfdNGrBZxvmo8+Nlrizj835dEqSxHyeQ4AEb/QmbGI7L/935uxHZ0mz9bZlezDi/cHFnu0OUoFEPgu4ts8egaFXr/FmcFvOedofygITiLd+ttDBhsDl/vh7OLf9FkYNb+cMsHJEytGJa0jCpGzEVWP71X8wqoYWQn/M7xG9WhkI2eXeuIT5LBvLYKZgGfzVJKv8rBcfyasjly+8EYbHgZSPAwAWN/MTLeKYy8xt0Zj9aJDScHHZG0Jkn3+ZdvK1lriTK9aZIN4Qfo82rV1/uFdOrgjVmTkEt7w8tNSqbqUiOgcYbPGM4f+miqlAgMBAAECggEAR8JDsSYlcB+shp93ZfYmun/xjyh8WWtvXSpLx6D9S1TG0DMsDRk2uk43UxEiiB1WtKSx+EkiiOwSGWNMP92BI1I7fioeC2KIz81naP+xTPkCxbpGEfWFi5U2FJ/UYJ2hnq0nAM8vUnTunZVS90cXAr9Skk2i/Rv0mbiKQ7yJHTPnFcwLpXJ/y/Sv/zZPf8P/d7pf9qnJQajYg+rke8rGg3TgtFGDcxm4nSydpNkVUBUDSC9yEFowQH9ufjdufC/lkGyHRHoK6n3MonqZyAW9Zg/98Ct9s6bj25CIQnJmO9u/ImFf5NM1g5Zx5Nv0rJlWnJoZWhlNd+j/A6vlMPg6MQKBgQDz7oAT/DEXNyasQsGSZNPSBNQP3BuiwULMDnX//5AHGIoHsYv0H/K7XX+nRieFy9Rx6eUO6syc1wT5p6Gyb871DqMewC0AL+6UCJMj2rFHbKuIRTWb1wrMXrEdqepTE/Wd6/UHZCnV22VhfmGLIJO2ItC0PE6lJfIj0W4hTiXSKwKBgQCp1t0BAkyg9P/a2C3NLS2jU+ivziw0glXgs0OOF1ERPkNnVEOHlRBPSL05+Ces1KSgT+zwf9E/fys+bwmOSVp1HyYg75Fi2t0/bp+0WjDWVmk1rKiNb+zu+kCqhyyxScoJ2S1i0NUrzAMBrT5ejnW1SjL4AFJwMmNhMK8xpjkebwKBgE0HGEy3S20wTjcBUYz/59+fBLQJZnSroIM9Yce4FOwYtKWfTDmHySefa8sPnTVj2y8pk9p1DK3OPFT1uVrWcbzypVH1j4BKooT+fDBLQ8XxK+15JWeTrWZB1J4wZL1dRSdcNmDiIU/V2xrBRN4hKGPQdKUlkhQWenMTFDrSKaFHAoGADjwxF+WOcKs4Sqp15E2WFqtwxFN+hwQpmITN87nmlJBoa9+3LUUEMfEB0zsGcEj+Z2VrkZjU/AJ3qGr8HQ3u5AQxWO9bezKm+qsV/bLVhxGFDfejxP8Nl9Yn12MvDskFgx/N2wtv4pTd56USpjBAk2pdrUWxoy/F/p5rALlS7kcCgYEAvT5nXZsqlnxXO5Q3PJxLV5POfxv8PzOT1cRGHiOZEio2o6Ga675YGe3Z9tvfBV6uayldr/LiNNUyMa/G5qc7h75RczqTr6fMnHx18k22z3RAwp5cIm5Dwnw4FARuhcv+LAFHX562uV+uyuxxLuIpDLo58nDE6sDzoxikdZNok6g=';
        $aop->alipayrsaPublicKey='MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEApqSNnFtECUcendzoW4gi2ScRS+dy0Xw0OIxhWo5kHWpB7ySSwt3h86YjdbnHeZpO7M+Fbggp+zhBYvGa5xBIIjQraqor7R0SBdTFuhEAfD1J4hII2vy2d8QMWg6xPgyRKm1m0PlbRQkTYDzpmcY6o0XgH8KZu1V8qHFmAEf7yqWABrYRJ4v/EITMUVyznFnNsPO0HE659pNyAt6TOHrIDM1xeWmI1T7qTHS1BxUMdMC0/VxsBCLWviRJZFvV2l9oY0ivN7L28HxpGJ6QmnTVb5Dink5AwVK83HTY4kXTtQp9YRv+FlGH3J5KqzvDpyjf8Cq3uwcLdOhsUwdfHTNXSQIDAQAB';
        $aop->apiVersion = '1.0';
        $aop->signType = 'RSA2';
        $aop->postCharset='UTF-8';
        $aop->format='json';
        $request = new \AlipayFundTransOrderQueryRequest();
        $request->setBizContent("{" .
            "    \"out_biz_no\":\"3142321423432\"," .
            "    \"order_id\":\"20160627110070001502260006780837\"" .
            "  }");
        $result = $aop->execute ( $request);
        return array($result);

        $responseNode = str_replace(".", "_", $request->getApiMethodName()) . "_response";
        $resultCode = $result->$responseNode->code;
        if(!empty($resultCode)&&$resultCode == 10000){
            echo "成功";
        } else {
            echo "失败";
        }
    }
}
