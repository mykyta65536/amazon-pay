<?php
/**
 * Created by PhpStorm.
 * User: dmitrikadykov
 * Date: 03/05/2017
 * Time: 15:41
 */

namespace SprykerEco\Zed\Amazonpay\Business\Api\Converter;

interface ConverterFactoryInterface
{
    /**
     * @return \SprykerEco\Zed\Amazonpay\Business\Api\Converter\ResponseParserConverterInterface
     */
    public function createCloseOrderConverter();

    /**
     * @return \SprykerEco\Zed\Amazonpay\Business\Api\Converter\ArrayConverterInterface
     */
    public function createObtainProfileInformationConverter();

    /**
     * @return \SprykerEco\Zed\Amazonpay\Business\Api\Converter\ResponseParserConverterInterface
     */
    public function createSetOrderReferenceDetailsConverter();

    /**
     * @return \SprykerEco\Zed\Amazonpay\Business\Api\Converter\ResponseParserConverterInterface
     */
    public function createConfirmOrderReferenceConverter();

    /**
     * @return \SprykerEco\Zed\Amazonpay\Business\Api\Converter\ResponseParserConverterInterface
     */
    public function createGetOrderReferenceDetailsConverter();

    /**
     * @return \SprykerEco\Zed\Amazonpay\Business\Api\Converter\ResponseParserConverterInterface
     */
    public function createAuthorizeOrderConverter();

    /**
     * @return \SprykerEco\Zed\Amazonpay\Business\Api\Converter\ResponseParserConverterInterface
     */
    public function createGetAuthorizationDetailsOrderConverter();

    /**
     * @return \SprykerEco\Zed\Amazonpay\Business\Api\Converter\ResponseParserConverterInterface
     */
    public function createCaptureOrderConverter();

    /**
     * @return \SprykerEco\Zed\Amazonpay\Business\Api\Converter\ResponseParserConverterInterface
     */
    public function createGetCaptureOrderDetailsConverter();

    /**
     * @return \SprykerEco\Zed\Amazonpay\Business\Api\Converter\ResponseParserConverterInterface
     */
    public function createRefundOrderConverter();

    /**
     * @return \SprykerEco\Zed\Amazonpay\Business\Api\Converter\ResponseParserConverterInterface
     */
    public function createGetRefundOrderConverter();

    /**
     * @return \SprykerEco\Zed\Amazonpay\Business\Api\Converter\ResponseParserConverterInterface
     */
    public function createCancelOrderConverter();

    /**
     * @return \SprykerEco\Zed\Amazonpay\Business\Api\Converter\Ipn\IpnConverterFactoryInterface
     */
    public function createIpnConverterFactory();

    /**
     * @return \SprykerEco\Zed\Amazonpay\Business\Api\Converter\ArrayConverterInterface
     */
    public function createIpnArrayConverter();
}