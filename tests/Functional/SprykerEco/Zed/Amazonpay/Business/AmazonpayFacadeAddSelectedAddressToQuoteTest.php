<?php

/**
 * Apache OSL-2
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Functional\SprykerEco\Zed\Amazonpay\Business;

use Functional\SprykerEco\Zed\Amazonpay\Business\Mock\Adapter\Sdk\AbstractResponse;
use Generated\Shared\Transfer\AmazonpayPaymentTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Generated\Shared\Transfer\TotalsTransfer;

class AmazonpayFacadeAddSelectedAddressToQuoteTest extends AmazonpayFacadeAbstractTest
{

    /**
     * @param string $orderReferenceId
     *
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    protected function createQuote($orderReferenceId)
    {
        $quote = new QuoteTransfer();

        $totals = new TotalsTransfer();
        $totals->setGrandTotal(50000);
        $quote->setTotals($totals);

        $amazonpayTransfer = new AmazonpayPaymentTransfer();
        $amazonpayTransfer->setOrderReferenceId($orderReferenceId);
        $amazonpayTransfer->setAddressConsentToken('addressconsenttoken');
        $amazonpayTransfer->setSellerOrderId('S02-4691938-4240727591437cc0ccbd');
        $quote->setAmazonpayPayment($amazonpayTransfer);

        return $quote;
    }

    /**
     * @dataProvider addSelectedAddressDataProvider
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     */
    public function testAddSelectedAddressToQuote(QuoteTransfer $quoteTransfer, $city, $iso2Code, $zipCode)
    {
        $resultQuote = $this->createFacade()->addSelectedAddressToQuote($quoteTransfer);

        $this->assertEquals($city, $resultQuote->getShippingAddress()->getCity());
        $this->assertEquals($iso2Code, $resultQuote->getShippingAddress()->getIso2Code());
        $this->assertEquals($zipCode, $resultQuote->getShippingAddress()->getZipCode());
    }

    /**
     * @return array
     */
    public function addSelectedAddressDataProvider()
    {

        return [
            'Barcelona' => [
                $this->createQuote(AbstractResponse::ORDER_REFERENCE_ID_FIRST),
                'Barcelona',
                'ES',
                '0895',
            ],
            'London' => [
                $this->createQuote(AbstractResponse::ORDER_REFERENCE_ID_SECOND),
                'London',
                'GB',
                'SE1 2BY',
            ],
            'Wien' => [
                $this->createQuote(AbstractResponse::ORDER_REFERENCE_ID_THIRD),
                'Wien',
                'AT',
                '1050',
            ],
        ];
    }
}
