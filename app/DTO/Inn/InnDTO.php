<?php

namespace App\DTO\Inn;

class InnDTO
{
    private $inn;
    private $status;
    private $message;
    private $code;
    private $requestDate;

    static function createInnDTO(mixed $args): InnDTO {
        $innDTO = new InnDTO();
        if (isset($args['inn']))
            $innDTO->inn = $args['inn'];
        if (isset($args['status']))
            $innDTO->status = $args['status'];
        if (isset($args['message']))
            $innDTO->message = $args['message'];
        if (isset($args['code']))
            $innDTO->code = $args['code'];
        if (isset($args['requestDate']))
            $innDTO->requestDate = $args['requestDate'];
        return $innDTO;
    }

    /**
     * @return mixed
     */
    public function getinn()
    {
        return $this->inn;
    }

    /**
     * @param mixed $inn
     */
    public function setinn($inn): void
    {
        $this->inn = $inn;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message): void
    {
        $this->message = $message;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code): void
    {
        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getRequestDate()
    {
        return $this->requestDate;
    }

    /**
     * @param mixed $requestDate
     */
    public function setRequestDate($requestDate): void
    {
        $this->requestDate = $requestDate;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status): void
    {
        $this->status = $status;
    }

    public function __toString(): string
    {
        return $this->inn . ' ' . $this->status . ' ' . $this->message . ' ' . $this->code . ' ' . $this->requestDate;
    }
}
