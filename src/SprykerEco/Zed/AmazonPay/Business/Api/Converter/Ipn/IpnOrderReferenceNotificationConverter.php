<?php

/**
 * Apache OSL-2
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerEco\Zed\AmazonPay\Business\Api\Converter\Ipn;

use Generated\Shared\Transfer\AmazonpayIpnOrderReferenceNotificationTransfer;

class IpnOrderReferenceNotificationConverter extends IpnPaymentAbstractRequestConverter
{
    const ORDER_REFERENCE = 'OrderReference';
    const AMAZON_ORDER_REFERENCE_ID = 'AmazonOrderReferenceId';
    const ORDER_REFERENCE_STATUS = 'OrderReferenceStatus';

    /**
     * @param array $request
     *
     * @return \Generated\Shared\Transfer\AmazonpayIpnOrderReferenceNotificationTransfer
     */
    public function convert(array $request)
    {
        $ipnOrderReferenceNotificationTransfer = new AmazonpayIpnOrderReferenceNotificationTransfer();

        $ipnOrderReferenceNotificationTransfer->setMessage($this->extractMessage($request));
        $ipnOrderReferenceNotificationTransfer->setOrderReferenceStatus($this->convertStatusToTransfer($request[static::ORDER_REFERENCE][static::ORDER_REFERENCE_STATUS]));
        $ipnOrderReferenceNotificationTransfer->setAmazonOrderReferenceId($request[static::ORDER_REFERENCE][static::AMAZON_ORDER_REFERENCE_ID]);

        return $ipnOrderReferenceNotificationTransfer;
    }
}