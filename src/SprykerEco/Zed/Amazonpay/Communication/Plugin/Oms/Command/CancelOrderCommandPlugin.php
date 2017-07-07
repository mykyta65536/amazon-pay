<?php

/**
 * Apache OSL-2
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerEco\Zed\Amazonpay\Communication\Plugin\Oms\Command;

use Orm\Zed\Sales\Persistence\SpySalesOrder;
use Spryker\Zed\Oms\Business\Util\ReadOnlyArrayObject;

class CancelOrderCommandPlugin extends AbstractAmazonpayCommandPlugin
{

    /**
     * @inheritdoc
     */
    public function run(array $salesOrderItems, SpySalesOrder $orderEntity, ReadOnlyArrayObject $data)
    {
        if (!$this->ensureRunForFullOrder($salesOrderItems, $orderEntity, 'amazonpay.cancel.error.only-full-order')) {
            return [];
        }

        $this->getFacade()->cancelOrder($this->getOrderTransfer($orderEntity));

        return [];
    }

}
