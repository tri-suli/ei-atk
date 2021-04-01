<?php declare(strict_types=1);

namespace App\Repositories\Exceptions;

use Exception;
use App\Repositories\Contracts\Eloquent\RepositoryContract;

class NoEntityDefinedException extends Exception
{
    /**
     * Exception message
     * 
     * @var string
     */
    const MESSAGE = 'Cannot find the concrete entity for repository';

    /**
     * Create NoEntityDefinedException instance
     *
     * @param RepositoryContract $repository
     */
    public function __construct(RepositoryContract $repository)
    {
        parent::__construct($this->resolveMessage($repository));
    }

    /**
     * Generate the exception message
     *
     * @param RepositoryContract $repository
     * @return string
     */
    private function resolveMessage(RepositoryContract $repository): string
    {
        return self::MESSAGE . ' [' . get_class($repository) . ']';
    }
}
