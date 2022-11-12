<?php
namespace OCA\ExternalPassword\Sections;

use OCP\IL10N;
use OCP\IURLGenerator;
use OCP\Settings\IIconSection;

class BillingSection implements IIconSection {
    private IL10N $l;
    private IURLGenerator $urlGenerator;

    public function __construct(IL10N $l, IURLGenerator $urlGenerator) {
        $this->l = $l;
        $this->urlGenerator = $urlGenerator;
    }

    public function getIcon(): string {
        return $this->urlGenerator->imagePath('externalpassword', 'billing.svg');
    }

    public function getID(): string {
        return 'billing';
    }

    public function getName(): string {
        return $this->l->t('Billing');
    }

    public function getPriority(): int {
        return 98;
    }
}
