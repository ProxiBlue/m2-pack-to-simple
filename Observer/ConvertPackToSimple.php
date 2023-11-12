<?php
/**
 * PackToSimple
 * @category ProxiBlue
 * @package  ProxiBlue_PackToSimple
 * @license  MIT https://opensource.org/licenses/MIT
 * @author Lucas van Staden (lucas@proxiblue.com.au)
 */
declare(strict_types=1);

namespace ProxiBlue\PackToSimple\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Psr\Log\LoggerInterface;

class ConvertPackToSimple implements ObserverInterface {

    public function __construct(protected LoggerInterface $logger) {
    }

    public function execute(Observer $observer): void {
        try {
            $item = $observer->getEvent()->getItem();
            if (is_object($item) && $item->getProductType() == 'pack') {
                $item->setProductType('simple');
                $packOptions = $item->getProductOptions();
                if (isset($packOptions['info_buyRequest']['pack_option']['pack_size'])) {
                    $item->setQtyOrdered($packOptions['info_buyRequest']['pack_option']['pack_size'] * $item->getQtyOrdered());
                }
            }
        } catch (\Exception $e) {
            $this->logger->critical($e);
        }
    }
}
