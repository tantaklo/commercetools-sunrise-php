<?php
/**
 * @author @jayS-de <jens.schulze@commercetools.de>
 */

namespace Commercetools\Sunrise\AppBundle\Model\View;

use Commercetools\Core\Model\Type\EnumType;
use Commercetools\Sunrise\AppBundle\Model\ViewData;

class AddressFormSettings extends ViewData
{
    public $titleShipping;
    public $titleBilling;
    public $countriesShipping;
    public $countriesBilling;

    public function __construct()
    {
        $this->titleShipping = new ListObject();
        $this->titleShipping->list
            ->add(new Entry('Mr.', 'Mr.'))
            ->add(new Entry('Mrs.', 'Mrs.'))
            ->add(new Entry('Ms.', 'Ms.'))
            ->add(new Entry('Dr.', 'Dr.'))
        ;
        $this->titleBilling = new ListObject();
        $this->titleBilling->list
            ->add(new Entry('Mr.', 'Mr.'))
            ->add(new Entry('Mrs.', 'Mrs.'))
            ->add(new Entry('Ms.', 'Ms.'))
            ->add(new Entry('Dr.', 'Dr.'))
        ;
        $this->countriesShipping = new ListObject();
        $this->countriesShipping->list
            ->add(new Entry('Germany', 'DE'))
        ;
        $this->countriesBilling = new ListObject();
        $this->countriesBilling->list
            ->add(new Entry('Germany', 'DE'))
        ;
    }

    public function selectProperty($property, $value)
    {
        /**
         * @var Entry $entry
         */
        foreach ($this->$property->list as $entry) {
            if ($entry->getValue() === $value) {
                $entry->selected = true;
            }
        }
    }



    public function getTitleValues($type)
    {
        $values = [];
        /**
         * @var Entry $titleEntry
         */
        $titleProperty = 'title' . ucfirst($type);
        foreach ($this->$titleProperty->list as $titleEntry) {
            $values[] = $titleEntry->getValue();
        }
        return $values;
    }
}
