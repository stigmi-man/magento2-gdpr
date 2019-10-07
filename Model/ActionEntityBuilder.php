<?php
/**
 * Copyright © OpenGento, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */
declare(strict_types=1);

namespace Opengento\Gdpr\Model;

use DateTime;
use Opengento\Gdpr\Api\Data\ActionEntityInterface;
use Opengento\Gdpr\Api\Data\ActionEntityInterfaceFactory;

/**
 * @api
 */
final class ActionEntityBuilder
{
    /**
     * @var ActionEntityInterfaceFactory
     */
    private $actionEntityFactory;

    /**
     * @var array
     */
    private $data;

    public function __construct(
        ActionEntityInterfaceFactory $actionEntityFactory
    ) {
        $this->actionEntityFactory = $actionEntityFactory;
        $this->data = [];
    }

    public function setType(string $type): ActionEntityBuilder
    {
        $this->data[ActionEntityInterface::TYPE] = $type;

        return $this;
    }

    public function setPerformedFrom(string $performedFrom): ActionEntityBuilder
    {
        $this->data[ActionEntityInterface::PERFORMED_FROM] = $performedFrom;

        return $this;
    }

    public function setPerformedBy(string $performedBy): ActionEntityBuilder
    {
        $this->data[ActionEntityInterface::PERFORMED_BY] = $performedBy;

        return $this;
    }

    public function setPerformedAt(DateTime $performedAt): ActionEntityBuilder
    {
        $this->data[ActionEntityInterface::PERFORMED_AT] = $performedAt;

        return $this;
    }

    public function setParameters(array $parameters): ActionEntityBuilder
    {
        $this->data[ActionEntityInterface::PARAMETERS] = $parameters;

        return $this;
    }

    public function addParameter(string $key, $value): ActionEntityBuilder
    {
        $this->data[ActionEntityInterface::PARAMETERS][$key] = $value;

        return $this;
    }

    public function setState(string $state): ActionEntityBuilder
    {
        $this->data[ActionEntityInterface::STATE] = $state;

        return $this;
    }

    public function create(): ActionEntityInterface
    {
        /** @var ActionEntityInterface $actionEntity */
        $actionEntity = $this->actionEntityFactory->create(['data' => $this->data]);
        $this->data = [];

        return  $actionEntity;
    }
}
