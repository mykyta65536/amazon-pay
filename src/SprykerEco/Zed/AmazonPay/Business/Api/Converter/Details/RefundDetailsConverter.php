<?php

/**
 * Apache OSL-2
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerEco\Zed\AmazonPay\Business\Api\Converter\Details;

use Generated\Shared\Transfer\AmazonpayRefundDetailsTransfer;
use SprykerEco\Zed\AmazonPay\Business\Api\Converter\AbstractArrayConverter;

class RefundDetailsConverter extends AbstractArrayConverter
{
    const AMAZON_REFUND_ID = 'AmazonRefundId';
    const REFUND_REFERENCE_ID = 'RefundReferenceId';
    const REFUND_AMOUNT = 'RefundAmount';
    const REFUND_STATUS = 'RefundStatus';
    const SELLER_REFUND_NOTE = 'SellerRefundNote';

    /**
     * @param array $refundDetailsData
     *
     * @return \Spryker\Shared\Kernel\Transfer\AbstractTransfer
     */
    public function convert(array $refundDetailsData)
    {
        $refundDetails = new AmazonpayRefundDetailsTransfer();
        $refundDetails->setAmazonRefundId($refundDetailsData[static::AMAZON_REFUND_ID]);
        $refundDetails->setRefundReferenceId($refundDetailsData[static::REFUND_REFERENCE_ID]);
        $refundDetails->setRefundAmount($this->convertPriceToTransfer(
            $refundDetailsData[static::REFUND_AMOUNT]
        ));

        if (!empty($refundDetailsData[static::REFUND_STATUS])) {
            $refundDetails->setRefundStatus(
                $this->convertStatusToTransfer($refundDetailsData[static::REFUND_STATUS])
            );
        }

        if (!empty($refundDetailsData[static::SELLER_REFUND_NOTE])) {
            $refundDetails->setRefundReferenceId($refundDetailsData[static::SELLER_REFUND_NOTE]);
        }

        return $refundDetails;
    }
}